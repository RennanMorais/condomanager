<?php
namespace src\handlers;

use \src\models\Condominio;
use \src\models\Predio;
use \src\models\User;
use \src\models\Pet;
use \src\models\Veiculo;
use \src\models\Acces;

class UserHandler {

    // Funções de Login
    public static function checkLogin() {
        if(!empty($_SESSION['token'])) {
            
            $token = $_SESSION['token'];
            $data = User::select()->where('token', $token)->one();
            
            if(count($data) > 0) {
                $loggedUser = new User;
                $loggedUser->id = $data['id'];
                $loggedUser->name = $data['name'];
                $loggedUser->email = $data['email'];
                $loggedUser->condominio = $data['condominio'];
                $loggedUser->predio = $data['predio'];
                $loggedUser->id_access = $data['id_access'];
                $loggedUser->nome_access = $data['nome_access'];
                $loggedUser->avatar = $data['avatar'];
                return $loggedUser;
            }
        }
        return false;
    }

    public static function verifyLogin($email, $password) {
        $user = User::select()->where('email', $email)->one();
        if($user['id_access'] != '4') {
            if($user) {
                if(password_verify($password, $user['password'])) {
                    $token = md5(time().rand(0, 9999).time());
                    User::update()->set('token', $token)->where('email', $email)->execute();
                    return $token;
                }
            }
        }
 
        return false;
    }

    public static function emailExists($email) {
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false;
    }

    public static function addUser($name, $email, $phone, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time().rand(0, 9999).time());
        $access = '1';
        $access_name = 'Administrador';

        User::insert([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $hash,
            'id_access' => $access,
            'nome_access' => $access_name,
            'token' => $token
        ])->execute();
        
        return $token;
    }


    // Funções de Usuários
    public static function addUserFromMorador($nome, $email, $rg, $cpf, $phone, $tipo, $condominio, $predio, $apto) {
        $cond = Condominio::select()->where('id', $condominio)->one();
        $prd = Predio::select()->where('id', $predio)->one();
        
        //Remover pontos e traço do CPF
        $cpf = str_replace('.', '', $cpf);
        $cpf = str_replace('-', '', $cpf);
        $password = password_hash($cpf, PASSWORD_DEFAULT);

        $access = '3';
        $access_name = 'Morador';

        User::insert([
            'name' => $nome,
            'email' => $email,
            'password' => $password,
            'rg' => $rg,
            'cpf' => $cpf,
            'phone' => $phone,
            'tipo' => $tipo,
            'id_condominio' => $condominio,
            'condominio' => $cond['nome'],
            'id_predio' => $predio,
            'predio' => $prd['nome'],
            'apto' => $apto,
            'id_access' => $access,
            'nome_access' => $access_name
        ])->execute();
        return true;
    }

    public static function addUserFromConfig($nome, $email, $rg, $cpf, $phone, $tipo, $condominio, $predio, $apto, $access) {
        $cond = Condominio::select()->where('id', $condominio)->one();
        $prd = Predio::select()->where('id', $predio)->one();

        $accessList = Acces::select()->where('id', $access)->one();
        $nome_access = $accessList['access'];
        
        //Remover pontos e traço do CPF
        $cpf = str_replace('.', '', $cpf);
        $cpf = str_replace('-', '', $cpf);
        $password = password_hash($cpf, PASSWORD_DEFAULT);

        

        User::insert([
            'name' => $nome,
            'email' => $email,
            'password' => $password,
            'rg' => $rg,
            'cpf' => $cpf,
            'phone' => $phone,
            'tipo' => $tipo,
            'id_condominio' => $condominio,
            'condominio' => $cond['nome'],
            'id_predio' => $predio,
            'predio' => $prd['nome'],
            'apto' => $apto,
            'id_access' => $access,
            'nome_access' => $nome_access
        ])->execute();

        return true;
    }

    public static function getUsers() {
        $usersList = User::select()->get();
        $user = [];
        foreach($usersList as $userItem) {
            $newUser = new User();
            $newUser->id = $userItem['id'];
            $newUser->name = $userItem['name'];
            $newUser->email = $userItem['email'];
            $newUser->rg = $userItem['rg'];
            $newUser->cpf = $userItem['cpf'];
            $newUser->phone = $userItem['phone'];
            $newUser->tipo = $userItem['tipo'];
            $newUser->condominio = $userItem['condominio'];
            $newUser->predio = $userItem['predio'];
            $newUser->apto = $userItem['apto'];
            $newUser->id_access = $userItem['id_access'];
            $newUser->nome_access = $userItem['nome_access'];
            $user[] = $newUser;
        }
        return $user;
    }

    public static function getUserItem($id) {
        $userItem = User::select()->where('id', $id)->one();
        return $userItem;
    }

    public static function saveUser($id, $nome, $email, $rg, $cpf, $phone, $tipo, $condominio, $predio, $apto, $access) {
        $cond = Condominio::select()->where('id', $condominio)->one();
        $nome_condominio = $cond['nome'];
        
        $prd = Predio::select()->where('id', $predio)->one();
        $nome_predio = $prd['nome'];

        $accessList = Acces::select()->where('id', $access)->one();
        $nome_access = $accessList['access'];

        User::update()
        ->set('name', $nome)
        ->set('email', $email)
        ->set('rg', $rg)
        ->set('cpf', $cpf)
        ->set('phone', $phone)
        ->set('tipo', $tipo)
        ->set('id_condominio', $condominio)
        ->set('condominio', $nome_condominio)
        ->set('id_predio', $predio)
        ->set('predio', $nome_predio)
        ->set('apto', $apto)
        ->set('id_access', $access)
        ->set('nome_access', $nome_access)->where('id', $id)->execute();

        return true;
    }

    public static function resetPass($id, $senha) {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        User::update()->set('password', $senha_hash)->where('id', $id)->execute();
        return true;
    }

    public static function disableUser($id) {
        $access = Acces::select()->where('id', '4')->one();
        User::update()
        ->set('id_access', $access['id'])
        ->set('nome_access', $access['access'])->where('id', $id)->execute();

        return true;
    }

    public static function countMoradores() {
        $countUsers = User::select()->where('id_access', '3')->count();
        return $countUsers;
    }

    public static function getMoradorField($id) {
        $moradorList = User::select()->where('id_condominio', $id)->where('id_access', '3')->get();
        return $moradorList;
    }

    public static function getMoradorListPorPredio($id) {
        $morador_por_predio = User::select()->where('id_predio', $id)->get();
        return $morador_por_predio;
    }

    public static function getMoradorPhone($id) {
        $morador_phone = User::select('phone')->where('id', $id)->one();
        return $morador_phone;
    }

    public static function getAccess() {
        $accessList = Acces::select()->get();
        $access = [];

        foreach($accessList as $accessItem) {
            $newAccess = new Acces();
            $newAccess->id = $accessItem['id'];
            $newAccess->access = $accessItem['access'];
            $access[] = $newAccess;
        }

        return $access;
    } 


    // Funções de pets
    public static function addPets($nome, $tipo, $sexo, $id_morador, $phone) {
        $morador = User::select()->where('id', $id_morador)->one();
        $nome_morador = $morador['name'];

        Pet::insert([
            'nome' => $nome,
            'tipo' => $tipo,
            'sexo' => $sexo,
            'id_morador' => $id_morador,
            'morador' => $nome_morador,
            'phone' => $phone
        ])->execute();

        return true;
    }

    public static function getPets() {
        $petsList = Pet::select()->get();
        $pets = [];
        
        foreach($petsList as $petItem) {
            $newPet = new Pet();
            $newPet->id = $petItem['id'];
            $newPet->nome = $petItem['nome'];
            $newPet->tipo = $petItem['tipo'];
            $newPet->sexo = $petItem['sexo'];
            $newPet->id_morador = $petItem['id_morador'];
            $newPet->morador = $petItem['morador'];
            $newPet->phone = $petItem['phone'];

            $pets[] = $newPet;
        }
        return $pets;
    }

    public static function getPetItem($id_pet) {
        $petItem = Pet::select()->where('id', $id_pet)->one();
        return $petItem;
    }

    public static function savePets($id, $nome, $tipo, $sexo, $id_morador, $phone) {
        $morador = User::select()->where('id', $id_morador)->one();
        $nome_morador = $morador['name'];

        Pet::update()
            ->set('nome', $nome)
            ->set('tipo', $tipo)
            ->set('sexo', $sexo)
            ->set('id_morador', $id_morador)
            ->set('morador', $nome_morador)
            ->set('phone', $phone)->where('id', $id)->execute();
        return true;
    }

    public static function delPet($id) {
        Pet::delete()->where('id', $id)->execute();
        return true;
    }


    // Funções de veiculos
    public static function addVeiculo($condominio_id, $predio_id, $morador_id, $tipo, $marca, $modelo, $placa) {
        $get_cond_name = Condominio::select()->where('id', $condominio_id)->one();
        $nome_condominio = $get_cond_name['nome'];

        $get_predio_name = Predio::select()->where('id', $predio_id)->one();
        $nome_predio = $get_predio_name['nome'];

        $get_morador_name = User::select()->where('id', $morador_id)->one();
        $nome_morador = $get_morador_name['name'];

        Veiculo::insert([
            'id_condominio' => $condominio_id,
            'condominio' => $nome_condominio,
            'id_predio' => $predio_id,
            'predio' => $nome_predio,
            'id_morador' => $morador_id,
            'morador' => $nome_morador,
            'tipo' => $tipo,
            'marca' => $marca,
            'modelo' => $modelo,
            'placa' => $placa
        ])->execute();

        return true;
    }

    public static function getVeiculos() {
        $veiculosList = Veiculo::select()->get();
        $veiculos = [];
        
        foreach($veiculosList as $veiculoItem) {
            $newVeiculo = new Veiculo();
            $newVeiculo->id = $veiculoItem['id'];
            $newVeiculo->id_condominio = $veiculoItem['id_condominio'];
            $newVeiculo->condominio = $veiculoItem['condominio'];
            $newVeiculo->id_predio = $veiculoItem['id_predio'];
            $newVeiculo->predio = $veiculoItem['predio'];
            $newVeiculo->id_morador = $veiculoItem['id_morador'];
            $newVeiculo->morador = $veiculoItem['morador'];
            $newVeiculo->tipo = $veiculoItem['tipo'];
            $newVeiculo->marca = $veiculoItem['marca'];
            $newVeiculo->modelo = $veiculoItem['modelo'];
            $newVeiculo->placa = $veiculoItem['placa'];

            $veiculos[] = $newVeiculo;
        }
        return $veiculos;
    }

    public static function saveVeiculo($id, $condominio_id, $predio_id, $morador_id, $tipo, $marca, $modelo, $placa) {
        $get_cond_name = Condominio::select()->where('id', $condominio_id)->one();
        $nome_condominio = $get_cond_name['nome'];

        $get_predio_name = Predio::select()->where('id', $predio_id)->one();
        $nome_predio = $get_predio_name['nome'];

        $get_morador_name = User::select()->where('id', $morador_id)->one();
        $nome_morador = $get_morador_name['name'];

        Veiculo::update()
            ->set('id_condominio', $condominio_id)
            ->set('condominio',$nome_condominio)
            ->set('id_predio',$predio_id)
            ->set('predio',$nome_predio)
            ->set('id_morador',$morador_id)
            ->set('morador',$nome_morador)
            ->set('tipo',$tipo)
            ->set('marca',$marca)
            ->set('modelo',$modelo)
            ->set('placa',$placa)->where('id', $id)->execute();

        return true;
    }

    public static function getVeiculoItem($id) {
        $veiculoItem = Veiculo::select()->where('id', $id)->one();
        return $veiculoItem;
    }

    public static function deleteVeiculo($id) {
        Veiculo::delete()->where('id', $id)->execute();
        return true;
    }

    public static function updateAvatar($avatar, $id) {
        User::update()->set('avatar', $avatar)->where('id', $id)->execute();
        return true;
    }

}
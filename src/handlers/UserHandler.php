<?php
namespace src\handlers;

use \src\models\User;

class UserHandler {

    public static function checkLogin() {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];
            $data = User::select()->where('token', $token)->one();
            if(count($data) > 0) {
                $loggedUser = new User;
                $loggedUser->id = $data['id'];
                $loggedUser->name = $data['name'];
                $loggedUser->access = $data['access'];
                return $loggedUser;
            }
        }
        return false;
    }

    public static function verifyLogin($email, $password) {
        $user = User::select()->where('email', $email)->one();
        if($user) {
            if(password_verify($password, $user['password'])) {
                $token = md5(time().rand(0, 9999).time());
                User::update()->set('token', $token)->where('email', $email)->execute();
                return $token;
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

        User::insert([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $hash,
            'access' => $access,
            'token' => $token
        ])->execute();
        
        return $token;
    }

    public static function addUserFromMorador($nome, $email, $rg, $cpf, $phone, $tipo, $condominio, $predio, $apto) {
        $password = password_hash($cpf, PASSWORD_DEFAULT);
        $access = '3';
        User::insert([
            'name' => $nome,
            'email' => $email,
            'password' => $password,
            'rg' => $rg,
            'cpf' => $cpf,
            'phone' => $phone,
            'tipo' => $tipo,
            'condominio' => $condominio,
            'predio' => $predio,
            'apto' => $apto,
            'access' => $access
        ])->execute();
        return true;
    }

    public static function disableUser($id) {
        $access = '4';
        User::update()->set('access', $access)->where('id', $id)->execute();
        return true;
    }

}
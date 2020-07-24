<?php
namespace src\handlers;

use \src\models\Condominio;
use \src\models\Predio;
use \src\models\Areascomum;
use \src\models\User;
use \src\models\Reserva;


class CondominioHandler {

    public static function addCond($name, $cnpj, $email, $endereco, $numero, $complemento, $bairro) {
        Condominio::insert([
            'nome' => $name,
            'cnpj' => $cnpj,
            'email' => $email,
            'endereco' => $endereco,
            'numero' => $numero,
            'complemento' => $complemento,
            'bairro' => $bairro
        ])->execute();
        return true;
    }

    public static function getCond() {
        $condList = Condominio::select()->orderBy('nome', 'asc')->get();
        $cond = [];
        foreach($condList as $condItem) {
            $newCond = new Condominio();
            $newCond->id = $condItem['id'];
            $newCond->nome = $condItem['nome'];
            $newCond->cnpj = $condItem['cnpj'];
            $newCond->email = $condItem['email'];
            $newCond->endereco = $condItem['endereco'];
            $newCond->numero = $condItem['numero'];
            $newCond->complemento = $condItem['complemento'];
            $newCond->bairro = $condItem['bairro'];
            $cond[] = $newCond;
        }
        return $cond;
    }

    public static function delCond($id) {
        Condominio::delete()->where('id', $id)->execute();
        return true;
    }

    public static function getCondItem($id) {
        $condItem = Condominio::select()->where('id', $id)->one();
        return $condItem;
    }

    public static function saveCond($id, $nome, $cnpj, $email, $endereco, $numero, $complemento, $bairro) {
        Condominio::update()
        ->set('nome', $nome)
        ->set('cnpj', $cnpj)
        ->set('email', $email)
        ->set('endereco', $endereco)
        ->set('numero', $numero)
        ->set('complemento', $complemento)
        ->set('bairro', $bairro)->where('id', $id)->execute();

        Predio::update()
        ->set('condominio', $nome)->where('id_condominio', $id)->execute();

        Areascomum::update()
        ->set('condominio', $nome)->where('id_condominio', $id)->execute();

        User::update()
        ->set('condominio', $nome)->where('id_condominio', $id)->execute();

        Reserva::update()
        ->set('condominio', $nome)->where('id_condominio', $id)->execute();

        return true;
    }


    //Funções Predios
    public static function addPrd($predio, $condominio) {
        $cond = Condominio::select()->where('id', $condominio)->one();
        Predio::insert([
            'nome' => $predio,
            'id_condominio' => $condominio,
            'condominio' => $cond['nome']
        ])->execute();
        return true;
    }

    public static function getPredios() {
        $prdList = Predio::select()->get();
        $prd = [];
        foreach($prdList as $prdItem) {
            $newPrd = new Predio();
            $newPrd->id = $prdItem['id'];
            $newPrd->nome = $prdItem['nome'];
            $newPrd->id_condominio = $prdItem['id_condominio'];
            $newPrd->condominio = $prdItem['condominio'];
            $prd[] = $newPrd;
        }
        return $prd;
    }

    public static function getPrdItem($id) {
        $prdItem = Predio::select()->where('id', $id)->one();
        return $prdItem;
    }

    public static function savePrd($id, $nome, $condominio) {
        $cond = Condominio::select()->where('id', $condominio)->one();
        
        Predio::update()
        ->set('nome', $nome)
        ->set('id_condominio', $condominio)
        ->set('condominio', $cond['nome'])
        ->where('id', $id)->execute();

        User::update()
        ->set('id_condominio', $condominio)
        ->set('condominio', $cond['nome'])
        ->set('id_predio', $id)
        ->set('predio', $nome)->where('id_predio', $id)->execute();

        return true;
    }

    public static function delPrd($id) {
        Predio::delete()->where('id', $id)->execute();
        return true;
    }

    public static function getPrdListByCond($id) {
        $prdList = Predio::select()->where('id_condominio', $id)->get();
        return $prdList;
    }


    //Funções Moradores
    public static function getMorador() {
        $moradorList = User::select()->where('access', '3')->get();
        $morador = [];
        foreach($moradorList as $moradorItem) {
            $newMorador = new User();
            $newMorador->id = $moradorItem['id'];
            $newMorador->name = $moradorItem['name'];
            $newMorador->email = $moradorItem['email'];
            $newMorador->rg = $moradorItem['rg'];
            $newMorador->cpf = $moradorItem['cpf'];
            $newMorador->phone = $moradorItem['phone'];
            $newMorador->tipo = $moradorItem['tipo'];
            $newMorador->condominio = $moradorItem['condominio'];
            $newMorador->predio = $moradorItem['predio'];
            $newMorador->apto = $moradorItem['apto'];
            $newMorador->access = $moradorItem['access'];
            $morador[] = $newMorador;
        }
        return $morador;
    }

    public static function getMoradorItem($id) {
        $moradorItem = User::select()->where('id', $id)->one();
        return $moradorItem;
    }

    public static function saveMoradorFromMorador($id, $nome, $email, $rg, $cpf, $phone, $tipo, $condominio, $predio, $apto) {
        $cond = Condominio::select()->where('id', $condominio)->one();
        $nome_condominio = $cond['nome'];
        
        $prd = Predio::select()->where('id', $predio)->one();
        $nome_predio = $prd['nome'];

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
        ->where('id', $id)->execute();
        return true;
    }


    //Funções de Areas
    public static function addNewArea($nome, $condominio) {
        $cond = Condominio::select()->where('id', $condominio)->one();
        Areascomum::insert([
            'nome' => $nome,
            'id_condominio' => $condominio,
            'condominio' => $cond['nome']
        ])->execute();
        return true;
    }

    public static function getAreas() {
        $areasList = Areascomum::select()->get();
        $areas = [];
        foreach($areasList as $areaItem) {
            $newArea = new AreasComum();
            $newArea->id = $areaItem['id'];
            $newArea->nome = $areaItem['nome'];
            $newArea->condominio = $areaItem['condominio'];
            $areas[] = $newArea;
        }
        return $areas;
    }

    public static function getAreaItem($id) {
        $areaItem = Areascomum::select()->where('id', $id)->one();
        return $areaItem;
    }

    public static function saveAreaComum($id, $nome, $condominio) {
        $cond = Condominio::select()->where('id', $condominio)->one();
        Areascomum::update()
        ->set('nome', $nome)
        ->set('id_condominio', $condominio)
        ->set('condominio', $cond['nome'])
        ->where('id', $id)->execute();

        Reserva::update()
        ->set('area_comum', $nome)
        ->set('id_condominio', $condominio)
        ->set('condominio', $cond['nome'])
        ->where('id_area', $id)->execute();
        return true;
    }

    public static function delArea($id) {
        Areascomum::delete()->where('id', $id)->execute();
        return true;
    }

    public static function getAreaListByCond($id) {
        $areaList = Areascomum::select()->where('id_condominio', $id)->get();
        return $areaList;
    }


    //Funções da página de reservas
    public static function addNewReserva($id_condominio, $id_morador, $id_area, $nome_evento, $data, $inicio, $termino) {
        $nome_condominio = Condominio::select()->where('id', $id_condominio)->one();
        $nome_morador = User::select()->where('id', $id_morador)->one();
        $nome_area = Areascomum::select()->where('id', $id_area)->one();
        $status = 'Pendente';
        Reserva::insert([
            'id_condominio' => $id_condominio,
            'condominio' => $nome_condominio['nome'],
            'id_morador' => $id_morador,
            'morador' => $nome_morador['name'],
            'id_area' => $id_area,
            'area_comum' => $nome_area['nome'],
            'evento' => $nome_evento,
            'data' => $data,
            'inicio' => $inicio,
            'termino' => $termino,
            'status' => $status
        ])->execute();
        return true;
    }

    public static function getReservas() {
        $reservasList = Reserva::select()->get();
        $reservas = [];

        foreach($reservasList as $reservaItem) {
            $newReserva = new Reserva();
            $newReserva->id = $reservaItem['id'];
            $newReserva->id_condominio = $reservaItem['id_condominio'];
            $newReserva->condominio = $reservaItem['condominio'];
            $newReserva->id_morador = $reservaItem['id_morador'];
            $newReserva->morador = $reservaItem['morador'];
            $newReserva->id_area = $reservaItem['id_area'];
            $newReserva->area_comum = $reservaItem['area_comum'];
            $newReserva->evento = $reservaItem['evento'];
            $newReserva->data = $reservaItem['data'];
            $newReserva->inicio = $reservaItem['inicio'];
            $newReserva->termino = $reservaItem['termino'];
            $newReserva->status = $reservaItem['status'];
            $reservas[] = $newReserva;
        }
        return $reservas;
    }

    public static function getReservaItem($id) {
        $reserva = Reserva::select()->where('id', $id)->one();
        return $reserva;
    }

    public static function saveReservaEdit($id, $id_condominio, $id_morador, $id_area, $evento, $data, $inicio, $termino) {
        $condominio = Condominio::select()->where('id', $id_condominio)->one();
        $nome_condominio = $condominio['nome'];

        $morador = User::select()->where('id', $id_morador)->one();
        $nome_morador = $morador['name'];

        $area = Areascomum::select()->where('id', $id_area)->one();
        $nome_area = $area['nome'];
        $status = 'Pendente';

        Reserva::update()
        ->set('id_condominio', $id_condominio)
        ->set('condominio', $nome_condominio)
        ->set('id_morador', $id_morador)
        ->set('morador', $nome_morador)
        ->set('id_area', $id_area)
        ->set('area_comum', $nome_area)
        ->set('evento', $evento)
        ->set('data', $data)
        ->set('inicio', $inicio)
        ->set('termino', $termino)
        ->set('status', $status)->where('id', $id)->execute();

        return true;
    }

    public static function aprovarReserva($id) {
        $status = 'Aprovado';
        Reserva::update()->set('status', $status)->where('id', $id)->execute();
        return true;
    }

    public static function rejeitarReserva($id) {
        $status = 'Rejeitado';
        Reserva::update()->set('status', $status)->where('id', $id)->execute();
        return true;
    }

    public static function delReserva($id) {
        Reserva::delete()->where('id', $id)->execute();
        return true;
    }

    public static function countReservaPendente() {
        $status = 'Pendente';
        $countReservas = Reserva::select()->where('status', $status)->count();
        return $countReservas;
    }

    public static function reservaDateCheck($id_condominio, $id_area, $data) {
        
        $status = 'Rejeitado';

        $dateCheck = Reserva::select()
        ->where('id_condominio', $id_condominio)
        ->where('id_area', $id_area)
        ->where('data', $data)
        ->where('status', '!=', $status)->one();

        return $dateCheck ? true : false;
    }

}
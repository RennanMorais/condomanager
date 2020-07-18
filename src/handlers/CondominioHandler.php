<?php
namespace src\handlers;

use \src\models\Condominio;
use \src\models\Predio;

class CondominioHandler {

    public function addCond($name, $cnpj, $email, $endereco, $numero, $complemento, $bairro) {
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

    public function getCond() {
        $condList = Condominio::select()->get();
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

    public function delCond($id) {
        Condominio::delete()->where('id', $id)->execute();
        return true;
    }

    public function getCondItem($id) {
        $condItem = Condominio::select()->where('id', $id)->one();
        return $condItem;
    }

    public function saveCond($id, $nome, $cnpj, $email, $endereco, $numero, $complemento, $bairro) {
        Condominio::update()
        ->set('nome', $nome)
        ->set('cnpj', $cnpj)
        ->set('email', $email)
        ->set('endereco', $endereco)
        ->set('numero', $numero)
        ->set('complemento', $complemento)
        ->set('bairro', $bairro)->where('id', $id)->execute();
        return true;
    }

    public function addPrd($predio, $condominio) {
        Predio::insert([
            'nome' => $predio,
            'condominio' => $condominio
        ])->execute();
        return true;
    }

    public function getPredios() {
        $prdList = Predio::select()->get();
        $prd = [];
        foreach($prdList as $prdItem) {
            $newPrd = new Predio();
            $newPrd->id = $prdItem['id'];
            $newPrd->nome = $prdItem['nome'];
            $newPrd->condominio = $prdItem['condominio'];
            $prd[] = $newPrd;
        }
        return $prd;
    }

    public function getPrdItem($id) {
        $prdItem = Predio::select()->where('id', $id)->one();
        return $prdItem;
    }

    public function savePrd($id, $nome, $condominio) {
        Predio::update()
        ->set('nome', $nome)
        ->set('condominio', $condominio)
        ->where('id', $id)->execute();
        return true;
    }

    public function delPrd($id) {
        Predio::delete()->where('id', $id)->execute();
        return true;
    }

}
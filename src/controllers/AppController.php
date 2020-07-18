<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\StatementHandler;
use \src\handlers\CondominioHandler;

class AppController extends Controller {

    private $loggedUser;
    
    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $statementsFeed = StatementHandler::getStatement();
        $this->render('dash', [
            'loggedUser' => $this->loggedUser,
            'statementsFeed' => $statementsFeed
        ]);
    }

    public function send_statement() {
        $text = filter_input(INPUT_POST, 'text-statement');

        if($text) {
            StatementHandler::addStatement($text);
            $this->redirect('/app');
        }

    }
    
    //Funções da pagina de condominio
    public function condominio() {
        $condominiosList = CondominioHandler::getCond();
        $this->render('condominio', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList
        ]);
    }

    public function addCondominio() {
        $name = filter_input(INPUT_POST, 'name');
        $cnpj = filter_input(INPUT_POST, 'cnpj');
        $email = filter_input(INPUT_POST, 'email');
        $endereco = filter_input(INPUT_POST, 'endereco');
        $numero = filter_input(INPUT_POST, 'numero');
        $complemento = filter_input(INPUT_POST, 'complemento');
        $bairro = filter_input(INPUT_POST, 'bairro');

        if($name && $email) {
            CondominioHandler::addCond($name, $cnpj, $email, $endereco, $numero, $complemento, $bairro);
            $this->redirect('/app/condominios');
        }

    }

    public function editCondominio($atts) {
        $condItem = CondominioHandler::getCondItem($atts['id']);
        $this->render('edit_cond', [
            'loggedUser' => $this->loggedUser,
            'condItem' => $condItem
        ]);

    }

    public function saveCondominio() {
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'name');
        $cnpj = filter_input(INPUT_POST, 'cnpj');
        $email = filter_input(INPUT_POST, 'email');
        $endereco = filter_input(INPUT_POST, 'endereco');
        $numero = filter_input(INPUT_POST, 'numero');
        $complemento = filter_input(INPUT_POST, 'complemento');
        $bairro = filter_input(INPUT_POST, 'bairro');

        if($nome && $email) {
            CondominioHandler::saveCond($id, $nome, $cnpj, $email, $endereco, $numero, $complemento, $bairro);
            $this->redirect('/app/condominios');
        }
    }

    public function deleteCondominio() {
        $condominioId = filter_input(INPUT_GET, 'id');
        if($condominioId) {
            CondominioHandler::delCond($condominioId);
            $this->redirect('/app/condominios');
        }

    }

    //Funções da página de prédios
    public function predio() {
        $prediosList = CondominioHandler::getPredios();
        $condominiosList = CondominioHandler::getCond();
        $this->render('predio', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'prediosList' => $prediosList
        ]);
    }

    public function addPredio() {
        $predio = filter_input(INPUT_POST, 'name');
        $condominio = filter_input(INPUT_POST, 'condominio');

        if($predio && $condominio) {
            CondominioHandler::addPrd($predio, $condominio);
            $this->redirect('/app/predios');
        }
    }

    public function editPredio($atts) {
        $prdItem = CondominioHandler::getPrdItem($atts['id']);
        $condominiosList = CondominioHandler::getCond();
        $this->render('edit_prd', [
            'loggedUser' => $this->loggedUser,
            'prdItem' => $prdItem,
            'condominios' => $condominiosList
        ]);

    }

    public function savePredio() {
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'name');
        $condominio = filter_input(INPUT_POST, 'condominio');

        if($nome && $condominio) {
            CondominioHandler::savePrd($id, $nome, $condominio);
            $this->redirect('/app/predios');
        }
    }

    public function deletePredio() {
        $predioId = filter_input(INPUT_GET, 'id');
        if($predioId) {
            CondominioHandler::delPrd($predioId);
            $this->redirect('/app/predios');
        }

    }

    //Funções da página de prédios
    public function morador() {
        $prediosList = CondominioHandler::getPredios();
        $condominiosList = CondominioHandler::getCond();
        $this->render('morador', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'prediosList' => $prediosList
        ]);
    }

    public function addMorador() {
        $predio = filter_input(INPUT_POST, 'name');
        $condominio = filter_input(INPUT_POST, 'condominio');

        if($predio && $condominio) {
            CondominioHandler::addPrd($predio, $condominio);
            $this->redirect('/app/predios');
        }
    }

    public function editMorador($atts) {
        $prdItem = CondominioHandler::getPrdItem($atts['id']);
        $condominiosList = CondominioHandler::getCond();
        $this->render('edit_prd', [
            'loggedUser' => $this->loggedUser,
            'prdItem' => $prdItem,
            'condominios' => $condominiosList
        ]);

    }

    public function saveMorador() {
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'name');
        $condominio = filter_input(INPUT_POST, 'condominio');

        if($nome && $condominio) {
            CondominioHandler::savePrd($id, $nome, $condominio);
            $this->redirect('/app/predios');
        }
    }

}
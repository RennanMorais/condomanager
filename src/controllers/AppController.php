<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\StatementHandler;

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

    public function condominio() {
        $this->render('condominio', [
            'loggedUser' => $this->loggedUser
        ]);
    }

}
<?php
namespace src\controllers;

use \core\Controller;
use \src\models\User;
use \src\handlers\UserHandler;

class DashController extends Controller {

    private $loggedUser;
    
    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $this->render('dash', [
            'loggedUser' => $this->loggedUser,
        ]);
    }

}
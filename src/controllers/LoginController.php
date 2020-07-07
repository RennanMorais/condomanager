<?php
namespace src\controllers;

use \core\Controller;

class LoginController extends Controller {

    public function index() {
        $this->render('login');
    }

}
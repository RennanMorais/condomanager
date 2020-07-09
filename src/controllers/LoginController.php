<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;

class LoginController extends Controller {

    public function index() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('login', [
            'flash' => $flash
        ]);
    }

    public function login() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        if($email && $password) {
            $token = UserHandler::verifyLogin($email, $password);
            if($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/condosystem');
            } else {
                $_SESSION['flash'] = "E-mail e/ou senha inválidos.";
                $this->redirect('/login');
            }
        } else {
            $this->redirect('/login');
        }
    }

    public function registro() {

        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone');
        $password = filter_input(INPUT_POST, 'password');

        if($name && $email && $phone && $password) {

            $token = UserHandler::addUser($name, $email, $phone, $password);
            $_SESSION['token'] = $token;
            $this->redirect('/condosystem');
            
        } else {
            $this->redirect('/login');
        }
    }

}
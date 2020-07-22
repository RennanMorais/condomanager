<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;

class LoginController extends Controller {

    public function index() {
        $flashDanger = '';
        $flashWarning = '';
        $flashSuccess = '';
        if(!empty($_SESSION['flashDanger']) || !empty($_SESSION['flashWarning']) || !empty($_SESSION['flashSuccess'])) {
            $flashDanger = $_SESSION['flashDanger'];
            $_SESSION['flashDanger'] = '';
        }

        if(!empty($_SESSION['flashWarning'])) {
            $flashWarning = $_SESSION['flashWarning'];
            $_SESSION['flashWarning'] = '';
        }

        if(!empty($_SESSION['flashSuccess'])) {
            $flashSuccess = $_SESSION['flashSuccess'];
            $_SESSION['flashSuccess'] = '';
        }

        $this->render('login', [
            'flashDanger' => $flashDanger,
            'flashWarning' => $flashWarning,
            'flashSuccess' => $flashSuccess
        ]);
    }

    public function login() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        if($email && $password) {
            $token = UserHandler::verifyLogin($email, $password);
            if($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/app');
            } else {
                $_SESSION['flashDanger'] = "E-mail e/ou senha inválidos.";
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

            if(UserHandler::emailExists($email) === false) {

                $token = UserHandler::addUser($name, $email, $phone, $password);
                $_SESSION['token'] = $token;
                $this->redirect('/app');

            } else {
                $_SESSION['flashWarning'] = "E-mail já cadastrado, tente outro!";
                $this->redirect('/login');
            }

            
            
        } else {
            $this->redirect('/login');
        }
    }

    public function forgotpass() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        
        if($email) {
            if(UserHandler::emailExists($email) === true) {

                $_SESSION['flashSuccess'] = "Pronto! Um link para alterar sua senha foi enviado para: ".$email;
                $this->redirect('/login');

            } else {
                $_SESSION['flashDanger'] = "E-mail não cadastrado.";
                $this->redirect('/login');
            }
        }

    }

    public function logout() {
        $_SESSION['token'] = '';
        $this->redirect('/login');
    }

    public function getForgotForm() {
        $this->render('/forms/forgotpass');
    }

    public function getRegistroForm() {
        $this->render('/forms/registro');
    }

}
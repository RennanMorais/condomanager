<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UsuariosHandler;

class LoginController extends Controller {

    public function index() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
            echo $_SESSION['flash'];
        }
        $this->render('login', [
            'flash' => $flash
        ]);
    }

    public function login() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        if($email && $password) {
            $token = UsuariosHandler::verifyLogin($email, $password);
            if($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/');
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
        $password = filter_input(INPUT_POST, 'password');
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        if($name && $email && $password && $birthdate) {
            $birthdate = explode('/', $birthdate);
            if(count($birthdate) != 3) {
                $_SESSION['flash'] = "Data de nascimento invalida.";
                $this->redirect('/cadastro');
            }
            $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
            if(strtotime($birthdate) == false) {
                $_SESSION['flash'] = "Data de nascimento invalida.";
                $this->redirect('/cadastro');
            }
            if(UserHandler::emailExists($email) === false) {
                $token = UserHandler::addUser($name, $email, $password, $birthdate);
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = "E-mail já esta cadastrado!";
                $this->redirect('/cadastro');
            }
        } else {
            $this->redirect('/login');
        }
    }

}
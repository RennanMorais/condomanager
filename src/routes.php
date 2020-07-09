<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

//rotas tela de login
$router->get('/login', 'LoginController@index');
$router->post('/login', 'LoginController@login');
$router->post('/login/registro', 'LoginController@registro');
$router->post('/login/forgot', 'LoginController@forgotpass');

//rotas do sistema
$router->get('/condosystem', 'DashController@index');
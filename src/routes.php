<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

//rotas tela de login
$router->get('/login', 'LoginController@index');
$router->post('/login', 'LoginController@login');
$router->post('/login/registro', 'LoginController@registro');
$router->post('/login/forgot', 'LoginController@forgotpass');
$router->get('/sair', 'LoginController@logout');

//rotas do sistema
$router->get('/app', 'AppController@index');
$router->post('/app/send_statement', 'AppController@send_statement');
$router->get('/app/condominios', 'AppController@condominio');
$router->post('/app/condominios/add_cond', 'AppController@addCondominio');
$router->get('/app/condominios/edit_cond/{id}', 'AppController@editCondominio');
$router->post('/app/condominios/edit_cond/save', 'AppController@saveCondominio');
$router->get('/app/condominios/delete_cond', 'AppController@deleteCondominio');

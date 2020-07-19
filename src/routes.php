<?php
use core\Router;

$router = new Router();

//Rota Landing Page
$router->get('/', 'HomeController@index');

//Rotas de login
$router->get('/login', 'LoginController@index');
$router->post('/login', 'LoginController@login');
$router->post('/login/registro', 'LoginController@registro');
$router->post('/login/forgot', 'LoginController@forgotpass');
$router->get('/sair', 'LoginController@logout');

//Rotas do sistema
//Rotas dos Condominios
$router->get('/app', 'AppController@index');
$router->post('/app/send_statement', 'AppController@send_statement');
$router->get('/app/condominios', 'AppController@condominio');
$router->post('/app/condominios/add_cond', 'AppController@addCondominio');
$router->get('/app/condominios/edit_cond/{id}', 'AppController@editCondominio');
$router->post('/app/condominios/edit_cond/save', 'AppController@saveCondominio');
$router->get('/app/condominios/delete_cond', 'AppController@deleteCondominio');

//Rotas dos Predios
$router->get('/app/predios', 'AppController@predio');
$router->post('/app/predios/add_predio', 'AppController@addPredio');
$router->get('/app/predios/edit_prd/{id}', 'AppController@editPredio');
$router->post('/app/predios/edit_prd/save', 'AppController@savePredio');
$router->get('/app/predios/delete_prd', 'AppController@deletePredio');

//Rotas Moradores
$router->get('/app/moradores', 'AppController@morador');
$router->post('/app/moradores/add_morador', 'AppController@addMorador');
$router->get('/app/moradores/edit_morador/{id}', 'AppController@editMorador');
$router->post('/app/moradores/edit_morador/save', 'AppController@saveMorador');
$router->get('/app/moradores/delete_morador', 'AppController@deleteMorador');
<?php
use core\Router;
use src\controllers\AppController;

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
$router->get('/app/moradores/disable', 'AppController@disableMorador');

//Rotas Áreas Comuns
$router->get('/app/area_comum', 'AppController@areas');
$router->post('/app/area_comum/add_area', 'AppController@addArea');
$router->get('/app/area_comum/edit_area/{id}', 'AppController@editArea');
$router->post('/app/area_comum/edit_area/save', 'AppController@saveArea');
$router->get('/app/area_comum/delete_area', 'AppController@deleteArea');

//Rotas Reservas de Areas Comuns
$router->get('/app/reservas', 'AppController@reservas');
$router->post('/app/reservas/add_reserva', 'AppController@addReserva');
$router->get('/app/reservas/edit_reserva/{id}', 'AppController@editReserva');
$router->post('/app/reservas/edit_reserva/save', 'AppController@saveReserva');
$router->get('/app/reservas/aprovar', 'AppController@aprovar');
$router->get('/app/reservas/rejeitar', 'AppController@rejeitar');
$router->get('/app/reservas/delete_reserva', 'AppController@deleteReserva');

//Rotas Pets
$router->get('/app/pets', 'AppController@pets');
$router->post('/app/pets/add_pet', 'AppController@addPet');
$router->get('/app/pets/edit_pet/{id}', 'AppController@editPet');
$router->post('/app/pets/edit_pet/save', 'AppController@savePet');
$router->get('/app/pets/delete_pet', 'AppController@deletePet');

//Rotas Veiculos
$router->get('/app/veiculos', 'AppController@veiculos');
$router->post('/app/veiculos/add_veiculo', 'AppController@addVeiculo');
$router->get('/app/veiculos/edit_veiculo/{id}', 'AppController@editVeiculo');
$router->post('/app/veiculos/edit_veiculo/save', 'AppController@saveVeiculo');
$router->get('/app/veiculos/delete_veiculo', 'AppController@deleteVeiculo');

//Rotas Assembleias
$router->get('/app/assembleias', 'AppController@assembleias');
$router->post('/app/assembleias/add_assembleia', 'AppController@addAssembleia');
$router->get('/app/assembleias/edit_assembleia/{id}', 'AppController@editAssembleia');
$router->post('/app/assembleias/edit_assembleia/save', 'AppController@saveAssembleia');
$router->get('/app/assembleias/delete_assembleia', 'AppController@deleteAssembleia');

//Rotas Ocorrencias
$router->get('/app/ocorrencias', 'AppController@ocorrencias');
$router->post('/app/ocorrencias/add_ocorrencia', 'AppController@addOcorrencia');


//Rotas formularios Login
$router->get('/forgot', 'LoginController@getForgotForm');
$router->get('/registro', 'LoginController@getRegistroForm');

//Requisições Ajax
$router->post('/app/getphone', 'AppController@getMoradorPhoneField');
$router->post('/app/getarea', 'AppController@getAreaField');
$router->post('/app/getmorador', 'AppController@getMoradorField');
$router->post('/app/getmoradorbypredio', 'AppController@getMoradorPredioField');
$router->post('/app/getpredios', 'AppController@getPredioField');
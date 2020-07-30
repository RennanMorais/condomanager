<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\StatementHandler;
use \src\handlers\CondominioHandler;

class AppController extends Controller {

    private $loggedUser;
    private $tokendiff;
    
    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }


    //Funções da pagina inicial do sistema
    public function index() {

        $statementsFeed = StatementHandler::getStatement(); //Pega todos os comunicados da Administração
        $countMoradores = UserHandler::countMoradores(); //Conta todos os moradores registrados
        $countReservasPendentes = CondominioHandler::countReservaPendente(); //Conta todas as reservas pendentes
        $countOcorrenciasPendentes = CondominioHandler::countOcorrenciaPendente(); //Conta todas as ocorrências pendentes

        $this->render('dash', [
            'loggedUser' => $this->loggedUser,
            'statementsFeed' => $statementsFeed,
            'countMoradores' => $countMoradores,
            'countReservas' => $countReservasPendentes,
            'countOcorrencias' => $countOcorrenciasPendentes,
        ]);
    }

    public function send_statement() {
        $text = filter_input(INPUT_POST, 'text-statement');

        if($text) {
            StatementHandler::addStatement($text);
            $this->redirect('/app');
        }

    }


    //Requisições Ajax para os campos select
    public function getMoradorPhoneField() {
        $id_morador = filter_input(INPUT_POST, 'id_morador');
        $phone = UserHandler::getMoradorPhone($id_morador);
        echo json_encode($phone);
    }

    public function getAreaField() {
        $idCond = filter_input(INPUT_POST, 'id_cond');
        $areaList = CondominioHandler::getAreaListByCond($idCond);
        echo json_encode($areaList);
    }

    public function getMoradorField() {
        $idCond = filter_input(INPUT_POST, 'id_cond');
        $moradorList = UserHandler::getMoradorField($idCond);
        echo json_encode($moradorList);
    }

    public function getPredioField() {
        $idCond = filter_input(INPUT_POST, 'id_cond');
        $prdList = CondominioHandler::getPrdListByCond($idCond);
        echo json_encode($prdList);
    }

    public function getMoradorPredioField() {
        $id_predio = filter_input(INPUT_POST, 'id_predio');
        $morador_predio = UserHandler::getMoradorListPorPredio($id_predio);
        echo json_encode($morador_predio); 
    }

    public function getDatasOcorrencias() {
        $datas = CondominioHandler::getUltimasDatas();
        echo json_encode($datas);
    }

    public function countOcorrencias() {
        $dia = filter_input(INPUT_POST, 'data');
        $count_ocorrencia = CondominioHandler::countOcorrencias($dia);
        echo json_encode($count_ocorrencia);
    }

    
    //Funções da pagina de condominio
    public function condominio() {
        $condominiosList = CondominioHandler::getCond();
        $this->render('condominio', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList
        ]);
    }

    public function addCondominio() {
        $name = filter_input(INPUT_POST, 'name');
        $cnpj = filter_input(INPUT_POST, 'cnpj');
        $email = filter_input(INPUT_POST, 'email');
        $endereco = filter_input(INPUT_POST, 'endereco');
        $numero = filter_input(INPUT_POST, 'numero');
        $complemento = filter_input(INPUT_POST, 'complemento');
        $bairro = filter_input(INPUT_POST, 'bairro');

        if($name && $email) {
            CondominioHandler::addCond($name, $cnpj, $email, $endereco, $numero, $complemento, $bairro);
            $this->redirect('/app/condominios');
        }

    }

    public function editCondominio($atts) {
        $condItem = CondominioHandler::getCondItem($atts['id']);
        $this->render('edit_cond', [
            'loggedUser' => $this->loggedUser,
            'condItem' => $condItem
        ]);

    }

    public function saveCondominio() {
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'name');
        $cnpj = filter_input(INPUT_POST, 'cnpj');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $endereco = filter_input(INPUT_POST, 'endereco');
        $numero = filter_input(INPUT_POST, 'numero');
        $complemento = filter_input(INPUT_POST, 'complemento');
        $bairro = filter_input(INPUT_POST, 'bairro');

        if($nome && $email) {
            CondominioHandler::saveCond($id, $nome, $cnpj, $email, $endereco, $numero, $complemento, $bairro);
            $this->redirect('/app/condominios');
        }
    }

    public function deleteCondominio() {
        $condominioId = filter_input(INPUT_GET, 'id');
        if($condominioId) {
            CondominioHandler::delCond($condominioId);
            $this->redirect('/app/condominios');
        }

    }


    //Funções da página de prédios
    public function predio() {
        $prediosList = CondominioHandler::getPredios();
        $condominiosList = CondominioHandler::getCond();
        $this->render('predio', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'prediosList' => $prediosList
        ]);
    }

    public function addPredio() {
        $predio = filter_input(INPUT_POST, 'name');
        $condominio = filter_input(INPUT_POST, 'condominio');

        if($predio && $condominio) {
            CondominioHandler::addPrd($predio, $condominio);
            $this->redirect('/app/predios');
        }
    }

    public function editPredio($atts) {
        $prdItem = CondominioHandler::getPrdItem($atts['id']);
        $condominiosList = CondominioHandler::getCond();
        $this->render('edit_prd', [
            'loggedUser' => $this->loggedUser,
            'prdItem' => $prdItem,
            'condominios' => $condominiosList
        ]);

    }

    public function savePredio() {
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'name');
        $condominio = filter_input(INPUT_POST, 'condominio');

        if($nome && $condominio) {
            CondominioHandler::savePrd($id, $nome, $condominio);
            $this->redirect('/app/predios');
        }
    }

    public function deletePredio() {
        $predioId = filter_input(INPUT_GET, 'id');
        if($predioId) {
            CondominioHandler::delPrd($predioId);
            $this->redirect('/app/predios');
        }

    }


    //Funções da página de moradores
    public function morador() {
        $prediosList = CondominioHandler::getPredios();
        $condominiosList = CondominioHandler::getCond();
        $moradorList = CondominioHandler::getMorador();
        $this->render('morador', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'predios' => $prediosList,
            'moradores' => $moradorList
        ]);
    }

    public function addMorador() {
        $nome = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $rg = filter_input(INPUT_POST, 'rg');
        $cpf = filter_input(INPUT_POST, 'cpf');
        $phone = filter_input(INPUT_POST, 'phone');
        $tipo = filter_input(INPUT_POST, 'tipo');
        $condominio = filter_input(INPUT_POST, 'condominio');
        $predio = filter_input(INPUT_POST, 'predio');
        $apto = filter_input(INPUT_POST, 'apto');

        if($nome && $email) {
            UserHandler::addUserFromMorador($nome, $email, $rg, $cpf, $phone, $tipo, $condominio, $predio, $apto);
            $this->redirect('/app/moradores');
        }
    }

    public function editMorador($atts) {
        $moradorItem = CondominioHandler::getMoradorItem($atts['id']);
        $condominiosList = CondominioHandler::getCond();
        $prediosList = CondominioHandler::getPredios();
        $this->render('edit_morador', [
            'loggedUser' => $this->loggedUser,
            'morador' => $moradorItem,
            'condominios' => $condominiosList,
            'predios' => $prediosList
        ]);
    }

    public function saveMorador() {
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $rg = filter_input(INPUT_POST, 'rg');
        $cpf = filter_input(INPUT_POST, 'cpf');
        $phone = filter_input(INPUT_POST, 'phone');
        $tipo = filter_input(INPUT_POST, 'tipo');
        $condominio = filter_input(INPUT_POST, 'condominio');
        $predio = filter_input(INPUT_POST, 'predio');
        $apto = filter_input(INPUT_POST, 'apto');

        if($nome && $email) {
            CondominioHandler::saveMoradorFromMorador($id, $nome, $email, $rg, $cpf, $phone, $tipo, $condominio, $predio, $apto);
            $this->redirect('/app/moradores');
        }
    }

    public function disableMorador() {
        $moradorId = filter_input(INPUT_GET, 'id');
        if(!empty($moradorId)) {
            UserHandler::disableUser($moradorId);
            $this->redirect('/app/moradores');
        } else {
            $this->redirect('/app/moradores');
        }
    }


    //Funções da página de areas comuns
    public function areas() {
        $areasList = CondominioHandler::getAreas();
        $condominiosList = CondominioHandler::getCond();
        $this->render('areacomum', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'areas' => $areasList
        ]);
    }

    public function addArea() {
        $nome = filter_input(INPUT_POST, 'name');
        $condominio = filter_input(INPUT_POST, 'condominio');

        if($nome && $condominio) {
            CondominioHandler::addNewArea($nome, $condominio);
            $this->redirect('/app/area_comum');
        }
    }

    public function editArea($atts) {
        $areaComumItem = CondominioHandler::getAreaItem($atts['id']);
        $condominiosList = CondominioHandler::getCond();
        $this->render('edit_area', [
            'loggedUser' => $this->loggedUser,
            'areaComumItem' => $areaComumItem,
            'condominios' => $condominiosList
        ]);
    }

    public function saveArea() {
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'name');
        $condominio = filter_input(INPUT_POST, 'condominio');

        if($nome && $condominio) {
            CondominioHandler::saveAreaComum($id, $nome, $condominio);
            $this->redirect('/app/area_comum');
        }
    }

    public function deleteArea() {
        $idArea = filter_input(INPUT_GET, 'id');
        if($idArea) {
            CondominioHandler::delArea($idArea);
            $this->redirect('/app/area_comum');
        }
    }


    //Pagina de Reservas
    public function reservas() {
        $condominiosList = CondominioHandler::getCond();
        $reservaList = CondominioHandler::getReservas();

        $flashDateCheck = '';

        if(!empty($_SESSION['flashDateCheck'])) {
            $flashDateCheck = $_SESSION['flashDateCheck'];
            $_SESSION['flashDateCheck'] = '';
        }

        $this->render('reservas', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'reservas' => $reservaList,
            'flashDateCheck' => $flashDateCheck
        ]);
    }

    public function addReserva() {
        $id_condominio = filter_input(INPUT_POST, 'condominio');
        $id_morador = filter_input(INPUT_POST, 'morador');
        $id_area = filter_input(INPUT_POST, 'area');
        $nome_evento = filter_input(INPUT_POST, 'evento');
        $data = filter_input(INPUT_POST, 'data');
        $inicio = filter_input(INPUT_POST, 'inicio');
        $termino = filter_input(INPUT_POST, 'fim');

        if($id_condominio && $id_morador) {

            if(CondominioHandler::reservaDateCheck($id_condominio, $id_area, $data) === false) {
                CondominioHandler::addNewReserva($id_condominio, $id_morador, $id_area, $nome_evento, $data, $inicio, $termino);
                $this->redirect('/app/reservas');
            } else {
                $_SESSION['flashDateCheck'] = 'Já existe uma reserva marcada nesta data, tente outra.';
                $this->redirect('/app/reservas');
            }
       
        }
    }

    public function editReserva($atts) {
        $reserva = CondominioHandler::getReservaItem($atts['id']);
        $condominiosList = CondominioHandler::getCond();
        $this->render('edit_reserva', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'reserva' => $reserva
        ]);
    }

    public function saveReserva() {
        $id = filter_input(INPUT_POST, 'id');
        $id_condominio = filter_input(INPUT_POST, 'condominio');
        $id_morador = filter_input(INPUT_POST, 'morador');
        $id_area = filter_input(INPUT_POST, 'area');
        $evento = filter_input(INPUT_POST, 'evento');
        $data = filter_input(INPUT_POST, 'data');
        $inicio = filter_input(INPUT_POST, 'inicio');
        $termino = filter_input(INPUT_POST, 'fim');

        if($id_condominio && $id_morador) {
            CondominioHandler::saveReservaEdit($id, $id_condominio, $id_morador, $id_area, $evento, $data, $inicio, $termino);
            $this->redirect('/app/reservas');
        }
    }

    public function aprovar() {
        $id_reserva = filter_input(INPUT_GET, 'id');
        if($id_reserva) {
            CondominioHandler::aprovarReserva($id_reserva);
            $this->redirect('/app/reservas');
        }
    }

    public function rejeitar() {
        $id_reserva = filter_input(INPUT_GET, 'id');
        if($id_reserva) {
            CondominioHandler::rejeitarReserva($id_reserva);
            $this->redirect('/app/reservas');
        }
    }

    public function deleteReserva() {
        $id_reserva = filter_input(INPUT_GET, 'id');
        if($id_reserva) {
            CondominioHandler::delReserva($id_reserva);
            $this->redirect('/app/reservas');
        }
    }


    //Pagina Cadastro de Pets
    public function pets() {
        $moradorList = CondominioHandler::getMorador();
        $petsList = UserHandler::getPets();

        if(!empty($_SESSION['flashDateCheck'])) {
            $flashDateCheck = $_SESSION['flashDateCheck'];
            $_SESSION['flashDateCheck'] = '';
        }

        $this->render('pets', [
            'loggedUser' => $this->loggedUser,
            'moradores' => $moradorList,
            'petsList' => $petsList 
        ]);
    }

    public function addPet() {
        $nome = filter_input(INPUT_POST, 'nome');
        $tipo = filter_input(INPUT_POST, 'tipo');
        $sexo = filter_input(INPUT_POST, 'sexo');
        $id_morador = filter_input(INPUT_POST, 'proprietario');
        $phone = filter_input(INPUT_POST, 'phone');

        if($nome && $tipo) {
            UserHandler::addPets($nome, $tipo, $sexo, $id_morador, $phone);
            $this->redirect('/app/pets');
        } else {
            $this->redirect('/app/pets');
        }
    }

    public function editPet($atts) {
        $petItem = UserHandler::getPetItem($atts['id']);
        $moradorList = CondominioHandler::getMorador();
        $this->render('edit_pet', [
            'loggedUser' => $this->loggedUser,
            'moradores' => $moradorList,
            'petItem' => $petItem
        ]);
    }

    public function savePet() {
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'nome');
        $tipo = filter_input(INPUT_POST, 'tipo');
        $sexo = filter_input(INPUT_POST, 'sexo');
        $id_morador = filter_input(INPUT_POST, 'proprietario');
        $phone = filter_input(INPUT_POST, 'phone');

        if($nome && $tipo) {
            UserHandler::savePets($id, $nome, $tipo, $sexo, $id_morador, $phone);
            $this->redirect('/app/pets');
        } else {
            $this->redirect('/app/pets');
        }
    }

    public function deletePet() {
        $id_pet = filter_input(INPUT_GET, 'id');
        if($id_pet) {
            UserHandler::delPet($id_pet);
            $this->redirect('/app/pets');
        }
    }


    // Pagina de veiculos
    public function veiculos() {
        $veiculosList = UserHandler::getVeiculos();
        $condominiosList = CondominioHandler::getCond();
        $this->render('veiculo', [
            'loggedUser' => $this->loggedUser,
            'veiculos' => $veiculosList,
            'condominios' => $condominiosList
        ]);
    }

    public function addVeiculo() {
        $condominio_id = filter_input(INPUT_POST, 'condominio');
        $predio_id = filter_input(INPUT_POST, 'predio');
        $morador_id = filter_input(INPUT_POST, 'morador');
        $tipo = filter_input(INPUT_POST, 'tipo');
        $marca = filter_input(INPUT_POST, 'marca');
        $modelo = filter_input(INPUT_POST, 'modelo');
        $placa = filter_input(INPUT_POST, 'placa');

        if($condominio_id) {
            UserHandler::addVeiculo($condominio_id, $predio_id, $morador_id, $tipo, $marca, $modelo, $placa);
            $this->redirect('/app/veiculos');
        } else {
            $this->redirect('/app/veiculos');
        }
    }

    public function editVeiculo($atts) {
        $condominiosList = CondominioHandler::getCond();
        $veiculoItem = UserHandler::getVeiculoItem($atts['id']);
        $this->render('edit_veiculo', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'veiculo' => $veiculoItem
        ]);
    }

    public function saveVeiculo() {
        $id = filter_input(INPUT_POST, 'id');
        $condominio_id = filter_input(INPUT_POST, 'condominio');
        $predio_id = filter_input(INPUT_POST, 'predio');
        $morador_id = filter_input(INPUT_POST, 'morador');
        $tipo = filter_input(INPUT_POST, 'tipo');
        $marca = filter_input(INPUT_POST, 'marca');
        $modelo = filter_input(INPUT_POST, 'modelo');
        $placa = filter_input(INPUT_POST, 'placa');

        if($condominio_id) {
            UserHandler::saveVeiculo($id, $condominio_id, $predio_id, $morador_id, $tipo, $marca, $modelo, $placa);
            $this->redirect('/app/veiculos');
        } else {
            $this->redirect('/app/veiculos');
        }
    }

    public function deleteVeiculo() {
        $id_veiculo = filter_input(INPUT_GET, 'id');
        if($id_veiculo) {
            UserHandler::deleteVeiculo($id_veiculo);
            $this->redirect('/app/veiculos');
        }
    }


    //Agenda Assembleias
    public function assembleias() {
        $condominiosList = CondominioHandler::getCond();
        $assembleiasList = CondominioHandler::getAssembleias();

        $this->render('assembleias', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'assembleias' => $assembleiasList
        ]);
    }

    public function addAssembleia() {
        $titulo = filter_input(INPUT_POST, 'titulo');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $data = filter_input(INPUT_POST, 'data');
        $hora = filter_input(INPUT_POST, 'hora');
        $local = filter_input(INPUT_POST, 'local');
        $descricao_local = filter_input(INPUT_POST, 'descricao_local');

        if($titulo && $descricao) {
            CondominioHandler::addAssembleia($titulo, $descricao, $data, $hora, $local, $descricao_local);
            $this->redirect('/app/assembleias');
        }
    }

    public function editAssembleia($atts) {
        $condominiosList = CondominioHandler::getCond();
        $assembleiaItem = CondominioHandler::getAssembleiaItem($atts['id']);
        $this->render('edit_assembleia', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'assembleia' => $assembleiaItem
        ]);
    }

    public function saveAssembleia() {
        $id = filter_input(INPUT_POST, 'id');
        $titulo = filter_input(INPUT_POST, 'titulo');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $data = filter_input(INPUT_POST, 'data');
        $hora = filter_input(INPUT_POST, 'hora');
        $local = filter_input(INPUT_POST, 'local');
        $descricao_local = filter_input(INPUT_POST, 'descricao_local');

        if($titulo && $descricao) {
            CondominioHandler::saveAssembleia($id, $titulo, $descricao, $data, $hora, $local, $descricao_local);
            $this->redirect('/app/assembleias');
        }
    }

    public function deleteAssembleia() {
        $id_assembleia = filter_input(INPUT_GET, 'id');
        if($id_assembleia) {
            CondominioHandler::deleteAssembleia($id_assembleia);
            $this->redirect('/app/assembleias');
        }
    }


    //Pagina Ocorrencias
    public function ocorrencias() {
        $condominiosList = CondominioHandler::getCond();
        $ocorrenciasList = CondominioHandler::getOcorrencias();

        $this->render('ocorrencias', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'ocorrencias' => $ocorrenciasList
        ]);
    }

    public function addOcorrencia() {
        $data = filter_input(INPUT_POST, 'data');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $id_condominio = filter_input(INPUT_POST, 'condominio');
        $id_morador = filter_input(INPUT_POST, 'morador');
        $contato = filter_input(INPUT_POST, 'phone');

        if($data) {
            CondominioHandler::addNewOcorrencia($data, $descricao, $id_condominio, $id_morador, $contato);
            $this->redirect('/app/ocorrencias');
        }
    }

    public function editOcorrencia($atts) {
        $condominiosList = CondominioHandler::getCond();
        $ocorrenciaItem = CondominioHandler::getOcorrenciaItem($atts['id']); 

        $this->render('edit_ocorrencia', [
            'loggedUser' => $this->loggedUser,
            'condominios' => $condominiosList,
            'ocorrencia' => $ocorrenciaItem
        ]);
    }

    public function saveOcorrencia() {
        $id = filter_input(INPUT_POST, 'id');
        $data = filter_input(INPUT_POST, 'data');
        $descricao = filter_input(INPUT_POST, 'descricao');
        $id_condominio = filter_input(INPUT_POST, 'condominio');
        $id_morador = filter_input(INPUT_POST, 'morador');
        $contato = filter_input(INPUT_POST, 'phone');

        if($data) {
            CondominioHandler::saveOcorrencia($id, $data, $descricao, $id_condominio, $id_morador, $contato);
            $this->redirect('/app/ocorrencias');
        }
    }

    public function aceitar() {
        $id_ocorrencia = filter_input(INPUT_GET, 'id');
        
        if($id_ocorrencia) {
            CondominioHandler::aceitarOcorrencia($id_ocorrencia);
            $this->redirect('/app/ocorrencias');
        } else {
            $this->redirect('/app/ocorrencias');
        }

    }

    public function finalizar() {
        $id_ocorrencia = filter_input(INPUT_POST, 'id');
        $mensagem = filter_input(INPUT_POST, 'mensagem');
        
        if($id_ocorrencia) {
            CondominioHandler::finalizarOcorrencia($id_ocorrencia, $mensagem);
            $this->redirect('/app/ocorrencias');
        } else {
            $this->redirect('/app/ocorrencias');
        }

    }

    public function deleteOcorrencia() {
        $id_ocorrencia = filter_input(INPUT_GET, 'id');

        if($id_ocorrencia) {
            CondominioHandler::deleteOcorrencia($id_ocorrencia);
            $this->redirect('/app/ocorrencias');
        } else {
            $this->redirect('/app/ocorrencias');
        }
    }
}
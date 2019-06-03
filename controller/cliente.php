<?php
session_start();
error_reporting(0);
require_once "../model/clienteEntity.php";
require_once "../service/clienteService.php";

if($_SESSION["USUARIO_LOGADO"] == NULL){
	 header("Location: ../view/login/login.html?error=1");
}

if (array_key_exists('Limpar', $_POST)) {
    header("Refresh: 0;url=../view/cadastro/cadastro.html");
}

if (array_key_exists('submit', $_POST)) {
	if($_POST['idCliente'] == NULL){
		ClienteController::cadastraCliente();
	}else{
		ClienteController::alteraCliente($_POST['idCliente']);
	}	
    
}

$id = $_GET['id'];
if($id != NULL){
    ClienteController::excluiCliente($id);
}else{
    header("Location: ../view/consulta/consulta.php");
}

class ClienteController {

    function cadastraCliente() {
        $cli = new Cliente();
        $cli->setNomeCompleto($_POST['nameCompleto']);
        $cli->setNomeUsuario($_POST['nameUsuario']);
        $cli->setRg($_POST['rg']);
        $cli->setEmail($_POST['email']);
        $cli->setEndereco($_POST['address']);

        ClienteService::cadastraUsuario($cli->getNomeCompleto(), $cli->getNomeUsuario(), $cli->getRg(), $cli->getEmail(), $cli->getEndereco());
		$_SESSION["msg"] = "Cadastrado com sucesso";
       header("Location: ../view/consulta/consulta.php");

    }
	
	function alteraCliente($codigo){
		$cli = new Cliente();
        $cli->setNomeCompleto($_POST['nameCompleto']);
        $cli->setNomeUsuario($_POST['nameUsuario']);
        $cli->setRg($_POST['rg']);
        $cli->setEmail($_POST['email']);
        $cli->setEndereco($_POST['address']);
		$cli->setCodigo($codigo);
		
		ClienteService::alteraCliente($cli);
		$_SESSION["msg"] = "Alterado com sucesso";
		header("Location: ../view/consulta/consulta.php");
	}	
    
    function excluiCliente($id){
        ClienteService::excluiCliente($id);
		$_SESSION["msg"] = "Excluido com sucesso";
        header("Location: ../view/consulta/consulta.php");
    }

}

?>

<?php

require_once "../model/clienteEntity.php";
require_once "../service/clienteService.php";

if (array_key_exists('Voltar', $_POST)) {
    header("Location: ../view/paginaInicial/consulta.php");
}

if (array_key_exists('Limpar', $_POST)) {
    header("Refresh: 0;url=../view/cadastro/cadastro.html");
}

if (array_key_exists('submit', $_POST)) {
    ClienteController::cadastraCliente();
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
        header("Location: ../view/paginaInicial/consulta.php");
    }

}

?>

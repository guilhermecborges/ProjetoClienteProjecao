<?php

include($_SERVER['DOCUMENT_ROOT']."/ProjetoClienteProjecao/repository/clienteRepository.php");

class ClienteService{
    
    function cadastraUsuario($nomeCompleto,$nomeUsuario,$rg,$email,$endereco){
        ClienteRepository::cadastraUsuario($nomeCompleto,$nomeUsuario,$rg,$email,$endereco);
    }
	
	function alteraCliente($cliente){
        ClienteRepository::alteraCliente($cliente);
    }

    function excluiCliente($id) {
        ClienteRepository::excluiCliente($id);
    }

}

?>

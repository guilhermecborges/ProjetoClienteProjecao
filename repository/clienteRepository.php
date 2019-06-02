<?php

require_once "../repository/loginRepository.php";
require_once "../model/clienteEntity.php";

class ClienteRepository extends LoginRepository{
    
    function cadastraUsuario($nomeCompleto,$nomeUsuario,$rg,$email,$endereco){
        $conecta = LoginRepository::iniciaConexao();
        $sql = "INSERT INTO CLIENTE(NOME_COMPLETO,NOME_USUARIO,RG,EMAIL,ENDERECO) VALUES (?,?,?,?,?)";
        if($stmt = $conecta->prepare($sql)){
            $stmt->bind_param('ssiss', $nomeCompleto,$nomeUsuario,$rg,$email,$endereco);
            $stmt->execute();
            $stmt->close();
        }
        $conecta->close();
    }

    public static function excluiCliente($id) {
        $conecta = LoginRepository::iniciaConexao();
        $sql = "DELETE FROM CLIENTE WHERE ID_CLIENTE = ?";
        if($stmt = $conecta->prepare($sql)){
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();
            $conecta->close();
        }
        $conecta->close();
    }

}

?>

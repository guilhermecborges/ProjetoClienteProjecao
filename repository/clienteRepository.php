<?php

require_once "../repository/loginRepository.php";

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
    
}

?>

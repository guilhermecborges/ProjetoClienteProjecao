<?php

class LoginRepository{
    
    function iniciaConexao(){
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "teste";
        $conecta = new mysqli($servidor,$usuario,$senha);
        if ($conecta->connect_errno) {
            echo "Connect failed: %s\n". $conecta->connect_error;
            exit();
        }
//        return $conecta;
    }
}

?>
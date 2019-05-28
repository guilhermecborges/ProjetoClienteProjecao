<?php

class LoginRepository{
    
    public function iniciaConexao(){
        return new mysqli("localhost","root","","projeto_cliente");
    }

    public function verificaUsuario($login, $senha) {
        $conecta = LoginRepository::iniciaConexao();
        $sql = "SELECT COUNT(1) FROM USUARIO WHERE LOGIN = ? AND SENHA = ? ";
        $stmt = $conecta->prepare($sql);
        $stmt->bind_param('ss', $login, $senha);
        $retorno = $stmt->execute();
        $stmt->close();
        $conecta->close();
        return $retorno;
    }

}

?>
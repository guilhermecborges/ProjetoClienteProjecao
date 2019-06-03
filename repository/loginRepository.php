<?php

class LoginRepository{
    
    public function iniciaConexao(){
        return new mysqli("localhost","root","","projeto_cliente");
    }

    public function verificaUsuario($login, $senha) {
        $conecta = LoginRepository::iniciaConexao();
        if($conecta->connect_error){
            return 0;
        }else{
            $sql = "SELECT COUNT(1) FROM USUARIO WHERE LOGIN = ? AND SENHA = ? ";
            if($stmt = $conecta->prepare($sql)){
                $stmt->bind_param('ss', $login, $senha);
                $retorno = $stmt->execute();
                $stmt->bind_result($retorno);
                $stmt->fetch();
                $stmt->close();
                return $retorno;
            }
            $conecta->close();
        }
        return 0;
    }
    
    public function verificaUsuarioExistente($login){
        $conecta = LoginRepository::iniciaConexao();
        $sql = "SELECT COUNT(1) FROM USUARIO WHERE LOGIN = ? ";
        if($stmt = $conecta->prepare($sql)){
            $stmt->bind_param('s', $login);
            $retorno = $stmt->execute();
            $stmt->bind_result($retorno);
            $stmt->fetch();
            return $retorno;
            $stmt->close();
        }
        $conecta->close();
        return 0;
    }

    public static function insereUsuario($login, $senha) {
        $conecta = LoginRepository::iniciaConexao();
        $sql = "INSERT INTO USUARIO(LOGIN,SENHA,TIPO_PERFIL) VALUES (?,?,'1')";
        if($stmt = $conecta->prepare($sql)){
            $stmt->bind_param('ss', $login,$senha);
            $stmt->execute();
            $stmt->close();
        }
        $conecta->close();
        
    }

}

?>
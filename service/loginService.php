<?php
require_once "../repository/loginRepository.php";

class LoginService{
    
    public function iniciaConexao(){
        return LoginRepository::iniciaConexao();
    }
    
    public function verificaUsuario($login,$senha){
        return LoginRepository::verificaUsuario($login,$senha);
    }
    
}
?>

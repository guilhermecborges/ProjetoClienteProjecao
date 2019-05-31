<?php
require_once "../repository/loginRepository.php";

class LoginService{
    
    public function iniciaConexao(){
        return LoginRepository::iniciaConexao();
    }
    
    public function verificaUsuario($login,$senha){
        return LoginRepository::verificaUsuario($login,$senha);
    }
    
    public function verificaUsuarioExistente($login){
        return LoginRepository::verificaUsuarioExistente($login);
    }

    public static function insereUsuario($login, $senha) {
        LoginRepository::insereUsuario($login,$senha);
    }

}
?>

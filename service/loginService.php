<?php
require_once "../repository/loginRepository.php";

class LoginService{

    function iniciaConexao(){
        $loginRepository = new LoginRepository();
        $loginRepository->iniciaConexao();
    }
    
}
?>

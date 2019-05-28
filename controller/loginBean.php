<?php
    
require_once "../model/usuarioEntity.php";
require_once "../service/loginService.php";

$loginService = new LoginService();
LoginBean::verificaUsuario();
session_start();
        
class LoginBean{
        
    public function verificaUsuario(){
        $usu = new Usuario;
        $usu->setLogin($_POST['user_login']);
        $usu->setSenha($_POST['user_pass']);
        LoginBean::login($usu->getLogin(), $usu->getSenha());
        
    }

    public function login($login, $senha) {
        $sql = LoginService::verificaUsuario($login, $senha);
        if ($sql == 1) {
            $_SESSION['login_user'] = $login;
            $_SESSION['login_pass'] = $senha;
            header("Location: ../view/paginaInicial/pgTable.html");
        } else {
            header("Location: ../view/login/login.html?error=1");
        }
    }
}
?>


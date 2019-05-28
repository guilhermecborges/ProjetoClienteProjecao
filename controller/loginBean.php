<?php
    
require_once "../model/usuarioEntity.php";
require_once "../service/loginService.php";

$loginService = new LoginService();
$conecta = $loginService->iniciaConexao();
LoginBean::verificaUsuario();
        
class LoginBean{
        
    function verificaUsuario(){
        $usu = new Usuario;
        $usu->setLogin($_POST['user_login']);
        $usu->setSenha($_POST['user_pass']);
        if($usu->getLogin() != NULL && $usu->getSenha() != null){
            echo login($usu->getLogin(), $usu->getSenha(), $conecta);
        }else{
            echo "teste";
        }
    }

    function login($login, $senha, $conecta) {
        $sql = "select * from usuario where login ='" . $login . "' and senha = '" . $senha . "'";
        $resultado = $conecta->query($sql);
        if ($resultado->num_rows == 1) {
            $_SESSION['login_user'] = $login;
            $_SESSION['login_pass'] = $senha;
            header("Location: ../view/paginaInicial/paginaInicial.html");
        } else {
            header("Location: ../view/login/login.html?error=1");
        }
    }
}
//$obj_Usuario = new Usuario();
//echo "<script type='text/javascript'>alert('$message');</script>"
?>


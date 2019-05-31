<?php
    
require_once "../model/usuarioEntity.php";
require_once "../service/loginService.php";

if(array_key_exists('entrar', $_POST)){
    $usu = LoginBean::verificaUsuario();
    LoginBean::login($usu->getLogin(), $usu->getSenha());
}

if(array_key_exists('cadastrar', $_POST)){
    $usu = new Usuario();
    $usu->setLogin($_POST['user_name']);
    $usu->setSenha($_POST['user_pass']);
    LoginBean::cadastraUsuario($usu->getLogin(), $usu->getSenha());
}
        
class LoginBean{


    public function verificaUsuario(){
        $usu = new Usuario;
        $usu->setLogin($_POST['user_login']);
        $usu->setSenha($_POST['user_pass']);
        return $usu;
        
    }

    public function login($login, $senha) {
        $countUsuario = LoginService::verificaUsuario($login, $senha);
        if ($countUsuario == 1) {
            header("Location: ../view/paginaInicial/pgTable.html");
        } else {
            header("Location: ../view/login/login.html?error=1");
        }
    }
    
    public function cadastraUsuario($login,$senha){
        try{
            $countUsuario = LoginService::verificaUsuarioExistente($login);
            if($countUsuario == 1){
                throw new Exception ("<script language='JavaScript'>
                        window.location.href='javascript:history.go(-1)'
          		alert('Usuario já cadastrado!');
         		 </script>");
            }else{
                LoginService::insereUsuario($login,$senha);
                header("Location: ../view/login/login.html");
                echo "<script language='JavaScript'>
          		alert('Usuario cadastrado Com sucesso');
         		</script>";
            }
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
}
?>


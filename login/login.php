<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "projeto_cliente";
$conecta = new mysqli($servidor, $usuario, $senha, $banco);

require_once "../entidades/entidadeUsuario.php";

$usu = new Usuario;
$usu->setLogin($_POST['login']);
$usu->setSenha($_POST['senha']);
if($usu->getLogin() != NULL && $usu->getSenha() != null){
    echo login($usu->getLogin(), $usu->getSenha(), $conecta);
}
function login($login, $senha, $conecta) {
    $sql = "select * from usuario where login ='" . $login . "' and senha = '" . $senha . "'";
    $resultado = $conecta->query($sql);
    if ($resultado->num_rows == 1) {
        $_SESSION['login_user'] = $login;
        $_SESSION['login_pass'] = $senha;
        header("Location: ../paginaInicial/paginaInicial.html");
    } else {
        header("Location: ../login/login.html?error=1");
    }
}

//$obj_Usuario = new Usuario();
//echo "<script type='text/javascript'>alert('$message');</script>"
?>


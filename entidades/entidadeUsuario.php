<?php

class Usuario {

    private $codigo;
    private $login;
    private $senha;
    private $tipoPerfil;

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setTipoPerfil($tipoPerfil) {
        $this->tipoPerfil = $tipoPerfil;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getTipoPerfil() {
        return $this->tipoPerfil;
    }
}
?>

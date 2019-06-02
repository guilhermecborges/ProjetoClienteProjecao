<?php

class Cliente{
    private $codigo;
    private $nomeCompleto;
    private $nomeUsuario;
    private $rg;
    private $email;
    private $endereco;
    
    function getCodigo() {
        return $this->codigo;
    }

    function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function getRg() {
        return $this->rg;
    }

    function getEmail() {
        return $this->email;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }

    function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }


    
}

?>

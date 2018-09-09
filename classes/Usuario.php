<?php

require_once dirname(__FILE__) . '/../dao/UsuarioDao.php';

class Usuario {

    private $id;
    private $cpf;
    private $email;
    private $nome;
    private $imagem;
    private $avaliador;
    private $nivelAcesso;

    function __construct() {
        $this->avaliador = 0;
        $this->nivelAcesso = 0;
    }

    function getId() {
        return $this->id;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function getNome() {
        return $this->nome;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getAvaliador() {
        return $this->avaliador;
    }

    function getNivelAcesso() {
        return $this->nivelAcesso;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setAvaliador($avaliador) {
        if (!empty($avaliador)) {
            $this->avaliador = $avaliador;
        }
    }

    function setNivelAcesso($nivelAcesso) {
        $this->nivelAcesso = $nivelAcesso;
    }

    function salvar($senha) {
        $aux = UsuarioDao::salvar($senha, $this->cpf, $this->email, $this->nome,
                $this->avaliador, $this->nivelAcesso, $this->imagem);
        if ($aux > 0) {
            $this->id = $aux;
        }
        return $aux;
    }

}

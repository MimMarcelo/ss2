<?php

require_once dirname(__FILE__) . '/Conexao.php';

class UsuarioDao {
    public static function salvar($senha, $cpf, $email, $nome, $avaliador, $nivelAcesso, $imagem){
        $sql = "CALL cadastrarUsuario('$senha', '$cpf', '$email', '$nome', $avaliador, $nivelAcesso, '$imagem');";
        return Conexao::executar($sql);
    }
}

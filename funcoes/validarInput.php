<?php

set_error_handler('exceptions_error_handler');

function exceptions_error_handler($severity, $message, $filename, $lineno) {
    if (error_reporting() == 0) {
        return;
    }
    if (error_reporting() & $severity) {
        throw new ErrorException($message, 0, $severity, $filename, $lineno);
    }
}

function testarInput(&$post, $posicao, &$mensagem, $campo, $obrigatorio = true) {
    if (isset($post[$posicao]) && !empty($post[$posicao])) {
        $post[$posicao] = filter_var($post[$posicao], FILTER_SANITIZE_STRING);
        $post[$posicao] = filter_var($post[$posicao], FILTER_SANITIZE_SPECIAL_CHARS);
        $post[$posicao] = trim($post[$posicao]);
        $post[$posicao] = stripslashes($post[$posicao]);
    } else if ($obrigatorio) {
        $mensagem[] = "Campo '" . $campo . "' não informado!";
        return FALSE;
    }
    else{
        $post[$posicao] = "";
    }
    return TRUE;
}

function testarCpf($post, $posicao, &$mensagem, $campo, $obrigatorio = true) {
    if (testarInput($post, $posicao, $mensagem, $campo, $obrigatorio)) {
        if (preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}$/", $post[$posicao])) {
            return TRUE;
        }
        $mensagem[] = "O número ou formato do CPF não é válido!";
    }
    return FALSE;
}

function testarEmail($post, $posicao, &$mensagem, $campo, $obrigatorio = true) {
    if (testarInput($post, $posicao, $mensagem, $campo, $obrigatorio)) {
        if (filter_var($post[$posicao], FILTER_VALIDATE_EMAIL)) {
            return TRUE;
        }
        $mensagem[] = "O endereço de e-mail informado não é válido!";
    }
    return FALSE;
}

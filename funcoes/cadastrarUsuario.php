<?php

require_once './validarInput.php';

//session_start();

$metodoHttp = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
$mensagem[] = array();

if ($metodoHttp === 'POST') {
    try {
        $p = filter_input_array(INPUT_POST);
        //print_r($p);

        if (testarCpf($p, 'pCpf', $mensagem, 'CPF')) {
            echo "<br>" . $p['pCpf'];
        }
        if (testarInput($p, 'pNomeCompleto', $mensagem, 'Nome')) {
            echo "<br>" . $p['pNomeCompleto'];
        }
        if (testarEmail($p, 'pEmail', $mensagem, 'e-mail')) {
            echo "<br>" . $p['pEmail'];
        }
        if (testarInput($p, 'pSenha', $mensagem, 'Senha')) {
            echo "<br>" . $p['pSenha'];
        }
        if (testarInput($p, 'pCSenha', $mensagem, 'de Confirmação da senha')) {
            echo "<br>" . $p['pCSenha'];
        }
        if (testarInput($p, 'pAvaliador', $mensagem, '', FALSE)) {
            echo "<br>" . $p['pAvaliador'];
        }
        echo "<br>";
        print_r($mensagem);
    } catch (Exception $e) {
        echo "Redirecionar para o Formulário com mensagem de erro";
    }
} else {
    //$_SESSION['msg'] = "Você deve fazer login no sistema";
    header('Location: ../index.php');
}
<?php

require_once '../classes/Usuario.php';
require_once './validarInput.php';
require_once './validarUpload.php';

//session_start();

$metodoHttp = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
$mensagem = array();

if ($metodoHttp === 'POST') {
    try {
        $p = filter_input_array(INPUT_POST);
        $u = new Usuario();
        $senha = "";
        $arquivo = "";
        $tipoArquivo = "/(.jpg)(.jpeg)(.gif)(.png)/";
        $localSalvar = dirname(__FILE__) . '/../upload/usr/';
        //print_r($p);

        if (testarCpf($p, 'pCpf', $mensagem, 'CPF')) {
            //echo "<br>" . $p['pCpf'];
            $u->setCpf($p['pCpf']);
        }
        if (testarInput($p, 'pNomeCompleto', $mensagem, 'Nome')) {
//            echo "<br>" . $p['pNomeCompleto'];
            $u->setNome($p['pNomeCompleto']);
        }
        if (testarEmail($p, 'pEmail', $mensagem, 'e-mail')) {
//            echo "<br>" . $p['pEmail'];
            $u->setEmail($p['pEmail']);
        }
        testarInput($p, 'pSenha', $mensagem, 'Senha');
//            echo "<br>" . $p['pSenha'];
        testarInput($p, 'pCSenha', $mensagem, 'de Confirmação da senha');
//            echo "<br>" . $p['pCSenha'];
        if (strcmp($p['pSenha'], $p['pCSenha']) == 0) {
            //echo "<br>" . md5($p['pSenha']);
            $senha = md5($p['pSenha']);
        } else {
            $mensagem[] = "As senhas não conferem";
        }
        if (testarInput($p, 'pAvaliador', $mensagem, '', FALSE)) {
//            echo "<br>" . $p['pAvaliador'];
            $u->setAvaliador($p['pAvaliador']);
        }
        if(validarUpload($_FILES, 'pImagem', $mensagem, "Imagem de perfil", $arquivo, $tipoArquivo,4)){
            if(salvarArquivo($_FILES, 'pImagem', $mensagem, "Imagem de perfil", $arquivo, $u->getCpf(), $arquivo, $localSalvar, TRUE)){
                $u->setImagem($arquivo);
            }
        }
        if (count($mensagem) == 0) {
            $mensagem[0] = $u->salvar($senha);
            if($mensagem[0] > 0){
                echo "<br>";
                echo 'Salvou!';
            }
        }
    } catch (Exception $e) {
        $mensagem[] = "Erro inesperado!";
        $mensagem[] = $e->getMessage();
    }
    echo json_encode(array("msg" => $mensagem, "t" => "Atenção"));
} else {
    //$_SESSION['msg'] = "Você deve fazer login no sistema";
    header('Location: ../index.php');
}
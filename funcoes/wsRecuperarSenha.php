<?php

require_once './validarInput.php';
$metodoHttp = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
$mensagem = array();

if ($metodoHttp === 'POST') {
    try {

        $p = filter_input_array(INPUT_POST);
        if (testarEmail($p, 'pEmail', $mensagem, 'e-mail')) {
            $to = $p['pEmail'];
            $subject = "Recuperação de senha do Sistema de Submissão 2.0";
            $txt = "Olá,<br><br>"
                    . "Em nosso sistema foi solicitada a recuperação de senha "
                    . "para esse e-mail.<br>"
                    . "A sua senha foi redefinida para: <b>Test3</b><br><br>"
                    . "att,<br>"
                    . "Equipe SS2.0";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: naoresponda.marcelo@gmail.com" . "\r\n";

            if(mail($to, $subject, $txt, $headers)){
                echo "Diz que deu certo!";
            }
            else{
                echo "Dis que deu errado!"; 
            }
            return;
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
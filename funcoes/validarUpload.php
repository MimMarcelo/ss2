<?php

function validarUpload($files, $posicao, &$mensagem, $campo, &$retorno = "",
        $tipoArquivo = "", $tamanhoEmMb = 0, $obrigatorio = FALSE){
    $imagem = filter_var_array($_FILES);
    
    if(!empty($imagem[$posicao]['name'])){
        if($tipoArquivo != ""){
            $tipo = strtolower(pathinfo($imagem[$posicao]["name"], PATHINFO_EXTENSION));
            // Verifica o tipo do arquivo
            if(!strpos($tipoArquivo, $tipo)){
                $mensagem[] = "Tipo do(a) $campo ($tipo) não permitido(a)!";
                return FALSE;
            }
        }
        if($tamanhoEmMb > 0){
            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            $tamanhoEmBytes = $tamanhoEmMb * 1024 * 1024;
            //echo "Máximo = $tamanhoMaximoDoArquivo\nArquivo = ".$file["size"];
            if($imagem[$posicao]["size"] > $tamanhoEmBytes) {
                $mensagem[] = "O(A) $campo deve possuir no máximo $tamanhoEmMb Mb";
                return FALSE;
            }
        }
        $retorno = $tipo;
        return TRUE;
    }
    else if($obrigatorio){
        $mensagem[] = "$campo não enviado(a)!";
        return FALSE;
    }
    return FALSE;
}

function salvarArquivo($files, $posicao, &$mensagem, $campo, &$retorno,
        $nomeArquivo, &$tipoArquivo, $localSalvar, $sobrescrever = FALSE){
    if(!$sobrescrever){
        $nomeArquivo = verificarSeJaExiste($localSalvar, $nomeArquivo, $tipoArquivo);
    }
    if (!move_uploaded_file($files[$posicao]["tmp_name"], $localSalvar . $nomeArquivo . "." . $tipoArquivo)) {
        $mensagem[] = "Erro ao salvar $campo";
        return FALSE;
    }
    $retorno = $nomeArquivo . "." . $tipoArquivo;
    return TRUE;
}

function verificarSeJaExiste($localParaSalvar, $nome, $extensao){
    $i = 0;
    while(file_exists($localParaSalvar . $nome . "_" . $i . "." . $extensao)){
        $i++;
    }

    return $nome . "_" . $i;
}
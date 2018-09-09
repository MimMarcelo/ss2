<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Marcelo Júnior">
        <meta name="description" content="Sistema de gerenciamento de eventos e anexos do IFRN-SC">
        <meta name="keywords" content="Santa Cruz, ifrn, evento, sistema">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>[SS] Sistema de Submissão</title>
        <link rel="icon" href="img/logo250.png">
        <?php
        require_once './inc/css.html';
        ?>
    </head>
    <body>
        <?php
        require_once './inc/header.php';
        ?>
        <div id="conteudo">
            <h2>Cadastre-se</h2>
            <form class="corDegrade" action="<?=htmlspecialchars('funcoes/wsCadastrarUsuario.php');?>"
                  method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Identificação</legend>
                    <ol>
                        <li>
                            <label for="inpCpf">CPF</label>
                            <input class="input" type="text" id="inpCpf" name="pCpf" autofocus>
                        </li>
                        <li>
                            <label for="inpNomeCompleto">Nome completo</label>
                            <input class="input" type="text" id="inpNomeCompleto" name="pNomeCompleto">
                        </li>
                        <li>
                            <label for="inpEmail">e-mail</label>
                            <input class="input" type="email" id="inpEmail" name="pEmail">
                        </li>
                        <li>
                            <label for="inpSenha">Senha</label>
                            <input class="input" type="password" id="inpSenha" name="pSenha">
                        </li>
                        <li>
                            <label for="inpCSenha">Confirme a senha</label>
                            <input class="input" type="password" id="inpCSenha" name="pCSenha">
                        </li>
                        <li>
                            <label for="inpImagem">Foto do perfil</label>
                            <input class="input" type="file" id="inpImagem" name="pImagem">
                        </li>
                    </ol>
                </fieldset>
                <fieldset>
                    <legend>Avaliador</legend>
                    <ol>
                        <li>
                            <label for="inpAvaliador">
                                Candidatar-se como avaliador de trabalhos
                                <input type="checkbox" id="inpAvaliador" name="pAvaliador" value="1">
                            </label>
                        </li>
                    </ol>
                </fieldset>
                <fieldset>
                    <ol>
                        <li>
                            <input class="botaoConfirmar" type="submit" value="Cadastrar">
                        </li>
                        <li>
                            <label>Já é cadastrado? faça <a href="index.php" title="Faça login">login</a></label>
                        </li>
                    </ol>
                </fieldset>
            </form>
        </div>
    </body>
</html>

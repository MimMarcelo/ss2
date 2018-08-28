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
            <h2>Sistema de Submissão 2.0</h2>
            <form class="corDegrade">
                <fieldset>
                    <legend>Autenticação</legend>
                    <ol>
                        <li>
                            <label for="inpCpf">CPF</label>
                            <input class="input" type="text" id="inpCpf" name="pCpf" autofocus>
                        </li>
                        <li>
                            <label for="inpSenha">Senha</label>
                            <input class="input" type="password" id="inpSenha" name="pSenha">
                        </li>
                        <li>
                            <input class="botaoConfirmar" type="submit" value="Acessar">
                        </li>
                        <li>
                            <a href="cadastrarUsuario.php" title="Cadastre-se">Cadastre-se</a>
                        </li>
                    </ol>
                </fieldset>
            </form>
        </div>
        <?php
        require_once './inc/footer.php';
        ?>
    </body>
</html>

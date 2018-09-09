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
            <form class="corDegrade"method="post" action="<?= htmlspecialchars('funcoes/wsRecuperarSenha.php'); ?>">
                <fieldset>
                    <legend>Recuperar senha</legend>
                    <ol>

                        <li>
                            <label for="inpEmail">Informe seu e-mail</label>
                            <input class="input" type="email" id="inpEmail" name="pEmail">
                        </li>
                    </ol>
                </fieldset>
                <fieldset>
                    <ol>
                        <li>
                            <input class="botaoConfirmar" type="submit" value="Recuperar senha">
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

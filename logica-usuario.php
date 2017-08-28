<?php

session_start();

function verificaUsuario() {
    if (!isset($_SESSION["usuario_logado"])) {
        header("Location: index.php?falhaDeSeguranca=true");
        die();
    }
}

function usuarioEstaLogado() {

    return isset($_SESSION["usuario_logado"]);
}

function usuarioLogado() {

    return $_SESSION["usuario_logado"];
}

function logaUsuario($email) {
    $_SESSION["usuario_logado"] = $email;
}

function verificaLoginSucesso() {
    if (isset($_GET["login"]) && $_GET["login"] == true) {
        ?>
        <p class="alert-success">Logado com sucesso!</p>
        <?php

    } elseif (isset($_GET["login"]) && $_GET["login"] == false) {
        ?>
        <p class="alert-danger">Usuário ou senha inválida!</p>
        <?php

    }
}

function logout() {
    session_destroy();
}

function verificaLogoutSucesso() {
    if (isset($_GET["logout"]) && $_GET["logout"] == true) {
        ?>
        <p class="alert-danger">Deslogado com sucesso</p>
        <?php

    }
}

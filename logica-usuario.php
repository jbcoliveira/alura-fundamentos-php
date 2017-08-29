<?php

session_start();

function verificaUsuario() {
    if (!isset($_SESSION["usuario_logado"])) {
        $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
        header("Location: index.php");
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
        mensagem('success', 'Logado com sucesso!');        

    } elseif (isset($_GET["login"]) && $_GET["login"] == false) {
         mensagem('danger', 'Usuário ou senha inválida!');
      
    }
}

function logout() {
    session_destroy();
    session_start();
}

function verificaLogoutSucesso() {
    if (isset($_GET["logout"]) && $_GET["logout"] == true) {
         mensagem('danger', 'Deslogado com sucesso');
        

    }
}

<?php 
require_once ("banco-usuario.php");
require_once("logica-usuario.php");

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);

if($usuario == null) {
//Falha ao logar    
    $_SESSION["danger"] = "Usuário ou senha inválida.";
    header("Location: index.php");
} else {
//Sucesso ao logar
    logaUsuario( $usuario["email"]);
    $_SESSION["success"] = "Usuario logado com sucesso.";
    header("Location: index.php");
}
die();
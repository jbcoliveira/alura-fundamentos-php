<?php 
include("conecta.php");
include ("banco-usuario.php");
include("logica-usuario.php");

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);

if($usuario == null) {
//Falha ao logar    
    $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
    header("Location: index.php");
} else {
//Sucesso ao logar
    logaUsuario( $usuario["email"]);
    $_SESSION["success"] = "Usuario logado com sucesso.";
    header("Location: index.php");
}
die();
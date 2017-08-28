<?php 
include("conecta.php");
include ("banco-usuario.php");
include("logica-usuario.php");

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);

if($usuario == null) {
//Falha ao logar    
    header("Location: index.php?login=0");
} else {
//Sucesso ao logar
    logaUsuario( $usuario["email"]);
    header("Location: index.php?login=1");
}
die();
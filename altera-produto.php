<?php 
require_once("cabecalho.php"); 
require_once("banco-produto.php");
require_once("logica-usuario.php");
verificaUsuario();

$id = $_POST["id"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST["categoria_id"];

if(array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}

if(alteraProduto($conexao, $id,$nome, $preco,$descricao,$categoria_id,$usado)) { 
   mensagem('success', 'O produto' . $nome . ' com o valor ' . $preco . ' alterado com sucesso!');
} else {
    $msg = mysqli_error($conexao);

    mensagem('danger', 'O produto' . $nome . ' não foi alterado. Erro: ' . $msg);
}
?>

<?php include("rodape.php"); ?>

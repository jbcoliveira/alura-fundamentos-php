<?php 
require_once("cabecalho.php"); 
require_once("banco-produto.php");
require_once("logica-usuario.php");
require_once("class/Produto.class.php");
require_once("class/Categoria.class.php");


verificaUsuario();

$produto = new Produto();
$produto->id = $_POST['id'];
$produto->nome = $_POST['nome'];
$produto->preco = $_POST['preco'];
$produto->descricao = $_POST['descricao'];



$categoria = new Categoria();
$categoria->id = $_POST['categoria_id'];
$produto->categoria = $categoria;


array_key_exists('usado', $_POST) == true ? $produto->usado = "true": $produto->usado = "false";

if(alteraProduto($conexao, $produto)) { 
   mensagem('success', 'O produto' . $produto->nome . ' com o valor ' . $produto->preco . ' alterado com sucesso!');
} else {
    $msg = mysqli_error($conexao);

    mensagem('danger', 'O produto' . $produto->nome . ' não foi alterado. Erro: ' . $msg);
}
?>

<?php include("rodape.php"); ?>

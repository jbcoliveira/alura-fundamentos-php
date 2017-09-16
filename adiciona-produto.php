<?php
require_once("cabecalho.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");
require_once("class/Produto.class.php");
require_once("class/Categoria.class.php");


verificaUsuario();


$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);
$categoria = $categoria;

array_key_exists('usado', $_POST) == true ? $usado = "true": $usado = "false";

$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);

$produtoDao = new ProdutoDao($conexao);

if ($produtoDao->insereProduto($produto)) {
    mensagem('success', 'O produto' . $produto->getNome() . ' com o valor ' . $produto->getPreco() . ' adicionado com sucesso!');
} else {
    $msg = mysqli_error($produtoDao->conexao);

    mensagem('danger', 'O produto' . $nome . ' não foi adicionado. Erro: ' . $msg);
}
?>

<?php include("rodape.php"); ?>

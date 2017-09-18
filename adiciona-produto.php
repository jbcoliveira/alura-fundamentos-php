<?php

require_once("cabecalho.php");
require_once("logica-usuario.php");
require_once("class/Produto.class.php");
require_once("class/Categoria.class.php");


verificaUsuario();

$tipoProduto = $_POST['tipoProduto'];
$categoria_id = $_POST['categoria_id'];


$factory = new ProdutoFactory();
$produto = $factory->criaPor($tipoProduto, $_POST);
$produto->atualizaBaseadoEm($_POST);

$produto->getCategoria()->setId($_POST['categoria_id']);

array_key_exists('usado', $_POST) == true ? $usado = "true" : $usado = "false";
$produto->setUsado($usado);

$produto->setTipoProduto($tipoProduto);

$produtoDao = new ProdutoDAO($conexao);

if ($produtoDao->insereProduto($produto)) {
    mensagem('success', 'O produto ' . $produto->getNome() . ' com o valor R$' . $produto->getPreco() . ' adicionado com sucesso!');
} else {
    $msg = mysqli_error($produtoDao->getConexao());

    mensagem('danger', 'O produto ' . $produto->getNome() . ' não foi adicionado. Erro: ' . $msg);
}
?>

<?php include("rodape.php"); ?>

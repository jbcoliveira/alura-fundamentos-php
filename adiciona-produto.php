<?php

require_once("cabecalho.php");
require_once("logica-usuario.php");
require_once("class/Produto.class.php");
require_once("class/Categoria.class.php");


verificaUsuario();


$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$isbn = $_POST['isbn'];
$tipoProduto = $_POST['tipoProduto'];

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);
$categoria = $categoria;

array_key_exists('usado', $_POST) == true ? $usado = "true" : $usado = "false";

if ($tipoProduto == "Livro") {
    $produto = new Livro($nome, $preco, $descricao, $categoria, $usado);
    $produto->setIsbn($isbn);
} else {
    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
}

$produto->setTipoProduto($tipoProduto);

$produtoDao = new ProdutoDAO($conexao);

if ($produtoDao->insereProduto($produto)) {
    mensagem('success', 'O produto' . $produto->getNome() . ' com o valor ' . $produto->getPreco() . ' adicionado com sucesso!');
} else {
    $msg = mysqli_error($produtoDao->getConexao());

    mensagem('danger', 'O produto' . $nome . ' não foi adicionado. Erro: ' . $msg);
}
?>

<?php include("rodape.php"); ?>

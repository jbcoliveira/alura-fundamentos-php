<?php 
require_once("cabecalho.php"); 
require_once("banco-produto.php");
require_once("logica-usuario.php");
require_once("class/Produto.class.php");
require_once("class/Categoria.class.php");


verificaUsuario();

$produto = new Produto();
$produto->setId($_POST['id']);
$produto->setNome($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);



$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);
$produto->setCategoria($categoria);


array_key_exists('usado', $_POST) == true ? $produto->setUsado('true') : $produto->setUsado('false');

if(alteraProduto($conexao, $produto)) { 
   mensagem('success', 'O produto' . $produto->getNome() . ' com o valor ' . $produto->getNome() . ' alterado com sucesso!');
} else {
    $msg = mysqli_error($conexao);

    mensagem('danger', 'O produto' . $produto->nome . ' não foi alterado. Erro: ' . $msg);
}
?>

<?php include("rodape.php"); ?>

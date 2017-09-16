'<?php 
require_once("cabecalho.php"); 
require_once("banco-produto.php");
require_once("logica-usuario.php");

verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$isbn = $_POST['isbn'];
$tipoProduto = $_POST['tipoProduto'];

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);
$categoria = $categoria;



array_key_exists('usado', $_POST) == true ? $usado = "true": $usado = "false";

$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
$produto->setId($_POST['id']);

$produtoDao = new ProdutoDAO($conexao);

if($produtoDao->alteraProduto($produto)) { 
   mensagem('success', 'O produto' . $produto->getNome() . ' com o valor ' . $produto->getNome() . ' alterado com sucesso!');
} else {
    $msg = mysqli_error($produtoDao->conexao);

    mensagem('danger', 'O produto' . $nome . ' não foi alterado. Erro: ' . $msg);
}
?>

<?php include("rodape.php"); ?>

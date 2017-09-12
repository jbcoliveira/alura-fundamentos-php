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

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);
$categoria = $categoria;

array_key_exists('usado', $_POST) == true ? $usado = "true": $usado = "false";

$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
$produto->setId($_POST['id']);

if(alteraProduto($conexao, $produto)) { 
   mensagem('success', 'O produto' . $produto->getNome() . ' com o valor ' . $produto->getNome() . ' alterado com sucesso!');
} else {
    $msg = mysqli_error($conexao);

    mensagem('danger', 'O produto' . $nome . ' não foi alterado. Erro: ' . $msg);
}
?>

<?php include("rodape.php"); ?>

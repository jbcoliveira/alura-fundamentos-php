<?php 
require_once("cabecalho.php"); 
require_once("logica-usuario.php");
require_once("class/Produto.class.php");
require_once("class/Categoria.class.php");
/*
verificaUsuario();

$tipoProduto = $_POST['tipoProduto'];
$categoria_id = $_POST['categoria_id'];
$tipoProduto = $_POST['tipoProduto'];

$factory = new ProdutoFactory();
$produto = $factory->criaPor($tipoProduto, $_POST);

$produto->atualizaBaseadoEm($_POST);

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);


array_key_exists('categoria_nome', $_POST) == true ? 
                $categoria->setNome($_POST['categoria_nome']) : $categoria->setNome(NULL);;
       

$categoria = $categoria;


array_key_exists('usado', $_POST) == true ? $usado = "true": $usado = "false";

$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
$produto->setId($_POST['id']);

$produtoDao = new ProdutoDAO($conexao);
 * 
 */

verificaUsuario();

$tipoProduto = $_POST['tipoProduto'];
$categoria_id = $_POST['categoria_id'];


$factory = new ProdutoFactory();
$produto = $factory->criaPor($tipoProduto, $_POST);
$produto->atualizaBaseadoEm($_POST);

$produto->setId($_POST['id']);
$produto->getCategoria()->setId($_POST['categoria_id']);

array_key_exists('usado', $_POST) == true ? $usado = "true" : $usado = "false";
$produto->setUsado($usado);

$produto->setTipoProduto($tipoProduto);


$produtoDao = new ProdutoDAO($conexao);

if($produtoDao->alteraProduto($produto)) { 
   mensagem('success', 'O produto ' . $produto->getNome() . ' com o valor ' . $produto->getPreco() . ' alterado com sucesso!');
} else {
    $msg = mysqli_error($produtoDao->getConexao());

    mensagem('danger', 'O produto ' . $produto->getNome() . ' não foi alterado. Erro: ' . $msg);
}
?>

<?php include("rodape.php"); ?>

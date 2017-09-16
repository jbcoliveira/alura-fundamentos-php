<?php 

require_once("cabecalho.php"); 
require_once("banco-categoria.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");

verificaUsuario();

$produtoDao = new ProdutoDAO($conexao);
$categoriaDao = new CategoriaDAO($conexao);
$categorias = $categoriaDao->listaCategorias();
$id = $_GET["id"];
$produto = $produtoDao->buscaProduto($id);
$checked =  $produto->getUsado()  == 1 ? "checked='checked'":"";

?>
<h1>Formulário de cadastro</h1>
<form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?= $produto->getId() ?>" />
    <table class="table">
        
        <?php include("produto-formulario-base.php"); ?>
        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>

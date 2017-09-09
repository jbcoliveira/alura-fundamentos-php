<?php 
require_once("cabecalho.php"); 
require_once("banco-categoria.php");
require_once("logica-usuario.php");
require_once("class/Produto.class.php");
require_once("class/Categoria.class.php");


verificaUsuario();
$categoria = new Categoria();
$categoria->id = 1;

$produto = new Produto();
$produto->categoria = $categoria;

$categorias = listaCategorias($conexao);
$checked = "";
?>
<h1>Cadastrando Produto</h1>
<form action="adiciona-produto.php" method="post">
    <table class="table">
        <?php include("produto-formulario-base.php"); ?>
        <tr>
            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>

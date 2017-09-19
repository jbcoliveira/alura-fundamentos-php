<?php 
require_once("cabecalho.php"); 
require_once("banco-categoria.php");
require_once("logica-usuario.php");


verificaUsuario();
$categoria = new Categoria();
$categoria->setId(1);

$produto = new LivroFisico("","","",$categoria,"");

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

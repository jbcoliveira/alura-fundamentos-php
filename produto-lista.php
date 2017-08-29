<?php
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");
include("logica-usuario.php");

verificaUsuario();

if(isset($_SESSION["success"])) {
    mensagem('success', $_SESSION["success"]);
    unset($_SESSION["success"]);
}
$produtos = listaProduto($conexao);
?>
<table class="table table-striped table-bordered">
    <?php
    foreach ($produtos as $produto) :
        ?>

        <tr>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= substr($produto['descricao'], 0, 40) ?></td>
            <td><?= $produto['categoria_nome'] ?></td>
            <td><?= $produto['usado'] == 0 ? "novo" : "usado"; ?></td>
            <td><a href="produto-altera-formulario.php?id=<?= $produto['id'] ?>" class="btn btn-primary">alterar</td>
            <td>
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id" value="<?= $produto['id'] ?>" />
                    <button class="btn btn-danger">Remover</button>
                </form>
            </td>
        </tr>

        <?php
    endforeach;
    ?>
</table>

<?php
include("rodape.php");

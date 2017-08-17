<?php

include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");


if(array_key_exists("removido", $_GET) && $_GET['removido']=='true') {
?>
    <p class="text-success">Produto <?=$id?> removido!</p>
<?php
}
$produtos = listaProduto($conexao);
?>
<table class="table table-striped table-bordered">
    <?php
    foreach($produtos as $produto) :
    ?>

        <tr>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= substr($produto['descricao'], 0,40) ?></td>
            <form action="remove-produto.php" method="post">
                <input type="hidden" name="id" value="<?=$produto['id']?>" />
                <button class="btn btn-danger">Remover</button>
            </form>
        </tr>

    <?php
    endforeach;
    ?>
</table>

<?php
include("rodape.php");

<?php

include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");

$produtos = listaProduto($conexao);
?>
<table class="table table-striped table-bordered">
    <?php
    foreach($produtos as $produto) :
    ?>

        <tr>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['preco'] ?></td>
        </tr>

    <?php
    endforeach;
    ?>
</table>

<?php
include("rodape.php");

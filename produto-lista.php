<?php
require_once("cabecalho.php");
require_once("logica-usuario.php");


verificaUsuario();

$produtoDao = new ProdutoDAO($conexao);
$produtos = $produtoDao->listaProduto();
?>
<table class="table table-striped table-bordered">
    <?php
    foreach ($produtos as $produto) :
        ?>

        <tr>
            <td><?= $produto->getNome() ?></td>
            <td><?= $produto->getPreco() ?></td>
            <td><?= $produto->calculaImposto() ?></td>
            <td><?= substr($produto->getDescricao(), 0, 40) ?></td>
            <td><?= $produto->getCategoria()->getNome() ?></td>
            <td><?= $produto->getUsado() == 0 ? "novo" : "usado"; ?></td>
            <td><?php
                
                if ($produto->temIsbn()) {
                    echo "ISBN: " . $produto->getIsbn();
                }
                ?></td>
            <td><a href="produto-altera-formulario.php?id=<?= $produto->getId() ?>" 
                   class="btn btn-primary">alterar</td>
            <td>
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id" value="<?= $produto->getId() ?>" />
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

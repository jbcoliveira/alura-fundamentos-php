<?php

require_once("conecta.php");
require_once("class/Produto.class.php");
require_once("class/Categoria.class.php");

function listaProduto($conexao) {
    $produtos = array();

    $resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome "
            . "from produtos p join categorias c"
            . " on c.id = p.categoria_id");

    while ($produto_array = mysqli_fetch_assoc($resultado)) {
        $categoria = new Categoria();
        $categoria->setNome($produto_array['categoria_nome']);


        $produto = new Produto();
        $produto->setId($produto_array['id']);
        $produto->setNome($produto_array['nome']);
        $produto->setPreco($produto_array['preco']);
        $produto->setDescricao($produto_array['descricao']);
        $produto->setCategoria($categoria);
        $produto->setUsado($produto_array['usado']);


        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto($conexao, Produto $produto) {
    $query = "insert into produtos (nome, preco, descricao,categoria_id,usado) values "
            . "('" . escapeQuery($conexao, $produto->nome) . "', " . escapeQuery($conexao, $produto->preco) . ", "
            . "'" . escapeQuery($conexao, $produto->descricao) . "' , {$produto->categoria->id} , "
            . "{$produto->usado})";
    return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);

    $produto_array = mysqli_fetch_assoc($resultado);

    $categoria = new Categoria();
    $categoria->setId($produto_array['categoria_id']);

    $produto = new Produto();
    $produto->setId($produto_array['id']);
    $produto->setNome($produto_array['nome']);
    $produto->setPreco($produto_array['preco']);
    $produto->setDescricao($produto_array['descricao']);
    $produto->setCategoria($categoria);
    $produto->setUsado($produto_array['usado']);

    return $produto;
}

function alteraProduto($conexao, Produto $produto) {
    $query = "UPDATE produtos set nome= '" . escapeQuery($conexao, $produto->getNome()) . "', "
            . " preco=" . escapeQuery($conexao, $produto->getPreco()) . ", "
            . " descricao='" . escapeQuery($conexao, $produto->getDescricao()) . "', "
            . "categoria_id={$produto->getCategoria()->getId()}, usado={$produto->getUsado()} "
            . "where id = {$produto->getId()} ";
    return mysqli_query($conexao, $query);
}

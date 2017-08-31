<?php
require_once("conecta.php");
require_once("class/Produto.class.php");

function listaProduto($conexao) {
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos p join categorias c"
            . " on c.id = p.categoria_id");

    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }
    
    return $produtos;
}

function insereProduto($conexao, Produto $produto) {
    $query = "insert into produtos (nome, preco, descricao,categoria_id,usado) values "
            . "('".escapeQuery($conexao,$produto->nome)."', ".escapeQuery($conexao,$produto->preco).", "
            . "'".escapeQuery($conexao,$produto->descricao)."' , {$produto->categoria_id} , {$produto->usado})";
    return mysqli_query($conexao, $query);
}


function removeProduto($conexao,$id) {
    $query = "delete from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
}

function buscaProduto($conexao,$id) {
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function alteraProduto($conexao, Produto $produto) {
    $query = "UPDATE produtos set nome= '".escapeQuery($conexao,$produto->nome)."', "
            . " preco=".escapeQuery($conexao,$produto->preco).", "
            . " descricao='".escapeQuery($conexao,$produto->descricao)."', categoria_id={$produto->categoria_id}, usado={$produto->usado} "
            . "where id = {$produto->id} ";
    return mysqli_query($conexao, $query);
}
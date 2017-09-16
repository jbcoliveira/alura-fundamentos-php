<?php

class ProdutoDAO {
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function listaProduto() {
    $produtos = array();

    $resultado = mysqli_query($this->conexao, "select p.*,c.nome as categoria_nome "
            . "from produtos p join categorias c"
            . " on c.id = p.categoria_id");

    while ($produto_array = mysqli_fetch_assoc($resultado)) {
        $categoria = new Categoria();
        $categoria->setNome($produto_array['categoria_nome']);
        
        $nome = $produto_array['nome'];
        $preco = $produto_array['preco'];
        $descricao = $produto_array['descricao'];
        $usado = $produto_array['usado'];
                
        $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
        $produto->setId($produto_array['id']);

        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto(Produto $produto) {
    $query = "insert into produtos (nome, preco, descricao,categoria_id,usado) values "
            . "('" . escapeQuery($this->conexao, $produto->getNome()) . "', " . escapeQuery($this->conexao, $produto->getPreco()) . ", "
            . "'" . escapeQuery($this->conexao, $produto->getDescricao()) . "' , {$produto->getCategoria()->getId()} , "
            . "{$produto->getUsado()})";
    return mysqli_query($this->conexao, $query);
}

function removeProduto( $id) {
    $query = "delete from produtos where id = {$id}";
    $resultado = mysqli_query($this->conexao, $query);
}

function buscaProduto( $id) {
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($this->conexao, $query);

    $produto_array = mysqli_fetch_assoc($resultado);

    $categoria = new Categoria();
    $categoria->setId($produto_array['categoria_id']);

    $nome = $produto_array['nome'];
    $preco = $produto_array['preco'];
    $descricao = $produto_array['descricao'];
    $usado = $produto_array['usado'];

    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
    $produto->setId($produto_array['id']);


    return $produto;
}

function alteraProduto(Produto $produto) {
    $query = "UPDATE produtos set nome= '" . escapeQuery($this->conexao, $produto->getNome()) . "', "
            . " preco=" . escapeQuery($this->conexao, $produto->getPreco()) . ", "
            . " descricao='" . escapeQuery($this->conexao, $produto->getDescricao()) . "', "
            . "categoria_id={$produto->getCategoria()->getId()}, usado={$produto->getUsado()} "
            . "where id = {$produto->getId()} ";
    return mysqli_query($this->conexao, $query);
}


}
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaDAO
 *
 * @author joao
 */
class CategoriaDAO {
    
    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function listaCategorias($conexao) {
        $categorias = array();
        $resultado = mysqli_query($conexao, "select * from categorias");

        while ($categoria_array = mysqli_fetch_assoc($resultado)) {
            $categoria = new Categoria();
            $categoria->setId($categoria_array['id']);
            $categoria->setNome($categoria_array['nome']);

            array_push($categorias, $categoria);
        }

        return $categorias;
    }

    function insereCategoria($conexao, $nome, $preco, $descricao) {
        $query = "insert into produtos (nome, preco, descricao) values ('{$nome}', {$preco}, '{$descricao}')";
        return mysqli_query($conexao, $query);
    }

    function removeCategoria($conexao, $id) {
        $query = "delete from produtos where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
    }

}

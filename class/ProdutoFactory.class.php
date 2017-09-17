<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoFactory
 *
 * @author joao
 */
class ProdutoFactory {

    private $classes = array("Produto", "Ebook", "LivroFisico");

    public function criaPor($tipoProduto, $params) {
        //extraindo os valores 
        $nome = $params['nome'];
        $preco = $params['preco'];
        $descricao = $params['descricao'];
        
        $categoria = new Categoria();
        $categoria->setId($params['categoria_id']);
        $categoria->setNome($params['categoria_nome']);
        $usado = $params['usado'];

//testando se o $tipoProduto existe no array $classes
        if (in_array($tipoProduto, $this->classes)) {
            //instanciando o objeto
            return new $tipoProduto($nome, $preco, $descricao, $categoria, $usado);
        }

//se nao encontramos nada, vamos criar um produto: 
        return new Produto($nome, $preco, $descricao, $categoria, $usado);
    }

}

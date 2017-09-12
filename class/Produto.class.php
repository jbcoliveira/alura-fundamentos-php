<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author jboliveira
 */
class Produto {

    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $categoria;
    private $usado;

    function __construct($nome, $preco, $descricao, Categoria $categoria, $usado) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->usado = $usado;
    }

    function __toString() {
        return $this->nome . ": R$ " . $this->preco;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getPreco() {
        return $this->preco;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getUsado() {
        return $this->usado;
    }

    function setId($id) {
        $this->id = $id;
    }

    public function precoComDesconto($valor = 0.1) {
        if ($valor > 0 && $valor <= 0.5) {
            return $this->preco - ($this->preco * $valor);
        } else {
            return $this->preco;
        }
    }

}

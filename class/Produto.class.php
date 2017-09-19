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
abstract class Produto {

    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $categoria;
    private $usado;
    private $tipoProduto;

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

    public function getTipoProduto() {
        return $this->tipoProduto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsado($usado) {
        $this->usado = $usado;
    }

    public function setTipoProduto($tipoProduto) {
        $this->tipoProduto = $tipoProduto;
    }

    public function precoComDesconto($valor = 0.1) {
        if ($valor > 0 && $valor <= 0.5) {
            return $this->preco - ($this->preco * $valor);
        } else {
            return $this->preco;
        }
    }

    public function temIsbn() {

        return $this instanceof Livro;
    }

    public function calculaImposto() {
        return $this->preco * 0.195;
    }

    abstract function atualizaBaseadoEm($params);

    function temWaterMark() {
        return $this instanceof Ebook;
    }

    function temTaxaImpressao() {
        return $this instanceof LivroFisico;
    }

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Livro
 *
 * @author joao
 */
class Livro extends Produto{
    private $isbn;
    
    public function getIsbn() {
        return $this->isbn;
    }
    
    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }
}

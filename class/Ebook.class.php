<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ebook
 *
 * @author joao
 */
class Ebook extends Livro {

    private $waterMark;

    function getWaterMark() {
        return $this->waterMark;
    }

    function setWaterMark($waterMark) {
        $this->waterMark = $waterMark;
    }

    public function atualizaBaseadoEm($params) {
        $this->setIsbn($params["isbn"]);
        $this->setWaterMark($params["waterMark"]);
    }

}

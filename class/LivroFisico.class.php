<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LivroFisico
 *
 * @author joao
 */
class LivroFisico extends Livro {

    private $taxaImpressao;

    function getTaxaImpressao() {
        return $this->taxaImpressao;
    }

    function setTaxaImpressao($taxaImpressao) {
        $this->taxaImpressao = $taxaImpressao;
    }

    public function atualizaBaseadoEm($params) {
        $this->setIsbn($params["isbn"]);
        $this->setTaxaImpressao($params["taxaImpressao"]);
    }

}

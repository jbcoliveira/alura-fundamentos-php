<?php

class ProdutoDAO {

    private $conexao;

    function getConexao() {
        return $this->conexao;
    }

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function insereProduto(Produto $produto) {
        $isbn = "";
        $watermark = "";
        $taxaImpressao = "";
        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }
        if (get_class($produto) == "LivroFisico") {
            $taxaImpressao = $produto->getTaxaImpressao();
        }
        if (get_class($produto) == "Ebook") {
            $watermark = $produto->getWaterMark();
        }

        $query = "insert into produtos (nome, preco, descricao,categoria_id,usado,isbn,watermark,taxaImpressao,tipoProduto) values "
                . "('" . escapeQuery($this->conexao, $produto->getNome()) . "', "
                . "" . escapeQuery($this->conexao, $produto->getPreco()) . ", "
                . "'" . escapeQuery($this->conexao, $produto->getDescricao()) . "' , "
                . "{$produto->getCategoria()->getId()} , "
                . "{$produto->getUsado()} ,"
                . "'" . escapeQuery($this->conexao, $isbn) . "', "
                . "'" . escapeQuery($this->conexao, $watermark) . "', "
                . "'" . escapeQuery($this->conexao, $taxaImpressao) . "', "
                . "'" . escapeQuery($this->conexao, $produto->getTipoProduto()) . "' "
                . " )";
        return mysqli_query($this->conexao, $query);
    }

    function alteraProduto(Produto $produto) {
        $isbn = "";
        $watermark = "";
        $taxaImpressao = "";
        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }
        if (get_class($produto) == "LivroFisico") {
            $taxaImpressao = $produto->getTaxaImpressao();
        }
        if (get_class($produto) == "Ebook") {
            $watermark = $produto->getWaterMark();
        }
        $query = "UPDATE produtos set nome= '" . escapeQuery($this->conexao, $produto->getNome()) . "', "
                . " preco=" . escapeQuery($this->conexao, $produto->getPreco()) . ", "
                . " descricao='" . escapeQuery($this->conexao, $produto->getDescricao()) . "', "
                . " categoria_id={$produto->getCategoria()->getId()}, usado={$produto->getUsado()} ,"
                . " isbn='" . escapeQuery($this->conexao, $isbn) . "', "
                . " watermark='" . escapeQuery($this->conexao, $watermark) . "', "
                . " taxaImpressao='" . escapeQuery($this->conexao, $taxaImpressao) . "', "
                . " tipoProduto='" . escapeQuery($this->conexao, $produto->getTipoProduto()) . "' "
                . " where id = {$produto->getId()} ";
        return mysqli_query($this->conexao, $query);
    }

    function removeProduto($id) {
        $query = "delete from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
    }

    function listaProduto() {
        $produtos = array();

        $resultado = mysqli_query($this->conexao, "select p.*,c.nome as categoria_nome "
                . "from produtos p join categorias c"
                . " on c.id = p.categoria_id");

        while ($produto_array = mysqli_fetch_assoc($resultado)) {
            $categoria = new Categoria();
            $categoria->setNome($produto_array['categoria_nome']);

            $tipoProduto = $produto_array['tipoProduto'];

            $factory = new ProdutoFactory();
            $produto = $factory->criaPor($tipoProduto, $produto_array);
            $produto->setTipoProduto($tipoProduto);

            if ($produto->temIsbn()) {
                $produto->setIsbn($produto_array['isbn']);
            }

            if ($tipoProduto == "LivroFisico") {
                $produto->setTaxaImpressao($produto_array['taxaImpressao']);
            } elseif ($tipoProduto == "Ebook") {
                $produto->setWatermark($produto_array['waterMark']);
            }

            $produto->setId($produto_array['id']);

            array_push($produtos, $produto);
        }

        return $produtos;
    }

    function buscaProduto($id) {
/*
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);

        $produto_array = mysqli_fetch_assoc($resultado);

        $categoria = new Categoria();
        $categoria->setId($produto_array['categoria_id']);

        $nome = $produto_array['nome'];
        $preco = $produto_array['preco'];
        $descricao = $produto_array['descricao'];
        $usado = $produto_array['usado'];
        $tipoProduto = $produto_array['tipoProduto'];


        $isbn = "";
        $watermark = "";
        $taxaImpressao = "";
        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }
        if (get_class($produto) == "LivroFisico") {
            $taxaImpressao = $produto->getTaxaImpressao();
        }
        if (get_class($produto) == "Ebook") {
            $watermark = $produto->getWaterMark();
        }

        $produto->setId($produto_array['id']);


        return $produto;

*/

        ///

        $query = "select p.*,c.nome as categoria_nome "
                . "from produtos p join categorias c"
                . " on c.id = p.categoria_id where p.id = {$id}" ;
        $resultado = mysqli_query($this->conexao, $query);

        $produto_array = mysqli_fetch_assoc($resultado);


        $categoria = new Categoria();
        $categoria->setId($produto_array['categoria_id']);

        $tipoProduto = $produto_array['tipoProduto'];

        $factory = new ProdutoFactory();
        $produto = $factory->criaPor($tipoProduto, $produto_array);
        $produto->setTipoProduto($tipoProduto);

        if ($produto->temIsbn()) {
            $produto->setIsbn($produto_array['isbn']);
        }

        if ($tipoProduto == "LivroFisico") {
            $produto->setTaxaImpressao($produto_array['taxaImpressao']);
        } elseif ($tipoProduto == "Ebook") {
            $produto->setWatermark($produto_array['waterMark']);
        }

        $produto->setId($produto_array['id']);



        return $produto;
    }

}

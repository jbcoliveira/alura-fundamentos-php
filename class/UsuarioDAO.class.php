<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author joao
 */
class UsuarioDAO {
    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function buscaUsuario($email, $senha) {
    $senhaMd5 = md5($senha);
    $query = "select * from usuarios where email='".escapeQuery($this->conexao,$email)."' and senha='{$senhaMd5}'";
   
    $resultado = mysqli_query($this->conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}
}

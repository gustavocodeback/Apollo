<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends MY_Model {

    // id da cidade
    public $CodProduto;

    // nome
    public $nome;

    // entidade
    public $entity = 'Produto';
    
    // tabela
    public $table = 'Produtos';

    // chave primaria
    public $primaryKey = 'CodProduto';

   /**
    * __construct
    *
    * metodo construtor
    *
    */
    public function __construct() {
        parent::__construct();
    }
    
    // seta o código
    public function setCod( $cod ) {
        $this->CodProduto = $cod;
    }

    // nome
    public function setNome( $nome ) {
        $this->nome = $nome;
    }
}

/* end of file */

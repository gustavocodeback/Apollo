<?php defined('BASEPATH') OR exit('No direct script access allowed');

require 'application/models/Produto.php';

class ProdutosFinder extends MY_Model {

    // entidade
    public $entity = 'Produto';

    // tabela
    public $table = 'Produtos';

    // chave primaria
    public $primaryKey = 'CodProduto';

    // labels
    public $labels = [
        'nome'  => 'Nome',
    ];

   /**
    * __construct
    *
    * metodo construtor
    *
    */
    public function __construct() {
        parent::__construct();
    }

   /**
    * getProduto
    *
    * pega a instancia do produto
    *
    */
    public function getProduto() {
        return new $this->entity();
    }

   /**
    * grid
    *
    * funcao usada para gerar o grid
    *
    */
    public function grid() {
        $this->db->from( $this->table )
        ->select( 'CodProduto as Código, Nome, CodProduto as Ações' );
        return $this;
    }
}

/* end of file */

<?php

require 'application/models/Departamento.php';

class DepartamentosFinder extends MY_Model {

    // entidade
    public $entity = 'Departamento';

    // tabela
    public $table = 'Departamentos';

    // chave primaria
    public $primaryKey = 'CodDepartamento';

    // labels
    public $labels = [
        'Nome'  => 'Nome',
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
    * getCidade
    *
    * pega a instancia do cidade
    *
    */
    public function getDepartamento() {
        return new $this->entity();
    }

   /**
    * grid
    *
    * funcao usada para gerar o grid
    *
    */
    public function grid() {
        $this->db->from( $this->table.' b' )
        ->select( 'CodDepartamento as Código, b.Nome as Nome,  b.Cor as Cor, CodDepartamento as Ações' );
        return $this;
    }
}

/* end of file */

<?php

require 'application/models/Contador.php';

class ContadoresFinder extends MY_Model {

    // entidade
    public $entity = 'Contador';

    // tabela
    public $table = 'Contadores';

    // chave primaria
    public $primaryKey = 'CodContador';

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
    * getClassificacao
    *
    * pega a instancia da classificacao
    *
    */
    public function getContador() {
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
        ->select( 'CodContador as Código, Nome, Status, CodContador as Ações' );
        return $this;
    }

   /**
    * concat
    *
    * concatena os dados do contador com os dados do usuario
    *
    */
    public function concat() {
        $this->db->from( $this->table.' c' )
        ->select( '*' )
        ->join( 'Usuarios u', 'c.uid = u.uid' );

        // volta a instancia
        return $this;
    }
}

/* end of file */

<?php

require 'application/models/Cliente.php';

class ClientesFinder extends MY_Model {

    public $entity = 'Cliente';

    public $table = 'clientes';

    public $primaryKey = 'codcliente';

    public $labels = [
        'nome'   => 'Nome',
        'email'  => 'E-mail',
        'idade'  => 'Idade',
        'status' => 'Status'
    ];

    public function __construct() {
        $this->entity = new Cliente();
    }

    public function getCliente() {
        return $this->entity;
    }

    public function ativos() {
        $this->db->where( " status = 'A' " );
        return $this;
    }

    public function inativos() {
        $this->db->where( " status <> 'A' " );
        return $this;
    }

    public function maioresDeIdade() {
        $this->db->where( " Idade > 18 " );
        return $this;
    }
    
    public function grid() {
        $this->db->from( $this->table )
        ->select( 'codcliente as id, nome, email, idade, status, codcliente as Acoes' );
        return $this;
    }
}

/* end of file */

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LogsFinder extends MY_Model {

    // entidade
    public $entity = 'Logs';

    // tabela
    public $table = 'Logs';

    // chave primaria
    public $primaryKey = 'CodLog';

    // labels
    public $labels = [
        'Data' => 'Data'
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
    * grid
    *
    * funcao usada para gerar o grid
    *
    */
    public function grid() {
        $this->db->from( $this->table.' c' )
        ->select( 'CodLog as Código, c.uid, c.Entidade, c.Acao, c.Data, c.Mensagem, CodLog as Ações' );
        return $this;
    }
}

/* end of file */

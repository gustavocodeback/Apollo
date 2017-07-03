<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contador extends MY_Model {

    // id da rotina
    public $CodContador;

    // nome
    public $nome;

    // id do usuario
    public $uid;

    // email
    public $email;

    // grupo
    public $grupo;

    // id do grupo
    public $gid;

    // status
    public $status;

    // entidade
    public $entity = 'Contador';
    
    // tabela
    public $table = 'Contadores';

    // chave primaria
    public $primaryKey = 'CodContador';

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
    * nome
    *
    * seta o nome
    *
    */
    public function setNome( $nome ) {
        $this->nome = $nome;
    }

    /**
    * setStatus
    *
    * seta o status
    *
    */
    public function setStatus( $status ) {
        $this->status = $status;
    }

   /**
    * setCod
    *
    * seta o codigo
    *
    */
    public function setCod( $cod ) {
        $this->CodContador = $cod;
    }

   /**
    * uid
    *
    * seta o uid
    *
    */
    public function setUid( $uid ) {
        $this->uid = $uid;
    }
}

/* end of file */

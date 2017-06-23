<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends MY_Model {
    
    public $nome;

    public $email;

    public $idade;

    public $entity = 'Cliente';

    public function __construct() {
        parent::__construct();
    }

    public function getNome() {
        return 'Pablo Escobar';
    }

    public function somarIdade( $idade ) {
        return $this->idade+$idade;
    }
}

/* end of file */

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {
    
    public $nome;

    public $email;

    public $CPF;
    
    public function __construct() {
        parent::__construct();
    }

    public function getNome() {
        return 'Pablo Escobar';
    }
}

/* end of file */

<?php

require 'application/models/Usuario.php';

class UsuariosFinder extends CI_Model {

    public $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

    public function getUsuario() {
        return $this->usuario;
    }
}

/* end of file */

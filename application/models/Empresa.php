<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends MY_Model {

    // id da rotina
    public $CodEmpresa;

    // nome
    public $nome;

    // email
    public $razao;

    // grupo
    public $cnpj;

    // status
    public $cidade;

    // estado
    public $estado;

    // logradouro
    public $logradouro;

    // entidade
    public $entity = 'Empresa';
    
    // tabela
    public $table = 'Empresas';

    // chave primaria
    public $primaryKey = 'CodEmpresa';

   /**
    * __construct
    *
    * metodo construtor
    *
    */
    public function __construct() {
        parent::__construct();
    }
    
    public function setCod( $cod ) {
        $this->CodEmpresa = $cod;
    }

    // nome
    public function setNome( $nome ) {
        $this->nome = $nome;
    }

    // email
    public function setRazao( $razao ) {
        $this->razao = $razao;
    }

    // grupo
    public function setCnpj( $cnpj ) {
        $this->cnpj = $cnpj;
    }

    // id do grupo
    public function setEndereco( $endereco ) {
        $this->endereco = $endereco;
    }

    // status
    public function setCidade( $cidade ) {
        $this->cidade = $cidade;
    }

    // estado
    public function setEstado( $estado ) {
        $this->estado = $estado;
    }

    // logradouro
    public function setLogradouro( $logradouro ) {
        $this->logradouro = $logradouro;
    }
}

/* end of file */

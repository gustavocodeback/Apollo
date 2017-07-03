<?php

require 'application/models/Empresa.php';

class EmpresasFinder extends MY_Model {

    // entidade
    public $entity = 'Empresa';

    // tabela
    public $table = 'Empresas';

    // chave primaria
    public $primaryKey = 'CodEmpresa';

    // labels
    public $labels = [
        'razao'         => 'Razão',
        'cnpj'          => 'Cnpj',
        'endereco'      => 'Endereço',
        'numEndereco'   => 'Número',
        'cep'           => 'Cep',
        'CodCidade'     => 'Cidade',
        'CodEstado'     => 'Estado',
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
    public function getEmpresa() {
        return new $this->entity();
    }

   /**
    * grid
    *
    * funcao usada para gerar o grid
    *
    */
    public function grid() {
        $this->db->from( $this->table.' e' )
        ->select( 'CodEmpresa as Código, e.RazaoSocial as Razão Social, e.Cnpj as Cnpj, e.Endereco as Endereço, 
                    e.numEndereco as Número, e.Cep as Cep, c.Nome as Cidade, s.Uf as Estado, CodEmpresa as Ações' )
        ->join( 'Cidades c', 'c.CodCidade = e.CodCidade' )
        ->join( 'Estados s', 's.CodEstado = e.CodEstado' );
        return $this;
    }
}

/* end of file */

<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['schema']['Estados'] = [
    'CodEstado' => [
        'type'           => 'int',
        'primary_key'    => TRUE,
        'constraint'     => '11',
        'auto_increment' => true
    ],
    'Nome' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ],
    'Uf' => [
        'type'       => 'varchar',
        'constraint' => '2'
    ]
];

$config['schema']['Cidades'] = [
    'CodCidade' => [
        'type'           => 'int',
        'primary_key'    => TRUE,
        'constraint'     => '11',
        'auto_increment' => true
    ],
    'CodEstado' => [
        'type'           => 'int',
        'constraint'     => '11',
    ],
    'Nome' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ]
];

$config['schema']['Classificacoes'] = [
    'CodClassificacao' => [
        'type'           => 'int',
        'primary_key'    => TRUE,
        'constraint'     => '11',
        'auto_increment' => true
    ],
    'Nome' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ],
    'Icone' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ],
    'Ordem' => [
        'type'           => 'int',
        'constraint'     => '11',
    ]
];

$config['schema']['Colaboradores'] = [
    'CodColaborador' => [
        'type'        => 'int',
        'constraint'  => '11',
        'primary_key' => TRUE,
        'auto_increment' => TRUE,
    ],
    'uid' => [
        'type'       => 'varchar',
        'constraint' => '32'
    ],
    'nome' => [
        'type'       => 'varchar',
        'constraint' => '32'
    ],
    'cpf' => [
        'type'       => 'varchar',
        'constraint' => '32'
    ],
    'status' => [
        'type'       => 'char',
        'constraint' => '1'
    ]
];

$config['schema']['Empresas'] = [
    'CodEmpresas' => [
        'type'        => 'int',
        'constraint'  => '11',
        'primary_key' => TRUE,
        'auto_increment' => TRUE,
    ],
    'Nome' => [
        'type'       => 'varchar',
        'constraint' => '32'
    ],
    'RazaoSocial' => [
        'type'       => 'varchar',
        'constraint' => '32'
    ],
    'CNPJ' => [
        'type'       => 'char',
        'constraint' => '1'
    ],
    'Endereco' => [
        'type'       => 'char',
        'constraint' => '1'
    ],
    'Cidade' => [
        'type'       => 'char',
        'constraint' => '1'
    ],
    'Estado' => [
        'type'       => 'char',
        'constraint' => '1'
    ],
    'Logradouro' => [
        'type'       => 'char',
        'constraint' => '1'
    ]
];


/* end of file */

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

$config['schema']['Contadores'] = [
    'CodContador' => [
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
    'status' => [
        'type'       => 'char',
        'constraint' => '1'
    ]
];

$config['schema']['Empresas'] = [
    'CodEmpresa' => [
        'type'           => 'int',
        'constraint'     => '11',
        'primary_key'    => TRUE,
        'auto_increment' => TRUE,
    ],
    'RazaoSocial' => [
        'type'           => 'varchar',
        'constraint'     => '32'
    ],
    'Cnpj' => [
        'type'           => 'varchar',
        'constraint'     => '14'
    ],
    'Endereco' => [
        'type'           => 'varchar',
        'constraint'     => '100'
    ],
    'NumEndereco' => [
        'type'           => 'int',
        'constraint'     => '11',
    ],'Cep' => [
        'type'           => 'varchar',
        'constraint'     => '8'
    ],
    'CodCidade' => [
        'type'           => 'int',
        'constraint'     => '11',
    ],
    'CodEstado' => [
        'type'           => 'int',
        'constraint'     => '11',
    ]
];

$config['schema']['Bancos'] = [
    'CodBanco' => [
        'type'           => 'int',
        'primary_key'    => TRUE,
        'constraint'     => '11',
        'auto_increment' => true
    ],
    'Nome' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ]
];



/* end of file */

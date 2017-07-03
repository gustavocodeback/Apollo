<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Tabela de estados
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

// Tabela de Cidades
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

// Tabela de classificacoes
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

// Tabela de colaboradores
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

// tabela de empresas
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
    ],
    'Cep' => [
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

// Tabela Bancos
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

// Tabela Carteiras
$config['schema']['Carteiras'] = [
    'CodCarteira' => [
        'type'           => 'int',
        'primary_key'    => TRUE,
        'constraint'     => '11',
        'auto_increment' => true
    ],
    'Nome' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ],
    'CodColaborador' => [
        'type'        => 'int',
        'constraint'  => '11'
    ],
];

// Tabela Carteiras
$config['schema']['CarteirasClientes'] = [
    'CodCarteiraCliente' => [
        'type'           => 'int',
        'primary_key'    => TRUE,
        'constraint'     => '11',
        'auto_increment' => true
    ],
    'CodCarteira' => [
        'type' => 'int',
        'constraint' => '11',
    ],
    'CodEmpresa' => [
        'type' => 'int',
        'constraint' => '11'
    ]
];

// tabela de Clientes
$config['schema']['Clientes'] = [
    'CodCliente' => [
        'type'           => 'int',
        'primary_key'    => TRUE,
        'constraint'     => '11',
        'auto_increment' => true
    ],
    'CodEmpresa' => [
        'type'       => 'int',
        'constraint' => '11'
    ],
    'uid' => [
        'type'       => 'varchar',
        'constraint' => '32'
    ],
    'nome' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ],
    'telefone' => [
        'type'           => 'int',
        'constraint'     => '11',
    ],
    'cpf' => [
        'type'       => 'varchar',
        'constraint' => '32'
    ],
    'criado' => [
        'type'       => 'datetime',
    ],
    'status' => [
        'type'       => 'char',
        'constraint' => '1'
    ]
];

/* end of file */

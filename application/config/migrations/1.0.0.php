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

// Tabela de Produtos
$config['schema']['Produtos'] = [
    'CodProduto' => [
        'type'           => 'int',
        'constraint'     => '11',
        'primary_key'    => TRUE,
        'auto_increment' => TRUE
    ],
    'Nome' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ]
];

// Tabela Logs
$config['schema']['Logs'] = [
    'CodLog' => [
        'type'           => 'int',
        'constraint'     => '11',
        'primary_key'    => TRUE,
        'auto_increment' => true
    ],
    'uid' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ],
    'Entidade' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ],
    'Acao' => [
        'type'       => 'varchar',
        'constraint' => '100',
    ],
    'Data' => [
        'type' => 'date'
    ],
    'Mensagem' => [
        'type' => 'text'
    ]
];

// Tabela de clientes
$config['schema']['Clientes'] = [
    'CodCliente' => [
        'type'           => 'int',
        'constraint'     => '11',
        'primary_key'    => TRUE,
        'auto_increment' => TRUE
    ],
    'CodProduto' => [
        'type'       => 'int',
        'constraint' => '11',
    ],
    'TipoCadastro' => [
        'type'       => 'char',
        'constraint' => 1
    ],
    'CNPJ' => [
        'type'       => 'varchar',
        'constraint' => '20'
    ],
    'CPF' => [
        'type'       => 'varchar',
        'constraint' => '20'
    ],
    'Email' => [
        'type'       => 'varchar',
        'constraint' => '60'
    ], 
    'Nome' => [
        'type'       => 'varchar',
        'constraint' => '60'
    ], 
    'TaxaInicial' => [
        'type'       => 'varchar',
        'constraint' => '60'
    ], 
    'TaxaMensal' => [
        'type'       => 'varchar',
        'constraint' => '60'
    ], 
    'MaxView' => [
        'type'       => 'int',
        'constraint' => '6'
    ], 
    'MaxPush' => [
        'type'       => 'int',
        'constraint' => '2'
    ], 
    'MaxProdutos' => [
        'type'       => 'int',
        'constraint' => '6'
    ],
    'TokenApi' => [
        'type'       => 'varchar',
        'constraint' => '32'
    ],
    'Banco' => [
        'type'       => 'varchar',
        'constraint' => '32'
    ],
    'UsuarioBanco' => [
        'type'       => 'varchar',
        'constraint' => '32'
    ],
    'SenhaBanco' => [
        'type'       => 'varchar',
        'constraint' => '32'
    ]
];

/* end of file */

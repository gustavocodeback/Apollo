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


$config['schema']['Departamentos'] = [
    'CodDepartamento' => [
        'type'           => 'int',
        'primary_key'    => TRUE,
        'constraint'     => '11',
        'auto_increment' => true
    ],
    'Nome' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ],
    'Cor' => [
        'type'       => 'varchar',
        'constraint' => '20'
    ]
];

$config['schema']['TiposDocumentos'] = [
    'CodTipoDocumento' => [
        'type'           => 'int',
        'primary_key'    => TRUE,
        'constraint'     => '11',
        'auto_increment' => true
    ],
    'Categoria' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ],
    'Descricao' => [
        'type'           => 'varchar',
        'constraint'     => '120',
    ],
    'Origem' => [
        'type'           => 'varchar',
        'constraint'     => '20',
    ],
    'Pagamento' => [
        'type'           => 'char',
        'constraint'     => '1',
    ],
    'Icone' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ]
];

$config['schema']['Solicitacoes'] = [
    'CodSolicitacao' => [
        'type'           => 'int',
        'primary_key'    => TRUE,
        'constraint'     => '11',
        'auto_increment' => true
    ],
    'CodDepartamento' => [
        'type'           => 'int',
        'constraint'     => '11',
    ],
    'Descricao' => [
        'type'       => 'varchar',
        'constraint' => '120'
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

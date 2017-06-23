<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['schema']['clientes'] = [
    'codcliente' => [
        'type'        => 'varchar',
        'primary_key' => TRUE,
        'constraint'  => '100'
    ],
    'nome' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ],
    'email' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ],
    'idade' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ],
    'status' => [
        'type'       => 'varchar',
        'constraint' => '1'
    ]
];
$config['schema']['fornecedores'] = [
    'codusuario' => [
        'type'        => 'varchar',
        'primary_key' => TRUE,
        'constraint'  => '100'
    ],
    'email' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ]
];


/* end of file */

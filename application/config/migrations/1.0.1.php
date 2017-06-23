<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once( 'application/config/migrations/1.0.0.php' );

$config['schema']['cachorros'] = [
    'codusuario' => [
        'type'        => 'varchar',
        'primary_key' => TRUE,
        'constraint'  => '100'
    ],
    'nome' => [
        'type'       => 'int',
        'constraint' => '100'
    ],
    'email' => [
        'type'       => 'varchar',
        'constraint' => '100'
    ]
];

$config['schema']['gatos'] = [
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

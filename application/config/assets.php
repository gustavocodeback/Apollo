<?php defined('BASEPATH') OR exit('No direct script access allowed');

// pacotes padroes
$config['default'] = [ 'global', 'jquery', 'vue', 'bootstrap' ];

// configuracao dos assets globais
$config['global'] = [
    'css' => [
        site_url( 'assets/global/global.css' )
    ],
    'js' => [
        site_url( 'assets/global/global.js' )
    ]
];

// inclui o bootstrap
$config['bootstrap'] = [
    'css'=> [
        site_url( 'assets/bootstrap/dist/css/bootstrap.min.css' )
    ],
    'js' => [
        site_url( 'assets/bootstrap/dist/js/bootstrap.min.js' )
    ]
];

// inclui o jquery
$config['jquery'] = [
    'js' => [
        site_url( 'assets/jquery/dist/jquery.min.js' )
    ]
];

// inclui o vue
$config['vue'] = [
    'js' => [
        site_url( 'assets/vue/dist/vue.min.js' )
    ]
];

// seta o login
$config['login'] = [
    'css'=> [
        site_url( 'assets/pages/login/login.css' )
    ],
    'js'=> [
        site_url( 'assets/pages/login/login.js' )
    ]
];

// seta o grid
$config['grid'] = [
    'css'=> [
        site_url( 'assets/pages/grid/grid.css' )
    ]
];
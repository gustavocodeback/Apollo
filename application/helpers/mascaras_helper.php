<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* mascara_cnpj
*
* formata o cnpj
*
*/
if ( ! function_exists('mascara_cnpj') ) {
    function mascara_cnpj( $valor ) {
        $cnpj = substr( $valor, 0, 2 ).'.'.substr( $valor, 2, 3 ).'.'
                        .substr( $valor, 5, 3 ).'/'.substr( $valor, 8, 4 ).'-'.substr( $valor, 12, 2 );
        return $cnpj;
    }
}

/**
* mascara_cep
*
* formata o cep
*
*/
if ( ! function_exists( 'mascara_cep' ) ) {
    function mascara_cep( $valor ) {
        $cep = substr( $valor, 0, 5 ).'-'.substr( $valor, 5, 3 );
        return $cep;       
    }
}
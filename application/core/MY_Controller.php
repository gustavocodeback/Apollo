<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    // indica se o controller é publico ou não
    protected $public = false;

    // rota que deve ser redirecionada
    protected $urlGuard;

   /**
    * __construct
    *
    * metodo construtor
    *
    */
    public function __construct() {
        
        // chama o metodo construtor
        parent::__construct();

        // chama o metodo de migracao
        $this->_migrate();
        
        // seta a url de fuga
        $this->urlGuard = site_url( 'login' );

        // chama o metodo protetor
        $this->_guard( $this->public );
    }

    /**
    * _migrate
    *
    * faz a migracao do banco de dados
    *
    */
    public function _migrate() {

        // verifica se as migracoes estao ativadas
        if ( !USE_DATABASE_VERSIONS ) return;
         
         // carrega a library de migracao
        $this->load->library( 'Migration' );

        // inicia a migracao
        $this->migration->start();
    }

   /**
    * _guard
    *
    * protege o acesso para acessos remotos
    *
    */
    protected function _guard( $public = false ) {

        // verifica se a url é protegida
        if ( $this->public && $this->guard->currentUser() !== null ) {

            // redireciona para a url de guard
            redirect( site_url( 'dashboard' ) );
            die();
        };

        // verifica se o usuario esta logado
        if ( !$this->public && $this->guard->currentUser() === null ) {

            // redireciona para a url de guard
            redirect( $this->urlGuard );
            die();
        };
    }
}

/* end of file */
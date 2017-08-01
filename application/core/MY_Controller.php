<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    // indica se o controller é publico ou não
    protected $public = false;

    // rota que deve ser redirecionada
    protected $urlGuard;

    // rotina
    protected $routine = false;

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

   /**
    * valid_cnpj
    *
    * valida o acesso
    *
    */
    function valid_cnpj($str) {
        if (strlen($str) > 18 || strlen($str) < 14) {
            $this->form_validation->set_message('valid_cnpj','Cnpj inválido!');
            return false;
        } else {
            $search = array('.','/','-');
            $cnpj = str_replace ( $search , '' , $str );
            if( strlen($cnpj) > 14 || strlen($cnpj) < 14  ) {
                $this->form_validation->set_message('valid_cnpj','Cnpj inválido!');
                return false;
            }
            // Valida primeiro dígito verificador
            for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
            {
                $soma += $cnpj{$i} * $j;
                $j = ($j == 2) ? 9 : $j - 1;
            }
            $resto = $soma % 11;
            if ( $cnpj{12} != ( $resto < 2 ? 0 : 11 - $resto ) ) {
                $this->form_validation->set_message('valid_cnpj','Cnpj inválido!');
                return false;
            }
            // Valida segundo dígito verificador
            for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
            {
                $soma += $cnpj{$i} * $j;
                $j = ($j == 2) ? 9 : $j - 1;
            }
            $resto = $soma % 11;
            if ( $cnpj{13} == ( $resto < 2 ? 0 : 11 - $resto ) ) return true;
            else {
                $this->form_validation->set_message('valid_cnpj','Cnpj inválido!');
                return false;
            }
        }
    }

   /**
    * checkAccess
    *
    * verifica se o usuário atual pode acessar um item
    *
    */
    protected function checkAccess( $actions = [] ) {

        // verifica se existe uma rotina
        if ( !$this->routine ) {
            $this->view->setTitle( 'Acesso negado' )->render( 'denied' );
            return false;
        }

        // carrega o finder
        $this->load->finder( 'RotinasFinder' );

        // carrega a rotina
        $rotina = $this->RotinasFinder->clean()->nome( $this->routine )->get( true );
        if ( !$rotina )  {
            $this->view->setTitle( 'Acesso negado' )->render( 'denied' );
            return false;
        }

        // seta a permissao
        $canActive = true;

        // pega o usuario
        $user = $this->guard->currentUser();

        // percorre as acoes
        foreach( $actions as $acao ) {
            
            // verifica se o usuário pode executar a acao
            if ( !$this->view->$acao( $rotina->rid, $user->data['gid'] ) ) $canActive = false;
        }

        // verifica se pode acessar
        if ( !$canActive ) {
            $this->view->setTitle( 'Acesso negado' )->render( 'denied' );
            return false;
        } else return true;
    }
}

/* end of file */
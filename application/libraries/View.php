<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* View
*
* classe de manipulacao de view
*
*/
class View {

    // titulo da pagina
    public $title = null;

    // instancia do codeigniter
    public $ci;

    // links para arquivos js
    public $js = [];

    // links para arquivos css
    public $css = [];

    // configuracao
    public $config;

    // pagina atual
    public $page;

    // dados da pagina
    public $data = [];

    // usuario logado
    public $user;

   /**
    * __construct
    *
    * metodo construtor
    *
    */
    public function __construct() {

        // pega a instancia do codeigniter
        $this->ci =& get_instance();

        // carrega a configuracao
        $this->config = $this->ci->config;
        $this->config->load( 'assets' );

        // carrega o usuario
        $this->ci->load->library( 'guard' );
        $this->user = $this->ci->guard->currentUser();

        // seta os pacotes padrao
        $this->_loadDefault();
    }

   /**
    * _loadDefault
    *
    * carrega os arquivos padroes
    *
    * @private
    */
    private function _loadDefault() {

        // pega os pacotes padroes
        $defaults = $this->config->item( 'default' );

        // percorre todos
        foreach( $defaults as $pack ) {

            // pega o item
            if ( $item = $this->config->item( $pack ) ) {

                // verifica se existem js
                if ( isset( $item['js'] ) ) {

                    // percorre todos os itens
                    foreach( $item['js'] as $js_file ) $this->js[] = $js_file;
                }

                // verifica se existe css
                if( isset( $item['css'] ) ) {

                    // percorre todos os itens
                    foreach( $item['css'] as $css_file ) $this->css[] = $css_file;
                }
            }
        }
    }

   /**
    * setItem
    *
    * seta o valor de um item de dados
    *
    * @param {string} $key a chave do item
    * @param {string} $value o valor do item
    */
    public function set( $key, $value ) {
        
        // seta o valor no array de dados
        $this->data[$key] = $value;
        return $this;
    }

   /**
    * item
    *
    * pega um item de dado
    *
    * @param {string} $key o item a ser recuperado
    */
    public function item( $key ) {

        // verifica se o item existe
        return isset( $this->data[$key] ) ? $this->data[$key] : null;
    }

   /**
    * module
    *
    * carrega o js e css de um modulo
    *
    * @param {string} $module o modulo a ser carregado
    */
    public function module( $module ) {

        // verifica se existe o modulo
        if ( $item = $this->config->item( $module ) ) {

            // verifica se existem js
            if ( isset( $item['js'] ) ) {

                // percorre todos os itens
                foreach( $item['js'] as $js_file ) $this->js[] = $js_file;
            }

            // verifica se existe css
            if( isset( $item['css'] ) ) {

                // percorre todos os itens
                foreach( $item['css'] as $css_file ) $this->css[] = $css_file;
            }
        }

        // retira itens repetidos
        $this->css = array_unique( $this->css );
        $this->js = array_unique( $this->js );

        // retorna a instancia
        return $this;
    }

   /**
    * setTitle
    *
    * seta o titulo da pagina
    *
    * @param {string} $title titulo da pagina
    */
    public function setTitle( $title = '' ) {

        // seta o titulo da pagina
        $this->title = $title;
        return $this;
    }

   /**
    * getTitle
    *
    * pega o titulo da pagina
    *
    */
    public function getTitle() {

        // verifica se existe um titulo a ser retornado
        return ( $this->title ) ? $this->title : 'Página sem título';
    }

   /**
    * component
    *
    * renderiza um componente especifica
    *
    * @param {string} $component pagina a ser carregada
    */
    public function component( $component = '', $html = false ) {

        // carrega o modulo
        $this->module( $component );

        // verifica se o arquivo existe
        if ( file_exists( APPPATH.'views/components/'.$component.'.php' ) ) {

            // carrega sem a view master
            return $this->ci->load->view( 'components/'.$component, [ 'view' => $this ], $html );
        } else $this->ci->load->view( 'errors/html/error_404' );
    }

   /**
    * render
    *
    * renderiza uma pagina especifica
    *
    * @param {string} $page pagina a ser carregada
    */
    public function render( $page = '', $master = true, $html = false ) {

        // seta a pagina atual
        $this->page = $page;

        // carrega o modulo
        $this->module( $page );

        // verifica se o arquivo existe
        if ( file_exists( APPPATH.'views/pages/'.$page.'.php' ) ) {

            // carrega a pagina
            if ( $master ) {

                // carrega a view master
                return $this->ci->load->view( 'master', [ 'view' => $this ], $html );
            } else {

                 // carrega sem a view master
                return $this->ci->load->view( 'pages/'.$page, [ 'view' => $this ], $html );
            }
        } else $this->ci->load->view( 'errors/html/error_404' );
    }

    public function getHeader( $data ) {

        // pega o item
        $data = $this->item( $data );

        // verifica se algum dado foi enviado
        if ( !is_array( $data ) && count( $data ) == 0 ) return false;

        // pega a primeira linha
        $row = $data[0];

        // volta as chaves
        return array_keys( $row );
    }
}

/* end of file */

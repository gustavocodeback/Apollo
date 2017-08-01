<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends MY_Controller {

    // indica se o controller é publico
	protected $public = false;

    // rotina
    protected $routine = 'Logs';

   /**
    * __construct
    *
    * metodo construtor
    *
    */
    public function __construct() {
        parent::__construct();
        
        // carrega o finder
        $this->load->finder( [ 'LogsFinder' ] );
        
        // chama o modulo
        $this->view->module( 'navbar' )->module( 'aside' );
    }
    
   /**
    * index
    *
    * mostra o grid de contadores
    *
    */
	public function index() {

        // verifica a permissao
        if ( !$this->checkAccess( [ 'canRead' ] ) ) return;

        // faz a paginacao
		$this->LogsFinder->clean()->grid()

		// seta os filtros
        ->addFilter( 'Entidade', 'text' )
        ->addFilter( 'Acao', 'select', [ 'criou' => 'Criou', 'alterou' => 'Alterou', 'deletou' => 'Deletou' ] )
        ->addFilter( 'Data', 'text' )
        ->filter()
		->order()
		->paginate( 0, 20 )

		// seta as funcoes nas colunas
		->onApply( 'Ações', function( $row, $key ) {
			echo '<a href="'.site_url( 'logs/excluir/'.$row[$key] ).'" class="margin btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>';            
		})

		// renderiza o grid
		->render( site_url( 'logs' ) );

		// seta o titulo da pagina
		$this->view->setTitle( 'Logs - listagem' )->render( 'grid' );
    }

   /**
    * excluir
    *
    * exclui um item
    *
    */
    public function excluir( $key ) {

        // verifica a permissao
        if ( !$this->checkAccess( [ 'canDelete' ] ) ) return;

        // seta as cidades
        $dados = [ 'CodLog' => $key ];

        // chama no banco
        $this->db->delete( 'Logs', $dados );

        // carrega a index
        $this->index();
    }
}

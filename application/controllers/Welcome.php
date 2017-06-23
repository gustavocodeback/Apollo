<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	protected $public = true;

	public function index() {

		$this->load->finder( 'ClientesFinder' );

		// faz a paginacao
		$this->ClientesFinder->grid()

		// seta os filtros
		->addFilter( 'email', 'text' )
		->addFilter( 'status', 'select', [ 'A' => 'Ativo', 'I' => 'Bloqueado' ] )
		->filter()
		->order()
		->paginate( 0, 1 )

		// seta as funcoes nas colunas
		->onApply( 'status', function( $row ) {
			echo $row['status'] == 'A' ? 'Ativo' : 'Bloqueado';
		})
		->onApply( [ 'nome', 'email' ], function( $row, $key ) {
			echo '<b>'.$row[$key].'</b>';
		})
		->onApply( 'Acoes', function( $row, $key ) {
			echo '<button class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></button>';
		})

		// renderiza o grid
		->render( site_url( 'welcome/index' ) );
		
		// seta o titulo da pagina
		$this->view->setTitle( 'Listagem' )->render( 'grid' );
	}

	public function signup() {
		$email = $this->input->post( 'email' );
		$pass = $this->input->post( 'password' );
		if ( $this->guard->createUserWithEmailAndPassword( $email, $pass ) ) {
			$this->guard->loginWithEmailAndPassword( $email, $pass );
			redirect( site_url( 'welcome/dashboard' ) );
		}
		$this->view->render( 'signup' );
	}

	public function logar() {
		$email = $this->input->post( 'email' );
		$pass = $this->input->post( 'password' );
		if ( $this->guard->loginWithEmailAndPassword( $email, $pass ) ) {
			redirect( site_url( 'welcome/dashboard' ) );
		}
	}

	public function logout() {
		$this->guard->logout();
		redirect( site_url() );		
	}

	public function dashboard() {

		$this->_guard( false );
		$this->view->render( 'dashboard' );		
	}
}

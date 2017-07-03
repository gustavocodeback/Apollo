<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cargos extends MY_Controller {

    // indica se o controller é publico
	protected $public = false;

   /**
    * __construct
    *
    * metodo construtor
    *
    */
    public function __construct() {
        parent::__construct();
        
        // carrega o finder
        $this->load->finder( 'GruposFinder' );
        
        // chama o modulo
        $this->view->module( 'navbar' )->module( 'aside' );
    }

   /**
    * _formularioCargos
    *
    * valida o formulario de cargos
    *
    */
    private function _formularioCargos() {

        // seta as regras
        $rules = [
            [
                'field' => 'cargo',
                'label' => 'Cargo',
                'rules' => 'required|min_length[2]|max_length[30]'
            ]
        ];

        // valida o formulário
        $this->form_validation->set_rules( $rules );
        return $this->form_validation->run();
    }

   /**
    * index
    *
    * mostra o grid de cargos
    *
    */
	public function index() {

        // faz a paginacao
		$this->GruposFinder->grid()

		// seta os filtros
		->order()
		->paginate( 0, 20 )

		// seta as funcoes nas colunas
		->onApply( 'Ações', function( $row, $key ) {
			echo '<a href="'.site_url( 'cargos/alterar/'.$row['Código'] ).'" class="margin btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span></a>';
			echo '<a href="'.site_url( 'cargos/excluir/'.$row['Código'] ).'" class="margin btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>';            
		})

		// renderiza o grid
		->render( site_url( 'cargos/index' ) );
		
        // seta a url para adiciona
        $this->view->set( 'add_url', site_url( 'cargos/adicionar' ) );

		// seta o titulo da pagina
		$this->view->setTitle( 'Cargos - listagem' )->render( 'grid' );
    }

   /**
    * adicionar
    *
    * mostra o formulario de adicao
    *
    */
    public function adicionar() {

        // carrega a view de adicionar
        $this->view->setTitle( 'Conta Ágil - Adicionar cargo' )->render( 'forms/cargo' );
    }

   /**
    * alterar
    *
    * mostra o formulario de edicao
    *
    */
    public function alterar( $key ) {

        // carrega o cargo
        $cargo = $this->GruposFinder->key( $key )->get( true );

        // verifica se o mesmo existe
        if ( !$cargo ) {
            redirect( 'cargos/index' );
            exit();
        }

        // salva na view
        $this->view->set( 'cargo', $cargo );

        // carrega a view de adicionar
        $this->view->setTitle( 'Conta Ágil - Adicionar cargo' )->render( 'forms/cargo' );
    }

   /**
    * excluir
    *
    * exclui um item
    *
    */
    public function excluir( $key ) {
        $grupo = $this->GruposFinder->getGrupo();
        $grupo->setGid( $key );
        $grupo->delete();

        $this->index();
    }

   /**
    * salvar
    *
    * salva os dados
    *
    */
    public function salvar() {

        // instancia um novo objeto grupo
        $grupo = $this->GruposFinder->getGrupo();
        $grupo->setGrupo( $this->input->post( 'cargo' ) );
        $grupo->setGid( $this->input->post( 'cod' ) );

        // verifica se o formulario é valido
        if ( !$this->_formularioCargos() ) {

            // seta os erros de validacao            
            $this->view->set( 'cargo', $grupo );
            $this->view->set( 'errors', validation_errors() );
            
            // carrega a view de adicionar
            $this->view->setTitle( 'Conta Ágil - Adicionar cargo' )->render( 'forms/cargo' );
            return;
        }

        // verifica se o dado foi salvo
        if ( $grupo->save() ) {
            redirect( site_url( 'cargos/index' ) );
        }
    }
}

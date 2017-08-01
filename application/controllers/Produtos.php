<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends MY_Controller {

    // indica se o controller é publico
	protected $public = false;

    // rotina
    protected $routine = 'Produtos';

   /**
    * __construct
    *
    * metodo construtor
    *
    */
    public function __construct() {
        parent::__construct();
        
        // carrega o finder
        $this->load->finder( [ 'ProdutosFinder' ] );
        
        // chama o modulo
        $this->view->module( 'navbar' )->module( 'aside' );
    }

   /**
    * _formularioProduto
    *
    * valida o formulario de produtos
    *
    */
    private function _formularioProduto() {

        // seta as regras
        $rules = [
            [
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required|min_length[3]|max_length[32]|trim'
            ]
        ];

        // valida o formulário
        $this->form_validation->set_rules( $rules );
        return $this->form_validation->run();
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
		$this->ProdutosFinder->grid()

		// seta os filtros
        ->addFilter( 'nome', 'text' )
		->filter()
		->order()
		->paginate( 0, 20 )

		// seta as funcoes nas colunas
		->onApply( 'Ações', function( $row, $key ) {
			echo '<a href="'.site_url( 'produtos/alterar/'.$row['Código'] ).'" class="margin btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span></a>';
			echo '<a href="'.site_url( 'produtos/excluir/'.$row['Código'] ).'" class="margin btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>';            
		})

		// renderiza o grid
		->render( site_url( 'produtos/index' ) );
		
        // seta a url para adiciona
        $this->view->set( 'add_url', site_url( 'produtos/adicionar' ) );

		// seta o titulo da pagina
		$this->view->setTitle( 'Produtos - listagem' )->render( 'grid' );
    }

   /**
    * adicionar
    *
    * mostra o formulario de adicao
    *
    */
    public function adicionar() {

        // verifica a permissao
        if ( !$this->checkAccess( [ 'canCreate' ] ) ) return;

        // carrega a view de adicionar
        $this->view->setTitle( 'Apresente.se - Adicionar produto' )->render( 'forms/produto' );
    }

   /**
    * alterar
    *
    * mostra o formulario de edicao
    *
    */
    public function alterar( $key ) {

        // verifica a permissao
        if ( !$this->checkAccess( [ 'canUpdate' ] ) ) return;

        // carrega o cargo
        $produto = $this->ProdutosFinder->key( $key )->get( true );

        // verifica se o mesmo existe
        if ( !$produto ) {
            redirect( 'estados/index' );
            exit();
        }

        // salva na view
        $this->view->set( 'produto', $produto );

        // carrega a view de adicionar
        $this->view->setTitle( 'Apresente.se - Alterar produto' )->render( 'forms/produto' );
    }

   /**
    * excluir
    *
    * exclui um item
    *
    */
    public function excluir( $key ) {

        // verifica a permissao
        if ( !$this->checkAccess( [ 'canDelete' ] ) ) return

        // seta as cidades
        $produto = $this->ProdutosFinder->getCidade();

        // carrega pelo codigo
        $produto->setCod( $key );

        // deleta
        $produto->delete();

        // carrega a index
        $this->index();
    }

   /**
    * salvar
    *
    * salva os dados
    *
    */
    public function salvar() {

        // checa a permissao
        if ( $this->input->post( 'cod' ) )
            if ( !$this->checkAccess( [ 'canUpdate' ] ) ) return;
        else
            if ( !$this->checkAccess( [ 'canCreate' ] ) ) return;

        // instancia um novo objeto grupo
        $produto = $this->ProdutosFinder->getProduto();
        $produto->setNome( $this->input->post( 'nome' ) );
        $produto->setCod( $this->input->post( 'cod' ) );

        // verifica se o formulario é valido
        if ( !$this->_formularioProduto() ) {

            // seta os erros de validacao            
            $this->view->set( 'produto', $produto );
            $this->view->set( 'errors', validation_errors() );
            
            // carrega a view de adicionar
            $this->view->setTitle( 'Apresente.se - Salvar produto' )->render( 'forms/produto' );
            return;
        }

        // verifica se o dado foi salvo
        if ( $produto->save() ) {
            redirect( site_url( 'produtos' ) );
        } else {

            // seta os erros de validacao            
            $this->view->set( 'produto', $produto );
            $this->view->set( 'errors', 'Erro ao salvar o produto' );
            
            // carrega a view de adicionar
            $this->view->setTitle( 'Apresente.se - Salvar produto' )->render( 'forms/produto' );
            return;
        }
    }
}

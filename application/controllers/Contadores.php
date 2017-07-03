<?php defined('BASEPATH') OR exit('No direct script access allowed');

// inclui a classe de usuario
include_once( 'application/classes/User.php' );

class Contadores extends MY_Controller {

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
        $this->load->finder( [ 'ContadoresFinder', 'GruposFinder' ] );
        
        // chama o modulo
        $this->view->module( 'navbar' )->module( 'aside' );
    }

   /**
    * _formularioContadores
    *
    * valida o formulario de contadores
    *
    */
    private function _formularioContadores() {

        // seta as regras
        $rules = [
            [
                'field' => 'senha',
                'label' => 'Senha',
                'rules' => 'required|min_length[6]|max_length[16]|trim'
            ],[
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'required|valid_email|trim'
            ],[
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'required|min_length[2]|max_length[30]|trim'
            ],[
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required|min_length[1]|max_length[1]|trim'
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

        // faz a paginacao
		$this->ContadoresFinder->grid()

		// seta os filtros
		->order()
		->paginate( 0, 20 )

		// seta as funcoes nas colunas
		->onApply( 'Ações', function( $row, $key ) {
			echo '<a href="'.site_url( 'contadores/alterar/'.$row['Código'] ).'" class="margin btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span></a>';
			echo '<a href="'.site_url( 'contadores/excluir/'.$row['Código'] ).'" class="margin btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>';            
		})
        ->onApply( 'Status', function( $row, $key ) {
            if ( $row['Status'] == 'A' )
                echo '<b class="text-danger">Ativo</b>';
            else
                echo '<b class="text-danger">Bloqueado</b>';
        })

		// renderiza o grid
		->render( site_url( 'contadores/index' ) );
		
        // seta a url para adiciona
        $this->view->set( 'add_url', site_url( 'contadores/adicionar' ) );

		// seta o titulo da pagina
		$this->view->setTitle( 'Contadores - listagem' )->render( 'grid' );
    }

   /**
    * adicionar
    *
    * mostra o formulario de adicao
    *
    */
    public function adicionar() {

        // seta os grupos
        $grupos = $this->GruposFinder->get();
        $this->view->set( 'grupos', $grupos );

        // carrega a view de adicionar
        $this->view->setTitle( 'Conta Ágil - Adicionar cargo' )->render( 'forms/contador' );
    }

   /**
    * alterar
    *
    * mostra o formulario de edicao
    *
    */
    public function alterar( $key ) {

        // seta os grupos
        $grupos = $this->GruposFinder->get();
        $this->view->set( 'grupos', $grupos );

        // carrega o cargo
        $contador = $this->ContadoresFinder->concat()->key( $key, 'c' )->get( true );

        // verifica se o mesmo existe
        if ( !$contador ) {
            redirect( 'contadores/index' );
            exit();
        }

        // salva na view
        $this->view->set( 'contador', $contador );

        // carrega a view de adicionar
        $this->view->setTitle( 'Conta Ágil - Alterar contador' )->render( 'forms/contador' );
    }

   /**
    * excluir
    *
    * exclui um item
    *
    */
    public function excluir( $key ) {
        $grupo = $this->ContadoresFinder->getGrupo();
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

        // verifica se o formulario é valido
        if ( !$this->_formularioContadores() ) {

            // seta os erros de validacao            
            $this->view->set( 'contador', $contador );
            $this->view->set( 'errors', validation_errors() );
            
            // carrega a view de adicionar
            $this->view->setTitle( 'Conta Ágil - Adicionar contador' )->render( 'forms/contador' );
            return;
        }

        // pega o email e a senha
        $email = $this->input->post( 'email' );
        $senha = $this->input->post( 'senha' );

        // tenta criar um usuario para o contador
        if ( !$this->guard->createUserWithEmailAndPassword( $email, $senha ) ) {
            return;
        }

        // pega o uid do usuario criado
        $user = new User( $this->db, $this->config );

        // carrega o usuario pelo email
        $user->loadByEmail( $email );

        // coloca no grupo indicado
        $user->pushOnGroup( $this->input->post( 'grupo' ) );

        // instancia um novo objeto grupo
        $contador = $this->ContadoresFinder->getContador();
        $contador->setNome( $this->input->post( 'nome' ) );
        $contador->setStatus( $this->input->post( 'status' ) );
        $contador->setUid( $user->data['uid'] );
        $contador->setCod( $this->input->post( 'cod' ) );

        // verifica se o dado foi salvo
        if ( $contador->save() ) {
            redirect( site_url( 'contadores/index' ) );
        }
    }
}

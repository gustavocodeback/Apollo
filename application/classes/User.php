<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User {

    // banco de dados
    public $db;

    // configuracoes
    public $config;

    // se o usuario ja foi carregado
    public $loaded = false;

    // os dados do usuario
    public $data;

   /**
    * _validateEmailAndPassword
    *
    * valida o email e a senha
    *
    * @param {string} $db
    * @param {string} $config
    */
    public function __construct( $db, $config ) {

        // seta o acesso ao banco de dados
        $this->db = $db;

        // seta o acesso as configuracoes
        $this->config = $config;
    }

    /**
    * getField
    *
    * pega o nome de um campo
    *
    * @param {string} $table
    * @param {string} $alias
    */
    private function getField( $table, $alias ) {

        // pega a tabela
        $table = $this->config->item( $table );

        // volta o nome do campo
        return isset( $table['fields'][$alias]['alias'] ) ? $table['fields'][$alias]['alias'] : $alias;        
    }
    
   /**
    * loadByEmail
    *
    * carrega o usuario pelo email
    *
    * @param {string} $email
    */
    public function loadByEmail( $email ) {

        // proteje a consulta com um try catch
        try {

            // seta o nome do campo
            $emailAlias = $this->getField( 'users', 'email' );
            
            // monta a query
            $this->db->from( $this->config->item( 'users' )['table'] )
            ->select( '*' )
            ->where( "$emailAlias = '$email'" );

            // faz a busca
            $src = $this->db->get();

            // verifica se existem resultado
            if ( $src->num_rows() > 0 ) {
                $this->loaded = true;
                $this->data = $src->result_array()[0];
            }

            // volta a instancia
            return $this;
        } catch ( Exception $e ) {
            return $this;
        }
    }

   /**
    * loadByUid
    *
    * carrega o usuario pelo uid
    *
    * @param {string} $uid
    */
    public function loadByUid( $uid ) {

        // proteje a consulta com um try catch
        try {

            // seta o nome do campo
            $uidAlias = $this->getField( 'users', 'uid' );
            
            // monta a query
            $this->db->from( $this->config->item( 'users' )['table'] )
            ->select( '*' )
            ->where( "$uidAlias = '$uid'" );

            // faz a busca
            $src = $this->db->get();

            // verifica se existem resultado
            if ( $src->num_rows() > 0 ) {
                $this->loaded = true;
                $this->data = $src->result_array()[0];
            }

            // volta a instancia
            return $this;
        } catch ( Exception $e ) {
            return $this;
        }
    }

   /**
    * createUser
    *
    * cria um novo usuario 
    *
    * @param {string} $email
    * @param {string} $password
    */
    public function createUser( $email, $password ) {

        // prepara os dados
        $emailAlias = $this->getField( 'users', 'email' );
        $passwordAlias = $this->getField( 'users', 'password' );
        $data = [
            $this->getField( 'users', 'uid' ) => md5( uniqid( rand() * time() ) ),
            $emailAlias => $email,
            $passwordAlias => crypt( $password, md5( uniqid( rand() * time() ) ) )
        ];

        // salva os dados
        if ( $this->db->insert( $this->config->item( 'users' )['table'], $data ) ) {
            return $this;
        } else return false;
    }

   /**
    * _validateEmailAndPassword
    *
    * valida o email e a senha
    *
    * @param {string} $email
    * @param {string} $password
    */
    public function isLoaded() {

        // informa se o usuario ja foi carregado
        return $this->loaded;
    }

   /**
    * setSessionToken
    *
    * seta o token da sessao
    *
    * @param {string} $token
    */
    public function setSessionToken( $token ) {

        // pega os campos
        $tokenAlias = $this->getField( 'users', 'session_token' );

        // prepara os dados
        $data = [
          $tokenAlias => $token  
        ];

        // faz o update
        return $this->db->update( $this->config->item( 'users' )['table'], $data );
    }
}

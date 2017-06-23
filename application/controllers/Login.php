<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	protected $public = true;

	public function index() {
        
        // renderiza a view de login
        $this->view->render( 'login' );
    }
}

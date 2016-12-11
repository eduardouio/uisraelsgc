<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesiones extends CI_Controller {
/**
* Comprueba que un usuario esté loggeado contra el sistema, 
* de no ser asi retorna un formulario para que lo haga
*
* @pakage App Sitio Ispade 
* @subpakage Modelo
* @autor Eduardo Villota <eduardouio7@gmail.com> <@eduardouio>
* @copyrigth 2013 ISPADE <info@ispade.edu.ec>
* @license (c) ISPADE Todos Los Derechos Reservados
* @link www.ispade.edu.ec
* @version 1.0
* @access protected
*
*/

public function __construct(){
	/* constructor de la clase */
	parent::__construct();
}

public function isLogged(){
	/* Confirma que un usuario esté loggeado en el sistema */
	if($this->session->userdata('login')){
		return TRUE;
	}else{
		$this->exitApp();
	}
}

	public function exitApp(){
		/* Terminar una sesion y muestra el fomulario */
		$this->session->sess_destroy();
		$this->Data_['header'] = array('title' => 'Bienvenido!...' );
		$this->Data_['login'] = array('form'=>'form');	
		$this->html_render->page_render($this->Data_);
	}
}


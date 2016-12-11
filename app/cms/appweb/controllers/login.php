<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
/**
* This class management  
*
* @pakage Cpanel Sitio Ispade 
* @subpakage controladores
* @autor Eduardo Villota <eduardouio7@gmail.com> <@eduardouio>
* @copyrigth 2013 ISPADE <info@ispade.edu.ec>
* @license (c) ISPADE Todos Los Derechos Reservados
* @link www.ispade.edu.ec
* @version 1.0
* @views headers,[alerta] , formulario, pie 
* @access public
*
*/

	// variables para la identificación de la pagina y sus artículos
protected $IdPage_ = '0';
protected $Npage_ = 'user';
protected $Columns_;
protected $Data_; 
protected $Page_;

public function __construct(){
/**
* Funcion encargada de cargar las clases necesarias
*/
	parent::__construct();
	$this->load->library('form_validation');
}	

	public function index()	{
	/**
	* genera la pagina completa, la página esta compuesta por varios elementos
	*/
		if(!$_POST){			
			#Cargamos el formulario					
			$this->_setInfo();
			$this->session->sess_destroy();
			$this->html_render->page_render($this->Data_);				
		}else{
			#valiamos el formulario
			if($this->_validarForm()){
				$this->_procesarForm();				
			#retornamos
			}else{
				$this->_retornarForm();
			}
		}
	}

	private function _validarForm(){
	/**
	* Valida los campos de fromulario
	* @return boolean
	*/
		$this->form_validation->set_rules('user', 'Usuario', 'trim|required|min_length[1]|max_length[59]|xss_clean');
		$this->form_validation->set_rules('pass', 'Contraseña', 'trim|required|min_lengt1[1]|max_length[59]|xss_clean');
		return $this->form_validation->run();
	}

	private function _procesarForm(){
	/**
	* Inicia la sesion del usuario
	*/
		#recuperamos los datos de sesion	
		$sesion = $this->session->all_userdata();

		#indicamos las columnas a recibir
		$this->Columns_ = array(
								'usuario',
								'pass' 
								);
		
		$user_data = $this->dbsitio->getRows($this->Npage_, $this->Columns_);	
		#comprobar datos ingresados e iniciamos session		
		if (($this->input->post('user') == $user_data[0]['usuario']) && 
			($this->input->post('pass') == $user_data[0]['pass'])){

			$this->session->set_userdata('login','TRUE');
			$this->session->set_userdata('user','elian');
			$this->session->set_userdata('hora',date('Y-m-d H:i:s'));						
			#Registramos en la tabla user
			$data = array('last_login' => date('Y-m-d H:i:s'));
			$this->dbsitio->updateRow($this->Npage_,$data,'Id_usuario = 1');
			#enviamos a la pantalla de administracion							
			$this->load->view('redirection');
		} else{
			$this->_retornarForm();
		}

	}

	private function _retornarForm(){
	/**
	* Retorna el fomulario
	*/	
		#registramos el fallo en la base de datos
		$this->Columns_ = array('failure_count');
		$user_data = $this->dbsitio->getRows($this->Npage_, $this->Columns_);
		$failure = $user_data[0]['failure_count'];
		$failure++;
		$data = array('last_failure' => date('Y-m-d H:i:s'));
			$this->dbsitio->updateRow($this->Npage_,$data,'Id_usuario = 1');
		$this->_setInfo();
		#Cargamos el formulario	
		$this->Data_['alert'] = array('title' => 'Usuario y/o Contraseña Incorrecto!',
										'message' => 'Los datos ingresados en el formulario nos son correctos \n 
													por favor inténtelo nuevamente.');		
		$this->html_render->page_render($this->Data_);	
	}

	private function _setInfo(){
		/* Hubica la información en las plantillas HTML	*/
		$this->Data_['header'] = array('title' => 'Bienvenido!...' );
		$this->Data_['login'] = array('form'=>'form');
		

	}

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactos extends CI_Controller {
/**
* Calse encargada de gestionar la pagina de contactos
*
* @pakage App Sitio Ispade 
* @subpakage controladores
* @autor Eduardo Villota <eduardouio7@gmail.com> <@eduardouio>
* @copyrigth 2013 ISPADE <info@ispade.edu.ec>
* @license (c) ISPADE Todos Los Derechos Reservados
* @link www.ispade.edu.ec
* @version 1.0
* @views header,menu,lateral_menu,form,foot
* @access public
*
*/

	 // variables para la identificacion de la pagina y sus articulos
protected $Table_ = 'page';
protected $IdPage_ = '5';
protected $Npage_ = 'contactos';
protected $V_articles_ ='v_ratings';
protected $To_ ='eduardouio7@gmail.com';
protected $Columns_;
protected $Data_; 
protected $Page_;

public function __construct(){
	parent::__construct();
	$this->load->helper('email');
	$this->load->library('form_validation');
}	

	/**
	* genera la pagina completa, la página esta compuesta por varios elementos
	*/
	public function index()
	{
		if(!$_POST){
			$this->_info();
			#Cargamos el formulario	
			$this->Data_['form'] = array('form'=>'form');
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

	/**
	* Valida los campos de fromulario
	* @return boolean
	*/
	private function _validarForm(){
		$this->form_validation->set_rules('nombres', 'Nombres', 'trim|required|min_length[2]|max_length[60]|xss_clean');		
		$this->form_validation->set_rules('email', 'E-mail', 'trim|xss_clean');		
		$this->form_validation->set_rules('empresa', 'Empresa', 'trim|required|min_length[2]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|min_length[7]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('asunto', 'Empresa', 'trim|required|min_length[2]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('texto_asunto', 'Contenido del Asunto', 'trim|required|min_length[2]|max_length[2000]|xss_clean');

		return $this->form_validation->run();
	}

	/**
	* Procesa los datos del formulario guardandolos en la base de datos 
	* y enviándo un mail con la información, y retorna una página de OK.
	*/
	private function _procesarForm(){
		$sesion = $this->session->all_userdata();
		#grabamos el formulario en la base de datos
		$data = array(
			'names' => $this->input->post('names'),
			'email' => $this->input->post('email'),
			'empresa' => $this->input->post('empresa'),
			'telefono' => $this->input->post('telefono'),
			'asunto' => $this->input->post('asunto'),
			'descripcion' => $this->input->post('texto_asunto'),					  
			'browser' => $sesion['user_agent'],
			'ip' => $sesion['ip_address'],
			'pais' => 'Quito-Ecuador',
			'create_date' => date("Y-m-d H:i:s")
			);

		$this->dbsitio->insertRow('form',$data);

		#enviamos el formulrio por correo
		$message;
		foreach ($data as $campo => $contenido ) {
			$message = $contenido . '<br>';
		}
		send_email($this->To_,'Peticion cliente página web',$message);

		#Pantalla final
		$this->_info();
		$this->Data_['recibido'] = array('alerta' => 'ok' );
		$this->html_render->page_render($this->Data_);	
	}

	private function _info(){
		$this->Columns_ =  array(
			'id_page',
			'title',
			'controller',
			'keywords'
			);
			#recuperamos la información de la vista
		$this->Data_['header'] = $this->dbsitio->getRows($this->Table_,$this->Columns_,
			'id_page = ' . $this->IdPage_);
			#cargamos el menú
		$this->Data_['menu'] = array($this->Npage_ => 'active');
			#cargamos la barra laterál del menu
		$this->Data_['lateral_menu'] = $this->dbsitio->getRows($this->V_articles_,FALSE,FALSE,
			FALSE,FALSE,FALSE,FALSE,10);

	}

	/**
	* Retorna el fomulario
	*/
	private function _retornarForm(){
		#columnas para la consulta
		$this->_info();
		#Cargamos el formulario	
		$this->Data_['alerta'] = array('alerta' => 'ok' );
		$this->Data_['form'] = array('form'=>'form');
		$this->html_render->page_render($this->Data_);	
	}

}
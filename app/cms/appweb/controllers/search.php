<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
/**
* Calse encargada de gestionar la pagina de servicios
*
* @pakage App Sitio Ispade 
* @subpakage controladores
* @autor Eduardo Villota <eduardouio7@gmail.com> <@eduardouio>
* @copyrigth 2013 ISPADE <info@ispade.edu.ec>
* @license (c) ISPADE Todos Los Derechos Reservados
* @link www.ispade.edu.ec
* @version 1.0
* @views header,menu,lateral_menu,presentation,foot
* @access public
*
*/
	protected $Table_ = 'article';
	protected $Controller_ = 'search';
	protected $Data_; 
	protected $Limit_;
	protected $Offset_ = 5;


	 function __construct() {
	/**
	* Inicializa la clase como objeto CI
	*/
		parent::__construct();	
		$this->load->library('form_validation');
		$this->load->model('sesiones');
		}	


	public function index(){
	/* Se muestra el formulario*/
		if($this->sesiones->isLogged()){
			$this->_setInfo();
			$this->Data_['search'] = array('dara' => 0 );
			$this->html_render->page_render($this->Data_);
			}
		}

	public function resultado(){
	/*Busca un articulo en la tabla si no lo encuentra retorna el formulario*/				
			if ($_POST){
				#realizamos la búsqueda
				$columna = $this->input->post('campo');
				$opcion = 'title';
				if ($columna == "Contenido"){
					$opcion = 'content';
				}

				$sql = "SELECT a.id_article, a.title, a.create_date,
				a.last_update, a.counter, b.controller  FROM article as a
				JOIN page as b ON (a.id_page = b.id_page)
				WHERE 
				(a.". $opcion ." Like '%". $this->input->post('criterio') ."'OR 
				a.". $opcion ." Like'%". $this->input->post('criterio') ."%' OR 
				a.". $opcion ." Like'". $this->input->post('criterio') ."%');";
				$this->_setInfo();
				$this->Data_['result'] = $this->dbsitio->execQuery($sql);
				$this->html_render->page_render($this->Data_);
			}else{
				$this->index();
			}
		}

	private function _setInfo(){
	/* Hubica la información básica de la pagina como cabeceras y menús */
	$this->Data_['header'] = array('title' => 'Pagina de Inicio' );
	$this->Data_['menu'] = array($this->Controller_ => 'active');
	$this->Data_['info_page'] = array('controller' => $this->Controller_);
	}
}

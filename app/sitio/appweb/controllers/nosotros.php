<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nosotros extends CI_Controller {
/**
* Calse encargada de gestionar la pagina que presenta aticulos
*
* @pakage App Sitio Ispade 
* @subpakage controladores
* @autor Eduardo Villota <eduardouio7@gmail.com> <@eduardouio>
* @copyrigth 2013 ISPADE <info@ispade.edu.ec>
* @license (c) ISPADE Todos Los Derechos Reservados
* @link www.ispade.edu.ec
* @version 1.0
* @views cabecera,menu, menulateral,presentacion,pie,modal
* @access public
*
*/
	// variables para la identificacion de la pagina y sus articulos
	protected $Table_ = 'page';
	protected $IdPage_ = '2';
	protected $Npage_ = 'nosotros';
	protected $V_articles_ ='v_ratings';
	protected $V_lista_ = 'v_tablon';
	protected $Limit_;
	protected $Offset_ = 5;
	protected $Columns_;
	protected $Data_; 

	public function __construct(){
		parent::__construct();				
	}	

	public function index(){
		$this->listar();
	}

	//listamos los articulos de esta pagina
	public function listar(){
		$this->Columns_ = $arrayName = array(
			'id_page',
			'title',
			'controller',
			'keywords'
			);
		$this->Data_['header'] = $this->dbsitio->getRow($this->Table_, $this->Columns_ ,'id_page = ' . $this->IdPage_);
		$this->Data_['menu'] = array($this->Npage_ => 'active');
		$this->Data_['lateral_menu'] = $this->dbsitio->getRows($this->V_articles_,FALSE,'id_page = ' . $this->IdPage_,
			FALSE,FALSE,FALSE,FALSE,10);
		#listamos los contenidos de la página		
		$this->Limit_ = ($this->uri->segment(3) == 0)?0:$this->uri->segment(3);		
		
		$this->Data_['presentation'] = $this->dbsitio->getRows($this->V_lista_,FALSE,'id_page = ' . $this->IdPage_,FALSE,FALSE,FALSE,FALSE,$this->Limit_,$this->Offset_);
		$this->_pagination();
		$this->html_render->page_render($this->Data_);
	}

	/**
	* Configura los detalles de la páginacion
	*/
	private function _pagination(){
				$this->html_render->mePagination($this->Npage_,$this->V_lista_,
												$this->IdPage_,$this->Limit_,$this->Offset_);
	}
}
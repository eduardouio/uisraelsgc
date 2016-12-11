<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
/**
* Calse encargada de gestionar la pagina home del sitio
*
* @pakage App Sitio Ispade 
* @subpakage controladores
* @autor Eduardo Villota <eduardouio7@gmail.com> <@eduardouio>
* @copyrigth 2013 ISPADE <info@ispade.edu.ec>
* @license (c) ISPADE Todos Los Derechos Reservados
* @link www.ispade.edu.ec
* @version 1.0
* @views cabecera,menu,carrusel,articulos_home,pie
* @access public
*
*/
	// variables para la identificacion de la pagina y sus articulos
	protected $Table_ = 'page';
	protected $IdPage_ = 1;
	protected $Npage_ = 'home';
	protected $Article_ = 'article';
	protected $Columns_;
	protected $Data_; 

public function __construct(){
	parent::__construct();				
}	

	/**
	* genera la pagina completa, unico metodo de la clase
	*/
	public function index()
	{	
		$this->Columns_ = $arrayName = array(
			'id_page',
			'title',
			'controller',
			'keywords'
			);
		$this->Data_['header'] = $this->dbsitio->getRow($this->Table_, $this->Columns_ ,'id_page = ' . $this->IdPage_);
		$this->Data_['menu'] = array($this->Npage_ => 'active');
		$this->Data_['carrusel'] = $this->dbsitio->getRow($this->Article_,FALSE,'id_page = ' . $this->IdPage_ . ' AND id_article < 5');
		$this->Data_['articles_home'] = $this->dbsitio->getRows($this->Article_, FALSE ,'id_article > 37 AND id_article < 42');		
		$this->html_render->page_render($this->Data_);
	}
}

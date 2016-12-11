<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {
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
	protected $IdPage_ = '4';
	protected $Controller_ = 'servicios';
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
	/* Presenta un listado de los articulos de la página*/
		if($this->sesiones->isLogged()){
			$this->_setInfo();
			$data1 = $this->dbsitio->getRows($this->Table_,FALSE,
												'id_page=' . $this->IdPage_);
			$data2 = array('controller' => $this->Controller_ );
			$this->Data_['table'] = array_merge($data1,$data2);
			$this->html_render->page_render($this->Data_);
			}
		}

	public function present($idarticle = 0){
	/*Presenta un artículo determinado, si no existe lista todos los artículos*/	
		if($idarticle == 0){
			$idarticle = $this->uri->segment(3,0);
			}

		if($idarticle > 0){			
			$this->_setInfo();
			$data1 = $this->dbsitio->getRows($this->Table_,FALSE,'id_article = ' . $idarticle);
			$data2 = array('controller' => $this->Controller_);
			$this->Data_['presentation'] = array_merge($data1,$data2);
			$this->html_render->page_render($this->Data_);
		}else{
			
			$this->index();
			}
		}

	public function edit(){
	/* Muestra un formulario con los datos del artículo */
		$idarticle = $this->uri->segment(3,0);
		if($idarticle > 0){								
			$this->_setInfo();
			$data1 = $this->dbsitio->getRows($this->Table_,FALSE,'id_article = ' . $idarticle);
			$data2 = array('controller' => $this->Controller_);
			$this->Data_['form'] = array_merge($data1,$data2);
			$this->html_render->page_render($this->Data_);
			}
	}

	public function create(){
	/* Muestra un formulario vacio para crear un artículo */
		//$this->index();
	if($this->sesiones->isLogged()){								
			$this->_setInfo();				
			$this->Data_['form'] = array('controller' => $this->Controller_,
										'id_article' => '0');
			$this->html_render->page_render($this->Data_);
		}
	}

	public function saveForm(){
	/*guarda los datos del formulario en la base de datos, no importa si es de editar o crear.*/
		if($this->_validateForm()){
			$id_article =  intval($this->input->post('id_article'));			
			if($id_article > 0){
				#es una actualizacion
				$data = $this->input->post();
				unset($data['_wysihtml5_mode']);
				if(	$this->dbsitio->updateRow($this->Table_,$data, 
											'id_article = ' . $this->input->post('id_article'))){
					$this->present($this->input->post('id_article'));
				}else{
					print $this->dbsitio->lastError();
					print $this->dbsitio->lastQuery();
					$this->_returnForm();
				}
			}else{
				#es un nuevo artículo
				$data1 = $this->input->post();
				unset($data1['id_article']);
				unset($data1['_wysihtml5_mode']);
				$data2 = array('id_page' =>  $this->IdPage_,
								'create_date' => date('Y-m-d H:i:s'));
				$arreglo = array_merge($data2,$data1);
				
				$newId = $this->dbsitio->insertRow($this->Table_,
										$arreglo);
				$this->present($newId);
			}

		}else{			
			$this->_returnForm();
		}
	}

	public function delete(){
		/*Elimina un articulo de la base de datos*/
		$idarticle = $this->uri->segment(3,0);

		if($idarticle > 0){			
			$this->_setInfo();
			$data1 = $this->dbsitio->getRows($this->Table_,FALSE,'id_article = ' . $idarticle);
			$data2 = array('controller' => $this->Controller_);
			$this->Data_['presentation'] = array_merge($data1,$data2);
			$this->Data_['confirm'] = array('title' => $data1[0]['title'], 
											'message' => 'Confirme que desea eliminar este artículo, esta acción no se puede deshacer', 
											'idarticle' => $idarticle 
											);
			$this->html_render->page_render($this->Data_);
		}else{
			
			$this->index();
			}
		}

	public function confirm(){
		/*Confirma la eliminacion de un artículo*/
		$idarticle = $this->uri->segment(3,0);

		if($idarticle > 0){			
			#elimina
			$dataold = $this->dbsitio->getRows($this->Table_,FALSE,'id_article = ' . $idarticle);
			$this->dbsitio->deleteRow($this->Table_,'id_article = ' . $idarticle);
			#muestra la lista de artículos
			$this->_setInfo();
			$data1 = $this->dbsitio->getRows($this->Table_,FALSE,
												'id_page=' . $this->IdPage_);
			$data2 = array('controller' => $this->Controller_ );
			$this->Data_['table'] = array_merge($data1,$data2);
			$this->Data_['alert'] = array('title' => 'Acción Completada',
											'message' => 'El artículo <h4> <b> ' . $dataold[0]['title'] . ' </b></h4> se eliminó correctamente');
			$this->html_render->page_render($this->Data_);
			print '
				<script type="text/javascript">
function redireccionar(){
  window.location="'.base_url().'index.php/home/";
} 
setTimeout ("redireccionar()", 1000); //tiempo expresado en milisegundos
</script>
			';

		}else{			
			$this->index();
			}
	}


	private function _validateForm(){
	/*valida los datos del formulario de acuerdo a reglas establecidas en CI*/
		$this->form_validation->set_rules('id_article', 'Identificador Articulo', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('title', 'Titulo Articulo', 'trim|required|min_length[2]|xss_clean');				
		$this->form_validation->set_rules('content', 'Contenido Artículo', 'trim|required|min_length[10]|xss_clean');
		if ($this->form_validation->run()){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	private function _returnForm(){
	/*Retorna un formulario con los datos ingresados por el usuario, solo se ejecuta esta 
	funcion cuando _validateForm retorna false, se retorna el formulario como crear o editar 
	dependiendo del parámetro id_article*/					
			$this->_setInfo();				
			$this->Data_['form'] = array('controller' => $this->Controller_,
										'id_article' => '0');
			$this->Data_['alert'] = array('title' =>  'Ups!, un campo está mal' ,
										'message' => 'verifique que estén llenos todos los campos que la longitud del texto sea mayor que 5' );
			$this->html_render->page_render($this->Data_);

	}

	private function _setInfo(){
	/* Hubica la información básica de la pagina como cabeceras y menús */
	$this->Data_['header'] = array('title' => 'Pagina de Inicio' );
	$this->Data_['menu'] = array($this->Controller_ => 'active');
	$this->Data_['info_page'] = array('controller' => $this->Controller_);
	}
}

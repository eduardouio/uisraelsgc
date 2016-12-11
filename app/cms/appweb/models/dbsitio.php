<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Modelo encargado de manejar la base de datos liposerv_ispade
* Los nombres de las tablas al igual que los valores obtenidos 
* se guardan en variable.
*
* @pakage App Sitio Ispade 
* @subpakage Modelo Base De Datos
* @autor Eduardo Villota <eduardouio7@gmail.com> <@eduardouio>
* @copyrigth 2013 ISPADE <info@ispade.edu.ec>
* @license (c) ISPADE Todos Los Derechos Reservados
* @link www.ispade.edu.ec
* @version 1.0
* @access protected
*
*/

class Dbsitio extends CI_Model{

	/**
	* Iniciamos el contructor del modelo para que sea aceptado por codeigniter
	* Se craga la libreria pafa manejo de base de datos
	*/
	public function __construct(){
		parent::__construct();	
		$this->load->library('pagination');
	}

	/**
	* Realiza una consulta tipo SELECT a la Base de datos, se arma la consulta usando funciones
	* para cadenas el objetivo es genar el SQL de la consulta a travez de parametros, existen
	* parametros opcionales indentificados con el "=0", esto se evalua para no tomar en cuenta
	* ese parametro al momento de armar la consulta.
	*
	* SELECT
    * [ALL | DISTINCT | DISTINCTROW ]      
    * [FROM table_references
    * [WHERE where_condition]
    * [LIKE like_condition]
    * [GROUP BY {col_name | expr | position}
    * [ORDER BY {col_name | expr | position}
    *  [ASC | DESC], ...]
    * [LIMIT {[offset,] row_count | row_count OFFSET offset}]
	* 
	* @param str $table => Contiene el nombre de la tabla a la que se le va a hacer la consulta
	* @param array $columns => listado de columnas a obtener si no se especifica se obtienen todas
	* @param str $condition => Recibe la condicion de la consulta, vale 0 cero sino se recibe el parametro
	* @param str $groupby => Agrupa los registros y retorna la consulta, sino existe es cero
	* @param str $orderby => Ordena los registros con valor (coluna-orden), si no existe es cero
	* @param int $limit => Limite de registros a obtener, vale 0 cero si no se recibe el parametro
	* @param int $offset => Combinado con limit indica desde donde y cuantos registros se toman
	* @param str $like => Condicion like en la consulta, se debe especificar and u or cuando se envie un valor para condicion
	* @param str $and_or => condicion que permite unir la lcausula where y el like
	* @return obj $Result_ matriz de objetos
	*/
	public function getRows($table, $columns = FALSE, $condition = FALSE, $and_or = FALSE , 
		$like = FALSE, $groupby = FALSE, $orderby = FALSE , 
		$limit = FALSE, $offset = FALSE){
		#Se analiza los parametros antes de armar la consulta

		$result;
		$query = 'SELECT ';

		#armamos el select columnas from table
		if ($columns){
			$i = 0;
			foreach ($columns as $columna) {
				$i++;
				if ($i < count($columns)){					
					$query = $query . ' ' . $columna . ',';												
				}else{
					$query = $query . ' ' . $columna . ' FROM ' . $table; 
				}
			}
		}else{
			$query = $query . ' * FROM ' . $table;
		}

		#analisis de condiciones where y like
		if (($condition) && ($like)){
			#existan las dos condiciones
			$query = $query . ' WHERE ' . $condition . ' ' . $and_or . ' ' . $like;
		}elseif (($condition) || ($like)){
			#que solo exista una condicion
			if($condition){
				$query = $query . ' WHERE ' . $condition . ' ';
			}
			if($like){
				$query = $query . ' WHERE ' . $like . ' ';	
			}
		}

		#parametros de agrupamiento, orden y limites
		if($groupby){
			$query = $query . ' GROUP BY ' . $groupby;
		}

		if($orderby){
			$query = $query . ' ORDER BY ' . $orderby;
		}

		if($limit){
			$query = $query . ' LIMIT ' . $limit;	
			}elseif($limit==0 and $offset > 0){
				$query = $query . ' LIMIT ' . '0 ';	
			}

		if($offset){
			$query = $query . ' ,'. $offset . ';';
		}else{
			$query = $query . ';';
		}		
		
		$result = $this->db->query($query);
		return $result->result_array();
	}

	/**
	* Obtiene un registro de una tabla
	*
	*/
	public function getRow($table,$columns = FALSE,$condition){
		$result;
		$query = 'SELECT ';

		#armamos el select columnas from table
		if ($columns){
			$i = 0;
			foreach ($columns as $columna) {
				$i++;
				if ($i < count($columns)){					
					$query = $query . ' ' . $columna . ',';												
				}else{
					$query = $query . ' ' . $columna . ' FROM ' . $table; 
				}
			}
		}else{
			$query = $query . ' * FROM ' . $table;
		}

		if($condition){
			$query = $query . ' WHERE ' . $condition . ' ';
		}

		$result = $this->db->query($query);
		
		return $result->result_array();
	}

	/**
	* Realiza una consulta tipo ISERT en la Base de Datos
	* basandose en el metodo insert de CodeIgniter
    *
    * @param str $table => nombre de la tabla a insertar
    * @param array $values => Diccionario (clave-valor) contiene el nombre de la columna y el valor
	*/
	public function insertRow($table, $values){		

		$result = $this->db->insert($table, $values);
		return $this->lastId();
	}

	/**
	* Realiza una consulta tipo UPDATE a la Base de datos, se arma la consulta usando funciones
	* para cadenas el objetivo es genar el SQL de la consulta a travez de parametros, existen
	* parametros opcionales indentificados con el "=0", esto se evalua para no tomar en cuenta
	* ese parametro al momento de armar la consulta.
	*
	* UPDATE  table_reference
    * SET col_name1={expr1|DEFAULT} [, col_name2={expr2|DEFAULT}] ...
    * [WHERE where_condition]
    * [ORDER BY ...]
    * [LIMIT row_count]
	*	
	* 
	* @param str $table => Contiene el nombre de la tabla a la que se le va a hacer la consulta
	* @param str $condition => Recibe la condicion de la consulta, clave valor que indica el valor y nombre de la columna por la que se va a modificar
	* @param int $limit => Limite de registros a obtener, vale 0 cero si no se recibe el parametro
	*/

	public function updateRow($table, $data, $condition, $limit = FALSE){
		$this->db->where($condition);		
		if ($limit){
			$this->db->limit($limit);
		}
		$result = $this->db->update($table,$data);
		return $result;
	}

	
	/**
	* Realiza una consulta tipo DELETE en la Base de Datos
	*
	* DELETE 
	* FROM tbl_name
    * [WHERE where_condition]
    * [LIMIT row_count]
    *
    * @param str $table => nombre de la tabla a insertar
    * @param array $values => Diccionario (clave-valor) contiene el nombre de la columna y el valor
    * @param str $condition => Condicion para eliminar reistro(s)
    * @param int $limit => Parte de la condicion de borrado, sino existe es cero
    */
	public function deleteRow($table, $condition, $limit = FALSE){		
		$res = NULL;

		if($limit){
			$this->db->limit($limit);
		}

		$res = $this->db->delete($table,$condition);
		return $res;
	}

	/**
	* cuenta el número de registros que contiene una tabla	*
	* @param str $table nombre de la tabla	*
	* @return int cantidad de registros de la tabla
	*/
	public function countRows($table){
		$query = $this->db->query('SELECT * FROM ' . $table);
		return $query->num_rows();
	}

	/**
	* cuenta el número de registros que contiene una tabla con una condicion	*
	* @param str $table nombre de la tabla	*
	* @return int cantidad de registros de la tabla
	*/
	public function countRowsWhere($table,$id_page){
		$query = $this->db->query('SELECT * FROM ' . $table . ' where id_page = ' . $id_page );
		return $query->num_rows();
	}

/**
  * Cuenta el numero de coulmnas de una tabla
  * Lista  la cantidad de columnas de la base de datos
  * @param str $table nombre de la tabla  
  * @return int cantidad de columnas de la tabla
  */
  public function countColumns($table){
    $query = $this->db->query('SELECT * FROM ' . $table);
   return $query->num_fields();  
  }

  /**
  * Ejecuta un show columns a una tabla
  * @param str $table => nombre de la tabla
  * @return array detalle de columnas de la tabla
  */
  public function listColumns($table){
    $result = $this->db->list_fields($table);
    return $result->result();
  }

  /**
  * @return Retorna el ultimo Id insertado en la base de datos
  */
  public function lastId(){
    return $this->db->insert_id();
  }

  /**
  * Lista las tablas de la base de datos, lo retorna a manera de lista
  * @return Listado de tablas de la base de datos
  */
  public function listTables(){
    $result = $this->db->list_tables();
    return $result;
  }  

  /**
  * Retorna el string del ultimo error de la base de datos
  * @return str error en la base de datos
  */
  public function lastError(){
    $result =  $this->db->query('show error;');
    return $result->result();
  }

  /**
  * Retorna el string del ultimo query
  * @return str sql de la ultima consulta que se ejecutó
  */
  public function lastQuery(){
    return $this->db->last_query();
  }

  /**
  * Ejecuta una sentencia sql de cualquier tipo en la base de datos
 * 
 */
 public function execQuery( $sql ){
   $result =  $this->db->query($sql);
      return $result->result_array();
  }

} 
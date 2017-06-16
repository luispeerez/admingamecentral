<?php 
/**
*
* Descripcion: 
* Clase luis_config, define variables de configuracion para el proyecto por 
* actual, hereda a la clase default_config. 
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class luis_config extends default_config{
	/**
	* Descripcion: funcion luis_config, constructor para definir variables de
	* configuracion, conexion a base de datos,y ruta a la carpeta del framework
	* @author Luis Antonio Perez Bautista 
	* @version 1.1
	*
	*/
	public function luis_config(){
		parent::__construct();
		//MXNPHP CONFIGURATION
		$this->http_address = 'http://admingc.local/';
		$this->mxnphp_dir = "/var/www/framework/";		

		//SOFTWARE CONFIGURATION
		$this->dev_mode = true;	
		$this->lang = "en";
			
		//DATABASE CONFIGURATION
		$this->db_host = 'localhost';
		$this->db_name = 'gamecentral';
		$this->db_user = 'root';
		$this->db_pass = '1234';
		//error_reporting(0);
		ini_set('display_errors', 1);
		//error_reporting(E_ALL);
	}
}
?>

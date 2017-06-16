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
class production_config extends default_config{
	/**
	* Descripcion: funcion luis_config, constructor para definir variables de
	* configuracion, conexion a base de datos,y ruta a la carpeta del framework
	* @author Luis Antonio Perez Bautista 
	* @version 1.1
	*
	*/
	public function production_config(){
		parent::__construct();
		//MXNPHP CONFIGURATION
		$this->http_address = 'http://beq.x10host.com/';
		$this->mxnphp_dir = "/home/beqx10ho/framework/";		

		//SOFTWARE CONFIGURATION
		$this->dev_mode = true;	
		$this->lang = "en";
			
		//DATABASE CONFIGURATION
		$this->db_host = 'localhost';
		$this->db_name = 'beqx10ho_beq';
		$this->db_user = 'beqx10ho_admin';
		$this->db_pass = 'ziluxHost10';
		var_dump($this->db_pass);
		//error_reporting(0);
		error_reporting(E_ALL);
	}
}
?>

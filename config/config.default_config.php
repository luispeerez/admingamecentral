<?php
/**
*
* Descripcion: 
* Clase default_config, define variables de configuracion para el proyecto por 
* default. 
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class default_config{
	/**
	*
	* Descripcion: 
	* Funcion __construct, define variables del objeto, tamanos de imagenes,
	* url de uploads, nombre de la accion por defecto y controlador por defecto.
	* default. 
	* @author Luis Antonio Perez Bautista 
	* @version 1.1
	*
	*/	
	public function __construct(){
		//system configuration
		$this->theme = 'admingc';
		$this->default_controler = 'main';
		$this->default_action = 'index';
		$this->security_variable = "cookie";
	
		//Security Configuration
		$this->session_name = 'travelers_user';
		$this->secured = false;
		
		//Sofware Configuration
		$this->document_root = $_SERVER['DOCUMENT_ROOT']."/";
		//$this->uploads_dir = $this->document_root."uploads/";
		$this->uploads = 'http://admingc.local/uploads/';
		$this->lang = "es";
		$this->dev_mode = false;

		$this->promo_sizes = json_decode('[
			{"width":"800","height":"800","slug":"medium"},
		]');
		$this->background_sizes = json_decode('[
			{"width":"1920","height":"1024","slug":"large","resize_type":"best fit"},
			{"width":"600","height":"600","slug":"medium","resize_type":"best fit"},
			{"width":"100","height":"100","slug":"tiny","resize_type":"best fit"}
		]');

	}
}
?>

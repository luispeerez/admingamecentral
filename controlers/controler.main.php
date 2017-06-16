<?php
/**
*
* Descripcion: 
* Clase main, hereda hereda a la clase controler del framework
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class main extends controler{
	/**
	* Descripcion:
	* Funcion main, asigna las variables $this->config(variables de configuracion)
	* crea la conexion a traves de la funcion dbConnect del controlador. Agrega los componentes
	* de seguridad y de galeria del framework. Asigna los tipos de noticia a la
	* variable $this->tiposNoticias.
	* Define los nombres de tipos de noticia y tipos de productos disponibles.
	* @access public
	* @param $config Objeto que contiene las variables de configuracion del
	* projecto
	* @param $security Variable que establece si el proyecto tiene la seguridad
	* activa
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function main($config,$security){
		$this->config = $config;
		$this->security = $security;
		$this->dbConnect();
		$this->add_component("gamecentral_security");
		$this->add_component("mxnphp_gallery");
		$this->menu = "";
		$this->location = "main";
		$this->tiposNoticia = array('noticia' => 'Noticia',
									'resena' => 'Reseña',
									'destacado' => 'Destacado'
							);
		$this->tiposProducto = array('accesorios' => 'Accesorios',
									'juegos' => 'Juegos',
									'consolas' => 'Consolas',
									'ropa' => 'Ropa',
									'figuras' => 'Figuras',
									'otros' => 'Otros',
							);

	}
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la 
	*carpeta main dentro de esta se llama a la funcion getNoticias que hace
	* una consultaa la BD de todas las noticias
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/		
	public function index(){
		$this->getNoticias();
		$this->include_theme("index","index");
	}
	/**
	* Descripcion:
	* Funcion getNoticias, hace una consulta la tabla noticias de la BD y lee todos los
	* registros, los almacena en la variable $this->noticias
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function getNoticias(){
		$noticias = new noticia();
		$noticias->search_clause = '1';
		$this->noticias = $noticias->read('id,titulo_noticia,tipo_noticia,contenido_noticia,fecha,autor');
	}

	/**
	* Descripcion:
	* Funcion do_login, llama a la funcion do_login del componente de seguridad
	* del framework
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function do_login(){
		$this->components['gamecentral_security']->do_login();
	}
	/**
	* Descripcion:
	* Funcion logout, llama a la funcion logout del componente de seguridad
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function logout(){
		$this->components['gamecentral_security']->logout();
	}


	public function scafold(){
		$creator = new mxnphp_main_code_generator($this->get('id'),$this->config);
		$creator->create();
	}

	/**
	* Descripcion: funcion getEstados, asigna un array con datos de estados
	* de Mexico, los guarda en la variable $this->estados
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function getEstados(){
		$this->estados =  array(         
		  array('id' => 'MEX-AGS','value' => 'AGS', 'label' => 'Aguascalientes'),
		  array('id' => 'MEX-BCN','value' => 'BCN', 'label' => 'Baja California Norte'),
		  array('id' => 'MEX-BCS','value' => 'BCS', 'label' => 'Baja California Sur'),
		  array('id' => 'MEX-CAM','value' => 'CAM', 'label' => 'Campeche'),
		  array('id' => 'MEX-CHIS','value' => 'CHIS', 'label' => 'Chiapas'),
		  array('id' => 'MEX-CHIH','value' => 'CHIH', 'label' => 'Chihuahua'),
		  array('id' => 'MEX-COAH','value' => 'COAH', 'label' => 'Coahuila'),
		  array('id' => 'MEX-COL','value' => 'COL', 'label' => 'Colima'),
		  array('id' => 'MEX-DF','value' => 'DF', 'label' => 'Distrito Federal'),
		  array('id' => 'MEX-DGO','value' => 'DGO', 'label' => 'Durango'),
		  array('id' => 'MEX-GTO','value' => 'GTO', 'label' => 'Guanajuato'),
		  array('id' => 'MEX-GRO','value' => 'GRO', 'label' => 'Guerrero'),
		  array('id' => 'MEX-HGO','value' => 'HGO', 'label' => 'Hidalgo'),
		  array('id' => 'MEX-JAL','value' => 'JAL', 'label' => 'Jalisco'),
		  array('id' => 'MEX-EDM','value' => 'EDM', 'label' => 'México - Estado de'),
		  array('id' => 'MEX-MICH','value' => 'MICH', 'label' => 'Michoacán'),
		  array('id' => 'MEX-MOR','value' => 'MOR', 'label' => 'Morelos'),
		  array('id' => 'MEX-NAY','value' => 'NAY', 'label' => 'Nayarit'),
		  array('id' => 'MEX-NL','value' => 'NL', 'label' => 'Nuevo León'),
		  array('id' => 'MEX-OAX','value' => 'OAX', 'label' => 'Oaxaca'),
		  array('id' => 'MEX-PUE','value' => 'PUE', 'label' => 'Puebla'),
		  array('id' => 'MEX-QRO','value' => 'QRO', 'label' => 'Querétaro'),
		  array('id' => 'MEX-QROO','value' => 'QROO', 'label' => 'Quintana Roo'),
		  array('id' => 'MEX-SLP','value' => 'SLP', 'label' => 'San Luis Potosí'),
		  array('id' => 'MEX-SIN','value' => 'SIN', 'label' => 'Sinaloa'),
		  array('id' => 'MEX-SON','value' => 'SON', 'label' => 'Sonora'),
		  array('id' => 'MEX-TAB','value' => 'TAB', 'label' => 'Tabasco'),
		  array('id' => 'MEX-TAMPS','value' => 'TAMPS', 'label' => 'Tamaulipas'),
		  array('id' => 'MEX-TLAX','value' => 'TLAX', 'label' => 'Tlaxcala'),
		  array('id' => 'MEX-VER','value' => 'VER', 'label' => 'Veracruz'),
		  array('id' => 'MEX-YUC','value' => 'YUC', 'label' => 'Yucatán'),
		  array('id' => 'MEX-ZAC','value' => 'ZAC', 'label' => 'Zacatecas'),
		);
	}

}
?>
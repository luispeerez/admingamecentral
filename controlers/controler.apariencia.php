<?php
/**
*
* Descripcion: 
* Clase apariencia, hereda a la clase main(que a su vez hereda a la clase 
* controler). Define las acciones de la seccion apariencia.
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class apariencia extends main{
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la carpeta apariencia
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function index(){
		$this->location = "apariencia";
		$this->include_theme("index","index");
	}
	/**
	* Descripcion:
	* Funcion background, renderiza la vista background, que se encuentra en la carpeta apariencia
	* seccion en la cual se puede configurar el background de la vista del cliente
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function background(){
		$this->location = "apariencia";
		$this->background = new background(1);
		$this->background->read('id,imagen');
		$this->include_theme("index","background");
	}

	/**
	* Descripcion: funcion update_background(), actualiza el registro de la 
	* tabla background en la base de datos, manda a llamar a la funcion 
	* interna $this->create_background, la cual guarda la imagen en el servidor
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function update_background(){
		$background = new background(1);		
		$response =  $this->create_background(1,true);
		if($response) $background->update('imagen',array($response->filename));
		echo json_encode($response);
	}
	/**
	* Descripcion :funcion create_background, guarda la imagen del background
	* en el servidor, en la ruta /uploads/background
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	* @param $background_id, identificador del registro de la base de datos
	* @param $update, indica si el llamado a la funcion es para un update.
	*
	*/
	private function create_background($background_id,$update = false){		
		$image = $this->components['mxnphp_gallery']->save_image($_FILES['Filedata'],$background_id,"/uploads/background/",$this->config->background_sizes);
		if($image) $image->delete_url = $update ? "/apariencia/destroy_background/".$background_id : "/apariencia/destroy_background/".$image->filename;
		return $image;		
	}

	/**
	* Descripcion: funcion destroy_background(), elimina la imagen indicada
	* mediante la variable $_GET['id']
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function destroy_background(){
		$image = $this->get('id');
		$ext = explode('.',$image);
		if(!isset($ext[1])){
			$background = new background($image);
			$background->read('imagen');
			$image = $background->imagen;
			$background->update("imagen",array(null));
		}
		$this->components['mxnphp_gallery']->delete_images($image,"/uploads/background/",$this->config->background_sizes);
	}

}
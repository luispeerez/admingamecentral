<?php
/**
*
* Descripcion: 
* Clase noticias, hereda a la clase main(que a su vez hereda a la clase controler)
* define las acciones disponibles en la seccion noticias
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class noticias extends main{
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la carpeta 
	* noticias
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function index(){
		$this->location = "noticias";
		$this->include_theme("index","index");
	}
	/**
	* Descripcion:
	* Funcion crear, renderiza la vista crear, que se encuentra en la carpeta 
	* apariencia
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function crear(){
		//$this->common_data();
		$this->location = "noticias";
		$this->include_theme("index","crear");
	}	
	/**
	* Descripcion:
	* Funcion edit, renderiza una vista en la cual se muestran los datos
	* de un registro en la tabla noticia, el id del registro se obtiene con el
	* parametro id de GET.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function edit(){
		//$this->common_data();
		$this->location = "noticias";
		$this->noticia = new noticia($this->get('id'));
		$this->noticia->read("id,titulo_noticia,tipo_noticia,contenido_noticia,fecha,autor,imagen");
		$this->include_theme("index","edit");
	}	

	public function common_data(){
		$this->load_packages();
		$this->location = "domains";
		$domain_query = new domain();
		if(isset($_REQUEST['q'])){
			$domain_query->search_clause("domain_name",$_REQUEST['q'],'LIKE',true);
		}else{
			$domain_query->search_clause = "1";
		}
		//$domain_query->order_by = "name";		
		$this->domain_pagination = new pagination('domain',10,$domain_query->search_clause);
		$domain_query->limit = $this->domain_pagination->limit;
		$this->domains_listing = $domain_query->read("id,domain_name,template,exchange_rate_dollar,facebook,twitter,phone_es,phone_en,background_color,container_color,font_color,logo,title,email,email_booking,meta_description_es");
		//var_dump($this->domains_listing);//,package=>title_es,package=>id
	}	
	/**
	* Descripcion:
	* Funcion create, funcion que crea un registro en la tabla noticias, mediante
	* una peticion POST, al final se redirecciona a la vista principal.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function create(){
		//$this->debug = true;
		$noticia = $this->create_record('titulo_noticia,tipo_noticia,contenido_noticia,fecha,autor,autor_id','noticia');
		$message = $domain?"m=cs":"e=ce";
		header("Location: /");
	}
	/**
	* Descripcion:
	* Funcion update actualiza un registro en la tabla de noticias,
	* el id del registro se obtiene mediante el parametro noticia_id de POST
	* al final redirecciona a la vista con los datos de la noticia
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function update(){
		$inputs = array('titulo_noticia,tipo_noticia,contenido_noticia');
		$id = $_POST['noticia_id'];
		$message = $this->update_record("noticia",$inputs[$_GET['id']],$id)?"m=us":"e=ue";
		header("Location: /noticias/edit/$id/$message");
	}
	/**
	* Descripcion:
	* Funcion destroy, elimina un registro de la tabla noticia, el id del 
	* registro se obtiene del parametro id de GET.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function destroy(){
		$message = $this->destroy_record($_GET['id'],"noticia")?"m=ds":"e=de";
		header("Location: /");
	}	
	public function get_error(){
		$error = $_GET['e'];
		$errors['ce'] = 'Create Domain Error: All Fields are Required';
		$errors['ue'] = 'Update Domain Error: All Fields are Required';
		$errors['de'] = 'Delete Domain Error';
		return $errors[$error];
	}
	public function get_message(){
		$error = $_GET['m'];
		$errors['cs'] = 'Create Domain Success';
		$errors['us'] = 'Update Domain Success';
		$errors['ds'] = 'Delete Domain Success';
		return $errors[$error];
	}	

	public function update_image(){
		$promo = new noticia($this->post('id'));		
		$response =  $this->create_image($this->post('id'),true);
		if($response) $promo->update('imagen',array($response->filename));
		echo json_encode($response);
	}
	private function create_image($promo_id,$update = false){		
		$image = $this->components['mxnphp_gallery']->save_image($_FILES['Filedata'],$promo_id,"/uploads/noticias/",$this->config->background_sizes);
		if($image) $image->delete_url = $update ? "/noticias/destroy_imagen/".$promo_id : "/noticias/destroy_imagen/".$image->filename;
		return $image;		
	}
	public function destroy_image(){
		$image = $this->get('id');
		$ext = explode('.',$image);
		if(!isset($ext[1])){
			$promo = new noticia($image);
			$promo->read('imagen');
			$image = $promo->imagen;
			$promo->update("imagen",array(null));
		}
		$this->components['mxnphp_gallery']->delete_images($image,"/uploads/noticias/",$this->config->background_sizes);
	}				
	

}
?>

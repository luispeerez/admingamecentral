<?php
/**
*
* Descripcion: 
* Clase plataformas, hereda a la clase main(que a su vez hereda a la clase controler)
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class plataformas extends main{
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la carpeta plataformas
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function index(){
		$this->location = "plataformas";
		$this->cargarPlataformas();
		$this->include_theme("index","index");
	}
	/**
	* Descripcion:
	* Funcion cargarPlataformas, hace una consulta la tabla productos de la BD y lee todos los
	* registros, los almacena en la variable $this->plataformas
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function cargarPlataformas(){
		$plataformas = new plataforma();
		$plataformas->search_clause = '1';
		$this->plataformas = $plataformas->read('id,nombre,empresa');
	}

	/**
	* Descripcion:
	* Funcion crear, renderiza la vista crear, que se encuentra en la carpeta apariencia
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function crear(){
		//$this->common_data();
		$this->location = "plataformas";
		$this->include_theme("index","crear");
	}	
	/**
	* Descripcion:
	* Funcion edit, renderiza una vista en la cual se muestran los datos
	* de un registro en la tabla plataforma, el id del registro se obtiene con el
	* parametro id de GET.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function edit(){
		//$this->common_data();
		$this->location = "plataformas";
		$this->plataforma = new plataforma($this->get('id'));
		$this->plataforma->read("id,nombre,empresa");
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
	* Funcion create, funcion que crea un registro en la tabla plataformas, mediante
	* una peticion POST, al final se redirecciona a la vista principal.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function create(){
		$plataforma = $this->create_record('id,nombre,empresa','plataforma');
		$message = $domain?"m=cs":"e=ce";
		header("Location: /plataformas");
	}
	/**
	* Descripcion:
	* Funcion update actualiza un registro en la tabla de plataformas,
	* el id del registro se obtiene mediante el parametro noticia_id de POST
	* al final redirecciona a la vista con los datos de la plataforma
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function update(){
		$inputs = array('nombre,empresa');
		$id = $_POST['plataforma_id'];
		$message = $this->update_record("plataforma",$inputs[$_GET['id']],$id)?"m=us":"e=ue";
		header("Location: /plataformas/edit/$id/$message");
	}
	/**
	* Descripcion:
	* Funcion destroy, elimina un registro de la tabla plataforma, el id del 
	* registro se obtiene del parametro id de GET.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function destroy(){
		$message = $this->destroy_record($_GET['id'],"plataforma")?"m=ds":"e=de";
		header("Location: /plataformas");
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
	

}
?>

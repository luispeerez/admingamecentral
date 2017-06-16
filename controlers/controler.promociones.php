<?php
/**
*
* Descripcion: 
* Clase promociones, hereda a la clase main(que a su vez hereda a la clase controler)
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class promociones extends main{
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la carpeta promociones,
	* obtiene la informacion de todos los promociones registrados mediante la funcion
	* $this->cargarPromociones()
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function index(){
		$this->location = "promociones";
		$this->cargarPromociones();
		$this->include_theme("index","index");
	}
	/**
	* Descripcion:
	* Funcion crear, renderiza la vista crear, que se encuentra en la carpeta promociones
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function crear(){
		$this->location = "promociones";
		$this->include_theme("index","crear");
	}	
	/**
	* Descripcion:
	* Funcion edit, renderiza una vista en la cual se muestran los datos
	* de un registro en la tabla promociones, el id del registro se obtiene con el
	* parametro id de GET.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function edit(){
		$this->location = "promociones";
		$this->promocion = new promocion($_GET['id']);
		$this->promocion->read("id,nombre,imagen,fecha_limite");
		$this->include_theme("index","edit");
	}
	/**
	* Descripcion:
	* Funcion cargarPromociones, hace una consulta la tabla promociones de la BD y lee todos los
	* registros, los almacena en la variable $this->promociones
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function cargarPromociones(){
		$promociones = new promocion();
		$promociones->search_clause = '1';
		$this->promociones = $promociones->read('id,nombre,imagen,fecha_limite');
	}


	public function common_data(){
		$this->location = "promociones";
		$consultaUsuarios = new promocion();
		if(isset($_REQUEST['q'])){
			$consultaUsuarios->search_clause("name",$_REQUEST['q'],'LIKE',true);
		}else{
			$consultaUsuarios->search_clause = "1";
		}
		//$account_query->order_by = "name";		
		$this->account_pagination = new pagination('account',10,$consultaUsuarios->search_clause);
		$account_query->limit = $this->account_pagination->limit;
		$this->accounts_listing = $consultaUsuarios->read("id,nombre,imagen,fecha_limite");
	}

	public function create(){
		//$this->new_featured();

		$promo_tmp = new promocion();
		$next_id = $promo_tmp->next_id();

		$promo = $this->create_record("nombre,fecha_limite","promocion");
		$message = $promo?"m=cs":"e=ce";
		if($promo){
			header("Location: /promociones/edit/$next_id/$message");
		}else{
			header("Location: /promociones/$message");			
		}

	}
	/**
	* Descripcion:
	* Funcion update actualiza un registro en la tabla de promocion,
	* el id del registro se obtiene mediante el parametro noticia_id de POST
	* al final redirecciona a la vista con los datos de la noticia
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function update(){
		$inputs = array("nombre,fecha_limite");
		$id = $_POST['promocion_id'];
		$message = $this->update_record("promocion",$inputs[$_GET['id']],$id)?"m=us":"e=ue";
		header("Location: /promociones/edit/$id/$message");
	}	
	/**
	* Descripcion:
	* Funcion destroy, elimina un registro de la tabla promociones, el id del 
	* registro se obtiene del parametro id de GET.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function destroy(){
		$message = $this->destroy_record($_GET['id'],"promocion")?"m=ds":"e=de";
		header("Location: /promociones");
	}	
	public function get_error(){
		$error = $_GET['e'];
		$errors['ce'] = 'Create Account Error: All Fields are Required';
		$errors['ue'] = 'Update Account Error: All Fields are Required';
		$errors['de'] = 'Delete Account Error';
		return $errors[$error];
	}
	public function get_message(){
		$error = $_GET['m'];
		$errors['cs'] = 'Create Account Success';
		$errors['us'] = 'Update Account Success';
		$errors['ds'] = 'Delete Account Success';
		return $errors[$error];
	}

	public function new_image(){
		$promo = new promocion();
		echo json_encode($this->create_image($promo->next_id()));		
	}
	public function update_image(){
		$promo = new promocion($this->post('id'));		
		$response =  $this->create_image($this->post('id'),true);
		if($response) $promo->update('imagen',array($response->filename));
		echo json_encode($response);
	}
	private function create_image($promo_id,$update = false){		
		$image = $this->components['mxnphp_gallery']->save_image($_FILES['Filedata'],$promo_id,"/uploads/promociones/",$this->config->background_sizes);
		if($image) $image->delete_url = $update ? "/promociones/destroy_imagen/".$promo_id : "/promociones/destroy_imagen/".$image->filename;
		return $image;		
	}
	public function destroy_image(){
		$image = $this->get('id');
		$ext = explode('.',$image);
		if(!isset($ext[1])){
			$promo = new promocion($image);
			$promo->read('imagen');
			$image = $promo->imagen;
			$promo->update("imagen",array(null));
		}
		$this->components['mxnphp_gallery']->delete_images($image,"/uploads/promociones/",$this->config->background_sizes);
	}

}
?>
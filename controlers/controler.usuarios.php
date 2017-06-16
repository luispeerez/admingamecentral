<?php
/**
*
* Descripcion: 
* Clase usuarios, hereda a la clase main(que a su vez hereda a la clase controler)
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class usuarios extends main{
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la carpeta usuarios,
	* obtiene la informacion de todos los usuarios registrados mediante la funcion
	* $this->cargarUsuarios()
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function index(){
		if($this->user->tipo_usuario != 'administrador'){
			header('Location: /');
		}
		$this->location = "usuarios";
		$this->cargarUsuarios();
		$this->include_theme("index","index");
	}
	/**
	* Descripcion:
	* Funcion crear, renderiza la vista crear, que se encuentra en la carpeta usuarios
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function crear(){
		if($this->user->tipo_usuario != 'administrador'){
			header('Location: /');
		}
		$this->location = "usuarios";
		$this->include_theme("index","crear");
	}	
	/**
	* Descripcion:
	* Funcion edit, renderiza una vista en la cual se muestran los datos
	* de un registro en la tabla usuarios, el id del registro se obtiene con el
	* parametro id de GET.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function edit(){
		if($this->user->tipo_usuario != 'administrador'){
			header('Location: /');
		}
		$this->location = "usuarios";
		$this->usuario = new usuario($_GET['id']);
		$this->usuario->read("id,email,password,nombre,tipo_usuario,imagen,informacion");
		$this->include_theme("index","edit");
	}
	/**
	* Descripcion:
	* Funcion cargarUsuarios, hace una consulta la tabla usuarios de la BD y lee todos los
	* registros, los almacena en la variable $this->usuarios
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function cargarUsuarios(){
		$usuarios = new usuario();
		$usuarios->search_clause = '1';
		$this->usuarios = $usuarios->read('id,email,password,nombre,tipo_usuario');
	}


	public function common_data(){
		$this->location = "usuarios";
		$consultaUsuarios = new usuario();
		if(isset($_REQUEST['q'])){
			$consultaUsuarios->search_clause("name",$_REQUEST['q'],'LIKE',true);
		}else{
			$consultaUsuarios->search_clause = "1";
		}
		//$account_query->order_by = "name";		
		$this->account_pagination = new pagination('account',10,$consultaUsuarios->search_clause);
		$account_query->limit = $this->account_pagination->limit;
		$this->accounts_listing = $consultaUsuarios->read("id,email,password,nombre,tipo_usuario");
	}

	public function create(){
		$account = $this->create_record("email,password,nombre,tipo_usuario,informacion","usuario");
		$message = $account?"m=cs":"e=ce";
		header("Location: /usuarios/$message");
	}
	/**
	* Descripcion:
	* Funcion update actualiza un registro en la tabla de usuario,
	* el id del registro se obtiene mediante el parametro noticia_id de POST
	* al final redirecciona a la vista con los datos de la noticia
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function update(){
		if($this->user->tipo_usuario != 'administrador'){
			header('Location: /');
		}
		$inputs = array("email,nombre,tipo_usuario,informacion");
		$id = $_POST['usuario_id'];
		$message = $this->update_record("usuario",$inputs[$_GET['id']],$id)?"m=us":"e=ue";
		header("Location: /usuarios/edit/$id/$message");
	}	
	/**
	* Descripcion:
	* Funcion destroy, elimina un registro de la tabla usuarios, el id del 
	* registro se obtiene del parametro id de GET.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function destroy(){
		if($this->user->tipo_usuario != 'administrador'){
			header('Location: /');
		}
		$message = $this->destroy_record($_GET['id'],"usuario")?"m=ds":"e=de";
		header("Location: /usuarios");
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

	public function update_image(){
		$promo = new usuario($this->post('id'));		
		$response =  $this->create_image($this->post('id'),true);
		if($response) $promo->update('imagen',array($response->filename));
		echo json_encode($response);
	}
	private function create_image($promo_id,$update = false){		
		$image = $this->components['mxnphp_gallery']->save_image($_FILES['Filedata'],$promo_id,"/uploads/usuarios/",$this->config->background_sizes);
		if($image) $image->delete_url = $update ? "/usuarios/destroy_imagen/".$promo_id : "/usuarios/destroy_imagen/".$image->filename;
		return $image;		
	}
	public function destroy_image(){
		$image = $this->get('id');
		$ext = explode('.',$image);
		if(!isset($ext[1])){
			$promo = new usuario($image);
			$promo->read('imagen');
			$image = $promo->imagen;
			$promo->update("imagen",array(null));
		}
		$this->components['mxnphp_gallery']->delete_images($image,"/uploads/usuarios/",$this->config->background_sizes);
	}	

}
?>
<?php
/**
*
* Descripcion: 
* Clase productos, hereda a la clase main(que a su vez hereda a la clase controler)
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class productos extends main{
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la carpeta productos,
	* obtiene la informacion de todos los productos registrados mediante la funcion
	* $this->cargarProductos()
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function index(){
		$this->location = "productos";
		$this->cargarProductos();
		$this->include_theme("index","index");
	}
	/**
	* Descripcion:
	* Funcion crear, renderiza la vista crear, que se encuentra en la carpeta productos
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function crear(){
		$this->location = "productos";
		$this->cargarPlataformas();
		$this->include_theme("index","crear");
	}	
	/**
	* Descripcion:
	* Funcion edit, renderiza una vista en la cual se muestran los datos
	* de un registro en la tabla productos, el id del registro se obtiene con el
	* parametro id de GET.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function edit(){
		$this->location = "productos";
		$this->producto = new producto($_GET['id']);
		$this->producto->read("id,nombre,tipo_producto,descripcion,plataforma,imagenes=>imagen,imagenes=>id,imagenes=>producto");
		$this->cargarPlataformas();
		$this->include_theme("index","edit");
	}
	/**
	* Descripcion:
	* Funcion cargarProductos, hace una consulta la tabla productos de la BD y lee todos los
	* registros, los almacena en la variable $this->productos
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function cargarProductos(){
		$productos = new producto();
		$productos->search_clause = '1';
		$this->productos = $productos->read('id,nombre,tipo_producto,descripcion,plataforma=>id,plataforma=>nombre');
		$this->cargarPlataformas();
	}

	/**
	* Descripcion:
	* Funcion cargarPlataformas, hace una consulta la tabla plataformas de la BD y lee todos los
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



	public function common_data(){
		$this->location = "productos";
		$consultaProductos = new producto();
		if(isset($_REQUEST['q'])){
			$consultaProductos->search_clause("name",$_REQUEST['q'],'LIKE',true);
		}else{
			$consultaProductos->search_clause = "1";
		}
		//$account_query->order_by = "name";		
		$this->account_pagination = new pagination('account',10,$consultaProductos->search_clause);
		$account_query->limit = $this->account_pagination->limit;
		$this->accounts_listing = $consultaProductos->read("id,nombre,tipo_producto,descripcion,plataforma");
	}

	public function create(){
		$account = $this->create_record("nombre,tipo_producto,descripcion,plataforma","producto");
		$message = $account?"m=cs":"e=ce";
		header("Location: /productos/$message");
	}
	/**
	* Descripcion:
	* Funcion update actualiza un registro en la tabla de producto,
	* el id del registro se obtiene mediante el parametro noticia_id de POST
	* al final redirecciona a la vista con los datos de la noticia
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function update(){
		$inputs = array("nombre,tipo_producto,descripcion,plataforma");
		$id = $_POST['producto_id'];
		$message = $this->update_record("producto",$inputs[$_GET['id']],$id)?"m=us":"e=ue";
		header("Location: /productos/edit/$id/$message");
	}	
	/**
	* Descripcion:
	* Funcion destroy, elimina un registro de la tabla productos, el id del 
	* registro se obtiene del parametro id de GET.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function destroy(){
		$message = $this->destroy_record($_GET['id'],"producto")?"m=ds":"e=de";
		header("Location: /productos");
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

	//Custom functions
	public function add_photo(){
		$photo = new imagen_producto();
		$image = $this->components['mxnphp_gallery']->save_image($_FILES['Filedata'],$photo->next_id(),"/uploads/productos/",$this->config->background_sizes);
		$image->delete_url = "/producto/destroy_photo/".$image->id;
		if($image) $this->create_record("producto,imagen",'imagen_producto',array($this->post('id'),$image->filename));
		echo json_encode($image);
	}
	public function destroy_photo($id = false){
		$id = $id ? $id : $this->get('id');
		$photo = new imagen_producto($id);
		$photo->read("imagen,id");
		$this->components['mxnphp_gallery']->delete_images($photo->photo,"/uploads/productos/",$this->config->background_sizes);
		$photo->destroy();
	}

}
?>
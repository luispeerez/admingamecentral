<?php
/**
*
* Descripcion: 
* Clase sucursales, hereda a la clase main(que a su vez hereda a la clase controler)
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class sucursales extends main{
	/**
	* Descripcion:
	* Funcion index, renderiza la vista index, que se encuentra en la carpeta sucursales,
	* obtiene la informacion de todos los sucursales registrados mediante la funcion
	* $this->cargarsucursales()
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function index(){
		$this->location = "sucursales";
		$this->cargarSucursales();
		$this->include_theme("index","index");
	}
	/**
	* Descripcion:
	* Funcion crear, renderiza la vista crear, que se encuentra en la carpeta sucursales
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function crear(){
		$this->location = "sucursales";
		$this->getEstados();
		$this->include_theme("index","crear");
	}	
	/**
	* Descripcion:
	* Funcion edit, renderiza una vista en la cual se muestran los datos
	* de un registro en la tabla sucursales, el id del registro se obtiene con el
	* parametro id de GET.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function edit(){
		$this->location = "sucursales";
		$this->sucursal = new sucursal($_GET['id']);
		$this->sucursal->read("id,nombre,ciudad,estado,direccion,telefono,correo,latitud,longitud,facebook");
		$this->getEstados();
		$this->include_theme("index","edit");
	}
	/**
	* Descripcion:
	* Funcion cargarsucursales, hace una consulta la tabla sucursales de la BD y lee todos los
	* registros, los almacena en la variable $this->sucursales
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function cargarSucursales(){
		$sucursales = new sucursal();
		$sucursales->search_clause = '1';
		$this->sucursales = $sucursales->read('id,nombre,ciudad,estado,direccion,telefono,correo,facebook');
	}


	public function common_data(){
		$this->location = "sucursales";
		$consultasucursales = new sucursal();
		if(isset($_REQUEST['q'])){
			$consultasucursales->search_clause("name",$_REQUEST['q'],'LIKE',true);
		}else{
			$consultasucursales->search_clause = "1";
		}
		//$account_query->order_by = "name";		
		$this->account_pagination = new pagination('account',10,$consultasucursales->search_clause);
		$account_query->limit = $this->account_pagination->limit;
		$this->accounts_listing = $consultasucursales->read("id,nombre,ciudad,estado,direccion,telefono,correo,facebook");
	}

	public function create(){
		$account = $this->create_record("nombre,ciudad,estado,direccion,telefono,correo,latitud,longitud,facebook","sucursal");
		$message = $account?"m=cs":"e=ce";
		header("Location: /sucursales/$message");
	}
	/**
	* Descripcion:
	* Funcion update actualiza un registro en la tabla de sucursal,
	* el id del registro se obtiene mediante el parametro noticia_id de POST
	* al final redirecciona a la vista con los datos de la noticia
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function update(){
		$inputs = array("nombre,ciudad,estado,direccion,telefono,correo,latitud,longitud,facebook");
		$id = $_POST['sucursal_id'];
		$message = $this->update_record("sucursal",$inputs[$_GET['id']],$id)?"m=us":"e=ue";
		header("Location: /sucursales/edit/$id/$message");
	}	
	/**
	* Descripcion:
	* Funcion destroy, elimina un registro de la tabla sucursales, el id del 
	* registro se obtiene del parametro id de GET.
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/
	public function destroy(){
		$message = $this->destroy_record($_GET['id'],"sucursal")?"m=ds":"e=de";
		header("Location: /sucursales");
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

}
?>
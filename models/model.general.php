<?php
//Account
class usuario extends table{
	function info(){
		//Model Info
		$this->table_name = "usuarios";
		$this->md5['password'] = true;
		
		//Scafolding Constructs
		$this->menu = 'administration';
		$this->inputs = array(
			"name" => "Nombre,text,required",
			"last_name" => 'Apellidos,text,required',
			"email" => 'Email,text,required email',
			"password" => 'Contraseña,password,required',
			"phone" => 'Telefono,text',
		);
		$this->sections = array(
			"Datos" => 'name,last_name,email,phone,password',
		);
		$this->list_cells = array(
			"Name" => "name,last_name",
			"Email" => 'email'
		);
	}
}


class sucursal extends table{
	function info(){
		$this->table_name = 'sucursal';
	}
}

class producto extends table{
	function info(){
		$this->table_name = 'producto';
		$this->has_many['imagenes'] = 'imagen_producto';
		$this->has_many_keys['imagenes'] = 'producto';
		$this->objects['plataforma'] = 'plataforma';
	}
}

class imagen_producto extends table{
	function info(){
		$this->table_name = 'imagenes_productos';
		$this->objects['producto'] = 'producto';
	}
}


class plataforma extends table{
	function info(){
		$this->table_name = 'plataforma';
	}
}

class noticia extends table{
	function info(){
		$this->table_name = 'noticia';
	}
}

class promocion extends table{
	function info(){
		$this->table_name = 'promocion';
	}
}

class background extends table{
	function info(){
		$this->table_name = 'background';
	}
}

?>

<?php
/**
*
* Descripcion: 
* Clase api, hereda a la clase main(que a su vez hereda a la clase controler)
* define las acciones posibles para la API del administrador.
* @author Luis Antonio Perez Bautista 
* @version 1.1
*
*/
class api extends main{
	/**
	* Descripcion:
	* Funcion noticias, hace una consulta la tabla noticias de la BD y lee 
	* todos los registros, los almacena en la variable $this->noticias y
	* los regresa en un formato json
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function noticias(){
		$noticias = new noticia();
		$noticias->search_clause = '1';
		$this->noticias = $noticias->read('id,titulo_noticia,tipo_noticia,contenido_noticia,fecha,autor,imagen');
		$noticiasjson = [];
		foreach ($this->noticias as $noticia) {
			$noticia_tmp = null;
			$noticia_tmp->id = $noticia->id; 
			$noticia_tmp->titulo_noticia = $noticia->titulo_noticia; 
			$noticia_tmp->tipo_noticia = $noticia->tipo_noticia; 
			$noticia_tmp->contenido_noticia = strip_tags($noticia->contenido_noticia); 
			$noticia_tmp->fecha = $noticia->fecha; 
			$noticia_tmp->autor = $noticia->autor;
			$noticia_tmp->imagen = $noticia->imagen; 
			array_push($noticiasjson, $noticia_tmp);

		}
		echo json_encode($noticiasjson);
	}
	/**
	* Descripcion:
	* Funcion plataformas, hace una consulta la tabla plataformas de la BD y lee 
	* todos los registros, los almacena en la variable $this->plataformas y
	* los regresa en un formato json
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function plataformas(){
		$plataformas = new plataforma();
		$plataformas->search_clause = '1';
		$this->plataformas = $plataformas->read('id,nombre,empresa');
		$plataformasjson = [];
		foreach ($this->plataformas as $plataforma) {
			$plataforma_tmp = null;
			$plataforma_tmp->id = $plataforma->id; 
			$plataforma_tmp->nombre = $plataforma->nombre; 
			$plataforma_tmp->empresa = $plataforma->empresa; 
			array_push($plataformasjson, $plataforma_tmp);

		}
		echo json_encode($plataformasjson);
	}
	/**
	* Descripcion:
	* Funcion productos, hace una consulta la tabla productos de la BD y lee 
	* todos los registros, los almacena en la variable $this->productos y
	* los regresa en un formato json
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function productos(){
		$productos = new producto();
		$productos->search_clause = '1';
		$this->productos = $productos->read('id,nombre,tipo_producto,descripcion,plataforma=>id,plataforma=>nombre');
		$productosjson = [];
		foreach ($this->productos as $producto) {
			$producto_tmp = null;
			$producto_tmp->id = $producto->id; 
			$producto_tmp->nombre = $producto->nombre; 
			$producto_tmp->tipo_producto = $producto->tipo_producto; 
			$producto_tmp->descripcion = $producto->descripcion; 
			$producto_tmp->plataforma = $producto->plataforma->nombre; 
			$producto_tmp->imagenes = $this->cargarFotosProductos($producto_tmp->id);
			array_push($productosjson, $producto_tmp);

		}
		echo json_encode($productosjson);
	}
	/**
	* Descripcion cargarFotosProductos
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	* @param $prod, objeto de tipo producto.
	*
	*/
	public function cargarFotosProductos($p_id=1){
		$producto = new producto($p_id);
		$producto->read('imagenes=>imagen');
		$imagenes = array();
		foreach ($producto->imagenes as $img) {
			array_push($imagenes,$img->imagen);
		}
		return $imagenes;
	}
	/**
	* Descripcion:
	* Funcion promociones, hace una consulta la tabla promociones de la BD y lee 
	* todos los registros, los almacena en la variable $this->promociones y
	* los regresa en un formato json
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function promociones(){
		$promociones = new promocion();
		$promociones->search_clause = '1';
		$this->promociones = $promociones->read('id,nombre,imagen,fecha_limite');
		$promocionesjson = [];
		foreach ($this->promociones as $promocion) {
			$promocion_tmp = null;
			$promocion_tmp->id = $promocion->id; 
			$promocion_tmp->nombre = $promocion->nombre; 
			$promocion_tmp->imagen = $promocion->imagen; 
			$promocion_tmp->fecha_limite = $promocion->fecha_limite; 
			array_push($promocionesjson, $promocion_tmp);

		}
		echo json_encode($promocionesjson);
	}
	/**
	* Descripcion:
	* Funcion sucursales, hace una consulta la tabla sucursales de la BD y lee 
	* todos los registros, los almacena en la variable $this->sucursales y
	* los regresa en un formato json
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function sucursales(){
		$sucursales = new sucursal();
		$sucursales->search_clause = '1';
		$this->sucursales = $sucursales->read('id,nombre,ciudad,estado,direccion,telefono,correo,facebook');
		$sucursalesjson = [];
		foreach ($this->sucursales as $sucursal) {
			$sucursal_tmp = null;
			$sucursal_tmp->id = $sucursal->id; 
			$sucursal_tmp->nombre = $sucursal->nombre; 
			$sucursal_tmp->ciudad = $sucursal->ciudad; 
			$sucursal_tmp->estado = $sucursal->estado; 
			$sucursal_tmp->direccion = $sucursal->direccion; 
			$sucursal_tmp->telefono = $sucursal->telefono; 
			$sucursal_tmp->correo = $sucursal->correo; 
			$sucursal_tmp->facebook = $sucursal->facebook; 
			array_push($sucursalesjson, $sucursal_tmp);

		}
		echo json_encode($sucursalesjson);
	}
	/**
	* Descripcion:
	* Funcion usuarios, hace una consulta la tabla usuarios de la BD y lee 
	* todos los registros, los almacena en la variable $this->usuarios y
	* los regresa en un formato json
	* @access public
	* @author Luis Antonio Perez Bautista
	* @version 1.1
	*
	*/	
	public function usuarios(){
		$usuarios = new usuario();
		$usuarios->search_clause = '1';
		$this->usuarios = $usuarios->read('id,email,password,nombre,tipo_usuario');
		$usuariosjson = [];
		foreach ($this->usuarios as $usuario) {
			$usuario_tmp = null;
			$usuario_tmp->id = $usuario->id; 
			$usuario_tmp->email = $usuario->email; 
			$usuario_tmp->password = $usuario->password; 
			$usuario_tmp->tipo_usuario = $usuario->tipo_usuario; 
			$usuario_tmp->nombre = $usuario->nombre; 
			array_push($usuariosjson, $usuario_tmp);

		}
		echo json_encode($usuariosjson);
	}
}
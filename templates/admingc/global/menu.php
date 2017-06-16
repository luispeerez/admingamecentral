<div class="collapse navbar-collapse navbar-ex1-collapse">
<!--Sidebar-->
	<ul class="nav navbar-nav side-nav">
			<li class="<?php if($this->location == 'main') echo 'active'; ?>"><a href="/"><i class="fa fa-bars"></i> Menu Principal</a></li>
			<li class="<?php if($this->location == 'noticias') echo 'active'; ?>"><a href="/noticias"><i class="fa fa-plus"></i> Nueva noticia</a></li>
			
			<?php if($this->user->tipo_usuario == 'administrador'): ?>
			<li class="dropdown <?php if($this->location == 'usuarios') echo 'active'; ?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-group"></i> Usuarios <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/usuarios/crear"><i class="fa fa-plus-circle"></i> Agregar usuario</a></li>
					<li><a href="/usuarios"><i class="fa fa-list"></i> Lista de usuarios</a></li>
				</ul>
			</li>
			<?php endif; ?>
			
			<li class="dropdown <?php if($this->location == 'sucursales') echo 'active'; ?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-map-marker"></i> Sucursales <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/sucursales/crear"><i class="fa fa-plus-circle"></i> Agregar sucursal</a></li>
					<li><a href="/sucursales"><i class="fa fa-list"></i> Lista de sucursales</a></li>
				</ul>
			</li>
			<li class="dropdown <?php if($this->location == 'productos') echo 'active'; ?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tags"></i> Productos <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/productos/crear"><i class="fa fa-plus-circle"></i> Agregar producto</a></li>
					<li><a href="/productos"><i class="fa fa-list"></i> Lista de productos</a></li>
				</ul>
			</li>
			<li class="dropdown <?php if($this->location == 'plataformas') echo 'active'; ?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gamepad"></i> Plataformas <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/plataformas/crear"><i class="fa fa-plus-circle"></i> Agregar plataforma</a></li>
					<li><a href="/plataformas"><i class="fa fa-list"></i> Lista de plataformas</a></li>
				</ul>
			</li>
			<li class="dropdown <?php if($this->location == 'promociones') echo 'active'; ?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bullhorn"></i> Promociones <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/promociones/crear"><i class="fa fa-plus-circle"></i> Agregar promocion</a></li>
					<li><a href="/promociones"><i class="fa fa-list"></i> Lista de promociones</a></li>
				</ul>
			</li>

			<li class="<?php if($this->location == 'apariencia') echo 'active'; ?>"><a href="/apariencia/background"><i class="fa fa-picture-o"></i> Cambiar background</a></li>

		</ul>
		<ul class="nav navbar-nav navbar-right navbar-user">
		<li class="dropdown user-dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->user->email ?> <b class="caret"></b></a>
			<ul class="dropdown-menu">
			<!--<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>-->
			<li><a href="/main/logout"><i class="fa fa-power-off"></i> Cerrar sesión</a></li>
			</ul>
		</li>
	</ul>
</div>
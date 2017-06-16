<!Doctype> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Gamecentral Administrador</title>
		<?php 
			$this->print_css_tag('bootstrap');
			$this->print_css_tag('sb-admin');
			$this->print_css_tag();
		?>
		<link rel="stylesheet" href="/templates/admingc/font-awesome/css/font-awesome.min.css">
	</head>
	<body>
		<div id="wrapper" class="<?php echo $paginaActual ?> login-page">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
                    <a class="navbar-brand" href="/">
                        <?php $this->print_img_tag('gc.png'); ?> <span class="name">Administrador Gamecentral</span>
                    </a>
				</div>
			</nav>

			<div id="page-wrapper">

				<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
					<div class="panel panel-info" >
						<div class="panel-heading">
							<div class="panel-title">Iniciar Sesión</div>
						</div>     
						<div style="padding-top:30px" class="panel-body" >
							<?php
							if($this->get("e")){
							$e = $this->get("e");
							$message = $e=="user"?"usuario incorrecto":"contraseña incorrecta";
							}
							?>

							<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"><?php echo $message?></div>
							<div class="alert alert-warning"><p><?php echo $message ?></p></div>
							<form id="loginform" class="form-horizontal" role="form" action="/main/do_login/" method="POST">
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input id="login-username" type="text" class="form-control" name="username" value="" autofocus placeholder="Usuario">                                        
								</div>
								<div style="margin-bottom: 25px" class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input id="login-password" type="password" class="form-control" name="password" placeholder="Contraseña">
								</div>
								<div style="margin-top:10px" class="form-group">
									<div class="col-sm-12 controls">
										<button type="submit" class="btn btn-default">Iniciar Sesión</button>
									</div>
								</div>
							</form>     
						</div>                     
					</div>  
				</div>
			</div><!-- /#page-wrapper -->
		</div><!-- /#wrapper -->
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/nicEdit.js"></script>
		<script>
		new nicEditor({fullPanel : true}).panelInstance('newPost');
		</script>

	</body>
</html>        
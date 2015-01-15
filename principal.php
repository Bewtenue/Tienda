<?php
	session_start();
	
	//$seccion = $_REQUEST['seccion'];
	
	if (!isset($_SESSION['id_admin'])) {
		header("Location: iindex.php");		
	}
	else{
		$nom = $_SESSION['nom_admin'];
		$ida = $_SESSION['id_admin'];
		echo "<html>
			<head>
				<title>Practica de inicio sesion Zelos</title>
				<script src=\"jquery-1.7.2.js\"></script>
				<link rel=\"stylesheet\" href=\"estilos.css\">
				<link href=\"dist/css/bootstrap.min.css\" rel=\"stylesheet\">
				<script src=\"dist/js/bootstrap.min.js\"></script>
				<link href=\"dashboard.css\" rel=\"stylesheet\">
				<title>Administrador</title>
			</head>
			
			
			
			
			<body align=\"center\">
							<!--CABECERA-->
			 <nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">
     		 <div class=\"container-fluid\">
	         <div class=\"navbar-header\">
	         <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
             <span class=\"sr-only\">Toggle navigation</span>
             <span class=\"icon-bar\"></span>
             <span class=\"icon-bar\"></span>
             <span class=\"icon-bar\" ></span>
				</button> <a class=\"navbar-brand\" href=\"#\" disabled='disabled'>Administrador</a>
				</div>
				<div id=\"navbar\" class=\"navbar-collapse collapse\">
				<ul class=\"nav navbar-nav navbar-right\">
				<li>
				<a id='cabecera' disabled='disabled' >Bienvenido $nom</a>
				</li>
				<li>
				<a href=\"cerrarSesion.php\">Cerrar Sesion</a>
				</li>
				</ul>
				</div>
				</div>
				</nav>
				
				<!--CONTENIDO-->
				<div class=\"col-sm-3 col-md-2 sidebar\">
		          <ul class=\"nav nav-sidebar\">
		            <li><a href='#' id='admin' style='cursor:pointer;'>Administradores</a></li>
		            <li><a href='#' id='prod' style='cursor:pointer;'>Productos</a></li>
		            <li><a href='#' id='categ' style='cursor:pointer;'>Categorias</a></li>
		            <li><a href='#' id='usuario' style='cursor:pointer;'>Usuarios</a></li>
		            <li><a href='#' id='banner' style='cursor:pointer;'>Banners</a></li>
		          </ul>		          
		        </div>
        
				<div id='contenido' class=\"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main\">
				<div id='mensajeprincipal'><h2>PAGINA DE ADMINISTRACION | SELECCIONE UNA OPCION</h2></div>
				
				</div>
				<div id='footer'>
				</div>
				
			</body>
			
			
			<script>
				$(document).ready(function() {

					$('#admin').click(function(){
						$('#contenido').load('administrador_lista.php');
					});
	
					$('#categ').click(function(){
						$('#contenido').load('categoria_lista.php');
					});
					
					$('#prod').click(function(){
						$('#contenido').load('producto_lista.php');
					});
					
					$('#usuario').click(function(){
						$('#contenido').load('usuario_lista.php');
					});
					
					$('#banner').click(function(){
						$('#contenido').load('banner_lista.php');
					});
					
		
				});
				
				
			</script>
			
		</html>";
	}
	
?>


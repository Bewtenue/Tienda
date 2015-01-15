<?php
	require_once "./Funciones/funcion.php";
 	$con = conecta();
	session_start();
	
	if (!isset($_SESSION['id_usuario'])) {
		$nom = '';
		$idu = '';
	}
	else{
		$nom = $_SESSION['nom_usuario'];
		$idu = $_SESSION['id_usuario'];
	}
	
	if (!isset($_REQUEST['exito'])) {
		$exito='';
	}else{
		$exito='Te has registrado con exito';
	}
	
	////BANNERS
	$sql2 = "SELECT * FROM banners WHERE activado = 1 and eliminado = 0 ORDER BY RAND() LIMIT 1";
	$res2 = mysql_query($sql2,$con);
	$idBA = mysql_result($res2,0,"id");
	$activo = mysql_result($res2,0, "imagen");
	
	$sql = "SELECT * FROM banners WHERE activado = 1 and eliminado = 0 and id != $idBA ORDER BY RAND() LIMIT 3";
	$res = mysql_query($sql,$con);
	$num = mysql_num_rows($res);
	///////////
	
	//////PRODUCTOS DESTACADOS/////
	$sql3 = "SELECT * FROM productos WHERE activado = 1 AND eliminado = 0 AND destacado = 1 ORDER BY RAND() LIMIT 5";
	$res3 = mysql_query($sql3,$con);
	$num3 = mysql_num_rows($res3);
	////////////
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Tienda en linea</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">
	<script src="jquery-1.7.2.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	
    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
      	
        <nav>
	       <div id="navbar" class="nav nav-pills pull-right">
	          <?php
	          		if ($nom=='') {
						echo"<form class=\"navbar-form navbar-right\" role=\"form\">
	          	
				            <div class=\"form-group\">
				              <input type=\"text\" placeholder=\"Email\" id=\"inputEmail\" class=\"form-control\">
				            </div>
				            <div class=\"form-group\">
				              <input type=\"password\" placeholder=\"Password\" id=\"inputPassword\" class=\"form-control\">
				            </div>
				            <button id=\"loginUsuario\" type=\"button\" class=\"btn btn-success\" onclick=\"login()\">Iniciar Sesion</button>
				            
				          </form>";
					}
					else{
						echo"
							<div>
							<h4 class='text-muted'>Bienvenido $nom</h4>
							<a href='#' onclick='cerrarsesion();'>Cerrar Sesion</a>
							</div>
						";
					}
	          	?>
	          
	          <div id="mensajelogin"><?php $exito ?></div>
	          
	        </div>
         
        </nav>
        
        <h3 class="text-muted">Tienda en Linea</h3>
        <nav>
        	<div>
        		<ul class="nav nav-pills pull-top">
		            <li role="presentation"><a href="#"id='home'>Home</a></li>
		            <li role="presentation"><a href="#" id='catalogo'>Catalogo</a></li>
		            <li role="presentation"><a href="#" id='registrarse'>Registro</a></li>
         		 	<li role="presentation"><a href="#" id='contacto'>Contacto</a></li>
         		 	<li role="presentation"><a href="#" id='carrito'>Carrito</a></li>
         		 </ul>
        	</div>
        </nav>
      </div>

      <!-- Carousel
		    ================================================== -->
		    <div id="myCarousel" class="carousel slide">
		      <div class="carousel-inner">
		      	<?php
		      		echo"<div class=\"item active\">
				          <img src=\"banners/$activo\" alt=\"\" >
				</div>";
      				for($i = 0; $i < $num;$i++){			
						$imagen = mysql_result($res, $i,"imagen");
						echo"
						<div class=\"item\">
				          <img src=\"banners/$imagen\" alt=\"\" >
				        </div>";
					}
     			 ?>
     			 
		      </div>
		      <a class="left carousel-control"  href="#myCarousel" data-slide="prev">&lsaquo;</a>
		      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a> 
		     </div>
		<div class="container" id="contenido">
			<div class="row marketing" id="destacados">
		      	<h4>Destacado</h4>
		      	<?php
		      		for($i = 0; $i < $num3;$i++){
		      			$idP = mysql_result($res3,$i,"id");
						$nombre= mysql_result($res3,$i,"nombre");
						$precio = mysql_result($res3,$i,"precio"); 
						$imagen = mysql_result($res3, $i,"imagen_preview");
						echo"
						<div class=\"col-lg-4\" id='prod$idP'>
							<img src=\"prod/$imagen\" alt=\"\" width='100' height='100'>
							<h4>$nombre</h4>
							<p>$$precio</p>
							<a href='#' onclick='ver($idP); return false;'>Ver mas</a>
						</div>";
					}
		      	?>
        
      		</div>
		</div>
      

      <footer class="footer">
        
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  
	<script>
		function ver(idP){
			$('#contenido').load("contenido/ver_producto.php?idP="+idP+"")
		}
		
		function login(){
				var usuario = $('#inputEmail').val();
				var pass	= $('#inputPassword').val();
				if(usuario == '' && pass == ''){
					$('#mensajelogin').html('Por favor llena los campos');
				}
				else{
					if(usuario == ''){
						$('#mensajelogin').html('Introduce nombre de usuario');
					}
					else{
						if(pass == ''){
							$('#mensajelogin').html('Introduce contraseña');
						}
						else{
							$.ajax({
								url		: 'contenido/login.php',
								type	: 'post',
								dataType: 'text',
								data	: 'usuario='+usuario+'&pass='+pass,
								success : function(res){
								if(res == 1){
									window.location.href="inicio.php"
								}
								else{
									$('#mensajelogin').html('Error en los campos');
									$('#mensajelogin').html(res);
								}
								},error: function(){
									$('#mensajelogin').html('Error de login');
								}
							})
						}
					}
				}
			}
		
		function cerrarsesion(){
			$.ajax({
				url		: 'contenido/cerrarsesion.php',
				type	: 'post',
				dataType: 'text',
				success : function(res){
				if(res == 1){
					window.location.href="inicio.php"
				}
				else{
				}
				},error: function(){
				}
			})
		}
		
		$(document).ready(function() {
			
				!function ($) {
			        $(function(){
			          $('#myCarousel').carousel()
			        })
			      }(window.jQuery)
				
				$('#home').click(function() {
					window.location.href="inicio.php";
				});
				
				$('#catalogo').click(function(){
					$('#contenido').load('contenido/catalogo.php')
				})
				$('#registrarse').click(function(){
					$('#contenido').load('contenido/registrarse.php');
				})
				
				$('#carrito').click(function(){
					$('#contenido').load('contenido/carrito.php');
				})
		});
	</script>
    


  
</html>

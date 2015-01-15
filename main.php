<?php
    
?>

<br /><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="es" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>1 Practica HTML</title>
        <meta name="description" content="Prueba de maquetado">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel="icon" href="favicon.ico">
		
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="jquery-1.7.2.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="estilos.css" rel="stylesheet">

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!-- <p>Hello world! This is HTML5 Boilerplate.</p> -->
        <div class="row">
        	<div class="span11">
        		<header id="LOGO">LOGO<a id = "inicio" </a></header>		
        	</div>
        </div>
		
		<div
		
			<div class="row">
				<div class="span2">
					<aside id="MENU-IZQUIERDO">MENU IZQUIERDO<br>
						<ol>
							<li>
								<a href ="#Titulo1" class = "titulos">
								Titulo 1
								</a>
								<br />
							</li>
							<li>
								<a href ="#Titulo2" class="titulos">
								Titulo 2
								</a>
							</li>
							<li>
								<a href ="#Titulo3" class="titulos">
								Titulo 3
								</a>
							</li>
						</ol>
			 		</aside>	
				</div>
				<div class="span8">
					    <section id="CONTENIDO">CONTENIDO DE TU SITIO
						<br />
						<form ="post" action="otro.html">
				
						<!--
							Ejercicio Javascript
							<div class ="input">
							<label for = "nombre">Nombre(s)</label>
							<input type ="text" id="nombre" name="nombre" pattern="/^[a-zA-Z ñÑáéíóúâêîôûàèìòùäëïöü]+/" required="required" placeholder="Juan" onKeyUp="mayusculas(this)"/>		
							</div>
							-->
						
						
						
						<!-- Volver a poner el required-->
						<div class ="input">
							<label for = "nombre">Nombre(s)</label>
							<input type ="text" id="nombre" name="nombre"   placeholder="Juan"/>		
						</div>
						
						<div class ="input"> 
							<label for = "apellidos">Apellidos</label>
							<input type ="text" id="apellidos" name="apellidos"   placeholder"Perez"/>
						</div>
						
						<div class ="input">
							<label for "sexo">Sexo</label>
							<input type="radio" name="sexo" value="Hombre" /> 
							Hombre
							<input type="radio" name="sexo" value="Mujer" />
							Mujer
						</div>		
						
						<div class ="input">
							<label for "transporte">Transporte</label>
							<input type="checkbox" name="transporte" value="Bici" /> Bici
							<input type="checkbox" name="transporte" value="Carro" />Carro
							<input type="checkbox" name="transporte" value="Camion" /> Camion
			
						</div>
						
						<div class ="input">
							<label for="url">URL de github</label>
							<input type="url" id="url" name="url" placeholder="http://github.com/usuario"/>
						</div>
						
						<div class ="input">
							<label for="telefono">Ingrese su teléfono</label>
							<input type="tel" id="telefono" name="telefono"   placeholder="3313845939" maxlenght="10"/>
						</div>
						
						<div class ="input">
							<label for="celular">Ingrese su celular</label>
							<input type="tel" id="celular" name="celular"  placeholder= "3313845969" maxlength="10"/>
						</div>
						
						<div class ="input">
							<label for="email">Correo</label> 
							<input type="email" id="email" name="email"   placeholder="fulanito@dominio.com"/>
						</div>		
						
						<div class ="input">
							<label for="edad">Ingresa tu edad</label>
							<input type="number" id="edad" name="edad" min="18" max="120" pattern="/^"/>
						</div>
						
						<div class ="input">
							<label for="fechanac">Fecha de Nacimiento</label> 
							<input type="date" id="fechanac" name="fechanac" />		
						</div>
						
						
						<div class ="input">
							<input id="foto" name="foto" type="file"
							accept="image/*" />
						</div>
						
						<div class ="input">
							<label for="textarea">Comentarios</label>
							<textarea id="textarea" name="textarea" wrap="hard"> </textarea>
						</div>
						
						<div class ="input"> 
							<label for = "Password">Password</label>
							<input type ="password" id="Password" name="Password"  required="required" />
						</div>
						
						<div class ="input"> 
							<label for = "Password2">Verificar Password</label>
							<input type ="password" id="Password2" name="Password2"  required="required" />
						</div>
						
						<div>
							<button type="button" onclick="verificarPassword()">Enviar</button>
						</div>
						
						</form>
						
						
						
						
						
						
						
						
						
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus faucibus mauris ac dignissim mattis. Sed nec mauris tellus. Integer sit amet nisi lorem. Cras arcu nisl, blandit ac ante id, feugiat volutpat nisi. Nunc sollicitudin nibh eget condimentum hendrerit. Suspendisse sed nisi non quam aliquet fringilla. Quisque ut magna at mauris volutpat pellentesque. Maecenas interdum convallis sapien vel vestibulum. Phasellus viverra lorem vel consequat commodo. Aenean euismod felis eu consequat commodo. Ut semper euismod rutrum. Proin quis magna ligula. Mauris sit amet lectus nec magna placerat ornare eu quis elit. Aliquam sit amet diam ante.
						</p>
						<p >
						Fusce lobortis justo eu eros dictum, nec laoreet sapien rutrum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce non pulvinar sapien, ac ullamcorper sapien. Integer sit amet lorem eu nisi ultrices laoreet. Integer mattis risus vel tellus hendrerit venenatis ac eu magna. Aenean consequat placerat nunc, vitae suscipit quam consequat et. Suspendisse congue euismod nisi, quis varius orci adipiscing nec. Proin in enim velit.
						</p>
						<a id = "Titulo1"</a>
						<p>
							TITULO 1 <br />
						Phasellus adipiscing, odio cursus fermentum consectetur, dui tellus pulvinar dui, vel posuere libero sapien consectetur lacus. Ut orci nisi, iaculis sed facilisis fermentum, cursus convallis risus. Suspendisse mattis porttitor orci, tristique iaculis urna adipiscing non. Maecenas tempus neque nunc, ac pulvinar neque elementum vitae. Duis commodo, quam vitae condimentum interdum, metus augue pulvinar justo, id varius tortor nisl id eros. Etiam congue convallis velit at sollicitudin. Vestibulum a mi elit.
						</p>
						<p>
						Aliquam ac laoreet augue. Curabitur sit amet enim eu sapien dictum vulputate eu a nibh. Morbi magna sapien, eleifend nec dignissim vitae, mollis ut felis. Sed erat massa, vulputate vitae ultricies ac, posuere sit amet dolor. Ut et tortor et augue pretium dapibus. Suspendisse accumsan mauris sed orci facilisis, a elementum mi consequat. Aenean pretium laoreet dignissim. Quisque et lorem blandit, pellentesque urna vel, fringilla elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent aliquet libero sed justo dapibus semper lobortis ac lacus. In venenatis, elit at tristique condimentum, felis elit molestie diam, ut feugiat ipsum elit eget sapien. Vivamus venenatis tempus velit et rutrum. Integer ullamcorper vitae lacus sodales cursus. Sed vitae ligula ut libero gravida laoreet.
						</p>
						<a id = "Titulo2"</a>
						<p> 
							TITULO 2<br />
						Phasellus imperdiet felis et arcu volutpat consequat. Curabitur euismod turpis eu lectus accumsan sagittis. Vestibulum consequat venenatis blandit. Nulla pharetra massa sed imperdiet hendrerit. Aliquam ornare, enim non posuere sollicitudin, felis dui pellentesque nisi, vel posuere nunc mauris ac tellus. In laoreet odio sit amet tristique rutrum. Cras eget lacus eu metus dictum aliquet. Nunc convallis venenatis leo.
						</p>
						<p>
						Nulla fringilla, tellus ac viverra scelerisque, tellus mi pretium lacus, non congue dolor libero in magna. Suspendisse placerat dui purus, gravida egestas orci tincidunt vitae. Cras non nulla non elit tempor eleifend ut sit amet magna. Praesent aliquam nec velit sed semper. Suspendisse eget placerat dui. In hac habitasse platea dictumst. Praesent vitae dui lacus. In pulvinar velit vel lectus vehicula tincidunt. Suspendisse potenti.
						</p>
						<a id = "Titulo3" <a/>
						<p >
							TITULO 3 <br />
						Cras ut leo non quam placerat cursus. Donec rhoncus consectetur magna vel consectetur. Cras dapibus enim a pretium mattis. Nam vulputate elementum nisl, non accumsan lacus. Donec in nisl porta enim iaculis ornare at ac eros. Nulla facilisi. Phasellus pellentesque varius nunc in ornare. Fusce tristique accumsan neque ac fringilla.
						</p>
						
						<table>
							<caption>Tabla Practicas De Tablas HTML</caption>
							<thead>
								<tr>
								<th rowspan="3">Hora</th>
								<th colspan = "2" >Salon 1</th>
								<th></th>
								<th></th>
								<th></th>
								<th colspan="4"> Salon 2</th>
								<th rowspan="4"> Salon 3</th>
								<th rowspan="4"
								</tr>
								<tr></tr>
							</thead>
						</table>
						
						
						</section>
					 
				</div>
				<div class="span1">
					
					    <aside id="MENU-DERECHO">MENU DERECHO<br>
						<a id="facebook" href="http://www.facebook.com" class"redsoc" target="_blank" >
						Facebook
						</a>
						<img src="http://www.apecdoc.org/site/img/icon-facebook.png" width="30" alt="Icono de Facebook"/>
						<br />
						<a href="http://www.gaiaonline.com" class"redsoc" target="_blank" >
						Gaiaonline
						</a>
						<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash3/t1.0-1/c6.4.48.48/p56x56/5860_111774730285_4414706_s.jpg" width="35" alt="Icono Gaiaonline" />
						<a href="http://www.twitter.com" class"redsoc" target="_blank" >
						<br />
						Twitter
						</a>
						<img src="https://lh6.googleusercontent.com/-vTel6uqRnc4/UYc_TCPuIpI/AAAAAAAAEjc/o4FxLgPBy4w/s37/twitter%2Blogo.png" width="30" />
						</aside>
					 
				</div>
				
						
			</div>
		
		
		

		


			

		


		
		
		<footer id="Pie">PIE
			<a href = "#LOGO" class = "boton">
				Ir al inicio
			</a>
			<ul >
			   <li><a href="#" title="Enlace genérico">Elemento 1</a></li>
			   <li><a href="#" title="Enlace genérico">Elemento 2</a></li>
			   <li><a href="#" title="Enlace genérico">Elemento 3</a></li>
			   <li><a href="#" title="Enlace genérico">Elemento 4</a></li>
			   <li><a href="#" title="Enlace genérico">Elemento 5</a></li>
			   <li><a href="#" title="Enlace genérico">Elemento 6</a></li>
			</ul>
		</footer>
		
		<script type = "text/javascript">
		
			function mayusculas(nombre){
				nombre.value = nombre.value.toUpperCase();
				console.log(miobjeto.value);
			}
			
			function verificarPassword(){
				var pass1 = document.getElementById("Password");
				var pass2 = document.getElementById("Password2");
				if(pass1.value !== pass2.value){
					//document.write("las contraseñas son diferentes");
					//crear el nodo
					var parrafo2 = document.createElement("span");
					//poner atributos opcional
					parrafo2.setAttribute('id','errorPass');
					//crear texto del nodo
					var contenido2 = document.createTextNode("Las contraseñas son diferentes");
					//agregar el texto al span
					parrafo2.appendChild(contenido2);
					//al padre 2 del pass
					pass2.parentNode.appendChild(parrafo2);
					
				}else{
					//document.write("contraseñas son iguales");
					var error = document.getElementById('errorPass');
					if(error !== undefined){
						pass2.parentNode.removeChild(error);
					}
					
					var parrafo = document.createElement("p");
					var contenido = document.createTextNode("Las contraseñas son iguales");
					parrafo.appendChild(contenido);
					pass2.parentNode.appendChild(parrafo);	
				}
			
				
				
			}
			
		</script>
		
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
<?php
    
?>
<html>
	<head>
		<title>Practica 08/10/14 Jesus Alberto Ley Ayon</title>
		<script src="jquery-1.7.2.js"></script>
	</head>

	<body onload="desaparece()">
		
		<h2 class="sub-header"><div>Usuarios | Agregar</div></h2>
		
		<a id='usuario_form'href="#"><h4>Lista de Usuarios</h4></a>
		<form name="formlulario" id="form01" method="post" action="usuario_nuevo.php" enctype="multipart/form-data" onsubmit="return cancelando();">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" required="required" placeholder="Nombre"/ >
			<br />
			<label for="apellido">Apellido</label>
			<input type="text" name="apellido" id="apellido" required="required"placeholder="Apellido"/>
			<br />
			<label for="email">Email</label>
			<input type="email" name="email" id="email" required="required" placeholder="Email" onblur="verificarCorreo();"/>
			<br />
			<label for="password">Password</label>
			<input type="password" name="pass" id="pass" required="required" placeholder="Password"/>
			<br />
			<label for="domicilio">Domicilio</label>
			<input type="text" name="domicilio" id="domicilio" required="required" placeholder="Domicilio"/>
			<br />
			<label for="telefono">Telefono</label>
			<input type="text" name="telefono" id="telefono" required="required" placeholder="Telefono" onkeypress="return validarint(event);" pattern="[0-9]{10}" maxlength="10"/>
			<br />
			<input type="submit" name="enviar" id="enviar" value="Enviar" />
			<br />

		</form>
		<div id="mensaje"></div>

	</body>

	<script>
		var bandera = false;

		function verificarCorreo() {

			var email = $('#email').val();
			if (email == '') {

			} else {

				$.ajax({
					url : 'verificaCorreoUsuario.php',
					type : 'post',
					dataType : 'text',
					data : 'email=' + email,
					success : function(res) {
						if (res == 1) {
							$('#mensaje').html('Ya existe el correo por favor cambialo');
							bandera = false;

						}
						if (res == 0) {
							$('#mensaje').html('Puedes usar el correo');
							bandera = true;

						}
					},
					error : function() {
						$('#mensaje').html('Error en la Base de Datos');
						bandera = false;

					}
				})
				return true;
			}

		}

		function cancelando() {
			if (bandera) {
				return true;
			} else {
				return false;
			}
		}

		function validarint(evento) {
			//propiedad which regresa cual tecla o boton de raton fue presionada
			evento = (evento) ? evento : window.event;
		    var charCode = (evento.which) ? evento.which : evt.keyCode;
		    if (charCode > 31 && (charCode < 48 || charCode > 57) ) {
		        return false;
		    }
		    return true;
		}
		
		


		$(document).ready(function() {
			$('#usuario_form').click(function() {
				$('#contenido').load('usuario_lista.php');
			});

		});

	</script>
	
</html>
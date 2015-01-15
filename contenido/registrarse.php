<?php
    
?>

<html>
	<head>
		<title>Practica 08/10/14 Jesus Alberto Ley Ayon</title>
		<script src="jquery-1.7.2.js"></script>
	</head>

	<body>
		
		<h2 class="sub-header"><div>Registro</div></h2>
		<div class="row" id="registro">
		<div class="span4 offset4">
			<form name="formlulario" id="formregistrarse" class='form-group' method="post" action="usuario_nuevo.php" enctype="multipart/form-data" onsubmit="return cancelando();">
				<fieldset>
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
					<input type="submit" name="enviarusuario" id="enviarusuario" value="Enviar" />
					<br />
				</fieldset>
			</form>
			<div id="mensaje"></div>
		</div>
		</div>
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
		
		


		

	</script>
	
</html>
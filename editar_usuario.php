<?php
require_once "./Funciones/funcion.php";
$con = conecta();
$idU = $_REQUEST['idU'];
$sql = "SELECT * FROM usuarios WHERE id = $idU";
$res = mysql_query($sql, $con);
$nombre = mysql_result($res, 0, "nombre");
$apellido = mysql_result($res, 0, "apellidos");
$correo = mysql_result($res, 0, "email");
$domicilio = mysql_result($res, 0, "domicilio");
$telefono = mysql_result($res, 0, "telefono");


echo "<html>
	<head>
		<title>Practica 08/10/14 Jesus Alberto Ley Ayon</title>
		<link rel=\"stylesheet\" href=\"estilos.css\">
		<script src=\"jquery-1.7.2.js\"></script>
	</head>
	
	<body>
		<h2 class=\"sub-header\"><div>Administradores | Editar</div></h2>
		<a id='edit_usuario' href=\"#\"><h4>Lista Administrador</h4></a>
		<form name=\"formlulario\" id=\"formedit\" method=\"post\" action=\"\">
			<label for=\"nombre\">Nombre</label>
			<input class= \"edit\" type=\"text\" name=\"nombre\" id=\"nombre\" required=\"required\" value=\"$nombre\"/><br />
			<label for=\"apellido\">Apellido</label>
			<input class= \"edit\" type=\"text\" name=\"apellido\" id=\"apellido\" required=\"required\" value=\"$apellido\"/><br />
			<label for=\"email\">Email</label>
			<input class= \"edit\" type=\"email\" name=\"email\" id=\"email\" required=\"required\" value=\"$correo\" onblur=\"verificarCorreo();\"><br />
			<label for=\"domicilio\">Domicilio</label>
			<input type=\"text\" name=\"domicilio\" id=\"domicilio\" required=\"required\" value=\"$domicilio\"/>
			<br />
			<label for=\"telefono\">Telefono</label>
			<input type=\"text\" name=\"telefono\" id=\"telefono\" required=\"required\" value=\"$telefono\" onkeypress=\"return validarint(event);\" pattern=\"[0-9]{10}\" maxlength=\"10\"/>
			<br />
			<div id=\"observa\"></div>
			<input type=\"button\" name=\"editar\" id=\"editar\" value=\"Editar\" onclick=\"editarUsuario($idU); return false;\" /><br />
			

		</form>
		<div id =\"mensaje\"></div>
		
	</body>
	
	
	
	
			<script>
				var bandera;
				
				
				
				function editarUsuario(id){
					if (!cancelando()) {
						verificarCorreo();
					}else{
						var nombre = $('#nombre').val();
						var apellido = $('#apellido').val();
						var email = $('#email').val();
						var domicilio = $('#domicilio').val();
						var telefono = $('#telefono').val();
							if(confirm('Desea Editar el Registro?')){
								$.ajax({
									url		: 'edit_usu.php',
									type	: 'post',
									dataType: 'text',
									data	: 'id='+id+'&nombre='+nombre+'&apellido='+apellido+'&email='+email+'&domicilio='+domicilio+'&telefono='+telefono,
									success : function(res){
										if(res == 1){
											$('#mensaje').html('Editado completo');
										}
										else{
											$('#mensaje').html('Fallo la edicion');
										}
									},error: function(){
										$('#mensaje').html('Error al editar');
									}
								})
							}
					}
				}
				
				
				function verificarCorreo(){
					
					var email = $('#email').val();
					if(email == ''){
						
					}
					else{
						
						$.ajax({
							url		: 'verificaCorreoUsuario.php',
							type	: 'post',
							dataType: 'text',
							data	: 'email='+email+'&idU='+$idU,
							success : function(res){
								if(res == 1){
									$('#mensaje').html('Ya existe el correo por favor cambialo');
									bandera = false;
									
								}
								if(res == 0){
									$('#mensaje').html('Puedes usar el correo');
									bandera = true;
									
								}
							},error: function(){
								$('#mensaje').html('Error en la Base de Datos');
								bandera = false;
								
							}
						})
						return true;
					}
					
				}
				
				function cancelando(){
					if(bandera){
						return true;
					}
					else{
						return false;
					}
				}
				
				$(document).ready(function() {
					$('#edit_usuario').click(function() {
						$('#contenido').load('usuario_lista.php');
					});
				});
		</script>
	
	
</html>";
?>
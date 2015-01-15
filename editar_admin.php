<?php
require_once "./Funciones/funcion.php";
$con = conecta();
$idA = $_REQUEST['idA'];
$sql = "SELECT * FROM administradores WHERE id = $idA";
$res = mysql_query($sql, $con);
$nombre = mysql_result($res, 0, "nombre");
$apellido = mysql_result($res, 0, "apellidos");
$correo = mysql_result($res, 0, "email");
$imagen = mysql_result($res, 0, "imagen");

echo "<html>
	<head>
		<title>Practica 08/10/14 Jesus Alberto Ley Ayon</title>
		<script src=\"jquery-1.7.2.js\"></script>
	</head>
	
	<body>
		<h2 class=\"sub-header\">Administradores | Editar</h2>
		<a id='edit_admin' href=\"#\"><h4 class=\"sub-header\">Lista De Administradores</h4></a>
		<form name=\"formlulario\" id=\"formedit\" method=\"post\" action=\"\" enctype=\"multipart/form-data\">
			<label for=\"nombre\">Nombre</label>
			<input class= \"edit\" type=\"text\" name=\"nombre\" id=\"nombre\" required=\"required\" value=\"$nombre\"/><br />
			<label for=\"apellido\">Apellido</label>
			<input class= \"edit\" type=\"text\" name=\"apellido\" id=\"apellido\" required=\"required\" value=\"$apellido\"/><br />
			<label for=\"email\">Email</label>
			<input class= \"edit\" type=\"email\" name=\"email\" id=\"email\" required=\"required\" value=\"$correo\" onblur=\"verificarCorreo();\"><br />
			<label for=\"imagen\">Imagen</label>
			<div id=\"imgmuestra\"></div>
			<img id=\"primeraimg\" src=\"stuff/$imagen\" width=\"100\" height=\"100\" alt=\"No tienes ninguna imagen\">
			<input type=\"file\" name=\"imagen\" id=\"imagen\" accept=\"image/*\"  onchange=\"previsualizar(this.files);\" onclick=\"desaparece();\"/><br />
			<div id=\"observa\"></div>
			<input type=\"button\" name=\"editar\" id=\"editar\" value=\"Editar\" onclick=\"editarAdmin($idA); return false;\" /><br />
			

		</form>
		<div id =\"mensaje\"></div>
		
	</body>
	
	
	
	
			<script>
				var bandera;
				
				
				
				function editarAdmin(id){
					if (!cancelando()) {
						verificarCorreo();
					}else{
						var nombre = $('#nombre').val();
						var apellido = $('#apellido').val();
						var email = $('#email').val();
						var inputFileImage = document.getElementById('imagen');
						var imagen = inputFileImage.files[0];
						var data = new FormData();
						data.append('id',id);
						data.append('nombre',nombre);
						data.append('apellido',apellido);
						data.append('email',email);
						data.append('imagen',imagen);
							if(confirm('Desea Editar el Registro?')){
								$.ajax({
									url		: 'edit_adm.php',
									type	: 'post',
									contentType: false,
									data	: data,
									processData: false,
									cache   : false,
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
				
				function previsualizar(files){
				    var file = files[0];
				    var imageType = /image.*/;
					
				    var img = document.createElement('img');
				    img.classList.add('obj');
				    $(img).attr('height',100);
				    $(img).attr('width',100);
				    img.file = file;
					$('#imgmuestra').empty();
				    imgmuestra.appendChild(img);
					   
				    var reader = new FileReader();
				    reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
				    reader.readAsDataURL(file);
					$('#imgmuestra').show();
					$('#primeraimg').hide();
				}
				
				function desaparece(){
					$('#imgmuestra').hide();
				}
				
				function funcionprueba(id){
					$('#observa').html('hurra');
				}
				
				function verificarCorreo(){
					
					var email = $('#email').val();
					if(email == ''){
						
					}
					else{
						
						$.ajax({
							url		: 'verificaCorreo.php',
							type	: 'post',
							dataType: 'text',
							data	: 'email='+email+'&idA='+$idA,
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
					$('#edit_admin').click(function() {
						$('#contenido').load('administrador_lista.php');
					});
				});
		</script>
	
	
</html>";
?>
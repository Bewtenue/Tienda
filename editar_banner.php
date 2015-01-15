<?php
require_once "./Funciones/funcion.php";
$con = conecta();
$idB = $_REQUEST['idB'];
$sql = "SELECT * FROM banners WHERE id = $idB";
$res = mysql_query($sql, $con);
$nombre = mysql_result($res, 0, "nombre");
$imagen = mysql_result($res, 0, "imagen");

echo "<html>
	<head>
		<title>Practica 08/10/14 Jesus Alberto Ley Ayon</title>
		<link rel=\"stylesheet\" href=\"estilos.css\">
		<script src=\"jquery-1.7.2.js\"></script>
	</head>
	
	<body>
		<h2 class=\"sub-header\"><div>Banners | Editar</div></h2>
		
		<a id='edit_banner' href=\"#\"><h4>Lista Banner</h4></a>
		<form name=\"formlulario\" id=\"formedit\" method=\"post\" action=\"\" enctype=\"multipart/form-data\" >
			<label for=\"nombre\">Nombre</label>
			<input class= \"edit\" type=\"text\" name=\"nombre\" id=\"nombre\" required=\"required\" value=\"$nombre\"/><br />
			<label for=\"imagen\">Imagen</label>
			<div id=\"imgmuestra\"></div>
			<img id=\"primeraimg\" src=\"banners/$imagen\" width=\"100\" height=\"100\" alt=\"No tienes ninguna imagen\">
			<input type=\"file\" name=\"imagen\" id=\"imagen\" accept=\"image/*\"  onchange=\"previsualizar(this.files);\" onclick=\"desaparece();\"/><br />
			<div id=\"observa\"></div>
			<input type=\"button\" name=\"editar\" id=\"editar\" value=\"Editar\" onclick=\"editarBanner($idB); return false;\" /><br />
			

		</form>
		<div id =\"mensaje\"></div>
		
	</body>
	
	
	
	
			<script>
				
				function editarBanner(id){
						var nombre = $('#nombre').val();
						/////edit para subir imagenes
						var inputFileImage = document.getElementById('imagen');
						var imagen = inputFileImage.files[0];
						var data = new FormData();
						data.append('id',id);
						data.append('imagen',imagen);
						data.append('nombre',nombre);
						//////////
							if(confirm('Desea Editar el Registro?')){
								$.ajax({
									url		: 'edit_bnr.php',
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
				
				
				
				$(document).ready(function() {
					$('#edit_banner').click(function() {
						$('#contenido').load('banner_lista.php');
					});
				});
		</script>
	
	
</html>";
?>
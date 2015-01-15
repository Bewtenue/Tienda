<?php
    
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Practica 08/10/14 Jesus Alberto Ley Ayon</title>
		<script src="jquery-1.7.2.js"></script>
	</head>

	<body onload="desaparece()">
		
		<h2 class="sub-header"><div>Banner | Agregar</div></h2>
		
		<a id='banner_form'href="#"><h4>Lista Banners</h4></a>
		<form name="formlulario" id="form01" method="post" action="banner_nuevo.php" enctype="multipart/form-data" >
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" required="required" placeholder="Nombre"/ >
			<br />
			<label for="imagen">Imagen</label>
			<div id="imgmuestra"></div>
			<input type="file" name="imagen" id="imagen" accept="image/*" required="required" onchange="previsualizar(this.files);" onclick="desaparece();"/>
			<br />
			<input type="submit" name="enviar" id="enviar" value="Enviar" />
			<br />

		</form>
		

	</body>

	<script>
		function previsualizar(files) {

			var file = files[0];
			var imageType = /image.*/;

			var img = document.createElement("img");
			img.classList.add("obj");
			$(img).attr("height", 100);
			$(img).attr("width", 100);
			img.file = file;
			$('#imgmuestra').empty();
			imgmuestra.appendChild(img);
			// Assuming that "preview" is a the div output where the content will be displayed.

			var reader = new FileReader();
			reader.onload = (function(aImg) {
				return function(e) {
					aImg.src = e.target.result;
				};
			})(img);
			reader.readAsDataURL(file);
			$('#imgmuestra').show();
		}

		function cambiaImagen() {
			var imagen = $('#imagen').val();
			$.ajax({
				url : 'cambiaImagen.php',
				type : 'post',
				dataType : 'json',
				data : 'imagen=' + imagen,
				success : function(res) {

					$('#imgmuestra').show();

				},
				error : function() {
					$('#imgmuestra').hide();
				}
			})
		}

		function desaparece() {
			$('#imgmuestra').hide();
		}


		$(document).ready(function() {
			$('#banner_form').click(function() {
				$('#contenido').load('banner_lista.php');
			});

		});

	</script>

</html>
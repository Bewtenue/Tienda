<?php
require_once "./Funciones/funcion.php";
$con = conecta();

$sql = "SELECT * FROM categorias WHERE activado = 1 and eliminado = 0";
$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);
?>

<html>
	<head>
		<title>Productos Jesus Alberto Ley Ayon</title>
		<script src="jquery-1.7.2.js"></script>

	</head>

	<body onload="desaparece();">
		
		<h2 class="sub-header"><div>Productos | Agregar</div></h2>
		
		<a id='producto_form'href="#"><h4>Lista Productos</h4></a>
		<form name="formlulario" id="form01" method="post" action="producto_nuevo.php" enctype="multipart/form-data" onsubmit="return cancelando();">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" required="required" placeholder="Nombre"/ >
			<br />
			<label for="codigo">Codigo</label>
			<input type="text" name="codigo" id="codigo" required="required" placeholder="Codigo"/>
			<br />
			<label for="imagen">Imagen Preview</label>
			<div id="imgmuestra"></div>
			<input type="file" name="imagen" id="imagen" accept="image/*" required="required" onchange="previsualizar(this.files);"/>
			<br />
			<label for="imagen_detalle">Detalle de Imagen</label>
			<div id="imgmuestra2"></div>
			<input type="file" name="imagen_detalle" id="imagen_detalle" accept="image/*" required="required" onchange="previsualizar2(this.files);"/ >
			<br />
			<label for="descripcion">Descripcion</label>

			<input type="" name="descripcion" id="descripcion" required="required" placeholder="Descripcion"/ >
			<br />
			<label for="precio">Precio</label>
			<input type="text" name="precio" id="precio" required="required" placeholder="Precio" onkeypress="return validardouble(event);"/ >
			<br />
			<label for="categoria">Categoria</label>
			<select name="categoria" id="categoria">
				<option value="0"></option>
				<?php
				for ($i = 0; $i < $num; $i++) {
					$idC = mysql_result($res, $i, "id");
					$nombre = mysql_result($res, $i, "nombre");
					echo "
					<option value=\"$idC\">$nombre</option>
					";
				}
				?>
			</select>
			<br />
			<label for="stock">Stock</label>
			<input type="text" name="stock" id="stock" required="required" placeholder="Stock" onkeypress="return validarint(event);"/ >
			<br />
			<label for="destacado">Destacado</label>
			<select name="destacado" id="destacado">
				<option value=""></option>
				<option value="1">Si</option>
				<option value="0">No</option>
			</select>
			<br />
			<input type="submit" name="enviar" id="enviar" value="Enviar" />
			<br />

		</form>
		<div id="mensaje"></div>

	</body>

	<script>
		function validardouble(evento) {
			//propiedad which regresa cual tecla o boton de raton fue presionada
			evento = (evento) ? evento : window.event;
			var charCode = (evento.which) ? evento.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode != 46)) {
				return false;
			}
			return true;
		}

		function validarint(evento) {
			//propiedad which regresa cual tecla o boton de raton fue presionada
			evento = (evento) ? evento : window.event;
			var charCode = (evento.which) ? evento.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
				return false;
			}
			return true;
		}

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

		function previsualizar2(files) {
			$('#imgmuestra2').hide();
			var file = files[0];
			var imageType = /image.*/;
			var img = document.createElement('img');
			img.classList.add('obj');
			$(img).attr('height', 100);
			$(img).attr('width', 100);
			img.file = file;
			$('#imgmuestra2').empty();
			imgmuestra2.appendChild(img);

			var reader = new FileReader();
			reader.onload = (function(aImg) {
				return function(e) {
					aImg.src = e.target.result;
				};
			})(img);
			reader.readAsDataURL(file);
			$('#imgmuestra2').show();
			//$('#segundaimg').hide();
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
			$('#producto_form').click(function() {
				$('#contenido').load('producto_lista.php');
			});

		});

	</script>

</html>

<!DOCTYPE html>
<html >
	<head>
		<title>Categorias Jesus Alberto Ley Ayon</title>
		<script src="jquery-1.7.2.js"></script>
	</head>

	<body >
		<h2 class="sub-header"><div>Categoria | Agregar</div></h2>
		
		<a id="cat_form" href="#"><h4>Lista Categoria</h4></a>
		<form name="formlulario" id="form01" method="post" action="categoria_nueva.php">
			<label for="nombre">Nombre Categoria</label>
			<input type="text" name="nombre" id="nombre" required="required" placeholder="Nombre"/ >
			<br />
			<input type="submit" name="enviar" id="enviar" value="Enviar" />
			<br />

		</form>
		<div id="mensaje"></div>

	</body>

	<script>
		$(document).ready(function() {
			$('#cat_form').click(function() {
				$('#contenido').load('categoria_lista.php');
			});

		});

	</script>

</html>

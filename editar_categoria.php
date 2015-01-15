<?php
require_once "./Funciones/funcion.php";
$con = conecta();
$idC = $_REQUEST['idC'];
$sql = "SELECT * FROM categorias WHERE id = $idC";
$res = mysql_query($sql, $con);
$nombre = mysql_result($res, 0, "nombre");


echo "<html>
	<head>
		<title>Edit Categorias Jesus Alberto Ley Ayon</title>
		<link rel=\"stylesheet\" href=\"estilos.css\">
		<script src=\"jquery-1.7.2.js\"></script>
	</head>
	
	<body>
	<h2 class=\"sub-header\"><div>Categorias | Editar</div></h2>
		
		<a id='edit_categorias' href=\"#\"><h4>Lista Categorias</h4></a>
		<form name=\"formlulario\" id=\"formedit\" method=\"post\" action=\"\">
			<label for=\"nombre\">Nombre</label>
			<input class= \"edit\" type=\"text\" name=\"nombre\" id=\"nombre\" required=\"required\" value=\"$nombre\"/><br />
			<input type=\"button\" name=\"editar\" id=\"editar\" value=\"Editar\" onclick=\"editarCategoria($idC); return false;\" /><br />
			

		</form>
		<div id =\"mensaje\"></div>
		
	</body>
	
	
	
	
			<script>
			
				
				
				
				function editarCategoria(id){
						var nombre = $('#nombre').val();
						
							if(confirm('Desea Editar el Registro?')){
								$.ajax({
									url		: 'edit_cat.php',
									type	: 'post',
									dataType: 'text',
									data	: 'id='+id+'&nombre='+nombre,
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
				
				
				
				
				$(document).ready(function() {
					$('#edit_categorias').click(function() {
						$('#contenido').load('categoria_lista.php');
					});
				});
		</script>
	
	
</html>";
?>
<?php
require_once "./Funciones/funcion.php";
$con = conecta();

$sql = "SELECT * FROM categorias WHERE activado = 1 and eliminado = 0";
$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);

echo "<head>
		  <title>Practica 08/10/14 Jesus Alberto Ley Ayon</title>
		  <script src=\"jquery-1.7.2.js\"></script>
		  <link rel=\"stylesheet\" href=\"estilos.css\">
	      </head>";

echo "
		<h2 class=\"sub-header\"><div>Categoria | Listado</div></h2>
		
		<a id='cat_nueva' href=\"#\"><h4>Nueva Categoria</h4></a>
		
		<div class=\"table-responsive\">
		<table class=\"table table-striped\" id='tabla_admin'>
			<thead>
                <tr>
                  <th>Categoria</th>
                  <th colspan='3'>Acciones</th>
                </tr>
              </thead>
              <tbody>";
			  for ($i = 0; $i < $num; $i++) {
				$idC = mysql_result($res, $i, "id");
				$nombre = mysql_result($res, $i, "nombre");
				echo "<tr id='fila$idC'>
						<td><div class='nom'>$nombre</div></td>
						<td><div class='acc'><a id='ver_categoria' href=\"#\" onclick='ver($idC); return false;' >Ver</a></div></td>
						<td><div class='acc'><a id='editar_categoria' href=\"#\" onclick='editar($idC); return false;' >Editar</a></div></td>
						<td><div class='acc'><a href=\"javascript:void(0);\" onclick='elimina($idC); return false;' target=\"_blank\">Eliminar</a></div></td>
					</tr>
					";
				}
			  
			  echo"
			  </tbody>
		</table>
		</div>";








echo "<script src=\"jquery-1.7.2.js\"></script>
			<script>
				function elimina(id){
				if(confirm(\"Desea Eliminar el Registro?\")){
					$.ajax({
						url		: 'elimina_categoria.php',
						type	: 'post',
						dataType: 'text',
						data	: 'id='+id,
						success : function(res){
							$('#fila'+id).hide();
						},error: function(){
							//alert('No se encontro el archivo');
						}
					})
				}
				}
				
				function editar(id){
					$('#contenido').load(\"editar_categoria.php?idC=\"+id+\"\");
				}
				
				function ver(id){
					$('#contenido').load(\"ver_categoria.php?idC=\"+id+\"\");
				}
				
				
				$(document).ready(function() {
					$('#cat_nueva').click(function() {
						$('#contenido').load('formulario_categoria.php');
					});
					
				});
				
				
		</script>";
?>
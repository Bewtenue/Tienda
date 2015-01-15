<?php
    require_once "./Funciones/funcion.php";
 	$con = conecta();
	
	$sql = "SELECT * FROM banners WHERE activado = 1 and eliminado = 0";
	$res = mysql_query($sql,$con);
	$num = mysql_num_rows($res);
	
	echo "<head>
		  <title>Practica 08/10/14 Jesus Alberto Ley Ayon</title>
		  <script src=\"jquery-1.7.2.js\"></script>
	      </head>";
	
	echo"
		<h2 class=\"sub-header\"><div>Banners | Listado</div></h2>
		
		<a id='banner_lista' href=\"#\"><h4>Nuevo Banner<h4></a>
		
		<div class=\"table-responsive\">
		<table class=\"table table-striped\" >
			<thead>
                <tr>
                  <th>Nombre</th>
                   <th>Imagen</th>
                  <th colspan='3'>Acciones</th>
                </tr>
              </thead>
              <tbody>";
	
	
	for($i = 0; $i < $num;$i++){
		$idB	= mysql_result($res,$i,"id");
		$nombre = mysql_result($res, $i,"nombre");
		$imagen = mysql_result($res, $i,"imagen");
		echo "<tr id='fila$idB'>
					<td><div >$nombre</div></td>
					<td><div ><img src=\"banners/$imagen\" width=\"100\" height=\"100\" /></div></td>
					<td><div ><a href=\"#\" onclick='ver($idB); return false;'>Ver</a></div></td>
					<td><div ><a href=\"#\" onclick='editar($idB); return false;'>Editar</a></div></td>
					<td><div ><a href=\"javascript:void(0);\" onclick='elimina($idB); return false;' target=\"_blank\">Eliminar</a></div></td>
			</tr>";
	} 
	echo "
		</tbody>
		</table>
		</div>
	
	<script src=\"jquery-1.7.2.js\"></script>
			<script>
				function elimina(id){
				if(confirm(\"Desea Eliminar el Registro?\")){
					$.ajax({
						url		: 'elimina_banner.php',
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
					$('#contenido').load(\"editar_banner.php?idB=\"+id+\"\");
				}
				
				function ver(id){
					$('#contenido').load(\"ver_banner.php?idB=\"+id+\"\");
				}
				
				$(document).ready(function() {
					$('#banner_lista').click(function() {
						$('#contenido').load('formulario_banner.php');
					});

				});
				
				
		</script>";
		
?>
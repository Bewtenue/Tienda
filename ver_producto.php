<?php

require "./Funciones/funcion.php";
$con = conecta();
$idP = $_REQUEST['idP'];
$sql = "SELECT * FROM productos WHERE id = $idP";
$res = mysql_query($sql, $con);
$nombre = mysql_result($res, 0, "nombre");
$precio = mysql_result($res, 0, "precio");
$imagen = mysql_result($res,0,"imagen_detalle");
///////////
$categoriaid = mysql_result($res, 0, "categoria");
$sql2 = "SELECT * FROM categorias WHERE id = $categoriaid	";
$res2 = mysql_query($sql2, $con);
$categoria = mysql_result($res2, 0, "nombre");
///////////

$stock = mysql_result($res, 0, "stock");
$destacado = mysql_result($res, 0, "destacado");
if($destacado==1){
				$dest='Si';
			}
			else{
				$dest='No';
			}
echo "<html>
	    	<head>
	    		<title>Productos</title>
	    	</head>
	    	
			<body>
			<h2 class=\"sub-header\"><div>Productos | Ver Productos</div></h2>
			
			<a id='ver_producto' href=\"#\"><h4>Lista De Productos</h4></a>
		
			<div class=\"table-responsive\">
			<table class=\"table table-striped\" id='tabla_admin'>
				<thead>
	                <tr>
	                  <th>Producto</th>
	                  <th>Imagen</th>
	                  <th>Precio</th>
	                  <th>Categoria</th>
	                  <th>Stock</th>
	                  <th>Destacado</th>
	                </tr>
	              </thead>
	              <tbody>
			
			<tr id='fila$idP'>
				<td><div>$nombre</div></td>
				<td><div><img width='100' height='100'src='prod/$imagen'/></div></td>
				<td><div>$precio</div></td>
				<td><div>$categoria</div></td>
				<td><div>$stock</div></td>
				<td><div>$dest</div></td>
			</tr>
			</tbody>
			</table>
			</div>
			</body>
			
			
			
			
		</html>
		<script>
			$(document).ready(function() {
				$('#ver_producto').click(function() {
					$('#contenido').load('producto_lista.php');
				});
			});
		</script>
		";
?>
<?php

require "./Funciones/funcion.php";
$con = conecta();
$idB = $_REQUEST['idB'];
$sql = "SELECT * FROM banners WHERE id = $idB";
$res = mysql_query($sql, $con);
$nombre = mysql_result($res, 0, "nombre");
$imagen = mysql_result($res, 0, "imagen");

echo "<html>
	    	<head>
	    		<title>Banners</title>
	    	</head>
	    	
			<body>
			
			<h2 class=\"sub-header\"><div>Banners | Ver Banner</div></h2>
	
			
			<a id='ver_banner' href=\"#\"><h4>Lista De Banners</h4></a>
		
			<div class=\"table-responsive\">
				<table class=\"table table-striped\" >
				<thead>
	                <tr>
	                  <th>Nombre</th>
	                   <th>Imagen</th>	                  
	                </tr>
	              </thead>
	              <tbody>
					<tr id='fila$idB'>
						<td><div >$nombre</div></td>
						<td><div ><img src=\"banners/$imagen\" width=\"100\" height=\"100\" /></div></td>
					</tr>
				  </tbody>
				</table>
			</div>
		</body>

		</html>
		<script>
			$(document).ready(function() {
				$('#ver_banner').click(function() {
					$('#contenido').load('banner_lista.php');
				});
			});
		</script>
		
		";
?>



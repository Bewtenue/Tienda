<?php

require "./Funciones/funcion.php";
$con = conecta();
$idA = $_REQUEST['idA'];
$sql = "SELECT * FROM administradores WHERE id = $idA";
$res = mysql_query($sql, $con);
$nombre = mysql_result($res, 0, "nombre") . ' ' . mysql_result($res, 0, "apellidos");
$correo = mysql_result($res, 0, "email");
$imagen = mysql_result($res,0,"imagen");
echo "<html>
	    	<head>
	    		<title>Administradores</title>
	    	</head>
	    	
			<body>
			
			
			<h2 class=\"sub-header\">Administradores | Ver Admin</h2>
			<a id='ver_admin' href=\"#\"><h4 class=\"sub-header\">Lista De Administradores</h4></a>
		
			<div class=\"table-responsive\">
			<table class=\"table table-striped\">
			<thead>
                <tr>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th colspan='3'>Imagen</th>
                </tr>
              </thead>
              <tbody>
              	<tr>
                  <td><div id='fila$idA'>$nombre</div></td>
                  <td><div>$correo</div></td>
                  <td><div><img width='100' height='100'src=\"stuff/$imagen\" alt='no imagen disponible'/></div></td>
                </tr>
              
			</div>
			</body>
			
			
			
			
		</html>
		<script>
			$(document).ready(function() {
				$('#ver_admin').click(function() {
					$('#contenido').load('administrador_lista.php');
				});
			});
		</script>
		
		";
		
		
?>
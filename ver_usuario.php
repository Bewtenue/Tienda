<?php

require "./Funciones/funcion.php";
$con = conecta();
$idU = $_REQUEST['idU'];
$sql = "SELECT * FROM usuarios WHERE id = $idU";
$res = mysql_query($sql, $con);
$nombre = mysql_result($res, 0, "nombre") . ' ' . mysql_result($res, 0, "apellidos");
$email = mysql_result($res, 0, "email");
$domicilio = mysql_result($res, 0, "domicilio");
$telefono = mysql_result($res, 0, "telefono");

echo "<html>
	    	<head>
	    		<title>Usuarios</title>
	    	</head>
	    	
			<body>
			<h2 class=\"sub-header\"><div>Usuarios | Ver Usuario</div></h2>			
			<a id='ver_usuario' href=\"#\"><h4>Lista De Usuarios</h4></a>
			
			<div class=\"table-responsive\">
				<table class=\"table table-striped\" >
					<thead>
		                <tr>
		                  <th><div>Nombre</div></th>
		                  <th><div>Email</div></th>
		                  <th><div>Direccion</div></th>
		                  <th><div>Numero</div></th>		                  
		                </tr>
		              </thead>		
				<tbody>
				
				<tr id='fila$idU'>
                  <td><div>$nombre</div></td>
                  <td><div>$email</div></td>
                  <td><div>$domicilio</div></td>
                  <td><div>$telefono</div></td>
                 </tr>
       		</tbody>
			</table>
			</div>
			</body>
			
			
			
			
		</html>
		<script>
			$(document).ready(function() {
				$('#ver_usuario').click(function() {
					$('#contenido').load('usuario_lista.php');
				});
			});
		</script>
		
		";
?>
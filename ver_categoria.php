<?php

require "./Funciones/funcion.php";
$con = conecta();
$idC = $_REQUEST['idC'];
$sql = "SELECT * FROM categorias WHERE id = $idC";
$res = mysql_query($sql, $con);
$nombre = mysql_result($res, 0, "nombre");


echo "<html>
	    	<head>
	    		<title>Practica 08/10/14 Jesus Alberto Ley Ayon</title>
		 		<script src=\"jquery-1.7.2.js\"></script>
	    	</head>
	    	
			<body>
			
			<h2 class=\"sub-header\"><div>Categorias | Ver Categoria</div></h2>
			<a id='ver_cat' href=\"#\"><h4>Lista De Categorias</h4></a>
	
			<div class=\"table-responsive\">
				<table class=\"table table-striped\" >
					<thead>
	                <tr>
	                  <th>Nombre</th>
	                  
	                </tr>
	             	</thead>
	             	<tbody>						
						<tr id='fila$idC'>
			         	 <td><div>$nombre</div></td>
			          	</tr>
				 </tbody>
				</table>
				</div>
			</body>
			
			
			
			
		</html>
		<script>

		$(document).ready(function() {
			$('#ver_cat').click(function() {
				$('#contenido').load('categoria_lista.php');
			});

		});
		</script>
		
		";
		
		
?>
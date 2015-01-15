<?php
    require_once "../Funciones/funcion.php";
 	$con = conecta();
	
	$sql = "SELECT * FROM productos WHERE activado = 1 and eliminado = 0 ORDER BY categoria";
	$res = mysql_query($sql,$con);
	$num = mysql_num_rows($res);
	
	///////////
	
	$sql2 = "SELECT * FROM categorias WHERE activado = 1 and eliminado = 0";
	$res2 = mysql_query($sql2, $con);
	$num2 = mysql_num_rows($res2);
	///////////
	
	echo"
	<head>
		<title>Practica 08/10/14 Jesus Alberto Ley Ayon</title>
		<script src=\"jquery-1.7.2.js\"></script>
	</head>

	<body>
		
		<h2 class=\"sub-header\"><div>Catalogo</div></h2>
		<div class=\"row container\" id=\"catalogo\">
			<div class=\"span4 offset4\">
				<select name=\"categoria\" id=\"categoria\" onchange='ordenar(this);'>
				<option value=\"0\">Selecciona una categoria</option>";
				
				for ($i = 0; $i < $num2; $i++) {
					$idC = mysql_result($res2, $i, "id");
					$nombre = mysql_result($res2, $i, "nombre");
					echo "
					<option value=\"$idC\">$nombre</option>
					";
				}
			echo"
				</select>
				<div class=\"container\" id=\"contcatalogo\">
				<div class=\"row marketing\" id=\"destacados\">
			      	";
			      	
			      		for($i = 0; $i < $num;$i++){
			      			$idP = mysql_result($res,$i,"id");
							$nombre= mysql_result($res,$i,"nombre");
							$precio = mysql_result($res,$i,"precio"); 
							$imagen = mysql_result($res, $i,"imagen_preview");
							$categoriaprod = mysql_result($res,$i,"categoria");
							echo"
							<div class=\"col-lg-4 categoria$categoriaprod\" id='prod$idP'>
								<img src=\"prod/$imagen\" alt=\"\" width='100' height='100'>
								<h4>$nombre</h4>
								<p>$$precio</p>
								<a href='#' onclick='ver($idP); return false;'>Ver mas</a>
							</div>";
						}
		      	echo"
        		
      		</div>
		</div>
			
			
			
			
			
				<div id=\"mensaje\"></div>
			</div>
		</div>
	</body>
	
		<script>
			$(document).ready(function() {
				$('#ver_producto').click(function() {
					$('#contenido').load('contenido/catalogo.php');
				});
			});
			
			
			function ordenar(categoria) {
				var cat = $(categoria).val();
				var categoria = 'categoria'+cat;
				if(cat!=''){
					$('#destacados').children().hide();
					$('.'+categoria).show();
				}else{}
					
				
				
			}
			
			
			
			
		</script>
	
	
	";
	
	
?>
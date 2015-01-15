<?php
    require_once "./Funciones/funcion.php";
 	$con = conecta();
	
	$sql = "SELECT * FROM productos WHERE activado = 1 and eliminado = 0";
	$res = mysql_query($sql,$con);
	$num = mysql_num_rows($res);
	
	
	
	echo "<head>
		  <title>Productos Jesus Alberto Ley Ayon</title>
		  <script src=\"jquery-1.7.2.js\"></script>
	      </head>";
	
	echo"<h2 class=\"sub-header\">Productos | Listado</h2>
		<a id='producto_lista' href=\"#\"><h4>Nuevo Producto</h4></a>
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
                  <th colspan='3'>Acciones</th>
                </tr>
              </thead>
              <tbody>";

		for($i = 0; $i < $num;$i++){
			$idP	= mysql_result($res,$i,"id");
			$nombre = mysql_result($res, $i,"nombre");
			$imagen = mysql_result($res,$i,"imagen_preview");
			$precio = mysql_result($res, $i,"precio");
			///////////
			$categoriaid = mysql_result($res, $i,"categoria");
			$sql2 = "SELECT * FROM categorias WHERE id = $categoriaid	";
			$res2 = mysql_query($sql2,$con);
			$categoria = mysql_result($res2, 0,"nombre");
			///////////
			
			$stock = mysql_result($res, $i,"stock");
			$destacado = mysql_result($res, $i,"destacado");
			if($destacado==1){
				$dest='Si';
			}
			else{
				$dest='No';
			}
		
		echo "
		
		<tr id='fila$idP'>
			<td><div>$nombre</div></td>
			<td><div><img width='100' height='100'src='prod/$imagen'/></div></td>
			<td><div>$precio</div></td>
			<td><div>$categoria</div></td>
			<td><div>$stock</div></td>
			<td><div>$dest</div></td>
			<td><div><a id='ver_prod' href=\"#\" onclick='ver($idP); return false;'>Ver</a></div></td>
			<td><div><a id='editar_prod' href=\"#\" onclick='editar($idP); return false;'>Editar</a></div></td>
			<td><div><a href=\"javascript:void(0);\" onclick='elimina($idP); return false;' target=\"_blank\">Eliminar</a></div></td>	
		</tr>
		";
	}
	echo"</tbody>
		</table>
		</div>";
 
	echo "<script src=\"jquery-1.7.2.js\"></script>
			<script>
				function elimina(id){
				if(confirm(\"Desea Eliminar el Registro?\")){
					$.ajax({
						url		: 'elimina_producto.php',
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
					$('#contenido').load(\"editar_producto.php?idP=\"+id+\"\");
				}
				
				function ver(id){
					$('#contenido').load(\"ver_producto.php?idP=\"+id+\"\");
				}
				
				$(document).ready(function() {
					$('#producto_lista').click(function() {
						$('#contenido').load('formulario_producto.php');
					});
					
				
					
					
				
				});
				
				
		</script>";
		
?>
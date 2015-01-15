<?php
    require_once "../Funciones/funcion.php";
 	$con = conecta();
	session_start();
	$idU = $_SESSION['id_usuario'];
	
	$sql = "SELECT prod.id as idprod,prod.nombre,prod.precio,prod.stock,ped.id as idped,ped.cantidad FROM productos prod JOIN pedidos_items ped ON prod.id = ped.id_producto AND id_usuario = $idU AND id_pedido = 0 ORDER BY ped.id";
	$res = mysql_query($sql,$con);
	$num = mysql_num_rows($res);
	$grantotal = 0;
	
	
		echo"<h2 class=\"sub-header\">Carrito de Compras</h2>
		<h4 class=\"sub-header\">Carrito Paso 2 de 2</h4>
		<h4 class=\"sub-header\">Productos</h4>
		<div class=\"table-responsive\" id='tablacarrito'>
		<table class=\"table table-striped\" >
              <tbody>";
			  if($num==0){
			  	echo "<div><h4>No tienes ningun producto en el carrito</h4></div>";
			  }
			 
			  else{
				  	for($i = 0; $i < $num;$i++){
				  		$idPedItem = mysql_result($res,$i,"idped");
						$idProd = mysql_result($res,$i,"idprod");
						$nombre = mysql_result($res,$i,"nombre");
						$precio = mysql_result($res,$i,"precio");
						$cantidad = mysql_result($res,$i,"cantidad");
						$stock = mysql_result($res,$i,"stock");
						$total = $precio * $cantidad;						
						$grantotal += $total;
						echo"
						<tr id='fila$idPedItem'>
		                  <td><div>$nombre</div></td>
		                  <td>
		                  <div>$cantidad</div>	
		                  </td>
		                  <td><div id='total$idPedItem'>$ $total</div></td>		                  
		                </tr>
						";
				  } 
			  }
			  
			  
			  echo"
              	<tr id='grantotal'>
              		<td colspan='2'><h4>Total a pagar<h4></td>
              		<td><h4>$ $grantotal</h4></td>
              	</tr>
              </tbody>
		</table>
		</div>
		<div id='mensaje'></div>
		
		<div class='row'>
			<div class='col-lg-1 col-lg-offset-9'>
				<form><input type='button' id='pagar' name='pagar' value='Pagar' onclick='queonda($idU); return false;'/></form>
			</div>
		</div>
		
		";
	
	
	
	echo "<script src=\"jquery-1.7.2.js\"></script>
			<script>
			
				function queonda(idU){
					if(confirm(\"Desea Ordenar Los Productos?\")){
							$.ajax({
								url		: 'contenido/pagar.php',
								type	: 'post',
								dataType: 'text',
								data	: 'idU='+idU,
								success : function(res){
									if(res==1){
										$('#mensaje').html('Se han encargado los productos');
										$('#tablacarrito').remove();
										$('#pagar').hide();
										
									}else{
										$('#mensaje').html('Error en el pago');
									}														
								},error: function(){
									//alert('No se encontro el archivo');
								}
							})
						}
				}
				
				
		</script>";
?>
<?php
    require_once "../Funciones/funcion.php";
 	$con = conecta();
	session_start();
	$idU = $_SESSION['id_usuario'];
	
	$sql = "SELECT prod.id as idprod,prod.nombre,prod.precio,prod.stock,ped.id as idped,ped.cantidad FROM productos prod JOIN pedidos_items ped ON prod.id = ped.id_producto AND id_usuario = $idU AND id_pedido = 0 ORDER BY ped.id";
	$res = mysql_query($sql,$con);
	$num = mysql_num_rows($res);
	
	
	
		echo"<h2 class=\"sub-header\">Carrito de Compras</h2>
		<h4 class=\"sub-header\">Carrito Paso 1 de 2</h4>
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
						echo "
						<tr id='fila$idPedItem'>
						  <td><div><a href=\"javascript:void(0);\" onclick='elimina($idPedItem,$idProd,$idU); return false;' target=\"_blank\">Eliminar</a></div></td>
		                  <td><div>$nombre</div></td>
		                  <td><form id='formcarrito'>
		                  	<input type=\"text\" name=\"cantidad\" id=\"cantidad$idPedItem\" required=\"required\" value=\"$cantidad\" onkeypress=\"return validarint(event);\"/ >
		                  </form></td>
		                  <td><div id='total$idPedItem'>$ $total</div></td>
		                 <td><input type=\"button\" name=\"actualizar\" id=\"actualizar\" value=\"Actualizar\" onclick=\"actualizarProducto($idPedItem,$idProd,$precio,$stock,$idU); return false;\" /></td>
		                  
		                </tr>
						";
				  } 
			  }
			  
			  
			  echo"
              	
              </tbody>
		</table>
		</div>
		<div id='mensaje'></div>";
		if($num!=0){
			echo"
			<div class='row'>
				<div class='col-lg-1 col-lg-offset-9'>
					<form><input type='button' id='siguiente' name='siguiente' value='Siguiente' /></form>
				</div>
			</div>
		
		";
		}
		
	
	
	
	echo "<script src=\"jquery-1.7.2.js\"></script>
			<script>
			
				function elimina(idPed,id,idU){
					
					if(confirm(\"Desea Eliminar el Producto?\")){
						$.ajax({
							url		: 'contenido/eliminadelcarrito.php',
							type	: 'post',
							dataType: 'text',
							data	: 'id='+id+'&idU='+idU,
							success : function(res){
									$('#fila'+idPed).hide();								
							},error: function(){
								//alert('No se encontro el archivo');
							}
						})
					}
				}
				
				function actualizarProducto(idPed,idProd,precio,stock,idU){
					var cant = $('#cantidad'+idPed).val();
					if(cant == '' || cant < 0){
						$('#mensaje').html('Cantidad no valida por favor cambiela');
					}else{
						if(cant > stock){
							$('#mensaje').html('No hay suficientes productos');
						}else{
							if(confirm(\"Desea Actualizar el Producto?\")){
								$.ajax({
									url		: 'contenido/actualizacarrito.php',
									type	: 'post',
									dataType: 'text',
									data	: 'idPed='+idPed+'&idU='+idU+'&idProd='+idProd+'&cantidad='+cant,
									success : function(res){
										if(res==1){
											var total = cant * precio;
											$('#cantidad'+idPed).val(cant);
											$('#total'+idPed).html('$ '+total);
											$('#mensaje').html('Se ha actualizado con exito');
										}else{
											$('#mensaje').html('Error al actualizar');
										}														
									},error: function(){
										//alert('No se encontro el archivo');
									}
								})
							}
						}
					}
				}
				
				
				function validarint(evento) {
					//propiedad which regresa cual tecla o boton de raton fue presionada
					evento = (evento) ? evento : window.event;
				    var charCode = (evento.which) ? evento.which : evt.keyCode;
				    if (charCode > 31 && (charCode < 48 || charCode > 57) ) {
				        return false;
				    }
				    return true;
				}
				
				$(document).ready(function() {
			
				$('#siguiente').click(function(){
					$('#contenido').load('contenido/siguiente.php');
				})
				});
				
				
		</script>";
	
?>
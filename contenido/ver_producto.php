<?php
    require "../Funciones/funcion.php";
	session_start();
$con = conecta();
$idU = $_SESSION['id_usuario'];
$idP = $_REQUEST['idP'];
$sql = "SELECT * FROM productos WHERE id = $idP";
$res = mysql_query($sql, $con);
$nombre = mysql_result($res, 0, "nombre");
$descripcion = mysql_result($res,0,"descripcion");
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
			<h2 class=\"sub-header\"><div>Detalle de Producto</div></h2>
			
			<a id='ver_producto' href=\"#\"><h4>Catalogo</h4></a>
		
			<div class=\"container row\">
					
					<div class=\"col-lg-4\" id='prod$idP'>
							<img src=\"prod/$imagen\" alt=\"\" width='200' height='200'>							
					</div>
					<div class=\"col-lg-4\">
							<h4>Nombre del Producto</h4>
							<p>$nombre</p>
							<h4>Descripcion</h4>
							<p>$descripcion</p>
							<h4>Precio</h4>
							<p>$$precio</p>
							<h4>Disponible</h4>
							<p>$stock</p>							
					</div>";
					if(!isset($_SESSION['id_usuario'])){
						
						echo"<div class=\"col-lg-4\">
							<p>Si desea comprar nuestros productos por favor inicie sesion o registrese en la pagina</p>
						</div>";
					}
					else{
					echo"
					<div class=\"col-lg-4\">
						<form name=\"formulario\"  method=\"post\" action=\"\" >
							<label for='cant' >Cantidad</label>
							<input type='number' name='cant' id='cant' value='1' onkeypress='return validarint(event);' />
							<input type='button' name='carrito' id='carrito' value='Agregar a Carrito' onclick='agregarProd($idP,$idU); return false;'/>
						</form>
						<div id='mensaje'>
						</div>
					</div>";}
					echo"
			</div>
	</body>
			
			
			
			
		</html>
		<script>
			$(document).ready(function() {
				$('#ver_producto').click(function() {
					$('#contenido').load('contenido/catalogo.php');
				});
			});
			
			
			function validarint(evento) {
				//propiedad which regresa cual tecla o boton de raton fue presionada
				evento = (evento) ? evento : window.event;
			    var charCode = (evento.which) ? evento.which : evt.keyCode;
			    if (charCode > 31 && (charCode < 48 || charCode > 57) ) {
			        return false;
			    }
			    return true;
			}
			
			function agregarProd(idP,idU){
				cant = $('#cant').val();
				if(cant <= 0){
					$('#mensaje').html('Cantidad invalida');
				}
				else{
					if($stock<cant){
						$('#mensaje').html('No hay tantos productos disponibles');
					}else{
						$.ajax({
								url		: 'contenido/agregaCarrito.php',
								type	: 'post',
								dataType: 'text',
								data	: 'idP='+idP+'&idU='+idU+'&cantidad='+cant,
								success : function(res){
								if(res == 1){
									$('#mensaje').html('Producto agregado al carrito');
									
								}
								else{
									$('#mensaje').html('No se pudo agregar al carro');
									
								}
								},error: function(){
									$('#mensaje').html('Error en el archivo');
								}
						})
					}
				}
				
			}
			
			
			
		</script>
		";
?>
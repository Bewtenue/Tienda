<?php
require_once "./Funciones/funcion.php";
$con = conecta();
$idP = $_REQUEST['idP'];
$sql = "SELECT * FROM productos WHERE id = $idP";
$res = mysql_query($sql, $con);
$res = mysql_query($sql, $con);
$nombre = mysql_result($res, 0, "nombre");
$codigo = mysql_result($res, 0, "codigo");
$imagen = mysql_result($res, 0, "imagen_preview");
$imagen_detalle = mysql_result($res, 0, "imagen_detalle");
$descripcion = mysql_result($res, 0, "descripcion");
$precio = mysql_result($res, 0, "precio");
$categoria = mysql_result($res, 0, "categoria");
$stock = mysql_result($res, 0, "stock");
$destacado = mysql_result($res, 0, "destacado");
if ($destacado == 1) {
	$dest = 'Si';
} else {
	$dest = 'No';
}

$sql2 = "SELECT * FROM categorias WHERE activado = 1 and eliminado = 0";
$res2 = mysql_query($sql2, $con);
$num2 = mysql_num_rows($res2);

$sql3 = "SELECT * FROM categorias WHERE id =$categoria ";
$res3 = mysql_query($sql3, $con);
$num3 = mysql_num_rows($res3);

$nomcategoria = mysql_result($res3, 0, "nombre");

echo "<html>
	<head>
		<title>Practica 08/10/14 Jesus Alberto Ley Ayon</title>		
		<script src=\"jquery-1.7.2.js\"></script>
	</head>
	
	<body >
	<h2 class=\"sub-header\"><div>Producto | Editar</div></h2>
		
		<a id='edit_prod' href=\"#\"><h4>Lista Producto</h4></a>
		<form name=\"formlulario\" id=\"formedit\" method=\"post\" action=\"\" enctype=\"multipart/form-data\" >
			<label for=\"nombre\">Nombre</label>
			<input type=\"text\" name=\"nombre\" id=\"nombre\" required=\"required\" value=\"$nombre\"/ >
			<br />
			<label for=\"codigo\">Codigo</label>
			<input type=\"text\" name=\"codigo\" id=\"codigo\" required=\"required\" value=\"$codigo\"/>
			<br />
			<label for=\"imagen\">Imagen Preview</label>
			<div id=\"imgmuestra\"></div>
			<img id=\"primeraimg\" src=\"prod/$imagen\" width=\"100\" height=\"100\" alt=\"No tienes ninguna imagen\">
			<input type=\"file\" name=\"imagen\" id=\"imagen\" accept=\"image/*\"  onchange=\"previsualizar(this.files);\" />
			<br />
			<label for=\"imagen_detalle\">Detalle de Imagen</label>
			<div id=\"imgmuestra2\"></div>
			<img id=\"segundaimg\" src=\"prod/$imagen_detalle\" width=\"100\" height=\"100\" alt=\"No tienes ninguna imagen\">
			<input type=\"file\" name=\"imagen_detalle\" id=\"imagen_detalle\" accept=\"image/*\"  onchange=\"previsualizar2(this.files);\" / >
			<br />
			<label for=\"descripcion\">Descripcion</label>
			
			<input type=\"\" name=\"descripcion\" id=\"descripcion\" required=\"required\" value=\"$descripcion\"/ >
			<br />
			<label for=\"precio\">Precio</label>
			<input type=\"text\" name=\"precio\" id=\"precio\" required=\"required\" value=\"$precio\" onkeypress=\"return validardouble(event);\"/ >
			<br />
			<label for=\"categoria\">Categoria</label>
			<select name=\"categoria\" id=\"categoria\">
				<option value=\"0\"></option>";
			for ($i = 0; $i < $num2; $i++) {
				$idC = mysql_result($res2, $i, "id");
				$nombreC = mysql_result($res2, $i, "nombre");
				echo "<option value=\"$idC\" ";if($nomcategoria==$nombreC)echo"selected";echo">$nombreC</option>";
			}
			echo "
			</select><br />
			<label for=\"stock\">Stock</label>
			<input type=\"text\" name=\"stock\" id=\"stock\" required=\"required\" value=\"$stock\" onkeypress=\"return validarint(event);\"/ >
			<br />
			<label for=\"destacado\">Destacado</label>
			<select name=\"destacado\" id=\"destacado\" >
				<option value=\"\"></option>
				<option value=\"1\" ";if($destacado==1)echo"selected";echo">Si</option>
				<option value=\"0\" ";if($destacado==0)echo"selected";echo">No</option>
			
			</select><br />
			<input type=\"button\" name=\"editar\" id=\"editar\" value=\"Editar\" onclick=\"editarProducto($idP); return false;\" /><br />
			<br />

		</form>
		<div id =\"mensaje\"></div>
		
	</body>
	
	
	
	
			<script>
				var bandera;
				
				
				
				function editarProducto(id){
					
						var nombre = $('#nombre').val();
						var codigo = $('#codigo').val();
						var inputFileImage = document.getElementById('imagen');
						var imagen = inputFileImage.files[0];
						var inputFileImage2 = document.getElementById('imagen_detalle');
						var imagen_detalle = inputFileImage2.files[0];
						var descripcion = $('#descripcion').val();
						var precio = $('#precio').val();
						var categoria = $('#categoria').val();
						var stock = $('#stock').val();
						var destacado = $('#destacado').val();
						
						//alert(imagen_detalle+' '+descripcion+' '+precio+' '+categoria+' '+stock+' '+destacado );
						
						var data = new FormData();
						data.append('id',id);
						data.append('nombre',nombre);
						data.append('codigo',codigo);
						data.append('imagen',imagen);
						data.append('imagen_detalle',imagen_detalle);
						data.append('descripcion',descripcion);
						data.append('precio',precio);
						data.append('categoria',categoria);
						data.append('stock',stock);
						data.append('destacado',destacado);
							if(confirm('Desea Editar el Registro?')){
								$.ajax({
									url		: 'edit_prod.php',
									type	: 'post',
									contentType: false,
									data	: data,
									processData: false,
									cache   : false,
									success : function(res){
										if(res == 1){
											$('#mensaje').html('Editado completo');	
										}
										else{
											$('#mensaje').html('Fallo la edicion');
											$('#mensaje').html(res);
										}
									},error: function(){
										$('#mensaje').html('Error al editar');
									}
								})
							}
				}
				
				function previsualizar(files){
					$('#imgmuestra').hide();
				    var file = files[0];
				    var imageType = /image.*/;
				    var img = document.createElement('img');
				    img.classList.add('obj');
				    $(img).attr('height',100);
				    $(img).attr('width',100);
				    img.file = file;
					$('#imgmuestra').empty();
				    imgmuestra.appendChild(img);
					   
				    var reader = new FileReader();
				    reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
				    reader.readAsDataURL(file);
					$('#imgmuestra').show();
					$('#primeraimg').hide();
					
					
				}
				
				function previsualizar2(files){
					$('#imgmuestra2').hide();
				    var file = files[0];
				    var imageType = /image.*/;
				    var img = document.createElement('img');
				    img.classList.add('obj');
				    $(img).attr('height',100);
				    $(img).attr('width',100);
				    img.file = file;
					$('#imgmuestra2').empty();
				    imgmuestra2.appendChild(img);
					   
				    var reader = new FileReader();
				    reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
				    reader.readAsDataURL(file);
					$('#imgmuestra2').show();
					$('#segundaimg').hide();
				}
				
				
				function desaparece(){
					$('#imgmuestra').hide();
				}
				function desaparece2(){
					$('#imgmuestra2').hide();
				}
				
		function validardouble(evento) {
			//propiedad which regresa cual tecla o boton de raton fue presionada
			evento = (evento) ? evento : window.event;
		    var charCode = (evento.which) ? evento.which : evt.keyCode;
		    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode !=46)) {
		        return false;
		    }
		    return true;
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
					$('#edit_prod').click(function() {
						$('#contenido').load('producto_lista.php');
					});
				});
				
		</script>
	
	
</html>";
?>
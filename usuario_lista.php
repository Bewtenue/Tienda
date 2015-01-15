<?php
    require_once "./Funciones/funcion.php";
 	$con = conecta();
	
	$sql = "SELECT * FROM usuarios WHERE activado = 1 and eliminado = 0";
	$res = mysql_query($sql,$con);
	$num = mysql_num_rows($res);
	
	
	
	echo "<head>
		  <title>Usuarios Jesus Alberto Ley Ayon</title>
		  <script src=\"jquery-1.7.2.js\"></script>
	      </head>";
	
	echo"
		<h2 class=\"sub-header\"><div>Usuarios | Listado</div></h2>
		
		<a id='usuario_lista' href=\"#\"><h4>Nuevo Usuario</h4></a>
		
		<div class=\"table-responsive\">
		<table class=\"table table-striped\" >
			<thead>
                <tr>
                  <th><div>Nombre</div></th>
                  <th><div>Email</div></th>
                  <th><div>Direccion</div></th>
                  <th><div>Numero</div></th>                
                  <th colspan='3'>Acciones</th>
                </tr>
              </thead>		
		<tbody>";
	
	
	for($i = 0; $i < $num;$i++){
		$idU	= mysql_result($res,$i,"id");
		$nombre = mysql_result($res, $i,"nombre");
		$email = mysql_result($res, $i,"email");
		$domicilio = mysql_result($res, $i,"domicilio");
		$telefono = mysql_result($res, $i,"telefono");
		
		echo "
		<tr id='fila$idU'>
                  <td><div>$nombre</div></td>
                  <td><div>$email</div></td>
                  <td><div>$domicilio</div></td>
                  <td><div>$telefono</div></td>             
                  <td><div><a id='ver_usuario' href=\"#\" onclick='ver($idU); return false;'>Ver</a></div></td>
                  <td><div><a id='editar_usuario' href=\"#\" onclick='editar($idU); return false;'>Editar</a></div></td>
                  <td><div><a href=\"javascript:void(0);\" onclick='elimina($idU); return false;' target=\"_blank\">Eliminar</a></div></td>
        </tr>
		
		";
	} 

	echo "
		</tbody>
		</table>
		</div>
	
	<script src=\"jquery-1.7.2.js\"></script>
			<script>
				function elimina(id){
				if(confirm(\"Desea Eliminar el Registro?\")){
					$.ajax({
						url		: 'elimina_usuario.php',
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
					$('#contenido').load(\"editar_usuario.php?idU=\"+id+\"\");
				}
				
				function ver(id){
					$('#contenido').load(\"ver_usuario.php?idU=\"+id+\"\");
				}
				
				$(document).ready(function() {
					$('#usuario_lista').click(function() {
						$('#contenido').load('formulario_usuario.php');
					});
					
				
					
					
				
				});
				
				
		</script>";
		
?>
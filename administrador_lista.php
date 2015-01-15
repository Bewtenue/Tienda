<?php
    require_once "./Funciones/funcion.php";
 	$con = conecta();
	
	$sql = "SELECT * FROM administradores WHERE activo = 1 and eliminado = 0";
	$res = mysql_query($sql,$con);
	$num = mysql_num_rows($res);
	
	echo "<head>
		  <title>Practica 08/10/14 Jesus Alberto Ley Ayon</title>
		  <script src=\"jquery-1.7.2.js\"></script>
	      </head>";
	
	echo"<h2 class=\"sub-header\">Administradores | Listado</h2>
		<a id='admin_lista' href=\"#\"><h4>Nuevo Administrador</h4></a>
		
		<div class=\"table-responsive\">
		<table class=\"table table-striped\" >
			<thead>
                <tr>
                  <th>Nombre</th>
                  <th colspan='3'>Acciones</th>
                </tr>
              </thead>
              <tbody>";
			  for($i = 0; $i < $num;$i++){
				$idA	= mysql_result($res,$i,"id");
				$nombre = mysql_result($res, $i,"nombre").' '.mysql_result($res,$i,"apellidos");
				echo "
				<tr id='fila$idA'>
                  <td><div>$nombre</div></td>
                  <td><div><a href=\"#\" onclick='ver($idA); return false;'>Ver</a></div></td>
                  <td><div><a href=\"#\" onclick='editar($idA); return false;'>Editar</a></div></td>
                  <td><div><a href=\"javascript:void(0);\" onclick='elimina($idA); return false;' target=\"_blank\">Eliminar</a></div></td>
                </tr>
				";
			  } 
			  
			  echo"
              	
              </tbody>
		</table>
		</div>
		";
	
	
	
	echo "<script src=\"jquery-1.7.2.js\"></script>
			<script>
				function elimina(id){
					if(confirm(\"Desea Eliminar el Registro?\")){
						$.ajax({
							url		: 'elimina_admin.php',
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
					$('#contenido').load(\"editar_admin.php?idA=\"+id+\"\");
				}
				
				function ver(id){
					$('#contenido').load(\"ver_admin.php?idA=\"+id+\"\");
				}
				
				$(document).ready(function() {
					$('#admin_lista').click(function() {
						$('#contenido').load('formulario_admin.html');
					});

				});
				
				
		</script>";
		
?>
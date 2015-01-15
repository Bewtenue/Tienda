<?php
	
    require_once "./Funciones/funcion.php";
	$con = conecta();
	$id = $_REQUEST['id'];
	$nombre = $_REQUEST['nombre'];
		
	$sql = "UPDATE categorias SET nombre = '$nombre'  WHERE id = $id ";
	$res = mysql_query($sql,$con);
	if($res){
		echo "1";
	}
	else {
		echo "0";
	}		
	

	//echo "$id, $nombre, $apellido, $email";
?>

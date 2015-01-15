<?php
	
    require_once "./Funciones/funcion.php";
	$con = conecta();
	$id = $_REQUEST['id'];
	$nombre = $_REQUEST['nombre'];
	$apellido = $_REQUEST['apellido'];
	$email = $_REQUEST['email'];
	$domicilio = $_REQUEST['domicilio'];
	$telefono = $_REQUEST['telefono'];
		
		$sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellido', email = '$email',domicilio = '$domicilio',telefono = '$telefono'  WHERE id = $id ";
		$res = mysql_query($sql,$con);
		if($res){
			echo "1";
		}
		else {
			echo "0";
		}		


	//echo "$id, $nombre, $apellido, $email";
?>
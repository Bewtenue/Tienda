<?php
   require_once "./Funciones/funcion.php";
	$con = conecta();
	
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$pass = md5($_POST['pass']);
	//$imagen = $_POST['imagen'];
	//////para añadir archivos/////////tarea agregar que solo sean imagenes .jpg usando javascript
	$fileName1	= '';
	$dir		= "stuff/";
	
	$img_n		= $_FILES['imagen']['name'];
	$img_f		= $_FILES['imagen']['tmp_name'];
	
	$val		= md5_file($img_f);
	$len		= strlen($img_n);
	$ini		= $len - 3;
	$ext		=substr($img_n,$ini,3);
	
	//sube imagen
	if ($img_n != '') {
		$fileName1 = $val.".$ext";
		@copy($img_f, $dir.$fileName1);
	}	
	
	/////////////////////////////////////
	$imagen		= $fileName1;
	
	
	$sql = "INSERT INTO administradores (nombre,apellidos,email,pass,imagen)VALUES ('$nombre','$apellido','$email','$pass','$imagen')";
	$res = mysql_query($sql,$con);
	
	var_dump($res);
	
	header("Location: principal.php");
?>
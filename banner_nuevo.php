<?php
   require_once "./Funciones/funcion.php";
	$con = conecta();
	
	$nombre = $_POST['nombre'];
	//////para añadir archivos/////////tarea agregar que solo sean imagenes .jpg usando javascript
	$fileName1	= '';
	$dir		= "banners/";
	
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
	
	
	$sql = "INSERT INTO banners (nombre,imagen)VALUES ('$nombre','$imagen')";
	$res = mysql_query($sql,$con);
	
	var_dump($res);
	
	header("Location: principal.php");
?>
<?php
	
    require_once "./Funciones/funcion.php";
	$con = conecta();
	$id = $_REQUEST['id'];
	$nombre = $_REQUEST['nombre'];
	$apellido = $_REQUEST['apellido'];
	$email = $_REQUEST['email'];

	//$imagen = $_POST['imagen'];
	//////para añadir archivos/////////tarea agregar que solo sean imagenes .jpg usando javascript
	if(!isset($_FILES['imagen'])){
		$imagen = '';
		$sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellido', email = '$email'  WHERE id = $id ";
		$res = mysql_query($sql,$con);
		if($res){
			//echo "1";
		}
		else {
			//echo "0";
		}		
	}
	else{
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
		
		
		$sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellido', email = '$email',imagen = '$imagen'  WHERE id = $id ";
		$res = mysql_query($sql,$con);
		if($res){
			echo "1";
		}
		else {
			echo "0";
		}		
	}
	//var_dump($imagen);
	//echo "$id, $nombre, $apellido, $email";
?>

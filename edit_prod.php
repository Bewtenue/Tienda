<?php
	
    require_once "./Funciones/funcion.php";
	$con = conecta();
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$codigo = $_POST['codigo'];
	//$imagen_detalle = $_POST['imagen_detalle'];
	$descripcion = $_POST['descripcion'];
	$precio = $_POST['precio'];
	$categoria = $_POST['categoria'];
	$stock = $_POST['stock'];
	if (isset($_POST['destacado'])) {
		$destacado=$_POST['destacado'];
	}
	else{
		$destacado=0;
	}
	
	
	//$imagen = $_POST['imagen'];
	//////para añadir archivos/////////tarea agregar que solo sean imagenes .jpg usando javascript
	if(!isset($_FILES['imagen'])){
		if (!isset($_FILES['imagen_detalle'])) {
			$imagen = '';
			$image_detalle = '';
			$sql = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo',descripcion = '$descripcion',precio = '$precio', categoria = '$categoria',stock = '$stock', destacado = '$destacado' WHERE id = $id ";
			$res = mysql_query($sql,$con);
			if($res){
				echo "1";
				
			}
			else {
				echo "0";
				
			}
		}
		else{
			$imagen = '';
			$fileName1	= '';
			$dir		= "prod/";
			
			$img_n		= $_FILES['imagen_detalle']['name'];
			$img_f		= $_FILES['imagen_detalle']['tmp_name'];
			
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
			$imagen_detalle		= $fileName1;
			$sql = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo', imagen_detalle = '$imagen_detalle',descripcion = '$descripcion',precio = $precio, categoria = $categoria,stock = $stock, destacado = $destacado WHERE id = $id ";
			$res = mysql_query($sql,$con);
			if($res){
				echo "1";
				
				}
			else {
				echo "0";
				
			}
		}
	}
	else{
		if (!isset($_FILES['imagen_detalle'])){
			$imagen_detalle = '';
			$fileName1	= '';
			$dir		= "prod/";
			
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
			
			$sql = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo',imagen_preview = '$imagen',descripcion = '$descripcion',precio = $precio, categoria = $categoria,stock = $stock, destacado = $destacado WHERE id = $id ";
			$res = mysql_query($sql,$con);
			if($res){
				echo "1";
				
				}
			else {
				echo "0";
				
				}
			}
		else{
			//imagen
			$fileName1	= '';
			$dir		= "prod/";
			
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
			
			//imagen detalle
			$fileName2	= '';
			$dir		= "prod/";
			
			$img_n2		= $_FILES['imagen_detalle']['name'];
			$img_f2		= $_FILES['imagen_detalle']['tmp_name'];
			
			$val2		= md5_file($img_f2);
			$len2		= strlen($img_n2);
			$ini2		= $len2 - 3;
			$ext2		=substr($img_n2,$ini2,3);
			
			//sube imagen_detalle
			if ($img_n2 != '') {
				$fileName2 = $val2.".$ext2";
				@copy($img_f2, $dir.$fileName2);
			}	
			
			/////////////////////////////////////
			
			$imagen		= $fileName1;
			$imagen_detalle		= $fileName2;
			$sql = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo',imagen_preview = '$imagen',imagen_detalle = '$imagen_detalle',descripcion = '$descripcion',precio = $precio, categoria = $categoria,stock = $stock, destacado = $destacado WHERE id = $id ";
			$res = mysql_query($sql,$con);
			if($res){
				echo "1";
				
				}
			else {
				echo "0";
				
			}
		}		
	}

	//echo "$id, $nombre, $apellido, $email";
?>

<?php
    require_once "./Funciones/funcion.php";
	$con = conecta();
	
	$nombre = $_POST['nombre'];
	
	
	$sql = "INSERT INTO categorias (nombre)VALUES ('$nombre')";
	$res = mysql_query($sql,$con);
	
	header("Location: formulario_categoria.html?agregado=1");
?>
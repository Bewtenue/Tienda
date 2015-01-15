<?php
    require_once "./Funciones/funcion.php";
	$con = conecta();
	$id = $_REQUEST['id'];
	//$imagen = $_POST['imagen'];
	
	$sql = "UPDATE banners SET eliminado = 1 WHERE id = $id";
	$res = mysql_query($sql,$con);
?>
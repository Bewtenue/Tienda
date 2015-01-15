<?php
   require_once "./Funciones/funcion.php";
	$con = conecta();
	
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$pass = md5($_POST['pass']);
	$domicilio = $_POST['domicilio'];
	$telefono = $_POST['telefono'];
	
	
	
	
	$sql = "INSERT INTO usuarios (nombre,apellidos,email,pass,domicilio,telefono)VALUES ('$nombre','$apellido','$email','$pass','$domicilio','$telefono')";
	$res = mysql_query($sql,$con);
	
	
	if(!isset($_POST['enviarusuario'])){
		header("Location: principal.php");	
	}else
		header("Location: inicio.php?exito=1");
	
	
?>
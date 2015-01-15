<?php
   require_once "../Funciones/funcion.php";
	$con = conecta();
	$id = $_REQUEST['id'];
	$idU = $_REQUEST['idU'];
	//$imagen = $_POST['imagen'];
	
	$sql = "DELETE FROM pedidos_items WHERE id_producto = $id AND id_usuario = $idU";
	$res = mysql_query($sql,$con);
	if($res){
		echo "1";
	}else{
		echo "0";
	}
?>
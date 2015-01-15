<?php
    require_once "../Funciones/funcion.php";
	$con = conecta();
	
	$idPedido = $_REQUEST['idPed'];
	$idUsuario = $_REQUEST['idU'];
	$idProducto = $_REQUEST['idProd'];
	$cantidad = $_REQUEST['cantidad'];
	
	$sql = "UPDATE pedidos_items SET cantidad = $cantidad WHERE id = $idPedido AND id_producto = $idProducto AND id_usuario = $idUsuario";
	$res = mysql_query($sql,$con);
	
	if ($res) {
		echo "1";
	}else{
		echo "0";
	}
?>
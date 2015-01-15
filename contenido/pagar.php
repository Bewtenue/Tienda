<?php
    require_once "../Funciones/funcion.php";
	$con = conecta();
	$idU = $_REQUEST['idU'];
	$fecha = date("d-m-Y");
	
	
	$sql = "INSERT INTO pedidos (fecha,usuario) VALUES ('$fecha',$idU)";
	$res = mysql_query($sql,$con);
	
	$sql2 = "SELECT * FROM pedidos WHERE usuario = $idU ORDER BY id DESC limit 1";
	$res2 = mysql_query($sql2,$con);
	
	$idPedido = mysql_result($res2,0,"id");
	
	$sql3 = "UPDATE pedidos_items SET id_pedido = $idPedido WHERE id_usuario = $idU AND id_pedido = 0";
	$res3 = mysql_query($sql3,$con);
	
	if($res3){
		echo "1";
	}else{
		echo "0";
	}
	
?>
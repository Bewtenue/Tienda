<?php
    require_once "../Funciones/funcion.php";
	$con = conecta();
	
	$idPed = 0;
	$idProd = $_REQUEST['idP'];
	$idU = $_REQUEST['idU'];
	$cant = $_REQUEST['cantidad'];
	
	$sql2 = "SELECT * FROM pedidos_items WHERE id_pedido = 0 AND id_producto = $idProd AND id_usuario = $idU ";
	$res2 = mysql_query($sql2,$con);
	$num = mysql_num_rows($res2);
	
	if($num != 0){
		$cant2 = mysql_result($res2,0, "cantidad");
		$cant3 = $cant+$cant2;
		$sql3 = "UPDATE pedidos_items SET cantidad = '$cant3' WHERE id_pedido = 0 AND id_producto = $idProd AND id_usuario = $idU";
		$res3 = mysql_query($sql3,$con);
		if($res3){
			echo "1";
			
		}else{
			echo "0";
		}
	}
	else{
		$sql = "INSERT INTO pedidos_items (id_pedido,id_producto,id_usuario,cantidad) VALUES ($idPed,$idProd,$idU,$cant)";
		$res = mysql_query($sql,$con);
		if($res){
			echo "1";
		}else{
			echo "0";
		}
	}
	
	
?>
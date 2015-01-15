<?php
   if (!isset($_REQUEST['email'])) {
        echo 2;
   }
   else{
	    require_once "./Funciones/funcion.php";
		$con = conecta();
		$email = $_REQUEST['email'];		
		if (!isset($_REQUEST['idA'])) {
			$sql = "SELECT * FROM administradores WHERE email = '$email' ";
			$res = mysql_query($sql,$con);
			$num = mysql_num_rows($res);
			
			if($num != 0){
				echo 1;
			}
			else {
				echo 0;
			}   	
		}
		else{
			$idA = $_REQUEST['idA'];
			$sql = "SELECT * FROM administradores WHERE email = '$email' AND id != $idA ";
			$res = mysql_query($sql,$con);
			$num = mysql_num_rows($res);
			
			if($num != 0){
				echo 1;
			}
			else {
				echo 0;
			}   	
		}
		
		
   }
    

?>
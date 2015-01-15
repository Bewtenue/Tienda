<?php
	/*window.location.href="principal.php"
	 * */
    session_start();
    require_once "./Funciones/funcion.php";
	$con = conecta();
	
	$user = $_REQUEST['usuario'];
	$pass = $_REQUEST['pass'];
	$pass = md5($pass);
	
	$sql = "SELECT * FROM administradores WHERE email = '$user' AND pass = '$pass' AND activo = 1 AND eliminado = 0";
	$res = mysql_query($sql,$con);
	$num = mysql_num_rows($res);
	
	if($num == 0){
		//usuario no valido
		//
		//
		echo $num;
	}else{
		$id_admin = mysql_result($res, 0,"id");
		$nom_admin = mysql_result($res,0,"nombre").' '.mysql_result($res,0,"apellidos");
		$_SESSION['id_admin']  = $id_admin;
		$_SESSION['nom_admin'] = $nom_admin;
		echo $num;
	}
	
?>
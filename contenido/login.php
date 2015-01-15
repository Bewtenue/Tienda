<?php
	/*window.location.href="principal.php"
	 * */
    session_start();
    require_once "../Funciones/funcion.php";
	$con = conecta();
	
	$user = $_REQUEST['usuario'];
	$pass = $_REQUEST['pass'];
	$pass = md5($pass);
	
	$sql = "SELECT * FROM usuarios WHERE email = '$user' AND pass = '$pass' AND activado = 1 AND eliminado = 0";
	$res = mysql_query($sql,$con);
	$num = mysql_num_rows($res);
	
	if($num == 0){
		//usuario no valido
		//
		//
		echo $num;
		
	}else{
		$id_usuario = mysql_result($res, 0,"id");
		$nom_usuario = mysql_result($res,0,"nombre").' '.mysql_result($res,0,"apellidos");
		$_SESSION['id_usuario']  = $id_usuario;
		$_SESSION['nom_usuario'] = $nom_usuario;
		echo $num;
	}
	
?>
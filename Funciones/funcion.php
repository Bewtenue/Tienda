<?php
    
    define("HOST","localhost");
	define("BD","progweb");
	define("USER_BD","root");
	define("PASS_BD","");
	
	
	/**/
	
	function conecta(){
		if(!($con = mysql_connect(HOST,USER_BD,PASS_BD))){
			echo"Error conectando al Servidor de BDD";
			exit();
		}
		
		if(!mysql_select_db(BD,$con)){
			echo"Error Seleccionando BD";
			exit();
		}
		return $con;
	}
?>
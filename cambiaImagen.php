<?php

	
    $fileName1	= '';
	$dir		= "stuff/";
	
	$img_n		= $_FILES['imagen']['name'];
	$img_f		= $_FILES['imagen']['tmp_name'];
	
	$val		= md5_file($img_f);
	$len		= strlen($img_n);
	$ini		= $len - 3;
	$ext		=substr($img_n,$ini,3);
	
	//sube imagen
	if ($img_n != '') {
		$fileName1 = $val.".$ext";
		@copy($img_f, $dir.$fileName1);
	}	
	
	
	$imagen		= $fileName1;
	
	echo $dir.$imagen;
?>
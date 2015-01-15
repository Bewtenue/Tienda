<?php
 $email    = "micorreo@mail.com";
 $headers  = "From: Sitio web <hola@mail.com>\r\n";
 $headers .= "MIME-Version: 1.0 \r\n";
 $headers .= "Content-type: text/html; charset=utf-8 \r\n";
 $subject  = "Envio de correo";
 $message  = "Hola $nombre<br>";
 mail($email,$subject,$message,$headers);	
?>
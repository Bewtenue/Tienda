<?php
   
?>


	<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Login de Administrador</title>
    
	<script src="jquery-1.7.2.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Inicio de Sesion</h2>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="login();">Iniciar Sesion</button>
      </form>
		<div id='mensaje'>
			
		</div>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>

	<script>
		function login(){
			var usuario = $('#inputEmail').val();
			var pass	= $('#inputPassword').val();
			if(usuario == '' && pass == ''){
				$('#mensaje').html('Por favor llena los campos');
			}
			else{
				if(usuario == ''){
					$('#mensaje').html('Introduce nombre de usuario');
				}
				else{
					if(pass == ''){
						$('#mensaje').html('Introduce contraseña');
					}
					else{
						$.ajax({
							url		: 'valida.php',
							type	: 'post',
							dataType: 'text',
							data	: 'usuario='+usuario+'&pass='+pass,
							success : function(res){
							if(res == 1){
								window.location.href="principal.php";
							}
							else{
								$('#mensaje').html('Error en los datos introducidos');
							}
							},error: function(){
								$('#mensaje').html('Error de login');
							}
						})
					}
				}
			}
		}
		
	</script>

</html>

<!doctype html>
<html lang="pt-br" class="bg_primary">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

	
    <title>Login LDAP</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />

  </head>

  <body class="bg_primary">

	<div class="container">

		<div class="d-flex justify-content-center h-100 basic-content">
			<div class="card fadeInDown">
				<div class="card-header"> 
					<img src="assets/images/favicon.png" id="icone"/>
					<h3>Hi-rule </h3>
				</div>
				<div class="card-body">
					<form action="assets/php/autentica.php" method="post">

						<?php  
						session_start();
						if (isset($_SESSION['message']))
						{
							echo $_SESSION['message'];
							unset($_SESSION['message']);
						}
						?>

						<div class="input-group form-group">
							<input type="text" name="username" class="form-control" 
							placeholder="usuario">		
						</div>

						<div class="input-group form-group">
							<input type="password" name="password" class="form-control" 
							placeholder="senha">
						</div>

						<div class="col-md-12">
							<div class="text-center">
								<input type="submit" value="Entrar" class="btn login_btn">
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>

</html>
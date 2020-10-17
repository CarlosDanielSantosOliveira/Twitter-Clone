<?php

	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="estilo.css">

		<script>

			//verificar se os campos de usuário e senha foram devidamente preenchidos
			$(document).ready(function(){

				$('#btn_login').click(function(){

					var campo_vazio = false; 

					if($('#campo_usuario').val() == ''){
						$('#campo_usuario').css({'border-color' : '#A94442'});
						campo_vazio = true;
					}else{
						$('#campo_usuario').css({'border-color' : '#CCC'});
					}

					if($('#campo_senha').val() == ''){
						$('#campo_senha').css({'border-color' : '#A94442'});
						campo_vazio = true;
					}else{
						$('#campo_senha').css({'border-color' : '#CCC'});
					}

					if(campo_vazio) return false;

				});

			});

		</script>
	</head>

	<body class="background">

		<!-- Static navbar -->
	    <nav class="navbar navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
			  <img src="imagens/logo.png" class="logotipo"/>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="inscrevase.php" class="btn btn_cadastro"> Cadastro </a></li>
	            <li class="<?= $erro == 1 ? 'open' : '' ?>">
	            	<a id="entrar" data-toggle="dropdown" class="btn btn_login"> Login</a>
					<ul class="dropdown-menu" aria-labelledby="Login">
						<div class="col-md-12">
				    		<p>Você possui uma conta?</h3>
				    		<br />
							<form method="post" action="validar_acesso.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								
								<center> <button type="buttom" class="btn btn-primary" id="btn_login2">Entrar</button> </center>

								<br /><br />
								
							</form>

							<?php

								if($erro == 1){
									echo '<font color="#FF0000">Usuário e ou senha inválido(s)</font>';
								}

							?>

						</form>
				  	</ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

		
	    <div class="container bem_vindo">

	      <!-- Main component for a primary marketing message or call to action -->
	       
	        <h1> <center>Bem vindo ao twitter clone </center> </h1>
	        <p> <center> Veja o que está acontecendo agora... </center> </p>
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>
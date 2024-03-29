<?php

	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>


<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Site</title>

		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
		<script>
			$(document).ready( function(){

				$('#btn_login').click(function(){

					var campo_vazio = false;

					if($('#campo_usuario').val() == ''){
						$('#campo_usuario').css({'border-color': '#A94442'});
						campo_vazio = true;
					} else {
						$('#campo_usuario').css({'border-color': '#CCC'});
					}

					if($('#campo_senha').val() == ''){
						$('#campo_senha').css({'border-color': '#A94442'});
						campo_vazio = true;
					} else {
						$('#campo_senha').css({'border-color': '#CCC'});
					}

					if(campo_vazio) return false;
				});
			});					
		</script>
	</head>
	<body>

	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="cadastro.php">Cadastra-se</a></li>
	            <li class="<?= $erro == 1 ? 'open' : '' ?>">
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Entre com a conta</h3>
				    		<br />
							<form method="post" action="validar_acesso.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								
								<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

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
	        </div>
	      </div>
	    </nav>

	    <div class="container">

	      <div class="jumbotron">
	        <h1>Bem vindo ao Site</h1>
	        <p>Site - Reinventando a Roda</p>
	      </div>
	      <div class="clearfix"></div>
		</div>
	    </div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</body>
</html>
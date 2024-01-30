<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Sine</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="./Assets/css/index.css">
  <link rel="shortcut icon" href="./Assets/img/icon.png" type="image/x-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
  <img src="./Assets/img/logo-index.png" alt="sine">
</div>
  <div class="container">
		<?php 
			$errors = array(1=>"Usuário ou senha inválidos, tente novamente",2=>"Você precisa estar logado para acessar esta área");
			$error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
            if ($error_id == 1) {
				echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                }elseif ($error_id == 2) {
                    echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                    }
        ?>  
 
	<form action="autenticacao-usuario.php" method="POST"  role="form" autocomplete="off">  
		<div class="form-group">
			<label for="email">Usuário:</label>
			<input type="text" name="username" class="form-control" placeholder="CPF" required autofocus>
		</div>
		<div class="form-group">
			<label for="pwd">Senha:</label>
			<input type="password" name="password" class="form-control" placeholder="Senha" required>
		</div>
		<button type="submit" class="btn btn-default" id="btn-index">ENTRAR</button>
		<br><br><br>
		<div class="separador">
			<span class="ou">OU</span>
		</div>
		<a class="btn btn-default" id="btn-index" href="./notificacao_anonima.php">Enviar Notificação Anônima</a>
	</form>
</div>
<footer class="rodape">
  <p class="text-footer">© 2024 ICEPES | CISNE - INSTITUTO CISNE DE ENSINO E PESQUISA. TODOS OS DIREITOS RESERVADOS.</p>
</footer>
</body>
</html>

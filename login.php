
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<title>Login BD</title>
	<script type="text/javascript">
		$(document).ready(function(){
		$("#alert").fadeOut(3000);
		});
	</script>
	<style type="text/css">
		#input {
			display: block;
		}
	</style>
</head>
<body>

<div class="container" style="text-align: center; font-size: 50px; font-family: Verdana">LOGIN</div><hr>

	<div class="col-md-4"></div>
	<div class="col-md-4">
		<form method="POST"><center>
			<label for="user">Usuário:</label>
			<input type="text" name="user" class="input-lg form-control" id="input"><br>
			<label for="user">Senha:</label>
			<input type="password" name="pass" minlength="5" class="input-lg form-control" id="input"><br><br>
			<input type="submit" value="Entrar!" class="btn btn-lg btn-info form-control" name="">
		</center></form><br>
			<a href="cadastro.php" class="glyphicon glyphicon-log-in"> Cadastrar-se!</a>
	</div>
	<div class="col-md-4"><br><br><br><br>
		<?php
		session_start();
		error_reporting(0); 
			require('config.php');

			$user = $_POST['user'];
			$pass = md5($_POST['pass']);
			$passAdm = md5("admin");
			$sql = "SELECT * from usuarios WHERE nome = '$user' AND Senha = '$pass'";
			$query = mysqli_query($conexao, $sql);
			$linha = mysqli_affected_rows($conexao);
				
				if ($linha > 0) {
					$_SESSION['user'] = $_POST['user'];
					header('location:inicial.php');
				} else
				if ($user == "admin" && $pass == $passAdm) {
					header('location: index.php');
				} else 
				if ($user == "" || $pass == "") {
					$_SESSION['msg'] = "<div id='alert' class='alert alert-info'>Preencha todos os campos!</div>";
				} else {
					$_SESSION['msg'] = "<div id='alert' class='alert alert-danger'>Usuário e/ou Senha incorreto(s)!</div>";
				}

		?>
		<center><label><?php echo $_SESSION['msg']; ?></label></center>
	</div>
		
</body>
</html>
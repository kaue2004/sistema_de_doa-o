<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#inputT").mask("(99)99999-9999");
		});

		$(document).ready(function(){
			$("#alert").fadeOut(3000);
		});
	</script>

	<style type="text/css">
		#input, #inputT {
			display: block;
		}
	</style>
</head>
<body>
<section class="container-fluid">
		<section class="">
		<section class="row justify-content-center">
			<form class="form-container" method="POST"><center>
			<div class="form-group">
				<label for="nome">Nome:</label>
				<input type="exampleInputEmail1" name="nome" class="thumbnail" id="input">
				<label for="tel">Telefone:</label>
				<input type="exampleInputEmail1" name="tel" class="thumbnail" id="inputT">
				<label for="email">E-mail:</label>
				<input type="email" name="email" class="thumbnail" id="input">
				<label for="pass">Doação:</label>
				<input type="exampleInputEmail1" name="doacao" class="thumbnail" id="input"><br>
				<label for="pass">Endereço:</label>
				<input type="exampleInputEmail1" name="endereço" class="thumbnail" id="input"><br>
				<input type="submit" value="Doar!" class="btn btn-primary btn-block">
			</div>
			</center></form>
			</section>
		   </section>
		</section>
	<div class="">
		<?php 
		session_start();
		error_reporting(0);
			require('config.php');
			$nome = $_POST['nome'];
			$tel = $_POST['tel'];
			$email = $_POST['email'];
			$end = $_POST['endereço'];
			$doa = $_POST['doacao'];

			
			$sql1 = "SELECT * FROM usuarios WHERE email = '$email'";
			$query1 = mysqli_query($conexao, $sql1);

			if (mysqli_num_rows($query1) > 0) {
				$_SESSION['msg1'] = "<div class='alert alert-danger' id='alert'>Doe a quem precisa!</div>";
			} else 
			if ($nome == "" || $tel == "" || $email == "" || $end == "" || $doa == ""){
				$_SESSION['msg1'] = "<div class='alert alert-info' id='alert'>Preencha todos os campos!</div>";
			} else {
				$sql = "INSERT INTO usuarios (id, nome, telefone, email, endereço, doacao) VALUES ('null', '$nome', '$tel', '$email', '$end', '$doa')";
				$query = mysqli_query($conexao, $sql);
				$_SESSION['msg1'] = "<div class='alert alert-success' id='alert'>Doação realizada com sucesso!</div>";
			}

		?>	
		<center><label><?php echo $_SESSION['msg1']; ?></label></center>
	</div>

</body>
</html>
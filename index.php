<!DOCTYPE html>
<html>
<head lang="pt-br">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
	<title>Área Administrativa</title>
</head>
<body>

	<div class="container">
		<h3>Lista de Doações</h3>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<td>#</td>
					<td>Nome</td>
					<td>Telefone</td>
					<td>E-mail</td>
					<td>Doação</td>
					<td>Endereço</td>
				</tr>
			</thead>
			<tbody>
		<?php  
		error_reporting(0);
			require('config.php');
			//error_reporting(0);
			$sql = "SELECT * FROM usuarios";
			$query = mysqli_query($conexao, $sql);

			if(mysqli_num_rows($query) < 1) {
				echo "<tr><td>Não possui usuários cadastrados!</td></tr>";
			} else {
			while ($dados = mysqli_fetch_assoc($query)) {
				echo "<tr>
						<td>".$dados['id']."</td>
						<td>".$dados['nome']."</td>
						<td>".$dados['telefone']."</td>
						<td>".$dados['email']."</td>
						<td>".$dados['doacao']."</td>
						<td>".$dados['endereço']."</td></tr>";
			}
					}
		?>

			</tbody>
		</table>
		<a href="cadastro.php" class="glyphicon glyphicon-log-out"> Sair</a>
	</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tela Inicial</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
</head>
<body>
<div class="row" style=""></div>
	<div class="col-md-4"></div>
	<div class="col-md-4"><center>
		<?php 
		session_start();
			echo $_SESSION['user'];

		?>
	</center></div>
	<div class="col-md-4"></div>
	<a href="?sair">Sair</a>
</body>
</html>
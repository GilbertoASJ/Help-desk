<?php 

	// Para recuperar os dados obtidos via requisição http inseridos na url de valida_login, é bem simples, basta:
	/*
	echo $_GET['email'];
	echo "<br>";
	echo $_GET['senha'];

	echo "<pre>";
		print_r($_GET);
	echo "</pre>";
	*/

	print_r($_POST);

	echo $_POST['email'];
	echo "<br>";
	echo $_POST['senha'];
?>
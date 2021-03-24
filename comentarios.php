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


/*
	echo "<pre>";
		print_r($usuarios_app);
	echo "</pre>";

	Utilizando a variável global $_POST, que é um array, podemos acessar os índices e recuperar os valores contidos dentro do formulário.
	print_r($_POST);

	echo $_POST['email'];
	echo "<br>";
	echo $_POST['senha'];
*/

/*
	// Após a instância de session_start, temos acesso a uma variável super global:
	$_SESSION['x'] = 'Valor de uma seção';
	print_r($_SESSION);
	echo "<br /> <hr />";
*/


?>
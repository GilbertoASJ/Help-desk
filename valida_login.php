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

	// Variável que verifica se a autenticação foi realizada
	// Começa com false, caso o usuário seja autenticado corretamente seu estado é alterado para true
	$usuario_autenticado = false;

	// Usuários do sistema
	$usuarios_app = array(
		array('email' => 'adm@teste.com.br', 'senha' => '123456'),
		array('email' => 'user@teste.com.br', 'senha' => 'abcdef'),
	);

	// Utilizamos o foreach para percorrer usuários_app, e fazer a autenticação do usuário.
	foreach ($usuarios_app as $user) {

		if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
			// Se usuário e senha forem iguais ao exemplo do array, o estado da variável é alterado para true.
			$usuario_autenticado = true;

		}
	};

	// Agora fora do foreach, se a variável de autenticação estiver como true irá entrar no if, caso não...
	if($usuario_autenticado == true) {
		echo "Usuário autenticado.";

	} else {
		// ...Caso não, irá exibir para o usuário na tela de login, uma mensagem de: usuário ou senha inválidos

		// Para isso utilizamos uma função nativa do php, para forçar o redirecionamento para a página indicada.
		header('Location: index.php?login=erro');
	}

	/*
	echo "<pre>";
		print_r($usuarios_app);
	echo "</pre>";
	*/

	/* Utilizando a variável global $_POST, que é um array, podemos acessar os índices e recuperar os valores contidos dentro do formulário.
	print_r($_POST);

	echo $_POST['email'];
	echo "<br>";
	echo $_POST['senha'];
	*/
?>
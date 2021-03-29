<?php 

	// Aqui iremos iniciar uma sessão, para que possamos proteger algumas páginas na aplicação.
	session_start();

	// Variável que verifica se a autenticação foi realizada
	// Começa com false, caso o usuário seja autenticado corretamente seu estado é alterado para true
	$usuario_autenticado = false;

	// Id
	$usuario_id = null;
	$usuario_perfil_id = null;

	// Array que contêm os perfis
	$perfis = [1 => 'Administrativo0', 2 => 'Usuário'];

	// Usuários do sistema
	$usuarios_app = array(
		array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
		array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
		array('id' => 3, 'email' => 'gilberto@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
		array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
	);

	// Utilizamos o foreach para percorrer usuários_app, e fazer a autenticação do usuário.
	foreach ($usuarios_app as $user) {

		if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
			// Se usuário e senha forem iguais ao exemplo do array, o estado da variável é alterado para true.
			$usuario_autenticado = true;

			$usuario_id = $user['id'];
			$usuario_perfil_id = $user['perfil_id'];

		}
	};

	// Agora fora do foreach, se a variável de autenticação estiver como true irá entrar no if, caso não...
	if($usuario_autenticado == true) {
		echo "Usuário autenticado.";
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $usuario_perfil_id;

		// Forçar o redirecionamento para a página home caso o usuário esteja autenticado
		header('Location: home.php');

	} else {
		$_SESSION['autenticado'] = 'NAO';

		// ...Caso não, irá exibir para o usuário na tela de login, uma mensagem de: usuário ou senha inválidos

		// Para isso utilizamos uma função nativa do php, para forçar o redirecionamento para a página indicada.
		header('Location: index.php?login=erro');
	};

?>
<?php
		
	// Para se trabalhar com sessões sempre utilizar session_start()
	session_start();

	// Temos algumas formas para se lidar com a destruição de seções em php
	// Podemos remover índices do array de sessão
	
	// Para remover os índices do array, basta utilizar a função nativa do php unset(), que espera o array e o índice que deve ser eliminado, essa função remove índices de qualquer array, tanto faz se for um array comum ou índices de um array Session, Get, Post...

	// O unset(), remove o índice apenas se ele existir, caso não exista, ele não da erro.
	

	// Destruir a variável de sessão
	// E para destruir completamente o array session, basta utiilizar a função session_destroy()

	// Quando se utiliza o session destroy, após destruir a sessão, ela ainda estará disponível até quem uma nova requisição http seja feita, por isso é muito comum após se utilizar o session destroy, forçar uma nova requisição:

	session_destroy();
	header('Location: index.php');
?>
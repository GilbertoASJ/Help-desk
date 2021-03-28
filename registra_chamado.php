<?php
	
	// O formulário do script abrir chamado chama o método post na action registra_chamado.php.
	echo "<pre>";
		print_r($_POST);
	echo "</pre>";

	// Varíáveis:
	$titulo = str_replace('-', ' ', $_POST['titulo']);
	$categoria = str_replace('-', ' ', $_POST['categoria']);
	$descricao = str_replace('-', ' ', $_POST['descricao']);

	// Utilizamos php_eol(end of line) para que no arquivo.txt, a cada chamado haja uma quebra de linha
	$chamado = $titulo . ' - ' . $categoria . ' - ' . $descricao . PHP_EOL;

	// ----------------------------------------------------------------------------------------------------- //

	// Após fazer a recuperação da variável super global post, agora iremos salvar em um arquivo txt
	// Para isso utilizaremos fopen(), uma função nativa do php que espera dois parâmetros.

	// Passando como primeiro parâmetro o nome do arquivo que irá ser aberto, e como segundo o método 'a', que irá disponibilizar o arquivo apenas para escrita.
	$arquivo = fopen('arquivo.txt', 'a');

	// Agora que já recuperamos os índices do array e atribuimos a uma variável, agora podemos fazer a escrita disso no arquivo.txt

	// Para isso utilizaremos o fwrite(<referência>, <o que escrever dentro do arquivo>), que recebe dois parâmetros.
	fwrite($arquivo, $chamado);

	// E para encerrarmos esse ciclo de escrita dentro de um arquivo, precisamos fechar, para isso basta:
	fclose($arquivo);

	// Para que não fique nesse script e fique confuso para o usuário utilizamos o header, para manter o usuário em abrir_chamado.php
	header('Location: abrir_chamado.php');
?>
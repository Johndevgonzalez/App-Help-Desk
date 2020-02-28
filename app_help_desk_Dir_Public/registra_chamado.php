<?php
	/*
	echo "<pre>";
	print_r($_POST);
	echo "<pre>";
	*/
	session_start();


	// trabalhando na montagem do texto
	$titulo = str_replace('#', '-', $_POST['titulo']);
	$categoria = str_replace('#', '-', $_POST['categoria']);
	$descricao = str_replace('#', '-', $_POST['descricao']);

	//abre um novo arquivo, espera 2 parametros
	// documentacao -  https://www.php.net/manual/en/function.fopen.php
	$arquivo = fopen('../../app_help_desk/arquivo.hd', 'a');
	//armazenar em uma variavel pra usar na fwrite
	// PHP_EQL -> CONSTANTE (and of line)(quebrar a linha dentro do texto)
	$texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;
	// escrevendo o texto
	fwrite($arquivo, $texto );

	// para fechar
	fclose($arquivo);
	
	//echo $texto;
	//redirecionar
	header('Location: abrir_chamado.php');


?>
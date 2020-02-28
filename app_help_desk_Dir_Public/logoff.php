<?php
	// sempre iniciar o session start antes de qualquer script
	session_start();

	/*
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
	//remover indices do array de sessao
	// funcao nativa unset() - remover indices de array

	unset($_SESSION['x']); // remover apenas se ele existir

	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
	
	//destruir a variavel de sessao
	// funcao session_destroy() - destroi todos os indices dentro do SESSION()
	*/

	session_destroy(); // sera destruida, terá que forcar um redirecionamento
	header('Location: index.php');
	/*
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
	*/

?>
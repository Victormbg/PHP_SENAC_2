<?php

	require_once('banco.php');

	$nome = $_POST['nome'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$confsenha = $_POST['confsenha'];
	$endereco = $_POST['endereco'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$sexo = $_POST['sexo'];
	
	
	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = " insert into usuarios(nome,usuario,senha,confsenha,endereco,telefone,email,sexo) values ('$nome','$usuario','$senha','$confsenha','$endereco','$telefone','$email','$sexo')";

	//executar a query
	if(mysqli_query($link, $sql)){
		echo 'Usuário registrado com sucesso!';
	} else {
		echo 'Erro ao registrar o usuário!';
	}


?>
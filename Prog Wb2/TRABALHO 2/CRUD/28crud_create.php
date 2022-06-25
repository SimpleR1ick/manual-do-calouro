<?php
//Iniciar  Sessão
session_start();

//Conexão
require_once '28dbconnect.php';

if(isset($_POST['btn-cadastrar'])) {
	$nome=mysqli_escape_string($connect,$_POST['nome']);
	$sobrenome=mysqli_escape_string($connect,$_POST['sobrenome']);
	$email=mysqli_escape_string($connect,$_POST['email']);
	$idade=mysqli_escape_string($connect,$_POST['idade']);
	
	$sql="INSERT INTO clientes(nome,sobrenome,email,idade) VALUES ('$nome', '$sobrenome', '$email', $idade)";
	echo $sql;
	if(mysqli_query($connect,$sql)) {
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: ../28crud_index.php?sucesso');
	} else {
		$_SESSION['mensagem'] = "Erro ao cadastrar!";		
		header('Location: ../28crud_index.php?erro');
	}
}		



?>
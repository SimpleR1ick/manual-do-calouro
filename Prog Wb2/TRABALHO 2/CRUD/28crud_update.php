<?php
//Iniciar  Sessão
session_start();

//Conexão
require_once '28dbconnect.php';

if(isset($_POST['btn-editar'])):
	$nome=mysqli_escape_string($connect,$_POST['nome']);
	$sobrenome=mysqli_escape_string($connect,$_POST['sobrenome']);
	$email=mysqli_escape_string($connect,$_POST['email']);
	$idade=mysqli_escape_string($connect,$_POST['idade']);
	$id=mysqli_escape_string($connect,$_POST['id']);
	
	$sql="UPDATE clientes SET nome='$nome', sobrenome='$sobrenome', email='$email', idade=$idade WHERE  id=$id";
	echo $sql;
	if(mysqli_query($connect,$sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../28crud_index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location: ../28crud_index.php');
	endif;
endif;	



?>
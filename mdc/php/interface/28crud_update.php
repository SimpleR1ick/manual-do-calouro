<?php
//Iniciar  Sessão
session_start();

//Conexão
require_once '../includes/connect.php';

if (isset($_POST['btn-editar'])) {
	$id = pg_escape_string(CONNECT, $_POST['id']);
	$nome = pg_escape_string(CONNECT,$_POST['nome']);
	$email =pg_escape_string(CONNECT,$_POST['email']);
	
	$sql = "UPDATE usuario SET nom_usuario = '$nome', email = '$email' WHERE id_usuario = '$id'";

	echo $sql;

	if (pg_query(CONNECT,$sql)) {
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../28crud_index.php');
	} else {
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location: ../28crud_index.php');
	}
}	
?>
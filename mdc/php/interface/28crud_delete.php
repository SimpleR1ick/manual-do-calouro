<?php
//Iniciar  Sessão
session_start();

//Conexão
require_once '../includes/connect.php';

if (isset($_POST['btn-deletar'])) {
	$id = pg_query(CONNECT, $_POST['id']);

	$sql = "DELETE FROM usuario WHERE id_usuario = '$id'";

	if (pg_query(CONNECT, $sql)) {
		$_SESSION['mensagem'] = "Excluido com sucesso!";
		header('Location: 28crud_index.php');
	} else {
		$_SESSION['mensagem'] = "Erro ao excluir!";
		header('Location: 28crud_index.php');
	}
}

<?php 
// Iniciando Sessão
session_start();

// Conexão com o banco de dados
require_once 'includes/connect.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    
    $sql = "DELETE FROM usuarios WHERE id_user = '$id'";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['toast'] = "Excluído com sucesso!";
        header('Location: crud_index.php');

    } else {
        $_SESSION['mensagem'] = "Erro ao excluir!";
        header('Location: crud_index.php');
    }
}
?>
<?php 
// Iniciando Sessão
session_start();

// Conexão com o banco de dados
require_once 'includes/connect.php';

// Verifica se existe id do usuário
if (isset($_GET['id'])) {
    // Atribuindo id do usuário
    $id = pg_escape_string($connect, $_GET['id']);
    
    // Query para deletar o usuário no banco de dados
    $sql = "DELETE FROM usuarios WHERE id_user = '$id'";

    // Verifica se o usuário foi excluído e envia o user de volta para o crud_index
    if (pg_query($connect, $sql)) {
        $_SESSION['toast'] = "Excluído com sucesso!";
        header('Location: crud_index.php');

    } else {
        $_SESSION['mensagem'] = "Erro ao excluir!";
        header('Location: crud_index.php');
    }
}
?>
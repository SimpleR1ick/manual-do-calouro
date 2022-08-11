<?php
// Iniciando a sessão
session_start();

// Conexão com banco de dados
require_once 'php/includes/connect.php';

// Verifica se existe id do usuário
if (isset($_GET['id'])) {
    // Atribuindo id do usuário
    $id = pg_escape_string(CONNECT, $_GET['id']);
    
    // Query para deletar o usuário no banco de dados
    $sql = "DELETE FROM usuario WHERE id_usuario = $id";

    // Verifica se o usuário foi excluído e envia o user de volta para o crud_index
    if (pg_query(CONNECT, $sql)) {
        $_SESSION['mensag'] = "Excluído com sucesso!";
        header('Location: crud_index.php');
    } else {
        $_SESSION['mensag'] = "Erro ao excluir!";
        header('Location: crud_index.php');
    }
}
?>
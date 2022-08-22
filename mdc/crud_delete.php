<?php
// Inicia a sessão
session_start();

// Conexão com banco de dados
require_once 'php/includes/connect.php';

// Verifica se o id existe
if (isset($_POST['btn-deletar'])) {
    // Atribuindo id do usuário
    $id = pg_escape_string(CONNECT, $_POST['id']);
    
    // Query para excluir o usuário no banco de dados
    $sql = "DELETE FROM usuario WHERE id_usuario = $id";

    // Verifica se a exclusão ocorreu sem problemas
    if (pg_query(CONNECT, $sql)) {
        $_SESSION['toast'] = "Excluído com sucesso!";
        header('Location: crud_index.php');
        
    } else {
        $_SESSION['toast'] = "Erro ao excluir!";
        header('Location: crud_index.php');
    }
}
?>
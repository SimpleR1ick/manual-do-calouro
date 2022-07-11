<?php 
// Iniciando Sessão
session_start();

// Conexão com o banco de dados
require_once 'includes/connect.php';

// Verifica se houve requisição de update/edição
if (isset($_POST['btnUpdate'])) {
    // Declaração de variáveis a serem modificadas
    $id = pg_escape_string($connect, $_POST['id_usuario']);
    $nome = pg_escape_string($connect, $_POST['nom_usuario']);
    $email = pg_escape_string($connect, $_POST['email']);

    // Query para fazer o update da tabela
    $sql = "UPDATE usuario SET nom_usuario = '$nome', email = '$email' WHERE id_usuario = '$id'";

    // Verifica se o update aconteceu e manda o user de volta para o crud_index
    if (pg_query($connect, $sql)) {
        $_SESSION['toast'] = "Atualizado com sucesso!";
        header('Location: crud_index.php');

    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: crud_index.php');
    }
}
?>

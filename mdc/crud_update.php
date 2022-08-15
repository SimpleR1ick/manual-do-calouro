<?php
// Inicia a sessão
session_start();

// Conexão com banco de dados
require_once 'php/includes/connect.php';

// Verifica se houve o post do formulario 
if (isset($_POST['btnUpdate'])) {
    // Declaração de variáveis a serem modificadas
    $id = pg_escape_string(CONNECT, $_POST['id']);
    $nome = pg_escape_string(CONNECT, $_POST['nome']);
    $email = pg_escape_string(CONNECT, $_POST['email']);

    // Query para fazer o update das informações do usuario
    $sql = "UPDATE usuario SET nom_usuario = '$nome', email = '$email' WHERE id_usuario = '$id'";

    // Verifica se o update ocorreu e redireciona para o crud_index
    if (pg_query(CONNECT, $sql)) {
        $_SESSION['mensag'] = "Atualizado com sucesso!";
        header('Location: crud_index.php');

    } else {
        $_SESSION['mensag'] = "Erro ao atualizar!";
        header('Location: crud_index.php');
    }
}
?>
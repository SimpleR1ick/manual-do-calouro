<?php 
// Iniciando Sessão
session_start();

// Conexão com o banco de dados
require_once 'includes/connect.php';

if (isset($_POST['btnUpdate'])) {
    $id = mysqli_real_escape_string($connect, $_POST['id_user']);
    $nome = mysqli_real_escape_string($connect, $_POST['nome']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);

    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id_user = '$id'";

    if (mysqli_query($connect, $sql)) {
        $_SESSION['toast'] = "Atualizado com sucesso!";
        header('Location: crud_index.php');

    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: crud_index.php');
    }
}
?>

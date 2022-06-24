<?php
// Iniciar Sessão
session_start();

// Conexão
require_once 'connect.php';

// Enviando os dados do formulario
if (isset($_POST['btn-cadastrar'])) {
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
    $senha2 = mysqli_escape_string($connect, $_POST['senhaConfirma']);
    // $notificar = mysqli_escape_string($connect, $_POST['novidades']);
    
    if ($senha == $senha2) {
        // Criptografando a senha usando hash
        $senhaSegura = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios(nome, login, senha) VALUES ('$nome', '$email', '$senhaSegura')";

        if (mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = "Cadastro com sucesso!";
            
            header('Location: ../login.php');

        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
        }

    } else {
        $mensgem = "Senhas não idênticas";
    }
}
?>




<?php
// Iniciando Sessão
session_start();

// Conexão com o banco de dados
require_once 'connect.php';

// Enviando os dados do formulario
// if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
if (isset($_POST['btnCadastrar'])) {
    $nome = mysqli_real_escape_string($connect, $_POST['nome']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $senha = mysqli_real_escape_string($connect, $_POST['senha']);
    $senha2 = mysqli_real_escape_string($connect, $_POST['senhaConfirma']);
    // $notificar = mysqli_escape_string($connect, $_POST['novidades']);
    
    if ($senha == $senha2) {
        // Criptografando a senha usando md5
        $senhaSegura = md5($senha);

        $sql = "INSERT INTO usuarios(nome, email, senha) VALUES ('$nome', '$email', '$senhaSegura')";

        if (mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = "Cadastro com sucesso!";
            
            header('Location: ../login.php');

        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
        }

    } else {
        $_SESSION['mensagem'] = "Senhas não idênticas";
    }
}

?>




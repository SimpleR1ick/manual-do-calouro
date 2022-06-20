<?php
// Conexão
require_once 'connect.php';

// Iniciar Sessão
session_start();

// Enviando os dados do formulario
if(isset($_POST['btn-cadastrar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);
    $senha2 = mysqli_escape_string($connect, $_POST['senha2']);
    $notificar = mysqli_escape_string($connect, $_POST['novidades']);
    
    if($senha == $senha2):
        // Criptografando a senha usando hash
        $senhaSegura = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuario(nome, login, senha) VALUES ('$nome', '$email', '$senhaSegura')";
        echo $sql;

        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Cadastro com sucesso!";

        else:
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
        
        endif;
    
    else:
        $mensgem = "Senhas não idênticas";

    endif;
endif;
?>




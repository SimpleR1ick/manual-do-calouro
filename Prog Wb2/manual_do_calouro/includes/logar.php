<?php
// Iniciar Sessão
session_start();

// Conexão
require_once 'connect.php';

// Verificando se 
if (isset($_POST['login']) && isset($_POST['senha'])) {
    $login = mysqli_real_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    $senha = md5($senha);
    $sql = "SELECT id_usuario, login FROM usuarios WHERE login = '$login' AND senha = '$senha'";

    $resultado = mysqli_query($connect, $sql);
    

    if (isset($resultado)) {
        $dados = mysqli_fetch_array($resultado);
        $_SESSION['logado'] = true;
        $_SESSION['id_usuario'] = $dados['id_usuario'];

        echo "<h1> $dados </h1>";
        // header('Location: ../index.php');

    } else {
        $_SESSION['mensagem'] = "Usuário ou senha inválidos!";
    }

} else {
    $_SESSION['mensagem'] = "Usuário ou senha inválidos!";
}
?>

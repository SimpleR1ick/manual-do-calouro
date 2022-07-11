<?php
// Iniciando Sessão
session_start();

// Conexão com o banco de dados
require_once 'connect.php';

// Atribui o login e a senha do usuário a variáveis
$email = pg_escape_string($connect, $_POST['email']);
$senha = pg_escape_string($connect, md5($_POST['senha']));

// Faz uma requisição para o banco de dados
$sql = "SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senha'";

// Coleta o resultado da requisição feita acima
$query = pg_query($connect, $sql);

// Atribui, como um array, o resultado da requisição
$dados = pg_fetch_array($query);

// Verifica se a requisição ocorreu com sucesso
if (isset($dados)) {
    // Adiciona à sessão as variáveis 'logado' e 'id_usuario'
    $_SESSION['id_usuario'] = $dados['id_usuario'];
    $_SESSION['mensagem'] = "Logado com sucesso";
    
    // Envia o usuário à página index.php
    header('Location: ../home.php');

// Caso a verificação falhe
} else {
    // Adiciona à minha sessão uma mensagem de erro
    $_SESSION['mensagem'] = "Usuário ou senha inválidos!";
    
    // Envia o usuário de volta à página de login
    header('Location: ../login.php');
}
?>
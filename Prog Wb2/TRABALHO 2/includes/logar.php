<?php
// Iniciando Sessão
session_start();

// Conexão com o banco de dados
require_once 'connect.php';

// Atribui o login e a senha do usuário a variáveis
$email = mysqli_escape_string($connect, $_POST['email']);
$senha = mysqli_escape_string($connect, md5($_POST['senha']));

// Faz uma requisição para o banco de dados
$sql = "SELECT id_user FROM usuarios WHERE email = '$email' AND senha = '$senha'";

// Coleta o resultado da requisição feita acima
$query = mysqli_query($connect, $sql);

// Atribui, como um array, o resultado da requisição
$dados = mysqli_fetch_array($query);

// Verifica se a requisição ocorreu com sucesso
if (isset($dados)) {
    // Adiciona à sessão as variáveis 'logado' e 'id_usuario'
    // que receberão true e o id do usuário na tabela, respectivamente
    $_SESSION['logado'] = true;
    $_SESSION['id_usuario'] = $dados['id_user'];

    $_SESSION['toast'] = "Logado com sucesso";
    
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
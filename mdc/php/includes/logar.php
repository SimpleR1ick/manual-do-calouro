<?php
// Iniciar a sessão
session_start();

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';

// Conectando com o banco de dados
require_once 'connect.php';

if (isset($_POST['btnLogar'])) {
    // Atribui o conteudo dos campos do formulario a variáveis
    $email = pg_escape_string(CONNECT, $_POST['email']);
    $senha = pg_escape_string(CONNECT, $_POST['senha']);

    // Sanitizando a senha (remove qualquer tag HTML)
    $senha = htmlspecialchars($senha);

    // Sanitizando e validando o email
    $email = sanitizaEmail($email);

    // Tenta logar o usuario no site
    logarUsuario($email, md5($senha));
}

/**
 * Função para executar o login no website
 * 
 * @param string $email um email sanitizado
 * @param string $senha uma senha sanitizada e criptografada
 * 
 * @author Henrique Dalmagro
 */
function logarUsuario($email, $senhaHash): void {
    // Preparando uma requisição ao banco de dados
    $sql = "SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senhaHash'";
    $query = pg_query(CONNECT, $sql);

    // Verifica se a inserção teve resultado
    if (pg_num_rows($query) == 1) {
        // Atribui, como um array, o resultado da requisição
        $result = pg_fetch_array($query);

        // Adiciona à sessão o 'id_usuario' do usuario 
        $_SESSION['id_usuario'] = $result['id_usuario'];

        // Adciona a sessão uma mensagem de sucesso
        $_SESSION['sucess'] = 'Logado com sucesso!';
        header('Location: ../../index.php'); // retorna para página index.php
    } else {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Usuário ou senha inválidos!';
        header('Location: ../../login.php'); // retorna para página de login
    }
}
?>
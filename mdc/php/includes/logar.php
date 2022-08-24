<?php
// Iniciar a sessão
session_start();

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';

// Conectando com o banco de dados
require_once 'connect.php';

if (isset($_POST['btnLogar'])) {
    // Sanitização
    if (sanitizaPost($_POST)) {
        $_SESSION['mensag'] = 'Erro ao logar!';
        header('Location: ../../login.php'); // Retorna para o cadastro

    } else {
        // Atribui o conteudo dos campos do formulario a variáveis
        $email = pg_escape_string(CONNECT, $_POST['email']);
        $senha = pg_escape_string(CONNECT, $_POST['senha']);

        // Validações
        $emailFiltrado = filter_var($email, FILTER_SANITIZE_EMAIL);

        // Tenta logar o usuario no site
        logarUsuario($emailFiltrado, md5($senha));
    }
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
        // Transforma o resultado da requisição em um array enumerado
        $result = pg_fetch_row($query);

        // Adiciona a sessão o id retornado do banco
        $_SESSION['id_usuario'] = $result[0];

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
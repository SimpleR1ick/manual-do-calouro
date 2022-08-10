<?php
// Iniciar a sessão
session_start();

// Import de bibliotecas de funções
include_once '../functions/processos.php';

// Conectando com o banco de dados
include_once 'connect.php';

// Atribui o conteudo dos campos do formulario a variáveis
$email = pg_escape_string(_CONEXAO_, $_POST['email']);
$senha = pg_escape_string(_CONEXAO_, $_POST['senha']);

// Sanitizando a senha e e-mail (remove qualquer tag HTML)
$email = htmlspecialchars($email);
$senha = htmlspecialchars($senha);

// Sanitizando e validando o email
$email = sanitizaEmail($email);

// Tenta logar o usuario no site
logarUsuario($email, $senha);

/**
 * Função para logar no website
 * 
 * @param string $email um email sanitizado
 * @param string $senha uma senha sanitizada 
 * 
 * @author Henrique Dalmagro
 */
function logarUsuario($email, $senha): void {
    // Invoca a função para criptografar a senha
    $senhaSegura = cripgrafaSenha($senha);

    // Preparando uma consulta ao banco de dados
    $sql = "SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senhaSegura'";
    $query = pg_query(_CONEXAO_, $sql);

    // Verifica se a consulta teve resultado
    if (pg_num_rows($query) == 1) {
        // Atribui, como um array, o resultado da requisição
        $result = pg_fetch_array($query);

        // Adiciona à sessão a variável 'id_usuario'
        $_SESSION['id_usuario'] = $result['id_usuario'];
        $_SESSION['erros'] = 'Logado com sucesso!';
        header('Location: ../../index.php'); // retorna para página index.php

    } else {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['erros'] = 'Usuário ou senha inválidos!';
        header('Location: ../../login.php'); // retorna para página de login
    }
}
?>
<?php
// Iniciando Sessão
session_start();

// Conexão com o banco de dados
require_once 'connect.php';

// Definindo a conexão como uma constante global
define('_CONEXAO_', $connect);

// Cria um array para armazenar as mensagens de erros
$erros = array();

/**
 * Função para executar o processo de login
 * 
 * @author Henrique Dalmagro
 */
function formularioLogin(): void {
    // Atribui o conteudo dos campos do formulario a variáveis
    $email = pg_escape_string(_CONEXAO_, $_POST['email']);
    $senha = pg_escape_string(_CONEXAO_, md5($_POST['senha']));

    // Loga o usuario no site
    logarUsuario($email, $senha);
}

/**
 * Função para logar no website
 * 
 * @param $email - 
 * 
 * @author Henrique Dalmagro
 */
function logarUsuario($email, $senha): void {
    // Preparando uma requisição ao banco de dados
    $sql = "SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $query = pg_query(_CONEXAO_, $sql);

    // Verifica se a requisição teve resultado
    if (pg_num_rows($query) == 1) {
        // Atribui, como um array, o resultado da requisição
        $result = pg_fetch_array($query);

        // Adiciona à sessão as variáveis 'logado' e 'id_usuario'
        $_SESSION['id_usuario'] = $result['id_usuario'];
        $_SESSION['mensagem'] = "Logado com sucesso";
        header('Location: ../home.php'); // retorna para página home.php

    } else {
        // Adiciona à sessão uma mensagem de erro
        $erros[] = "<p class='align-middle text-center text-danger'> Usuário ou senha inválidos! </p>";
        header('Location: ../login.php'); // retorna para página de login
    }
}
?>
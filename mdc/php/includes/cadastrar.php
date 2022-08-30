<?php
// Iniciar a sessão
session_start();

// Conexão com banco de dados
require_once 'connect.php';

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';
include_once '../functions/verifica_valida.php';

// Definindo como constante global o caminho em caso de erro
$path = '../../cadastro.php';
define('PATH', $path);

if (isset($_POST['btnCadastrar'])) {
    // Sanitização
    if (sanitizaPost($_POST)) {
        $_SESSION['mensag'] = 'Erro ao cadastrar!';
        header("Location: PATH"); // Retorna para o cadastro
    }
    // Atribui o conteudo dos campos do formulario a variáveis
    $nome = pg_escape_string(CONNECT, $_POST['nome']);
    $email = pg_escape_string(CONNECT, $_POST['email']);
    $senha = pg_escape_string(CONNECT, $_POST['senha']);
    $senha2 = pg_escape_string(CONNECT, $_POST['senhaConfirma']);

    // Validações para cadastrar um usuário
    if (validaEmail($email, PATH) && validaSenha($senha, $senha2, PATH)){
        // Verifica se o email ja consta no banco de dados
        if (verificaEmail($email, PATH)) {
            // Tenta Cadastrar o usuario no site
            cadastraUsuario($nome, $email, md5($senha));
        }
    }
}

/**
 * Função para cadastrar o usuario 
 * 
 * @param string $nome 
 * @param string $email 
 * @param string $senha 
 * 
 * @author Henrique Dalmagro
 */
function cadastraUsuario($nome, $emailValidado, $senhaHash): void {
    // Preparando a requisição de inserção de dados
    $sql = "INSERT INTO usuario (nom_usuario, email, senha) VALUES ('$nome', '$emailValidado', '$senhaHash')";
    
    // Se a requição houve retorno, a insert teve sucesso
    if (pg_query(CONNECT, $sql)) {
        // Adiciona minha sessão uma mensagem de sucesso
        $_SESSION['sucess'] = 'Cadastrado com sucesso!';
        header('Location: ../../login.php');// Envia o usuário de à página de login

    } else {
        $_SESSION['mensag'] = 'Erro ao cadastrar!';
        header('Location: ../../cadastro.php'); // Retorna para o cadastro
    }
}   
?>
<?php
// Iniciar a sessão
session_start();

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';

// Conexão com banco de dados
require_once 'connect.php';

if (isset($_POST['btnCadastrar'])) {
    // Sanitização
    if (sanitizaPost($_POST)) {
        $_SESSION['mensag'] = 'Erro ao cadastrar!';
        header('Location: ../../cadastro.php'); // Retorna para o cadastro

    } else {
        // Atribui o conteudo dos campos do formulario a variáveis
        $nome = pg_escape_string(CONNECT, $_POST['nome']);
        $email = pg_escape_string(CONNECT, $_POST['email']);
        $senha1 = pg_escape_string(CONNECT, $_POST['senha']);
        $senha2 = pg_escape_string(CONNECT, $_POST['senhaConfirma']);

        // Validações
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (validaEmail($email) && validaSenha($senha1, $senha2)) {
            // Tenta inserir o usuario no banco de dados
            cadastraUsuario($nome, $email, md5($senha));
        }
    }
}


/**
 * Função para verificar se o email de entrada é válido
 * 
 * @param string $email
 * 
 * @author Rafael Barros
 */
function validaEmail($email): bool {
    // Verifica se o email é válido
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Função para verificar se as senhas coincidem
 * 
 * @param string $senha1 Primeira senha
 * @param string $senha2 Confirmação de senha
 * 
 * @author Henrique Dalmagro
 */
function validaSenha($senha1, $senha2): bool {
    // Se as senhas não concidirem retorna o usuario ao inicio do cadastro   
    if ($senha1 !== $senha2) {
        // Adiciona à minha sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Senhas não idênticas!';
        header('Location: ../../cadastro.php'); // Retorna para o cadastro
        return false;
    } 
    return true;
}

/**
 * Função para verificar se o email de entrada já esta cadastrado no banco de dados
 * 
 * @param string $email
 * 
 * @author Henrique Dalmagro
 */
function verificaEmail($email): bool {
    // Preparando uma requisição ao banco de dados
    $sql = "SELECT email FROM usuario WHERE email = '$email'";
    $query = pg_query(CONNECT, $sql);

    // Verifica se a requisição teve resultado
    if (pg_num_rows($query) > 0) {
        // Adiciona à minha sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Email já cadastrado!';
        header('Location: ../../cadastro.php'); // Retorna para o cadastro
        return false;
    }
    return true;
    
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
    $query = pg_query(CONNECT, $sql);

    // Se a requição houve retorno, a insert teve sucesso
    if ($query) {
        // Adiciona minha sessão uma mensagem de sucesso
        $_SESSION['sucess'] = 'Cadastrado com sucesso!';
        header('Location: ../../login.php');// Envia o usuário de à página de login
    } else {
        $_SESSION['mensag'] = 'Erro ao cadastrar!';
        header('Location: ../../cadastro.php'); // Retorna para o cadastro
    }
}   
?>
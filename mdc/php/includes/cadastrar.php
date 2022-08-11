<?php
// Iniciar a sessão
session_start();

// Import de bibliotecas de funções
include_once '../functions/processos.php';

// Conexão com banco de dados
require_once 'connect.php';

// Atribui o conteudo dos campos do formulario a variáveis
$nome = pg_escape_string(_CONEXAO_, $_POST['nome']);
$email = pg_escape_string(_CONEXAO_, $_POST['email']);
$senha = pg_escape_string(_CONEXAO_, $_POST['senha']);
$senha2 = pg_escape_string(_CONEXAO_, $_POST['senhaConfirma']);

// Sanitizando o nome e as senhas (remove qualquer tag HTML)
$nome = htmlspecialchars($nome);
$senha = htmlspecialchars($senha);
$senha2 = htmlspecialchars($senha2);
$email = htmlspecialchars($email);

// Sanitizando e validando o email
$email = sanitizaEmail($email);

// Verifica se as senhas são identicas
validaSenha($senha, $senha2);

// Verifica se o email recebido ja existe no banco de dados
validaEmail($email);

// Tenta inserir o usuario no banco de dados
cadastraUsuario($nome, $email, $senha);

/**
 * Função para verificar se o email de entrada ja esta cadastrado no banco de dados
 * 
 * @param string $email
 * 
 * @author Henrique Dalmagro
 */
function validaEmail($email): void {
    // Preparando uma requisição ao banco de dados
    $sql = "SELECT email FROM usuario WHERE email = '$email'";
    $query = pg_query(_CONEXAO_, $sql);

    // Verifica se a requisição teve resultado
    if (pg_num_rows($query) > 0) {
        // Adiciona à minha sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Email já cadastrado!';
        header('Location: ../../cadastro.php'); // Retorna para o cadastro
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
function validaSenha($senha1, $senha2): void {
    // Se as senhas não concidirem retorna o usuario ao inicio do cadastro   
    if ($senha1 !== $senha2) {
        // Adiciona à minha sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Senhas não idênticas!';
        header('Location: ../../cadastro.php'); // Retorna para o cadastro
    }
}

/**
 * Função para cadastrar o usuario 
 * 
 * @param string $nome Nome do usuario
 * @param string $email Email valido
 * @param string $senha Primeira senha
 * @param string $senha2 Confirmação da senha
 * 
 * @author Henrique Dalmagro
 */
function cadastraUsuario($nome, $email, $senha): void {
    // Invoca a função para criptografar a senha
    $senhaSegura = hashMD5($senha);

    // Preparando a requisição de inserção de dados
    $sql = "INSERT INTO usuario (nom_usuario, email, senha) VALUES ('$nome', '$email', '$senhaSegura')";
    $query = pg_query(_CONEXAO_, $sql);

    // Se a requição houve retorno, a insert teve sucesso
    if ($query) {
        // Adiciona minha sessão uma mensagem de sucesso
        $_SESSION['mensag'] = 'Cadastrado com sucesso!';
        header('Location: ../../login.php');// Envia o usuário de à página de login
    } else {
        // Adiciona minha sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao cadastrar!';
        header('Location: ../../cadastro.php'); // Retorna para o cadastro
    }
}
?>
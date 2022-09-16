<?php
// Iniciar a sessão
session_start();

// Import de bibliotecas de funções
require_once './db_connect.php';
include_once '../functions/sanitizar.php';
include_once '../functions/validar.php';

// Definindo as constantes globais
define('PATH', '../../login.php'); // Caminho da pagina
define('CONNECT', db_connect());   // Conexão

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitização
    if (sanitizaInjectHtmlPOST($_POST, PATH)) {
        $_POST = sanitizaCaractersPOST($_POST); 

        // Atribui os campos do formulario a variáveis
        $nome = pg_escape_string(CONNECT, $_POST['nome']);
        $email = pg_escape_string(CONNECT, $_POST['email']);
        $email = pg_escape_string(CONNECT, $_POST['email']);
        $senha = pg_escape_string(CONNECT, $_POST['senha']);

        // Validação
        if (validaNome($nome, PATH) && validaEmail($email, PATH) && validaSenha($senha, $senha2, PATH)) {
            // Verifica se o email ja consta no banco de dados
            if (verificaEmail($email, PATH) && verificaSenha($senha, PATH)) {
                // Tenta Cadastrar o usuario no site
                cadastrarUsuario($nome, $email, md5($senha));
            }
        }
    // Encerando a conexão
    pg_close(CONNECT);
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
function cadastrarUsuario($nome, $email, $senhaHash): void {
    // Preparando a requisição de inserção de dados
    $sql = "INSERT INTO usuario (nom_usuario, email, senha) VALUES ('$nome', '$email', '$senhaHash')";
    
    // Se a requição houve retorno, o insert teve sucesso
    if (pg_query(CONNECT, $sql)) {
        // Adiciona minha sessão uma mensagem de sucesso
        $_SESSION['sucess'] = 'Cadastrado com sucesso!';

        // Envia o usuário de à página de login
        header('Location: ../../login.php');

    } else {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao cadastrar!';

        // Retorna para o cadastro
        header('Location: ../../cadastro.php'); 
    }
}
?>
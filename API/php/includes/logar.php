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
        $email = pg_escape_string(CONNECT, $_POST['email']);
        $senha = pg_escape_string(CONNECT, $_POST['senha']);
    
        // Validações
        if (validaEmail($email, PATH)) {
            // Verifica se o usuario esta ativo
            if (verificaAtivo($db, $email, PATH)) {
                // Tenta realizar o login no site
                logarUsuario($email, md5($senha));
            }
        }
        // Encerando a conexão
        pg_close(CONNECT);  
    }     
}

/**
 * Função para executar o login no website
 * 
 * @param string $email um email sanitizado
 * @param string $senhaHash uma senha sanitizada e criptografada
 * 
 * @author Henrique Dalmagro
 */
function logarUsuario($email, $senhaHash): void {
    // Preparando uma requisição ao banco de dados
    $sql = "SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senhaHash'";
    $query = pg_query(CONNECT, $sql);

    // Transforma o resultado da requisição em um array enumerado
    $result = pg_fetch_row($query);

    // Verifica se a inserção teve resultado
    if (pg_num_rows($query) == 1) {
        // Adiciona a sessão o id retornado do banco
        $_SESSION['id_usuario'] = $result[0];
        
        // retorna para pagina home
        header('Location: ../../index.php'); 
    } else {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Usuário ou senha inválidos!';

        // retorna para página de login
        header('Location: ../../login.php'); 
    }
}
?>
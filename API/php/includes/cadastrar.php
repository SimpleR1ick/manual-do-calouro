<?php
// Iniciar a sessão
session_start();

// Import de bibliotecas de funções
require_once './db_connect.php';
require_once '../functions/sanitizar.php';
require_once '../functions/validar.php';

// Definindo como constante global o caminho em caso de erro
define('PATH', '../../cadastro.php');

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitização
    if (sanitizaInjectHtmlPOST($_POST, PATH)) {
        $_POST = sanitizaCaractersPOST($_POST); 

        // Abra uma conexão com o banco de dados
        $db = db_connect();
        
        // Atribui os campos do formulario a variáveis
        $nome = pg_escape_string($db, $_POST['nome']);
        $email = pg_escape_string($db, $_POST['email']);
        $senha = pg_escape_string($db, $_POST['senha']);
        $senha2 = pg_escape_string($db, $_POST['senhaConfirma']);

        // Validações
        if (validaNome($nome, PATH) && validaEmail($email, PATH) && validaSenha($senha, $senha2, PATH)){
            // Verifica se o email ja consta no banco de dados
            if (verificaEmail($email, PATH)) {
                // Tenta Cadastrar o usuario no site
                cadastrarUsuario($nome, $email, md5($senha));
            }
        }
        // Encerando a conexão
        pg_close($db);
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
    if (pg_query($GLOBALS['db'], $sql)) {
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
<?php
// Iniciar a sessão
session_start();

// Import de bibliotecas de funções
require_once './db_connect.php';

include_once '../functions/sanitizar.php';
include_once '../functions/validar.php';
include_once '../functions/processar.php';

// Definindo as constantes globais
define('PATH', '../../cadastro.php'); // Caminho da pagina
define('CONNECT', db_connect());   // Conexão

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (sanitizaInjectHtmlPOST($_POST, PATH)) {
        // Sanitização
        $_POST = sanitizaCaractersPOST($_POST); 

        $nome = pg_escape_string(CONNECT, $_POST['nome']);
        $email = pg_escape_string(CONNECT, $_POST['email']);
        $senha = pg_escape_string(CONNECT, $_POST['senha']);
        $senha2 = pg_escape_string(CONNECT, $_POST['senhaConfirma']);
        
        // Validações
        if (validaNome($nome, PATH)) {
            if (validaEmail($email, PATH)) {
                if (validaSenha($senha, $senha2, PATH)) {
                    $valida = true;
                }
            }
        }
        // Verificações
        if ($valida) {
            if (verificaEmail($email, PATH)) {
                if (verificaSenha($senha, PATH)) {
                    $verifica = true;
                }
            }
        }
        // Verifica os processos antecedentes
        if ($valida and $verifica) {
            // Cadastra o usuario no banco de dados
            cadastrarUsuario($nome, $email, md5($senha), PATH);
        }
    } 
}
// Encerando a conexão
pg_close(CONNECT);
?>
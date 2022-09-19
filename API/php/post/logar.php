<?php
// Iniciar a sessão
session_start();

// Inicia a conexão com banco de dados
require_once '../includes/db_connect.php';

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';
include_once '../functions/validar.php';
include_once '../functions/processar.php';

// Definindo as constantes globais
define('PATH', '../../login.php'); // Caminho da pagina
define('CONNECT', db_connect());   // Conexão

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (verificaInjectHtml($_POST, PATH)) {
        // Sanitização
        $_POST = sanitizaCaractersPOST($_POST); 

        // Atribuição dos inputs do POST a variaveis
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    
        // Validações
        if (validaEmail($email, PATH)) {
            // Verificações
            if (verificaAtivo($email, PATH)) {
                $valida_verifica = true;
            }
        }
        if ($valida_verifica) {
            // Tenta realizar o login no site
            logarUsuario($email, md5($senha));
        }
    }     
}
// Encerando a conexão
pg_close(CONNECT);
?>
<?php
// Iniciar a sessão
session_start();

// Inicia a conexão com banco de dados
require_once '../includes/db_connect.php'; 

// Definindo as constantes globais
define('CONNECT', db_connect());   // Conexão
define('PATH', '../../cadastro.php'); // Caminho da pagina

// Import de bibliotecas de funções
include_once '../functions/sanitiza.php'; 
include_once '../functions/valida.php';
include_once '../functions/usuario.php';

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
else if (isset($_POST['btnCadastrar'])) {
    if (verificaInjectHtml($_POST, PATH)) {
        // Sanitização
        $_POST = sanitizaCaractersPOST($_POST); 

        // Atribuição dos inputs do POST a variaveis
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senhaConfirma = $_POST['senhaConfirma'];
        
        // Validações
        if (validaNome($nome, PATH)) {
            if (validaEmail($email, PATH)) {
                if (validaSenha($senha, $senhaConfirma, PATH)) {
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
        if ($valida && $verifica) {
            // Cadastra o usuario no banco de dados
            cadastrarUsuario($nome, $email, md5($senha), PATH);
        }
    } 
}
// Encerando a conexão
pg_close(CONNECT);
?>
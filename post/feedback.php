<?php
// Iniciar a sessão
session_start();

// Inicia a conexão com banco de dados
require_once '../includes/connect.php'; 

// Import de bibliotecas de funções
include_once '../functions/sanitiza.php'; 
include_once '../includes/email.php';

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['btnFeedback'])) {

        // Verifica se algum campo possui caracter indesejados
        if (validaFormulario($_POST)) {
            header("Location: '{$_SERVER['HTTP_REFERER']}'");
            exit();
        }
        // Sanitização
        $dados = sanitizaFormulario($_POST); 

        $email = $dados['email'];
        $telefone = $dados['telefone'];
        $assunto = $dados['assunto'];
        $texto = $dados['texto'];

        $mensagem = $telefone.$texto;

        enviarEmail($email, $assunto, $mensagem);
    }
}
?>
<?php
// Iniciar a sessão
session_start();

// Import de bibliotecas de funções
include_once '../functions/processos.php';
include_once '../functions/upload.php';

// Conexão com banco de dados
require_once 'connect.php';

if (isset($_POST['btnUpdate'])) {
    // Atribui o conteudo obtido dos campos do formulario a variáveis]
    $curso = pg_escape_string(CONNECT, $_POST);
    $modulo = pg_escape_string(CONNECT, $_POST);
    $nome = pg_escape_string(CONNECT, $_POST);
    $email = pg_escape_string(CONNECT, $_POST);

    // Sanitizando as variaveis (remove qualquer tag HTML)
    $curso = htmlspecialchars($curso);
    $modulo = htmlspecialchars($modulo);
    $nome = htmlspecialchars($nome);
    $email = htmlspecialchars($email);

    // Sanitizando e validando o email
    $email = sanitizaEmail($email);

    // Query para fazer o update das informações do usuario
    $sql = "UPDATE usuario SET nom_usuario ='$nome', email ='$email'";

}
?>
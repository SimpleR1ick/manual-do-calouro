<?php
// Inicia a conexão com banco de dados
require_once './db_connect.php';

// Verifica se a chave esta setada no header
if (isset($_GET['chave'])) {
    // Atribuindo conteudo do header a uma variavel
    $chave = pg_escape_string(CONNECT, $_GET['chave']);

    // Preparando uma busca ao id do usuario da chave recebida
    $sql = "SELECT id_usuario FROM usuario WHERE chave_confirma = '$chave' LIMIT 1";
    $query = pg_query(CONNECT, $sql);
    
}
?>
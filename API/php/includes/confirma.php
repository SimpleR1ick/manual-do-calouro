<?php
// Inicia a sessão
session_start();

// Inicia a conexão com banco de dados
require_once './db_connect.php';

// Verifica se a chave esta setada no header
if (isset($_GET['chave'])) {
    // Atribuindo conteudo do header a uma variavel
    $chave = pg_escape_string(CONNECT, $_GET['chave']);

    // Preparando uma busca ao id do usuario da chave recebida
    $sql = "SELECT id_usuario FROM usuario WHERE chave_confirma = '$chave' LIMIT 1";
    $query = pg_query(CONNECT, $sql);

    // Atribui a uma variavel o id deste usuario
    $id = pg_fetch_result($query, 0, 'id_usuario');

    // Verifica se a consulta teve resultado 
    if (pg_num_rows($query) == 1) {
        // Atualiza o status do usuario para ativo
        $sql = "UPDATE usuario SET ativo = 't' WHERE id_usuario = $id";
        pg_query(CONNECT, $sql);

        // Atualiza o valor da chave_confirma para NULL, desta forma excluidoa
        $sql =  "UPDATE usuario SET chave_confirma = NULL WHERE id_usuario = $id'";
        pg_query(CONNECT, $sql);

        // Adiciona uma mensagem de sucesso a sessão
        $_SESSION['sucess'] = 'Conta ativada com sucesso!';
    } else {
        // Adiciona uma mensagem de erro a sessão
        $_SESSION['mensag'] = 'Chave de ativação invalida!';
    }
    // Direciona o usuario a pagina de login
    header('Location: ../../login.php');    
} else {
    // Redireciona o usuario a pagina home
    header('Location: ../../index.php');
}
// Encerra a conexão
pg_close(CONNECT);

    


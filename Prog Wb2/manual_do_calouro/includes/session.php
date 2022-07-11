<?php
// Iniciar a sessão
session_start();

// Conectando com o banco de dados
include_once 'connect.php';

// Verificando se o usuário está logado
if (isset($_SESSION['id_usuario'])) {
    // Atribuindo à variável id ao id da sessão
    $id = $_SESSION['id_usuario'];

    // Faz uma requisição dos dados do usuario logado
    $sql = "SELECT nom_usuario, acesso, ativo FROM usuario WHERE id_usuario = '$id'";

    // Cotém as colunas que atendem a requisição acima
    $query = pg_query($connect, $sql);
    
    // Transforma as colunas em arrays, para mais fácil manipulação
    $dados = pg_fetch_array($query);

    // Fechando a conexão após armazenar os dados
    //pg_close($connect);
}
?>
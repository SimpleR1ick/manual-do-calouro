<?php
// Iniciar a sessão
session_start();

// Conectando com o banco de dados
include_once 'connect.php';

// Verificando se o usuário está logado
if (isset($_SESSION['id_usuario'])) {
    // Atribuindo à variável id o id da sessão
    $id = $_SESSION['id_usuario'];

    // Faz uma requisição do banco de dados
    $sql = "SELECT nome FROM usuarios WHERE id_user = '$id'";

    // Cotém as colunas que atendem a requisição acima
    $query = mysqli_query($connect, $sql);

    // Transforma as colunas em arrays, para mais fácil manipulação
    $dados = mysqli_fetch_array($query);

    // Fechando a conexão após armazenar os dados
    mysqli_close($connect);

}
?>
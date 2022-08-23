<?php
// Inicia a sessão
session_start();

// Conexão com banco de dados
require_once '../includes/connect.php';

// Verifica se o formulario foi de update ou delete
if (isset($_POST['btnUpdate'])) {
    crudUpdate();
}
else if (isset($_POST['btnDeletar'])) {
    crudDelete();
}

/**
 * Função para atualizar os dados de um usuario
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function crudUpdate(): void {
    // Declaração de variáveis a serem modificadas
    $id = pg_escape_string(CONNECT, $_POST['id']);
    $nome = pg_escape_string(CONNECT, $_POST['nome']);
    $email = pg_escape_string(CONNECT, $_POST['email']);

    // Query para fazer o update das informações do usuario
    $sql = "UPDATE usuario SET nom_usuario = '$nome', email = '$email' WHERE id_usuario = '$id'";

    // Verifica se o update ocorreu e redireciona para o crud_index
    if (pg_query(CONNECT, $sql)) {
        $_SESSION['mensag'] = "Atualizado com sucesso!";
        header('Location: ../../crud_index.php');

    } else {
        $_SESSION['mensag'] = "Erro ao atualizar!";
        header('Location: ../../crud_index.php');
    }
}
/**
 * Função para delete os dados de um usuario
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function crudDelete(): void {
    // Atribuindo id do usuário
    $id = pg_escape_string(CONNECT, $_POST['id']);
    
    // Query para excluir o usuário no banco de dados
    $sql = "DELETE FROM usuario WHERE id_usuario = $id";

    // Verifica se a exclusão ocorreu sem problemas
    if (pg_query(CONNECT, $sql)) {
        $_SESSION['toast'] = "Excluído com sucesso!";
        header('Location: ../../crud_index.php');
        
    } else {
        $_SESSION['toast'] = "Erro ao excluir!";
        header('Location: ../../crud_index.php');
    }
}
?>
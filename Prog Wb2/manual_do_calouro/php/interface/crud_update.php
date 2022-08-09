<?php
include_once '../includes/connect.php';

crudUpdate();
/**
 * Função para atualizar os dados de um usuario
 * 
 * @author Henriuqe Dalmagro
 */
function crudUpdate(): void {
    // Verifica se houve requisição de update/edição
    if (isset($_POST['btnUpdate'])) {
        // Declaração de variáveis a serem modificadas
        $id = pg_escape_string(_CONEXAO_, $_POST['id']);
        $nome = pg_escape_string(_CONEXAO_, $_POST['nome']);
        $email = pg_escape_string(_CONEXAO_, $_POST['email']);

        // Query para fazer o update da tabela
        $sql = "UPDATE usuario SET nom_usuario = '$nome', email = '$email' WHERE id_usuario = '$id'";
    
        // Verifica se o update aconteceu e manda o user de volta para o crud_index
        if (pg_query(_CONEXAO_, $sql)) {
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: crud_index.php');

        } else {
            $_SESSION['mensagem'] = "Erro ao atualizar!";
            header('Location: crud_index.php');
        }
    }
}
?>
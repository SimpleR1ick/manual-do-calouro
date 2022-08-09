<?php
// Invoca a função declarada
crudDelete();

/**
 * Função para deletar um usuario
 * 
 * @author Henrique Dalmagro
 */
function crudDelete(): void {
    // Verifica se existe id do usuário
    if (isset($_GET['id'])) {
        // Atribuindo id do usuário
        $id = pg_escape_string(_CONEXAO_, $_GET['id']);
        
        // Query para deletar o usuário no banco de dados
        $sql = "DELETE FROM usuario WHERE id_usuario = '$id'";

        // Verifica se o usuário foi excluído e envia o user de volta para o crud_index
        if (pg_query(_CONEXAO_, $sql)) {
            $_SESSION['toast'] = "Excluído com sucesso!";
            header('Location: crud_index.php');

        } else {
            $_SESSION['mensagem'] = "Erro ao excluir!";
            header('Location: crud_index.php');
        }
    }
}
?>
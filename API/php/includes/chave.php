<?php
/**
 * 
 * 
 * 
 */
function verificaChaveConfirma($db): bool {
    // Verifica se a chave esta setada no header
    if (isset($_GET['chave'])) {
        // Atribuindo conteudo do header a uma variavel
        $chave = pg_escape_string($db, $_GET['chave']);

        // Preparando uma busca ao id do usuario da chave recebida
        $sql = "SELECT id_usuario FROM chave WHERE chave_confirma = '$chave' LIMIT 1";
        $query = pg_query($db, $sql);

        // Verifica se a consulta teve resultado 
        if (pg_num_rows($query) == 0) {
            // Adiciona uma mensagem de erro a sessão
            $_SESSION['mensag'] = 'Chave de ativação invalida!';

            return false;  
        } 
        return true;
    }
}

/**
 * Função para limpar a chave de atiavação de um usuario
 * 
 * @param int $id do usuario
 * @return false em caso de falha
 * 
 * @author Henrique Dalmagro
 */
function excluirChaveConfirma($id): bool {
    // Atualiza o valor da chave_confirma para NULL, desta forma excluidoa
    $sql =  "UPDATE chave SET chave_confirma = NULL WHERE id_usuario = $id'";
    $result = pg_query(CONNECT, $sql);

    return $result;
}
?>
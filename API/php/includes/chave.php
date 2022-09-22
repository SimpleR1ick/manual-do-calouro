<?php
/**
 * 
 * 
 * 
 */
function validaChaveConfirma(): bool {
    // Verifica se a chave esta setada no header
    if (isset($_GET['chave'])) {
        // Atribuindo conteudo do header a uma variavel
        $chave = pg_escape_string(CONNECT, $_GET['chave']);

        // Preparando uma busca ao id do usuario da chave recebida
        $sql = "SELECT chave_confirma FROM chave WHERE chave_confirma = '$chave' LIMIT 1";
        $query = pg_query(CONNECT, $sql);

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
 * 
 * 
 * 
 */
function inserirChaveCofnrima($id): bool {
    // Gera um chave HASH unica
    $chave = sha1(uniqid(mt_rand(), true));

    $sql = "INSERT INTO chave VALUES fk_usuario_id_usuario = $id, chave_confirma ='$chave')";
 
    if (!pg_query(CONNECT, $sql)) {
        $_SESSION['mensag'] = 'Erro ao inserir a chave :(';

        return false;
    }
    return true;
}

/**
 * Função para limpar a chave de atiavação de um usuario
 * 
 * @param int $id do usuario
 * @return false em caso de falha
 * 
 * @author Henrique Dalmagro
 */
function excluirChaveConfirma($id): void {
    // Atualiza o valor da chave_confirma para NULL, desta forma excluidoa
    $sql = "DELETE FROM chave WHERE fk_id_usuario_id_usuario = $id";
    
    if (!pg_query(CONNECT, $sql)) {
        $_SESSION['mensag'] = 'Erro ao excluir a chave :(';     
    }
}
?>
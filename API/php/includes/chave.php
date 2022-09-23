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
        $sql = "SELECT * FROM chave WHERE chave_confirma ='$chave' LIMIT 1";
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
 * Função para inserir a chave de confirmação no banco de dados
 * 
 * @param int $id do usuario
 * @param string $chave sha1 gerada
 * 
 * @return bool 
 * 
 * @author Henrique Dalmagro
 */
function inserirChaveCofnrima($id, $chave): bool {
    // Consulta na tabela chave se existe alguma chave atribuida ao usuario
    $sql = "SELECT fk_usuario_id_usuario FROM chave WHERE fk_usuario_id_usuario = $id";
    $result = pg_query(CONNECT, $sql);

    // Verifica se a consulta obteve resultado
    if (pg_num_rows($result) == 0) {
        // Prepara um SQL de inserção da chave
        $sql = "INSERT INTO chave (fk_usuario_id_usuario, chave_confirma) VALUES ($id, '$chave')";

    } else {
        // Prepara um SQL de atualização da chave
        $sql = "UPDATE chave SET chave_confirma = '$chave' WHERE fk_usuario_id_usuario = $id";
    }
    
    try {
        $query = pg_query(CONNECT, $sql);

        if (!$query) {
            throw new Exception("Erro inserir a chave!");
        }
    
    // Trata a exeção com uma mensagem de erro
    } catch (Exception $e) {
        $_SESSION['mensag'] = $e->getMessage();
        
        // Retorna a pagina de home
        header('Location: ../../web/index.php'); 
        return false;
    }
    // Retorno da função
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
    $sql = "DELETE FROM chave WHERE fk_usuario_id_usuario = $id";
    
    if (!pg_query(CONNECT, $sql)) {
        $_SESSION['mensag'] = 'Erro ao excluir a chave :(';     
    }
}
?>
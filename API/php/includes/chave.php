<?php

/**
 * 
 * 
 * @author Henrique Dalmagro
 */
function gerarChaveConfirma(): string {
    // Cria uma chave hash do tipo sha1
    $chave = sha1(uniqid(mt_rand()));

    return $chave;
}

/**
 * Função para verifica se uma chave esta cadastrada no banco de dados
 * 
 * 
 * 
 * @author Henrique Dalmagro
 */
function validarChaveConfirma(): mixed {
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

            header('Location: ./index.php');

        } else {
            $result = pg_fetch_array($query);

            $id = $result['fk_usuario_id_usuario'];

            return $id;
        }
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
    // Tenta executar a query
    try {
        $query = pg_query(CONNECT, $sql);

        if (!$query) {
            throw new Exception("Erro inserir a chave!");
        }
        // Retorno da função
        return true;
    } 
    catch (Exception $e) {
        // Trata a exeção com uma mensagem de erro
        $_SESSION['mensag'] = $e->getMessage();

        return false;
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
function excluirChaveConfirma($id): void {
    // Atualiza o valor da chave_confirma para NULL, desta forma excluidoa
    $sql = "DELETE FROM chave WHERE fk_usuario_id_usuario = $id";
    
    if (!pg_query(CONNECT, $sql)) {
        $_SESSION['mensag'] = 'Erro ao excluir a chave :(';     
    }
}
?>
<?php
// Inicia a sessão
session_start();

// Inicia a conexão com banco de dados
require_once './db_connect.php';

// Abra uma conexão com o banco de dados
$db = db_connect();

// Verifica se a chave esta setada no header
if (isset($_GET['chave'])) {
    // Atribuindo conteudo do header a uma variavel
    $chave = pg_escape_string($db, $_GET['chave']);

    // Preparando uma busca ao id do usuario da chave recebida
    $sql = "SELECT id_usuario FROM usuario WHERE chave_confirma = '$chave' LIMIT 1";
    $query = pg_query($db, $sql);

    // Verifica se a consulta teve resultado 
    if (pg_num_rows($query) == 0) {
        // Adiciona uma mensagem de erro a sessão
        $_SESSION['mensag'] = 'Chave de ativação invalida!';

        // Redireciona o usuario a pagina home
        header('Location: ../../index.php');

    } else {
        // Atribui a uma variavel o id deste usuario
        $id = pg_fetch_result($query, 0, 'id_usuario');

        // verifica se updates ocorreram con sucesso
        if (ativaUsuario($id) and limpaChave($id)) {
            // Adiciona uma mensagem de sucesso a sessão
            $_SESSION['sucess'] = 'Conta ativada com sucesso!';

            // Direciona o usuario a pagina de login
            header('Location: ../../login.php');
        }
    }
}
// Encerrando a conexão
pg_close($db);

/**
 * Função para ativar o usuario do id recebido
 * 
 * @param int $id do usuario
 * @return false em caso de falha
 * 
 * @author Henrique Dalmagro
 */
function ativaUsuario($id): bool {
    // Atualiza o status do usuario para ativo
    $sql = "UPDATE usuario SET ativo = 't' WHERE id_usuario = $id";
    $result =  pg_query($GLOBALS['db'], $sql);  

    return $result;
}

/**
 * Função para limpar a chave de atiavação de um usuario
 * 
 * @param int $id do usuario
 * @return false em caso de falha
 * 
 * @author Henrique Dalmagro
 */
function limpaChave($id): bool {
    // Atualiza o valor da chave_confirma para NULL, desta forma excluidoa
    $sql =  "UPDATE usuario SET chave_confirma = NULL WHERE id_usuario = $id'";
    $result = pg_query($GLOBALS['db'], $sql);

    return $result;
}
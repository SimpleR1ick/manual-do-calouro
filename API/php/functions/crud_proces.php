<?php
/**
 * Função para obter todos os dados de um usuario atravez do id
 * 
 * @return array $userData dados do usuario
 * 
 * @author Henrique Dalmagro
 */
function crudGetDados(): array{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // 
        if (isset($_GET['id'])) {
            $id = pg_escape_string(CONNECT, $_GET['id']);

            // Seleciona na tabela usuarios um usuario com mesmo ID
            $sql = "SELECT * FROM usuario WHERE id_usuario = '$id'";
            $query = pg_query(CONNECT, $sql);

            // Retorna o resultado convertido em um array
            $userData = pg_fetch_array($query);

            return $userData;
        }
        // Encerando a conexão
        pg_close(CONNECT);
    }
}


/**
 * 
 * 
 * 
 */
function perfilAdministrativo($setor) {
    global $id;

    // Query para fazer o update das informações do administrativo
    $sql = "UPDATE administrativo SET fk_setor_id_setor = $setor
            WHERE fk_servidor_fk_usuario_id_usuario = $id";

    if (!pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao atualizar o setor';
    }
}
?>
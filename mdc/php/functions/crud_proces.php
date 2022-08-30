<?php
/**
 * Função para obter todos os dados de um usuario atravez do id
 * 
 * @return array $userData dados do usuario
 * 
 * @author Henrique Dalmagro
 */
function crudGetDados(): array{
    if (isset($_GET['id'])) {
        $id = pg_escape_string(CONNECT, $_GET['id']);

        // Seleciona na tabela usuarios um usuario com mesmo ID
        $sql = "SELECT * FROM usuario WHERE id_usuario = '$id'";
        $query = pg_query(CONNECT, $sql);

        // Retorna o resultado convertido em um array
        $userData = pg_fetch_array($query);

        return $userData;
    }
}
?>
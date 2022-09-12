<?php
// Inicia a conexão com banco de dados
require_once './db_connect.php';

if (isset($_GET['chave'])) {
    $chave = pg_escape_string(CONNECT, $_GET['chave']);

    $sql = "SELECT id_usuario FROM usuario WHERE chave_confirma = '$chave' LIMIT 1";
    $query = pg_query(CONNECT, $sql);

    $id = pg_fetch_result($query, 0, 'id_usuario');

    if (pg_num_rows($query) == 1) {

        $sql_update = "UPDATE usuario SET ativo = 't' WHERE id_usuario = $id";
        $query = pg_query(CONNECT, $sql_update);

        $sql_exclude =  "UPDATE usuario SET chave_confirma = NULL WHERE id_usuario = $id'";
        $query = pg_query(CONNECT, $sql_exclude);

        pg_close(CONNECT);
    }
}

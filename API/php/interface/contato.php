<?php
function imprimeContato($filtro = 0) {
    // Abrindo a conexão com o banco
    $db = db_connect();

    switch ($filtro) {
        case 0:
            // SELECT para pegar os dados necessários para todos os contatos
            $sql = "SELECT nom_usuario, img_perfil, dsc_contato, dsc_tipo FROM usuario u JOIN servidor s ON (u.id_usuario = s.fk_usuario_id_usuario) JOIN contato c ON (s.fk_usuario_id_usuario = c.fk_servidor_fk_usuario_id_usuario) JOIN tipo_contato tc ON (c.fk_tipo_contato_id_tipo = tc.id_tipo)";

            break;

        case 1:
            // SELECT para pegar os dados necessários para todos os contatos
            $sql = "SELECT nom_usuario, img_perfil, dsc_contato, dsc_tipo FROM usuario u JOIN servidor s ON (u.id_usuario = s.fk_usuario_id_usuario) JOIN contato c ON (s.fk_usuario_id_usuario = c.fk_servidor_fk_usuario_id_usuario) JOIN tipo_contato tc ON (c.fk_tipo_contato_id_tipo = tc.id_tipo) JOIN professor p ON (s.fk_usuario_id_usuario = p.fk_servidor_fk_usuario_id_usuario)";

            break;

        case 2:
            // SELECT para pegar os dados necessários para todos os contatos
            $sql = "SELECT nom_usuario, img_perfil, dsc_contato, dsc_tipo FROM usuario u JOIN servidor s ON (u.id_usuario = s.fk_usuario_id_usuario) JOIN contato c ON (s.fk_usuario_id_usuario = c.fk_servidor_fk_usuario_id_usuario) JOIN tipo_contato tc ON (c.fk_tipo_contato_id_tipo = tc.id_tipo) JOIN administrativo a ON (s.fk_usuario_id_usuario = a.fk_servidor_fk_usuario_id_usuario)";

            break;
    }
    
    // Query para pegar os dados do SELECT
    $query = pg_query($db, $sql);

    // Transformando os dados da query em um array
    $contatos = pg_fetch_all($query);

    // Fechando a conexão com o banco
    pg_close($db);



}
?>
<?php
function imprimeContato($filtro = 0) {
    $db = db_connect();

    switch ($filtro) {
        case 0:
            $sql = "select nom_usuario, img_perfil, dsc_contato, dsc_tipo from usuario u join servidor s on u.id_usuario = s.fk_usuario_id_usuario join contato c on s.fk_usuario_id_usuario = c.fk_servidor_fk_usuario_id_usuario join tipo_contato tc on c.fk_tipo_contato_id_tipo = tc.id_tipo";
            
            break;

        case 1:
        
            break;

        case 2:

            break;
    }
}
?>
<?php
// Inicia a sessão
session_start();

// Conexão com banco de dados
require_once '../includes/connect.php';

$dir = '../../img/perfil/';

define('PATH', $dir);

$nome = pg_escape_string(CONNECT, $_FILES['foto']['name']);

$nome_temp = $_FILES['foto']['tmp_name'];
$foto_size = $_FILES['foto']['size'];

$nome_novo = renomearFoto($nome);

armazenaFoto($nome_novo, $nome_temp, $foto_size);

/**
 * 
 * 
 * 
 * 
 */
function renomearFoto($nome): string {
    $path = pathinfo($nome);

    $id = $_SESSION['id_usuario'];
    $type = $path['extension'];

    return $id.'.'.$type;
}

/**
 * 
 * 
 * 
 * 
 */
function armazenaFoto($novo_nome, $nome_temp, $foto_size): void {
    $id = $_SESSION["id_usuario"];

    if ($foto_size < 33554432) {
        $sql = "UPDATE usuario SET img_perfil ='$novo_nome' WHERE id_usuario ='$id'";
        $query = pg_query(CONNECT, $sql);

        if ($query) {
            move_uploaded_file($nome_temp, PATH.$novo_nome);
        }
    }
}


?>
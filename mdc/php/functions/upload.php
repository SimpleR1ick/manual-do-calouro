<?php
// Inicia a sessão
session_start();

// Conexão com banco de dados
require_once '../includes/connect.php';

uploadFoto();

/**
 * 
 * 
 * 
 * @author Henrique Dalmagro
 */
function uploadFoto() {
    if (isset($_SESSION['id_usuario'])) {
        $id = $_SESSION['id_usuario'];

        $fotoNome = pg_escape_string(CONNECT, $_FILES['foto']['name']);

        $fotoTpmNome = $_FILES['foto']['tmp_name'];
        $fotoTamanho = $_FILES['foto']['size'];

        $fotoNewName = $id . $fotoNome;

        //echo filetype($fotoTpmNome);
        //echo $fotoNome . "<br>";
        //echo $fotoTpmNome . "<br>";
        //echo $fotoTamanho . "<br>";

        if ($fotoTamanho < $_POST['MAX_FILE_SIZE']) {
            $sql = "UPDATE usuario SET img_perfil='' WHERE id_usuario = '$id'";
            //$query = pg_query(CONNECT, $sql)
            move_uploaded_file($fotoTpmNome, "../../img/perfil/" . $fotoNewName);
        }
    }    
}
?>
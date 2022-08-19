<?php
// Caminho da pasta com imagens dos usuarios
$uploadDir = "img/perfil/";

// Definindo a variavel com path como constante
define('UPLOADS', $uploadDir);

uploadFoto();

/**
 * 
 * 
 * 
 * @author Henrique Dalmagro
 */
function uploadFoto() {
    $fotoNome = pg_escape_string($_FILES['foto']['name']);
    $fotoTpmNome = $_FILES['foto']['tmp_name'];

    $fotoTamanho = $_FILES['foto']['size'];
    
    $fotoNovoNome = rand().$fotoNome;

    echo $fotoTpmNome;
    echo $fotoNovoNome;
    
}
?>
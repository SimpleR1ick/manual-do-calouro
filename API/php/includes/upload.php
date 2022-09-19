<?php
session_start();

define('DIR', 'assets/uploads/');

// Nome da foto, nome temporario no servidor e tamanho da foto
$foto_nome = $_FILES['foto']['name'];
$foto_size = $_FILES['foto']['size'];
$path_temp = $_FILES['foto']['tmp_name'];

// Verifica se o tamanho da foto esta no limite permitido
if ($foto_size > $_POST['MAX_FILE_SIZE']) {
    $_SESSION['mensag'] = 'Tamanho limite da foto foi excedido';

} else {
    $sql = "UPDATE usuario SET img_perfil ='$nome_final' 
            WHERE id_usuario = '{$_SESSION['id_usuario']}'";

    if (pg_query(CONNECT, $sql)) {
        move_uploaded_file($nome_temp, DIR.$nome_final);
        $_SESSION['sucess'] = 'Foto atualizada com sucesso!';

    } else {
        $_SESSION['mensag'] = 'Erro ao atualizar foto!';
    }
}    
?>
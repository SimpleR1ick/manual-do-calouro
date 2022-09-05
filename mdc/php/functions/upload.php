<?php

// Verifica a a imagem existe
if ($_FILES['foto'] != NULL) {
    // Nome da foto, nome temporario no servidor e tamanho da foto
    $nome_foto = pg_escape_string(CONNECT, $_FILES['foto']['name']);
    $nome_temp = $_FILES['foto']['tmp_name'];
    $foto_size = $_FILES['foto']['size'];

    // Dados da foto
    $path = pathinfo($nome_foto);

    // Renomeando a foto com o id do usuario e mantendo a extensão do arquivo
    $nome_final = time().'.'.$path['extension'];

    // Verifica se o tamanho da foto esta no limite permitido
    if ($foto_size < $_POST['MAX_FILE_SIZE']) {
        $sql = "UPDATE usuario SET img_perfil ='$novo_nome' WHERE id_usuario = ID";

        if (pg_query(CONNECT, $sql)) {
            if (move_uploaded_file($nome_temp, 'img/uploads/'.$novo_nome)) {
                $_SESSION['sucess'] = 'Foto atualizada com sucesso!';
            }
        } else {
            $_SESSION['mensag'] = 'Erro ao atualizar foto!';
        }
    } 
    $_SESSION['mensag'] = 'Tamanho limite da foto foi excedido';
}
?>
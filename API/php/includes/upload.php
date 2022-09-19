<?php
/**
 * Função para mover um arquivo recebido via opload
 * 
 * @param int $foto_size
 * @param string $nome_temp
 * @param string $nome_novo
 * 
 * @author Henrique Dalmagro
 */
function uploadImagemPerfil($foto_size, $nome_temp, $nome_novo): void {
    // Verifica se o tamanho da foto esta no limite permitido
    if ($foto_size > $_POST['MAX_FILE_SIZE']) {
        $_SESSION['mensag'] = 'Tamanho limite da foto foi excedido';

    } else {
        $sql = "UPDATE usuario SET img_perfil ='$nome_novo' 
                WHERE id_usuario = '{$_SESSION['id_usuario']}'";

        if (pg_query(CONNECT, $sql)) {
            move_uploaded_file($nome_temp, '../../assets/uploads/'.$nome_novo);
            $_SESSION['sucess'] = 'Foto atualizada com sucesso!';

        } else {
            $_SESSION['mensag'] = 'Erro ao atualizar foto!';
        }
    }    
}
?>
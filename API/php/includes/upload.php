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

/**
 * 
 * @param string $nome_foto
 * 
 */
function nomeFoto($nome_foto): void {
    $sql = "SELECT img_perfil FROM usuario WHERE id_usuario = '{$_SESSION['id_usuario']}'";
    $query = pg_query(CONNECT, $sql);

    if ($query != null) {
        $result = pg_fetch_all($query);

        // Utiliza o mesmo nome do banco para atualizar a foto
        $nome_final = $result['img_perfil'];
    
    } else {
        // Transforma em um array os dados da foto ('dirname', 'basename', 'extension', 'filename')
        $path = pathinfo($nome_foto);

        // Renomeando a foto com o id do usuario e mantendo a extensão do arquivo
        $nome_final = time().'.'.$path['extension'];
    }
    return $nome_final;
}
?>
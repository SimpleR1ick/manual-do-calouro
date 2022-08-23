<?php
// Definindo como constante global a pasta das fotos de perfil
$dir = 'img/perfil/';
define('PATH', $dir);

// Nome da foto, nome temporario no servidor e tamanho da foto
$nome_foto = pg_escape_string(CONNECT, $_FILES['foto']['name']);
$nome_temp = $_FILES['foto']['tmp_name'];
$foto_size = $_FILES['foto']['size'];

// Dados da foto
$path = pathinfo($nome_foto);

// Renomeando a foto com o id do usuario e mantendo a extensão do arquivo
$nome_novo = $_SESSION['id_usuario'].'.'.$path['extension'];

armazenaFoto($nome_novo, $nome_temp, $foto_size);

/**
 * Função para atualizar a foto de perfil
 * 
 * @param string $novo_nome nome do arquivo de imagem com o id do usuarios
 * @param string $nome_temp nome temporario no arquivo do servidor
 * @param int $foto_size tamanho em mb da foto 
 *
 * @author Henrique Dalmagro
 */
function armazenaFoto($novo_nome, $nome_temp, $foto_size): void {
    $id = $_SESSION["id_usuario"];

    if ($foto_size < 33554432) {
        $sql = "UPDATE usuario SET img_perfil ='$novo_nome' WHERE id_usuario ='$id'";
        $query = pg_query(CONNECT, $sql);

        if ($query) {
            move_uploaded_file($nome_temp, PATH.$novo_nome);
            header('location: perfil.php');
        }
    }
}
?>
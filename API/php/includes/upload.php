<?php
/**
 * Função para mover um arquivo recebido via upload
 * 
 * @param int $foto_size
 * @param string $nome_temp
 * @param string $nome_novo
 * 
 * @author Henrique Dalmagro
 */
function uploadImagemPerfil($foto_nome, $foto_size, $path_temp): void {
    // Declaração de variavel - pasta destino
    $dir = '../../assets/uploads/';

    // Verifica se o tamanho da foto esta no limite permitido
    if ($foto_size < $_POST['MAX_FILE_SIZE']) {
        // Atualiza o nome da foto do usuario
        $sql = "UPDATE usuario SET img_perfil ='$foto_nome' 
                WHERE id_usuario = '{$_SESSION['id_usuario']}'";

        // Verifica se o update ocorreu e armazena a foto na pasta de uploads
        if (pg_query($sql)) {
            // Concatenando o caminho
            $path = $dir.$foto_nome;

            if (move_uploaded_file($path_temp, $path)) {
                // adiciona uma mensagem de sucesso a sessão
                $_SESSION['sucess'] = 'Foto atualizada com sucesso!';
            }
        } else {
            // Adiciona uma mensagem de erro a sessão
            $_SESSION['mensag'] = 'Erro ao atualizar foto!';
        }  
    } else {
        // Informa que o arquivo e maior do que o permitido
        $_SESSION['toast'] == 'Tamanho limite de arquivo execedido';
    }        
}
?>
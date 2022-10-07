<?php
/**
 * Função para verificar se o usuario ja possui uma imagem de perfil ou não
 * 
 * @param string $nome_foto nome do arquivo de imagem
 * @return string $nome_novo 
 * 
 * @author Henrique Dalmagro
 */
function atualizarNomeFotoUsuario($nome_foto): string {
    // Escapa a string no formatado para o banco de dados
    $nome_foto = pg_escape_string(CONNECT, $nome_foto);

    // Consulta a coluna img_perfil de um usuario
    $sql = "SELECT img_perfil FROM usuario WHERE id_usuario = '{$_SESSION['id_usuario']}' AND img_perfil IS NOT NULL";
    $query = pg_query(CONNECT, $sql);

    if (pg_num_rows($query) == 1) {
        // Transforma o resultado da query em um array
        $result = pg_fetch_array($query);
        $nome_novo = $result['img_perfil'];
    
    } else {
        // Transforma os dados da foto em um array de chaves ('dirname', 'basename', 'extension', 'filename')
        $path = pathinfo($nome_foto);
        $nome_novo = time().'.'.$path['extension'];
    }
    return $nome_novo;  
}

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
                WHERE id_usuario = {$_SESSION['id_usuario']}";

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
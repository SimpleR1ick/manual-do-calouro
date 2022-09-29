<?php
// Iniciar a sessão
session_start();

// Inicia a conexão com banco de dados
require_once '../includes/connect.php';

// Import de bibliotecas de funções
include_once '../functions/sanitiza.php';
include_once '../functions/valida.php';
include_once '../functions/usuario.php';
include_once '../includes/upload.php';

// Definindo as constantes globais
define('CONNECT', db_connect());   // Conexão

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Verifica se algum campo possui caracter indesejados
    if (validaFormulario($_POST)) {
        header("Location: '{$_SERVER['HTTP_REFERER']}'");
        exit();
    }
    // Verifica a a imagem existe
    if (is_uploaded_file(($_FILES['foto']['tmp_name']))) {        
        // Nome da foto, tamanho da foto, nome temporario no servidor
        $foto_nome = $_FILES['foto']['name'];
        $foto_size = $_FILES['foto']['size'];
        $path_temp = $_FILES['foto']['tmp_name'];
        
        // Prepara o nome do arquivo para ser movido
        $foto_nome = atualizarNomeFotoUsuario($foto_nome);

        // Atualiza o nome no banco e move o arquivo
        uploadImagemPerfil($foto_nome, $foto_size, $path_temp);  
    } 
    // Verifica se o botão foi pressionado
    if (isset($_POST['btnIncrement'])) {
        // Sanitização
        $dados = sanitizaFormulario($_POST); 

        // Armazenado o id da sessão em uma variavel
        $id = $_SESSION['id_usuario'];

        // Atribui os conteudos obtido dos camps nome e email do formulario
        $nome = $dados['nome'];
        $email = $dados['email'];
        $acesso = $dados['acesso'];

        // Variavel com caminho da pagina
        $uri = '../../web/perfis.php';

        // Nivel de acesso recebido via post em um hyden input
        if ($acesso == 3) {
            // Atribui o conteudo obtido dos campos modulo e curso do formulario
            $modulo = $dados['modulo'];
            $curso = $dados['curso'];

            if (!empty($modulo) && !empty($curso)) {
                atualizarUsuarioAluno($id, $modulo, $curso);
            }
        }  
        
        if ($acesso == 4) {
            // Atribui o conteudo obtido do campo regras do formulario
            $regras = $dados['regras'];

            if (!empty($regras)) {
                atualizarUsuarioProfessor($id, $regras);
            } 
        }

        // Validações
        if (validaNome($nome, $uri) && validaEmail($email, $uri)) {
            // Verificações
            if (verificaEmail($email, $uri)) {
                // Atualiza o nome e email de um usuário
                atualizarDadosUsuario($id, $nome, $email, $uri);
            }
        } 
    }
}
// Encerando a conexão
pg_close(CONNECT);
?>
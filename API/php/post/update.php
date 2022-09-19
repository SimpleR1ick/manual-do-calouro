<?php
// Iniciar a sessão
session_start();

// Inicia a conexão com banco de dados
require_once '../includes/db_connect.php';

// Função de upload de imagem
require_once '../includes/upload.php';

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';
include_once '../functions/validar.php';
include_once '../functions/processar.php';

// Definindo as constantes globais
define('PATH', '../../perfis.php'); // Caminho da pagina
define('DIR', 'assets/uploads/'); //  o caminho de upload
define('CONNECT', db_connect());   // Conexão

// Armazenado o id da sessão em uma variavel
$id = $_SESSION['id_usuario'];

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Verifica a a imagem existe
    if ($_FILES['foto'] != null) {        
        // Nome da foto, tamanho da foto, nome temporario no servidor
        $foto_nome = $_FILES['foto']['name'];
        $foto_size = $_FILES['foto']['size'];
        $path_temp = $_FILES['foto']['tmp_name'];

        $novo_nome = getNomeFoto($foto_nome);

        uploadImagemPerfil($foto_size, $path_temp, $novo_nome);
    } 

    if (sanitizaInjectHtmlPOST($_POST, PATH)) {
        // Sanitização
        $_POST = sanitizaCaractersPOST($_POST);
        
        // Atribui os conteudos obtido dos camps nome e email do formulario
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $acesso = $_POST['acesso'];

        // Validações
        if (validaNome($nome, PATH) && validaEmail($email, PATH)) {
            // Verificações
            if (verificaEmail($email, PATH)) {
                // Atualiza o nome e email de um usuário
                atualizarDadosUsuario($id, $nome, $email, PATH);
            }
        }
        // Nivel de acesso recebido via post em um hyden input
        switch ($acesso) {
            case 1:
                // Atribui o conteudo obtido dos campos modulo e curso do formulario
                $modulo = $_POST['modulo'];
                $curso = $_POST['curso'];

                atualizarPerfilAluno($id, $modulo, $curso);

            case 2:
                // Atribui o conteudo obtido do campo regras do formulario
                $regras = $_POST['regras'];

                atualizarPerfilProfessor($id, $regras);
        }
    }
} 
// Encerando a conexão
pg_close(CONNECT);

/**
 * Função para definir o nome de foto de perfil
 * 
 * @param string $nome_foto
 * 
 * @return string nome final do arquivo
 * 
 * @author Henrique Dalmagro
 */
function getNomeFoto($nome_foto): string {
    if (isset($_SESSION['id_usuario'])) {
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
}

?>
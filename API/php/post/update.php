<?php
// Iniciar a sessão
session_start();

// Inicia a conexão com banco de dados
require_once '../includes/db_connect.php';

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';
include_once '../functions/validar.php';
include_once '../functions/processar.php';

// Definindo as constantes globais
define('PATH', '../../perfis.php'); // Caminho da pagina
define('CONNECT', db_connect());   // Conexão

// Armazenado o id da sessão em uma variavel
$id = $_SESSION['id_usuario'];

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
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
        // Verifica a a imagem existe
        if ($_FILES['foto'] != NULL) {
            include_once './upload.php';
        }   
    }
}
// Encerando a conexão
pg_close(CONNECT);
?>
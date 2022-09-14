<?php
// Iniciar a sessão
session_start();

// Inicia a conexão com banco de dados
require_once 'db_connect.php';

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';
include_once '../functions/verificar.php';

// Definindo como constante global o caminho em caso de erro
$dir = '../../perfis.php';
define('PATH', $dir);

// Armazenado o id da sessão em uma variavel
$id = $_SESSION['id_usuario'];

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se o POST foi enviado pelo botão
    if (isset($_POST['btnIncrement'])) {
        // Sanitização
        $_POST = sanitizaPost($_POST); 
        
        if (verificaInjectHtml($_POST)) {
            $_SESSION['mensag'] = 'Erro ao atualizar o perfil!';
            header('Location: ../../perfis.php'); // Retorna para o perfil
        
        }
        // Nivel de acesso recebido via post em um hyden input
        switch ($_POST['acesso']) {
            case 1:
                // Atribui o conteudo obtido dos campos modulo e curso do formulario
                $modulo = pg_escape_string(CONNECT, $_POST['modulo']);
                $curso = pg_escape_string(CONNECT, $_POST['curso']);

                perfilAluno($modulo, $curso);

            case 2:
                // Atribui o conteudo obtido do campo regras do formulario
                $regras = pg_escape_string(CONNECT, $_POST['regras']);

                perfilProfessor($regras);
        }
        // Atribui os conteudos obtido dos camps nome e email do formulario
        $nome = pg_escape_string(CONNECT, $_POST['nome']);
        $email = pg_escape_string(CONNECT, $_POST['email']);

        // Validações
        if (validaNome($nome, PATH) && validaEmail($email, PATH)) {
            // Verifica se o email ja consta no banco de dados
            if (verificaEmail($email, PATH)) {
                // Função que atualiza o nome e email de um usuário cadastrado
                atualizaDadosUsuario($nome, $email);
            }   
        }
        // Encerando a conexão
        pg_close(CONNECT);
    }
}
/**
 * Função para inserir o curso e o modulo do aluno
 * 
 * @param string $curso código único do curso
 * @param string $modulo código único do módulo
 * 
 * @author Rafael Barros - Henrique Dalmagro
 */
function perfilAluno($modulo, $curso) {
    global $id;

    // Fazer verificação se o aluno ja esta cadastrado
    $sql = "SELECT fk_usuario_id_usuario FROM aluno WHERE fk_usuario_id_usuario = $id)";
    $query = pg_query(CONNECT, $sql);

    if (pg_num_rows($query) > 0) {
        $sql = "UPDATE aluno SET fk_turma_id_turma = (SELECT id_turma FROM turma
                WHERE num_modulo = $modulo
                AND fk_curso_id_curso = $curso)
                WHERE fk_usuario_id_usuario = $id";
    } else {
        // Query para fazer o update das informações do aluno
        $sql = "INSERT INTO aluno (fk_usuario_id_usuario, fk_turma_id_turma) VALUES
                ($id, (SELECT id_turma FROM turma
                WHERE num_modulo = $modulo
                AND fk_curso_id_curso = $curso))";
    }
    if (!pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de sucesso
        $_SESSION['mensag'] = 'Erro ao atualizar curso e modulo!';
    }
}

/**
 * 
 * 
 * 
 * @author Rafael Barros - Henrique Dalmagro
 */
function perfilProfessor($regras) {
    global $id;

    // Query para fazer o update das informações do professor
    $sql = "UPDATE professor SET regras = '$regras'
            WHERE fk_servidor_fk_usuario_id_usuario = $id";

    if (!pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao atualizar as regras!';
    }  
}
?>
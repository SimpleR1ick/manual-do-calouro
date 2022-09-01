<?php
// Iniciar a sessão
session_start();

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';
include_once '../functions/upload.php';

// Conexão com banco de dados
require_once 'connect.php';

if (isset($_POST['btnIncrement'])) {
    if (sanitizaPost($_POST)) {
        $_SESSION['mensag'] = 'Erro ao atualizar o perfil!';
        header('Location: ../../perfil.php'); // Retorna para o perfil
    
    }
    if ($_POST['acesso'] == 1) {
        // Atribui o conteudo obtido dos campos do formulario a variáveis]
        $curso = pg_escape_string(CONNECT, $_POST['curso']);
        $modulo = pg_escape_string(CONNECT, $_POST['modulo']);
        $nome = pg_escape_string(CONNECT, $_POST['nome']);
        $email = pg_escape_string(CONNECT, $_POST['email']);

        inserirCursoModulo($curso, $modulo);

        atualizaDadosUsuario($nome, $email);

    } else if ($_POST['acesso'] == 2) {
        $regras = pg_escape_string(CONNECT, $_POST['regras']);
        $nome = pg_escape_string(CONNECT, $_POST['nome']);
        $email = pg_escape_string(CONNECT, $_POST['email']);
    }
    $_SESSION['sucess'] = 'Perfil atualizado com sucesso!';
    header('Location: ../../perfil.php');

    $_SESSION['mensag'] = 'Erro ao atualizar perfil!';
    header('Location: ../../perfil.php');
}
    
/**
 * Função para atualizar os dados do usuario
 * 
 * @param string $nome um nome qualquer
 * @param string $email um email qualquer
 * 
 * @author Henrique Dalmagro
 */
function atualizaDadosUsuario($nome, $email): void {
    // Query para fazer o update das informações do usuário
    $sql = "UPDATE usuario SET nom_usuario = '$nome', email = '$email' 
            WHERE id_usuario = {$_SESSION['id_usuario']}";

}
/**
 * Função para inserir o curso e o modulo do aluno
 * 
 * @param string $curso código único do curso
 * @param string $modulo código único do módulo
 * 
 * @author Rafael Barros
 */
function inserirCursoModulo($curso, $modulo): void {
    // Query para fazer o update das informações do aluno
    $sql = "INSERT INTO aluno (fk_usuario_id_usuario, fk_turma_id_turma) VALUES
            ({$_SESSION['id_usuario']},
            (SELECT id_turma
            FROM turma
            WHERE num_modulo = $modulo
            AND fk_curso_id_curso = $curso))";

    // Verfica se o update funcionou e guarda uma mensagem de acordo
    if (pg_query(CONNECT, $sql)) {
        

    } else {
        
    }
}

function inserirRegras(): void {
    // Query para fazer o update das informações do professor
    $sql = "INSERT INTO professor (fk_servidor_fk_usuario_id_usuario, regras) VALUES
            ()"
}
?>
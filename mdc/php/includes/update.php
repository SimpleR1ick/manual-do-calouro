<?php
// Iniciar a sessão
session_start();

// Conexão com banco de dados
require_once 'connect.php';

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';
include_once '../functions/upload.php';

// Definindo como constante global o id da sessão atual
$id = $_SESSION['id_usuario'];
define('ID', $id);

if (isset($_POST['btnIncrement'])) {
    if (sanitizaPost($_POST)) {
        $_SESSION['mensag'] = 'Erro ao atualizar o perfil!';
        header('Location: ../../perfis.php'); // Retorna para o perfil
    
    }
    // Armazena do a array a uma variavel o nivel de acesso do usuario
    $acesso = $_POST['acesso'];

    if ($acesso == 1) {
        perfilAluno();

    } else if ($acesso == 2) {
        perfilProfessor();
    }

    atualizaDadosUsuario();

    // Encerando a conexão
    pg_close(CONNECT);
}
 
/**
 * 
 * 
 * 
 * @author Rafael Barros - Henrique Dalmagro
 */
function perfilProfessor(): void {
    $regras = pg_escape_string(CONNECT, $_POST['regras']);

    // Query para fazer o update das informações do professor
    $sql = "INSERT INTO professor (fk_servidor_fk_usuario_id_usuario, regras) VALUES
            (ID, $regras)";
}

/**
 * Função para inserir o curso e o modulo do aluno
 * 
 * @param string $curso código único do curso
 * @param string $modulo código único do módulo
 * 
 * @author Rafael Barros - Henrique Dalmagro
 */
function perfilAluno(): void {
    // Atribui o conteudo obtido dos campos do formulario a variáveis]
    $modulo = pg_escape_string(CONNECT, $_POST['modulo']);
    $curso = pg_escape_string(CONNECT, $_POST['curso']);

    // Fazer verificação se o aluno ja esta cadastrado
    $sql = "SELECT fk_usuario_id_usuario FROM aluno WHERE fk_usuario_id_usuario = 'ID')";
    $query = pg_query(CONNECT, $sql);

    if (pg_num_rows($query) > 0) {
        // Query para fazer o update das informações do aluno
        $sql = "INSERT INTO aluno (fk_usuario_id_usuario, fk_turma_id_turma) VALUES
                (ID,
                (SELECT id_turma
                FROM turma
                WHERE num_modulo = $modulo
                AND fk_curso_id_curso = $curso))";
    } else {
        $sql = "UPDATE aluno 
                SET fk_usuario_id_usuario = 
                fk_turma_id_turma 
                WHERE id_usuario =ID";
    }
    pg_query(CONNECT, $sql);
}
    
/**
 * Função para atualizar os dados do usuario
 * 
 * @param string $nome um nome qualquer
 * @param string $email um email qualquer
 * 
 * @author Henrique Dalmagro
 */
function atualizaDadosUsuario(): void {
    $nome = pg_escape_string(CONNECT, $_POST['nome']);
    $email = pg_escape_string(CONNECT, $_POST['email']);

    // Query para fazer o update das informações do usuário
    $sql = "UPDATE usuario SET nom_usuario = '$nome', email = '$email' 
            WHERE id_usuario = {$_SESSION['id_usuario']}";

    if (pg_query(CONNECT, $sql)) {
        $_SESSION['sucess'] = 'Perfil atualizado com sucesso!';
        header('Location: ../../index.php');
    } else {
        $_SESSION['mensag'] = 'Erro ao atualizar perfil!';
        header('Location: ../../perfis.php');
    }
}
?>
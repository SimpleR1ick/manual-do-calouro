<?php
// Iniciar a sessão
session_start();

// Conexão com banco de dados
require_once 'connect.php';

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';
include_once '../functions/verifica_valida.php';

//include_once '../functions/upload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Definindo como constante global o caminho em caso de erro
    $dir = '../../perfis.php';
    define('PATH', $dir);

    if (isset($_POST['btnIncrement'])) {
        if (verificaInjectHtml($_POST)) {
            $_SESSION['mensag'] = 'Erro ao atualizar o perfil!';
            header('Location: ../../perfis.php'); // Retorna para o perfil
        
        }
        // Armazena em uma variavel o nivel de acesso via post em um hyden input
        $acesso = $_POST['acesso'];

        $nome = pg_escape_string(CONNECT, $_POST['nome']);
        $email = pg_escape_string(CONNECT, $_POST['email']);

        // Verifica se o email ja consta no banco de dados
        if (verificaEmail($email, PATH)) {
            
            atualizaDadosUsuario($nome, $email);

            switch ($acesso) {
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
        }
        // Encerando a conexão
        pg_close(CONNECT);
    }
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
            WHERE id_usuario = '{$_SESSION['id_usuario']}'";

    $query = pg_query(CONNECT, $sql);

    if ($query) {
        // Adiciona à sessão uma mensagem de sucesso
        $_SESSION['sucess'] = 'Perfil atualizado com sucesso!';

        // Retorna a pagina home
        header('Location: ../../index.php');
    } else {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao atualizar perfil!';

        // Retorna a pagina perfil
        header('Location: ../../perfis.php');
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
    // Fazer verificação se o aluno ja esta cadastrado
    $sql = "SELECT fk_usuario_id_usuario FROM aluno WHERE fk_usuario_id_usuario = '{$_SESSION['id_usuario']}')";
    $query = pg_query(CONNECT, $sql);

    if (pg_num_rows($query) > 0) {
        $sql = "UPDATE aluno
                SET fk_usuario_id_usuario = 
                (SELECT id_turma
                FROM turma
                WHERE num_modulo = $modulo
                AND fk_curso_id_curso = $curso)
                WHERE id_usuario = '{$_SESSION['id_usuario']}'";
    } else {
        // Query para fazer o update das informações do aluno
        $sql = "INSERT INTO aluno (fk_usuario_id_usuario, fk_turma_id_turma) VALUES
                ('{$_SESSION['id_usuario']}',
                (SELECT id_turma
                FROM turma
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
    // Query para fazer o update das informações do professor
    $sql = "UPDATE professor SET regras = '$regras'
            WHERE fk_servidor_fk_usuario_id_usuario = '{$_SESSION['id_usuario']}'";

    if (!pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de sucesso
        $_SESSION['mensag'] = 'Erro ao atualizar as regras!';
    }  
}
?>
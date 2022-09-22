<?php
/**
 * Função para inserir o curso e o modulo do aluno
 * 
 * @param int $id
 * @param int $curso código único do curso
 * @param int $modulo código único do módulo
 * 
 * @author Rafael Barros - Henrique Dalmagro
 */
function atualizarUsuarioAluno($id, $modulo, $curso) {
    // Fazer verificação se o aluno ja esta cadastrado
    $sql = "SELECT fk_usuario_id_usuario FROM aluno WHERE fk_usuario_id_usuario = $id";
    $query = pg_query(CONNECT, $sql);

    if (pg_num_rows($query) > 0) {
        $sql = "UPDATE aluno SET fk_turma_id_turma = (SELECT id_turma FROM turma 
                WHERE num_modulo = $modulo 
                AND fk_curso_id_curso = $curso) 
                WHERE fk_usuario_id_usuario = $id";
    } else {
        // Query para fazer o update das informações do aluno
        $sql = "UPDATE usuario SET fk_acesso_id_acesso = 3
                WHERE id_usuario = $id;
                INSERT INTO aluno (fk_usuario_id_usuario, fk_turma_id_turma) VALUES
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
 * @param int $id
 * @param string $regras
 * 
 * @author Rafael Barros - Henrique Dalmagro
 */
function atualizarUsuarioProfessor($id, $regras) {
    // Query para fazer o update das informações do professor
    $sql = "UPDATE professor SET regras ='$regras'
            WHERE fk_servidor_fk_usuario_id_usuario = $id";

    if (!pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao atualizar as regras!';
    }  
}

/**
 * 
 * @param int $id
 * @param int $setor
 * 
 * @author Henrique Dalmagro
 */
function atualizarUsuarioAdministrativo($id, $setor) {
    // Query para fazer o update das informações do administrativo
    $sql = "UPDATE administrativo SET fk_setor_id_setor = $setor
            WHERE fk_servidor_fk_usuario_id_usuario = $id";

    if (!pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao atualizar o setor';
    }
}
?>
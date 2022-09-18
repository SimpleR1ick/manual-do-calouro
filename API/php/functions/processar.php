<?php
/**
 * Função para cadastrar o usuario 
 * 
 * @param string $nome 
 * @param string $email 
 * @param string $senha 
 * 
 * @author Henrique Dalmagro
 */
function cadastrarUsuario($nome, $email, $senhaHash, $path): void {
    // Preparando a requisição de inserção de dados
    $sql = "INSERT INTO usuario (nom_usuario, email, senha) VALUES ('$nome', '$email', '$senhaHash')";
    
    // Se a requição houve retorno, o insert teve sucesso
    if (pg_query(CONNECT, $sql)) {
        // Adiciona minha sessão uma mensagem de sucesso
        $_SESSION['sucess'] = 'Cadastrado com sucesso!';

        // Envia o usuário de à página de login
        header('Location: ../../login.php');

    } else {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao cadastrar!';

        // Retorna para o cadastro
        header("Location: $path"); 
    }
}

/**
 * Função para executar o login no website
 * 
 * @param string $email um email sanitizado
 * @param string $senhaHash uma senha sanitizada e criptografada
 * 
 * @author Henrique Dalmagro
 */
function logarUsuario($email, $senhaHash): void {
    // Preparando uma requisição ao banco de dados
    $sql = "SELECT id_usuario FROM usuario WHERE email = '$email' AND senha = '$senhaHash'";
    $query = pg_query(CONNECT, $sql);

    // Transforma o resultado da requisição em um array enumerado
    $result = pg_fetch_row($query);

    // Verifica se a inserção teve resultado
    if (pg_num_rows($query) == 1) {
        // Adiciona a sessão o id retornado do banco
        $_SESSION['id_usuario'] = $result[0];
        
        // retorna para pagina home
        header('Location: ../../index.php'); 
    } else {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Usuário ou senha inválidos!';

        // retorna para página de login
        header('Location: ../../login.php'); 
    }
}

/**
 * Função para atualizar os dados do usuario
 * 
 * @param string $email um email qualquer
 * 
 * @author Henrique Dalmagro
 */
function atualizarDadosUsuario($id, $nome, $email, $path): void {
    // Query para fazer o update das informações do usuário
    $sql = "UPDATE usuario SET nom_usuario = '$nome', email = '$email' 
            WHERE id_usuario = $id";
   
    // Verifica se a query de update obteve sucesso
    if (pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de sucesso
        $_SESSION['sucess'] = 'Perfil atualizado com sucesso!';

    } else {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao atualizar perfil!';  
    }
    // Retorna a pagina perfil
    header("Location: $path");
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

/**
 * 
 * 
 * 
 */
function perfilAdministrativo($setor) {
    // Query para fazer o update das informações do administrativo
    $sql = "UPDATE administrativo SET fk_setor_id_setor = $setor
            WHERE fk_servidor_fk_usuario_id_usuario = 'id'";

    if (!pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao atualizar o setor';
    }
}
?>
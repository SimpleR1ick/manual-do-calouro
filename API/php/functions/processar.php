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
function cadastrarUsuario($nome, $email, $senhaHash, $destino, $acesso = 1): void {
    // Pagina que enviou o formulario
    $origem = $_SERVER['HTTP_REFERER'];

    // Preparando a requisição de inserção de dados
    $sql = "INSERT INTO usuario (nom_usuario, email, senha, ativo) 
            VALUES ('$nome', '$email', '$senhaHash', $acesso)";
    
    // Se a requição houve retorno, o insert teve sucesso
    if (pg_query(CONNECT, $sql)) {
        // Adiciona minha sessão uma mensagem de sucesso
        $_SESSION['sucess'] = 'Cadastrado com sucesso!';

        // Envia o usuário de à página de login
        header("Location: $destino");

    } else {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao cadastrar!';

        // Retorna para o cadastro
        header("Location: $origem"); 
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
function atualizarPerfilAluno($modulo, $curso) {
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
function atualizarPerfilProfessor($regras) {
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
 * @author Henrique Dalmagro
 */
function atualizarPerfilAdministrativo($setor) {
    // Query para fazer o update das informações do administrativo
    $sql = "UPDATE administrativo SET fk_setor_id_setor = $setor
            WHERE fk_servidor_fk_usuario_id_usuario = 'id'";

    if (!pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao atualizar o setor';
    }
}

/**
 * Função para atualizar os dados de um usuario
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function ativaDesativaUsuario($id, $status): void {
    // Desativa o usuario 
    $ativo = 'f';

    if ($status == 'true') {
        // Ativa o usuario
        $ativo = 't';
    }

    $sql = "UPDATE usuario SET ativo = '$ativo' WHERE id_usuario = '$id'";
    pg_query(CONNECT, $sql); 
}

/**
 * Função para mudar o nivel de acesso de um usuario no sistema
 * 
 * @param int $id do alvo
 * @param int $acesso referente
 * 
 * @author Henrique Dalmagro
 */
function alteraAcessoUsuario($id, $acesso) {
    // Comentar
    $sql = "UPDATE usuario SET acesso = '$acesso' WHERE id_usuario = $id";
    pg_query(CONNECT, $sql);
}

/**
 * Função para limpar a chave de atiavação de um usuario
 * 
 * @param int $id do usuario
 * @return false em caso de falha
 * 
 * @author Henrique Dalmagro
 */
function limparChave($id): bool {
    // Atualiza o valor da chave_confirma para NULL, desta forma excluidoa
    $sql =  "UPDATE usuario SET chave_confirma = NULL WHERE id_usuario = $id'";
    $result = pg_query(CONNECT, $sql);

    return $result;
}

/**
 * Função para deletar os dados de um usuario
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function excluirUsuario($id): void {
    // Query para excluir o usuário no banco de dados
    $sql = "DELETE FROM usuario WHERE id_usuario = $id";

    // Verifica se a exclusão ocorreu sem problemas
    if (pg_query(CONNECT, $sql)) {
        $_SESSION['mensag'] = "Excluído com sucesso!";
        header('Location: ../../crud_index.php');
        
    } else {
        $_SESSION['mensag'] = "Erro ao excluir!";
        header('Location: ../../crud_index.php');
    }
}
?>
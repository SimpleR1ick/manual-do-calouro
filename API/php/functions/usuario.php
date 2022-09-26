<?php
/**
 * Função para cadastrar o usuario no sistema
 * 
 * @param string $nome 
 * @param string $email 
 * @param string $senhaHash
 * @param path $destino
 * @param int $acesso 
 * 
 * @author Henrique Dalmagro
 */
function cadastrarUsuario($nome, $email, $senhaHash, $destino, $acesso = 2): void {
    // Preparando a requisição de inserção de dados
    $sql = "INSERT INTO usuario (nom_usuario, email, senha, fk_acesso_id_acesso) 
            VALUES ('$nome', '$email', '$senhaHash', $acesso)";
    
    try {
        $cadastro = pg_query(CONNECT, $sql);

        if (!$cadastro) {
            throw new Exception('Erro ao cadastrar!');
        }
        $_SESSION['sucess'] = 'Cadastrado com sucesso!';

        // Envia o usuário de à página desejada
        header("Location: $destino");

    } catch (Exception $e) {
        $_SESSION['mensag'] = $e->getMessage();

        // Retorna para o cadastro
        header("Location: {$_SERVER['HTTP_REFERER']}");    
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
    $sql = "SELECT id_usuario FROM usuario WHERE email ='$email' 
            AND senha='$senhaHash'";

    try {
        $result = pg_query(CONNECT, $sql);

        // Verifica se a inserção teve resultado
        if (pg_num_rows($result) == 0) {
            throw new Exception('Usuário ou senha inválidos!');
        }
        // Transforma o resultado da requisição em um array enumerado
        $id = pg_fetch_row($result);

        // Adiciona a sessão o id retornado do banco
        $_SESSION['id_usuario'] = $id[0];
        
        // retorna para pagina home
        header('Location: ../../web/index.php'); 

    } catch (Exception $e) {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = $e->getMessage();

        // retorna para página de login
        header('Location: ../../web/login.php'); 
    }
}

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

/**
 * Função para atualizar os dados do usuario
 * 
 * @param int $id
 * @param string $nome
 * @param string $email um email qualquer
 * @param path $destino 
 * 
 * @author Henrique Dalmagro
 */
function atualizarDadosUsuario($id, $nome, $email): void {
    // Query para fazer o update das informações do usuário
    $sql = "UPDATE usuario SET nom_usuario ='$nome', email ='$email' 
            WHERE id_usuario = $id";
   
    // Verifica se a query de update obteve sucesso
    if (pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de sucesso
        $_SESSION['sucess'] = 'Perfil atualizado com sucesso!';

    } else {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao atualizar perfil!';  
    }
}

/**
 * 
 * 
 * 
 */
function atualizarSenhaUsuario($id, $senha): void {

    $hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "UPDATE usuario SET senha = '$hash' WHERE id_usuario = $id";

    if (pg_query(CONNECT, $sql)) {
        $_SESSION['sucess'] = 'Senha atualizada com sucesso';

    } else {
        $_SESSION['mensag'] = 'Erro, senha não alterada!';
    }  
}

/**
 * Função para mudar o nivel de acesso de um usuario no sistema
 * 
 * @param int $id do alvo
 * @param int $acesso referente
 * 
 * @author Henrique Dalmagro
 */
function atualizarAcessoUsuario($id, $acesso) {
    // Comentar
    $sql = "UPDATE usuario SET fk_acesso_id_acesso = '$acesso' WHERE id_usuario = $id";
    
    if (pg_query(CONNECT, $sql)) {
        $_SESSION['sucess'] = 'Acesso atualizado com sucesso';

    } else {
        $_SESSION['mensag'] = 'Erro, acesso não alterado!';
    }
}

/**
 * Função para atualizar os dados de um usuario
 * 
 * @param int $id
 * @param bool @status 't' or 'f'
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function atualizarStatusUsuario($id, $ativo): void {
    $sql = "UPDATE usuario SET ativo = '$ativo' WHERE id_usuario = '$id'";
    
    if (pg_query(CONNECT, $sql)) {
        $_SESSION['sucess'] = 'Status atualizado com sucesso';

    } else {
        $_SESSION['mensag'] = 'Erro, status não alterado!';
    }
}

/**
 * Função para deletar os dados de um usuario
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function deletarUsuario($id): void {
    // Query para excluir o usuário no banco de dados
    $sql = "DELETE FROM usuario WHERE id_usuario = $id";

    // Verifica se a exclusão ocorreu sem problemas
    if (!pg_query(CONNECT, $sql)) {
        $_SESSION['mensag'] = "Erro ao excluir!";
    }
}
?>
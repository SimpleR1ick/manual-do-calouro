<?php
/**
 * Função para cadastrar o usuario no sistema
 * @param string $nome 
 * @param string $email 
 * @param string $senhaHash
 * @param string $destino
 * @param int $acesso
 * 
 * @author Henrique Dalmagro
 */
function cadastrarUsuario($nome, $email, $senha, $path, $acesso = 2): void {
    // Gera uma senha hash com salt unico;
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $origem = $_SERVER['HTTP_REFERER'];
    
    // Preparando a requisição de inserção de dados
    $sql = "INSERT INTO usuario (nom_usuario, email, senha, fk_acesso_id_acesso, ativo) 
            VALUES ('$nome', '$email', '$senhaHash', $acesso, 't')";

    try {        
        $query = pg_query(CONNECT, $sql);

        if (!$query) {
            throw new Exception('Erro ao cadastrar!');
        }
        $_SESSION['sucess'] = 'Cadastrado com sucesso!';

        // Envia o usuário de à página desejada
        header("Location: $path");
    
    } catch (Exception $e) {
        $_SESSION['mensag'] = $e->getMessage();

        // Retorna para o cadastro
        header("Location: $origem");    
    }
}

/**
 * Função para atribuir o título de aluno a um usuário
 * @param int $id
 * @param string $matricula
 * 
 * @author Rafael Barros
 */
function cadastrarUsuarioAluno($id, $matricula): void {
    // Query para fazer o update das informações do aluno
    $sql = "UPDATE usuario SET fk_acesso_id_acesso = 3 WHERE id_usuario = $id;
            INSERT INTO aluno (fk_usuario_id_usuario, num_matricula) VALUES ($id, '$matricula')";

    if (pg_query(CONNECT, $sql)) {
        $_SESSION['sucess'] = "Parabéns! Você agora é um aluno.";
    }
}

/**
 * Função para executar o login no website
 * @param string $email
 * @param string $senha
 * 
 * @author Henrique Dalmagro
 */
function logarUsuario($email, $senha): void {
    // Preparando uma requisição ao banco de dados
    $sql = "SELECT id_usuario, senha FROM usuario WHERE email ='$email'";
    
    try {
        $query = pg_query(CONNECT, $sql);

        // Verifica se a inserção teve resultado
        if (!pg_num_rows($query) == 1) {
            throw new Exception('Usuário inválido!');
        }
        // Transforma o resultado da requisição em um array enumerado
        $result = pg_fetch_row($query);

        if (!password_verify($senha, $result[1])) {
            throw new Exception('Senha inválida!');
        }
        // Adiciona a sessão o id retornado do banco
        $_SESSION['id_usuario'] = $result[0];

        // retorna para pagina home
        header('Location: ../index.php'); 

    } catch (Exception $e) {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = $e->getMessage();

        // retorna para página de login
        header('Location: ../login.php'); 
    }
}

/**
 * Função para atualizar os dados do usuario
 * @param int $id
 * @param string $nome
 * @param string $email
 * 
 * @author Henrique Dalmagro
 */
function atualizarDadosUsuario($id, $nome, $email): void {
    // Query para fazer o update das informações do usuário
    $sql = "UPDATE usuario SET nom_usuario ='$nome', email ='$email' 
            WHERE id_usuario = $id";

    $origem = $_SERVER['HTTP_REFERER'];

    try {
        $query = pg_query(CONNECT, $sql);

        // Verifica se a query de update obteve sucesso
        if (!$query) {
            throw new Exception('Erro ao atualizar perfil!');
        } 
        // Adciona a sessão uma mensagem de sucesso
        $_SESSION['sucess'] = 'Perfil atualizado com sucesso!';
    }
    catch (Exception $e) {
        // Adciona a sessão a mensagem da exceção
        $_SESSION['mensag'] = $e->getMessage(); 
    }
    finally {
        // Redireciona para pagina de origem
        header("Location: $origem");  
    }
}

/**
 * Função para inserir o curso e o modulo do aluno
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
  
    }
    if (!pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de sucesso
        $_SESSION['mensag'] = 'Erro ao atualizar curso e modulo!';
    }
}

/**
 * Funcção para atribuir o título de professor a um usuário
 * @param int $id
 * @param string $regras
 * 
 * @author Rafael Barros - Henrique Dalmagro
 */
function atualizarUsuarioProfessor($id, $regras) {
    // Query para fazer o update das informações do professor
    $sql = "UPDATE professor SET regras ='$regras'
            WHERE fk_servidor_fk_usuario_id_usuario = $id";

    if (pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['sucess'] = 'Regras atualizada com sucesso!';
        
    } else {
        $_SESSION['mensag'] = 'Erro ao atualizar as regras!';
    }
}

/**
 * Função para atribuir o título de administrativo a um usuário
 * @param int $id
 * @param int $setor
 * 
 * @author Henrique Dalmagro
 */
function atualizarUsuarioAdministrativo($id, $setor) {
    // Query para fazer o update das informações do administrativo
    $sql = "UPDATE administrativo SET fk_setor_id_setor = $setor
            WHERE fk_servidor_fk_usuario_id_usuario = $id";

    if (pg_query(CONNECT, $sql)) {
        $_SESSION['sucess'] = 'Setor atualizado com sucesso!';

    } else {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao atualizar o setor!';
    }
}

/**
 * Função para atualizar a senha de um usuário
 * @param int $id
 * @param string $senhaHash
 * 
 * @author Henrique Dalmagro
 */
function atualizarSenhaUsuario($id, $senhaHash): void {
    $sql = "UPDATE usuario SET senha = '$senhaHash' WHERE id_usuario = $id";

    if (pg_query(CONNECT, $sql)) {
        $_SESSION['sucess'] = 'Senha atualizada com sucesso';

    } else {
        $_SESSION['mensag'] = 'Erro, senha não alterada!';
    }  
}

/**
 * Função para atualizar o acesso de um usuário
 * @param int $id
 * @param int $acesso
 * 
 * @author Rafael Barros - Henrique Dalmagro 
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
 * @param int $id
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function excluirUsuario($id): void {
    // Query para excluir o usuário no banco de dados
    $sql = "DELETE FROM usuario WHERE id_usuario = $id";

    // Verifica se a exclusão ocorreu sem problemas
    if (pg_query(CONNECT, $sql)) {
        $_SESSION['sucess'] = "Usuario excluido com sucesso!";

    } else {
        $_SESSION['mensag'] = "Erro ao excluir!";
    }
}
?>
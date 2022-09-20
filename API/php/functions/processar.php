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
    // Pagina que enviou o formulario
    $origem = $_SERVER['HTTP_REFERER'];

    // Preparando a requisição de inserção de dados
    $sql = "INSERT INTO usuario (nom_usuario, email, senha, fk_acesso_id_acesso) 
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
 * @param int $id
 * @param string $nome
 * @param string $email um email qualquer
 * @param path $destino 
 * 
 * @author Henrique Dalmagro
 */
function atualizarDadosUsuario($id, $nome, $email, $destino): void {
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
    header("Location: $destino");
}

/**
 * Função para verificar se o usuario ja possui uma imagem de perfil ou não
 * 
 * @param string $nome_foto nome do arquivo de imagem
 * @return string $nome_novo 
 * 
 * @author Henrique Dalmagro
 */
function atualizaNomeFoto($nome_foto): string {
    // Escapa a string no formatado para o banco de dados
    $nome_foto = pg_escape_string(CONNECT, $nome_foto);

    // Consulta a coluna img_perfil de um usuario
    $sql = "SELECT img_perfil FROM usuario WHERE id_usuario = '{$_SESSION['id_usuario']}'";
    $query = pg_query(CONNECT, $sql);

    if (pg_num_rows($query) == 1) {
        // Transforma o resultado da query em um array
        $result = pg_fetch_array($query);

        // Utiliza o mesmo nome do banco para atualizar a foto
        $nome_novo = $result['img_perfil'];
    
    } else {
        // Transforma os dados da foto em um array de chaves ('dirname', 'basename', 'extension', 'filename')
        $path = pathinfo($nome_foto);

        // Renomeando a foto e mantendo a extensão do arquivo
        $nome_novo = time().'.'.$path['extension'];
    }
    return $nome_novo;  
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
function atualizarPerfilAluno($id, $modulo, $curso) {
    // Fazer verificação se o aluno ja esta cadastrado
    $sql = "SELECT fk_usuario_id_usuario FROM aluno WHERE fk_usuario_id_usuario = $id";
    $query = pg_query(CONNECT, $sql);

    if (pg_num_rows($query) > 0) {
        $sql = "UPDATE aluno SET fk_turma_id_turma = (SELECT id_turma FROM turma
                WHERE num_modulo = $modulo
                AND fk_curso_id_curso = $curso)
                WHERE fk_usuario_id_usuario = $id;";
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
function atualizarPerfilProfessor($id, $regras) {
    // Escapa de uma sequência para consultar o banco de dados
    $regras = pg_escape_string(CONNECT, $regras);

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
function atualizarPerfilAdministrativo($id, $setor) {
    // Query para fazer o update das informações do administrativo
    $sql = "UPDATE administrativo SET fk_setor_id_setor = $setor
            WHERE fk_servidor_fk_usuario_id_usuario = $id";

    if (!pg_query(CONNECT, $sql)) {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Erro ao atualizar o setor';
    }
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

/**
 * Função para limpar a chave de atiavação de um usuario
 * 
 * @param int $id do usuario
 * @return false em caso de falha
 * 
 * @author Henrique Dalmagro
 */
function excluirChaveConfirma($id): bool {
    // Atualiza o valor da chave_confirma para NULL, desta forma excluidoa
    $sql =  "UPDATE usuario SET chave_confirma = NULL WHERE id_usuario = $id'";
    $result = pg_query(CONNECT, $sql);

    return $result;
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
    $sql = "UPDATE usuario SET fk_acesso_id_acesso = '$acesso' WHERE id_usuario = $id";
    pg_query(CONNECT, $sql);
}

/**
 * Função para atualizar os dados de um usuario
 * 
 * @param int $id
 * @param bool @status 't' or 'f'
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function ativaDesativaUsuario($id, $ativo): void {
    $sql = "UPDATE usuario SET ativo = '$ativo' WHERE id_usuario = '$id'";
    pg_query(CONNECT, $sql); 
}
?>
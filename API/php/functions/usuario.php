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

    $date = date_create('America/Sao_Paulo');

    print_r($date);

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
    $sql = "SELECT id_usuario FROM usuario WHERE email ='$email' AND senha ='$senhaHash'";
    $query = pg_query(CONNECT, $sql);

    // Transforma o resultado da requisição em um array enumerado
    $result = pg_fetch_row($query);

    // Verifica se a inserção teve resultado
    if (pg_num_rows($query) == 1) {
        // Adiciona a sessão o id retornado do banco
        $_SESSION['id_usuario'] = $result[0];
        
        // retorna para pagina home
        header('Location: ../../web/index.php'); 
    } else {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Usuário ou senha inválidos!';

        // retorna para página de login
        header('Location: ../../web/login.php'); 
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
    // Retorna a pagina perfil
    header("Location: $destino");
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
    // Retorna a pagina do crud
    header('Location: ../../web/crud_index.php');
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
    // Retorna a pagina do crud
    header('Location: ../../web/crud_index.php');
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
    if (pg_query(CONNECT, $sql)) {
        $_SESSION['mensag'] = "Excluído com sucesso!";
        
    } else {
        $_SESSION['mensag'] = "Erro ao excluir!";
    
    }
    // Retorna a pagina do crud
    header('Location: ../../web/crud_index.php');
}
?>
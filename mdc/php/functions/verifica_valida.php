<?php
/**
 * Função para verificar se as senhas coincidem
 * 
 * @param string $senha1 Primeira senha
 * @param string $senha2 Confirmação de senha
 * @param string $pagePath
 * 
 * @return bool
 * 
 * @author Henrique Dalmagro
 */
function validaSenha($senha1, $senha2, $pagePath): bool {
    if ($senha1 !== $senha2) {
        $_SESSION['mensag'] = 'Senhas não idênticas!';
        header("Location: $pagePath"); 
        return false;
    } 
    return true;
}

/**
 * Função para verificar se o email de entrada é válido
 * 
 * @param string $email
 * @param string $pagePath caminho de retorno em caso de erro
 * 
 * @return bool
 * 
 * @author Rafael Barros - Henrique Dalmagro
 */
function validaEmail($email, $pagePath): bool {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensag'] = 'Email invalido!';
        header("Location: $pagePath"); 
        return false;
    }
    return true; 
}

/**
 * Função para verificar se o email de entrada já esta cadastrado no banco de dados
 * 
 * @param string $email
 * @param string $pagePath 
 * 
 * @return bool
 * 
 * @author Henrique Dalmagro
 */
function verificaEmail($email, $pagePath): bool {
    // Preparando uma requisição ao banco de dados
    $sql = "SELECT email FROM usuario WHERE email = '$email'";
    $query = pg_query(CONNECT, $sql);

    // Verifica se a requisição teve resultado
    if (pg_num_rows($query) > 0) {
        $_SESSION['mensag'] = 'Email já cadastrado!';
        header("Location: $pagePath"); 
        return false;
    }
    return true;  
}

/**
 * Função para verificar se o status do usuario e ativo
 * 
 * @author Henrique Dalmagro
 */
function verificaAtivo($ativo, $pagePath): bool { 
    // Verifica se a conta do usuario esta ativa
    if ($ativo == 'f') {
        $_SESSION['mensag'] = 'Usuario inativo!';
        header("Location: $pagePath");
        return false;
    }
    return true;
}
?>
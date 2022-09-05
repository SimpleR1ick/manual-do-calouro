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

        // Retorna a pagina de origem
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
    // Sanitiza o email e em seguida valida o formato
    $f_email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $v_email = filter_var($f_email, FILTER_VALIDATE_EMAIL);

    // Verficia se o email e invalido
    if (!$v_email) {
        $_SESSION['mensag'] = 'Formato de e-mail invalido!';

        // Retorna a pagina de origem
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

        // Retorna a pagina de origem
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

        // Retorna a pagina de origem
        header("Location: $pagePath");
        return false;
    }
    return true;
}
?>
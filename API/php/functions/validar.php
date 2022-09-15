<?php
/**
 * Função para verificar se o nome de entrada esta nos parametros do site
 * 
 * @param string $string Nome a ser verificado
 * @param string $pagePath Caminho de retorno em caso de erro
 * 
 * @return bool|false Caso tenha numeros ou caracter especiais
 *  
 * @author Henrique Dalmagro
 */
function validaNome($string, $pagePath) {
    // Verifica se a string possui numeros ou caracter especiais
    if (!preg_match('/^[a-zA-Z\s]+$/', $string)){
        $_SESSION['mensag'] = 'Nomes não podem ter números<br>ou caracteres especiais!';

        // Retorna a pagina de origem
        header("Location: $pagePath"); 
        return false;
    }
    return true;
}

/**
 * Função para verificar se o email de entrada é válido
 * 
 * @param string $email O e-mail
 * @param string $pagePath Caminho de retorno em caso de erro
 * 
 * @return bool|false Se o formato for invalido
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
 * Função para verificar se as senhas coincidem
 * 
 * @param string $senha1 Primeira senha
 * @param string $senha2 Confirmação de senha
 * @param string $pagePath Caminho de retorno em caso de erro
 * 
 * @return bool|false Caso as senhas foram diferentes
 * 
 * @author Henrique Dalmagro
 */
function validaSenha($senha1, $senha2, $pagePath): bool {
    if ($senha1 != $senha2) {
        $_SESSION['mensag'] = 'Senhas não idênticas!';

        // Retorna a pagina de origem
        header("Location: $pagePath"); 
        return false;
    } 
    return true;
}

/**
 * 
 * 
 * 
 * @author Henrique Dalmagro
 */
function verificaSenha($password) {
    $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d].\S{8,36}$/';

    $valid = preg_match($pattern, $password) ? true : false;

    return $valid;
}

/**
 * Função para verificar se o email de entrada já esta cadastrado no banco de dados
 * 
 * @param string $email E-mail a ser buscado
 * @param string $pagePath Pagina de retorno se houver erro
 * 
 * @return bool|false Se estiver em uso
 * 
 * @author Henrique Dalmagro
 */
function verificaEmail($email, $pagePath): bool {
    // Inicia conexão
    $db = db_connect();

    // Preparando uma requisição ao banco de dados
    $sql = "SELECT email FROM usuario WHERE email = '$email'";
    $query = pg_query($db, $sql);

    // Verifica se a requisição teve resultado
    if (pg_num_rows($query) > 0) {
        $_SESSION['mensag'] = 'Email já cadastrado!';

        // Retorna a pagina de origem
        header("Location: $pagePath"); 
        return false;
    }
    return true; 
    
    // Encerrra a conexão
    pg_close($db);
}

/**
 * Função para verificar se o status do usuario e ativo
 * 
 * @param string $email Do usuario para verificação
 * @param string $pagePath Pagina de retorno se houver erro
 * 
 * @return bool|false Se o usuario estiver inativo
 * 
 * @author Henrique Dalmagro
 */
function verificaAtivo($email, $pagePath): bool { 
    $sql = "SELECT ativo FROM usuario WHERE email = '$email'";
    $query = pg_query($GLOBALS['db'], $sql);

    // Transforma o resultado da requisição em um array enumerado
    $result = pg_fetch_array($query);

    // Verifica se a conta do usuario esta ativa
    if ($result['ativo'] == 'f') {
        $_SESSION['mensag'] = 'Usuario inativo!';

        // Retorna a pagina de origem
        header("Location: $pagePath");
        return false;
    }
    return true;
}
?>
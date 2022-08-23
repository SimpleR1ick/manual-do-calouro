<?php
/**
 * Função para criptografar uma senha utilizando hash md5
 * 
 * @param string $senha 
 * 
 * @return string $senha uma string criptografada hashMD5
 * 
 * @author Henrique Dalmagro
 */
function hashMD5($senha): string {
    return md5($senha);
}

/**
 * Função para sanitizar e validar um email removendo qualquer tag HTML
 * 
 * @param string $email
 * 
 * @return string $emaul um email sanitizado de caracter especiais
 * 
 * @author Henrique Dalmagro
 */
function sanitizaEmail($email): string {
    // Sanitizando e validando o email
    $email = htmlspecialchars($email);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    return $email;
}
?>
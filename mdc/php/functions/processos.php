<?php
/**
 * Função para criptografar uma senha utilizando hash md5
 * 
 * @param $senha - 
 * 
 * @author Henrique Dalmagro
 */
function hashMD5($senha): string {
    return md5($senha);
}

/**
 * Função para sanitizar e validar um email removendo qualquer tag HTML
 * 
 * @param $email - uma string de email
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
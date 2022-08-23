<?php
/**
 * Função para sanitizar uma string e verificar se ela continua igual 
 * 
 * @param string $originalString a string
 * 
 * @return
 * 
 * @author Henrique Dalmagro
 */
function sanitizaGeral($originalString) {
    $sanitizeString = htmlspecialchars($originalString);
    
    if ($sanitizeString != $originalString) {

    }
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
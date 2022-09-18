<?php
/**
 * Função para verificar se um array possui alguma tag HTML
 * 
 * @param array $arrayString 
 * 
 * @return bool|false se encontrar algum inject
 * 
 * @author Henrique Dalmagro
 */
function sanitizaInjectHtmlPOST($array, $pagePath): bool {
    // Declaração de variavel contador
    $count = 0;

    // Percorre cada indice do array
    foreach ($array as $string) {
        $f_string = htmlspecialchars($string, ENT_QUOTES);

        // Verifica se a string sanitizada e diferente da original
        if ($f_string != $string) {
            $count += 1;
            break;
        }
    }
    // Verifica se o contador continua zerado
    if (!$count == 0) {
        // Retorna a pagina de origem
        header("Location: $pagePath"); 
        return false;
    } 
    return true;
}

/**
 * Função para sanitizar um array, convertando as tags HTML
 * 
 * @param array $array 
 * 
 * @return array o array sanitizado
 * 
 * @author Henrique Dalmagro
 */
function sanitizaCaractersPOST($array): array {
    // Percorre cada indice do array
    foreach ($array as $key => $value) {
        // Remover as tags HTML, contrabarras e espaços em branco de uma.
        $value = filter_var($value, FILTER_SANITIZE_STRING);
        $value = stripslashes($value);
        $value = trim($value);

        // Escapa de uma sequência para consultar o banco de dados
        $value = pg_escape_literal(CONNECT, $array[$key]);

        // Sobreescreve o valor original
        $array[$key] = $value;
    }
    return $array;
}

/**
 * Função para filtar uma string de caracter especiais
 * 
 * @param string $value A string
 * @return string $filtrada 
 * 
 * @author Henrique Dalmagro
 */
function sanitizaString($value): string {
    $filtrada = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);

    return $filtrada;
}

/**
 * Função para criptografar uma string com base_64
 * 
 * @param string $string A string
 * @return string $codificada String codificada
 * 
 * @author Henrique Dalmagro
 */
function criptografarString($string): string {
    $codificada = base64_encode($string);

    return $codificada;
}

/**
 * Função para descriptografar uma string com base_64
 * 
 * @param string $string A string
 * @return string $decodificada String codificada
 * 
 * @author Henrique Dalmagro
 */
function desencriptarString($string): string {
    $decodificada = base64_decode($string);

    return $decodificada;
}
?>
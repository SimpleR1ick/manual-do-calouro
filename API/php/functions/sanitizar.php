<?php
/**
 * Função para verificar se um array possui alguma tag HTML
 * 
 * @param array $arrayString 
 * 
 * @return bool True se encontrar algum inject - False se a validação ocorrer com sucesso
 * 
 * @author Henrique Dalmagro
 */
function verificaInjectHtml($arrayString): bool {
    foreach ($arrayString as $string) {
        $f_string = htmlspecialchars($string, ENT_QUOTES);

        if ($f_string != $string) {
            return true;
            break;
        }
    }
    return false;
}

/**
 * Função para sanitizar um array, convertando as tags HTML
 * 
 * @param array $array 
 * 
 * @return array $array
 * 
 * @author Henrique Dalmagro
 */
function sanitizaPost($array): array {
    foreach ($array as $key => $value) {
        // Invoca funções que remove TAGS HTML, contra-barras e espaço em branco
        $value = stripslashes($value);
        $f_string = trim($value);
    
        // Sobreescreve o valor original
        $array[$key] = $f_string;
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
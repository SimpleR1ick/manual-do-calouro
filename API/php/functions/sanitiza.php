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
function verificaInjectHtml($array): bool {
    // Declaração de variavel
    $origem = $_SERVER['HTTP_REFERER'];
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
        header("Location: $origem"); 
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
function sanitizaFormularioPOST($array): array {
    // Percorre cada indice do array
    foreach ($array as $key => $value) {
        // Remover as tags HTML, contrabarras e espaços em branco de uma.
        $value = filter_var($value, FILTER_SANITIZE_STRING);
        $value = stripslashes($value);
        $value = trim($value);

        // Escapa a variavel para consultar no banco de dados
        $value = pg_escape_string($value);

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
 * 
 * 
 * 
 */
function criptografarSenha($senha): string {
    $hash = password_hash($senha, PASSWORD_DEFAULT);

    return $hash;
}

?>
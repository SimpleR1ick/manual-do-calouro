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
        $f_string = htmlspecialchars($string);

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
function removerTagsHtml($array): array {
    foreach ($array as $key => $value) {
        // Invoca funções que remove TAGS HTML, contra-barras e espaço em branco
        $value = htmlspecialchars($value, ENT_QUOTES);
        $value = stripslashes($value);
        $f_string = trim($value);
    
        // Sobreescreve o valor original
        $array[$key] = $f_string;
    }
    return $array;
}
/**
 * 
 * 
 * 
 */
function validaNome($string) {
    if(!preg_match("/^[a-zA-Z]$/", $string)){
        $_SESSION['mensag'] = 'Não utilize numeros e caracter especiais';
        return false;
    }
    return true;
}

/**
 * 
 * 
 * 
 * 
 */
function sanitizaString($value): string {
    $value = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);

    return $value;
}

/**
 * 
 * 
 * 
 */
function criptografia() {
    $chave = password_hash($_POST['email'] . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
}
?>
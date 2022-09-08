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
        // Invoca uma função que remove tags HTML
        $f_string = htmlspecialchars($value, ENT_QUOTES);

        // Sobreescreve o valor original
        $array[$key] = $f_string;
    }
    return $array;
}

/**
 * Função para remover os espaços em branco em cada par de chave valor
 * 
 * @param array $array
 * 
 * @return array $array
 * 
 * @author Henrique Dalmagro
 */
function removerEspacosEmBranco($array): array {
    foreach ($array as $key => $value) {
        // Invoca uma função que remove character em branco
        $copy = trim($value);

        // Sobreescreve o valor original
        $array[$key] = $copy;
    }
    return $array;
}
?>
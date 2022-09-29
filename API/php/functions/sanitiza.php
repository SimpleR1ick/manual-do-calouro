<?php
/**
 * Função para verificar inject de tags HTML em um array
 * 
 * @param array $array a ser percorrido
 * 
 * @return bool false se encontrar, true se passar
 * 
 * @author Henrique Dalmagro
 */
function validaFormulario($array): bool {
    // Iniciando a variavel de controle
    $ok = false;

    // Percorre cada indice do array
    foreach ($array as $string) {
        // Utiliza a esta função dectar caracters (<>, "', &)
        $f_string = htmlspecialchars($string, ENT_QUOTES);

        // Verifica se a string sanitizada e diferente da original
        if ($f_string != $string) {
            $ok = true;
            break;
        }
    }
    // Retorno da função
    return $ok;
}

/**
 * Função para sanitizar os indices de um array
 * 
 * @param array $array a ser percorrido
 * 
 * @author Henrique Dalmagro
 */
function sanitizaFormulario($array): array {
    // Percorre cada indice do array
    foreach ($array as $key => $value) {
        // Remover as tags HTML, contrabarras e espaços em branco de uma.
        $value = filter_var($value, FILTER_SANITIZE_STRING);
        $value = stripslashes($value);
        $value = trim($value);

        // Escapa a variavel para consultar no banco de dados
        $value = pg_escape_string(CONNECT, $value);

        // Sobreescreve o valor original
        $array[$key] = $value;
    }
    // Retornando o array sanitizado
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
?>
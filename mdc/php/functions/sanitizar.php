<?php
/**
 * Função para sanitizar um array de string e verificar se ela continua igual 
 * 
 * @param array $arrayString 
 * 
 * @return bool True se encontrar algum inject - False se a validação ocorrer com sucesso
 * 
 * @author Henrique Dalmagro
 */
function sanitizaPost($arrayString): bool {
    foreach ($arrayString as $str) {
        $strCopy = htmlspecialchars($str);

        if ($strCopy != $str) {
            return true;
            break;
        }
    return false;
    }
}
?>
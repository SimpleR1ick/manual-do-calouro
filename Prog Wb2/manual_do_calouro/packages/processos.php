<?php 
/**
 * Função para criptografar uma senha utilizando hash md5
 * 
 * @param $senha - 
 * 
 * @author Henrique Dalmagro
 */
function cripgrafaSenha($senha): string {
    return md5($senha);
}
?>
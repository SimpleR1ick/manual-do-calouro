<?php
/**
 * Função para criptografar uma string
 * @author Henrique Dalmagro
 */
function criptografar($value): string {
    $cripto = base64_encode($value);

    return $cripto;

}

/**
 * Função para descriptografar uma string
 * @author Henrique Dalmagro
 */
function descriptar($value): string {
    $dcripto = base64_decode($value);

    return $dcripto;
}
?>
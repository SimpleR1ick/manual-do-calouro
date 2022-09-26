<?php
/**
 * 
 * 
 * 
 * 
 */
function criptografar($value): string {
    $cripto = base64_encode($value);

    return $cripto;

}

/**
 * 
 * 
 * 
 * 
 */
function descriptar($value): string {
    $dcripto = base64_decode($value);

    return $dcripto;
}
?>
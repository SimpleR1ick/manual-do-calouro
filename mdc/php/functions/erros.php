<?php
/**
 * Função para imprimir o ultimo erro gerado
 * 
 * @author Rafael Barros - Henrique Dalmagro
 */
function exibirErros(): void {
    // Verifica se existe alguma menssagem de erro de login e imprime
    if (isset($_SESSION['erros'])) {
        echo "<p class='align-middle text-center text-danger'> {$_SESSION['erros']} </p>";
        
        $_SESSION['erros'] = null;
    }
}
?>
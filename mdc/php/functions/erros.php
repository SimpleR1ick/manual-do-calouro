<?php
/**
 * Função para imprimir o ultimo erro gerado
 * 
 * @author Rafael Barros - Henrique Dalmagro
 */
function exibirErros(): void {
    // Verifica se existe alguma menssagem de erro de login e imprime
    if (isset($_SESSION['mensag'])) {
        echo "<p class='align-middle text-center text-danger'> {$_SESSION['mensag']} </p>";
        
        unset($_SESSION['mensag']);
    }
}

/**
 * Função para imprimir mesagem de sucesso
 * 
 * @author Rafael Barros
 */
function exibirSucesso(): void {
    // Verifica se existe alguma mensagem de sucesso de login 
    if (isset($_SESSION['sucess'])) {
        echo "<p class='align-middle text-center text-success'> {$_SESSION['sucess']} </p>";

        unset($_SESSION['sucess']);
    }
}
?>
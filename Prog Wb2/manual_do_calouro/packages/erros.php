<?php
// Cria um array para armazenar as mensagens de erros
$erros = array();

/**
 * Função para imprimir o ultimo erro gerado
 * 
 * @author Rafael Barros - Henrique Dalmagro
 */
function exibirErros(): void {
    // Verifica se existe alguma menssagem de erro de login e imprime
    if (!empty($erros)) {
        foreach ($erros as $erro){
            echo $erro;
        }
    }
}
?>
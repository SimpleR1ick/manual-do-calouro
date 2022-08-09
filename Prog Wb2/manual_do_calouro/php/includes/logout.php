<?php
// Encerra a sessão do usuário
executarLogout();

/**
 * Função parar executar o logout do usuario no site
 * 
 * @author Henrique Dalmagro
 */
function executarLogout(): void {
    // Iniciando a sessão
    session_start();

    // Limpa os dados da sessão
    session_unset();

    // Destrói a sessão
    session_destroy();

    // Manda o usuário de volta para a página index.php
    header('Location: ../index.php');
}
?>
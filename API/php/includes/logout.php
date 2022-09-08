<?php
// Iniciando a sessão
session_start();

// Limpa os dados da sessão
session_unset();

// Destrói a sessão
session_destroy();

// Manda o usuário de volta para a página index.php
header('Location: ../../index.php');
?>
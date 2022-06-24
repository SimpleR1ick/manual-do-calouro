<?php
// Iniciando a sessão
session_start();

// 
session_unset();

// Destrói a sessão
session_destroy();

// Manda o usuário de volta para a página home.php
header('Location: ../home.php');
?>
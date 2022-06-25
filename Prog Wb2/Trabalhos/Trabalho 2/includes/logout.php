<?php
// Iniciando a sessão
session_start();

// Limpa os dados da sessão
session_unset();

// Destrói a sessão
session_destroy();

// Atribui uma mensagem na minha sessão
$_SESSION['toast'] = "Logout concluído com sucesso.";

// Manda o usuário de volta para a página home.php
header('Location: ../home.php');
?>
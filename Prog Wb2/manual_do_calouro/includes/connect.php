<?php
// Dados para conexão com o banco de dados local
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db_name = "manual_do_calouro_pw";
/*
$servername = "localhost";
$username = "elephantphp";
$password = "usbw";
*/

// Iniciar a conexão com o banco de dados
$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
    echo "Falha na conexão: ".mysqli_connect_error();
endif;
?>
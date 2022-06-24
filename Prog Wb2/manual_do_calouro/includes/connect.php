<?php
// Dados para conexão com o banco de dados local
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db_name = "pw2_manual_do_calouro";

// Conexão com banco de dados
$connect = mysqli_connect($servername, $username, $password, $db_name);

if (!$connect) {
    die("Falha na conexao: " . mysqli_connect_error());
} else {
    //echo "Conexao realizada com sucesso";
}
?> 



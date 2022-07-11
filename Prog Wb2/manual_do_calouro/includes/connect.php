<?php
// Dados para conexão com o banco de dados
/*
$host = "kesavan.db.elephantsql.com";
$port = "5432";
$user = "jqvnqgvm";
$db = "jqvnqgvm";
$pass = "IKXmlWoguZUV-Rav8eB14MghUUXaZAk8";
*/

$host = "localhost";
$port = "5432";
$db = "Manual_do_Calouro";
$user = "postgres";
$pass = "252804277353";

// Conexão com banco de dados
$connect = pg_connect("host=$host port=$port dbname=$db user=$user password=$pass");
?>
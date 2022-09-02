<?php
// Dados para conexão com o banco de elephatnSQL
$host = "kesavan.db.elephantsql.com";
$user = "jqvnqgvm";
$db = "jqvnqgvm";
$pass = "8-3og-adIEeL7GbtV_wqH5E8jaRePvS3";

// Conexão com banco de dados
$connect = pg_connect("host=$host dbname=$db user=$user password=$pass");

// Definindo a conexão como uma constante global
define('CONNECT', $connect)
?>
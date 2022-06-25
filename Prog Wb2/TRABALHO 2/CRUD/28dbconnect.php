<?php
//Conexão com banco de dados
$servername = "localhost"; //endereço do servidor
$username="root";
$password="usbw";
$db_name="crud";

//pdo - somente orientado objeto
$connect =mysqli_connect($servername,$username,$password,$db_name);

//codifica com o caracteres ao manipular dados do banco de dados
//mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error()):
	echo "Falha na conexão: ". mysqli_connect_error();
endif;
?>
<?php
/**
 * Função para abrir uma conexão com banco de dados postgreSQL no ElephantSQL
 * 
 * @return resource $connect conexão com o banco
 * 
 * @author Henrique Dalmagro
*/
function db_connect(): mixed {
    // Dados para conexão com o banco de elephatnSQL
    $host = "kesavan.db.elephantsql.com";
    $user = "jqvnqgvm";
    $db = "jqvnqgvm";
    $pass = "8-3og-adIEeL7GbtV_wqH5E8jaRePvS3";

    // Conexão com banco de dados
    $connect = pg_connect("host=$host dbname=$db user=$user password=$pass");

    if (!$connect) {
        // Mensagem de erro se a conexão falhar
        die("Erro, falha na conexão com ElephatnSQL!");
    }    
    return $connect;   
}
?>

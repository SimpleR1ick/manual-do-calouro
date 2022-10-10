<?php
/**
 * Função para abrir uma conexão com banco de dados postgreSQL no ElephantSQL
 * 
 * @author Henrique Dalmagro
*/
function db_connect(): mixed {
    // Dados para conexão com o banco de elephatnSQL
    $host = "kesavan.db.elephantsql.com";
    $user = "jqvnqgvm";
    $db = "jqvnqgvm";
    $pass = "8-3og-adIEeL7GbtV_wqH5E8jaRePvS3";

    try {
        // Conexão com banco de dados
        $connect = pg_connect("host=$host dbname=$db user=$user password=$pass");

        // Verifica se houve exito na execução
        if (!$connect) {
            throw new Exception('Erro ao connectar ao ElephantSQL');
        }
    } catch (Exception $e) {
        // Exibe o erro
        die($e->getMessage());
    } 
    // Retorna a conexão
    return $connect; 
}
?>

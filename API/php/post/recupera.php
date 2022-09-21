<?php
// Incia a conexão com banco de dados
require_once '../includes/db_connect.php';

// Import da função de email
include_once '../includes/email.php';

// Definindo as constantes globais
define('PATH', '../../index.php'); // Caminho da pagina

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] = 'POST') {

    if (verificaInjectHtml($_POST)) {
        
        $email = $_POST['email'];

        // Buscar email

        // Verifica se a pesquisa houve resultado
        if (pg_num_rows($query) == 1) {
            // Gera um chave HASH unica
            $chave = sha1(uniqid(mt_rand(), true));

            // SQL

            // Verifica se o processo anterior ocorreu
            if (pg_affected_rows($query) == 1) {
                // Cria um unico link, methodo GET com a chave criada 
                $link = "localhost/Manual_do_Calouro/API/redefinir.php?$chave";

                // Campos do email
                $assunto = 'Recuperar senha';
                $mensagem = 'Visite este link'.$link;

                // Invoca a função de envio de email
                enviarEmail($email, $assunto, $mensagem);
            }
        }
    }
}
?>
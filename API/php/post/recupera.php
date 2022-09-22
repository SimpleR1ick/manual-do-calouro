<?php
// Incia a conexão com banco de dados
require_once '../includes/connect.php';

// Import de bibliotecas de funções
include_once '../includes/email.php';
include_once '../functions/sanitiza.php'; 
include_once '../functions/valida.php';
include_once '../functions/usuario.php';

// Definindo a conexão como uma constante global
define('CONNECT', db_connect());

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];

    $uriErro = '../../redefinir_senha.php';

    if (validaEmail($email, $uriErro)) {

        // Preparando uma requisição ao banco de dados
        $sql = "SELECT id_usuario FROM usuario WHERE email ='$email'";
        $query = pg_query(CONNECT, $sql);

        if (pg_num_rows($query) == 1) {
            $id = pg_fetch_row($query);

            // Gera um chave HASH unica
            $chave = sha1(uniqid(mt_rand(), true));

            // Verifica se a inserção da chave ocorreu
            if (inserirChaveCofnrima($id[0], $chave)) {

                $link = "localhost/Manual_do_Calouro/API/redefinir.php?$chave";

                // Campos do email
                $assunto = 'Recuperar senha';
                $mensagem = 'Visite este link'.$link;

                // Invoca a função de envio de email
                enviarEmail($email, $assunto, $mensagem);
            }        
    }
}
// Encerrandod a conexão
pg_close(CONNECT)
?>
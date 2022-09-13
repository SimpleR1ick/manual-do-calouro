<?php
// Inicia a conexão com banco de dados
require_once './db_connect.php';

// Import de biblioteca de funções
include_once '../functions/email.php';

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] = 'POST') {
    // Verifica se o POST foi enviado pelo botão
    if (isset($_POST['nome_botão'])) {
        // Atribui o conteudo dos campo do formulario a variável
        $email = pg_escape_string(CONNECT, $_POST['email']);

        // Preparando uma busca ao email recebido
        $sql = "SELECT id_usuario FROM usuario WHERE email = '$email'";
        $query = pg_query(CONNECT, $sql);

        // Verifica se a pesquisa houve resultado
        if (pg_num_rows($query) == 1) {
            // Gera um chave HASH unica
            $chave = sha1(uniqid(mt_rand(), true));

            // Insere ao usuario, no acampo chave_recupera a chave gerada
            $sql = "INSERT INTO usuario SET chave_recupera ='$chave' WHERE email ='$email'";
            $query = pg_query($sql);

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
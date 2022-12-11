<?php
// Incia a conexão com banco de dados
require_once '../includes/connect.php';

// Import de bibliotecas de funções
include_once '../includes/email.php';
include_once '../includes/chave.php';
include_once '../functions/sanitiza.php'; 
include_once '../functions/valida.php';
include_once '../functions/usuario.php';

// Definindo a conexão como uma constante global
define('CONNECT', db_connect());
$uriErro = '../../web/redefinir_senha.php';

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['btnRecuperar'])) {
        // Sanitização
        $email = sanitizaString($_POST['email']);

        if (validaEmail($email, $uriErro)) {
            // Preparando uma requisição ao banco de dados
            $sql = "SELECT id_usuario FROM usuario WHERE email ='$email'";
            $query = pg_query(CONNECT, $sql);

            if (pg_num_rows($query) == 1) {

                $id = pg_fetch_row($query);
                $chave = gerarChaveConfirma(); // Gera um chave HASH unica
 
                // Verifica se a inserção da chave ocorreu
                if (inserirChaveCofnrima($id[0], $chave)) {

                    $link = "<a href=\"localhost/Manual_do_Calouro/API/web/redefinir_senha.php?chave=$chave\">Clique aqui</a>";
                    // Campos do email
                    $assunto = 'Recuperar senha';
                    $mensagem = 'Para recuperar sua senha, acesse este link: '.$link;

                    // Invoca a função de envio de email
                    enviarEmail($email, $assunto, $mensagem);
                }
            }  
        }    
    }
    // Retorna a pagina de home
    header('Location: ../../web/index.php'); 
}
// Encerrandod a conexão
pg_close(CONNECT)
?>
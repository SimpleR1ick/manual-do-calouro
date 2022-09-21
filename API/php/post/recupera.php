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
            $result = pg_fetch_row($query);

            $id = $result[0];

            echo $id.'<br>';

            // Gera um chave HASH unica
            $chave = sha1(uniqid(mt_rand(), true));

            echo $chave;

            $sql = "INSERT INTO chave VALUES (fk_usuario_id_usuario = $id, chave_confirma ='$chave')";
        }            
        
    }
    /*
    

        

    // Cria um unico link, methodo GET com a chave criada 
    $link = "localhost/Manual_do_Calouro/API/redefinir.php?$chave";

    // Campos do email
    $assunto = 'Recuperar senha';
    $mensagem = 'Visite este link'.$link;

    // Invoca a função de envio de email
    enviarEmail($email, $assunto, $mensagem);
    */ 
}
?>
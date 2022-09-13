<?php
require_once './db_connect.php';

include_once '../functions/email.php';

$email = pg_escape_string(CONNECT, $_POST['email']);

$sql = "SELECT email FROM usuario WHERE email = '$email'";
$query = pg_query(CONNECT, $sql);

if (pg_num_rows($query) == 1)
    $chave = sha1(uniqid(mt_rand(), true));

    $sql = "INSERT INTO usuario SET chave_recupera ='$chave' WHERE email ='$email'";
    $query = pg_query($sql);

    if (pg_affected_rows($query) == 1) {
        $link = "localhost/Manual_do_Calouro/API/redefinir.php?$chave";

        $destino = $email;
        $assunto = 'Recuperar senha';
        $mensagem = 'Visite este link '.$link;

        enviarEmail($destino, $assunto, $mensagem);
    }
?>
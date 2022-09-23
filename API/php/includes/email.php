<?php
/**
 * Função para enviar um email ao usuario
 * 
 * @param string $destinatario
 * @param string $assunto
 * @param string $mensagem  
 * 
 * @author Henrique Dalmagro
 */
function enviarEmail($destinatario, $assunto, $mensagem): void {
    // Email de origem que envia a mensagem
    $remetente = 'manualdocalouro.ifes@gmail.com';

    // Email em formato html, cabeçalho e versão
    $headers = 'MIME-Version: 1.0' . "\r\n" .
        'Content-type: text/html;charset=UTF-8' . "\r\n" .
        'From: ' . $remetente . "\r\n" .
        'Reply-To: ' . $remetente. "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Tenta enviar o email utilizando o canal SMTP
    if (mail($destinatario, $assunto, $mensagem, $headers)) {
        $_SESSION['sucess'] = 'E-email enviado com sucesso!';

    } else {
        $_SESSION['mensag'] = 'Erro ao enviar o email!';
    }
}
?>
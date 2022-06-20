<?php
// Verificar envio dos dados por submit
if (isset($_POST['btn-cadastrar'])):

    // Array de extensões permitidas
    $extensoesPermitidas = array('png', 'jpeg', 'jpg');

    // Acesso à variável superglobal $_FILES que possui as informações do arquivo enviado através do nome original do arquivo na máquina do usuário
    $extensao = pathinfo($_FILES['fotoPerfil']['name'], PATHINFO_EXTENSION);


    // Verificação da extensão
    if (in_array($extensao, $extensoesPermitidas)):
        
        $pasta = 'img/usuarios/';

        // Nome temporário do arquivo salvo no servidor
        $temp = $_FILES['fotoPerfil']['tmp_name'];

        $caminho = $pasta. uniqid().".$extensao";

        if(move_uploaded_file($temp, $caminho)):
            $mensagem = 'Upload realizado com sucesso!';
        else:
            $mensagem = 'Não foi possível realizar o upload.';
        endif;

    // Verificação da extensão
    else:
        $mensagem = "Formato inválido! Escolha um arquivo .png, .jpeg ou .jpg";
    endif;


endif;

?>
<?php
// Conexão
require_once 'connect.php';

// Iniciar Sessão
session_start();

// Verificando se 
if (isset($_POST['btn-logar'])):
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if (empty($login) or empty($senha)):
        $erros[] = "<li> Login ou senha não inseridos </li>";
    else:
        $senha = md5($senha);
        $sql = "SELECT id, login FROM usuarios WHERE login = '$login' AND senha = '$senha'";

        $resultado = mysqli_query($connect, $sql);
        mysqli_close($connect);

        if (mysqli_num_rows($resultado) > 0):
            $dados = mysqli_fetch_array($resultado);
            $_SESSION['logado'] = true;
            $_SESSION['id_usuario'] = $dados['id'];

            header('Location: index.php');

        else:
            $erros[] = "<li> Usuário e senha não cadastrados </li>";
        
        endif;
    endif;
endif;
?>
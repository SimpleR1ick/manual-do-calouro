<?php
// Iniciando Sessão
session_start();

// Conexão com o banco de dados
require_once 'connect.php';

// Enviando os dados do formulario
// if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
$nome = pg_escape_string($connect, $_POST['nome']);
$email = pg_escape_string($connect, $_POST['email']);
$senha = pg_escape_string($connect, $_POST['senha']);
$senha2 = pg_escape_string($connect, $_POST['senhaConfirma']);

// Sanitizando o nome, para tirar qualquer tag HTML
$f_nome = filter_var($nome, FILTER_SANITIZE_STRING);

// Sanitizando e validando email
$f_email = filter_var($email, FILTER_SANITIZE_EMAIL);
$v_email = filter_var($f_email, FILTER_VALIDATE_EMAIL);

if ($senha == $senha2) {
    // Criptografando a senha usando md5
    $senhaSegura = md5($senha);

    // Verificação para ver se o email do usuário já está no banco de dados
    $emailRep = "SELECT email FROM usuario WHERE email = '$v_email'";

    // Coleta o resultado da requisição feita acima
    $emailR = pg_query($connect, $emailRep);
    
    // Atribui, como um array, o resultado da requisição
    $dados = pg_fetch_array($emailR);

    // Verifica se o email registrado já foi cadastrado
    if (!isset($dados) or $dados == false) {
        // Faz uma requisição do banco de dados
        $sql = "INSERT INTO usuario(nom_usuario, email, senha) VALUES ('$nome', '$v_email', '$senhaSegura')";

        if (pg_query($connect, $sql)) {
            // Adiciona à minha sessão uma mensagem de erro
            $_SESSION['toast'] = "Cadastrado com sucesso!";
            
            // Envia o usuário de à página de login
            header('Location: ../login.php');

        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
            
            // Envia o usuário de volta à página de cadastro
            header('Location: ../cadastro.php');
        }

    } else {
        // Adiciona à minha sessão uma mensagem de erro
        $_SESSION['mensagem'] = "Email já cadastrado!";
        
        // Envia o usuário de volta à página de cadastro
        header('Location: ../cadastro.php');
    }

} else {
    // Adiciona à minha sessão uma mensagem de erro
    $_SESSION['mensagem'] = "Senhas não idênticas!";
    
    // Envia o usuário de volta à página de cadastro
    header('Location: ../cadastro.php');
}

?>




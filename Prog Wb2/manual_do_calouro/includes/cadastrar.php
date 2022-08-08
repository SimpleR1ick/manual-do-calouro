<?php
// Import de bibliotecas de funções
include_once '../packages/erros.php';
require_once '../packages/processos.php';

/**
 * Função parar executar todas as etapas do processo de cadastrar um usuario
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function formularioCadastro(): void {
    // Atribui o conteudo dos campos do formulario a variáveis
    $nome = pg_escape_string(_CONEXAO_, $_POST['nome']);
    $email = pg_escape_string(_CONEXAO_, $_POST['email']);
    $senha = pg_escape_string(_CONEXAO_, $_POST['senha']);
    $senha2 = pg_escape_string(_CONEXAO_, $_POST['senhaConfirma']);

    // Sanitizando o nome e email (remover qualquer tag HTML)
    $f_nome = htmlspecialchars($nome);
    $f_email = htmlspecialchars($email);

    // Validando o email
    $email = filter_var($f_email, FILTER_SANITIZE_EMAIL);
    $v_email = filter_var($f_email, FILTER_VALIDATE_EMAIL);

    // Verifica se as senhas são identicas
    $senhaSegura = validaSenha($senha, $senha2);

    // Verifica se o email recebido ja consta no banco de dados
    validaEmailExistente($v_email);

    // Insere o usuario no banco de dados
    cadastraUsuario($f_nome, $v_email, $senhaSegura);
}

/**
 * Função para verificar se as senhas coincidem
 * 
 * @param $senha - Primeira senha digitada
 * @param $senha2 - Confirmação de senha
 * 
 * @author Henriqueq Dalmagro
 */
function validaSenha($senha, $senha2): string{    
    if ($senha !== $senha2) {
        // Adiciona à minha sessão uma mensagem de erro
        $erros[] = "<p class='align-middle text-center text-danger'> Senhas não idênticas! </p>";
        header('Location: ../cadastro.php'); // Retorna para o cadastro
    } else {
        // Criptografa a senha recebida utilizando hash md5
        return cripgrafaSenha($senha);

    }
}

/**
 * Função para verificar se o email de entrada ja esta cadastrado
 * 
 * 
 * @author Henrique Dalmagro
 */
function validaEmailExistente($v_email): void {
    // Preparando uma requisição ao banco de dados
    $sql = "SELECT email FROM usuario WHERE email = '$v_email'";
    $query = pg_query(_CONEXAO_, $sql);

    // Verifica se a requisição teve resultado
    if (pg_num_rows($query) > 0) {
        // Adiciona à minha sessão uma mensagem de erro
        $erros[] = "<p class='align-middle text-center text-danger'> Email já cadastrado! </p>";
        header('Location: ../cadastro.php'); // Retorna para o cadastro
    }
}

/**
 * Função para cadastrar o usuario 
 * 
 * @param $nome - Nome do usuario
 * @param $v_email - Email valido
 * @param $senhaSegura - Senha criptografada em MD5
 * 
 * @author Henrique Dalmagro
 */
function cadastraUsuario($nome, $v_email, $senhaSegura): void {
    // Preparando a requisição de inserção de dados
    $sql = "INSERT INTO usuario (nom_usuario, email, senha) VALUES ('$nome', '$v_email', '$senhaSegura')";
    $query = pg_query(_CONEXAO_, $sql);

    if ($query) {
        // Adiciona a minha sessão uma mensagem de sucesso
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../login.php');// Envia o usuário de à página de login

    } else {
        // Adiciona à minha sessão uma mensagem de erro
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../cadastro.php'); // Retorna para o cadastro
    }
}
?>
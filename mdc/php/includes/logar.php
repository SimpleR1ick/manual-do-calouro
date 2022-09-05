<?php
// Iniciar a sessão
session_start();

// Conectando com o banco de dados
require_once 'connect.php';

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';
include_once '../functions/verifica_valida.php';

// Definindo como constante global o caminho em caso de erro
$dir = '../../login.php';
define('PATH', $dir);

if (isset($_POST['btnLogar'])) {
    // Sanitização
    if (verificaInjectHtml($_POST)) {
        $_SESSION['mensag'] = 'Erro ao logar!';
        header('Location: ../../login.php'); // Retorna para o cadastro
    } 
    // Atribui o conteudo dos campos do formulario a variáveis
    $email = pg_escape_string(CONNECT, $_POST['email']);
    $senha = pg_escape_string(CONNECT, $_POST['senha']);

    // Validações para logar um usuario
    if (validaEmail($email, PATH)) {
        // Tenta realizar o login no site
        logarUsuario($email, md5($senha));
    }
    // Encerando a conexão
    pg_close(CONNECT);

}

/**
 * Função para executar o login no website
 * 
 * @param string $email um email sanitizado
 * @param string $senhaHash uma senha sanitizada e criptografada
 * 
 * @author Henrique Dalmagro
 */
function logarUsuario($email, $senhaHash): void {
    // Preparando uma requisição ao banco de dados
    $sql = "SELECT id_usuario, ativo FROM usuario WHERE email = '$email' AND senha = '$senhaHash'";
    $query = pg_query(CONNECT, $sql);

    // Verifica se a inserção teve resultado
    if (pg_num_rows($query) == 0) {
        // Adiciona à sessão uma mensagem de erro
        $_SESSION['mensag'] = 'Usuário ou senha inválidos!';

        // retorna para página de login
        header('Location: ../../login.php'); 

    } else {
        // Transforma o resultado da requisição em um array enumerado
        $result = pg_fetch_row($query);

        // Verifica se a conta do usuario esta ativa
        if (verificaAtivo($result[1], PATH)) {
            // Adiciona a sessão o id retornado do banco
            $_SESSION['id_usuario'] = $result[0];
            
            // retorna para página index.php
            $_SESSION['toast'] = 'Logado com sucesso!';
            header('Location: ../../index.php'); 
        }
    }
}
?>
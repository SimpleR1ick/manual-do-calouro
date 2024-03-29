<?php
// Iniciar a sessão
session_start();

// Inicia a conexão com banco de dados
require_once '../includes/connect.php'; 

// Import de bibliotecas de funções
include_once '../functions/sanitiza.php'; 
include_once '../functions/valida.php';
include_once '../functions/usuario.php';

include_once '../includes/email.php';

// Definindo a conexão como uma constante global
define('CONNECT', db_connect());

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Verifica se o botão de envio foi pressionado
    if (isset($_POST['btnCadastrar'])) {

        // Verifica se algum campo possui caracter indesejados
        if (validaFormulario($_POST)) {
            header("Location: '{$_SERVER['HTTP_REFERER']}'");
            exit();
        }
        // Sanitização
        $dados = sanitizaFormulario($_POST); 

        // Atribuição dos inputs do POST a variaveis
        $nome = $dados['nome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $senha2 = $dados['senhaConfirma'];

        // Variaveis dos caminhos possiveis
        $uriErro = '../../web/cadastro.php';
        $uriAlvo = '../../web/login.php';
    
        // Validações
        if (validaNome($nome, $uriErro)) {
            if (validaEmail($email, $uriErro)) {
                if (validaSenha($senha, $senha2, $uriErro)) {
                    $valida = true;
                }
            }
        }
        // Verificações
        if (isset($valida)) {
            if (verificaEmail($email, $uriErro)) {
                if (verificaSenha($senha, $uriErro)) {
                    $verifica = true;
                }   
            }      
        }
        // Verifica se todas as etapas passaram
        if ($valida && $verifica) {
            // Cadastra o usuario no banco de dados
            cadastrarUsuario($nome, $email, $senha, $uriAlvo);
        }
    } 
}
// Encerrando a conexão
pg_close(CONNECT);
?>
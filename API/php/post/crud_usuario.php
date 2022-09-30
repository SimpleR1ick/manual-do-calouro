<?php
// Inicia a sessão
session_start();

// Inicia a conexão com banco de dados
require_once '../includes/connect.php'; 

// Import de bibliotecas de funções
include_once '../functions/sanitiza.php'; 
include_once '../functions/valida.php';
include_once '../functions/usuario.php';

// Definindo a conexão como uma constante global
define('CONNECT', db_connect());
$uriCrud = '../../web/crud_index.php';

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Verifica se há algum caracter indesejado
    if (validaFormulario($_POST)) {
        header("Location: '{$_SERVER['HTTP_REFERER']}'");
        exit();
    }
    
    // Verifica se o formulario foi de update atualização
    if (isset($_POST['btnAtualizar'])) {
        // Sanitização
        $dados = sanitizaFormulario($_POST);

        // Declaração de variáveis a serem modificadas
        $id = $dados['id'];
        $nome = $dados['nome'];
        $email = $dados['email'];

        $status = $dados['status'];
        atualizarStatusUsuario($id, $status);
        
        $acesso = $dados['acesso'];
        atualizarAcessoUsuario($id, $acesso);

        // Validações
        if (validaNome($nome, $uriCrud) && validaEmail($email, $uriCrud)) {
            // Verificações
            if (verificaEmail($email, $uriCrud)) {
                // Atualiza o nome e email de um usuário
                atualizarDadosUsuario($id, $nome, $email);
            }
        } 
    } 

    // Verifica se o formulario foi de cadastro
    else if (isset($_POST['btnCadastrar'])) {
        // Sanitização
        $dados = sanitizaFormulario($_POST);

        // Atribuição dos campos a variaveis
        $nome = $dados['nome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $acesso = $dados['acesso'];

        // Variavel com caminho da pagina
        $uriErro = '../../web/crud_cadastro.php';
    
        // Validações
        if (validaNome($nome, $uriErro) && validaEmail($email, $uriErro)) {
            // Verifica se o email esta disponivel
            if (verificaEmail($email, $uriErro)) {
                // Tenta cadastrar o usuario
                cadastrarUsuario($nome, $email ,$senha, $uriCrud, $acesso);  
            }
        }
    }
    // Verifica se o formulario foi de exclusão
    else if (isset($_POST['btnDeletar'])) {
        // Atribuindo id do usuário via hidden input
        $id = sanitizaString($_POST['id']);

        // Tenta excluir o usuario
        excluirUsuario($id);
    }
}
// Encerando a conexão
pg_close(CONNECT);
?>
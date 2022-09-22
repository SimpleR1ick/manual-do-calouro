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

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    
    // Verifica se há algum caracter indesejado
    if (verificaInjectHtml($_POST)) {

        // Verifica se o formulario foi de update atualização
        if (isset($_POST['btnAtualizar'])) {
            // Sanitização
            sanitizaFormularioPOST($_POST);

            // Declaração de variáveis a serem modificadas
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
        
            // Variavel com caminho da pagina
            $uri = '../../crud_editar.php';

            // Atualiza os dados do usuario
            atualizarDadosUsuario($id, $nome, $email, $uri);

            $status = $_POST['status'];
            $acesso = $_POST['acesso'];
            
            // Verifica se status e o acesso foi alterado
            if ($status != null) {
                alteraStatusUsuario($id, $status);
            } 
            if ($acesso != null) {
                alteraAcessoUsuario($id, $acesso);
            }
        } 

        // Verifica se o formulario foi de cadastro
        else if (isset($_POST['btnCadastrar'])) {
            // Sanitização
            sanitizaFormularioPOST($_POST);

            // Atribuição dos campos a variaveis
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $acesso = $_POST['acesso'];

            // Variavel com caminho da pagina
            $uriErro = '../../crud_cadastro.php';
            $uriAlvo = '../../crud_index.php';

            // Verifica se o email esta disponivel
            if (verificaEmail($email, $uri)) {
                // Tenta cadastrar o usuario
                cadastrarUsuario($nome, $email ,md5($senha), $uriAlvo, $acesso);  
            }
        }

        // Verifica se o formulario foi de exclusão
        else if (isset($_POST['btnDeletar'])) {
            // Atribuindo id do usuário via hidden input
            $id = $_POST['id'];

            // Tenta excluir o usuario
            excluirUsuario($id);
        }
    }
}
// Encerando a conexão
pg_close(CONNECT);
?>
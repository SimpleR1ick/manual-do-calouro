<?php
// Inicia a sessão
session_start();

// Incia a conexão com banco de dados
require_once '../includes/db_connect.php';

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';
include_once '../functions/validar.php';
include_once '../functions/processar.php';

define('PATH', '../../crud_index.php');
define('CONNECT', db_connect());

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $_POST = sanitizaCaractersPOST($_POST);

    // Verifica se o formulario foi de update, delete ou register
    if (isset($_POST['btnAtualizar'])) {
        // Invoca a função de atualização

        // Declaração de variáveis a serem modificadas
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $status = $_POST['ativo-inativo'];
        $acesso = $_POST['acesso'];

        atualizarDadosUsuario($id, $nome, $email, PATH);

        if ($status != null) {
            ativaDesativaUsuario($id, $status);
        }
        if ($acesso != null) {
            alteraAcessoUsuario($id, $acesso);
        }
    } 
    else if (isset($_POST['btnCadastrar'])) {
        // Comentar
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $acesso = $_POST['acesso'];

        // Comentar
        if (verificaEmail($email, PATH)) {
            // Comentar
            cadastrarUsuario($nome, $email ,md5($senha), PATH);  
        }
    }
    else if (isset($_POST['btnDeletar'])) {
        // Atribuindo id do usuário
        $id = $_POST['id'];

        excluirUsuario($id);
    }
    // Encerando a conexão
    pg_close(CONNECT);
}

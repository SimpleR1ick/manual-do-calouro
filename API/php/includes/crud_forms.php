<?php
// Inicia a sessão
session_start();

// Incia a conexão com banco de dados
require_once './db_connect.php';

// Import de bibliotecas de funções
include_once '../functions/crud_process.php';
include_once '../functions/sanitizar.php';
include_once '../functions/validar.php';

define('PATH', '../../crud_index.php');
define('CONNECT', db_connect());

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se o formulario foi de update, delete ou register
    if (isset($_POST['btnAtualizar'])) {
        // Invoca a função de atualização
        crudUpdate();
    }
    else if (isset($_POST['btnDeletar'])) {
        // Invoca a função de exclusão
        crudDelete();

    }
    else if (isset($_POST['btnCadastrar'])) {
        // Invoca a função de registro
        crudRegister();
    }
    // Encerando a conexão
    pg_close(CONNECT);
}

/**
 * Função para atualizar os dados de um usuario
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function crudUpdate(): void {
    // Declaração de variáveis a serem modificadas
    $id = pg_escape_string(CONNECT, $_POST['id']);
    $nome = pg_escape_string(CONNECT, $_POST['nome']);
    $email = pg_escape_string(CONNECT, $_POST['email']);

    atualizaDadosUsuario($id, $nome, $email, PATH);

    $status = $_POST['ativo-inativo'];
    $acesso = $_POST['acesso'];

    if ($acesso != null) {
        pg_query(CONNECT, "UPDATE usuario SET acesso = '$acesso' WHERE id_usuario = $id");
    }
    // Desativa o usuario 
    if ($status == 'true') {
        $bool = 't';
    } else {
        $bool = 'f';
    }
    $sql = "UPDATE usuario SET ativo = '$bool' WHERE id_usuario = '$id'";
    pg_query(CONNECT, $sql);
}

/**
 * Função para deletar os dados de um usuario
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function crudDelete(): void {
    // Atribuindo id do usuário
    $id = pg_escape_string(CONNECT, $_POST['id']);
    
    // Query para excluir o usuário no banco de dados
    $sql = "DELETE FROM usuario WHERE id_usuario = $id";

    // Verifica se a exclusão ocorreu sem problemas
    if (pg_query(CONNECT, $sql)) {
        $_SESSION['toast'] = "Excluído com sucesso!";
        header('Location: ../../crud_index.php');
        
    } else {
        $_SESSION['toast'] = "Erro ao excluir!";
        header('Location: ../../crud_index.php');
    }
}

/**
 * Função para registrar os dados de um usuario
 * 
 *@author Henrique Dalmagro
 */
function crudRegister(): void {
    $email = pg_escape_string(CONNECT, $_POST['email']);
    
    // Somente raliza o processo se o e-mail digitado não estiver cadastrado
    if (verificaEmail($email, '../crud_index.php')) {  
        $nome = pg_escape_string(CONNECT, $_POST['nome']);
        $senha = pg_escape_string(CONNECT, $_POST['senha']);
        $acesso = pg_escape_string(CONNECT, $_POST['acesso']);

        $senha = md5($senha);

        $sql = "INSERT INTO usuario (nom_usuario, email, senha, ativo, acesso) VALUES 
                ('$nome', '$email', '$senha', 't', '$acesso')";

        if (pg_query(CONNECT, $sql)) {
            // Adiciona minha sessão uma mensagem de sucesso
            $_SESSION['sucess'] = 'Cadastrado com sucesso!';

            // Envia o usuário de à página de index do crud
            header('Location: ../../crud_index.php');

        } else {
            // Adiciona à sessão uma mensagem de erro
            $_SESSION['mensag'] = 'Erro ao cadastrar!';

            // Retorna para o cadastro do crud
            header('Location: ../../crud_cadastro.php'); 
        }
    }
}

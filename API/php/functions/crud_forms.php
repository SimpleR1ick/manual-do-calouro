<?php
// Inicia a sessão
session_start();

// Conexão com banco de dados
require_once '../includes/connect.php';

// Import de bibliotecas de funções
include_once '../functions/verifica_valida.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se o formulario foi de update, delete ou register
    if (isset($_POST['btnAtualizar'])) {
        crudUpdate();
    }
    else if (isset($_POST['btnDeletar'])) {
        crudDelete();
    }
    else if (isset($_POST['btnCadastrar'])) {
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

    // Desativa o usuario 
    if ($_POST['ativo-inativo'] == 'false') {
        pg_query(CONNECT, "UPDATE usuario SET ativo = 'f' WHERE id_usuario = '$id'");
    }

    if ($_POST['acesso'] != '') {
        pg_query(CONNECT, "UPDATE usuario SET acesso = '{$_POST['acesso']}' WHERE id_usuario = $id");
    }

    // Query para fazer o update das informações do usuario
    $sql = "UPDATE usuario SET nom_usuario = '$nome', email = '$email' WHERE id_usuario = '$id'";

    // Verifica se o update ocorreu e redireciona para o crud_index
    if (pg_query(CONNECT, $sql)) {
        $_SESSION['mensag'] = "Atualizado com sucesso!";
        header('Location: ../../crud_index.php');

    } else {
        $_SESSION['mensag'] = "Erro ao atualizar!";
        header('Location: ../../crud_index.php');
    }
    
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

        $sql = "INSERT INTO usuario (nom_usuario, email, senha, acesso) VALUES 
                ('$nome', '$email', '$senha', '$acesso')";

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
?>


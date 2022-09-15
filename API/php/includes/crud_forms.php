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

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Abra uma conexão com o banco de dados
    $connect = db_connect();

    // Verifica se o formulario foi de update, delete ou register
    if (isset($_POST['btnAtualizar'])) {
        // Invoca a função de atualização
        crudUpdate($connect);
    }
    else if (isset($_POST['btnDeletar'])) {
        // Invoca a função de exclusão
        crudDelete($connect);

    }
    else if (isset($_POST['btnCadastrar'])) {
        // Invoca a função de registro
        crudRegister($connect);
    }
    // Encerando a conexão
    pg_close($connect);
}

/**
 * Função para atualizar os dados de um usuario
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function crudUpdate($db): void {
    // Declaração de variáveis a serem modificadas
    $id = pg_escape_string($db, $_POST['id']);
    $nome = pg_escape_string($db, $_POST['nome']);
    $email = pg_escape_string($db, $_POST['email']);

    $dados = array(
        'id' => $id,
        'nome' => $nome,
        'email' => $email
    );

    // Desativa o usuario 
    if ($_POST['ativo-inativo'] == 'true') {
        pg_query($db, "UPDATE usuario SET ativo = 't' WHERE id_usuario = '$id'");
    } else {
        pg_query($db, "UPDATE usuario SET ativo = 'f' WHERE id_usuario = '$id'");
    }

    if ($_POST['acesso'] != null) {
        pg_query($db, "UPDATE usuario SET acesso = '{$_POST['acesso']}' WHERE id_usuario = $id");
    }
    atualizaDadosUsuario($dados, PATH);
}

/**
 * Função para deletar os dados de um usuario
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function crudDelete($db): void {
    // Atribuindo id do usuário
    $id = pg_escape_string($db, $_POST['id']);
    
    // Query para excluir o usuário no banco de dados
    $sql = "DELETE FROM usuario WHERE id_usuario = $id";

    // Verifica se a exclusão ocorreu sem problemas
    if (pg_query($db, $sql)) {
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
function crudRegister($db): void {
    $email = pg_escape_string($db, $_POST['email']);
    
    // Somente raliza o processo se o e-mail digitado não estiver cadastrado
    if (verificaEmail($email, '../crud_index.php')) {  
        $nome = pg_escape_string($db, $_POST['nome']);
        $senha = pg_escape_string($db, $_POST['senha']);
        $acesso = pg_escape_string($db, $_POST['acesso']);

        $senha = md5($senha);

        $sql = "INSERT INTO usuario (nom_usuario, email, senha, ativo, acesso) VALUES 
                ('$nome', '$email', '$senha', 't', '$acesso')";

        if (pg_query($db, $sql)) {
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

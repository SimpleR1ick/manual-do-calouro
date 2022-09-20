<?php
// Iniciar a sessão
session_start();

// Inicia a conexão com banco de dados
require_once '../includes/db_connect.php';

// Definindo as constantes globais
define('CONNECT', db_connect());   // Conexão

// Import de bibliotecas de funções
include_once '../functions/sanitizar.php';
include_once '../functions/validar.php';
include_once '../functions/processar.php';

// Verifica se houve a requisição POST para esta pagina
if ($_SERVER['REQUEST_METHOD'] != 'POST') {

    // Verifica se o botão de envio foi pressionado
    if (isset($_POST['btnLogar'])) {

        // Verifica se algum campo possui caracter indesejados
        if (verificaInjectHtml($_POST)) {
            // Sanitização
            $dados = sanitizaFormularioPOST($_POST); 

            // Atribuição dos inputs do POST a variaveis
            $email = $dados['email'];
            $senha = $dados['senha'];
        
            // Variaveis dos caminhos possiveis
            $uriErro = '../../login.php';
            
            // Validações
            if (validaEmail($email, $uriErro)) {
                // Verificações
                if (verificaAtivo($email, $uriErro)) {
                    // Tenta realizar o login no site
                    logarUsuario($email, md5($senha));
                }
            }
        }   
    }
}
// Encerando a conexão
pg_close(CONNECT);
?>
<?php
// Iniciar a sessão
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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
            $uriErro = '../../web/login.php';
            
            // Validações
            if (validaEmail($email, $uriErro)) {
                // Verificações
                if (verificaAtivo($email, $uriErro)) {
                    // Tenta realizar o login no site
                    logarUsuario($email, $senha);
                }
            }
        }   
    }
}
// Encerando a conexão
pg_close(CONNECT);
?>
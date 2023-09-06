<?php 

// Iniciar a sessão
session_start();

// Inicia a conexão com banco de dados
require_once '../includes/connect.php'; 

// Import de bibliotecas de funções
include_once '../functions/sanitiza.php'; 
include_once '../functions/valida.php';
include_once '../functions/usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['btnRedefinir'])) {

        // Verifica se algum campo possui caracter indesejados
        if (validaFormulario($_POST)) {
            header("Location: '{$_SERVER['HTTP_REFERER']}'");
            exit();
        }
        // Sanitização
        $dados = sanitizaFormulario($_POST); 

        // Atribuição dos inputs do POST a variaveis
        $id = $dados['id'];
        $novaSenha = $dados['novaSenha'];
        $novaSenha2 = $dados['novaSenhaConfirma'];

        // Variavel com caminho da pagina
        $uriErro = '../../web/redefinir_senha';

        // Valida se as senhas são iguais
        if (validaSenha($novaSenha, $novaSenha2, $uriErro)) {
            // Verifica se a senha atende os requisitos minimos
            if (verificaSenha($novaSenha, $uriErro)) {
                // Atualiza a senha do usuario
                atualizarSenhaUsuario($id, $novaSenha);

                header('Location: ../../web/login.php');
            }
        }
    }
}
?>
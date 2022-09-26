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

        if (verificaInjectHtml($_POST)) {

            $dados = sanitizaFormularioPOST($_POST);

            $id = $dados['id'];
            $novaSenha = $dados['novaSenha'];
            $novaSenha2 = $dados['novaSenhaConfirma'];

            $uriErro = '../../web/redefinir_senha';

            if (validaSenha($novaSenha, $novaSenha2, $uriErro)) {
                if (verificaSenha($novaSenha, $uriErro)) {
                    
                    $senhaHash = criptografarSenha($novaSenha);

                    atualizarSenhaUsuario($id, $senhaHash);
                }
            }
            header('Location: ../../web/login.php');
        }
    }
}

?>
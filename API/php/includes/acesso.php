<!-- CRUD usuarios -->
<?php
/**
 * Função para verificar o acesso ao crud de usuarios
 * 
 * @author Henrique Dalmagro
 */
function verificaAcessoCrud(): void {
    if (isset($_SESSION['id_usuario'])) {
        $dados = getDadosUsuario();

        if ($dados['acesso'] == 0) {
            header('Location: crud_index.php');
        }
    }
}
?>
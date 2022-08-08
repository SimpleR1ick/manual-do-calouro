<?php
/**
 * Função para verificar o acesso ao crud de usuarios
 * 
 * @author Henrique Dalmagro
 */
function verificaAcessoCrud(): void {
    if (isset($_SESSION['id_usuario'])) {
        if ($_SESSION['acesso'] == 0) {
        ?>
            <li class="nav-item">
                <a class="nav-link" href="crud_index.php">Usuarios</a>
            </li>
        <?php
        }
    }
}
?>
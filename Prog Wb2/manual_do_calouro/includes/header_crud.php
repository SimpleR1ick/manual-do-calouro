<?php
if (isset($_SESSION['id_usuario'])) {
    if ($dados['acesso'] == 0) {
    ?>
        <li class="nav-item">
            <a class="nav-link" href="crud_index.php">Usuarios</a>
        </li>
    <?php
    }
}
?>
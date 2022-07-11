<?php include_once 'connect.php' ?>

<?php
if (isset($_SESSION['id_usuario'])) {
    if ($_SESSION['acesso'] == 0) {
?>
        <li class="nav-item">
            <a class="nav-link" href="crud_index.php">CRUD</a>
        </li>
<?php
    } else {
        mysqli_close($connect);
    }
}
?>

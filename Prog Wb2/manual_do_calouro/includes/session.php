<?php
session_start();

require_once 'connect.php';

if (isset($_SESSION['logado'])) {

    $id = $_SESSION['id_usuario'];
    echo "<h1> $id </h1>";

    $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
    
    $resultado = mysqli_query($connect, $sql);
    
    $dados = mysqli_fetch_array($resultado);
    
    echo "<h1> $dados </h1>";
}
?>
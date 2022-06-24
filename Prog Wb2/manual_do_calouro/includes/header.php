<?php
// Iniciar a sessão
session_start();

// Conectando com o banco de dados
include_once 'includes/connect.php';

$id = $_SESSION['id_usuario'];

$sql = "SELECT nome FROM usuarios WHERE id_user = '$id'";

$query = mysqli_query($connect, $sql);

$dados = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css" />

    <!-- JavaScript -->
    <script src="js/script.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/0bc28c3585.js" crossorigin="anonymous"></script>

    <!-- Titutlo do site-->
    <title>Manual do Calouro</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark mb-4 p-3">
            <div class="container">
                <a class="navbar-brand text-uppercase" href="home.php"><img height="35px" src="img/logo.png"></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barra_nav"
                    aria-controls="barra_nav" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="barra_nav">
                    <ul class="navbar-nav ml-auto mr-md-4">
                        <!-- Redireciona para as paginas, Home, Sobre, Mapa, Calendario, Horarios -->
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="sobre.php">Sobre</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="mapa.php">Mapa</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="calendario.php">Calendário</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="horario.php">Horários</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="menu_dropdown_principal" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ROD
                            </a>

                            <div class="dropdown-menu" aria-labelledby="menu_dropdown_principal">
                                <a class="dropdown-item" href="rod_simp.php">Simplificado</a>
                                <a class="dropdown-item" href="rod_comp.php">Completo</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contatos.php">Contatos</a>
                        </li>
                    </ul>

                    <!-- Barra de pesquisa -->
                    <form class="form-inline my-2 my-lg-0">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Pesquisar" aria-label="Pesquisar" />

                            <div class="input-group-append">
                                <button class="btn btn-dark mr-3" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Área de login -->
                    <?php

                    if (isset($_SESSION['id_usuario'])) {
                        echo "<p> {$dados['nome']} </p>";

                    } else {
                        $href = "window.location.href = 'login.php'";
                        echo "<button onclick='$href' class='btn btn-info' type='button'>
                                Entrar
                            </button>";
                    }

                    ?>
                    
                </div>
            </div>
        </nav>
    </header>
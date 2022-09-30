<?php 
// Iniciar a sessão
session_start();

require_once '../php/includes/connect.php'; // Inicia a conexão com o banco de dados
require_once '../php/functions/session.php';// Funções da sessão
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Font Awesome - Ícones -->
    <script src="https://kit.fontawesome.com/0bc28c3585.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" />

    <!-- Titutlo do site-->
    <?php tituloSite(); ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark py-3 mb-4">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img height="35px" src="../assets/images/logo.png" alt="Logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Redirecionamento das respectivas paginas -->
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0">
                        <!-- Home -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <!-- Sobre -->
                        <li class="nav-item">
                            <a class="nav-link" href="sobre.php">Sobre</a>
                        </li>
                        <!-- Mapa -->
                        <li class="nav-item">
                            <a class="nav-link" href="mapa.php">Mapa</a>
                        </li>
                        <!-- Horarios -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php verificaTurma(); ?>">Horários</a>
                        </li>
                        <!-- Contatos -->
                        <li class="nav-item">
                            <a class="nav-link" href="contatos.php">Contatos</a>
                        </li>
                        <!-- ROD -->
                        <li class="nav-item">
                            <a class="nav-link" href="rod.php">ROD</a>
                        </li>
                        <!-- FAQ -->
                        <li class="nav-item">
                            <a class="nav-link" href="faq.php">FAQ</a>
                        </li>
                    </ul>

                    <?php exibirLogin(); ?>  
                </div>
            </div>
        </nav>
    </header>
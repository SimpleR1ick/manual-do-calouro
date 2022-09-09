<?php include_once 'php/functions/session.php'; ?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Font Awesome - Ícones -->
    <script src="https://kit.fontawesome.com/0bc28c3585.js" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />

    <!-- JQuery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- Titutlo do site-->
    <?php tituloSite(); ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark py-3 mb-4">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img height="35px" src="img/logo.png" alt="Logo">
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
                            <a class="nav-link" href="horarios.php">Horários</a>
                        </li>
                        <!-- Contatos -->
                        <li class="nav-item">
                            <a class="nav-link" href="fale_conosco.php">Contatos</a>
                        </li>
                        <!-- ROD -->
                        <li class="nav-item">
                            <a class="nav-link" href="rod.php">ROD</a>
                        </li>
                    </ul>

                    <div class="d-flex space-between">
                        <!-- Barra de pesquisa -->
                        <div class="me-3">
                            <form role="search">
                                <div class="input-group">
                                    <input class="form-control" type="search" placeholder="Pesquisar" aria-label="Search">

                                    <button class="btn btn-dark" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php exibirLogin(); ?>  
                </div>
            </div>
        </nav>
    </header>
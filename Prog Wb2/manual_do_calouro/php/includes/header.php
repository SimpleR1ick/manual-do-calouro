<?php include_once 'session.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

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
        <nav class="navbar navbar-expand-lg navbar-dark mb-4 p-3">
            <div class="container">
                <a class="navbar-brand text-uppercase" href="index.php"><img height="35px" src="img/logo.png"></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barra_nav" aria-controls="barra_nav" aria-expanded="false" aria-label="Alterna navegação">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Redirecionamento das respectivas paginas -->
                <div class="collapse navbar-collapse" id="barra_nav">
                    <ul class="navbar-nav ms-auto me-md-4">
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
                            <a class="nav-link" href="horarios.php">Horarios</a>
                        </li>
                        <!-- Contatos -->
                        <li class="nav-item">
                            <a class="nav-link" href="contatos.php">Contatos</a>
                        </li>

                        <!-- ROD -->
                        <li class="nav-item">
                            <a class="nav-link" href="rod.php">ROD</a>
                        </li>
                    </ul>

                    <!-- Barra de pesquisa -->
                    <form class="form-inline my-2 my-lg-0">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Pesquisar" aria-label="Pesquisar" />

                            <div class="input-group-append">
                                <button class="btn btn-dark me-3" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Área de login -->
                    <?php verificaLogin(); ?>
                    
                </div>
            </div>
        </nav>
    </header>
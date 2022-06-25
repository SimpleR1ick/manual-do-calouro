<!-- Verifica se o usuário está logado e separa
     pega as informações do banco de dados -->
<?php include_once 'session.php' ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css" />

    <!-- JavaScript -->
    <script src="js/script.js"></script>


    <!-- Titutlo do site-->
    <?php
    // Verifica se existe um id de usuário na sessão
    if (isset($_SESSION['id_usuario'])) {
        // Coloca o título da página como o nome de quem logou
        echo "<title> {$dados['nome']} </title>";

    // Caso não exista, deixa o título padrão da página
    } else {
        echo "<title> Manual do Calouro </title>";
    }
    ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark mb-4 p-3">
            <div class="container">
                <a class="navbar-brand text-uppercase" href="home.php"><img height="35px" src="img/logo.png"></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barra_nav" aria-controls="barra_nav" aria-expanded="false" aria-label="Alterna navegação">
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
                            <a class="nav-link" href="contatos.php">Contatos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="crud_index.php">CRUD</a>
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
                    // Verifica se existe um id de usuário na sessão
                    if (isset($_SESSION['id_usuario'])) {
                        // Se existir um usuário, cria um botão para dar logout
                        echo
                        "<button onclick='window.location.href = \"includes/logout.php\"' class='btn btn-info' type='button'>
                            Sair
                        </button>";

                    // Se não existir um usuário, cria um botão para dar login
                    } else {
                        echo
                        "<button onclick='window.location.href = \"login.php\"' class='btn btn-info' type='button'>
                            Entrar
                        </button>";
                    }
                    ?>

                </div>
            </div>
        </nav>
    </header>
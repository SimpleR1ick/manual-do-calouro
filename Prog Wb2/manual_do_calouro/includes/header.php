<header>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4 p-3">
        <div class="container">
            <a class="navbar-brand text-uppercase" href="index.php"><img height="35px" src="img/logo.png"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#barra_nav"
                aria-controls="barra_nav" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="barra_nav">
                <ul class="navbar-nav ml-auto mr-md-4">
                    <!-- Redireciona para as paginas, Home, Sobre, Mapa e Calendario -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
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

                <!-- Area de login -->
                <button onclick="window.location.href = 'login.php'" class="btn btn-info" type="button">
                    Entrar
                </button>
            </div>
        </div>
    </nav>
</header>

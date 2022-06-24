<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once 'includes/head.php'; ?>
</head>

<body>
    <!-- Header-->
    <?php include_once 'includes/header.php'; ?>

    <!-- Conteudo da pagina -->
    <section>
        <div class="mb-4">
            <div class="container">
                <div class="d-flex justify-content-center">

                    <div class="border rounded shadow-sm p-4  bg-light">
                        <div class="h1">Login</div>

                        <form method="POST" action="includes/logar.php">

                            <!-- Email -->
                            <div class="form-group">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input id="email" name="email" class="form-control" type="email" aria-describedby="ajudaEmail" placeholder="Seu email" autocomplete="on">
                            </div>

                            <!-- Senha -->
                            <div class="form-group">
                                <label class="font-weight-bold" for="senha">Senha</label>
                                <input id="senha" name="senha" class="form-control" type="password" placeholder="Senha">
                            </div>

                            <!--
                            <div class="form-group form-check">
                                <input class="form-check-input" id="rememberMe" type="checkbox" >
                                <label class="form-check-label" for="rememberMe">Lembre de mim</label>
                            </div> -->

                            <button id="btnLogar" name="btnLogar" class="btn btn-primary" type="submit">Login</button>

                        </form>

                        <!-- Redirecionamento para cadastro -->
                        <nav class="mt-5" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Ainda não tem uma conta?</li>
                                <li class="breadcrumb-item"><a href="cadastro.php">Cadastre-se</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include_once 'includes/footer.php'; ?>
</body>

</html>
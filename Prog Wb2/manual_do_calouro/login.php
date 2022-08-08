<!-- Header-->
<?php include_once 'includes/header.php'; ?>

<!-- Conteúdo da pagina -->
<?php include_once 'includes/logar.php'; ?>

<section>
    <div class="mb-4">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="border rounded shadow-sm p-4 bg-light">
                    <h1 class="h1">Login</h1>

                    <form id="login" action="<?php formularioLogin(); ?>" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <!-- Email -->
                        <div class="form-group">
                            <label class="font-weight-bold" for="email">Email</label>
                            <input id="email" name="email" class="form-control" type="email" aria-describedby="ajudaEmail" placeholder="Seu email" autocomplete="on" required>
                        </div>

                        <!-- Senha -->
                        <div class="form-group">
                            <label class="font-weight-bold" for="senha">Senha</label>
                            <input id="senha" name="senha" class="form-control" type="password" placeholder="Senha" required>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <button id="btnLogar" name="btnLogar" class="btn btn-primary" type="submit">Login</button>
                            </div>
                            <div class="col-9">
                                <?php exibirErros(); ?>
                            </div>
                        </div>
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

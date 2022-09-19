<!-- Header-->
<?php include_once 'php/includes/header.php'; ?>

<section>
    <div class="mb-4">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card border rounded shadow-sm px-sm-2 px-md-4 pt-2 mb-5 bg-light">

                    <div class="card-body">
                        <h1 class="h1 text-center">Login</h1>

                        <form id="login" action="php/post/logar.php" method="POST" autocomplete="on" enctype="multipart/form-data">

                            <div class="mb-1">
                                <?php exibirErros(); ?>
                                <?php exibirSucesso(); ?>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label" for="email">Email:</label>
                                <input id="email" name="email" class="form-control" type="email" aria-describedby="ajudaEmail" placeholder="Seu email" autocomplete="on" required>
                            </div>

                            <!-- Senha -->
                            <div class="mb-4">
                                <label class="form-label" for="senha">Senha:</label>
                                <input id="senha" name="senha" class="form-control" type="password" placeholder="Senha" required>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button id="btnLogar" name="btnLogar" class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </form>

                        <!-- Redirecionamento para cadastro -->
                        <div class="mt-4 d-flex justify-content-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Não tem uma conta?</li>
                                    <li class="breadcrumb-item"><a href="cadastro.php">Cadastre-se</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>

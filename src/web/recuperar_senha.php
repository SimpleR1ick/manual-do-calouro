<!-- Header-->
<?php include_once '../php/layout/header.php'; ?>

<section>
    <div class="mb-4">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card border rounded shadow-sm px-sm-2 px-md-4 pt-2 mb-5 bg-light">

                    <div class="card-body">
                        <h1 class="h1 text-center">Recuperar senha</h1>

                        <form id="recuperar" action="../php/post/recupera.php" method="POST" autocomplete="on">

                            <div class="mb-1">
                                <?php exibirErros(); ?>
                                <?php exibirSucesso(); ?>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label" for="email">Insira seu e-mail para redefinir sua senha:</label>

                                <input id="email" name="email" class="form-control" type="email" aria-describedby="ajudaEmail" placeholder="Seu email" autocomplete="on" required>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button id="btnRecuperar" name="btnRecuperar" class="btn btn-primary" type="submit">Enviar</button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once '../php/layout/footer.php'; ?>

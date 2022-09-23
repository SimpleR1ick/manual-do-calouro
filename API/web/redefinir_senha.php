<!-- Header-->
<?php include_once '../php/layout/header.php'; ?>

<section>
    <div class="mb-4">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card border rounded shadow-sm px-sm-2 px-md-4 pt-2 mb-5 bg-light">

                    <div class="card-body">
                        <h1 class="h1 text-center">Redefinir senha</h1>

                        <form id="redefinir" action="../php/post/redefine.php" method="POST" autocomplete="on">

                            <div class="mb-1">
                                <?php exibirErros(); ?>
                                <?php exibirSucesso(); ?>
                            </div>

                            <!-- Senha -->
                            <div class="mb-3">
                                <label class="form-label" for="novaSenha">Nova senha:</label>
                                <input id="novaSenha" name="novaSenha" class="form-control" type="password" min="6" placeholder="Sua nova senha" autocomplete="off" required>
                                <div id="dica-senha" class="form-text">Mínimo de 6 caracteres, uma letra, um número e um caractere especial</div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label" for="novaSenha2">Confirmar nova senha:</label>
                                <input id="novaSenhaConfirma" name="novaSenhaConfirma" class="form-control" type="password" placeholder="Confirme sua senha" autocomplete="off" required>
                            </div>

                            <div class="d-flex justify-content-center">
                                <a href="login.php" class="btn btn-primary">Redefinir</a>
                                <!-- <button id="btnRedefinir" name="btnRedefinir" class="btn btn-primary" type="submit">Redefinir</button> -->
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

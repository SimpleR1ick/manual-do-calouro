<!-- Header-->
<?php include_once 'includes/header.php'; ?>

<!-- Conteúdo da pagina -->
<section>
    <div class="mb-4">
        <div class="container">
            <div class="d-flex justify-content-center">

                <div class="border rounded shadow-sm p-4 bg-light">

                    <div class="h1">Login</div>

                    <form method="POST" action="includes/logar.php">

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
                                <?php
                                    // Verifica se existe alguma menssagem de erro de login e imprime
                                    if (isset($_SESSION['mensagem'])) {
                                        echo "<p class='align-middle text-center text-danger'> {$_SESSION['mensagem']} </p>";
                                        
                                        $_SESSION['mensagem'] = null;
                                    }
                                ?>
                            </div>
                        </div>
                    
                    </form>

                    <!-- Redirecionamento para cadastro -->
                    <nav class="mt-5">
                        <span>
                            Ainda não tem uma conta? | <a href="cadastro.php">Cadastre-se</a>
                        </span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'includes/footer.php'; ?>

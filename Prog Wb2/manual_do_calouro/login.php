<!-- Cabeçalho -->
<?php
    include_once 'header.php';
?>
<!-- Conteúdo da página -->
<section>
    <div class="mb-4">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="border rounded shadow-sm p-4  bg-light">
                    <h1 class="h1">Login</h1>
                    <form>
                        <div class="form-group">
                            <label class="font-weight-bold" for="email">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="ajudaEmail"
                                placeholder="Seu email" autocomplete="on">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" placeholder="Senha">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Lembre de mim</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>

                    <div class="mt-5">
                        <span>
                            Ainda não tem uma conta? | <a href="cadastro.html">Cadastre-se</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rodapé -->
<?php
    include_once 'footer.php';
?>
<!-- Header-->
<?php include_once '../php/layout/header.php'; ?>

<!-- Conteudo da pagina -->
<section>
    <div class="mb-4">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card border rounded shadow-sm px-sm-2 px-md-4 pt-2 mb-5 bg-light">

                <div class="card-body">
                    <h1 class="h1 text-center">Cadastro</h1>

                    <form id="cadastro" action="../php/post/cadastrar.php" method="POST" autocomplete="on" enctype="multipart/form-data">

                        <div class="mb-1">
                            <?php exibirErros(); ?>
                        </div>

                        <!-- Nome -->
                        <div class="mb-3">
                            <label class="form-label" for="nome">Nome:</label>
                            <input id="nome" name="nome" class="form-control" type="text" placeholder="Seu nome" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label" for="email">E-mail:</label>
                            <input id="email" name="email" class="form-control" type="email" aria-describedby="ajudaEmail" placeholder="Seu email" required>
                        </div>

                        <!-- Senha -->
                        <div class="mb-3">
                            <label class="form-label" for="senha">Senha:</label>
                            <input id="senha" name="senha" class="form-control" type="password" min="6" placeholder="Sua senha" autocomplete="off" required>
                            <div id="dica-senha" class="form-text">Mínimo de 6 caracteres, uma letra, um número e um caractere especial</div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="senha2">Confirmar senha:</label>
                            <input id="senhaConfirma" name="senhaConfirma" class="form-control" type="password" placeholder="Confirme sua senha" autocomplete="off" required>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button name="btnCadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
                        </div>
                    </form>

                    <!-- Redireciona para login -->
                    <div class="mt-4 d-flex justify-content-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Já possui uma conta?</li>
                                <li class="breadcrumb-item"><a href="login.php">Entrar</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once '../php/layout/footer.php'; ?>

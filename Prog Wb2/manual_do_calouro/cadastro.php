<!-- Header-->
<?php include_once 'php/includes/header.php'; ?>

<!-- Conteúdo da pagina -->
<section>
    <div class="mb-4">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="border rounded shadow-sm p-4 bg-light">
                    <h1 class="h1">Cadastro</h1>

                    <form id="cadastro" action="php/includes/cadastrar.php" method="POST" autocomplete="on" enctype="multipart/form-data">
                        <!-- Nome -->
                        <div class="form-group">
                            <label class="font-weight-bold" for="nome">Nome</label>
                            <input id="nome" name="nome" class="form-control" type="text" placeholder="Seu nome" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label class="font-weight-bold" for="email">E-mail</label>
                            <input id="email" name="email" class="form-control" type="email" aria-describedby="ajudaEmail" placeholder="Seu email" required>
                        </div>

                        <!-- Senha -->
                        <div>
                            <div class="form-group">
                                <label class="font-weight-bold" for="senha">Senha</label>
                                <input id="senha" name="senha" class="form-control" type="password" placeholder="Sua senha" autocomplete="off" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold" for="senha2">Confirmar senha</label>
                                <input id="senhaConfirma" name="senhaConfirma" class="form-control" type="password" placeholder="Confirme sua senha" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <button name="btnCadastrar" class="btn btn-primary" type="submit">Cadastrar</button>
                            </div>
                            <div class="col-9">
                                <?php //exibirErros(); ?>
                            </div>
                        </div>
                    </form>

                    <!-- Redireciona para login -->
                    <nav class="mt-5" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Já possui uma conta?</li>
                            <li class="breadcrumb-item"><a href="login.php">Entrar</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>

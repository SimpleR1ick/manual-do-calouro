<!-- Header -->
<?php include_once '../php/layout/header.php';
verificaNivelAcesso(); ?>

<!-- Conteúdo da pagina -->
<section class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <form action="../php/post/crud_usuario.php" method="POST">
                <!-- NOME -->
                <div class="mb-3">
                    <label for="user_nome" class="form-label"> Nome </label>
                    <input required type="text" class="form-control" id="user_nome" name="nome">
                </div>

                <!-- EMAIL -->
                <div class="mb-3">
                    <label for="user_email" class="form-label"> Email </label>
                    <input required type="email" class="form-control" id="user_email" name="email">
                </div>

                <!-- SENHA -->
                <div class="mb-3">
                    <label for="user_senha" class="form-label"> Senha </label>
                    <input required id="user_senha" name="senha" type="password" class="form-control" minlength="6" aria-describedby="senhaHelp">
                </div>

                <div class="input-group mb-3" id="user_adm_ativo">
                    <!-- ACESSO -->
                    <div class="me-3">
                        <label class="form-label" for="user_adm_acesso">Acesso</label>
                        <input required class="form-control" type="number" id="user_adm_acesso" name="acesso" min="1" max="5">
                    </div>

                    <div class="form-text">
                    <small>5 - servidor</small><br>
                        <small>4 - professor</small><br>
                        <small>3 - aluno</small><br>
                        <small>2 - usuario</small><br>
                        <small>1 - admin</small>
                    </div>
                </div>

                <button class="btn btn-primary me-3" type="submit" name="btnCadastrar">Cadastrar</button>
                <a href="./crud_index.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once '../php/layout/footer.php'; ?>
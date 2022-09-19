<!-- Header-->
<?php include_once 'php/includes/header.php';
verificaNivelAcesso(); ?>

<!-- Conteudo da pagina -->
<?php $dados = getDadosHeader(); ?>
<section class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <form action="php/post/crud_forms.php" method="POST">
                <input type="hidden" id="id" name="id" value="<?php echo $dados['id_usuario']; ?>">

                <!-- NOME -->
                <div class="mb-3">
                    <label class="form-label" for="nome"> Nome </label>
                    <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $dados['nom_usuario']; ?>">
                </div>

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label" for="email"> E-mail </label>
                    <input class="form-control" type="email" aria-describedby="ajudaEmail" id="email" name="email" value="<?php echo $dados['email']; ?>">
                </div>

                <div class="input-group mb-3" id="user_adm_ativo">
                    <!-- ATIVO -->
                    <div class="me-5">
                        <label for="user_adm_ativo" class="form-label">Status</label>
                        <div class="form-check">
                            <input required class="form-check-input" type="radio" id="user_adm_ativoTrue" name="ativo-inativo" value="true" checked>
                            <label class="form-check-label" for="user_adm_ativoTrue"> Ativo </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="user_adm_ativoFalse" name="ativo-inativo" value="false">
                            <label class="form-check-label" for="user_adm_ativoFalse"> Inativo </label>
                        </div>
                    </div>

                    <!-- ACESSO -->
                    <div class="me-3">
                        <label class="form-label" for="user_adm_acesso">Acesso</label>
                        <input class="form-control" type="number" id="user_adm_acesso" name="acesso" min="0" max="3" value="<?php echo $dados['acesso']; ?>">
                    </div>

                    <div class="form-text">
                        <small>3 - servidor</small><br>
                        <small>2 - professor</small><br>
                        <small>1 - aluno</small><br>
                        <small>0 - admin</small>
                    </div>
                </div>

                <button class="btn btn-primary me-2" name="btnAtualizar" type="submit"> Atualizar </button>
                <a href="./crud_index.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>
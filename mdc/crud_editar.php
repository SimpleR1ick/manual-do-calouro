<!-- Header-->
<?php include_once 'php/includes/header.php'; ?>

<!-- PHP -->
<?php include_once 'php/functions/crud_proces.php';
$dados = crudGetDados(); ?>

<!-- Conteudo da pagina -->
<section>
    <div class="mb-4">
        <div class="row">
            <div class="col-8 align-self-center">
                <form action="php/functions/crud_forms.php" method="POST">
                    <input type="hidden" id="id" name="id" value="<?php echo $dados['id_usuario']; ?>">

                    <!-- NOME -->
                    <div class="form-group">
                        <label class="font-weight-bold" for="nome"> Nome </label>
                        <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $dados['nom_usuario']; ?>">
                    </div>

                    <!-- EMAIL -->
                    <div class="form-group">
                        <label class="font-weight-bold" for="email"> E-mail </label>
                        <input class="form-control" type="email" aria-describedby="ajudaEmail" id="email" name="email" value="<?php echo $dados['email']; ?>">
                    </div>

                    <!-- ATIVO -->
                    <div class="mb-3">
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
                    <div class="mb-3">
                        <label class="form-label" for="user_adm_acesso">ACESSO</label>
                        <input class="form-control" type="number" id="user_adm_acesso" name="acesso" min="0" max="3" value="<?php echo $dados['acesso']; ?>">
                    </div>

                    <button class="btn btn-primary" name="btnAtualizar" type="submit"> Atualizar </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>
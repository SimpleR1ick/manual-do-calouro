<!-- Header-->
<?php include_once 'php/includes/header.php'; ?>

<!-- PHP -->
<?php require_once 'php/functions/crud.php'; ?>
<!-- Conteudo da pagina -->
<section>
    <div class="mb-4">
        <div class="row">
            <div class="col-8 align-self-center">
                <form action="crud_update.php" method="POST">
                    <?php $dados = crudGetDados(); ?>

                    <input type="hidden" id="id" name="id" 
                           value="<?php echo $dados['id_usuario']; ?>">

                    <div class="form-group">
                        <label class="font-weight-bold" for="nome">Nome</label>
                        <input class="form-control" type="text" id="nome" name="nome" 
                               value="<?php echo $dados['nom_usuario']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="email">E-mail</label>
                        <input class="form-control" type="email" aria-describedby="ajudaEmail" id="email" name="email" 
                               value="<?php echo $dados['email']; ?>">
                    </div>

                    <button class="btn btn-primary" name="btnUpdate" type="submit">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>

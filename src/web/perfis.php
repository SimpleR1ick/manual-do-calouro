<!-- Header-->
<?php include_once '../php/layout/header.php'; ?>

<?php verificaUsuarioLogado();
$userData = getDadosUsuario(); ?>

<!-- Conteudo da pagina -->
<?php include_once '../php/interface/perfil.php'; ?>
<section>
    <div class="p-3 d-flex flex-column align-items-center container">
        <form class="w-75" action="../php/post/update.php" method="POST" enctype="multipart/form-data">
            <div class="mb-1">
                <?php exibirErros(); ?>
                <?php exibirSucesso(); ?>
            </div>

            <input type="hidden" id="acesso" name="acesso" value="<?php echo $userData['fk_acesso_id_acesso']; ?>">

            <div class="row">
                <div class="col-6 text-center">
                    <label for="foto-editar-perfil" class="form-label fw-bold h5">Editar foto de perfil</label>
                </div>
                <!-- TEXTO CAMPO -->
                <div class='col-6 text-center'>
                    <?php textoTipoUsuario(); ?>
                </div>
            </div>

            <!--Primeira row-->
            <div class="row mb-4">
                <div class="col-6">
                    <!-- IMAGEM DE PERFIL -->
                    <div class="d-flex flex-column align-items-center p-3">
                        <?php exibirFoto(); ?>
                    
                        <input type="hidden" name="MAX_FILE_SIZE" value="33554432">
                        <input class="mt-4 form-control form-control-sm" id="nova-foto-perfil" name="foto" type="file" accept="image/*">
                    </div>
                </div>

                <div class="col-6 d-flex flex-column justify-content-center">
                    <?php campoTipoUsuario(); ?>
                </div>
            </div>

            <!--Segunda row-->
            <div class="row">
                <!-- NOME -->
                <div class="mb-3">
                    <label for="nome" class="form-label fw-bold">Nome</label>
                    <input required type="text" class="form-control" id="nome" name="nome"
                        value="<?php echo $userData['nom_usuario']; ?>">
                </div>

                <!-- EMAIL -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input required type="email" class="form-control" id="email" name="email" 
                        value="<?php echo $userData['email']; ?>">
                </div>
            </div>

            <!--Terceira row-->
            <div class="row mt-3">
                <div class="d-flex flex-column align-items-center justify-content-md-around flex-md-row">
                    <!-- SALVAR -->
                    <button class="btn btn-primary me-2" name="btnIncrement" type="submit">Salvar alterações</button>

                    <!-- MUDAR SENHA -->
                    <a href="#" class="btn btn-danger mt-2" type="button">Redefinir senha</a>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Footer -->
<?php include_once '../php/layout/footer.php'; ?>
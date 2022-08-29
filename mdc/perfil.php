<!-- Header-->
<?php include_once 'php/includes/header.php'; ?>

<!-- PHP -->
<?php $userData = getDadosUsuario(); ?>

<!-- Conteudo da pagina -->
<section>
    <div class="p-3 d-flex flex-column align-items-center container">
        <form id="perfil" action="php/functions/upload.php" method="POST" class="w-75 " enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 text-center">
                    <label for="foto-editar-perfil" class="form-label fw-bold h5">Editar foto de perfil</label>
                </div>
                <div class="col-6 text-center">
                    <label class="form-label fw-bold h5">Editar turma</label>
                </div>
            </div>

            <!--Primeira row-->
            <div class="row mb-4">
                <div class="col-6">
                    <!-- IMAGEM DE PERFIL -->
                    <div class="d-flex flex-column align-items-center p-3">

                        <?php
                        if (isset($userData['img_perfil'])) {
                            ?>
                            <img id="foto-editar-perfil" class="img-fluid" src="img/perfil/<?php echo $userData['img_perfil']; ?>" alt="user-pic">
                            <?php
                        } else {
                            echo '<img id="foto-editar-perfil" class="img-fluid rounded" src="img/perfil/user.png" alt="user-pic">';
                        }
                        ?>
                        
                        <input type="hidden" name="MAX_FILE_SIZE" value="33554432">

                        <input class="mt-4 form-control form-control-sm" id="nova-foto-perfil" name="foto" type="file">
                    </div>
                </div>

                <div class="col-6 d-flex flex-column justify-content-center">
                    <!-- CURSO -->
                    <div class="mb-3">
                        <label for="curso" class="form-label fw-bold">Curso</label>

                        <select id="curso" name="modulo" class="form-select">
                            <option selected value="">Selecione seu curso...</option>
                            <option value="1">Informática para Internet</option>
                            <option value="2">Mecatrônica</option>
                            <option value="3">Internet das Coisas</option>
                        </select>
                    </div>

                    <!-- MÓDULO -->
                    <div class="mb-3">
                        <label for="modulo" class="form-label fw-bold">Módulo</label>

                        <select id="modulo" name="modulo" class="form-select">
                            <option selected value="">Selecione seu módulo...</option>
                            <option value="1">1° módulo</option>
                            <option value="2">2° módulo</option>
                            <option value="3">3° módulo</option>
                            <option value="4">4° módulo</option>
                            <option value="5">5° módulo</option>
                            <option value="6">6° módulo</option>
                        </select>
                    </div>
                </div>
                <!--Fim da Primeira row-->
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
                <!-- Fim da Segunda row-->
            </div>


            <!--Terceira row-->
            <div class="row mt-3">

                <div class="d-flex flex-column align-items-center justify-content-md-around flex-md-row">
                    <!-- SALVAR -->
                    <button class="btn btn-primary me-2" name="btnIncrement" type="submit">Salvar alterações</button>

                    <!-- MUDAR SENHA -->
                    <button class="btn btn-danger mt-2" type="button">Redefinir senha</button>
                </div>

                <!-- Fim da Terceira row-->
            </div>
        </form>
    </div>
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>
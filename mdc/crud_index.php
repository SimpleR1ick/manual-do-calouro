<!-- Header-->
<?php include_once 'php/includes/header.php'; ?>

<?php verificaNivelAcesso(); ?>

<!-- Conteúdo da pagina -->
<section class="container">
    <div class="mb-4">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        <?php include_once 'php/interface/crud.php'; ?>
                    </tbody>
                </table>
            </div>

            <div class="row d-flex justify-content-center mt-3">
                <div class="col-2">
                    <a href="./crud_cadastro.php" class="btn btn-sm btn-primary">Adicionar novo usuário</a>
                </div>
            </div>
        </div>
    </div>  
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>
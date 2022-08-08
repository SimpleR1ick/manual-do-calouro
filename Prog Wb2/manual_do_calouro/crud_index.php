<!-- Header-->
<?php include_once 'includes/header.php'; ?>

<!-- Conteúdo da pagina -->
<?php include_once 'packages/crud.php'?>

<section>
    <div class="mb-4">
        <div class="row">
            <div class="col-8 align-self-center">
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
                        <?php crudExibirDados(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'includes/footer.php'; ?>

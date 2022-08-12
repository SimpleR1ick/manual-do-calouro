<!-- Header-->
<?php include_once 'php/includes/header.php'; ?>

<!-- PHP -->
<?php require_once 'php/functions/crud.php'; ?>

<!-- Conteúdo da pagina -->
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
                            <th scope="col">Alterar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        <?php crudMain(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>

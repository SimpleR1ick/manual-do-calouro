<!-- Header-->
<?php include_once 'php/includes/header.php'; ?>

<!-- PHP -->
<?php require_once 'php/functions/crud.php'; ?>

<!-- Conteúdo da pagina -->
<section>
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
                        <?php crudMainTable(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL DELETE -->
    <div class="modal fade" id="btn_delete" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- CABEÇALHO -->
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloModal">Deseja mesmo excluir esse item?</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- RODAPÉ -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>

                    <a href="crud_delete.php?id=<?php echo $dados['id_usuario']; ?>" class="btn btn-danger">
                        Deletar
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>
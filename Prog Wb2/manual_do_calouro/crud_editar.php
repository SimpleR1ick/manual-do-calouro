<!-- Header-->
<?php include_once 'php/includes/header.php'; ?>

<!-- Conteudo da pagina -->
<?php
require_once 'php/includes/connect.php';

if (isset($_GET['id'])) {
    $id = pg_escape_string(_CONEXAO_, $_GET['id']);

    // Seleciona na tabela usuarios um usuario com mesmo ID
    $sql = "SELECT * FROM usuario WHERE id_usuario = '$id'";
    $query = pg_query(_CONEXAO_, $sql);

    // Converte o resultado para um array
    $dados = pg_fetch_array($query);
}
print_r($dados);

?>
<section>
    <div class="mb-4">
        <div class="row">
            <div class="col-8 align-self-center">
                <form action="crud_update.php" method="POST">
                    <input type="hidden" name="id" 
                    value="<?php echo $dados['id_usuario']; ?>">

                    <div class="form-group">
                        <label class="font-weight-bold" for="nome">Nome</label>
                        <input id="nome" name="nome" class="form-control" type="text" 
                        value="<?php echo $dados['nom_usuario']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="email">E-mail</label>
                        <input id="email" name="email" class="form-control" type="email" aria-describedby="ajudaEmail" 
                        value="<?php echo $dados['email']; ?>">
                    </div>

                    <button name="btnUpdate" class="btn btn-primary" type="submit">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>

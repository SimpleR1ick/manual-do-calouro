<!-- Header-->
<?php include_once 'includes/header.php'; ?>

<!-- Conexão -->
<?php include_once 'includes/connect.php' ?>

<!-- Pegando os dados -->
<?php 
// Verifica se o ID não esta vazio 
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);

    // Seleciona na tabela usuarios um usuario com mesmo ID
    $sql = "SELECT * FROM usuarios WHERE id_user = '$id'";
    $query = mysqli_query($connect, $sql);

    // Converte o resultado para um array
    $dados = mysqli_fetch_array($query);
}
?>

<!-- Conteudo da pagina -->
<section>
    <div class="mb-4">
        <div class="row">
            <div class="col-8 align-self-center">
            
                <form action="crud_update.php" method="POST">

                    <input type="hidden" name="id_user" value="<?php echo $dados['id_user']; ?>">

                    <div class="form-group">
                        <label class="font-weight-bold" for="nome">Nome</label>
                        <input id="nome" name="nome" class="form-control" type="text" value="<?php echo $dados['nome']; ?>">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold" for="email">E-mail</label>
                        <input id="email" name="email" class="form-control" type="email" aria-describedby="ajudaEmail" value="<?php echo $dados['email']; ?>">
                    </div>

                    <button name="btnUpdate" class="btn btn-primary" type="submit">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'includes/footer.php'; ?>
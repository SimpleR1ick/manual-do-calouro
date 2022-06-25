<!-- Header-->
<?php include_once 'includes/header.php'; ?>

<!-- Conexão -->
<?php include_once 'includes/connect.php' ?>

<!-- Conteúdo da pagina -->
<section>
    <div class="mb-4">
        <div class="row">
            <div class="col-8 align-self-center">
                <div class="col-9">
                    <?php
                        // Verifica se existe alguma menssagem de erro de login e imprime
                        if (isset($_SESSION['mensagem'])) {
                            echo "<p class='align-middle text-center text-danger'> {$_SESSION['mensagem']} </p>";
                            
                            $_SESSION['mensagem'] = null;
                        }
                    ?>
                </div>

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
                        <?php
                        // Seleciona a tabela usuarios por inteira
                        $sql = "SELECT * FROM usuarios";
                        $query = mysqli_query($connect, $sql);

                        // Enquanto houver linhas no query, imprime os dados dos usuarios
                        if (mysqli_num_rows($query) > 0) {
                            while ($dados = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <th scope="row"><?php echo $dados['id_user']; ?></th>
                                    <td><?php echo $dados['nome']; ?></td>
                                    <td><?php echo $dados['email']; ?></td>

                                    <td><a href="crud_editar.php?id=<?php echo $dados['id_user']; ?>" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-pen"></i></a></td>
                                    <td><a href="crud_delete.php?id=<?php echo $dados['id_user']; ?>" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                        <?php
                            }
                        // Caso não existe usuarios cadastrados    
                        } else { ?>
                            <tr>
                                <th scope="row">-</th>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'includes/footer.php'; ?>

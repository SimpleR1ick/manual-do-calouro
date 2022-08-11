<!-- Header-->
<?php include_once 'php/includes/header.php'; ?>

<!-- Conteúdo da pagina -->
<?php require_once 'php/includes/connect.php'; 
echo $_SESSION['mensag']; ?>

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
                        <?php     
                        // Seleciona a tabela usuarios por inteira, menos os usuarios administrador
                        $sql = "SELECT * FROM usuario WHERE acesso != 0";
                        $query = pg_query(_CONEXAO_, $sql);

                        // Enquanto houver linhas no query, imprime os dados dos usuarios
                        if (pg_num_rows($query) > 0) {
                            while ($dados = pg_fetch_array($query)) { 
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $dados['id_usuario']; ?></th>
                                    <td><?php echo $dados['nom_usuario']; ?></td>
                                    <td><?php echo $dados['email']; ?></td>
                                    
                                    <td><a href="crud_editar.php?id=<?php echo $dados['id_usuario']; ?>" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-pen"></i></a></td>
                                    <td><a href="crud_delete.php?id=<?php echo $dados['id_usuario']; ?>" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                                <?php
                            } 
                        } else { // Caso não existe usuarios cadastrados  
                            echo('
                                <tr>
                                    <th scope="row">-</th>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                </tr>
                            ');
                        }                  
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>

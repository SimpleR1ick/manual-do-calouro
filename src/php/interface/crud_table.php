<?php
/**
 * Função para imprimir a tabela de usuários não administradores cadastrados
 * 
 * 
 */
function crudTable(): void {
    // Inicia a conexão
    $db = db_connect();

    // Seleciona a tabela usuarios por inteira, menos os usuarios administrador
    $sql = "SELECT id_usuario, nom_usuario, email FROM usuario WHERE fk_acesso_id_acesso != 1 ORDER BY id_usuario";
    $query = pg_query($db, $sql);

    // Encerra a conexão
    pg_close($db);

    if (pg_num_rows($query) == 0): ?>
        <tr>
            <th scope="row">-</th>
            <td> - </td>
            <td> - </td>
            <td> - </td>
            <td> - </td>
        </tr>
         
    <?php else:
        // Enquanto houver linhas no query, imprime os dados dos usuarios 
        while ($dados = pg_fetch_array($query)): ?>
            <!-- CRUD TABLE -->
            <tr>
                <th scope="row"><?php echo $dados['id_usuario']; ?></th>
                
                <td><?php echo $dados['nom_usuario']; ?></td>
                <td><?php echo $dados['email']; ?></td>
                
                <td>
                    <a class="btn btn-warning btn-sm text-center" href="crud_editar.php?id=<?php echo $dados['id_usuario']; ?>">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                </td>
                
                <td>
                    <!-- Botão trigger do modal delete -->
                    <button class="btn btn-danger btn-sm text-center" type="button" data-bs-toggle="modal" data-bs-target="#modal<?php echo $dados['id_usuario']; ?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>

            <!-- MODAL DELETE -->
            <div class="modal fade" id="modal<?php echo $dados['id_usuario']; ?>" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- CABEÇALHO -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="tituloModal">Deseja mesmo excluir esse item?</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- RODAPÉ -->
                        <div class="modal-footer">
                            <form action="../php/post/crud_usuario.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id_usuario']; ?>">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                                <button type="submit" class="btn btn-danger" name="btnDeletar" id="toastDeleteBtn" >Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
    endif;
}
?>
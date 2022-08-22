<?php
/**
 * Função para gerar a tabela do crud Usuarios
 * 
 * @author Henrique Dalmagro - Maria Barros
 */
function crudMainTable(): void {
    // Seleciona a tabela usuarios por inteira, menos os usuarios administrador
    $sql = "SELECT id_usuario, nom_usuario, email FROM usuario WHERE acesso != 0";
    $query = pg_query(CONNECT, $sql);

    // Enquanto houver linhas no query, imprime os dados dos usuarios
    if (pg_num_rows($query) == 0) {
        ?>
            <tr>
                <th scope="row">-</th>
                <td> - </td>
                <td> - </td>
                <td> - </td>
                <td> - </td>
            </tr>
        <?php
    } else { // Caso não existe usuarios cadastrados  
        while ($dados = pg_fetch_array($query)) { 
        ?>
            <!-- CRUD TABLE -->
            <tr>
                <th scope="row"><?php echo $dados['id_usuario']; ?></th>
                
                <td><?php echo $dados['nom_usuario']; ?></td>
                <td><?php echo $dados['email']; ?></td>
                
                <td>
                    <a href="crud_editar.php?id=<?php echo $dados['id_usuario']; ?>" class="btn btn-warning btn-sm text-center">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                </td>
                
                <td>
                    <!-- Botão trigger do modal delete -->
                    <button type="button" class="btn btn-danger btn-sm text-center" data-bs-toggle="modal" data-bs-target="#modal<?php echo $dados['id_usuario']; ?>">
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- RODAPÉ -->
                        <div class="modal-footer">
                            <form action="crud_delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id_usuario']; ?>">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Voltar</button>
                                <button type="submit" name="btn-deletar" id="toastDeleteBtn" class="btn btn-danger"> Deletar </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } 
    }
}
/*
 * Função para deletar um usuario do banco de dados
 * 
 * @author Henrique Dalmagro
 */
/* function deleteUsuario(): void {
    // Verifica se o id existe
    if (isset($_GET['id'])) {
        // Atribuindo id do usuário
        $id = pg_escape_string(CONNECT, $_GET['id']);
        
        // Query para excluir o usuário no banco de dados
        $sql = "DELETE FROM usuario WHERE id_usuario = $id";

        // Verifica se a exclusão ocorreu sem problemas
        if (pg_query(CONNECT, $sql)) {
            $_SESSION['mensag'] = "Excluído com sucesso!";
            header('Location: ../crud_index.php');
            
        } else {
            $_SESSION['mensag'] = "Erro ao excluir!";
            header('Location: ../crud_index.php');
        }
    }
}
/**
 * Função para atualizar um usuario no banco de dados
 * 
 * 
 * @author Henrique Dalmagro
 */
/*function updateUsuario(): void {
    // Verifica se houve o post do formulario 
    if (isset($_POST['btnUpdate'])) {
        // Declaração de variáveis a serem modificadas
        $id = pg_escape_string(CONNECT, $_POST['id']);
        $nome = pg_escape_string(CONNECT, $_POST['nome']);
        $email = pg_escape_string(CONNECT, $_POST['email']);

        // Query para fazer o update das informações do usuario
        $sql = "UPDATE usuario SET nom_usuario = '$nome', email = '$email' WHERE id_usuario = '$id'";

        // Verifica se o update ocorreu e redireciona para o crud_index
        if (pg_query(CONNECT, $sql)) {
            $_SESSION['mensag'] = "Atualizado com sucesso!";
            header('Location: crud_index.php');

        } else {
            $_SESSION['mensag'] = "Erro ao atualizar!";
            header('Location: crud_index.php');
        }
    }
}
*/
?>
<?php
/**
 * Função para obter todos os dados de um usuario
 * 
 * @author Henrique Dalmagro
 */
function crudObterDados(): void{
    if (isset($_GET['id'])) {
        $id = pg_escape_string(_CONEXAO_, $_GET['id']);
    
        // Seleciona na tabela usuarios um usuario com mesmo ID
        $sql = "SELECT * FROM usuario WHERE id_usuario = '$id'";
        $query = pg_query(_CONEXAO_, $sql);
    
        // Converte o resultado para um array
        $dados = pg_fetch_array($query);

        return $dados;
    }
}
/**
 * Função para criar a tabela do CRUD Usuarios
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function crudExibirDados(): void {
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

                <td><a href="<?php crudUpdate(); ?>?id=<?php echo $dados['id_usuario']; ?>" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-pen"></i></a></td>
                <td><a href="<?php crudDelete(); ?>?id=<?php echo $dados['id_usuario']; ?>" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        <?php
        } 
    } else { // Caso não existe usuarios cadastrados  
        echo ('
            <tr>
                <th scope="row">-</th>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
        ');
    }                  
}

/**
 * Função para deletar um usuario
 * 
 * @author Henrique Dalmagro
 */
function crudDelete(): void {
    // Verifica se existe id do usuário
    if (isset($_GET['id'])) {
        // Atribuindo id do usuário
        $id = pg_escape_string(_CONEXAO_, $_GET['id']);
        
        // Query para deletar o usuário no banco de dados
        $sql = "DELETE FROM usuario WHERE id_usuario = '$id'";

        // Verifica se o usuário foi excluído e envia o user de volta para o crud_index
        if (pg_query(_CONEXAO_, $sql)) {
            $_SESSION['toast'] = "Excluído com sucesso!";
            header('Location: crud_index.php');

        } else {
            $_SESSION['mensagem'] = "Erro ao excluir!";
            header('Location: crud_index.php');
        }
    }
}

/**
 * Função para atualizar os dados de um usuario
 * 
 * @author Henriuqe Dalmagro
 */
function crudUpdate(): void {
    // Verifica se houve requisição de update/edição
    if (isset($_POST['btnUpdate'])) {
        // Declaração de variáveis a serem modificadas
        $id = pg_escape_string(_CONEXAO_, $_POST['id']);
        $nome = pg_escape_string(_CONEXAO_, $_POST['nome']);
        $email = pg_escape_string(_CONEXAO_, $_POST['email']);

        // Query para fazer o update da tabela
        $sql = "UPDATE usuario SET nom_usuario = '$nome', email = '$email' WHERE id_usuario = '$id'";
    
        // Verifica se o update aconteceu e manda o user de volta para o crud_index
        if (pg_query(_CONEXAO_, $sql)) {
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: crud_index.php');

        } else {
            $_SESSION['mensagem'] = "Erro ao atualizar!";
            header('Location: crud_index.php');
        }
    }
}
?>
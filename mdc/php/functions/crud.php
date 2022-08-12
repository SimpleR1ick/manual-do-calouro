<?php
/**
 * 
 * 
 * 
 * 
 * @author Henrique Dalmagro
 */
function crudMain(): void {
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
            <tr>
                <th scope="row"><?php echo $dados['id_usuario']; ?></th>
                <td><?php echo $dados['nom_usuario']; ?></td>
                <td><?php echo $dados['email']; ?></td>
                
                <td><a href="crud_editar.php?id=<?php echo $dados['id_usuario']; ?>" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-pen"></i></a></td>
                <td><a href="crud_delete.php?id=<?php echo $dados['id_usuario']; ?>" class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        <?php
        } 
    }
}
/**
 * 
 * 
 * 
 * @author Henrique Dalmagro
 */
function crudGetDados(): array {
    if (isset($_GET['id'])) {
        $id = pg_escape_string(CONNECT, $_GET['id']);

        // Seleciona na tabela usuarios um usuario com mesmo ID
        $sql = "SELECT * FROM usuario WHERE id_usuario = '$id'";
        $query = pg_query(CONNECT, $sql);

        // Retorna o resultado convertido em um array
        return pg_fetch_array($query);
    }
}
?>
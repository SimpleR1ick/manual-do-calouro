<?php
// Iniciar a sessão
session_start();

// Conectando com o banco de dados
require_once 'connect.php';

/**
 * Função para iniciar a sessão do usuario no site
 * 
 * @return array $userData dados do usuario
 *  
 * @author Henrique Dalmagro - Rafael Barros
 */
function getDadosUsuario(): array {
    if (isset($_SESSION['id_usuario'])) {
        // Armazenao id da sessão em uma variavel
        $id = $_SESSION['id_usuario'];

        // Busca os dados do usuário atravéz do id
        $sql = "SELECT id_usuario, nom_usuario, email, acesso, ativo, img_perfil 
                FROM usuario WHERE id_usuario = '$id'";
        $query = pg_query(CONNECT, $sql);
        
        // Transforma as colunas da query em um array
        $result = pg_fetch_array($query);

        return $result;
    }
    // Encerando a conexão
    pg_close(CONNECT);  
}

/**
 * Função para alterar o titulo do site 
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function tituloSite(): void {    
    // Verifica se existe um id de usuário na sessão
    if (isset($_SESSION['id_usuario'])) {
        // Chama função que coleta os dados do usuário do banco
        $userData = getDadosUsuario();

        // Coloca o título da página como o nome de quem logou
        echo "<title>{$userData['nom_usuario']}</title>";
    } else {
        // Coloca o tiulo default da pagina
        echo "<title>Manual do Calouro</title>";
    }
}

/**
 * Função para verificar se existe um usuario logado
 *  
 * @author Henrique Dalmagro
 */
function exibirLogin(): void {
    // Se existir um usuário, cria um botão para dar logout
    if (isset($_SESSION['id_usuario'])) {
        echo
        "<button onclick='window.location.href = \"php/includes/logout.php\"' class='btn btn-info' type='button'>
            Sair
        </button>";
    // Se não existir um usuário, cria um botão para dar login
    } else {
        echo
        "<button onclick='window.location.href = \"login.php\"' class='btn btn-primary' type='button'>
            Entrar
        </button>";
    }
}

/**
 * Função para exibir a imagem de perfil
 * 
 * @author Henrique Dalmagro
 */
function exibirFoto(): void {
    if (isset($_SESSION['id_usuario'])) { 
        if (isset($userData['img_perfil'])) {
            // Imagem do Usuario cadastrada no banco
            echo "<img id='foto-editar-perfil' class='img-fluid' alt='user-pic' src='img/uploads/{$userData['img_perfil']}>";
        } else {
            // Imagem Default 
            echo '<img id="foto-editar-perfil" class="img-fluid rounded" alt="user-pic" src="img/user.png">';
        }
    }
}

/**
 * Função para verificar o acesso ao crud de usuarios
 * 
 * @author Henrique Dalmagro
 */
function verificaAcessoCrud(): void {
    if (isset($_SESSION['id_usuario'])) {
        $userData = getDadosUsuario();
        
        if ($userData['acesso'] == 0) {
            header('Location: crud_index.php');
        }
    }
}
?>
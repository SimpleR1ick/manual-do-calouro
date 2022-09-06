<?php
// Iniciar a sessão
session_start();

// Conectando com o banco de dados
require_once 'connect.php';

/**
 * Função para armazenar os dados do usuario da sessão atual
 * 
 * @return array $userData retorna um array assossiativo com os dados
 *  
 * @author Henrique Dalmagro - Rafael Barros
 */
function getDadosUsuario(): array {
    if (isset($_SESSION['id_usuario'])) {
        // Armazena o id da sessão em uma variavel
        $id = $_SESSION['id_usuario'];

        // Busca os dados do usuário atravéz do id na sessão
        $sql = "SELECT id_usuario, nom_usuario, email, img_perfil, acesso, ativo
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
        $userData = getDadosUsuario();

        // Armazena em uma variavel o nome do usuario
        $userName = $userData['nom_usuario'];

        // Coloca o título da página como o nome de quem logou
        echo "<title>$userName</title>";
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
        "<button class='btn btn-info' type='button' onclick='window.location.href = \"php/includes/logout.php\"'>
            Sair
        </button>";
    // Se não existir um usuário, cria um botão para dar login
    } else {
        echo
        "<button class='btn btn-primary' type='button' onclick='window.location.href = \"login.php\"'>
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
        $userData = getDadosUsuario();

        // Armazena em uma variavel o nome da foto do usuario
        $path = $userData['img_perfil'];
        
        if (!empty($path)) {
            // Imagem do Usuario cadastrada no banco
            echo "<img id='foto-editar-perfil' class='img-fluid' alt='user-pic' src='img/uploads/$path>";
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
function verificaNivelAcesso(): void {
    if (isset($_SESSION['id_usuario'])) {
        $userData = getDadosUsuario();

        // Armazena em uma variavel o nivel de acesso do usuario  
        $acesso = $userData['acesso'];
        
        if ($acesso != 0) {
            header('Location: index.php');
        }
    } else {
        header('Location: index.php');
    }
}
?>
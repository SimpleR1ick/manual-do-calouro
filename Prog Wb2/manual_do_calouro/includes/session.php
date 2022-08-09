<?php
// Iniciar a sessão
session_start();

// Conectando com o banco de dados
include_once 'connect.php';

/**
 * Função para iniciar a sessão do usuario no site
 * 
 * @param $connect - dados da conexão com banco de dados
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function armazenaDadosUsuario(): array {
    if (isset($_SESSION['id_usuario'])) {
        // Atribuindo à variável id o id da sessão
        $id = $_SESSION['id_usuario'];
        
        // Busca os dados do usuário atravéz do id
        $sql = "SELECT nom_usuario, acesso, ativo FROM usuario WHERE id_usuario = '$id'";
        $query = pg_query(_CONEXAO_, $sql);
        
        // Transforma as colunas da query em um array
        $userData = pg_fetch_array($query);

        return $userData;
    }
}

/**
 * Função para alterar o titulo do site com o nome do usuario
 * 
 * @author Henrique Dalmagro - Rafael Barros
 */
function tituloSite(): void {    
    // Verifica se existe um id de usuário na sessão
    if (isset($_SESSION['id_usuario'])) {
        // Chama função que coleta os dados do usuário do banco
        $userData = armazenaDadosUsuario();

        // Coloca o título da página como o nome de quem logou
        echo "<title>{$userData['nom_usuario']}</title>";

    // Caso não exista, deixa o título padrão da página
    } else {
        echo "<title>Manual do Calouro</title>";
    }
}

/**
 * Função para verificar se existe um usuario logado
 *  
 * @author Henrique Dalmagro
 */
function verificaLogin(): void {
    // Se existir um usuário, cria um botão para dar logout
    if (isset($_SESSION['id_usuario'])) {
        echo
        "<button onclick='window.location.href = \"includes/logout.php\"' class='btn btn-info' type='button'>
            Sair
        </button>";
    // Se não existir um usuário, cria um botão para dar login
    } else {
        echo
        "<button onclick='window.location.href = \"login.php\"' class='btn btn-info' type='button'>
            Entrar
        </button>";
    }
}
?>
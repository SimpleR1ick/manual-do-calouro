<?php
// Iniciar a sessão
session_start();

// Inicia a conexão com o banco de dados
require_once 'php/includes/db_connect.php';

/**
 * Função para armazenar os dados do usuario da sessão atual
 * 
 * @return array $userData retorna um array assossiativo com os dados
 *  
 * @author Henrique Dalmagro - Rafael Barros
 */
function getDadosUsuario(): array {
    // Verifica se existe um usuario logado
    if (isset($_SESSION['id_usuario'])) {
        // Armazena o id da sessão em uma variavel
        $id = $_SESSION['id_usuario'];

        // Abra uma conexão com o banco de dados
        $db = db_connect();

        // Busca os dados do usuário atravéz do id na sessão
        $sql = "SELECT id_usuario, nom_usuario, email, img_perfil, acesso, ativo
                FROM usuario WHERE id_usuario = '$id'";
        $query = pg_query($db, $sql);

        // Transforma as colunas da query em um array
        $result = pg_fetch_array($query);

        // Encerando a conexão
        pg_close($db);
     
        return $result;
    }  
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
 * 
 * 
 * 
 */
function verificaTurma(): void {
    if (isset($_SESSION['id_usuario'])) {
        $userData = getDadosUsuario();

        if ($userData['acesso'] == 1) {
            // Criando conexão com o banco de dados
            $db = db_connect();
            
            // Selecionando o curso e o módulo do usuário da sessão
            $sql = "SELECT t.fk_curso_id_curso AS curso, t.num_modulo AS modulo FROM turma t JOIN aluno a
                    ON (t.id_turma = a.fk_turma_id_turma)
                    WHERE a.fk_usuario_id_usuario = {$_SESSION['id_usuario']}";
            // Faz uma requisição ao banco de dados
            $query = pg_query($db, $sql);

            // Fechando a conexão com o banco de dados
            pg_close($db);

            if ($query) {
                // Transforma a query em um array
                $result = pg_fetch_array($query);

                // Envia para a página de horarios com o curso e o módulo
                echo "horarios.php?curso={$result['curso']}&modulo={$result['modulo']}";
            }
        }
    } else {
        echo "horarios.php";
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
        echo "<button class='btn btn-info' type='button' onclick='window.location.href = \"php/includes/logout.php\"'>Sair</button>";
    // Se não existir um usuário, cria um botão para dar login
    } else {
        echo "<button class='btn btn-primary' type='button' onclick='window.location.href = \"login.php\"'>Entrar</button>";
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
            echo "<img id='foto-editar-perfil' class='img-fluid' alt='user-pic' src='assets/uploads/$path>";
        } else {
            // Imagem Default 
            echo '<img id="foto-editar-perfil" class="img-fluid rounded" alt="user-pic" src="assets/images/user.png">';
        }
    }
}

/**
 * Função para imprimir o ultimo erro gerado
 * 
 * @author Rafael Barros - Henrique Dalmagro
 */
function exibirErros(): void {
    // Verifica se existe alguma menssagem de erro de login e imprime
    if (isset($_SESSION['mensag'])) {
        $texto_mensagem = $_SESSION['mensag'];

        echo "<p class='align-middle text-center text-danger'>$texto_mensagem</p>";
        
        unset($_SESSION['mensag']);
    }
}

/**
 * Função para imprimir mesagem de sucesso
 * 
 * @author Rafael Barros
 */
function exibirSucesso(): void {
    // Verifica se existe alguma mensagem de sucesso de login 
    if (isset($_SESSION['sucess'])) {
        $texto_sucesso = $_SESSION['sucess'];

        echo "<p class='align-middle text-center text-success'>$texto_sucesso</p>";

        unset($_SESSION['sucess']);
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

/**
 * Função para verificar o acesso ao crud de usuarios
 * 
 * @author Henrique Dalmagro
 */
function verificaAcessoCrud(): void {
    if (isset($_SESSION['id_usuario'])) {
        $userData = getDadosUsuario();

        // Armazena em uma variavel o nivel de acesso do usuario  
        $acesso = $userData['acesso'];

        if ($acesso == 0) {
            header('Location: crud_index.php');
        }
    }
}

/**
 * Função para verificar se existe um usuario na sessão,
 * caso não o redireciona pro home.
 * 
 * @author Henrique Dalmagro
 */
function verificaUsuarioLogado(): void {
    if (empty($_SESSION['id_usuario'])) {
        $_SESSION['mensag'] = 'Acesso negado, necessario login!';
        
        header('Location: index.php');
    }
}
?>
<?php
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
        // Abra uma conexão com o banco de dados
        $db = db_connect();

        // Armazena o id da sessão em uma variavel
        $id = pg_escape_string($db, $_SESSION['id_usuario']);

        // Busca os dados do usuário atravéz do id na sessão
        $sql = "SELECT id_usuario, nom_usuario, email, img_perfil, ativo, fk_acesso_id_acesso
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
 * Função para obter todos os dados de um usuario atravez do id
 * 
 * @return array $userData dados do usuario
 * 
 * @author Henrique Dalmagro
 */
function getDadosHeader(): array {
    if (isset($_GET['id'])) {
        // Inicia a conexão
        $db = db_connect();

        $id = pg_escape_string($db, $_GET['id']);

        // Seleciona na tabela usuarios um usuario com mesmo ID
        $sql = "SELECT * FROM usuario WHERE id_usuario = '$id'";
        $query = pg_query($db, $sql);

        // Retorna o resultado convertido em um array
        $userData = pg_fetch_array($query);

        // Encerando a conexão
        pg_close($db);

        return $userData;
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

        if ($userData['fk_acesso_id_acesso'] == 3) {
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

            if (pg_num_rows($query) > 0) {
                // Transforma a query em um array
                $result = pg_fetch_array($query);

                // Envia para a página de horarios com o curso e o módulo
                echo "horarios.php?curso={$result['curso']}&modulo={$result['modulo']}";

            }

        } else {
            echo "horarios.php";
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
        $userData = getDadosUsuario();
        
        // Armazena em uma variavel o nome da foto do usuario
        $path = $userData['img_perfil'];
        
        if (empty($path)) {
            $path = "images/user.png";
        } else {
            $path = "uploads/".$userData['img_perfil'];
        }


        echo 
        "<div class='dropdown'>
            <button class='btn border-none dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
            
                <img id='img-perfil' alt='user-pic' src='../assets/$path'>.
            </button>

            <ul class='dropdown-menu'>
                <li><a class='dropdown-item' href='perfis.php'>Perfil</a></li>
                <li><a class='dropdown-item' href='fale_conosco.php'>Fale conosco</a></li>
                <li><a class='dropdown-item' href='../php/includes/logout.php'>Sair<i class='fa-solid fa-right-from-bracket ms-2'></i></a></li>
            </ul>
        </div>";
    // Se não existir um usuário, cria um botão para dar login
    } else {
        echo "<button class='btn btn-primary' type='button' onclick='window.location.href = \"./login.php\"'>Entrar<i class=\"fa-solid fa-right-to-bracket ms-2\"></i></button>";
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
        
        // Imagem no editar perfil
        if (!empty($path)) {
            // Imagem do Usuario cadastrada no banco
            echo "<img id='foto-editar-perfil' class='img-fluid' alt='user-pic' src='../assets/uploads/$path'>";
        } else {
            // Imagem Default 
            echo '<img id="foto-editar-perfil" class="img-fluid rounded" alt="user-pic" src="../assets/images/user.png">';
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
        $acesso = $userData['fk_acesso_id_acesso'];
        
        if ($acesso != 1) {
            header('Location: index.php');
        }
    } else {
        header('Location: index.php');
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
        
        header('Location: login.php');
    }
}
?>
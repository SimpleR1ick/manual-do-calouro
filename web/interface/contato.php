<?php
/**
 * Função para exibir a imagem de perfil
 * 
 * @author Henrique Dalmagro
 */
function buscaFoto($id, $db): void {
    $sql = "SELECT img_perfil FROM usuario WHERE id_usuario = $id";
    $query = pg_query($db, $sql);

    $result = pg_fetch_array($query);

    // Armazena em uma variavel o nome da foto do usuario
    $path = $result['img_perfil'];
    
    if (!empty($path)) {
        // Imagem do Usuario cadastrada no banco
        echo "<img class='img-contato' src='public/uploads/$path' alt='foto do prof'>";
    } else {
        // Imagem Default 
        echo '<img class="img-contato" src="public/images/user.png" alt="foto do prof">';
    }
}

/**
 * Função para imprimir os contatos dos servidores
 * 
 * @author Rafael Barros
 */
function imprimeContato($filtro = 0) {
    // Abrindo a conexão com o banco
    $db = db_connect();

    if ($filtro == 1) {
        // SELECT para pegar os dados necessários para os contatos do administrativo
        $sql = "SELECT id_usuario,
                    nom_usuario,
                    dsc_setor,
                    img_perfil,
                    hora_inicio,
                    hora_fim,
                    num_sala
                    FROM usuario u
                    JOIN servidor s ON (u.id_usuario = s.fk_usuario_id_usuario)
                    JOIN sala sa ON (s.fk_sala_id_sala = sa.id_sala)
                    JOIN servidor_horario sh ON (s.fk_usuario_id_usuario = sh.fk_servidor_fk_usuario_id_usuario)
                    JOIN horario h ON (sh.fk_horario_id_horario = h.id_horario)
                    JOIN administrativo a ON (s.fk_usuario_id_usuario = a.fk_servidor_fk_usuario_id_usuario)
                    JOIN setor se ON (a.fk_setor_id_setor = se.id_setor)";

    } else if ($filtro == 2) {
        // SELECT para pegar os dados necessários para os contatos dos professores
        $sql = "SELECT id_usuario,
                    nom_usuario,
                    dsc_setor,
                    regras,
                    img_perfil,
                    num_sala
                    FROM usuario u
                    JOIN servidor s ON (u.id_usuario = s.fk_usuario_id_usuario)
                    JOIN sala sa ON (s.fk_sala_id_sala = sa.id_sala)
                    LEFT JOIN administrativo a ON (s.fk_usuario_id_usuario = a.fk_servidor_fk_usuario_id_usuario)
                    LEFT JOIN setor se ON (a.fk_setor_id_setor = se.id_setor)
                    JOIN professor p ON (s.fk_usuario_id_usuario = p.fk_servidor_fk_usuario_id_usuario)
                    JOIN contato c ON (s.fk_usuario_id_usuario = c.fk_servidor_fk_usuario_id_usuario)";

    } else {
        // SELECT para pegar os dados necessários para todos os contatos
        $sql = "SELECT id_usuario,
                    nom_usuario,
                    dsc_setor,
                    regras,
                    img_perfil,
                    hora_inicio,
                    hora_fim,
                    num_sala
                    FROM usuario u 
                    JOIN servidor s ON (u.id_usuario = s.fk_usuario_id_usuario)
                    JOIN sala sa ON (s.fk_sala_id_sala = sa.id_sala)
                    JOIN servidor_horario sh ON (s.fk_usuario_id_usuario = sh.fk_servidor_fk_usuario_id_usuario) 
                    JOIN horario h ON (sh.fk_horario_id_horario = h.id_horario)
                    LEFT JOIN professor p ON (s.fk_usuario_id_usuario = p.fk_servidor_fk_usuario_id_usuario)
                    LEFT JOIN administrativo a ON (s.fk_usuario_id_usuario = a.fk_servidor_fk_usuario_id_usuario)
                    LEFT JOIN setor se ON (a.fk_setor_id_setor = se.id_setor)";
    }
    
    // Pegando e transformando os dados de informação do(s) servidor(es)
    $query = pg_query($db, $sql);
    $info = pg_fetch_all($query);
              
    for ($i = 0; $i < count($info); $i++) {
        // SELECT para pegar os contatos para os servidores
        $sql = "SELECT nom_usuario,
                    dsc_contato,
                    dsc_tipo
                    FROM usuario u
                    JOIN servidor s ON (u.id_usuario = s.fk_usuario_id_usuario)
                    JOIN contato c ON (s.fk_usuario_id_usuario = c.fk_servidor_fk_usuario_id_usuario)
                    JOIN tipo_contato tc ON (c.fk_tipo_contato_id_tipo = tc.id_tipo)
                    WHERE nom_usuario = '{$info[$i]['nom_usuario']}'";

        // Pegando e transformando os dados de contato do(s) serivdor(es)
        $query = pg_query($db, $sql);
        $contato = pg_fetch_all($query);
        ?>
        <!-- CARD CONTATO -->
        <div class="d-flex flex-column align-items-center">
            <div class="accordion col-md-7 mb-2 w-100" id="contato-<?php echo "$i"; ?>">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="titulo-<?php echo "$i"; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regras-<?php echo "$i"; ?>" aria-expanded="false" aria-controls="regras-<?php echo "$i"; ?>">
                                
                        <!-- CONTEÚDO -->
                        <div class="row w-100">
                            <!-- FOTO DO SERVIDOR -->
                            <div class="col-3 d-flex justify-content-center align-items-center" id="div-img-contato">
                                <?php buscaFoto($info[$i]['id_usuario'], $db); ?>
                            </div>

                            <!-- INFORMAÇÕES DE CONTATO DO SERVIDOR -->
                            <div class="col-9 d-flex align-items-center">
                                <div class="card-body">
                                    <?php
                                    if ($info[$i]['dsc_setor'] != null) {
                                        ?>
                                        <h5 class="card-title fw-bold text-break mb-1"><?php echo "{$info[$i]['dsc_setor']}"; ?></h5>
                                        <?php
                                    } else {
                                        ?>
                                        <h5 class="card-title fw-bold text-break mb-1"><?php echo "{$info[$i]['nom_usuario']}"; ?></h5>
                                        <?php
                                    }
                                    ?>

                                    <div class="row">

                                    <?php
                                    for ($j = 0; $j < count($contato); $j++) {
                                        if ($contato[$j]['dsc_tipo'] == 'Telefone') {
                                            echo "
                                            <div class=\"col-12 py-1\">
                                                <i class=\"fa-solid fa-phone\"></i>
                                                <span class=\"text-break\">{$contato[$j]['dsc_contato']}</span>
                                            </div>";

                                        } else if ($contato[$j]['dsc_tipo'] == 'E-mail') {
                                            echo "
                                            <div class=\"col-12 py-1\">
                                                <i class=\"fa-solid fa-envelope\"></i>
                                                <span class=\"text-break\">{$contato[$j]['dsc_contato']}</span>
                                            </div>";
                                        }
                                    }
                                    ?>
            
                                    </div>
                                </div>
                            </div>
                        </div>

                        </button>
                    </h2>

                    <div id="regras-<?php echo "$i"; ?>" class="accordion-collapse collapse" aria-labelledby="titulo-<?php echo "$i"; ?>" data-bs-parent="#contato-<?php echo "$i"; ?>">
                        <div class="accordion-body">
                            <?php
                            if ($info[$i]['dsc_setor'] != null) {
                                ?>
                                <h5>Horário de funcionamento:</h5>
                                <p>
                                    <?php echo "{$info[$i]['hora_inicio']} - {$info[$i]['hora_fim']}"; ?>
                                </p>
                                <?php
                            } else {
                                ?>
                                <h5>Regras de sala:</h5>
                                <p>
                                    <?php echo "{$info[$i]['regras']}"; ?>
                                </p>
                                <?php
                            }
                            ?>
                            
                            <h5>Sala:</h5>
                            <p>
                                <?php echo "{$info[$i]['num_sala']}"; ?>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

    // Fechando a conexão com o banco
    pg_close($db);
}
?>
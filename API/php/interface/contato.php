<?php
function imprimeContato($filtro = 0) {
    // Abrindo a conexão com o banco
    $db = db_connect();

    if ($filtro == 1) {
        // SELECT para pegar os dados necessários para todos os contatos
        $sql = "SELECT nom_usuario, img_perfil, hora_inicio, hora_fim, num_sala FROM usuario u JOIN servidor s ON (u.id_usuario = s.fk_usuario_id_usuario) JOIN sala sa ON (s.fk_sala_id_sala = sa.id_sala) JOIN servidor_horario sh ON (s.fk_usuario_id_usuario = sh.fk_servidor_fk_usuario_id_usuario) JOIN horario h ON (sh.fk_horario_id_horario = h.id_horario) JOIN professor p ON (s.fk_usuario_id_usuario = p.fk_servidor_fk_usuario_id_usuario)";

    } else if ($filtro == 2) {
        // SELECT para pegar os dados necessários para todos os contatos
        $sql = "SELECT nom_usuario, dsc_setor, img_perfil, hora_inicio, hora_fim, num_sala FROM usuario u JOIN servidor s ON (u.id_usuario = s.fk_usuario_id_usuario) JOIN sala sa ON (s.fk_sala_id_sala = sa.id_sala) JOIN servidor_horario sh ON (s.fk_usuario_id_usuario = sh.fk_servidor_fk_usuario_id_usuario) JOIN horario h ON (sh.fk_horario_id_horario = h.id_horario) JOIN administrativo a ON (s.fk_usuario_id_usuario = a.fk_servidor_fk_usuario_id_usuario) JOIN setor se ON (a.fk_setor_id_setor = se.id_setor)";

    } else {
        
    }
    
    // Pegando e transformando os dados de informação do(s) servidor(es)
    $query = pg_query($db, $sql);
    $info = pg_fetch_all($query);

    // Pegando e transformando os dados de contato do(s) serivdor(es)
    $query = pg_query($db, $sql);
    $contato = pg_fetch_all($query_contato);

    // Fechando a conexão com o banco
    pg_close($db);
              
    for ($i = 0; $i < count($info); $i++) {
        ?>
        <div class="d-flex flex-column align-items-center">
            <div class="accordion col-md-7 mb-2" id="contato-2">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="titulo-2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regras-2" aria-expanded="false" aria-controls="regras-2">
                            
                    <!-- CONTEÚDO -->
                    <div class="row">
                        <!-- FOTO DO SERVIDOR -->
                        <div class="col-4 d-flex justify-content-center align-items-center" id="div-img-contato">
                            <img class="img-contato" src="assets/images/<?php echo "{$info[$i]['img_perfil']}"; ?>" alt="foto do prof">
                        </div>

                        <!-- INFORMAÇÕES DE CONTATO DO SERVIDOR -->
                        <div class="col-8 d-flex align-items-center">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo "{$info[$i]['dsc_setor']}"; ?> </h5>
                            
                                <div class="row">";

                                <?php
                                for ($j = 0; $j < count($contato); $j++) {
                                    if ($contato[$j]['dsc_tipo'] == 'Telefone') {
                                        echo "
                                        <div class=\"col-12 py-1\">
                                            <i class=\"fa-solid fa-phone\"></i>
                                            <span>{$contato[$j]['dsc_contato']}</span>
                                        </div>";

                                    } else if ($contato[$j]['dsc_tipo'] == 'E-mail') {
                                        echo "
                                        <div class=\"col-12 py-1\">
                                            <i class=\"fa-solid fa-envelope\"></i>
                                            <span>{$contato[$j]['dsc_contato']}</span>
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

                    <div id="regras-2" class="accordion-collapse collapse" aria-labelledby="titulo-2" data-bs-parent="#contato-2">
                        <div class="accordion-body">
                            <h5>Horário de funcionamento:</h5>
                            <p>
                                <?php echo "{$info[$i]['hora_inicio']} - {$info[$i]['hora_fim']}"; ?>
                            </p>
    
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
}
?>
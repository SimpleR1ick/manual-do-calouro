<?php
// Verifica se o método GET enviou algo
if (isset($_GET['curso']) && isset($_GET['modulo'])) {
    // Armazena curso e módulo em variáveis
    $curso = $_GET['curso'];
    $modulo = $_GET['modulo'];

    // Seleciona da tabela horario_aula, todos os horarios
    $sql = "SELECT * FROM horario_aula";
    $query = pg_query(CONNECT, $sql);

    // Transforma todas as linhas da query em um array
    $horario = pg_fetch_all($query);

    // Seleciona todas as aulas, mesmo aquelas que não existem, e as coloca em um array
    $sql = "SELECT * FROM (
                (SELECT fk_dia_semana_id_dia_semana AS id_dia_semana, fk_horario_aula_id_horario_aula AS id_horario_aula,
                fk_turma_id_turma AS id_turma,
                ha.hora_aula_inicio,
                ha.hora_aula_fim,
                s.num_sala_aula,
                d.dsc_disciplina,
                u.nom_usuario
                FROM aula au
                JOIN sala_aula s ON (au.fk_sala_aula_id_sala_aula = s.id_sala_aula)
                JOIN professor_disciplina pd ON (au.fk_professor_disciplina_id_professor_disciplina = pd.id_professor_disciplina)
                LEFT JOIN disciplina d ON (d.id_disciplina = pd.fk_disciplina_id_disciplina)
                LEFT JOIN professor p ON (pd.fk_professor_fk_servidor_fk_usuario_id_usuario = p.fk_servidor_fk_usuario_id_usuario)
                LEFT JOIN servidor se ON (p.fk_servidor_fk_usuario_id_usuario = se.fk_usuario_id_usuario)
                LEFT JOIN usuario u ON (se.fk_usuario_id_usuario = u.id_usuario)
                JOIN turma t ON (au.fk_turma_id_turma = t.id_turma)
                LEFT JOIN horario_aula ha ON (ha.id_horario_aula = au.fk_horario_aula_id_horario_aula)
                WHERE au.fk_dia_semana_id_dia_semana IN (2, 3, 4, 5, 6, 7)
                AND t.fk_curso_id_curso = 1
                AND t.num_modulo = 6)

            UNION

                (SELECT
                id_dia_semana,
                table3.id_horario_aula,
                table3.id_turma,
                hora_aula_inicio,
                hora_aula_fim,
                num_sala_aula,
                dsc_disciplina,
                nom_usuario
                FROM (SELECT * , '-' AS num_sala_aula, '-' AS dsc_disciplina, '-' AS nom_usuario FROM (SELECT * FROM
                (SELECT id_dia_semana, id_horario_aula, id_turma FROM dia_semana, horario_aula, turma
                WHERE turma.fk_curso_id_curso = 1
                AND turma.num_modulo = 6
                except
                SELECT fk_dia_semana_id_dia_semana AS id_dia_semana, fk_horario_aula_id_horario_aula AS id_horario_aula, fk_turma_id_turma FROM aula ORDER BY id_dia_semana)
                AS table1
                WHERE table1.id_dia_semana IN (2, 3, 4, 5, 6, 7)) AS table2) AS table3
                INNER JOIN horario_aula ha ON (ha.id_horario_aula = table3.id_horario_aula)
                JOIN turma t ON (t.id_turma = table3.id_turma)))
                AS COMPLETE_TABLE
                ORDER BY id_horario_aula, id_dia_semana";
    
    $query = pg_query(CONNECT, $sql);

    // Transforma todas as linhas da query em um array
    $aulas = pg_fetch_all($query);

    // Fecha a conexão
    pg_close(CONNECT);

    // Iniciando um contador para acessar o índice
    $a = 0;

    // Loop para exibir os horarios da semana
    for ($i = 0; $i < count($horario); $i++) {
        // Inicio da tabela horario
        echo '<tr>';
        echo "<td class=\"align-middle\">{$horario[$i]['hora_aula_inicio']}<br>{$horario[$i]['hora_aula_fim']}</td>";

        // Loop para cada aula
        for ($l = 0; $l < 6; $l++) { ?>
            <td>
                <span class="d-flex flex-column">
                    <small><?php echo $aulas[$a]['num_sala_aula']; ?></small>
                    <strong class="text-break"><?php echo $aulas[$a]['dsc_disciplina']; ?></strong>
                    <small><?php echo $aulas[$a]['nom_usuario']; ?></small>
                </span>
            </td>
            <?php
            $a++;
        }
        // Fim da tabela horario
        echo '</tr>'; 
    }
} else {
    // Loop para exibir os horarios da semana
    for ($i = 0; $i < 6; $i++) {
        // Inicio da tabela horario
        echo '<tr>';
        echo "<td class=\"align-middle\">-<br>-</td>";

        // Loop para cada aula
        for ($l = 0; $l < 6; $l++) {
            ?>
            <td id="td">
                <span class="d-flex flex-column">
                    <small>-</small>
                    <strong class="text-break">-</strong>
                    <small>-</small>
                </span>
            </td>
            <?php
        }
    }
}
?>
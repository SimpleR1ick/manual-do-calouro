<?php
// Seleciona todas as aulas, mesmo aquelas que não existem, e as coloca em um array
$sql = "SELECT * FROM (
            (SELECT fk_dia_semana_id_dia_semana AS id_dia_semana, fk_horario_aula_id_horario_aula AS    id_horario_aula,
            ha.hora_aula_inicio, 
            ha.hora_aula_fim,  
            s.num_sala_aula, 
            d.dsc_disciplina
            FROM aula au
            JOIN sala_aula s ON (au.fk_sala_aula_id_sala_aula = s.id_sala_aula)
            JOIN disciplina d ON (au.fk_disciplina_id_disciplina = d.id_disciplina)
            LEFT JOIN horario_aula ha ON (ha.id_horario_aula = au.fk_horario_aula_id_horario_aula)
            WHERE au.fk_horario_aula_id_horario_aula IN (1, 2, 3, 4, 5, 6, 7) 
            AND au.fk_dia_semana_id_dia_semana IN (2, 3, 4, 5, 6, 7))
 
        UNION

            (SELECT
            id_dia_semana,
            table3.id_horario_aula,
            hora_aula_inicio,
            hora_aula_fim,
            num_sala_aula,
            dsc_disciplina
            FROM (SELECT * , '-' AS num_sala_aula, '-' AS dsc_disciplina FROM (SELECT * FROM
            (SELECT id_dia_semana, id_horario_aula FROM dia_semana, horario_aula
            except
            SELECT fk_dia_semana_id_dia_semana AS id_dia_semana, fk_horario_aula_id_horario_aula AS id_horario_aula FROM aula ORDER BY id_dia_semana)
            AS table1
            WHERE table1.id_dia_semana IN (5, 6, 7)) AS table2 )AS table3
            INNER JOIN horario_aula ha ON
            (ha.id_horario_aula = table3.id_horario_aula)))
            AS COMPLETE_TABLE
            ORDER BY id_horario_aula, id_dia_semana";

//
$query = pg_query(CONNECT, $sql);
$aulas = pg_fetch_all($query);

// Seleciona da tabela horario_aula, todos os horarios
$sql = "SELECT * FROM horario_aula";
$query = pg_query(CONNECT, $sql);

// Transforma todas as linhas da query em um array
$horario = pg_fetch_all($query);

// Iniciando um contador para acessar o índice
$u = 0;

// Loop para os 5 dias da semana
for ($i = 0; $i < 6; $i++) {

    echo '<tr>'; // Inicio da tabela horario
    echo "<td class=\"align-middle\">{$horario[$i]['hora_aula_inicio']}<br>{$horario[$i]['hora_aula_fim']}</td>";

    // Loop para cada horario
    for ($l = 0; $l < 6; $l++) {
    ?>
        <td>
            <span class="d-flex flex-column">
                <small><?php echo $aulas[$u]['num_sala_aula'] ?></small>
                <strong class="text-break"><?php echo $aulas[$u]['dsc_disciplina'] ?></strong>
                <small>Professor</small>
            </span>
        </td>
        <?php
        $u++;
    }
    echo '</tr>'; // Fim da tabela horario
}
?>
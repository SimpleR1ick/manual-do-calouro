<?php
$sql = "
select * from (
(SELECT 
fk_dia_semana_id_dia_semana as id_dia_semana, 
fk_horario_aula_id_horario_aula as id_horario_aula,
ha.hora_aula_inicio, 
ha.hora_aula_fim,  
s.num_sala_aula, 
d.dsc_disciplina
FROM aula au
JOIN sala_aula s ON (au.fk_sala_aula_id_sala_aula = s.id_sala_aula)
JOIN disciplina d ON (au.fk_disciplina_id_disciplina = d.id_disciplina)
LEFT JOIN horario_aula ha ON (ha.id_horario_aula = au.fk_horario_aula_id_horario_aula)
WHERE au.fk_horario_aula_id_horario_aula in (1, 2, 3, 4, 5, 6, 7) 
AND au.fk_dia_semana_id_dia_semana in (2, 3, 4, 5, 6, 7))
 
UNION

(select 
id_dia_semana,
table3.id_horario_aula,
hora_aula_inicio,
hora_aula_fim,
num_sala_aula,
dsc_disciplina
from (select * ,null as num_sala_aula,null as dsc_disciplina from (select * from
(select id_dia_semana, id_horario_aula from dia_semana, horario_aula
except
select fk_dia_semana_id_dia_semana as id_dia_semana, fk_horario_aula_id_horario_aula as id_horario_aula FROM aula order by id_dia_semana)
as table1
where table1.id_dia_semana in (5, 6, 7)) as table2 )as table3
inner JOIN horario_aula ha ON 
(ha.id_horario_aula = table3.id_horario_aula))
) AS COMPLETE_TABLE
ORDER BY id_horario_aula, id_dia_semana"

$query = pg_query(CONNECT, $sql);

$aulas = pg_fetch_all($query);

// Loop para os 5 dias da semana
for ($i = 1; $i < 7; $i++) {
    // Seleciona da tabela horario_aula, todos os horarios
    $sql = "SELECT * FROM horario_aula WHERE id_horario_aula = $i";
    $query = pg_query(CONNECT, $sql);

    // Transforma todas as linhas da query em um array
    $horario = pg_fetch_all($query);

    echo '<tr>'; // Inicio da tabela horario
    echo "<td class=\"align-middle\">{$horario[0]['hora_aula_inicio']}<br>{$horario[0]['hora_aula_fim']}</td>";
    
    // Loop para cada horario
    for ($l = 2; $l < 7; $l++) {
        // Se não existir uma aula nesse horario
        ?>
        <td>
            <span class="d-flex flex-column">
                <small><?php echo $aulas[$l]['num_sala_aula'] ?></small>
                <strong><?php echo $aulas[$l]['dsc_disciplina'] ?></strong>
                <small>Professor</small>
            </span>
        </td>
        <?php
    }
    echo '</tr>'; // Fim da tabela horario
}
?>

<?php
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
        $sql2 = "SELECT s.num_sala_aula, d.dsc_disciplina
                 FROM aula au
                 JOIN sala_aula s ON (au.fk_sala_aula_id_sala_aula = s.id_sala_aula)
                 JOIN disciplina d ON (au.fk_disciplina_id_disciplina = d.id_disciplina)
                 WHERE au.fk_horario_aula_id_horario_aula = $i 
                 AND au.fk_dia_semana_id_dia_semana = $l;";
        
        $query2 = pg_query(CONNECT, $sql2);

        $aulas = pg_fetch_all($query2);

        // Se não existir uma aula nesse horario
        if (!empty($aulas)) {
        ?>
            <td>
                <span class="d-flex flex-column">
                    <small><?php echo $aulas[0]['num_sala_aula'] ?></small>
                    <strong><?php echo $aulas[0]['dsc_disciplina'] ?></strong>
                    <small>Professor</small>
                </span>
            </td>
        <?php
        } else {
        ?>
            <td>
                <span class="d-flex flex-column">
                    </br>
                    <strong> - </strong>
                </span>
            </td>
        <?php
        }
    }
    echo '</tr>'; // Fim da tabela horario
}
?>

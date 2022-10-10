<?php
/**
 * Função para imprimir o texto a coluna relacionado ao tipo de usuario
 */
function textoTipoUsuario(): void {
    global $userData;

    if ($userData['fk_acesso_id_acesso'] == 3) {
        echo "<label class='form-label fw-bold h5'>Editar turma</label>";
    }
    else if ($userData['fk_acesso_id_acesso'] == 4) {
        echo "<label class='form-label fw-bold h5'>Editar regras</label>";
    }  
    /* 
    else if ($userData['fk_acesso_id_acesso'] == 5) {
        echo "<label class='form-label fw-bold h5'>Editar setor</label>";
    }   */
}

/**
 * Função para imprimir o tipo de campo relacionado ao tipo de usuario
 */
function campoTipoUsuario(): void {
    global $userData;


    if ($userData['fk_acesso_id_acesso'] == 2) { ?>
        <!-- MATRÍCULA -->
        <div class="mb-3">
            <label for="matricula" class="form-label fw-bold">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Ex: 20201tiimi9999" pattern="([0-9]{5}([A-Z]|[a-z]){5}[0-9]{4})+" value="">
        </div>

    <?php
    }


    else if ($userData['fk_acesso_id_acesso'] == 3) { ?>
        <!-- CURSO -->
        <div class="mb-3">
            <label for="curso" class="form-label fw-bold">Curso</label>

            <select id="curso" name="curso" class="form-select">
                <option selected value="">Selecione seu curso...</option>
                <option value="1">Informática para Internet</option>
                <option value="2">Mecatrônica</option>
                <option value="3">Internet das Coisas</option>
            </select>
        </div>

        <!-- MÓDULO -->
        <div class="mb-3">
            <label for="modulo" class="form-label fw-bold">Módulo</label>

            <select id="modulo" name="modulo" class="form-select">
                <option selected value="">Selecione seu módulo...</option>
                <option value="1">1° módulo</option>
                <option value="2">2° módulo</option>
                <option value="3">3° módulo</option>
                <option value="4">4° módulo</option>
                <option value="5">5° módulo</option>
                <option value="6">6° módulo</option>
            </select>
        </div>   

    <?php 
    } else if ($userData['fk_acesso_id_acesso'] == 4) { ?>
        <!-- REGRAS DE SALA -->
        <div class="mb-3">
            <textarea class="w-100" id="regras" name="regras" rows="6"></textarea>
        </div>
        
    <?php 
    } else if ($userData['fk_acesso_id_acesso'] == 5) {
        // Abrindo a conexão com o banco
        $db = db_connect();

        $sql = "SELECT * FROM setor";
        $query = pg_query($db, $sql);

        pg_close($db);

        $result = pg_fetch_array($query);

        ?>
        <!-- SETOR -->
        <div class="mb-3">
            <label for="setor" class="form-label fw-bold">Editar Setor</label>
            <select class="form-select" name="setor" id="setor">
                <option value="" selected>** Selecione uma opção **</option>
                <option value="cae">CAE</option>
            </select>
        </div>
        <?php 
    }
}
?>
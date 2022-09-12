<?php
/**
 * 
 * 
 * 
 * 
 */
function textoTipoUsuario($userData): void {
    if ($userData['acesso'] == 1) {
        $textoCampo = 'Editar turma';
    }
    else if ($userData['acesso'] == 2) {
        $textoCampo = 'Editar regras';
    }   
    echo"
    <!-- TEXTO CAMPO -->
    <div class='col-6 text-center'>
        <label class='form-label fw-bold h5'>$textoCampo</label>
    </div>";
}

/**
 * 
 * 
 * 
 *
 */
function campoTipoUsuario($userData): void {
    if ($userData['acesso'] == 1) {
        ?>
        <!-- CURSO -->
        <div class="mb-3">
            <label for="curso" class="form-label fw-bold">Curso</label>

            <select id="curso" name="modulo" class="form-select">
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
    } else if ($userData['acesso'] == 2) { 
        echo'
        <!-- REGRAS DE SALA -->
        <div class="mb-3">
            <textarea class="w-100" id="regras" name="regras" required rows="6"></textarea>
        </div>';
    }
}
?>
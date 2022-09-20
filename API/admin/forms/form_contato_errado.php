<form method="post" action="">

    <!-- CONTATO -->
    <h2>CONTATO</h2>
    <!-- ID -->
    <div class="mb-3">

        <label for="cont_id" class="form-label">ID</label>

        <input type="number" class="form-control" id="cont_id">

    </div>

    <!-- USUÁRIO SERVIDOR -->
    <div class="mb-3">

        <label for="cont_serv">HORÁRIO</label>
        
        <!-- AQUI PRECISA DE PHP PARA FAZER UM SELECT E COLOCAR AS OPÇÕES SEM PRECISAR CADASTRAR NA MÃO -->
        <select required class="form-select" id="cont_serv">
            <option selected>** SELECIONE UMA OPÇÃO **</option>
            <option value="[ID HORA]">[HORAS]</option>
        </select>

    </div>

    <!-- TURMA -->
    <div class="mb-3">

        <label for="aula_turma">TURMA</label>
        
        <select required class="form-select" id="aula_turma">
            <option selected>** SELECIONE UMA OPÇÃO **</option>
            <option value="1">Info 1</option>
            <option value="2">Info 2</option>
            <option value="3">Info 3</option>
            <option value="4">Info 4</option>
            <option value="5">Info 5</option>
            <option value="6">Info 6</option>
            <option value="7">Mec 1</option>
            <option value="8">Mec 2</option>
            <option value="9">Mec 3</option>
            <option value="10">Mec 4</option>
            <option value="11">Mec 5</option>
            <option value="12">Mec 6</option>
            <option value="13">IoT 1</option>
            <option value="14">IoT 2</option>
            <option value="15">IoT 3</option>
            <option value="16">IoT 4</option>
            <option value="17">IoT 5</option>
            <option value="18">IoT 6</option>
        </select>

    </div>

    <!-- SALA DE AULA -->
    <div class="mb-3">

        <label for="aula_sala">SALA DE AULA</label>
        
        <!-- AQUI PRECISA DE PHP PARA FAZER UM SELECT E COLOCAR AS OPÇÕES SEM PRECISAR CADASTRAR NA MÃO -->
        <select required class="form-select" id="aula_sala">
            <option selected>** SELECIONE UMA OPÇÃO **</option>
            <option value="[ID SALA]">[DSC SALA]</option>
        </select>

    </div>

    <!-- DISCIPLINA -->
    <div class="mb-3">

        <label for="aula_dis">DISCIPLINA</label>
        
        <!-- AQUI PRECISA DE PHP PARA FAZER UM SELECT E COLOCAR AS OPÇÕES SEM PRECISAR CADASTRAR NA MÃO -->
        <select required class="form-select" id="aula_dis">
            <option selected>** SELECIONE UMA OPÇÃO **</option>
            <option value="[ID DISCIPLINA]">[DSC DISCIPLINA]</option>
        </select>

    </div>


    <button type="submit" class="btn btn-primary">Salvar alterações</button>
</form>
<form method="post" action="">

    <!-- HORÁRIO AULA -->
    <h2>HORÁRIO AULA</h2>
    <!-- ID -->
    <div class="mb-3">

        <label for="hora_aula_id" class="form-label">ID</label>

        <input type="number" class="form-control" id="hora_aula_id">

    </div>

    <!-- HORA AULA INÍCIO -->
    <div class="mb-3">

        <label for="hora_aula_ini" class="form-label">HORA AULA INÍCIO</label>

        <input required type="time" class="form-control" id="hora_aula_ini">

    </div>

    <!-- HORA AULA FIM -->
    <div class="mb-3">

        <label for="hora_aula_fim" class="form-label">HORA AULA FIM</label>

        <input required type="time" class="form-control" id="hora_aula_fim">

    </div>

    <button type="submit" class="btn btn-primary">Salvar alterações</button>
</form>
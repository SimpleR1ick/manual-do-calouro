<form method="post" action="">

    <!-- HORÁRIO -->
    <h2>HORÁRIO</h2>
    <!-- ID -->
    <div class="mb-3">

        <label for="hora_id" class="form-label">ID</label>

        <input type="number" class="form-control" id="hora_id">

    </div>

    <!-- HORA INÍCIO -->
    <div class="mb-3">

        <label for="hora_ini" class="form-label">HORA INÍCIO</label>

        <input required type="time" class="form-control" id="hora_ini">

    </div>

    <!-- HORA FIM -->
    <div class="mb-3">

        <label for="hora_fim" class="form-label">HORA FIM</label>

        <input required type="time" class="form-control" id="hora_fim">

    </div>

    <button type="submit" class="btn btn-primary">Salvar alterações</button>
</form>
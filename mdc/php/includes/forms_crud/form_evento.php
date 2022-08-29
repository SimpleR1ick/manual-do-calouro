<form method="post" action="">

    <!-- EVENTO -->
    <h2>EVENTO</h2>
    <!-- ID -->
    <div class="mb-3">

        <label for="event_id" class="form-label">ID</label>

        <input type="number" class="form-control" id="event_id">

    </div>

    <!-- DATA -->
    <div class="mb-3">

        <label for="event_data" class="form-label">DATA</label>

        <input required type="date" class="form-control" id="event_data">

    </div>

    <!-- NOME -->
    <div class="mb-3">

        <label for="event_nome" class="form-label">NOME</label>

        <input required type="text" maxlength="50" class="form-control" id="event_nome">

    </div>

    <!-- DESCRIÇÃO -->
    <div class="mb-3">

        <div class="form-floating">
            <textarea required class="form-control" id="event_dsc"></textarea>

            <label for="event_dsc">DESCRIÇÃO</label>
        </div>

    </div>

    <button type="submit" class="btn btn-primary">Salvar alterações</button>
</form>
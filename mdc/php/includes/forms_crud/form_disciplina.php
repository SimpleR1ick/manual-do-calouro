<form method="post" action="">

    <!-- DISCIPLINA -->
    <h2>DISCIPLINA</h2>
    <!-- ID -->
    <div class="mb-3">

        <label for="dis_id" class="form-label">ID</label>

        <input type="number" class="form-control" id="dis_id">

    </div>

    <!-- ABREVIAÇÃO/NOME DA DISCIPLINA -->
    <div class="mb-3">

        <label for="dis_dsc" class="form-label">ABREV. DA DISCIPLINA</label>

        <input required type="text" maxlength="30" class="form-control" id="dis_dsc">

    </div>

    <button type="submit" class="btn btn-primary">Salvar alterações</button>
</form>
<form method="post" action="">

    <!-- USUÁRIO ALUNO -->
    <h2>USUÁRIO ALUNO</h2>
    <!-- ID -->
    <div class="mb-3">

        <label for="user_alun_id" class="form-label">ID</label>

        <input type="number" class="form-control" id="user_alun_id">

    </div>

    <!-- NOME -->
    <div class="mb-3">

        <label for="user_alun_nome" class="form-label">NOME</label>

        <input required type="text" class="form-control" id="user_alun_nome">

    </div>

    <!-- EMAIL -->
    <div class="mb-3">

        <label for="user_alun_email" class="form-label">EMAIL</label>

        <input required type="email" class="form-control" id="user_alun_email">

    </div>

    <!-- SENHA -->
    <div class="mb-3">

        <label for="user_alun_senha" class="form-label">SENHA</label>

        <input required id="user_alun_senha" type="text" class="form-control" minlength="6" aria-describedby="senhaHelp">

        <div id="senhaHelp" class="form-text">Mínimo 6 caracteres.</div>

    </div>

    <!-- IMAGEM DE PERFIL -->
    <div class="mb-3">

        <label for="user_alun_img" class="form-label">IMAGEM DE PERFIL</label>

        <input type="file" class="form-control" id="user_alun_img">

    </div>

    <!-- ATIVO -->
    <div class="mb-3">

        <div class="form-check">
            <input required class="form-check-input" type="radio" name="ativo-inativo" id="user_alun_ativoTrue" value="true" checked>

            <label class="form-check-label" for="user_alun_ativoTrue">
                ATIVO
            </label>
        </div>


        <div class="form-check">
            <input class="form-check-input" type="radio" name="ativo-inativo" id="user_alun_ativoFalse" value="false">

            <label class="form-check-label" for="user_alun_ativoFalse">
                INATIVO
            </label>
        </div>

    </div>

    <!-- ACESSO -->
    <div class="mb-3">

        <label for="user_alun_acesso" class="form-label">ACESSO</label>

        <input required type="number" value="1" min="0" max="3" class="form-control" id="user_alun_acesso">

    </div>

    <!-- NÚMERO DE MATRÍCULA -->
    <div class="mb-3">

        <label for="user_alun_mat" class="form-label">MATRÍCULA</label>

        <input required type="text" maxlength="20" class="form-control" id="user_alun_mat" placeholder="20201TIIMI0000" pattern="([0-9]{5})([a-z]{5,}|[A-Z]{5,})([0-9]{4})">

    </div>

    <!-- TURMA -->
    <div class="mb-3">

        <label for="user_alun_turma">TURMA</label>
        
        <select required class="form-select" id="user_alun_turma">
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

    <button type="submit" class="btn btn-primary">Salvar alterações</button>
</form>
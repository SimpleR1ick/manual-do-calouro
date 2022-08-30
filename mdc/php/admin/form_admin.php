<form method="post" action="">

    <!-- USUÁRIO ADMINISTRATIVO -->
    <h2>USUÁRIO ADMINISTRATIVO</h2>
    <!-- ID -->
    <div class="mb-3">

        <label for="user_adm_id" class="form-label">ID</label>

        <input type="number" class="form-control" id="user_adm_id">

    </div>

    <!-- NOME -->
    <div class="mb-3">

        <label for="user_adm_nome" class="form-label">NOME</label>

        <input required type="text" class="form-control" id="user_adm_nome">

    </div>

    <!-- EMAIL -->
    <div class="mb-3">

        <label for="user_adm_email" class="form-label">EMAIL</label>

        <input required type="email" class="form-control" id="user_adm_email">

    </div>

    <!-- SENHA -->
    <div class="mb-3">

        <label for="user_adm_senha" class="form-label">SENHA</label>

        <input required id="user_adm_senha" type="number" class="form-control" minlength="6" aria-describedby="senhaHelp">

        <div id="senhaHelp" class="form-text">Mínimo 6 caracteres.</div>

    </div>

    <!-- IMAGEM DE PERFIL -->
    <div class="mb-3">

        <label for="user_adm_img" class="form-label">IMAGEM DE PERFIL</label>

        <input type="file" class="form-control" id="user_adm_img">

    </div>

    <!-- ATIVO -->
    <div class="mb-3">

        <div class="form-check">
            <input required class="form-check-input" type="radio" name="ativo-inativo" id="user_adm_ativoTrue" value="true" checked>

            <label class="form-check-label" for="user_adm_ativoTrue">
                ATIVO
            </label>
        </div>


        <div class="form-check">
            <input class="form-check-input" type="radio" name="ativo-inativo" id="user_adm_ativoFalse" value="false">

            <label class="form-check-label" for="user_adm_ativoFalse">
                INATIVO
            </label>
        </div>

    </div>

    <!-- SETOR -->
    <div class="mb-3">

        <label for="user_adm_setor"></label>

        <!-- AQUI PRECISA DE PHP PARA FAZER UM SELECT E COLOCAR AS OPÇÕES SEM PRECISAR CADASTRAR NA MÃO -->
        <select required class="form-select" id="user_adm_setor">
            <option selected>** SELECIONE UMA OPÇÃO **</option>
            <option value="1">Coordenadoria de Apoio ao Ensino</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>

    </div>

    <button type="submit" class="btn btn-primary">Salvar alterações</button>
</form>
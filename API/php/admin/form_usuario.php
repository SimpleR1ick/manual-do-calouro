<form method="post" action="">

    <!-- USUÁRIO -->
    <h2>USUÁRIO</h2>
    <!-- ID -->
    <div class="mb-3">

        <label for="user_id" class="form-label">ID</label>

        <input type="number" class="form-control" id="user_id">

    </div>

    <!-- NOME -->
    <div class="mb-3">

        <label for="user_nome" class="form-label">NOME</label>

        <input required type="text" class="form-control" id="user_nome">

    </div>

    <!-- EMAIL -->
    <div class="mb-3">

        <label for="user_email" class="form-label">EMAIL</label>

        <input required type="email" class="form-control" id="user_email">

    </div>

    <!-- SENHA -->
    <div class="mb-3">

        <label for="user_senha" class="form-label">SENHA</label>

        <input required id="user_senha" type="number" class="form-control" minlength="6" aria-describedby="senhaHelp">

        <div id="senhaHelp" class="form-text">Mínimo 6 caracteres.</div>

    </div>

    <!-- IMAGEM DE PERFIL -->
    <div class="mb-3">

        <label for="user_img" class="form-label">IMAGEM DE PERFIL</label>

        <input type="file" class="form-control" id="user_img">

    </div>

    <!-- ATIVO -->
    <div class="mb-3">

        <div class="form-check">
            <input required class="form-check-input" type="radio" name="ativo-inativo" id="user_ativoTrue" value="true" checked>

            <label class="form-check-label" for="user_ativoTrue">
                ATIVO
            </label>
        </div>


        <div class="form-check">
            <input class="form-check-input" type="radio" name="ativo-inativo" id="user_ativoFalse" value="false">

            <label class="form-check-label" for="user_ativoFalse">
                INATIVO
            </label>
        </div>

    </div>

    <!-- ACESSO -->
    <div class="mb-3">

        <label for="user_acesso" class="form-label">ACESSO</label>

        <input type="number" min="0" max="3" class="form-control" id="user_acesso">

    </div>

    <button type="submit" class="btn btn-primary">Salvar alterações</button>
</form>
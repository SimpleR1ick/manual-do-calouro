<!-- Header -->
<?php include_once 'php/includes/header.php'; 
verificaNivelAcesso(); ?>


<!-- Conteúdo da pagina -->
<section>
    <div class="container">
        <form action="php/functions/crud_forms.php" method="POST">
            <!-- NOME -->
            <div class="mb-3">
                <label for="user_nome" class="form-label"> Nome </label>
                <input required type="text" class="form-control" id="user_nome" name="nome" >
            </div>
    
            <!-- EMAIL -->
            <div class="mb-3">
                <label for="user_email" class="form-label"> Email </label>
                <input required type="email" class="form-control" id="user_email" name="email">
            </div>
    
            <!-- SENHA -->
            <div class="mb-3">
                <label for="user_senha" class="form-label"> Senha </label>
                <input required id="user_senha" name="senha" type="password" class="form-control" minlength="6" aria-describedby="senhaHelp">
            </div>
    
            <!-- ACESSO -->
            <div class="mb-3">
                <label for="user_acesso" class="form-label"> Acesso </label>
                <input type="number" min="0" max="3" class="form-control" id="user_acesso" name="acesso">
            </div>
    
            <button class="btn btn-primary
            me-3" name="btnCadastrar" type="submit"> Cadastrar </button>

            <a href="./crud_index.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>
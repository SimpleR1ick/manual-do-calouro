<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include_once 'includes/head.php';?>
</head>

<body>
    <!-- Header-->
    <?php include_once 'includes/header.php';?>
    
    <!-- Conteudo da pagina -->
    <section>
        <div class="mb-4">
            <div class="container">
                <div class="d-flex justify-content-center">

                    <div class="border rounded shadow-sm p-4 bg-light">

                        <h1 class="h1">Cadastro</h1>

                        <form action="includes/cadastrar.php" method="POST" autocomplete="on" enctype="multipart/form-data">
                            <!-- Nome -->
                            <div class="form-group">
                                <label class="font-weight-bold" for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label class="font-weight-bold" for="email">E-mail</label>
                                <input type="email" class="form-control" id="email" name="login" aria-describedby="ajudaEmail"
                                    placeholder="Seu email" required>
                            </div>

                            <!-- Senhas -->
                            <div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="senha">Senha</label>
                                    <input autocomplete="off" type="password" class="form-control" id="senha" name="senha"
                                        placeholder="Sua senha" required>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold" for="senha2">Confirme sua senha</label>
                                    <input autocomplete="off" type="password" class="form-control" id="senhaConfirma" name="senhaConfirma"
                                        placeholder="Confirme sua senha" required>
                                </div>
                                <?php
                                    if ($senha == "") {
                                        $mensagem = "<span class='aviso'><b>Aviso</b>: Senha não foi alterada!</span>";
                                    } else if ($senha == $senhaConfirma) {
                                        $mensagem = "<span class='sucesso'><b>Sucesso</b>: As senhas são iguais: ".$senha."</span>";
                                    } else {
                                        $mensagem = "<span class='erro'><b>Erro</b>: As senhas não conferem!</span>";
                                    }
                                    echo "<p id='mensagem'>".$mensagem."</p>";
                                ?>
                            </div>

                            <!-- Foto de perfil -->
                            <div class="form-group">
                                <label class="font-weight-bold" for="fotoPerfil">Escolha sua imagem de perfil:</label>
                                <input class="border border-black p-2 m-2 rounded" type="file" class="form-control-file"
                                    id="fotoPerfil" name="fotoPerfil">
                            </div>

                            

                            <!-- Receber novidades -->
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="novidades" name="novidades">
                                <label class="form-check-label" for="updates">Deseja receber novidades por e-mail? Nunca
                                    venderemos seu e-mail a terceiros.</label>
                            </div>

                            <button type="submit" name="btn-cadastrar" class="btn btn-primary">Cadastrar-se</button>

                        </form>

                        <!-- Redireciona para login -->
                        <nav class="mt-5" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Já possui uma conta?</li>
                                <li class="breadcrumb-item"><a href="login.php">Entrar</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <?php include_once 'includes/footer.php';?>
</body>
</html>
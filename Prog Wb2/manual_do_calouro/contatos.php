<!-- Header-->
<?php include_once 'includes/header.php';?>

<!-- Conteúdo da pagina -->
<section>
    <div class="mb-4">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="shadow-sm p-4">
                    <div class="h1">Fale conosco</div>
                    <form>
                        <div class="form-group">
                            <label class="font-weight-bold" for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Seu nome" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" aria-describedby="ajudaEmail" placeholder="Seu email" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="telefone">Telefone:</label>
                            <input type="tel" class="form-control" id="telefone" placeholder="Seu telefone" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="assunto">Assunto:</label>
                            <select name="assunto" id="assunto" required>
                                <option value="">Selecione um assunto</option>
                                <option value="calendario">Calendário</option>
                                <option value="horarios">Horários</option>
                                <option value="mapa">Mapa</option>
                                <option value="rod">ROD</option>
                                <option value="critica">Crítica/Reclamação</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="texto">Escreva sua mensagem:</label><br>
                            <textarea class="w-100" id="texto" name="texto" required rows="6"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'includes/footer.php';?>

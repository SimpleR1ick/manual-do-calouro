<!-- Header-->
<?php include_once '../php/layout/header.php'; ?>

<!-- Conteúdo da página -->
<?php include_once '../php/interface/horario.php'; ?>

<section>
    <div class="container">
        <form class="d-flex flex-column align-items-center" action="horarios.php" method="GET">
            <h5>Curso:</h5>
            <!-- GRUPO DE BOTÕES CURSO -->
            <div class="btn-group mb-3" role="group">
                <!-- INFORMÁTICA -->
                <input type="radio" class="btn-check" id="info" name="curso" value="1" autocomplete="off">
                <label class="btn btn-success" for="info">INFO</label>

                <!-- MECATRÔNICA -->
                <input type="radio" class="btn-check" id="mec" name="curso" value="2" autocomplete="off">
                <label class="btn btn-success" for="mec">MEC</label>

                <!-- INTERNET DAS COISAS -->
                <input type="radio" class="btn-check" id="iot" name="curso" value="3" autocomplete="off">
                <label class="btn btn-success" for="iot">IOT</label>
            </div>

            <h5>Módulo:</h5>
            <!-- GRUPO DE BOTÕES MÓDULO -->
            <div class="btn-group mb-3" role="group">
                <input type="radio" class="btn-check" id="mod1" name="modulo" value="1" autocomplete="off">
                <label class="btn btn-success" for="mod1">1°</label>

                <input type="radio" class="btn-check" id="mod2" name="modulo" value="2" autocomplete="off">
                <label class="btn btn-success" for="mod2">2°</label>

                <input type="radio" class="btn-check" id="mod3" name="modulo" value="3" autocomplete="off">
                <label class="btn btn-success" for="mod3">3°</label>

                <input type="radio" class="btn-check" id="mod4" name="modulo" value="4" autocomplete="off">
                <label class="btn btn-success" for="mod4">4°</label>

                <input type="radio" class="btn-check" id="mod5" name="modulo" value="5" autocomplete="off">
                <label class="btn btn-success" for="mod5">5°</label>

                <input type="radio" class="btn-check" id="mod6" name="modulo" value="6" autocomplete="off">
                <label class="btn btn-success" for="mod6">6°</label>
            </div>

            <!-- BOTÃO DE PESQUISA -->
            <button class="btn btn-info" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <div class="row justify-content-center mt-3 mb-5">
            <div class="col-sm-auto">
                <div class="table-responsive">
                    <table class="table table-responsive-sm table-bordered table-striped text-center">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th scope="col">SEG</th>
                                <th scope="col">TER</th>
                                <th scope="col">QUA</th>
                                <th scope="col">QUI</th>
                                <th scope="col">SEX</th>
                                <th scope="col">SAB</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php horarioTable(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once '../php/layout/footer.php'; ?>
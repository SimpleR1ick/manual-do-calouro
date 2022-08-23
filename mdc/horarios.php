<!-- Header-->
<?php include_once 'php/includes/header.php'; ?>

<!-- Conexão -->
<?php include_once 'php/includes/connect.php'; ?>

<!-- Conteudo da pagina -->
<section>
    <div class="container">

        <form class="d-flex flex-column align-items-center" action="" method="GET">
            <h5>Curso:</h5>
            <!-- GRUPO DE BOTÕES CURSO -->
            <div class="btn-group mb-3" role="group">
                <!-- INFORMÁTICA -->
                <input type="radio" class="btn-check" name="curso" id="info" autocomplete="off">
                <label class="btn btn-success" for="info">INFO</label>

                <!-- INTERNET DAS COISAS -->
                <input type="radio" class="btn-check" name="curso" id="iot" autocomplete="off">
                <label class="btn btn-success" for="iot">IOT</label>

                <!-- MECATRÔNICA -->
                <input type="radio" class="btn-check" name="curso" id="meca" autocomplete="off">
                <label class="btn btn-success" for="meca">MEC</label>

            </div>

            <h5>Módulo:</h5>
            <!-- GRUPO DE BOTÕES MÓDULO -->
            <div class="btn-group mb-3" role="group">
                <input type="radio" class="btn-check" name="modulo" id="mod1" autocomplete="off">
                <label class="btn btn-success" for="mod1">1°</label>

                <input type="radio" class="btn-check" name="modulo" id="mod2" autocomplete="off">
                <label class="btn btn-success" for="mod2">2°</label>

                <input type="radio" class="btn-check" name="modulo" id="mod3" autocomplete="off">
                <label class="btn btn-success" for="mod3">3°</label>

                <input type="radio" class="btn-check" name="modulo" id="mod4" autocomplete="off">
                <label class="btn btn-success" for="mod4">4°</label>

                <input type="radio" class="btn-check" name="modulo" id="mod5" autocomplete="off">
                <label class="btn btn-success" for="mod5">5°</label>

                <input type="radio" class="btn-check" name="modulo" id="mod6" autocomplete="off">
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
                                <th scope="col">SÁB</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            for ($i = 0; $i < 6; $i++) {
                            ?>
                                <tr>
                                    <td class="align-middle">7:30<br>8:20</td>
                                    <td>
                                        <span class="d-flex flex-column">
                                            <small>Sala N°</small>
                                            <strong>DISCIPLINA</strong>
                                            <small>Professor</small>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="d-flex flex-column">
                                            <small>Sala N°</small>
                                            <strong>DISCIPLINA</strong>
                                            <small>Professor</small>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="d-flex flex-column">
                                            <small>Sala N°</small>
                                            <strong>DISCIPLINA</strong>
                                            <small>Professor</small>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="d-flex flex-column">
                                            <small>Sala N°</small>
                                            <strong>DISCIPLINA</strong>
                                            <small>Professor</small>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="d-flex flex-column">
                                            <small>Sala N°</small>
                                            <strong>DISCIPLINA</strong>
                                            <small>Professor</small>
                                        </span>
                                    </td>
                                    <td></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>
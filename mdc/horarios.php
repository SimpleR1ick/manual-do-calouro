<!-- Header-->
<?php include_once 'php/includes/header.php'; ?>

<!-- Conexão -->
<?php include_once 'php/includes/connect.php'; ?>

<!-- Conteudo da pagina -->
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="infoLabel btn btn-success active">
                        <input type="radio" name="curso" class="horario" id="info" autocomplete="off" /> INFO
                    </label>

                    <label class="mecLabel btn btn-success">
                        <input type="radio" name="curso" class="horario" id="med" autocomplete="off" /> MEC
                    </label>

                    <label class="iotLabel btn btn-success ">
                        <input type="radio" name="curso" class="horario" id="iot" autocomplete="off" /> IOT
                    </label>
                </div>
            </div>
        </div>

        <div class="row m-3 justify-content-center">
            <div class="col-auto">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="label1 btn btn-success active">
                        <input type="radio" name="modulo" class="horario" id="mod1" autocomplete="off" /> 1
                    </label>

                    <label class="label2 btn btn-success">
                        <input type="radio" name="modulo" class="horario" id="mod2" autocomplete="off" /> 2
                    </label>

                    <label class="label3 btn btn-success">
                        <input type="radio" name="modulo" class="horario" id="mod3" autocomplete="off" /> 3
                    </label>

                    <label class="label4 btn btn-success">
                        <input type="radio" name="modulo" class="horario" id="mod4" autocomplete="off" /> 4
                    </label>

                    <label class="label5 btn btn-success">
                        <input type="radio" name="modulo" class="horario" id="mod5" autocomplete="off" /> 5
                    </label>

                    <label class="label6 btn btn-success">
                        <input type="radio" name="modulo" class="horario" id="mod6" autocomplete="off" /> 6
                    </label>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
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
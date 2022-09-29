<!-- Header-->
<?php require_once '../php/layout/header.php'; ?>

<?php include_once '../php/interface/contato.php' ?>

<section class="container">

    <ul class="nav nav-tabs rounded border-bottom-0" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Todos</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Servidores</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Professores</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active border py-4 px-2" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <!-- TODOS OS CONTATOS -->
                <!-- CARD CONTATO -->
                <?php imprimeContato() ?>

        </div> 
    </div>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade border py-4 px-2" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                <!-- SERVIDORES -->
                <!-- CARD CONTATO -->
                <div class="d-flex flex-column align-items-center">
                    <div class="accordion col-md-7 mb-2" id="contato-2">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="titulo-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regras-2" aria-expanded="false" aria-controls="regras-2">
                                    
                                    <!-- CONTEÚDO -->
                                    <div class="row">
                                        <!-- FOTO DO SERVIDOR -->
                                        <div class="col-4 d-flex justify-content-center align-items-center" id="div-img-contato">
                                            <img class="img-contato" src="../assets/images/user.png" alt="foto do prof">
                                        </div>

                                        <!-- INFORMAÇÕES DE CONTATO DO SERVIDOR -->
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">COOORDERNADSKA JAIDJAISJD EN ICASJISKAD</h5>
                                                
                                                <div class="row">
                                                    <div class="col-12 py-1">
                                                        <i class="fa-solid fa-phone"></i>
                                                            <span>(27) 98888-8888</span>
                                                    </div>

                                                    <div class="col-12 py-1">
                                                        <span>
                                                            <i class="fa-solid fa-envelope"></i>
                                                            <span>deptox@ifes.edu.br</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </button>
                            </h2>

                            <div id="regras-2" class="accordion-collapse collapse" aria-labelledby="titulo-2" data-bs-parent="#contato-2">
                                <div class="accordion-body">
                                    <h5>Horário de funcionamento:</h5>
                                    <p>
                                        00:00 - 00:15
                                    </p>

                                    <h5>Sala:</h5>
                                    <p>
                                        101
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        </div> 
    </div>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade border py-4 px-2" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

                <!-- PROFESSORES -->
                <!-- CARD CONTATO -->
                <div class="d-flex flex-column align-items-center">
                    <div class="accordion col-md-7 mb-2" id="contato-1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="titulo-1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regras-1" aria-expanded="false" aria-controls="regras-1">
                                    
                                    <!-- CONTEÚDO -->
                                    <div class="row">
                                        <!-- FOTO DO SERVIDOR -->
                                        <div class="col-4 d-flex justify-content-center align-items-center" id="div-img-contato">
                                            <img class="img-contato" src="assets/images/user.png" alt="foto do prof">
                                        </div>
    
                                        <!-- INFORMAÇÕES DE CONTATO DO SERVIDOR -->
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">Prof. Fulano</h5>
                                                
                                                <div class="row">
                                                    <div class="col-12 py-1">
                                                        <i class="fa-solid fa-phone"></i>
                                                        <span>(27) 99999-9999</span>
                                                    </div>
    
                                                    <div class="col-12 py-1">
                                                        <span>
                                                            <i class="fa-solid fa-envelope"></i>
                                                            <span>proffulano@ifes.edu.br</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </button>
                            </h2>
    
                            <div id="regras-1" class="accordion-collapse collapse" aria-labelledby="titulo-1" data-bs-parent="#contato-1">
                                <div class="accordion-body">
                                    <h5>Regras de sala:</h5>
                                    <p>
                                        REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div> 
    </div>

</section>

<!-- Footer -->
<?php include_once '../php/layout/footer.php'; ?>
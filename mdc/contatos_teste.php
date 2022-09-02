<!-- Header-->
<?php require_once 'php/includes/header.php'; ?>

<section class="container">
    <div class="d-flex flex-column align-items-center">
        
        <!--
        <div class="accordion col-8" id="accordionExample">
            <div class="accordion-item border border-danger">
                <h2 class="accordion-header border border-warning" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
    
                            <div class="row">
                                <div class="col-4">
                                    <img src="" class="img-fluid" alt="...">
                                </div>
                                <div class="col-8">
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
                                                    <span>profbello@ifes.edu.br</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <h5>Regras de sala:</h5>
                        <p>
                            REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS REGRAS 
                        </p>
                    </div>
                </div>
            </div>
        </div>
        -->
        <!-- EXEMPLO CARD CONTATO -->
        <div class="accordion col-md-6 mb-4" id="contato-1">
            <div class="accordion-item">
                <h2 class="accordion-header" id="titulo-1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regras-1" aria-expanded="false" aria-controls="regras-1">
                        
                        <!-- CONTEÚDO -->
                        <div class="row">
                            <!-- FOTO DO SERVIDOR -->
                            <div class="col-4" id="div-img-contato">
                                <img class="img-contato" src="img/user.png" alt="foto do prof">
                            </div>

                            <!-- INFORMAÇÕES DE CONTATO DO SERVIDOR -->
                            <div class="col-8">
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



        <div class="accordion col-md-6 mb-4" id="contato-2">
            <div class="accordion-item">
                <h2 class="accordion-header" id="titulo-2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#regras-2" aria-expanded="false" aria-controls="regras-2">
                        
                        <!-- CONTEÚDO -->
                        <div class="row">
                            <!-- FOTO DO SERVIDOR -->
                            <div class="col-4">
                                <img class="" src="" class="" alt="foto do prof">
                            </div>

                            <!-- INFORMAÇÕES DE CONTATO DO SERVIDOR -->
                            <div class="col-8">
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

                <div id="regras-2" class="accordion-collapse collapse" aria-labelledby="titulo-2" data-bs-parent="#contato-2">
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

</section>





<!-- Footer -->
<?php include_once 'php/includes/footer.php'; ?>
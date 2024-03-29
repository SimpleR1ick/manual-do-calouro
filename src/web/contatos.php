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
            <?php imprimeContato(); ?>

        </div> 
    </div>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade border py-4 px-2" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

            <!-- SERVIDORES -->
            <?php imprimeContato(1); ?>

        </div> 
    </div>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade border py-4 px-2" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

            <!-- PROFESSORES -->
            <?php imprimeContato(2); ?>

        </div> 
    </div>

</section>

<!-- Footer -->
<?php include_once '../php/layout/footer.php'; ?>
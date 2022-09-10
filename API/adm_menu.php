<?php include_once 'php/admin/adm_header.php'; ?>

<div class="d-flex justify-content-center mb-3">
    <!-- BOTÃO DE ABRIR O PAINEL -->
    <!--<a class="nav-link" data-bs-toggle="offcanvas" href="#adm_menu" role="button" aria-controls="adm_menu">
        Link with href
    </a>-->

    <button class="btn btn-lg btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#adm_menu" aria-controls="adm_menu">MENU ADM</button>

    <!-- PAINEL LATERAL -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="adm_menu" aria-labelledby="adm_menu_titulo">

        <!-- TÍTULO DO PAINEL -->
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="adm_menu_titulo">PAINEL DE CONTROLE</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <!-- CORPO DO PAINEL -->
        <div class="offcanvas-body d-flex flex-column">
            <a class="btn btn-lg btn-dark" href="crud_index.php" role="button">
                CRUD
            </a>
        </div>
    </div>
</div>

<?php include_once 'php/admin/adm_footer.php'; ?>

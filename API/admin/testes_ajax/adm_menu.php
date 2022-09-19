<?php require_once 'adm_header.php'; ?>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="adm_menu.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu CRUD</span>
                </a>


                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    
                    <form method="POST">
                        <li class="nav-item dropdown">
                            
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuário</a>

                            <ul class="dropdown-menu">
                                <li><input type="submit" name="admin" class="dropdown-item" value="Admin"></li>

                                <li><input type="submit" name="aluno" class="dropdown-item" value="Aluno"></li>

                                <li><input type="submit" name="servidor" class="dropdown-item" value="Servidor"></li>

                                <li><input type="submit" name="professor" class="dropdown-item" value="Professor"></li>
                            </ul>
                        </li>
                            
                        <li class="nav-item">
                            <input type="submit" class="nav-link" name="contato" value="Contato">
                        </li>

                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="" 
                            value="">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="" 
                            value="">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="" 
                            value="">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="" 
                            value="">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="" 
                            value="">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="" 
                            value="">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="" 
                            value="">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="" 
                            value="">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="" 
                            value="">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="" 
                            value="">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="" 
                            value="">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="" 
                            value="">
                        </li>
                        
                    </form>
                </ul>
            </div>
        </div>

        <div class="container p-3">
            <?php
                /* EVENT LISTENERS DOS BOTÕES */
                if(array_key_exists('admin', $_POST)) {
                    admin();
                }
                else if(array_key_exists('aluno', $_POST)) {
                    aluno();
                }
                else if(array_key_exists('contato', $_POST)) {
                    contato();
                }

            

                /* CHAMADAS DOS FORMS */

                // USUÁRIO
                function admin() {
                    include_once '../forms/form_admin.php';
                }

                function aluno() {
                    include_once '../forms/form_aluno.php';
                }
                

                // CONTATO
                function contato() {
                    include_once '../forms/form_contato.php';
                }
            ?>
        </div>

    </div>
</div>


<?php require_once 'adm_footer.php';?>
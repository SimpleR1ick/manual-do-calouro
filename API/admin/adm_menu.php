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
                            <input type="submit" class="nav-link"
                            name="aula" 
                            value="Aula">
                        </li>
                            
                        <li class="nav-item">
                            <input type="submit" class="nav-link" name="contato" value="Contato">
                        </li>

                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="disciplina" 
                            value="Disciplina">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="evento" 
                            value="Evento">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="horario-aula" 
                            value="Horário de Aula">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="horario" 
                            value="Horário">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="sala-aula" 
                            value="Sala de Aula">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="sala" 
                            value="Sala">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="setor" 
                            value="Setor">
                        </li>
                        
                        <li class="nav-item">
                            <input type="submit" class="nav-link"
                            name="tipo-contato" 
                            value="Tipo de Contato">
                        </li>
                        
                    </form>
                </ul>
            </div>
        </div>

        <div class="container p-3">
            <?php
                /* EVENT LISTENERS DOS BOTÕES */
                
                switch (reset($_POST)) {
                    case 'Admin':
                        include_once 'forms/form_admin.php';
                        break;

                    case 'Aluno':
                        include_once 'forms/form_aluno.php';
                        break;

                    case 'Servidor':
                        include_once 'forms/form_servidor.php';
                        break;

                    case 'Professor':
                        include_once 'forms/form_professor.php';
                        break;

                    case 'Aula':
                        include_once 'forms/form_aula.php';
                        break;

                    // case 'Contato':
                    //     include_once 'forms/form_contato.php';
                    //     break;

                    case 'Disciplina':
                        include_once 'forms/form_disciplina.php';
                        break;

                    case 'Evento':
                        include_once 'forms/form_evento.php';
                        break;

                    case 'Horário de Aula':
                        include_once 'forms/form_horario_aula.php';
                        break;

                    case 'Horário':
                        include_once 'forms/form_horario.php';
                        break;

                    case 'Sala de Aula':
                        include_once 'forms/form_sala_aula.php';
                        break;

                    case 'Sala':
                        include_once 'forms/form_sala.php';
                        break;

                    case 'Setor':
                        include_once 'forms/form_setor.php';
                        break;

                    case 'Tipo de Contato':
                        include_once 'forms/form_tipo_contato.php';
                        break;
                }

            ?>
        </div>

    </div>
</div>


<?php require_once 'adm_footer.php';?>
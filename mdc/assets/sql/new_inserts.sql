INSERT INTO usuario (nom_usuario, email, senha, acesso) VALUES
    ('admin', 'mdc@ifes.edu.br', '21232f297a57a5a743894a0e4a801fc3', 0); -- admin

INSERT INTO usuario (nom_usuario, email, senha) VALUES
    ('Henrique', 'henriquedalmagro@outlook.com', 'a1f925a7b5b70b7b3f7fe2208513e10f'), -- 123 
    ('Maria', 'mariaeduarda@gmail.com', 'd481dbf8fcb6838a7e5dea0ca8e16d8a'), -- fuckingpassword
    ('Rafael', 'rafaelbarros@hotmailcom', 'caf1a3dfb505ffed0d024130f58c5cfa'), -- 321
    ('Moisés', 'moisesomena@ifes.edu.br', '72c7d5bed34eb9dc055ef287eaf862ad'), -- ifes2022
    ('Raphael', 'rbranco@yahoo.com', 'e8d95a51f3af4a3b134bf6bb680a213a'); -- senha

INSERT INTO curso (dsc_curso) VALUES
    ('Info'),
    ('Mec');

INSERT INTO turma (num_modulo, fk_curso_id_curso) VALUES
    (1, 1),
    (2, 1),
    (3, 1),
    (4, 1),
    (5, 1),
    (6, 1);

INSERT INTO aluno (num_matricula, fk_usuario_id_usuario, fk_turma_id_turma) VALUES
    ('20201tiimi0365', 1, 6), -- Henrique
    ('20201tiimi0152', 2, 6), -- Duda
    ('20201tiimi0160', 3, 6); -- Rafael

INSERT INTO sala (num_sala) VALUES
    ('101'),
    ('707');

INSERT INTO servidor (fk_usuario_id_usuario, fk_sala_id_sala) VALUES 
    (5, 2), -- Moisés
    (6, 1); -- CAE

INSERT INTO professor (regras, fk_servidor_fk_usuario_id_usuario) VALUES
    ('Não xingar porra!', 5);

INSERT INTO setor (dsc_setor) VALUES
    ('Coordenadoria de Apoio ao Ensino');

INSERT INTO administrativo (fk_servidor_fk_usuario_id_usuario, fk_setor_id_setor) VALUES
    (6, 1);

INSERT INTO dia_semana (dsc_dia_semana) VALUES
    ('Domingo'),
    ('Segunda-feira'),
    ('Terça-feira'),
    ('Quarta-feira'),
    ('Quinta-feira'),
    ('Sexta-feira'),
    ('Sabado');

INSERT INTO horario_aula (hora_aula_inicio, hora_aula_fim) VALUES
    ('07:30:00', '08:20:00'),
    ('08:20:00', '09:10:00'),
    ('09:30:00', '10:20:00'),
    ('10:20:00', '11:10:00'),
    ('11:20:00', '12:10:00'),
    ('12:10:00', '13:00:00');

INSERT INTO disciplina (dsc_disciplina) VALUES 
	('BIO'),                -- 1
    ('DES SIST'),           -- 2
    ('DISP MOV'),           -- 3
    ('ELET BAS'),           -- 4 
    ('Empreendedorismo'),   -- 5
    ('FILOS'),              -- 6
    ('MAT'),                -- 7
    ('PORTUG'),             -- 8
    ('PROG WEB II'),        -- 9
    ('Projeto integrador'), -- 10
    ('QUI'),                -- 11
    ('SOCIOL');             -- 12

INSERT INTO sala_aula (num_sala_aula) VALUES 
    ('SAL 105'),
    ('LAB 208t'),
    ('LAB 903t'),
    ('LAB 901t');

INSERT INTO evento (dat_evento, nom_evento, dsc_evento) VALUES 
    ('2022-05-08 11:10:00', 'Prova de Biologia', 'Reprodução Humana'),
    ('2022-04-10 08:20:00', 'OBMEP', 'Estudar'),
    ('2022-06-08 13:00:00', 'Prova de Matemática', 'Recuperação'),
    ('2022-11-27 07:30:00', 'Expedição IFES', ''),
    ('2022-10-11 10:20:00', 'Laboratório de Química', '');

INSERT INTO tipo_contato (dsc_tipo) VALUES
    ('Telefone'),
    ('E-mail');

INSERT INTO horario (hora_inicio, hora_fim) VALUES
    ('10:30:00', '11:30:00');

INSERT INTO aula (
    fk_dia_semana_id_dia_semana,
    fk_horario_aula_id_horario_aula,
    fk_turma_id_turma,
    fk_sala_aula_id_sala_aula,
    fk_disciplina_id_disciplina
    ) VALUES
        -- Segunda-feira
        (2, 1, 6, 1, 11),
        (2, 2, 6, 1, 11),
        (2, 3, 6, 2, 9),
        (2, 4, 6, 2, 9),
        (2, 5, 6, 2, 9),
        (2, 6, 6, 1, 7),

        -- Terça-feira
        (3, 1, 6, 1, 1),
        (3, 2, 6, 1, 1),
        (3, 3, 6, 1, 1),
        (3, 4, 6, 1, 5),
        (3, 5, 6, 1, 5),
        (3, 6, 6, 1, 12),

        -- Quarta-feira
        (4, 1, 6, 1, 8),
        (4, 2, 6, 1, 11),
        (4, 3, 6, 1, 7),
        (4, 4, 6, 1, 7),
        (4, 5, 6, 1, 4),
        (4, 6, 6, 1, 4),

        -- Quinta-feira
        (5, 2, 6, 1, 6),
        (5, 3, 6, 1, 8),
        (5, 4, 6, 1, 8),
        (5, 5, 6, 3, 2),
        (5, 6, 6, 3, 2),

        -- Sexta-feira
        (6, 2, 6, 3, 3),
        (6, 3, 6, 3, 3),
        (6, 4, 6, 4, 10),
        (6, 5, 6, 4, 10),
        (6, 6, 6, 4, 10);

INSERT INTO usuario_evento (fk_usuario_id_usuario, fk_evento_id_evento) VALUES
    (2, 1), -- Henrique
    (3, 2), -- Duda
    (3, 3); -- Rafael

INSERT INTO professor_disciplina (fk_professor_fk_servidor_fk_usuario_id_usuario, fk_disciplina_id_disciplina) VALUES
    (5, 10);

INSERT INTO contato (dsc_contato, fk_servidor_fk_usuario_id_usuario, fk_tipo_contato_id_tipo) VALUES
    ('(27) 999666-0410', 5, 1);

INSERT INTO servidor_horario (fk_servidor_fk_usuario_id_usuario, fk_horario_id_horario) VALUES
    (5, 1);
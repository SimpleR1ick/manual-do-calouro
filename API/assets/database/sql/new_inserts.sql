INSERT INTO usuario (nom_usuario, email, senha, acesso) VALUES
    ('admin', 'mdc@ifes.edu.br', '21232f297a57a5a743894a0e4a801fc3', 0); -- admin

INSERT INTO usuario (nom_usuario, email, senha) VALUES
    ('Henrique', 'henriquedalmagro@outlook.com', 'a1f925a7b5b70b7b3f7fe2208513e10f'),   -- 123, 2 
    ('Maria', 'mariaeduarda@gmail.com', 'd481dbf8fcb6838a7e5dea0ca8e16d8a'),            -- fuckingpassword, 3
    ('Rafael', 'rafaelbarros@hotmailcom', 'caf1a3dfb505ffed0d024130f58c5cfa'),          -- 321, 4
    ('Raphael', 'rbranco@yahoo.com', 'e8d95a51f3af4a3b134bf6bb680a213a'),               -- senha, 5
    ('Nauvia', 'nauvia@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a'),                 -- senha, 6
    ('Marta', 'marta@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a'),                   -- senha, 7
    ('Paulo Cezar', 'paulo.cesar@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a'),       -- senha, 8
    ('Alessandro', 'bermudes@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a'),           -- senha, 9
    ('Ronaldo', 'ronaldo@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a'),               -- senha, 10
    ('Diego', 'diego@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a'),                   -- senha, 11
    ('Ana Paula', 'ana.paula@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a'),           -- senha, 12
    ('Geraldo', 'geraldo@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a'),               -- senha, 13
    ('Maikon', 'maikon@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a'),                 -- senha, 14
    ('Carlos', 'carlos@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a'),                 -- senha, 15
    ('Daniel', 'daniel@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a'),                 -- senha, 16
    ('Moisés', 'moisesomena@ifes.edu.br', '72c7d5bed34eb9dc055ef287eaf862ad');          -- ifes2022, 17

INSERT INTO curso (dsc_curso) VALUES
    ('Info'),
    ('Mec'),
    ('Iot');

INSERT INTO turma (num_modulo, fk_curso_id_curso) VALUES
    (1, 1),
    (2, 1),
    (3, 1),
    (4, 1),
    (5, 1),
    (6, 1),
    (1, 2),
    (2, 2),
    (3, 2),
    (4, 2),
    (5, 2),
    (6, 2),
    (1, 3),
    (2, 3),
    (3, 3),
    (4, 3),
    (5, 3),
    (6, 3);

INSERT INTO aluno (num_matricula, fk_usuario_id_usuario, fk_turma_id_turma) VALUES
    ('20201tiimi0365', 2, 6), -- Henrique
    ('20201tiimi0152', 3, 6), -- Duda
    ('20201tiimi0160', 4, 6); -- Rafael

INSERT INTO sala (num_sala) VALUES
    ('101'),
    ('701'),
    ('702'),
    ('703'),
    ('704'),
    ('705'),
    ('706'),
    ('708'),
    ('709'),
    ('710'),
    ('711'),
    ('712'),
    ('707');

INSERT INTO servidor (fk_usuario_id_usuario, fk_sala_id_sala) VALUES
    (5, 1), -- CAE
    (6, 2),
    (7, 3),
    (8, 4),
    (9, 5),
    (10, 6),
    (11, 7),
    (12, 8),
    (13, 9),
    (14, 10),
    (15, 11),
    (16, 12),
    (17, 13); -- Moisés

INSERT INTO professor (regras, fk_servidor_fk_usuario_id_usuario) VALUES
    (null, 6),
    (null, 7),
    (null, 8),
    (null, 9),
    (null, 10),
    (null, 11),
    (null, 12),
    (null, 13),
    (null, 14),
    (null, 15),
    (null, 16),
    ('Não xingar porra!', 17);

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
    ('Sábado');

INSERT INTO horario_aula (hora_aula_inicio, hora_aula_fim) VALUES
    ('07:30:00', '08:20:00'),
    ('08:20:00', '09:10:00'),
    ('09:30:00', '10:20:00'),
    ('10:20:00', '11:10:00'),
    ('11:20:00', '12:10:00'),
    ('12:10:00', '13:00:00'),
    ('13:00:00', '13:50:00'),
    ('13:50:00', '14:40:00'),
    ('15:00:00', '15:50:00'),
    ('15:50:00', '16:40:00'),
    ('16:50:00', '17:40:00'),
    ('17:40:00', '18:30:00'),
    ('18:30:00', '19:20:00'),
    ('19:20:00', '20:10:00'),
    ('20:20:00', '21:10:00'),
    ('21:10:00', '22:00:00');

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

INSERT INTO professor_disciplina (fk_disciplina_id_disciplina, fk_professor_fk_servidor_fk_usuario_id_usuario) VALUES
    (1, 9),
    (2, 15),
    (3, 16),
    (4, 13),
    (5, 10),
    (6, 14),
    (7, 8),
    (8, 12),
    (9, 7),
    (10, 17),
    (11, 6),
    (12, 11);

INSERT INTO aula (
    fk_dia_semana_id_dia_semana,
    fk_professor_disciplina_id_professor_disciplina,
    fk_horario_aula_id_horario_aula,
    fk_turma_id_turma,
    fk_sala_aula_id_sala_aula
    ) VALUES
        -- Segunda-feira
        (2, 11, 1, 6, 1),
        (2, 11, 2, 6, 1),
        (2, 9, 3, 6, 2),
        (2, 9, 4, 6, 2),
        (2, 9, 5, 6, 2),
        (2, 7, 6, 6, 1),

        -- Terça-feira
        (3, 1, 1, 6, 1),
        (3, 1, 2, 6, 1),
        (3, 1, 3, 6, 1),
        (3, 5, 4, 6, 1),
        (3, 5, 5, 6, 1),
        (3, 12, 6, 6, 1),

        -- Quarta-feira
        (4, 8, 1, 6, 1),
        (4, 11, 2, 6, 1),
        (4, 7, 3, 6, 1),
        (4, 7, 4, 6, 1),
        (4, 4, 5, 6, 1),
        (4, 4, 6, 6, 1),

        -- Quinta-feira
        (5, 6, 2, 6, 1),
        (5, 8, 3, 6, 1),
        (5, 8, 4, 6, 1),
        (5, 2, 5, 6, 3),
        (5, 2, 6, 6, 3),

        -- Sexta-feira
        (6, 3, 2, 6, 3),
        (6, 3, 3, 6, 3),
        (6, 10, 4, 6, 4),
        (6, 10, 5, 6, 4),
        (6, 10, 6, 6, 4);


INSERT INTO usuario_evento (fk_usuario_id_usuario, fk_evento_id_evento) VALUES
    (2, 1), -- Henrique
    (3, 2), -- Duda
    (3, 3); -- Rafael

INSERT INTO contato (dsc_contato, fk_servidor_fk_usuario_id_usuario, fk_tipo_contato_id_tipo) VALUES
    ('(27) 999666-0410', 5, 1);

INSERT INTO servidor_horario (fk_servidor_fk_usuario_id_usuario, fk_horario_id_horario) VALUES
    (5, 1);
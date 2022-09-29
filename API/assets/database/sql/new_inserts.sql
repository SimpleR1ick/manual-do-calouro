 INSERT INTO acesso (dsc_acesso) VALUES
    ('admin'),
    ('usuario'),
    ('aluno'),
    ('servidor'),
    ('professor');

-- Senha unica! (S3NH@S)
INSERT INTO usuario (nom_usuario, email, senha, ativo, fk_acesso_id_acesso) VALUES
    ('admin', 'mdc@ifes.edu.br', '$2y$10$5R0JhvGH7iTEA9HgUqEd0.SywoyROn6.kkgC81UMhCoXHfl.J8hw6', 't', 1); 

INSERT INTO usuario (nom_usuario, email, senha, fk_acesso_id_acesso) VALUES
    ('Henrique', 'henriquedalmagro@outlook.com', '$2y$10$jgcDXod3UkRc3xdcMInbouy.K/qggwkDnNgD8cwjZTlBBrqffO9WG', 3),   
    ('Maria', 'mariaeduarda@gmail.com', '$2y$10$eQ1ZixS8rKNWkigRl2VmpusdSkHh19gLujF/fcYlZUOnlOkXsdHmG', 3),           
    ('Rafael', 'rafaelbarros@hotmail.com', '$2y$10$YLtWLzRodJzZ1mb31RdDO.1JLqJLoxnl1SBpnXLCbmGZ3bBER1aEm', 3),         
    ('Raphael', 'rbranco@yahoo.com', '$2y$10$xUZ9PMKKnLyHQxMrJREmT.gtIpMV785I5SrDq3jCqTgavF9.9F0Ra', 2),              
    ('Nauvia', 'nauvia@gmail.com', '$2y$10$//6XkcYo2qlAJWgbbDYiueC5QEEv8kX8zSu70uh34kA7eOnsSlGb6', 2),                 
    ('Marta', 'marta@gmail.com', '$2y$10$TvuKBuyUgpdwdo/X8sxhaOuKYOtnk3pvwI7mZucRBExj8mQgsXQ72', 2),                   
    ('Paulo Cezar', 'paulo.cesar@gmail.com', '$2y$10$kDwbUHz3pZjhikO29eAZp.LKdmy8E1UkN3NUxRLu7uDVL/HoViz4C', 2),       
    ('Alessandro', 'bermudes@gmail.com', '$2y$10$YhW5QUL.BTJzdmL3qzZQNeJf/FAFULcDbcEy.GAUMu2xKlBKDVPJe', 2),           
    ('Ronaldo', 'ronaldo@gmail.com', '$2y$10$09.kh9fHfHtZLwO3dP.SMuiozTdZCMdzqriBbgsv5AjBjYFqsjHp6', 2),               
    ('Diego', 'diego@gmail.com', '$2y$10$IceIFIucyB93NcgQw032DO8o/bONWDZwC9QJ/X9VGjOKKAPdqXKcu', 2),                   
    ('Ana Paula', 'ana.paula@gmail.com', '$2y$10$0VHPjKuE6f6ev9h2Gdu2kuEA.sXIC0aOos5YRd66w5lJ/DRJ9jb2i', 2),           
    ('Geraldo', 'geraldo@gmail.com', '$2y$10$QkPZ1vF8uBX7M1I6bYoEvOKsc2L5tLnORWbHEkTqXl2WZblHB/Q92', 2),               
    ('Maikon', 'maikon@gmail.com', '$2y$10$S0TJ.4x.sRkBgea8YAiq4.e00Ky/BRHyqhbMUZiTGQnvt9Ip3J0Ta', 2),                 
    ('Carlos', 'carlos@gmail.com', '$2y$10$wmEOlFlx63clUa5VCgiqe.Ysvl3T28LNJXwMvthDEBJocYQrQvYzG', 2),                 
    ('Daniel', 'daniel@gmail.com', '$2y$10$kS8dBN46ELFC8IS/eV/Xd.5OuAEsd03p0AsPjdtG2F8wjdIjr3M.q', 2),                 
    ('Moisés', 'moisesomena@ifes.edu.br', '$2y$10$SU803qITi2b8imDq1R5stO7Amc0SAbzTxPdeh0kklt/IS9IqyYyxG', 2);          

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
    (15, 13),
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
    (5, 1);

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
    ('(27) 99966-0410', 5, 1),
    ('(27) 99872-1412', 6, 1);

INSERT INTO servidor_horario (fk_servidor_fk_usuario_id_usuario, fk_horario_id_horario) VALUES
    (5, 1),
    (6, 1);
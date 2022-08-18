INSERT INTO usuario (nom_usuario, email, senha, acesso) VALUES
    ('admin', 'mdc@ifes.edu.br', '21232f297a57a5a743894a0e4a801fc3', 0); -- admin

INSERT INTO usuario (nom_usuario, email, senha) VALUES
    ('Henrique', 'henriquedalmagro@outlook.com', 'a1f925a7b5b70b7b3f7fe2208513e10f'), -- 123 
    ('Maria', 'mariaeduarda@gmail.com', 'd481dbf8fcb6838a7e5dea0ca8e16d8a'), -- fuckingpassword
    ('Rafael', 'rafaelbarros@hotmailcom'), -- 321
    ('Moisés', 'moisesomena@ifes.edu.br', '72c7d5bed34eb9dc055ef287eaf862ad'); -- ifes2022
    ('CAE', 'cae@ifes.edu.br', '') -- 

INSERT INTO servidor (fk_usuario_id_usuario, fk_sala_id_sala) VALUES 
    (4, '701'); -- Moisés

INSERT INTO aluno (num_matricula, fk_usuario_id_usuario, fk_turma_id_turma) VALUES
    ('20201tiimi0365', 1, 6), -- Henrique
    ('20201tiimi4167', 2, 6), -- Duda
    ('20201tiimi0911', 3, 6); -- Rafael

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
    ("BIO"),
    ("DES SIST"),
    ("DISP MOV"),
    ("ELET BAS"),
    ("Empreendedorismo"),
    ("FILOS"),
    ("MAT"),
    ("PORTUG"),
    ("PROG WEB II"),
    ("Proeto integrador"),
    ("QUI"),
    ("SOCIOL");

INSERT INTO sala_aula (num_sala_aula) VALUES 
    ('SAL 105'),
    ('LAB 208t'),
    ('LAB 903t'),
    ('LAB 901t'),

INSERT INTO evento (dat_evento, nom_evento, dsc_eventos) VALUES 
    ('2022-05-08 11:10:00', 'Prova de biologia', 'reprodução humana'),
    ('2022-04-10 08:20:00', 'OBMEP', 'estudar'),
    ('2022-06-08 13:00:00', 'Prova de matematica', 'recuperação'),
    ('2022-11-27 07:30:00', 'Expedição IFES', ''),
    ('2022-10-11 10:20:00', 'Laboratório de química', '');

INSERT INTO turma (dsc_curso, num_modulo) VALUES
    ('Info', 1),
    ('Info', 2),
    ('Info', 3),
    ('Info', 4),
    ('Info', 5),
    ('Info', 6);

INSERT INTO sala ()

INSERT INTO tipo_contato

INSERT INTO horario

INSERT INTO professor

INSERT INTO administrativo

INSERT INTO setor

INSERT INTO aula

INSERT INTO usuario_evento 

INSERT INTO professor_disciplina

INSERT INTO contato

INSERT INTO servidor_horario
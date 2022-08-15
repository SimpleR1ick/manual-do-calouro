INSERT INTO usuario (nom_usuario, email, senha) VALUES
    ('Henrique', 'henriquedalmagro@outlook.com', 'a1f925a7b5b70b7b3f7fe2208513e10f'), -- 123 
    ('Maria', 'mariaeduarda@gmail.com', 'd481dbf8fcb6838a7e5dea0ca8e16d8a'), -- fuckingpassword
    ('Rafael', 'rafaelbarros@hotmailcom'), -- 321
    ('Moisés', 'moisesomena@ifes.edu.br', '72c7d5bed34eb9dc055ef287eaf862ad'); -- ifes2022

INSERT INTO usuario (nom_usuario, email, senha, acesso) VALUES
    ('admin', 'mdc@ifes.edu.br', '21232f297a57a5a743894a0e4a801fc3', 0); -- admin

INSERT INTO servidor (fk_usuario_id_usuario, fk_sala_id_sala) VALUES 
    (4, '701'); -- Moisés

INSERT INTO aluno (num_matricula, fk_usuario_id_usuario, fk_turma_id_turma) VALUES
    ('20201tiimi0365', 1, ), -- Henrique
    ('', 2, ). -- Duda
    ('', 3, ); -- Rafael

INSERT INTO dia_semana

INSERT INTO horario_aula

INSERT INTO disciplina

INSERT INTO sala_aula

INSERT INTO evento

INSERT INTO turma (dsc_curso, num_modulo) VALUES
    ('Info', 1),
    ('Info', 2),
    ('Info', 3),
    ('Info', 4),
    ('Info', 5),
    ('Info', 6);

INSERT INTO sala

INSERT INTO tipo_contato
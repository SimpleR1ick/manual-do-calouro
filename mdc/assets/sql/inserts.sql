INSERT INTO Turma (dsc_turma) VALUES ('info 1'), ('info 2'), ('info 3'), ('mec 1'), ('mec 2');


INSERT INTO Dia_Semana (dsc_dia_semana) VALUES ('segunda-feira'), ('terça-feira'), ('quarta-feira'), ('quinta-feira'), ('sexta-feira'), ('sábado'), ('domingo');


INSERT INTO Horario (hora_inicio, hora_fim) VALUES ('07:30:00', '08:20:00'), ('08:20:00', '09:10:00'), ('09:10:00', '09:30:00'), ('09:30:00', '10:20:00'), ('10:20:00', '11:10:00');


INSERT INTO Sala (dsc_sala) VALUES ('901T'), ('103'), ('104'), ('105'), ('pedagogia'), ('722');


INSERT INTO Usuario (nom_usuario, email, senha) VALUES ('Maria', 'maria@gmail.com', 'fuckingpassword'), ('Henrique', 'rick@outlook.com', '1234'), ('Jonathan', 'jona@hotmail.com', 'password'), ('Moisés', '20matar@gmail.com', 'fucking'), ('Raphael', 'rbranco@yahoo.com', 'bonoro');


INSERT INTO Eventos (data_evento, dsc_evento, fk_Usuario_id_usuario) VALUES ('2022-05-08 11:10:00', 'Prova de biologia', 3), ('2022-04-10 08:20:00', 'OBMEP', 2), ('2022-06-08 13:00:00', 'Prova recuperação matemática', 5), ('2022-11-27 07:30:00', 'Expedição IFES', 4), ('2022-10-11 10:20:00', 'Laboratório de química', 1);


INSERT INTO Disciplina (dsc_disc) VALUES ('matemática'), ('geografia'), ('história'), ('programação I'), ('programação II');


INSERT INTO Tipo_contato (dsc_tipo) VALUES ('telefone'), ('e-mail'), ('celular');


INSERT INTO Professor (regras, fk_Usuario_id_usuario) VALUES ('Não sair de sala sem pedir, proibido celular, perguntas só no final da aula', 4);


INSERT INTO Servidor (horario_inicio, horario_fim, fk_Usuario_id_usuario) VALUES ('07:00:00', '07:30:00', 4), ('08:00:00', '18:00:00', 5), ('13:10:00', '14:00:00', 4);


INSERT INTO Aula (fk_Horario_id_horario, fk_Dia_Semana_id_dia_semana, fk_Turma_id_turma, fk_Disciplina_id_disc, fk_Sala_id_sala) VALUES (1, 4, 3, 1 , 2), (2, 5, 2, 5, 1), (1,	2, 5, 3, 3), (4, 3, 1, 4, 2), (5, 1, 2, 5, 4);


INSERT INTO Pertence (fk_Usuario_id_usuario, fk_Turma_id_turma) VALUES (1, 4), (2, 3), (3 ,1), (4, 2), (4, 5);


INSERT INTO Tem (dsc_contato, fk_Usuario_id_usuario, fk_Tipo_contato_id_tipo) VALUES ('(27) 33374351', 5, 1), ('cae@ifes.com', 5, 2), ('prof.moisesomena@gmail.com', 4, 2), ('(27) 999987373', 4, 3), ('(27) 33466942', 4, 1);


INSERT INTO Possui (fk_Usuario_id_usuario, fk_Sala_id_sala) VALUES (4, 6), (5,5);
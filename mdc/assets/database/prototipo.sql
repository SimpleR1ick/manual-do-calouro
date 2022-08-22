DROP TABLE IF EXISTS usuario CASCADE;
DROP TABLE IF EXISTS servidor CASCADE;
DROP TABLE IF EXISTS aluno CASCADE;
DROP TABLE IF EXISTS dia_semana CASCADE;
DROP TABLE IF EXISTS horario_aula CASCADE;
DROP TABLE IF EXISTS disciplina CASCADE;
DROP TABLE IF EXISTS sala_aula CASCADE;
DROP TABLE IF EXISTS evento CASCADE;
DROP TABLE IF EXISTS turma CASCADE;
DROP TABLE IF EXISTS sala CASCADE;
DROP TABLE IF EXISTS tipo_contato CASCADE;
DROP TABLE IF EXISTS horario CASCADE;
DROP TABLE IF EXISTS professor CASCADE;
DROP TABLE IF EXISTS administrativo CASCADE;
DROP TABLE IF EXISTS setor CASCADE;
DROP TABLE IF EXISTS aula CASCADE;
DROP TABLE IF EXISTS usuario_evento CASCADE;
DROP TABLE IF EXISTS professor_disciplina CASCADE;
DROP TABLE IF EXISTS contato CASCADE;
DROP TABLE IF EXISTS servidor_horario CASCADE;
DROP TABLE IF EXISTS curso CASCADE;

/* Modelo Lógico - Protótipo: */

CREATE TABLE usuario (
    id_usuario SERIAL PRIMARY KEY NOT NULL ,
    nom_usuario VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(250) NOT NULL,
    img_perfil VARCHAR(300) DEFAULT NULL,
    ativo BOOLEAN NOT NULL DEFAULT 't',
    acesso INT NOT NULL DEFAULT 1
);

CREATE TABLE servidor (
    fk_usuario_id_usuario SERIAL PRIMARY KEY NOT NULL,
    fk_sala_id_sala SERIAL NOT NULL
);

CREATE TABLE aluno (
    num_matricula VARCHAR(20),
    fk_usuario_id_usuario SERIAL PRIMARY KEY NOT NULL,
    fk_turma_id_turma SERIAL NOT NULL
);

CREATE TABLE dia_semana (
    id_dia_semana SERIAL PRIMARY KEY NOT NULL,
    dsc_dia_semana VARCHAR(15) NOT NULL
);

CREATE TABLE horario_aula (
    id_horario_aula SERIAL PRIMARY KEY NOT NULL,
    hora_aula_inicio TIME NOT NULL,
    hora_aula_fim TIME NOT NULL
);

CREATE TABLE disciplina (
    id_disciplina SERIAL PRIMARY KEY NOT NULL,
    dsc_disciplina VARCHAR(30) NOT NULL
);

CREATE TABLE sala_aula (
    id_sala_aula SERIAL PRIMARY KEY NOT NULL,
    num_sala_aula VARCHAR(10) NOT NULL
);

CREATE TABLE evento (
    id_evento SERIAL PRIMARY KEY NOT NULL,
    dat_evento TIMESTAMP NOT NULL,
    nom_evento VARCHAR(50) NOT NULL,
    dsc_evento VARCHAR(100)
);

CREATE TABLE turma (
    id_turma SERIAL PRIMARY KEY NOT NULL,
    dsc_curso VARCHAR(50) NOT NULL,
    num_modulo INT NOT NULL,
    fk_curso_id_curso SERIAL NOT NULL
);

CREATE TABLE sala (
    id_sala SERIAL PRIMARY KEY NOT NULL,
    num_sala VARCHAR(10) NOT NULL
);

CREATE TABLE tipo_contato (
    id_tipo SERIAL PRIMARY KEY NOT NULL,
    dsc_tipo VARCHAR(30) NOT NULL
);

CREATE TABLE horario (
    id_horario SERIAL PRIMARY KEY NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fim TIME NOT NULL
);

CREATE TABLE professor (
    fk_servidor_fk_usuario_id_usuario SERIAL PRIMARY KEY NOT NULL,
    regras TEXT    
);

CREATE TABLE administrativo (
    fk_servidor_fk_usuario_id_usuario SERIAL PRIMARY KEY NOT NULL,
    fk_setor_id_setor SERIAL
);

CREATE TABLE setor (
    id_setor SERIAL PRIMARY KEY NOT NULL,
    dsc_setor VARCHAR(50) NOT NULL
);

CREATE TABLE aula (
    fk_dia_semana_id_dia_semana SERIAL NOT NULL,
    fk_horario_aula_id_horario_aula SERIAL NOT NULL,
    fk_turma_id_turma SERIAL NOT NULL,
    fk_sala_aula_id_sala_aula SERIAL NOT NULL,
    fk_disciplina_id_disciplina SERIAL NOT NULL
);

CREATE TABLE usuario_evento (
    fk_usuario_id_usuario SERIAL NOT NULL,
    fk_evento_id_evento SERIAL NOT NULL
);

CREATE TABLE professor_disciplina (
    fk_professor_fk_servidor_fk_usuario_id_usuario SERIAL NOT NULL,
    fk_disciplina_id_disciplina SERIAL NOT NULL
);

CREATE TABLE contato (
    id_contato SERIAL PRIMARY KEY NOT NULL,
    fk_servidor_fk_usuario_id_usuario SERIAL NOT NULL,
    fk_tipo_contato_id_tipo SERIAL NOT NULL,
    dsc_contato VARCHAR(50) NOT NULL
);

CREATE TABLE servidor_horario (
    fk_servidor_fk_usuario_id_usuario SERIAL NOT NULL,
    fk_horario_id_horario SERIAL NOT NULL
);

CREATE TABLE curso (
    id_curso SERIAL PRIMARY KEY NOT NULL,
    dsc_curso VARCHAR(50) NOT NULL
);
 
ALTER TABLE servidor ADD CONSTRAINT FK_servidor_2
    FOREIGN KEY (fk_usuario_id_usuario)
    REFERENCES usuario (id_usuario)
    ON DELETE CASCADE;
 
ALTER TABLE servidor ADD CONSTRAINT FK_servidor_3
    FOREIGN KEY (fk_sala_id_sala)
    REFERENCES sala (id_sala)
    ON DELETE CASCADE;
 
ALTER TABLE aluno ADD CONSTRAINT FK_aluno_2
    FOREIGN KEY (fk_usuario_id_usuario)
    REFERENCES usuario (id_usuario)
    ON DELETE CASCADE;
 
ALTER TABLE aluno ADD CONSTRAINT FK_aluno_3
    FOREIGN KEY (fk_turma_id_turma)
    REFERENCES turma (id_turma)
    ON DELETE CASCADE;
 
ALTER TABLE professor ADD CONSTRAINT FK_professor_2
    FOREIGN KEY (fk_servidor_fk_usuario_id_usuario)
    REFERENCES servidor (fk_usuario_id_usuario)
    ON DELETE CASCADE;
 
ALTER TABLE administrativo ADD CONSTRAINT FK_administrativo_2
    FOREIGN KEY (fk_servidor_fk_usuario_id_usuario)
    REFERENCES servidor (fk_usuario_id_usuario)
    ON DELETE CASCADE;
 
ALTER TABLE administrativo ADD CONSTRAINT FK_administrativo_3
    FOREIGN KEY (fk_setor_id_setor)
    REFERENCES setor (id_setor)
    ON DELETE CASCADE;
 
ALTER TABLE aula ADD CONSTRAINT FK_aula_1
    FOREIGN KEY (fk_horario_aula_id_horario_aula)
    REFERENCES horario_aula (id_horario_aula)
    ON DELETE CASCADE;
 
ALTER TABLE aula ADD CONSTRAINT FK_aula_2
    FOREIGN KEY (fk_disciplina_id_disciplina)
    REFERENCES disciplina (id_disciplina)
    ON DELETE CASCADE;
 
ALTER TABLE aula ADD CONSTRAINT FK_aula_3
    FOREIGN KEY (fk_turma_id_turma)
    REFERENCES turma (id_turma)
    ON DELETE CASCADE;
 
ALTER TABLE aula ADD CONSTRAINT FK_aula_4
    FOREIGN KEY (fk_sala_aula_id_sala_aula)
    REFERENCES sala_aula (id_sala_aula)
    ON DELETE CASCADE;
 
ALTER TABLE aula ADD CONSTRAINT FK_aula_5
    FOREIGN KEY (fk_dia_semana_id_dia_semana)
    REFERENCES dia_semana (id_dia_semana)
    ON DELETE CASCADE;
 
ALTER TABLE usuario_evento ADD CONSTRAINT FK_usuario_evento_1
    FOREIGN KEY (fk_usuario_id_usuario)
    REFERENCES usuario (id_usuario)
    ON DELETE CASCADE;
 
ALTER TABLE usuario_evento ADD CONSTRAINT FK_usuario_evento_2
    FOREIGN KEY (fk_evento_id_evento)
    REFERENCES evento (id_evento)
    ON DELETE CASCADE;
 
ALTER TABLE professor_disciplina ADD CONSTRAINT FK_professor_disciplina_1
    FOREIGN KEY (fk_disciplina_id_disciplina)
    REFERENCES disciplina (id_disciplina)
    ON DELETE CASCADE;
 
ALTER TABLE professor_disciplina ADD CONSTRAINT FK_professor_disciplina_2
    FOREIGN KEY (fk_professor_fk_servidor_fk_usuario_id_usuario)
    REFERENCES professor (fk_servidor_fk_usuario_id_usuario)
    ON DELETE CASCADE;
 
ALTER TABLE contato ADD CONSTRAINT FK_contato_2
    FOREIGN KEY (fk_servidor_fk_usuario_id_usuario)
    REFERENCES servidor (fk_usuario_id_usuario)
    ON DELETE CASCADE;
 
ALTER TABLE contato ADD CONSTRAINT FK_contato_3
    FOREIGN KEY (fk_tipo_contato_id_tipo)
    REFERENCES tipo_contato (id_tipo)
    ON DELETE CASCADE;
 
ALTER TABLE servidor_horario ADD CONSTRAINT FK_servidor_horario_1
    FOREIGN KEY (fk_servidor_fk_usuario_id_usuario)
    REFERENCES servidor (fk_usuario_id_usuario)
    ON DELETE CASCADE;
 
ALTER TABLE servidor_horario ADD CONSTRAINT FK_servidor_horario_2
    FOREIGN KEY (fk_horario_id_horario)
    REFERENCES horario (id_horario)
    ON DELETE CASCADE;

ALTER TABLE turma ADD CONSTRAINT FK_turma_2
    FOREIGN KEY (fk_curso_id_curso)
    REFERENCES curso (id_curso)
    ON DELETE CASCADE;
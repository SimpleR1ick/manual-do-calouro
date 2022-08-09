/* PW2_manual_do_calouro */

/* DEVE SER EXECUTADO ANTES DE CRIAR A TABELA */
-- CREATE DATABASE PW2_manual_do_calouro;

/* LEGENDA
=== ativo ===
1 = ativo
0 = inativo

=== acesso ===
0 = administrador
1 = usuário básico
2 = servidor

*/
CREATE TABLE Usuarios (
    id_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ativo BIT NOT NULL DEFAULT 1,
    acesso TINYINT(1) NOT NULL DEFAULT 1,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(250) NOT NULL,
    img_perfil VARCHAR(300) DEFAULT NULL
);
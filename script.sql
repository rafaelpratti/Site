CREATE DATABASE codequest;
USE codequest;

CREATE TABLE `aluno` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `role` enum('admin','aluno') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE Curso (
    descricao VARCHAR(300),
    tempo_conclusao INT,
    titulo VARCHAR(30),
    dificuldade VARCHAR(10),
    id INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE Unidade (
    descricao VARCHAR(300),
    id INT PRIMARY KEY,
    titulo VARCHAR(100),
    fk_Curso_id INT,
    ordem INT
);

CREATE TABLE Exercicio (
    enunciado VARCHAR(300),
    resposta_feedback VARCHAR(300),
    id INT PRIMARY KEY,
    fk_Unidade_id INT,
    ordem INT
);

CREATE TABLE Realizacaodecurso (
    fk_Curso_id INT,
    fk_Aluno_id INT,
    progresso FLOAT,
    FOREIGN KEY (fk_Curso_id) REFERENCES Curso(id),
    FOREIGN KEY (fk_Aluno_id) REFERENCES Aluno(id)
);

CREATE TABLE Realizaexercicio (
    fk_Aluno_id INT,
    fk_Exercicio_id INT,
    resposta_enviada VARCHAR(300),
    data DATE
);

ALTER TABLE Unidade ADD CONSTRAINT FK_Unidade_2
    FOREIGN KEY (fk_Curso_id)
    REFERENCES Curso (id)
    ON DELETE RESTRICT;

ALTER TABLE Exercicio ADD CONSTRAINT FK_Exercicio_2
    FOREIGN KEY (fk_Unidade_id)
    REFERENCES Unidade (id)
    ON DELETE RESTRICT;

ALTER TABLE Realizacaodecurso ADD CONSTRAINT FK_Realizacaodecurso_1
    FOREIGN KEY (fk_Curso_id)
    REFERENCES Curso (id)
    ON DELETE RESTRICT;

ALTER TABLE Realizacaodecurso ADD CONSTRAINT FK_Realizacaodecurso_2
    FOREIGN KEY (fk_Aluno_id)
    REFERENCES Aluno (id)
    ON DELETE SET NULL;

ALTER TABLE Realizaexercicio ADD CONSTRAINT FK_Realizaexercicio_1
    FOREIGN KEY (fk_Aluno_id)
    REFERENCES Aluno (id)
    ON DELETE SET NULL;

ALTER TABLE Realizaexercicio ADD CONSTRAINT FK_Realizaexercicio_2
    FOREIGN KEY (fk_Exercicio_id)
    REFERENCES Exercicio (id)
    ON DELETE SET NULL;
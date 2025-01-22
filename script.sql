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







-----//versao com inserts-//---
    -------------------------------------////-------------------------------------------

CREATE DATABASE codequest;
USE codequest;

-- Tabela de alunos
CREATE TABLE `aluno` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `role` enum('admin','aluno') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Tabela de cursos
CREATE TABLE Curso (
    descricao VARCHAR(300),
    tempo_conclusao INT,
    titulo VARCHAR(30),
    dificuldade VARCHAR(10),
    id INT PRIMARY KEY AUTO_INCREMENT
);

-- Tabela de unidades
CREATE TABLE Unidade (
    descricao VARCHAR(300),
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100),
    fk_Curso_id INT,
    ordem INT,
    FOREIGN KEY (fk_Curso_id) REFERENCES Curso(id)
);

-- Tabela de exercícios
CREATE TABLE Exercicio (
    enunciado VARCHAR(300),
    resposta_feedback VARCHAR(300),
    id INT PRIMARY KEY AUTO_INCREMENT,
    fk_Unidade_id INT,
    ordem INT,
    FOREIGN KEY (fk_Unidade_id) REFERENCES Unidade(id)
);

-- Tabela de realização de cursos
CREATE TABLE Realizacaodecurso (
    fk_Curso_id INT,
    fk_Aluno_id INT,
    progresso FLOAT,
    FOREIGN KEY (fk_Curso_id) REFERENCES Curso(id),
    FOREIGN KEY (fk_Aluno_id) REFERENCES Aluno(id)
);

-- Tabela de realização de exercícios
CREATE TABLE Realizaexercicio (
    fk_Aluno_id INT,
    fk_Exercicio_id INT,
    resposta_enviada VARCHAR(300),
    data DATE,
    FOREIGN KEY (fk_Aluno_id) REFERENCES Aluno(id),
    FOREIGN KEY (fk_Exercicio_id) REFERENCES Exercicio(id)
);

-- Tabela de conteúdos (artigo ou vídeo)
CREATE TABLE Conteudo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo ENUM('video', 'artigo') NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    fk_Unidade_id INT,
    FOREIGN KEY (fk_Unidade_id) REFERENCES Unidade(id) ON DELETE CASCADE
);

-- Tabela de artigos
CREATE TABLE Artigo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fk_Conteudo_id INT,
    texto TEXT NOT NULL,
    url_pdf VARCHAR(255), -- Link para o PDF, caso tenha
    FOREIGN KEY (fk_Conteudo_id) REFERENCES Conteudo(id) ON DELETE CASCADE
);

-- Tabela de vídeos
CREATE TABLE Video (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fk_Conteudo_id INT,
    url VARCHAR(255) NOT NULL, -- URL do vídeo (pode ser YouTube, Vimeo, etc)
    FOREIGN KEY (fk_Conteudo_id) REFERENCES Conteudo(id) ON DELETE CASCADE
);

-- Inserir Cursos
INSERT INTO Curso (descricao, titulo, dificuldade, tempo_conclusao) VALUES
('Curso básico de Python, abordando conceitos fundamentais como variáveis, tipos de dados, controle de fluxo e funções.', 'Curso de Python', 'Fácil', 30),
('Curso de Lógica de Programação, abordando estruturas de controle, algoritmos e resolução de problemas.', 'Lógica de Programação', 'Fácil', 40),
('Curso de HTML, ensinando a estrutura básica de uma página web, tags HTML, atributos e formatação.', 'Curso de HTML', 'Fácil', 20);

-- Inserir Unidades para o curso Python
INSERT INTO Unidade (descricao, titulo, fk_Curso_id, ordem) VALUES
('Introdução à linguagem Python, suas principais funcionalidades e sintaxe básica.', 'Introdução ao Python', 1, 1),
('Manipulação de estruturas de dados como listas, tuplas e dicionários em Python.', 'Estruturas de Dados', 1, 2),
('Como desenvolver programas simples usando loops e controle de fluxo, como estruturas condicionais.', 'Controle de Fluxo em Python', 1, 3);

-- Inserir Unidades para o curso Lógica de Programação
INSERT INTO Unidade (descricao, titulo, fk_Curso_id, ordem) VALUES
('Introdução à Lógica de Programação, variáveis e operações básicas.', 'Lógica de Programação: Introdução', 2, 1),
('Estruturas de controle: loops e condicionais, e como resolver problemas com elas.', 'Estruturas de Controle', 2, 2);

-- Inserir Unidades para o curso HTML
INSERT INTO Unidade (descricao, titulo, fk_Curso_id, ordem) VALUES
('Estrutura básica de uma página HTML e principais tags.', 'Estrutura Básica do HTML', 3, 1),
('Como usar listas, tabelas e formulários em HTML.', 'Listas e Formulários', 3, 2);

-- Inserir Exercícios para as unidades de Python (exemplo)
INSERT INTO Exercicio (enunciado, resposta_feedback, fk_Unidade_id, ordem) VALUES
('Explique o que são listas em Python e como manipulá-las.', 'Resposta esperada: listas são coleções ordenadas que podem ser alteradas.', 1, 1),
('Crie um programa simples que leia um número e imprima seu dobro.', 'Resposta esperada: programa simples que usa input() e faz multiplicação.', 2, 1);

-- Inserir Exercícios para as unidades de Lógica de Programação (exemplo)
INSERT INTO Exercicio (enunciado, resposta_feedback, fk_Unidade_id, ordem) VALUES
('Crie um algoritmo que calcule a soma de dois números inteiros.', 'Resposta esperada: algoritmo simples de soma com variáveis e operadores aritméticos.', 1, 1);

-- Inserir Exercícios para as unidades de HTML (exemplo)
INSERT INTO Exercicio (enunciado, resposta_feedback, fk_Unidade_id, ordem) VALUES
('Qual a tag HTML usada para criar um título de página?', 'Resposta esperada: <h1>, <h2>, <h3>, etc.', 1, 1);

-- Inserir Conteúdos para o curso Python
INSERT INTO Conteudo (tipo, titulo, descricao, fk_Unidade_id) VALUES
('artigo', 'Introdução ao Python - Artigo', 'Este artigo explica a introdução à linguagem Python e seus fundamentos.', 1),
('video', 'Introdução ao Python - Vídeo', 'Vídeo explicando a introdução ao Python, com exemplos práticos.', 1),
('artigo', 'Estruturas de Dados em Python - Artigo', 'Este artigo aborda como usar listas, tuplas e dicionários no Python.', 2),
('video', 'Estruturas de Dados em Python - Vídeo', 'Vídeo mostrando como manipular listas, tuplas e dicionários no Python.', 2);

-- Inserir Conteúdos para o curso Lógica de Programação
INSERT INTO Conteudo (tipo, titulo, descricao, fk_Unidade_id) VALUES
('artigo', 'Introdução à Lógica de Programação - Artigo', 'Este artigo cobre o básico sobre lógica de programação e suas aplicações.', 4),
('video', 'Introdução à Lógica de Programação - Vídeo', 'Vídeo explicativo sobre os conceitos básicos de lógica de programação.', 4);

-- Inserir Conteúdos para o curso HTML
INSERT INTO Conteudo (tipo, titulo, descricao, fk_Unidade_id) VALUES
('artigo', 'Estrutura Básica do HTML - Artigo', 'Este artigo apresenta a estrutura básica de uma página HTML.', 5),
('video', 'Estrutura Básica do HTML - Vídeo', 'Vídeo que demonstra como criar uma estrutura básica de HTML e algumas tags principais.', 5);

-- Inserir Artigos para os conteúdos
INSERT INTO Artigo (fk_Conteudo_id, texto) VALUES
(1, 'Neste artigo, abordamos os fundamentos da linguagem Python, como sintaxe, tipos de dados e operações básicas.'),
(3, 'Aqui discutimos como utilizar as estruturas de dados básicas em Python, como listas, dicionários e tuplas.'),
(5, 'Este artigo introduz conceitos fundamentais de lógica de programação, como algoritmos e fluxogramas.'),
(7, 'Neste artigo, você aprenderá a criar a estrutura básica de uma página HTML, com as principais tags como <html>, <head>, <body>, etc.');

-- Inserir Vídeos para os conteúdos
INSERT INTO Video (fk_Conteudo_id, url) VALUES
(2, 'https://www.youtube.com/watch?v=examplepythonintro'),
(4, 'https://www.youtube.com/watch?v=examplestructures'),
(6, 'https://www.youtube.com/watch?v=examplelogicintro'),
(8, 'https://www.youtube.com/watch?v=examplehtmlintro');

INSERT INTO `aluno`(`id`, `nome`, `email`, `senha`, `role`) VALUES (0, 'admin', 'admin@gmail.com', '$2y$10$TBx0nwgCrdgUrYASfJx7O.nAgHQ5ivfCB2xWWti87uBW./UI3UCby', 'admin');


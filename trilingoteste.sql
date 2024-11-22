-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 22-Nov-2024 às 12:14
-- Versão do servidor: 8.3.0
-- versão do PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trilingoteste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `descricao` varchar(300) NOT NULL,
  `tempo_conclusao` int NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `dificuldade` varchar(10) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`descricao`, `tempo_conclusao`, `titulo`, `dificuldade`, `id`) VALUES
('Descrição do Curso', 1200, 'O titulo do curso escolhido', 'dificil', 47);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `enunciado` varchar(300) NOT NULL,
  `resposta_feedback` varchar(300) NOT NULL,
  `id` int NOT NULL,
  `fk_unidade_id` int NOT NULL,
  `ordem` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`enunciado`, `resposta_feedback`, `id`, `fk_unidade_id`, `ordem`) VALUES
('O Enunciado do Exercicio', 'O Feedback da Resposta do Exercicio', 56, 32, 69);

-- --------------------------------------------------------

--
-- Estrutura da tabela `realizacao_do_curso`
--

CREATE TABLE `realizacao_do_curso` (
  `fk_curso_id` int NOT NULL,
  `fk_aluno_id` int NOT NULL,
  `progresso` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `realizacao_do_curso`
--

INSERT INTO `realizacao_do_curso` (`fk_curso_id`, `fk_aluno_id`, `progresso`) VALUES
(34, 15, 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `realizacao_do_exercicio`
--

CREATE TABLE `realizacao_do_exercicio` (
  `fk_aluno_id` int NOT NULL,
  `fk_exercicio_id` int NOT NULL,
  `resposta_enviada` varchar(300) NOT NULL,
  `data` date NOT NULL,
  `tempo_gasto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `realizacao_do_exercicio`
--

INSERT INTO `realizacao_do_exercicio` (`fk_aluno_id`, `fk_exercicio_id`, `resposta_enviada`, `data`, `tempo_gasto`) VALUES
(68, 12, 'A resposta enviada do Exercicio', '2024-04-22', 60);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `descricao` varchar(300) NOT NULL,
  `id` int NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `fk_curso_id` int NOT NULL,
  `ordem` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`descricao`, `id`, `titulo`, `fk_curso_id`, `ordem`) VALUES
('A descricao do conteudo do curso', 23, 'O titulo do conteudo escolhido', 13, 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `role` enum('admin','aluno') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `role`) VALUES
(87, 'O nome do usuario', 'O email do usuario', 'A senha do usuario', 'aluno');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26-Nov-2024 às 12:37
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
(1, 'k', 'k@gmail.com', 'k', 'aluno'),
(2, 'a', 'a@a.com', '$2y$10$X0W6mVGW6RMcWfv7cEU3NuOK0iyNH5XmTmOWfRdEcUqsjM4YuwYGC', 'aluno'),
(3, 'rafael', 'rafael@gmail.com', '$2y$10$EhyG5VoRidRWLb1rROZbEuEGJq98CEgyeg7bLXKSQKocvms23sH2W', 'aluno'),
(4, 'r', 'r@gmail.com', '$2y$10$HVkEQ.x9vWv/w5zdQPcdteZHr07s1GwIDvMfrkgayvpdzcC0pybBK', 'aluno'),
(5, 'a', 'a@gmail.com', '$2y$10$Q8j8CgnAReN59qwLNb2G7.E7jefRwqHFSTKukE8UMA9VR5PBZ/IsW', 'aluno'),
(6, 'p', 'p@gmail.com', '$2y$10$lR2KMOSey5HkypQd7uL.pubxNiXJjoS08Ma5UCInrPELk.zvE0gUe', 'aluno');

--
-- Índices para tabelas despejadas
--

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

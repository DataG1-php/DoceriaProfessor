-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/11/2024 às 01:11
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `doceria`
--
CREATE DATABASE IF NOT EXISTS DOCERIA;
-- --------------------------------------------------------

--
-- Estrutura para tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `idingredientes` int(15) NOT NULL COMMENT 'Chave primaria da tabela',
  `descricao` varchar(75) NOT NULL COMMENT 'Ingrediente para uso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ingredientes`
--

INSERT INTO `ingredientes` (`idingredientes`, `descricao`) VALUES
(1, 'Chocolate'),
(2, 'Açúcar'),
(3, 'Fermento'),
(4, 'Sal'),
(5, 'Margarina'),
(7, 'Canela'),
(8, 'Boldo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `item`
--

CREATE TABLE `item` (
  `iditem` int(15) NOT NULL,
  `nome` varchar(75) NOT NULL,
  `validade` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `idingredientes` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `item`
--

INSERT INTO `item` (`iditem`, `nome`, `validade`, `valor`, `idingredientes`) VALUES
(1, 'Toddy', '2024-11-20', 7.50, 1),
(2, 'Claybom', '2024-11-22', 4.79, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itemreceita`
--

CREATE TABLE `itemreceita` (
  `iditem` int(11) NOT NULL,
  `idreceita` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itemreceita`
--

INSERT INTO `itemreceita` (`iditem`, `idreceita`, `quantidade`) VALUES
(2, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `receita`
--

CREATE TABLE `receita` (
  `idreceita` int(15) NOT NULL,
  `nome` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receita`
--

INSERT INTO `receita` (`idreceita`, `nome`) VALUES
(1, 'Bolo de chocolate'),
(4, 'Empada de palmito');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(15) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `login`, `senha`) VALUES
(1, 'admin', '*A4B6157319038724E3560894F7F932C8886EBFCF');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`idingredientes`);

--
-- Índices de tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iditem`),
  ADD KEY `FK_RECEITA_INGREDIENTES` (`idingredientes`);

--
-- Índices de tabela `itemreceita`
--
ALTER TABLE `itemreceita`
  ADD PRIMARY KEY (`iditem`,`idreceita`),
  ADD KEY `FK_item_rec_rec` (`idreceita`);

--
-- Índices de tabela `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`idreceita`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `idingredientes` int(15) NOT NULL AUTO_INCREMENT COMMENT 'Chave primaria da tabela', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `item`
--
ALTER TABLE `item`
  MODIFY `iditem` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `idreceita` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_RECEITA_INGREDIENTES` FOREIGN KEY (`idingredientes`) REFERENCES `ingredientes` (`idingredientes`);

--
-- Restrições para tabelas `itemreceita`
--
ALTER TABLE `itemreceita`
  ADD CONSTRAINT `FK_item_rec_item` FOREIGN KEY (`iditem`) REFERENCES `item` (`iditem`),
  ADD CONSTRAINT `FK_item_rec_rec` FOREIGN KEY (`idreceita`) REFERENCES `receita` (`idreceita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Set-2016 às 18:33
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extintor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `codigo_produto` varchar(255) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(7,0) NOT NULL,
  `peso` decimal(7,0) NOT NULL,
  `cod_categoria` int(255) NOT NULL,
  `cod_subcategoria` int(255) NOT NULL,
  `adicionais` varchar(255) NOT NULL,
  `sistema_operacional` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codigo_produto`, `nome_produto`, `descricao`, `preco`, `peso`, `cod_categoria`, `cod_subcategoria`, `adicionais`, `sistema_operacional`) VALUES
('10', '1', '1descricao', '1', '1', 1, 1, '1', 'MAC'),
('11', '1', '1descricao', '1', '1', 1, 1, '1', 'MAC'),
('12', '1', '1descricao', '1', '1', 1, 1, '1', 'MAC'),
('13', '1', '1descricao', '1', '1', 1, 1, '1', 'MAC'),
('44', 'nome', 'descricao', '8', '16', 32, 64, '$ad', '$so');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(255) UNSIGNED NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `senha`) VALUES
(1, 'adm', 'adm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD UNIQUE KEY `codigo_produto` (`codigo_produto`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

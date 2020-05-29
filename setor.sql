-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Maio-2020 às 20:27
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `setor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `idSetor` int(10) UNSIGNED,
  `nomeUsuario` varchar(200) NOT NULL,
  `Card_Cad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Inserindo dados de teste na tabela `cadastro`
--

INSERT INTO `cadastro` (`idUsuario`, `idSetor`, `nomeUsuario`, `Card_Cad`) VALUES
(1, 1, 'Pedro Paulo Nascimento', '111'),
(2, 2, 'Ana Cristina de Paula', '222'),
(3, 1, 'Arley Souto Aguiar', '333'),
(4, 3, 'Saulo Magalhaes de Paula', '444'),
(5, 4, 'Joao da Silva', '555'),
(6, 4, 'Jose Maria', '666'),
(7, 5, 'Renato Nascimento Souza', '777'),
(8, 6, 'Maria das Graças de sousa', '888'),
(9, 7, 'Matheus de Freitas Magalhes', '999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE `entrada` (
  `idEntrada` int(11) NOT NULL,
  `idSetor` int(10) UNSIGNED,
  `idUsuario` int(10) UNSIGNED,
  `nomeEntrada` varchar(200) NOT NULL,
  `dataEntrada` date NOT NULL,
  `horaEntrada` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida`
--

CREATE TABLE `saida` (
  `idSaida` int(11) NOT NULL,
  `idSetor` int(10) UNSIGNED,
  `idUsuario` int(10) UNSIGNED, 
  `nomeSaida` varchar(200) NOT NULL,
  `dataSaida` date NOT NULL,
  `horaSaida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_setor`
--

CREATE TABLE `tb_setor` (
  `idSetor` int(10) UNSIGNED NOT NULL,
  `nomeSetor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Inserindo dados de teste na tabela `tb_setor`
--

INSERT into `tb_setor`(`idSetor`,`nomeSetor`) VALUES
(1,'Arquitetura'),
(2,'Eletronica'),
(3,'Segurança'),
(4,'Desenvolvimento'),
(5,'Engenharia de Software'),
(6,'IBTI'),
(7,'Sistemas da Informação'); 

-- --------------------------------------------------------

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices para tabela `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`idEntrada`);

--
-- Índices para tabela `saida`
--
ALTER TABLE `saida`
  ADD PRIMARY KEY (`idSaida`);

--
-- Índices para tabela `tb_setor`
--
ALTER TABLE `tb_setor`
  ADD PRIMARY KEY (`idSetor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `idUsuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `entrada`
--
ALTER TABLE `entrada`
  MODIFY `idEntrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `saida`
--
ALTER TABLE `saida`
  MODIFY `idSaida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_setor`
--
ALTER TABLE `tb_setor`
  MODIFY `idSetor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
  
--
-- Cria chave-estrangeira entre as tabelas de `cadastro` e `tb_setor`
--
ALTER TABLE `cadastro`
ADD FOREIGN KEY (`idSetor`) REFERENCES `tb_setor`(`idSetor`);

--
-- Cria chave-estrangeira entre as tabelas de `entrada` e `tb_setor`
-- Cria chave-estrangeira entre as tabelas de `entrada` e `cadastro`
--
ALTER TABLE `entrada`
ADD FOREIGN KEY (`idSetor`) REFERENCES `tb_setor`(`idSetor`),
ADD FOREIGN KEY (`idUsuario`) REFERENCES `cadastro`(`idUsuario`);

--
-- Cria chave-estrangeira entre as tabelas de `saida` e `tb_setor`
-- Cria chave-estrangeira entre as tabelas de `saida` e `cadastro`
--
ALTER TABLE `saida`
ADD FOREIGN KEY (`idSetor`) REFERENCES `tb_setor`(`idSetor`),
ADD FOREIGN KEY (`idUsuario`) REFERENCES `cadastro`(`idUsuario`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

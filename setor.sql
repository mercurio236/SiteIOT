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
-- Estrutura da tabela `tb_cadastro`
--

CREATE TABLE `tb_cadastro` (
  `id_cadastro` int(10) UNSIGNED NOT NULL,
  `no_usuario` varchar(200) NOT NULL,
  `cd_cartao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Inserindo dados de teste na tabela `tb_cadastro`
--

INSERT INTO `tb_cadastro` (`id_cadastro`, `no_usuario`, `cd_cartao`) VALUES
(1, 'Pedro Paulo Nascimento', '111'),
(2, 'Ana Cristina de Paula', '222'),
(3, 'Arley Souto Aguiar', '333'),
(4, 'Saulo Magalhaes de Paula', '444'),
(5, 'Joao da Silva', '555'),
(6, 'Jose Maria', '666'),
(7, 'Renato Nascimento Souza', '777'),
(8, 'Maria das Graças de sousa', '888'),
(9, 'Matheus de Freitas Magalhes', '999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ocorrencia`
--

CREATE TABLE `tb_dispositivo` (
  `id_dispositivo` int(10) UNSIGNED NOT NULL,
  `no_dispositivo` varchar(100) NOT NULL,
  `no_localizacao` varchar(200) NOT NULL,
  `nu_andar` int(10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Inserindo dados de teste na tabela `tb_dispositivo`
--

INSERT into `tb_dispositivo`(`id_dispositivo`,`no_dispositivo`,`no_localizacao`,`nu_andar`) VALUES
(1,'111-111','Sala de Reunioes',1),
(2,'222-222','Sala de TI A',1),
(3,'333-333','Sala de TI B',2),
(4,'444-444','Sala da Recepcao',2),
(5,'555-555','Despensa',3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ocorrencia`
--

CREATE TABLE `tb_ocorrencia` (
  `id_ocorrencia` int(11) NOT NULL,
  `fk_dispositivo` int(10) UNSIGNED,
  `fk_cadastro` int(10) UNSIGNED,
  `dt_ocorrencia` date NOT NULL,
  `hr_ocorrencia` time NOT NULL,
  `st_ocorrencia` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Inserindo dados de teste na tabela `tb_ocorrencia`
--

INSERT into `tb_ocorrencia`(`id_ocorrencia`,`fk_dispositivo`,`fk_cadastro`,`dt_ocorrencia`,`hr_ocorrencia`,`st_ocorrencia`) VALUES
(1,1,1,CURRENT_DATE,CURRENT_TIME,'e'),
(2,1,1,CURRENT_DATE,ADDTIME(CURRENT_TIME,"550"),'s');

-- --------------------------------------------------------

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  ADD PRIMARY KEY (`id_cadastro`);

--
-- Índices para tabela `tb_ocorrencia`
--
ALTER TABLE `tb_ocorrencia`
  ADD PRIMARY KEY (`id_ocorrencia`);

--
-- Índices para tabela `tb_setor`
--
ALTER TABLE `tb_dispositivo`
  ADD PRIMARY KEY (`id_dispositivo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  MODIFY `id_cadastro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_ocorrencia`
--
ALTER TABLE `tb_ocorrencia`
  MODIFY `id_ocorrencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_dispositivo`
--
ALTER TABLE `tb_dispositivo`
  MODIFY `id_dispositivo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Cria chave-estrangeira entre as tabelas de `tb_ocorrencia` e `tb_dispositivo`
-- Cria chave-estrangeira entre as tabelas de `tb_ocorrencia` e `tb_cadastro`
--
ALTER TABLE `tb_ocorrencia`
ADD FOREIGN KEY (`fk_dispositivo`) REFERENCES `tb_dispositivo`(`id_dispositivo`),
ADD FOREIGN KEY (`fk_cadastro`) REFERENCES `tb_cadastro`(`id_cadastro`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

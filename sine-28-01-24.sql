-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jan-2024 às 03:11
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sine`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados1`
--

CREATE TABLE `chamados1` (
  `contador` int(255) NOT NULL,
  `Local` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DataHora` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Tecnico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servico` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serviexecu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `DataHoraAber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DataHoraFim` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `chamados1`
--

INSERT INTO `chamados1` (`contador`, `Local`, `DataHora`, `Tecnico`, `Status`, `servico`, `serviexecu`, `DataHoraAber`, `DataHoraFim`) VALUES
(2, 'Miller Indep', '18/02/2018 17:38', 'Tecnico1teste', 'Aberto', 'teste2', '', '', ''),
(3, 'Miller Centro', '18/02/2018 17:38', 'Tecnico1teste', 'Aberto', 'teste3', '', '', ''),
(8, 'Miller Indep', '10/10/2018 14:37', 'Gean novato', 'Aberto', 'nada', '', '', ''),
(5, 'Miller café', '19/02/2018 09:11', 'José', 'Feito', 'Fazer cabo de rede no açougue ', 'Usado 5m de cabo de rede, deixado ponteira por conta sa CSinformatica', '19/02/2018 09:14', '19/02/2018 09:15'),
(6, 'matriz', '19/02/2018 09:28', 'Josué', 'Aberto', 'teste\r\n', '', '', ''),
(7, 'Miller Centro', '20/02/2018 10:48', 'Josué', 'Aberto', 'Teste', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnicos`
--

CREATE TABLE `tecnicos` (
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NomeCompleto` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tecnicos`
--

INSERT INTO `tecnicos` (`nome`, `NomeCompleto`, `id`) VALUES
('Lisiane', 'José', 44),
('Tecnico1teste', 'Tecnico1Teste', 36),
('Josué', 'Josué', 43),
('Testetecnico2', 'testetecnico2', 37),
('Gean novato', 'Gean', 42);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `username`, `password`, `role`) VALUES
(28, 'José', 'José', 'jose', 'tecnico'),
(29, 'Josué', 'Josué', 'josu', 'tecnico'),
(22, 'gean', 'gean', 'gean', 'tecnico'),
(23, 'testetecnico2', 'Testetecnico2', 'Testetecnico2', 'tecnico'),
(21, 'Sub-Administrador', 'SubAdminteste', 'SubAdminteste', 'subadim'),
(16, 'gean', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chamados1`
--
ALTER TABLE `chamados1`
  ADD PRIMARY KEY (`contador`);

--
-- Indexes for table `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nome` (`nome`),
  ADD UNIQUE KEY `NomeCompleto` (`NomeCompleto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`username`),
  ADD KEY `nivel` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chamados1`
--
ALTER TABLE `chamados1`
  MODIFY `contador` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `id` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

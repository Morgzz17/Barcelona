-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jun-2024 às 11:22
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fc barcelona`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipa`
--

CREATE TABLE `equipa` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Idade` smallint(6) NOT NULL,
  `Nª` smallint(6) NOT NULL,
  `Posicao` varchar(4) NOT NULL,
  `Nacionalidade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `equipa`
--

INSERT INTO `equipa` (`ID`, `Nome`, `Idade`, `Nª`, `Posicao`, `Nacionalidade`) VALUES
(1, 'Marc-André ter Stegen', 0, 1, 'GK', 'German'),
(2, 'Iñaki Peña', 0, 13, 'GK', 'Spanish'),
(3, 'Ander Astralaga', 0, 26, 'GK', 'Spanish'),
(4, 'Ronald Araújo', 0, 4, 'DC', 'Uruguayan'),
(5, 'Jules Koundé', 0, 23, 'DC', 'French'),
(6, 'Andreas Christensen', 0, 15, 'DC', 'Danish'),
(7, 'Pau Cubarsí', 0, 33, 'DC', 'Spanish'),
(8, 'Iñigo Martínez', 0, 5, 'DC', 'Spanish'),
(9, 'Alejandro Balde', 0, 3, 'LE', 'Spanish'),
(10, 'Marcos Alonso', 0, 17, 'LE', 'Spanish'),
(11, 'João Cancelo', 0, 2, 'LD', 'Portuguese'),
(12, 'Héctor Fort', 0, 39, 'LD', 'Spanish'),
(13, 'Oriol Romeu', 0, 18, 'MDC', 'Spanish'),
(14, 'Gavi', 0, 6, 'MC', 'Spanish'),
(15, 'Pedri', 0, 8, 'MC', 'Spanish'),
(16, 'Frenkie de Jong', 0, 21, 'MC', 'Dutch'),
(17, 'Sergi Roberto', 0, 20, 'MC', 'Spanish'),
(18, 'Ilkay Gündogan', 0, 22, 'MC', 'German'),
(19, 'Pablo Torre', 0, 32, 'MO', 'Spanish'),
(20, 'Robert Lewandowski', 0, 9, 'PL', 'Polish'),
(21, 'Ferran Torres', 0, 7, 'EE', 'Spanish'),
(22, 'Ansu Fati', 0, 10, 'EE', 'Spanish'),
(23, 'Raphinha', 0, 11, 'ED', 'Brazilian'),
(24, 'João Félix', 0, 14, 'SA', 'Portuguese'),
(25, 'Lamine Yamal', 0, 27, 'ED', 'Spanish'),
(26, 'Vitor Roque', 0, 29, 'PL', 'Brazilian');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `ID` int(11) NOT NULL,
  `ID_Epoca` int(11) NOT NULL,
  `Jogos` smallint(6) NOT NULL,
  `Golos` smallint(6) NOT NULL,
  `Assistencias` smallint(6) NOT NULL,
  `Cartoes_Amarelos` smallint(6) NOT NULL,
  `Cartoes_Vermelhos` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `jogador`
--

INSERT INTO `jogador` (`ID`, `ID_Epoca`, `Jogos`, `Golos`, `Assistencias`, `Cartoes_Amarelos`, `Cartoes_Vermelhos`) VALUES
(1, 2023, 38, 0, 0, 1, 0),
(2, 2023, 10, 0, 0, 0, 0),
(3, 2023, 5, 0, 0, 0, 0),
(4, 2023, 30, 3, 2, 6, 0),
(5, 2023, 32, 2, 4, 5, 0),
(6, 2023, 28, 1, 3, 4, 0),
(7, 2023, 15, 0, 0, 2, 0),
(8, 2023, 20, 0, 1, 3, 0),
(9, 2023, 34, 2, 5, 4, 0),
(10, 2023, 25, 1, 2, 3, 0),
(11, 2023, 27, 2, 4, 5, 0),
(12, 2023, 10, 0, 0, 1, 0),
(13, 2023, 29, 1, 3, 6, 1),
(14, 2023, 35, 4, 6, 7, 0),
(15, 2023, 30, 5, 7, 4, 0),
(16, 2023, 33, 3, 5, 5, 0),
(17, 2023, 22, 1, 3, 3, 0),
(18, 2023, 31, 6, 8, 4, 0),
(19, 2023, 12, 1, 2, 1, 0),
(20, 2023, 36, 25, 5, 3, 0),
(21, 2023, 28, 7, 4, 2, 0),
(22, 2023, 24, 10, 3, 3, 0),
(23, 2023, 26, 8, 5, 5, 0),
(24, 2023, 20, 6, 2, 3, 0),
(25, 2023, 18, 4, 3, 2, 0),
(26, 2023, 15, 5, 2, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posição`
--

CREATE TABLE `posição` (
  `Posição` varchar(4) NOT NULL,
  `Descrição` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `posição`
--

INSERT INTO `posição` (`Posição`, `Descrição`) VALUES
('DC', 'Defesa Central'),
('ED', 'Extremo Direito'),
('EE', 'Extremo Esquerdo'),
('GK', 'Guarda-Redes'),
('LD', 'Lateral Direito'),
('LE', 'Lateral Esquerdo'),
('MC', 'Médio Centro'),
('MDC', 'Médio Defensivo'),
('MO', 'Médio Ofensivo'),
('PL', 'Ponta de Lança'),
('SA', 'Segundo Avançado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `época`
--

CREATE TABLE `época` (
  `ID_Epoca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `época`
--

INSERT INTO `época` (`ID_Epoca`) VALUES
(2010),
(2011),
(2012),
(2013),
(2014),
(2015),
(2016),
(2017),
(2018),
(2019),
(2020),
(2021),
(2022),
(2023);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `equipa`
--
ALTER TABLE `equipa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Posição` (`Posicao`);

--
-- Índices para tabela `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID Época` (`ID_Epoca`);

--
-- Índices para tabela `posição`
--
ALTER TABLE `posição`
  ADD PRIMARY KEY (`Posição`);

--
-- Índices para tabela `época`
--
ALTER TABLE `época`
  ADD PRIMARY KEY (`ID_Epoca`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `equipa`
--
ALTER TABLE `equipa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT de tabela `jogador`
--
ALTER TABLE `jogador`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `época`
--
ALTER TABLE `época`
  MODIFY `ID_Epoca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2024;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `equipa`
--
ALTER TABLE `equipa`
  ADD CONSTRAINT `equipa_ibfk_1` FOREIGN KEY (`Posicao`) REFERENCES `posição` (`Posição`),
  ADD CONSTRAINT `equipa_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `jogador` (`ID`);

--
-- Limitadores para a tabela `jogador`
--
ALTER TABLE `jogador`
  ADD CONSTRAINT `jogador_ibfk_1` FOREIGN KEY (`ID_Epoca`) REFERENCES `época` (`ID_Epoca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

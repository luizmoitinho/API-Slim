-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2020 at 03:40 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reserva_locais`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bloco`
--

CREATE TABLE `tb_bloco` (
  `id_bloco` int(11) NOT NULL,
  `nm_bloco` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_departamento`
--

CREATE TABLE `tb_departamento` (
  `id_departamento` int(11) NOT NULL,
  `nm_departamento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_departamento`
--

INSERT INTO `tb_departamento` (`id_departamento`, `nm_departamento`) VALUES
(1, 'DSI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_funcao`
--

CREATE TABLE `tb_funcao` (
  `id_funcao` int(11) NOT NULL,
  `nm_funcao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_funcao`
--

INSERT INTO `tb_funcao` (`id_funcao`, `nm_funcao`) VALUES
(1, 'Professor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_horarios_reserva`
--

CREATE TABLE `tb_horarios_reserva` (
  `id_horarios_reserva` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_horario_local` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_horario_local`
--

CREATE TABLE `tb_horario_local` (
  `id_horario_local` int(11) NOT NULL,
  `id_local` int(11) NOT NULL,
  `horario` varchar(5) NOT NULL,
  `horario_ativo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_local`
--

CREATE TABLE `tb_local` (
  `id_local` int(11) NOT NULL,
  `id_bloco` int(11) NOT NULL,
  `nm_local` varchar(50) NOT NULL,
  `desc_local` varchar(50) DEFAULT NULL,
  `img_local` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_reserva`
--

CREATE TABLE `tb_reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario_recusa` int(11) DEFAULT NULL,
  `id_usuario_solicitante` int(11) NOT NULL,
  `id_usuario_aprova` int(11) DEFAULT NULL,
  `id_local` int(11) NOT NULL,
  `dt_reserva` datetime NOT NULL,
  `status_ativado` char(1) NOT NULL,
  `nm_status` varchar(20) NOT NULL,
  `justificativa_admin` text,
  `dt_realizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_funcao` int(11) NOT NULL,
  `nm_usuario` varchar(60) NOT NULL,
  `tel_usuario` varchar(15) NOT NULL,
  `email_usuario` varchar(55) NOT NULL,
  `matricula_usuario` bigint(20) NOT NULL,
  `senha_usuario` varchar(35) NOT NULL,
  `nv_acesso` int(11) NOT NULL,
  `status_ativado` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `id_departamento`, `id_funcao`, `nm_usuario`, `tel_usuario`, `email_usuario`, `matricula_usuario`, `senha_usuario`, `nv_acesso`, `status_ativado`) VALUES
(3, 1, 1, 'Carlos Alberto Costa', '79969744547', 'carlosalberto@outlook.com', 369963, '0d3fc174a5321ee038bcfb603539a173', 3, 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bloco`
--
ALTER TABLE `tb_bloco`
  ADD PRIMARY KEY (`id_bloco`),
  ADD UNIQUE KEY `UN_NM_BLOCO` (`nm_bloco`);

--
-- Indexes for table `tb_departamento`
--
ALTER TABLE `tb_departamento`
  ADD PRIMARY KEY (`id_departamento`),
  ADD UNIQUE KEY `UN_NM_DEPARTAMENTO` (`nm_departamento`);

--
-- Indexes for table `tb_funcao`
--
ALTER TABLE `tb_funcao`
  ADD PRIMARY KEY (`id_funcao`),
  ADD UNIQUE KEY `UN_NM_FUNCAO` (`nm_funcao`);

--
-- Indexes for table `tb_horarios_reserva`
--
ALTER TABLE `tb_horarios_reserva`
  ADD PRIMARY KEY (`id_horarios_reserva`),
  ADD KEY `fk_horarios_reserva` (`id_reserva`),
  ADD KEY `fk_horario_local_reserva` (`id_horario_local`);

--
-- Indexes for table `tb_horario_local`
--
ALTER TABLE `tb_horario_local`
  ADD PRIMARY KEY (`id_horario_local`),
  ADD UNIQUE KEY `UQ_horario` (`horario`),
  ADD KEY `fk_horario_local` (`id_local`);

--
-- Indexes for table `tb_local`
--
ALTER TABLE `tb_local`
  ADD PRIMARY KEY (`id_local`),
  ADD UNIQUE KEY `UN_NM_LOCAL` (`nm_local`),
  ADD KEY `fk_local_bloco` (`id_bloco`);

--
-- Indexes for table `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_reserva_usuario_recusa` (`id_usuario_aprova`),
  ADD KEY `fk_reserva_usuario_solicitante` (`id_usuario_solicitante`),
  ADD KEY `fk_reserva_local` (`id_local`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `UN_NM_USUARIO` (`nm_usuario`),
  ADD UNIQUE KEY `UN_EMAIL_USUARIO` (`email_usuario`),
  ADD KEY `fk_usuario_departamento` (`id_departamento`),
  ADD KEY `fk_usuario_funcao` (`id_funcao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bloco`
--
ALTER TABLE `tb_bloco`
  MODIFY `id_bloco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_departamento`
--
ALTER TABLE `tb_departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_funcao`
--
ALTER TABLE `tb_funcao`
  MODIFY `id_funcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_horarios_reserva`
--
ALTER TABLE `tb_horarios_reserva`
  MODIFY `id_horarios_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_horario_local`
--
ALTER TABLE `tb_horario_local`
  MODIFY `id_horario_local` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_local`
--
ALTER TABLE `tb_local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_reserva`
--
ALTER TABLE `tb_reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_horarios_reserva`
--
ALTER TABLE `tb_horarios_reserva`
  ADD CONSTRAINT `fk_horario_local_reserva` FOREIGN KEY (`id_horario_local`) REFERENCES `tb_horario_local` (`id_horario_local`),
  ADD CONSTRAINT `fk_horarios_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `tb_reserva` (`id_reserva`);

--
-- Constraints for table `tb_horario_local`
--
ALTER TABLE `tb_horario_local`
  ADD CONSTRAINT `fk_horario_local` FOREIGN KEY (`id_local`) REFERENCES `tb_local` (`id_local`);

--
-- Constraints for table `tb_local`
--
ALTER TABLE `tb_local`
  ADD CONSTRAINT `fk_local_bloco` FOREIGN KEY (`id_bloco`) REFERENCES `tb_bloco` (`id_bloco`);

--
-- Constraints for table `tb_reserva`
--
ALTER TABLE `tb_reserva`
  ADD CONSTRAINT `fk_reserva_local` FOREIGN KEY (`id_local`) REFERENCES `tb_local` (`id_local`),
  ADD CONSTRAINT `fk_reserva_usuario_aprova` FOREIGN KEY (`id_usuario_aprova`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_reserva_usuario_recusa` FOREIGN KEY (`id_usuario_aprova`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_reserva_usuario_solicitante` FOREIGN KEY (`id_usuario_solicitante`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Constraints for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_usuario_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `tb_departamento` (`id_departamento`),
  ADD CONSTRAINT `fk_usuario_funcao` FOREIGN KEY (`id_funcao`) REFERENCES `tb_funcao` (`id_funcao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 04-Jun-2014 às 03:14
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `gu`
--
CREATE DATABASE IF NOT EXISTS `gu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gu`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lov_semestre`
--

CREATE TABLE IF NOT EXISTS `lov_semestre` (
  `id_semestre` int(11) NOT NULL,
  `nome` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_semestre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lov_semestre`
--

INSERT INTO `lov_semestre` (`id_semestre`, `nome`) VALUES
(1, '1° Semestre'),
(2, '2° Semestre'),
(3, '3° Semestre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lov_statuscurso`
--

CREATE TABLE IF NOT EXISTS `lov_statuscurso` (
  `id_status` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lov_statuspessoa`
--

CREATE TABLE IF NOT EXISTS `lov_statuspessoa` (
  `id_status` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lov_statuspessoa`
--

INSERT INTO `lov_statuspessoa` (`id_status`, `status`) VALUES
(1, 'Professor'),
(2, 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_aluno`
--

CREATE TABLE IF NOT EXISTS `tab_aluno` (
  `id_aluno` int(11) NOT NULL,
  `cod_pessoa` int(11) NOT NULL,
  `cod_curso` int(11) NOT NULL,
  `cod_semestre` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `cod_pessoa` (`cod_pessoa`),
  KEY `cod_curso` (`cod_curso`),
  KEY `cod_semestre` (`cod_semestre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_aluno`
--

INSERT INTO `tab_aluno` (`id_aluno`, `cod_pessoa`, `cod_curso`, `cod_semestre`) VALUES
(1, 4, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_curso`
--

CREATE TABLE IF NOT EXISTS `tab_curso` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_curso`
--

INSERT INTO `tab_curso` (`id_curso`, `nome_curso`) VALUES
(1, 'Redes de Computadores'),
(2, 'Sistemas de Informação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_grade`
--

CREATE TABLE IF NOT EXISTS `tab_grade` (
  `cod_materia` int(11) NOT NULL,
  `cod_semestre` int(11) NOT NULL,
  `cod_curso` int(11) NOT NULL,
  PRIMARY KEY (`cod_materia`,`cod_semestre`,`cod_curso`),
  KEY `cod_semestre` (`cod_semestre`),
  KEY `cod_curso` (`cod_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_materia`
--

CREATE TABLE IF NOT EXISTS `tab_materia` (
  `id_materia` int(11) NOT NULL,
  `nome_materia` varchar(60) NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_materia`
--

INSERT INTO `tab_materia` (`id_materia`, `nome_materia`) VALUES
(1, 'Matemática'),
(2, 'Informática e Sociedade'),
(3, 'Homem, Cultura e Sociedade'),
(4, 'Metodologia Científica'),
(5, 'Matemática Computacional'),
(6, 'Ética, Política e Sociedade'),
(7, 'Sistemas de Informação'),
(8, 'Geometria Analítica e Álgebra '),
(9, 'Cálculo 1'),
(10, 'Arquitetura de Computadores'),
(11, 'Fundamentos de Sistemas Operacionais'),
(12, 'Técnicas de Comunicação Oral e Escrita'),
(13, 'Fundamentos de Redes de Computadores'),
(14, 'Algorítimos e Programação de Computadores'),
(15, 'Infra-estrutura e Cabeamento Estruturado'),
(16, 'Metodologia e Introdução e Prática de Pesquisa'),
(17, 'Transmissão de Dados'),
(18, 'Segurança de Informações');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_materiacursando`
--

CREATE TABLE IF NOT EXISTS `tab_materiacursando` (
  `cod_aluno` int(11) NOT NULL,
  `cod_materia` int(11) NOT NULL,
  `cod_statusCurso` int(11) NOT NULL,
  PRIMARY KEY (`cod_aluno`,`cod_materia`,`cod_statusCurso`),
  KEY `cod_materia` (`cod_materia`),
  KEY `cod_statusCurso` (`cod_statusCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_pessoa`
--

CREATE TABLE IF NOT EXISTS `tab_pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `nome_pessoa` varchar(50) NOT NULL,
  `status_pessoa` int(11) DEFAULT NULL,
  `rg_pessoa` char(9) NOT NULL,
  `cpf_pessoa` char(14) NOT NULL,
  `num_telefone` char(13) NOT NULL,
  `dataCadastro_pessoa` datetime NOT NULL,
  `senha_pessoa` varchar(8) NOT NULL,
  `email_pessoa` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pessoa`),
  KEY `status_pessoa` (`status_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_pessoa`
--

INSERT INTO `tab_pessoa` (`id_pessoa`, `nome_pessoa`, `status_pessoa`, `rg_pessoa`, `cpf_pessoa`, `num_telefone`, `dataCadastro_pessoa`, `senha_pessoa`, `email_pessoa`) VALUES
(1, 'Professor1', 1, '222222-22', '123.123.213-12', '(31) 2312-312', '2014-05-26 20:48:37', '123456', '1@1'),
(2, 'Professor2', 1, '123131-23', '231.232.131-23', '(12) 3123-123', '2014-05-26 20:50:33', '123456', '2@2'),
(3, 'Professor3', 1, '123123-12', '123.123.123-12', '(12) 3123-131', '2014-05-26 20:52:29', '123456', '3@3'),
(4, 'asd', 2, '123123-12', '123.123.123-12', '(12) 3123-123', '2014-05-26 20:55:35', '123456', 'asd'),
(5, 'Professor4', 1, '242343-24', '242.343.243-24', '(24) 2342-342', '2014-05-27 01:41:08', '123456', 'nelson@nelson'),
(6, 'sadkashdaskj', 1, '131312-31', '324.234.234-23', '(34) 5345-345', '2014-06-03 23:14:41', '123456', 'asdas@sadsa.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_professor`
--

CREATE TABLE IF NOT EXISTS `tab_professor` (
  `cod_professor` int(11) NOT NULL,
  `cod_pessoa` int(11) NOT NULL,
  `cod_materia` int(11) NOT NULL,
  `cod_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_professor`
--

INSERT INTO `tab_professor` (`cod_professor`, `cod_pessoa`, `cod_materia`, `cod_horario`) VALUES
(1, 1, 1, 61),
(1, 1, 2, 61),
(2, 2, 3, 39),
(2, 2, 4, 39),
(3, 3, 6, 44),
(3, 3, 7, 44),
(4, 5, 5, 42),
(4, 5, 8, 42),
(5, 6, 9, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_professormateria`
--

CREATE TABLE IF NOT EXISTS `tab_professormateria` (
  `cod_professor` int(11) NOT NULL,
  `cod_materia` int(11) NOT NULL,
  PRIMARY KEY (`cod_professor`,`cod_materia`),
  KEY `cod_materia` (`cod_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tab_aluno`
--
ALTER TABLE `tab_aluno`
  ADD CONSTRAINT `tab_aluno_ibfk_1` FOREIGN KEY (`cod_pessoa`) REFERENCES `tab_pessoa` (`id_pessoa`),
  ADD CONSTRAINT `tab_aluno_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `tab_curso` (`id_curso`),
  ADD CONSTRAINT `tab_aluno_ibfk_3` FOREIGN KEY (`cod_semestre`) REFERENCES `lov_semestre` (`id_semestre`);

--
-- Limitadores para a tabela `tab_grade`
--
ALTER TABLE `tab_grade`
  ADD CONSTRAINT `tab_grade_ibfk_1` FOREIGN KEY (`cod_materia`) REFERENCES `tab_materia` (`id_materia`),
  ADD CONSTRAINT `tab_grade_ibfk_2` FOREIGN KEY (`cod_semestre`) REFERENCES `lov_semestre` (`id_semestre`),
  ADD CONSTRAINT `tab_grade_ibfk_3` FOREIGN KEY (`cod_curso`) REFERENCES `tab_curso` (`id_curso`);

--
-- Limitadores para a tabela `tab_materiacursando`
--
ALTER TABLE `tab_materiacursando`
  ADD CONSTRAINT `tab_materiacursando_ibfk_1` FOREIGN KEY (`cod_aluno`) REFERENCES `tab_aluno` (`id_aluno`),
  ADD CONSTRAINT `tab_materiacursando_ibfk_2` FOREIGN KEY (`cod_materia`) REFERENCES `tab_materia` (`id_materia`),
  ADD CONSTRAINT `tab_materiacursando_ibfk_3` FOREIGN KEY (`cod_statusCurso`) REFERENCES `lov_statuscurso` (`id_status`);

--
-- Limitadores para a tabela `tab_pessoa`
--
ALTER TABLE `tab_pessoa`
  ADD CONSTRAINT `tab_pessoa_ibfk_1` FOREIGN KEY (`status_pessoa`) REFERENCES `lov_statuspessoa` (`id_status`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

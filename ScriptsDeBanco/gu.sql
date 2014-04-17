-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 17-Abr-2014 às 05:36
-- Versão do servidor: 5.6.14
-- versão do PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `gu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lov_semestre`
--

CREATE TABLE IF NOT EXISTS `lov_semestre` (
  `id_semestre` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  PRIMARY KEY (`id_semestre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_curso`
--

CREATE TABLE IF NOT EXISTS `tab_curso` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nome_materia` varchar(30) NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `rg_pessoa` decimal(10,0) NOT NULL,
  `cpf_pessoa` char(11) NOT NULL,
  `num_telefone` char(13) NOT NULL,
  `dataCadastro_pessoa` date NOT NULL,
  PRIMARY KEY (`id_pessoa`),
  KEY `status_pessoa` (`status_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_professor`
--

CREATE TABLE IF NOT EXISTS `tab_professor` (
  `cod_professor` int(11) NOT NULL,
  `cod_pessoa` int(11) NOT NULL,
  `cod_curso` int(11) NOT NULL,
  PRIMARY KEY (`cod_professor`),
  KEY `cod_pessoa` (`cod_pessoa`),
  KEY `cod_curso` (`cod_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD CONSTRAINT `tab_aluno_ibfk_3` FOREIGN KEY (`cod_semestre`) REFERENCES `lov_semestre` (`id_semestre`),
  ADD CONSTRAINT `tab_aluno_ibfk_1` FOREIGN KEY (`cod_pessoa`) REFERENCES `tab_pessoa` (`id_pessoa`),
  ADD CONSTRAINT `tab_aluno_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `tab_curso` (`id_curso`);

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

--
-- Limitadores para a tabela `tab_professor`
--
ALTER TABLE `tab_professor`
  ADD CONSTRAINT `tab_professor_ibfk_1` FOREIGN KEY (`cod_pessoa`) REFERENCES `tab_pessoa` (`id_pessoa`),
  ADD CONSTRAINT `tab_professor_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `tab_curso` (`id_curso`);

--
-- Limitadores para a tabela `tab_professormateria`
--
ALTER TABLE `tab_professormateria`
  ADD CONSTRAINT `tab_professormateria_ibfk_1` FOREIGN KEY (`cod_professor`) REFERENCES `tab_professor` (`cod_professor`),
  ADD CONSTRAINT `tab_professormateria_ibfk_2` FOREIGN KEY (`cod_materia`) REFERENCES `tab_materia` (`id_materia`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/09/2024 às 02:08
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
-- Banco de dados: `bdCursos_Alunos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `intervencao_aluno_e_endereco`
--

CREATE TABLE `intervencao_aluno_e_endereco` (
  `tb_aluno_id_aluno` int(11) NOT NULL,
  `tb_end_id_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `intervencao_caduser_e_endereco`
--

CREATE TABLE `intervencao_caduser_e_endereco` (
  `tb_caduser_id_caduser` int(11) NOT NULL,
  `tb_end_id_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `intervencao_curso_e_aluno`
--

CREATE TABLE `intervencao_curso_e_aluno` (
  `tb_curso_id_curso` int(11) NOT NULL,
  `tb_aluno_id_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `intervencao_curso_e_caduser`
--

CREATE TABLE `intervencao_curso_e_caduser` (
  `tb_curso_id_curso` int(11) NOT NULL,
  `tb_caduser_id_caduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `id_aluno` int(11) NOT NULL,
  `aluno_nome` varchar(45) NOT NULL,
  `aluno_nascimento` date NOT NULL,
  `aluno_email` varchar(75) NOT NULL,
  `aluno_senha` varchar(220) NOT NULL,
  `aluno_cpf` varchar(14) NOT NULL,  -- Alterado para varchar e comprimento ajustado para formato com pontos e hífen
  `aluno_genero` varchar(20) NOT NULL,
  `aluno_telefone` varchar(20) DEFAULT NULL,  -- Alterado para varchar e comprimento ajustado para formato com parênteses e hífen
  `curso_status` varchar(45) NOT NULL,
  `foto_aluno` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`id_aluno`, `aluno_nome`, `aluno_nascimento`, `aluno_email`, `aluno_senha`, `aluno_cpf`, `aluno_genero`, `aluno_telefone`, `curso_status`, `foto_aluno`) VALUES
(2, 'Samara', '2007-08-02', 'samara@gmail.com', '$2y$10$ZC2eRu5tak25GVY1fcuVH.wofh84oMistHTOltNZCL0lOgndkGBDS', '123.456.789-01', 'F', '(85) 99259-0860', 'Em andamento', '../user/rapunzel.jpg'),
(4, 'Pedro Lucas', '2007-03-06', 'pedrowisk@hotmail.com', '$2y$10$wahkCLO4aIjbkJJVvoStb.Ai5S/EFVNyCi8T0SO5osZDyQcqKZJd6', '384.587.808-36', 'M', '(85) 99765-8433', 'Finalizado', '../user/toji.jpg'),
(5, 'Alecsander', '2007-02-08', 'aleckgogoboy@gmail.com', '$2y$10$ULm9q5a4Vpcs2PF2tNuEdeuS/UsyyCe4VbPP7aKks.IUWOi.5Rwru', '463.743.849-98', 'M', '(85) 99765-4866', 'Em andamento', NULL),
(7, 'Alice Martins', '2007-08-23', 'alice@gmail.com', '$2y$10$JcMvHuorV1D5J9lNHV7dD.NXtiobcGCyHQvudbn9CNnsQvSS4Qbf.', '556.497.548-12', 'F', '(85) 53483-2837', 'Finalizado', '../user/barbie.jpg'),
(8, 'Rermeson Felipe', '2007-11-05', 'rermesonfelipe@gmail.com', '$2y$10$oylzaGUiP7fS6hL7D/Vr0uKFsbot91d2iN6.7AUlDhaQi/jn48G/S', '464.948.372-11', 'M', NULL, 'Ativo', '../user/3e03bd8848a55e7c643f42a7233895f3.jpg'),
(9, 'Ermeson Ramos', '2007-05-18', 'ermeson18@gmail.com', '$2y$10$RCjMxDUJ1JbWbaE3v6qGhehGjdqDa7B7mB1cGbPBL13MEyvLPdHbu', '678.430.987-50', 'M', '(85) 89967-453', 'Finalizado', '../user/iaitso-kot-v-sapogakh-foto-19.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_caduser`
--

CREATE TABLE `tb_caduser` (
  `id_caduser` int(11) NOT NULL,
  `caduser_name` varchar(45) NOT NULL,
  `caduser_email` varchar(75) NOT NULL,
  `caduser_senha` varchar(75) NOT NULL,
  `caduser_nascimento` date NOT NULL,
  `caduser_telefone` varchar(20) DEFAULT NULL,  -- Alterado para varchar e comprimento ajustado
  `caduser_identi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_caduser`
--

INSERT INTO `tb_caduser` (`id_caduser`, `caduser_name`, `caduser_email`, `caduser_senha`, `caduser_nascimento`, `caduser_telefone`, `caduser_identi`) VALUES
(1, 'Hiago de Sousa Guerra', 'hiagodesousa123@gmail.com', '887722', '2007-06-26', '85 99240-4758', 'Diretor'),
(2, 'Jeferson', 'Jeferson@gmail.com', '$2y$10$DBJu4Dnw.Tz/7BFhEp8wFeqnKDyxbTat.jjcSNQngRZlNJtkhib9W', '2016-09-08', NULL, 'Professor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_curso`
--

CREATE TABLE `tb_curso` (
  `id_curso` int(11) NOT NULL,
  `curso_nome` varchar(45) NOT NULL,
  `curso_descricao` text NOT NULL,
  `curso_duracao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_curso`
--

INSERT INTO `tb_curso` (`id_curso`, `curso_nome`, `curso_descricao`, `curso_duracao`) VALUES
(1, 'Informática', 'Um curso que visa ensinar desde o básico ao avançado', 102);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_diretor`
--

CREATE TABLE `tb_diretor` (
  `id_diretor` int(11) NOT NULL,
  `nome_diretor` varchar(45) NOT NULL,
  `email_diretor` varchar(75) NOT NULL,
  `senha_diretor` varchar(220) NOT NULL,
  `nascimento_diretor` date NOT NULL,
  `cpf_diretor` varchar(14) NOT NULL,  -- Alterado para varchar e comprimento ajustado para formato com pontos e hífen
  `telefone_diretor` varchar(20) DEFAULT NULL,  -- Alterado para varchar e comprimento ajustado
  `foto_diretor` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_diretor`
--

INSERT INTO `tb_diretor` (`id_diretor`, `nome_diretor`, `email_diretor`, `senha_diretor`, `nascimento_diretor`, `cpf_diretor`, `telefone_diretor`, `foto_diretor`) VALUES
(1, 'Hiago de Sousa Guerra', 'hiagodesousa123@gmail.com', '887722', '2007-06-26', '006.213.213-54', '(85) 99240-4758', '../user/rapunzel.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `id_end` int(11) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cep` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_endereco`
--

INSERT INTO `tb_endereco` (`id_end`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `cep`) VALUES
(1, 'Rua São João', 138, 'Centro', 'Fortaleza', 'CE', '60000-000'),
(2, 'Rua José Avelino', 151, 'Meireles', 'Fortaleza', 'CE', '60000-001');

-- --------------------------------------------------------

--
-- Adicionando chave primária e auto-incremento
--

ALTER TABLE `tb_aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 10;

ALTER TABLE `tb_caduser`
  MODIFY `id_caduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 10;

ALTER TABLE `tb_diretor`
  MODIFY `id_diretor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 10;

--
-- Adicionando chaves estrangeiras
--

ALTER TABLE `intervencao_aluno_e_endereco`
  ADD CONSTRAINT `fk_aluno_endereco` FOREIGN KEY (`tb_aluno_id_aluno`) REFERENCES `tb_aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_endereco_aluno` FOREIGN KEY (`tb_end_id_end`) REFERENCES `tb_endereco` (`id_end`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `intervencao_caduser_e_endereco`
  ADD CONSTRAINT `fk_caduser_endereco` FOREIGN KEY (`tb_caduser_id_caduser`) REFERENCES `tb_caduser` (`id_caduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_endereco_caduser` FOREIGN KEY (`tb_end_id_end`) REFERENCES `tb_endereco` (`id_end`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `intervencao_curso_e_aluno`
  ADD CONSTRAINT `fk_curso_aluno` FOREIGN KEY (`tb_curso_id_curso`) REFERENCES `tb_curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aluno_curso` FOREIGN KEY (`tb_aluno_id_aluno`) REFERENCES `tb_aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `intervencao_curso_e_caduser`
  ADD CONSTRAINT `fk_curso_caduser` FOREIGN KEY (`tb_curso_id_curso`) REFERENCES `tb_curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_caduser_curso` FOREIGN KEY (`tb_caduser_id_caduser`) REFERENCES `tb_caduser` (`id_caduser`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;
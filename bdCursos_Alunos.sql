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
  `aluno_cpf` varchar(11) NOT NULL,
  `aluno_genero` varchar(20) NOT NULL,
  `aluno_telefone` varchar(45) DEFAULT NULL,
  `curso_status` varchar(45) NOT NULL,
  `foto_aluno` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`id_aluno`, `aluno_nome`, `aluno_nascimento`, `aluno_email`, `aluno_senha`, `aluno_cpf`, `aluno_genero`, `aluno_telefone`, `curso_status`, `foto_aluno`) VALUES
(2, 'Samara', '2007-08-02', 'samara@gmail.com', '$2y$10$ZC2eRu5tak25GVY1fcuVH.wofh84oMistHTOltNZCL0lOgndkGBDS', '1234567891', 'F', '(85) 992590860', 'Em andamento', '../user/rapunzel.jpg'),
(4, 'Pedro Lucas', '2007-03-06', 'pedrowisk@hotmail.com', '$2y$10$wahkCLO4aIjbkJJVvoStb.Ai5S/EFVNyCi8T0SO5osZDyQcqKZJd6', '38458780836', 'M', '(85)997658433', 'Finalizado', '../user/toji.jpg'),
(5, 'Alecsander', '2007-02-08', 'aleckgogoboy@gmail.com', '$2y$10$ULm9q5a4Vpcs2PF2tNuEdeuS/UsyyCe4VbPP7aKks.IUWOi.5Rwru', '4637438498', 'M', '(85)997654866', 'Em andamento', NULL),
(7, 'Alice Martins', '2007-08-23', 'alice@gmail.com', '$2y$10$JcMvHuorV1D5J9lNHV7dD.NXtiobcGCyHQvudbn9CNnsQvSS4Qbf.', '55649754812', 'F', '(85)534832837', 'Finalizado', '../user/barbie.jpg'),
(8, 'Rermeson Felipe', '2007-11-05', 'rermesonfelipe@gmail.com', '$2y$10$oylzaGUiP7fS6hL7D/Vr0uKFsbot91d2iN6.7AUlDhaQi/jn48G/S', '4649483721', 'M', NULL, 'Ativo', '../user/3e03bd8848a55e7c643f42a7233895f3.jpg'),
(9, 'Ermeson Ramos', '2007-05-18', 'ermeson18@gmail.com', '$2y$10$RCjMxDUJ1JbWbaE3v6qGhehGjdqDa7B7mB1cGbPBL13MEyvLPdHbu', '67843098750', 'M', '(85)89967453', 'Finalizado', '../user/iaitso-kot-v-sapogakh-foto-19.jpg');

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
  `caduser_telefone` varchar(45) DEFAULT NULL,
  `caduser_identi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_caduser`
--

INSERT INTO `tb_caduser` (`id_caduser`, `caduser_name`, `caduser_email`, `caduser_senha`, `caduser_nascimento`, `caduser_telefone`, `caduser_identi`) VALUES
(1, 'Hiago de Sousa Guerra', 'hiagodesousa123@gmail.com', '887722', '2007-06-26', '85992404758', 'Diretor'),
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
  `nome_diretor` varchar(220) NOT NULL,
  `cpf_diretor` int(11) NOT NULL,
  `senha_diretor` varchar(220) NOT NULL,
  `genero_diretor` varchar(40) NOT NULL,
  `email_diretor` varchar(220) NOT NULL,
  `telefone_diretor` int(30) DEFAULT NULL,
  `nasc_diretor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_diretor`
--

INSERT INTO `tb_diretor` (`id_diretor`, `nome_diretor`, `cpf_diretor`, `senha_diretor`, `genero_diretor`, `email_diretor`, `telefone_diretor`, `nasc_diretor`) VALUES
(2, 'Francisco Alessandro', 1234567891, '$2y$10$VINTmIRWdUxkn5rX/rSbfe5jdTmix9g9q3P4ntoFBICQe0OrVX5dS', 'M', 'alessandro@gmail.com', NULL, '2024-09-26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_end`
--

CREATE TABLE `tb_end` (
  `id_end` int(11) NOT NULL,
  `end_logradouro` varchar(75) NOT NULL,
  `end_numero` int(11) DEFAULT NULL,
  `end_complemento` varchar(40) DEFAULT NULL,
  `end_cidade` varchar(45) NOT NULL,
  `end_estado` varchar(2) NOT NULL,
  `end_bairro` varchar(45) NOT NULL,
  `end_cep` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_end`
--

INSERT INTO `tb_end` (`id_end`, `end_logradouro`, `end_numero`, `end_complemento`, `end_cidade`, `end_estado`, `end_bairro`, `end_cep`) VALUES
(1, 'Rua de Bragança', 7, 'casa', 'Chorozinho', 'CE', 'Triângulo', '62875000');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `intervencao_aluno_e_endereco`
--
ALTER TABLE `intervencao_aluno_e_endereco`
  ADD PRIMARY KEY (`tb_aluno_id_aluno`,`tb_end_id_end`),
  ADD KEY `fk_tb_aluno_has_tb_end_tb_end1_idx` (`tb_end_id_end`),
  ADD KEY `fk_tb_aluno_has_tb_end_tb_aluno1_idx` (`tb_aluno_id_aluno`);

--
-- Índices de tabela `intervencao_caduser_e_endereco`
--
ALTER TABLE `intervencao_caduser_e_endereco`
  ADD PRIMARY KEY (`tb_caduser_id_caduser`,`tb_end_id_end`),
  ADD KEY `fk_tb_caduser_has_tb_end_tb_end1_idx` (`tb_end_id_end`),
  ADD KEY `fk_tb_caduser_has_tb_end_tb_caduser_idx` (`tb_caduser_id_caduser`);

--
-- Índices de tabela `intervencao_curso_e_aluno`
--
ALTER TABLE `intervencao_curso_e_aluno`
  ADD PRIMARY KEY (`tb_curso_id_curso`,`tb_aluno_id_aluno`),
  ADD KEY `fk_tb_curso_has_tb_aluno_tb_aluno1_idx` (`tb_aluno_id_aluno`),
  ADD KEY `fk_tb_curso_has_tb_aluno_tb_curso1_idx` (`tb_curso_id_curso`);

--
-- Índices de tabela `intervencao_curso_e_caduser`
--
ALTER TABLE `intervencao_curso_e_caduser`
  ADD PRIMARY KEY (`tb_curso_id_curso`,`tb_caduser_id_caduser`),
  ADD KEY `fk_tb_curso_has_tb_caduser_tb_caduser1_idx` (`tb_caduser_id_caduser`),
  ADD KEY `fk_tb_curso_has_tb_caduser_tb_curso1_idx` (`tb_curso_id_curso`);

--
-- Índices de tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD UNIQUE KEY `id_aluno_UNIQUE` (`id_aluno`),
  ADD UNIQUE KEY `aluno_cpf_UNIQUE` (`aluno_cpf`),
  ADD UNIQUE KEY `aluno_email_UNIQUE` (`aluno_email`),
  ADD UNIQUE KEY `aluno_telefone_UNIQUE` (`aluno_telefone`);

--
-- Índices de tabela `tb_caduser`
--
ALTER TABLE `tb_caduser`
  ADD PRIMARY KEY (`id_caduser`),
  ADD UNIQUE KEY `caduser_email_UNIQUE` (`caduser_email`),
  ADD UNIQUE KEY `id_caduser_UNIQUE` (`id_caduser`),
  ADD UNIQUE KEY `caduser_telefone_UNIQUE` (`caduser_telefone`);

--
-- Índices de tabela `tb_curso`
--
ALTER TABLE `tb_curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD UNIQUE KEY `id_curso_UNIQUE` (`id_curso`);

--
-- Índices de tabela `tb_diretor`
--
ALTER TABLE `tb_diretor`
  ADD PRIMARY KEY (`id_diretor`);

--
-- Índices de tabela `tb_end`
--
ALTER TABLE `tb_end`
  ADD PRIMARY KEY (`id_end`),
  ADD UNIQUE KEY `id_end_UNIQUE` (`id_end`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_caduser`
--
ALTER TABLE `tb_caduser`
  MODIFY `id_caduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_curso`
--
ALTER TABLE `tb_curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_diretor`
--
ALTER TABLE `tb_diretor`
  MODIFY `id_diretor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_end`
--
ALTER TABLE `tb_end`
  MODIFY `id_end` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `intervencao_aluno_e_endereco`
--
ALTER TABLE `intervencao_aluno_e_endereco`
  ADD CONSTRAINT `fk_tb_aluno_has_tb_end_tb_aluno1` FOREIGN KEY (`tb_aluno_id_aluno`) REFERENCES `tb_aluno` (`id_aluno`),
  ADD CONSTRAINT `fk_tb_aluno_has_tb_end_tb_end1` FOREIGN KEY (`tb_end_id_end`) REFERENCES `tb_end` (`id_end`);

--
-- Restrições para tabelas `intervencao_caduser_e_endereco`
--
ALTER TABLE `intervencao_caduser_e_endereco`
  ADD CONSTRAINT `fk_tb_caduser_has_tb_end_tb_caduser` FOREIGN KEY (`tb_caduser_id_caduser`) REFERENCES `tb_caduser` (`id_caduser`),
  ADD CONSTRAINT `fk_tb_caduser_has_tb_end_tb_end1` FOREIGN KEY (`tb_end_id_end`) REFERENCES `tb_end` (`id_end`);

--
-- Restrições para tabelas `intervencao_curso_e_aluno`
--
ALTER TABLE `intervencao_curso_e_aluno`
  ADD CONSTRAINT `fk_tb_curso_has_tb_aluno_tb_aluno1` FOREIGN KEY (`tb_aluno_id_aluno`) REFERENCES `tb_aluno` (`id_aluno`),
  ADD CONSTRAINT `fk_tb_curso_has_tb_aluno_tb_curso1` FOREIGN KEY (`tb_curso_id_curso`) REFERENCES `tb_curso` (`id_curso`);

--
-- Restrições para tabelas `intervencao_curso_e_caduser`
--
ALTER TABLE `intervencao_curso_e_caduser`
  ADD CONSTRAINT `fk_tb_curso_has_tb_caduser_tb_caduser1` FOREIGN KEY (`tb_caduser_id_caduser`) REFERENCES `tb_caduser` (`id_caduser`),
  ADD CONSTRAINT `fk_tb_curso_has_tb_caduser_tb_curso1` FOREIGN KEY (`tb_curso_id_curso`) REFERENCES `tb_curso` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/09/2024 às 04:00
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdcursos_alunos`
--
CREATE DATABASE IF NOT EXISTS `bdcursos_alunos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdcursos_alunos`;

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
  `foto_aluno` varchar(220) DEFAULT NULL,
  `id_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`id_aluno`, `aluno_nome`, `aluno_nascimento`, `aluno_email`, `aluno_senha`, `aluno_cpf`, `aluno_genero`, `aluno_telefone`, `curso_status`, `foto_aluno`, `id_professor`) VALUES
(2, 'Samara', '2007-08-02', 'samara@gmail.com', '$2y$10$ZC2eRu5tak25GVY1fcuVH.wofh84oMistHTOltNZCL0lOgndkGBDS', '1234567891', 'F', '(85) 992590860', 'Em andamento', '../user/rapunzel.jpg', 2);

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
  `caduser_identi` varchar(45) NOT NULL,
  `foto_caduser` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_caduser`
--

INSERT INTO `tb_caduser` (`id_caduser`, `caduser_name`, `caduser_email`, `caduser_senha`, `caduser_nascimento`, `caduser_telefone`, `caduser_identi`, `foto_caduser`) VALUES
(1, 'Hiago de Sousa Guerra', 'hiagodesousa123@gmail.com', '887722', '2007-06-26', '85992404758', 'Diretor', ''),
(2, 'Jeferson', 'Jeferson@gmail.com', '$2y$10$DBJu4Dnw.Tz/7BFhEp8wFeqnKDyxbTat.jjcSNQngRZlNJtkhib9W', '2016-09-08', NULL, 'Professor', ''),
(3, 'Suelen Sales', 'suelen@gmail.com', '$2y$10$eqV6ww6ozkJ/2qmFQc0oiuahoYEFOdv.ygbdj6axTQjwHyjg2Q7G2', '0000-00-00', '(85) 993456722', '', ''),
(5, 'Ana da Silva', 'ana@gmail.com', '$2y$10$9OSiHnshhY1w15YX2YOBuewJhN8mimjVeVYzxDaKHjSat7hnaQc02', '0000-00-00', '(73) 39847-3943', '', ''),
(6, 'Jeferson@gmail.com', 'Sdokwdl;.wd', '$2y$10$SNOx6jWuEKVY2waOLWkv5uiu/RsxGt.pt8bHRubLKusQb0eh.iCxC', '0000-00-00', '(45) 5454', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_curso`
--

CREATE TABLE `tb_curso` (
  `id_curso` int(11) NOT NULL,
  `curso_nome` varchar(45) NOT NULL,
  `curso_descricao` text NOT NULL,
  `curso_duracao` int(11) NOT NULL,
  `area_conhecimento` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_curso`
--

INSERT INTO `tb_curso` (`id_curso`, `curso_nome`, `curso_descricao`, `curso_duracao`, `area_conhecimento`) VALUES
(1, 'Informática', 'Um curso que visa ensinar desde o básico ao avançado', 102, '');

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
(2, 'Francisco Alessandro', 1234567891, '$2y$10$VINTmIRWdUxkn5rX/rSbfe5jdTmix9g9q3P4ntoFBICQe0OrVX5dS', 'M', 'alessandro@gmail.com', NULL, '2024-09-26'),
(4, 'Thiago', 0, '$2y$10$d27bSxZcu5P0dyTblqztSOAyVGDi2XoUORxw5FSVqAFx6h5oJkQTW', '', 'Thiago@gmail.com', NULL, '0000-00-00');

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
  ADD UNIQUE KEY `aluno_telefone_UNIQUE` (`aluno_telefone`),
  ADD KEY `id_professor` (`id_professor`);

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
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_caduser`
--
ALTER TABLE `tb_caduser`
  MODIFY `id_caduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_curso`
--
ALTER TABLE `tb_curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_diretor`
--
ALTER TABLE `tb_diretor`
  MODIFY `id_diretor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
--
-- Banco de dados: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Despejando dados para a tabela `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"bdcursos_alunos\",\"table\":\"tb_aluno\"},{\"db\":\"bdcursos_alunos\",\"table\":\"tb_curso\"}]');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Despejando dados para a tabela `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-09-18 07:13:52', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"pt_BR\"}');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura para tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Índices de tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Índices de tabela `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Índices de tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Índices de tabela `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Índices de tabela `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Índices de tabela `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Índices de tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Índices de tabela `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Índices de tabela `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Índices de tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Índices de tabela `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Índices de tabela `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Índices de tabela `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Índices de tabela `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Índices de tabela `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Índices de tabela `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Índices de tabela `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Banco de dados: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

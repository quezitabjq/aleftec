-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Mar-2018 às 22:09
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aleftec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `controller` varchar(30) NOT NULL,
  `action` varchar(30) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `icon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `controller`, `action`, `created`, `modified`, `active`, `name`, `icon`) VALUES
(54, 'users', 'add', '2018-03-13', '2018-03-13', 1, 'Adicionar Usuário', NULL),
(55, 'users', 'edit', '2018-03-13', '2018-03-13', 1, 'Editar Usuários', NULL),
(56, 'welcome', 'index', '2018-03-13', '2018-03-13', 1, 'Home', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions_roles`
--

CREATE TABLE `permissions_roles` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissions_roles`
--

INSERT INTO `permissions_roles` (`role_id`, `permission_id`) VALUES
(6, 54),
(6, 55),
(6, 56),
(7, 54),
(7, 55),
(7, 56),
(9, 56);

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created` varchar(45) NOT NULL,
  `modified` varchar(45) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `created`, `modified`, `active`) VALUES
(6, 'Developer', '2018-03-09', '2018-03-09', 1),
(7, 'Administrador', '3/14/18, 12:39 PM', '3/14/18, 12:39 PM', 1),
(9, 'Telefonista', '3/14/18, 1:20 PM', '3/14/18, 1:20 PM', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `phone` varchar(16) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `dir` varchar(200) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` date NOT NULL,
  `modified` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `role_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `fullName`, `name`, `phone`, `photo`, `dir`, `email`, `password`, `created`, `modified`, `active`, `role_id`, `user_id`) VALUES
(5, 'QUEZIA JESUINO', 'Quézia', '6792625560', 'photo.jpg', 'webroot\\img\\Users\\photo\\5', 'queziajesuino@gmail.com', '$2y$10$3RNsxDyCriLBalY6/EtHy.PiJpk5GhDm6JkCMWcnjw9JG.iIKOVQK', '2018-03-13', '2018-03-15', 1, 6, NULL),
(6, 'teste', NULL, '56464654', NULL, NULL, 'quezitabjq@gmail.com', '$2y$10$s59yu1Cjw9l5T7N5qEkBLe2ElD6YWzCBcAMOSyuvcvGi5spHqdVPe', '2018-03-14', '2018-03-14', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions_roles`
--
ALTER TABLE `permissions_roles`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `fk_roles_has_permissions_permissions1_idx` (`permission_id`),
  ADD KEY `fk_roles_has_permissions_roles1_idx` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_roles_idx` (`role_id`),
  ADD KEY `fk_users_users1_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

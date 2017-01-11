-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2017 at 12:31 AM
-- Server version: 10.0.28-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cefi-stock`
--

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Administrador', '1', 1482554337);

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/admin/*', 2, NULL, NULL, NULL, 1482554204, 1482554204),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1482556504, 1482556504),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/default/*', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/default/index', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/menu/*', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/menu/create', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/menu/index', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/menu/update', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/menu/view', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/*', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/create', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/index', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/update', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/permission/view', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/role/*', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/role/assign', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/role/create', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/role/delete', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/role/index', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/role/remove', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/role/update', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/role/view', 2, NULL, NULL, NULL, 1482556511, 1482556511),
('/admin/route/*', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/route/assign', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/route/create', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/route/index', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/route/remove', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/rule/*', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/rule/create', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/rule/index', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/rule/update', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/rule/view', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/*', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/activate', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/change-password', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/delete', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/index', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/login', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/logout', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/reset-password', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/signup', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/admin/user/view', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/cuenta/*', 2, NULL, NULL, NULL, 1484089115, 1484089115),
('/cuenta/update', 2, NULL, NULL, NULL, 1484089115, 1484089115),
('/cuenta/view', 2, NULL, NULL, NULL, 1484089115, 1484089115),
('/debug/*', 2, NULL, NULL, NULL, 1482554217, 1482554217),
('/debug/default/*', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/debug/default/index', 2, NULL, NULL, NULL, 1482556512, 1482556512),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/debug/default/view', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/gii/*', 2, NULL, NULL, NULL, 1482554221, 1482554221),
('/gii/default/*', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/gii/default/action', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/gii/default/diff', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/gii/default/index', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/gii/default/preview', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/gii/default/view', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/producto/*', 2, NULL, NULL, NULL, 1482554228, 1482554228),
('/producto/create', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/producto/delete', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/producto/index', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/producto/nuevo', 2, NULL, NULL, NULL, 1482593635, 1482593635),
('/producto/update', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/producto/view', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/*', 2, NULL, NULL, NULL, 1482554237, 1482554237),
('/site/about', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/captcha', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/contact', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/error', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/index', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/iniciar-turno', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('/site/logout', 2, NULL, NULL, NULL, 1482556513, 1482556513),
('Administrador', 1, 'Acceso total al sistema', NULL, NULL, 1482554275, 1482559153),
('Guest', 1, 'Un usuario que aún no se ha logueado, permisos mínimos.', NULL, NULL, 1482558084, 1482558084);

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Administrador', '/admin/*'),
('Administrador', '/cuenta/*'),
('Administrador', '/cuenta/update'),
('Administrador', '/cuenta/view'),
('Administrador', '/debug/*'),
('Administrador', '/gii/*'),
('Administrador', '/producto/*'),
('Administrador', '/site/about'),
('Administrador', '/site/captcha'),
('Administrador', '/site/contact'),
('Administrador', '/site/error'),
('Administrador', '/site/index'),
('Administrador', '/site/logout'),
('Guest', '/site/about'),
('Guest', '/site/captcha'),
('Guest', '/site/contact'),
('Guest', '/site/error'),
('Guest', '/site/index'),
('Guest', '/site/iniciar-turno');

--
-- Dumping data for table `caja`
--

INSERT INTO `caja` (`ID`, `Monto`, `FechaUltMovimiento`) VALUES
(1, '19400.0200', '2017-01-11 00:16:40');

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`ID`, `Descripcion`, `PrecioVenta`, `FechaUltModificacion`, `CodigoBarra`) VALUES
(1, 'Alfajor Fantoche', '15.0000', '2016-12-24 08:32:19', ''),
(2, 'Cereal Mix Chocolate', '20.0000', '2016-12-24 13:07:27', '');

--
-- Dumping data for table `turno`
--

INSERT INTO `turno` (`ID`, `HoraInicial`, `HoraFinal`, `UsuarioID`) VALUES
(1, '2016-12-18 19:29:27', NULL, 1),
(2, '2016-12-18 19:32:08', NULL, 1),
(3, '2016-12-18 19:33:38', NULL, 1),
(4, '2016-12-18 19:34:09', NULL, 1),
(5, '2016-12-18 19:39:16', NULL, 1),
(6, '2016-12-18 19:44:23', NULL, 1),
(7, '2016-12-18 19:44:36', NULL, 1),
(8, '2016-12-18 19:46:01', NULL, 1),
(9, '2016-12-18 19:47:16', NULL, 1),
(10, '2016-12-18 22:08:53', NULL, 1),
(11, '2016-12-23 22:36:08', NULL, 1),
(12, '2016-12-24 02:42:54', NULL, 1),
(13, '2016-12-24 02:48:57', NULL, 1),
(14, '2016-12-24 02:53:30', NULL, 1),
(15, '2016-12-24 02:58:10', NULL, 1),
(16, '2016-12-24 07:51:50', NULL, 1),
(17, '2016-12-24 13:09:13', NULL, 1);

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`ID`, `NombreUsuario`, `Password`, `AuthKey`) VALUES
(1, 'admin', '$2y$13$i43hG0tcy9h989BL3RTnIuZlSXezBJmijB8dmaPZU0Pfp684VSM06', '7T4TiZZGyDVfQmNkkqK-QtvwvivmeSsP');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

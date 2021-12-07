-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2021 at 07:43 PM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zimalab_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CompanyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `FirstName`, `LastName`, `Email`, `CompanyName`, `Position`, `Phone`) VALUES
(8, 'Рогов', 'Вениамин', 'rogov.veniamin@gmail.com', 'Zimalab', 'Junior backend web developer', '89133732738'),
(10, 'Пукин', 'Иван', 'pupkin.ivan@gmail.com', 'Zimalab', 'Middle backend web developer', '23405023470'),
(11, 'firstName1', 'lastName1', 'email1@email.ru', '', '', ''),
(12, 'firstName2', 'lastName2', 'email2@email.ru', '', '', ''),
(13, 'firstName3', 'lastName3', 'email3@email.ru', '', '', ''),
(14, 'firstName4', 'lastName4', 'email4@email.ru', '', '', ''),
(15, 'firstName5', 'lastName5', 'email5@email.ru', '', '', ''),
(16, 'firstName6', 'lastName6', 'email6@email.ru', '', '', ''),
(17, 'firstName7', 'lastName7', 'email7@email.ru', '', '', ''),
(18, 'firstName8', 'lastName8', 'email8@email.ru', '', '', ''),
(19, 'firstName9', 'lastName9', 'email9@email.ru', '', '', ''),
(20, 'firstName10', 'lastName10', 'email10@email.ru', '', '', ''),
(21, 'firstName11', 'lastName11', 'email11@email.ru', '', '', ''),
(22, 'firstName12', 'lastName12', 'email12@email.ru', '', '', ''),
(23, 'firstName13', 'lastName13', 'email13@email.ru', '', '', ''),
(24, 'firstName14', 'lastName14', 'email14@email.ru', '', '', ''),
(25, 'firstName15', 'lastName15', 'email15@email.ru', '', '', ''),
(26, 'firstName16', 'lastName16', 'email16@email.ru', '', '', ''),
(27, 'firstName17', 'lastName17', 'email17@email.ru', '', '', ''),
(28, 'FirstName18', 'LastName18', 'email18@mail.ru', '', '', ''),
(30, 'FirstName19', 'LastName19', 'email19@mail.ru', '', '', ''),
(32, 'Marat', 'Burnaev', 'mrbr@mail.ru', 'Burger King', 'food tester', '895412323452');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

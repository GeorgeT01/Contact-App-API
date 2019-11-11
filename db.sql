-- phpMyAdmin SQL Dump
-- version 4.8.3
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2019 at 08:21 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbName`
--

-- --------------------------------------------------------

--
-- Table structure for table `Contacts`
--

CREATE TABLE `Contacts` (
  `ContactId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ContactImage` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ContactName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ContactEmail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ContactPhone` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ContactDateBirth` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ContactGender` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ContactNote` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Contacts`
--

INSERT INTO `Contacts` (`ContactId`, `UserId`, `ContactImage`, `ContactName`, `ContactEmail`, `ContactPhone`, `ContactDateBirth`, `ContactGender`, `ContactNote`) VALUES
(28, 21, 'https://test.baity.com.br/contact/contact_images/user.webp', 'Name', 'email@email.com', '+375 33 647-43-54', '13.11.1987', 'Male', 'Notes'),
(29, 21, 'https://test.baity.com.br/contact/contact_images/1573415654_8866.webp', 'Name', 'email@email.com', '+375 33 647-43-54', '10.11.1985', 'Female', ''),
(30, 21, 'https://test.baity.com.br/contact/contact_images/1573415688_2158.webp', 'Name2', 'email@email.com', '+375 33 647-43-54', '07.04.1981', 'Male', ''),
(31, 21, 'https://test.baity.com.br/contact/contact_images/1573415730_3695.webp', 'Name3', 'email@email.com', '+375 33 647-43-54', '10.11.1992', 'Male', ''),
(32, 21, 'https://test.baity.com.br/contact/contact_images/1573415765_9214.webp', 'Name4', 'email@email.com', '+375 33 647-43-54', '11.07.1950', 'Male', ''),
(33, 21, 'https://test.baity.com.br/contact/contact_images/user.webp', 'Inna Igorevna', 'inna16051988@gmail.com', '+375 33 647-43-54', '11.11.1985', 'Female', '');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserId` int(11) NOT NULL,
  `UserEmail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `UserPassword` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserId`, `UserEmail`, `UserPassword`) VALUES
(21, 'email@email.com', '$2y$10$LGU27UF/a0D3hCj1.YXOHuODRfiI5rL0ZfU2yTCtIN79LMdLF13Va');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Contacts`
--
ALTER TABLE `Contacts`
  ADD PRIMARY KEY (`ContactId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Contacts`
--
ALTER TABLE `Contacts`
  MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Contacts`
--
ALTER TABLE `Contacts`
  ADD CONSTRAINT `Contacts_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `Users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

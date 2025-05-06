-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 12:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solar_energy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `Admin_name` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Admin_name`, `Password`, `Email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com'),
(2, '11111', '$2y$10$evLEirsnD09c0U7CCUYGiOFfZ3U7xhrA7q5.mC9GCSiMbRcYBDFK6', 'k@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `advisingrequest`
--

CREATE TABLE `advisingrequest` (
  `RequestID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `EnergyConsumption` float NOT NULL,
  `Location` varchar(255) NOT NULL,
  `RoofInstallationParameters` text DEFAULT NULL,
  `ProposalText` text DEFAULT NULL,
  `SystemDesignParameters` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educationalresource`
--

CREATE TABLE `educationalresource` (
  `ResourceID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MessageID` int(11) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `messagetext` varchar(1000) NOT NULL,
  `Date` datetime NOT NULL,
  `Reply` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MessageID`, `SenderID`, `AdminID`, `messagetext`, `Date`, `Reply`) VALUES
(1, 1, NULL, 'Hello this is a test message!', '2025-04-29 10:22:45', NULL),
(2, 2, NULL, 'test', '2025-04-29 11:41:30', NULL),
(3, 2, NULL, 'test', '2025-04-29 11:42:03', NULL),
(4, 2, NULL, 'test 2', '2025-04-29 11:42:52', NULL),
(5, 2, NULL, 'test 2', '2025-04-29 11:43:01', NULL),
(6, 2, NULL, 'test 3', '2025-04-29 11:44:32', NULL),
(7, 2, NULL, 'ddddd', '2025-04-29 11:45:42', NULL),
(8, 2, NULL, 'ddddd dkhluhvug', '2025-04-29 11:47:38', NULL),
(9, 2, NULL, 'hiiii help', '2025-04-29 13:52:36', NULL),
(10, 2, NULL, 'hiii', '2025-04-30 10:54:04', NULL),
(11, 2, NULL, 'tttttttt', '2025-04-30 22:23:36', NULL),
(12, 2, NULL, 'hi mhmd', '2025-05-03 22:58:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `NewsID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Body` text NOT NULL,
  `AdminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `OrderStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Product_name` varchar(255) NOT NULL,
  `Product_status` varchar(50) NOT NULL,
  `Product_desc` text DEFAULT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `Category_id` int(11) NOT NULL,
  `Category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ReviewText` text NOT NULL,
  `ReviewDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `F_Name` varchar(255) NOT NULL,
  `L_Name` varchar(255) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `ResetToken` varchar(255) DEFAULT NULL,
  `ResetTokenExpires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `F_Name`, `L_Name`, `Username`, `Password`, `Email`, `Address`, `City`, `State`, `Country`, `ResetToken`, `ResetTokenExpires`) VALUES
(1, 'Mirna', 'Chamaa', 'mirna123', '123456', 'mirna123@gmail.com', 'Majdal Balhees', 'West Bekaa', 'Rachaya', 'Lebanon', NULL, NULL),
(2, 'maamoun', 'khaled', '', '$2y$10$K6Sz9MR4UT5MfBFzoTuvt.IlfEJfzyfH3fNmtjBiqn/d9dTpwu0c2', 'khaledsamia696@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '‪maamoun', 'khaled‬‏', '34343434', '$2y$10$KxOlDlAXdTCXJLd/Ped3OOz30UM8ZOoAOPyxo4oFimIOwmw7vHxZS', 'khaledsamia@gmail.com', 'قرب سوق الأحد', 'البقاع', 'zahle', 'Lebanon', NULL, NULL),
(4, '‪maamoun', 'khaled‬‏', '221307614444', '$2y$10$ETjFq8282cEyNau97A/fdONA9Q.c7vDsUMCHcGomdPibBV4t.zMAa', 'khaledsamia6944446@gmail.com', 'قرب سوق الأحد', 'البقاع', 'zahle', 'Lebanon', NULL, NULL),
(5, '‪maamoun', 'khaled‬‏', '22130761299', '$2y$10$3BYecOQO6b5I22hL4jnKtuEt8z7C3p6S800FIxtFe8IN4L7yP147O', 'khaledsamia696666@gmail.com', 'قرب سوق الأحد', 'البقاع', 'zahleyy', 'Lebanon', NULL, NULL),
(6, '‪maamoun', 'khaled‬‏', '1', '$2y$10$wiD9CPrMngZhIbEOi2oKT.Z.L/uv1bnQhNHhln.Yi7soV6fUa3dw6', 'k@gmail.com', 'قرب سوق الأحد', 'البقاع', 'zahle', 'Lebanon', NULL, NULL),
(7, 'm', 'k', 'h@gmail.com', '$2y$10$0ri2VkxkKDlXjOfoAbqSeOdW/L8vWI02Flwzi9RhDpEM6h727fbD.', 'h@gmail.com', 'قرب سوق الأحد', 'البقاع', 'zahle', 'Lebanon', NULL, NULL),
(8, '‪maamoun', 'khaled‬‏', 'Moon123moon@', '$2y$10$1Pp3WVzmVkaRlFDH92DTPuaRfOlDKs2B4bCfWk3E5KIM69tIHrjGG', 'Moon123moon@gmail.com', 'قرب سوق الأحد', 'البقاع', 'zahle', 'Lebanon', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Admin_name` (`Admin_name`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `advisingrequest`
--
ALTER TABLE `advisingrequest`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `educationalresource`
--
ALTER TABLE `educationalresource`
  ADD PRIMARY KEY (`ResourceID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `SenderID` (`SenderID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`NewsID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `Category_id` (`Category_id`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`Category_id`),
  ADD UNIQUE KEY `Category_name` (`Category_name`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advisingrequest`
--
ALTER TABLE `advisingrequest`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educationalresource`
--
ALTER TABLE `educationalresource`
  MODIFY `ResourceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `NewsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisingrequest`
--
ALTER TABLE `advisingrequest`
  ADD CONSTRAINT `AdvisingRequest_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `AdvisingRequest_ibfk_2` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `educationalresource`
--
ALTER TABLE `educationalresource`
  ADD CONSTRAINT `EducationalResource_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`) ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `Message_ibfk_1` FOREIGN KEY (`SenderID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Message_ibfk_2` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `News_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`) ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `Order_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `Order_Product_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Order_Product_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Product_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `productcategory` (`Category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Review_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

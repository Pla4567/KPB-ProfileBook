-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2026 at 08:32 AM
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
-- Database: `kpbprofilebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `finfor`
--

CREATE TABLE `finfor` (
  `idfinfor` int(10) NOT NULL COMMENT 'ลำดับแฟ้มข้อมูล',
  `filenumber` varchar(50) NOT NULL COMMENT 'เลขแฟ้มข้อมูล',
  `filename` varchar(50) NOT NULL COMMENT 'ชื่อแฟ้มข้อมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finfor`
--

INSERT INTO `finfor` (`idfinfor`, `filenumber`, `filename`) VALUES
(1, '123456789', ''),
(2, '12345678901', ''),
(3, '123456', ''),
(4, '12345678', ''),
(5, '1234560', ''),
(6, '1234561', '');

-- --------------------------------------------------------

--
-- Table structure for table `loginfrom`
--

CREATE TABLE `loginfrom` (
  `idlogin` int(10) NOT NULL COMMENT 'ลำดับผู้เข้าระบบโดย Superadmin and admin มีสิทธิ์เพิ่มได้',
  `idcard` varchar(50) DEFAULT NULL COMMENT 'รหัสบัตรประชาชน',
  `idnumber` varchar(50) DEFAULT NULL COMMENT 'รหัส 10 หลัก',
  `pfname` varchar(50) NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `firstname` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `midname` varchar(50) DEFAULT NULL COMMENT 'ชื่อกลาง',
  `lastname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `birthday` date DEFAULT NULL COMMENT 'วันเดือนปีเกิด',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '''0=ไม่ทราบ, 1=ชาย, 2=หญิง''',
  `currentstatus` enum('0','1','2','3') NOT NULL DEFAULT '1' COMMENT '"0=เสียชีวิต, 1=มีชีวิต, 2=เกษียณ, 3=ไม่พบข้อมูลในกรมบัญชีกลาง"',
  `daytype` date DEFAULT NULL COMMENT 'วันเสียชีวิต และ วันเกษียณ',
  `note` varchar(50) DEFAULT NULL COMMENT 'หมายเหตุ',
  `filenumber` varchar(50) DEFAULT NULL COMMENT 'เลขแฟ้มข้อมูล',
  `status` enum('user','admin','superuser','superadmin') NOT NULL DEFAULT 'user' COMMENT 'สถานะผู้ใช้งานระบบ',
  `numlogin` varchar(50) NOT NULL DEFAULT 'Sc123456' COMMENT 'รหัสเข้าระบบ Sc123456 จะกำหนดแบบนี้ให้กับทุกคนโดยทุกคนสามารถเปลี่ยนได้',
  `year` year(4) NOT NULL COMMENT 'ปีสมุดประวัติ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginfrom`
--

INSERT INTO `loginfrom` (`idlogin`, `idcard`, `idnumber`, `pfname`, `firstname`, `midname`, `lastname`, `birthday`, `sex`, `currentstatus`, `daytype`, `note`, `filenumber`, `status`, `numlogin`, `year`) VALUES
(5, '1212121212121', '1234567891', 'สิบตรี', 'ทดสอบ', 'ทดสอบไง', 'ทดสอบก่อนไง', '2016-01-01', '1', '1', '2026-10-01', NULL, '123456', 'user', 'Sc123456', '2026'),
(6, '1234567891123', NULL, 'สิบโทหญิง', 'ทดสอบ', '', 'ระบบก่อน', '2017-01-11', '2', '1', NULL, NULL, '12345678901', 'admin', 'Sc123456', '1990'),
(10, NULL, '1234567892', 'ร้อยตรี', 'สุขสมหวัง', 'มายังไง', 'มากนะ', '2019-01-17', '1', '1', NULL, NULL, NULL, 'superuser', 'Sc123456', '1990'),
(11, '1234567891254', '1234567890', 'ร้อยตรีหญิง', 'ไม่มีหวัง', NULL, 'ที่สุดเลย', '2016-01-29', '2', '1', NULL, NULL, '12345678', 'superadmin', 'Sc123456', '1985'),
(12, NULL, NULL, 'ร้อยเอก', 'ทดสอบนะ', NULL, 'ไม่ว่าจะอย่างไง', '2018-11-23', '1', '1', NULL, NULL, NULL, 'superuser', 'Sc123456', '1985'),
(13, NULL, NULL, 'สิบเอกหญิง', 'บางบาง', NULL, 'ไปด่วน', '1995-01-27', '2', '1', NULL, NULL, NULL, 'user', 'Sc123456', '1980');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `finfor`
--
ALTER TABLE `finfor`
  ADD PRIMARY KEY (`idfinfor`),
  ADD UNIQUE KEY `filenumber` (`filenumber`);

--
-- Indexes for table `loginfrom`
--
ALTER TABLE `loginfrom`
  ADD PRIMARY KEY (`idlogin`),
  ADD UNIQUE KEY `filenumber` (`filenumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `finfor`
--
ALTER TABLE `finfor`
  MODIFY `idfinfor` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับแฟ้มข้อมูล', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loginfrom`
--
ALTER TABLE `loginfrom`
  MODIFY `idlogin` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับผู้เข้าระบบโดย Superadmin and admin มีสิทธิ์เพิ่มได้', AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loginfrom`
--
ALTER TABLE `loginfrom`
  ADD CONSTRAINT `filenumber_finfor` FOREIGN KEY (`filenumber`) REFERENCES `finfor` (`filenumber`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

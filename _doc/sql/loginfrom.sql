-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2026 at 05:03 AM
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
-- Table structure for table `loginfrom`
--

CREATE TABLE `loginfrom` (
  `idlogin` int(10) NOT NULL COMMENT 'ลำดับผู้เข้าระบบโดย Superadmin and admin มีสิทธิ์เพิ่มได้',
  `idcard` varchar(50) DEFAULT NULL COMMENT 'รหัสบัตรประชาชน',
  `idnumber` varchar(50) DEFAULT NULL COMMENT 'รหัส 10 หลัก',
  `pfname` varchar(50) NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `firstname` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `midname` varchar(50) NOT NULL COMMENT 'ชื่อกลาง',
  `lastname` varchar(50) NOT NULL COMMENT 'นามสกุล',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '''0=ไม่ทราบ, 1=ชาย, 2=หญิง''',
  `currentstatus` enum('0','1','2','3') NOT NULL DEFAULT '1' COMMENT '"0=เสียชีวิต, 1=มีชีวิต, 2=เกษียณ, 3=ไม่พบข้อมูลในกรมบัญชีกลาง"',
  `note` varchar(50) NOT NULL COMMENT 'หมายเหตุ',
  `status` enum('user','admin','superuser','superadmin') NOT NULL DEFAULT 'user' COMMENT 'สถานะผู้ใช้งานระบบ',
  `numlogin` varchar(50) NOT NULL DEFAULT '12345' COMMENT 'รหัสเข้าระบบ 12345 จะกำหนดแบบนี้ให้กับทุกคนโดยทุกคนสามารถเปลี่ยนได้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginfrom`
--

INSERT INTO `loginfrom` (`idlogin`, `idcard`, `idnumber`, `pfname`, `firstname`, `midname`, `lastname`, `sex`, `currentstatus`, `note`, `status`, `numlogin`) VALUES
(1, '1212121212121', '1234567890', 'สิบตรี', 'ทดสอบ', '', 'ทดสอบ', '1', '1', '', 'superadmin', '12345'),
(2, NULL, '1234567891', 'สิบโทหญิง', 'ลองทดสอบ', '', 'ทดสอบ', '2', '1', '', 'user', '12345'),
(3, '1234567890234', '1234567892', 'ร้อยตรี', 'ก็บอกว่าทดสอบ', '', 'สอบนะนะ', '1', '1', '', 'admin', '12345'),
(4, '1234567890345', NULL, 'ร้อยเอกหญิง', 'ทดสอบนะ', '', 'ลองทดสอบ', '2', '1', '', 'superuser', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginfrom`
--
ALTER TABLE `loginfrom`
  ADD PRIMARY KEY (`idlogin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginfrom`
--
ALTER TABLE `loginfrom`
  MODIFY `idlogin` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับผู้เข้าระบบโดย Superadmin and admin มีสิทธิ์เพิ่มได้', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

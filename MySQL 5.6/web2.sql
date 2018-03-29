-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2016 at 06:35 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4 ;

--
-- Database: `web2`
--
CREATE DATABASE IF NOT EXISTS `web2` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `web2`;

-- --------------------------------------------------------

--
-- Table structure for table `giang_vien`
--

DROP TABLE IF EXISTS `giang_vien`;
CREATE TABLE `giang_vien` (
  `MaGV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Ho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoDT` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `giang_vien`
--

TRUNCATE TABLE `giang_vien`;
--
-- Dumping data for table `giang_vien`
--

INSERT INTO `giang_vien` (`MaGV`, `Ho`, `Ten`, `SoDT`, `DiaChi`) VALUES
('1', N'Nguyễn', N'Hoà', '02341232', N'1 3/2'),
('2', N'Nguyễn Minh', N'Thi', '0987654321', N'3 Trường Sa'),
('3', N'Huỳnh Nhựt', N'Đông', '0975318642', N'3 Hoàng Sa'),
('4', N'Nguyễn Đăng', N'Quan', '024683579', N'4 Lò Gốm'),
('5', N'Tô Hoài', N'Việt', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

DROP TABLE IF EXISTS `lop`;
CREATE TABLE `lop` (
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaGV` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `lop`
--

TRUNCATE TABLE `lop`;
--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MaLop`, `MaGV`) VALUES
('DCT1145', NULL),
('DCT1146', NULL),
('DCT1141', '1'),
('DCT1142', '2'),
('DCT1143', '3'),
('DCT1144', '4');

-- --------------------------------------------------------

--
-- Table structure for table `sinh_vien`
--

DROP TABLE IF EXISTS `sinh_vien`;
CREATE TABLE `sinh_vien` (
  `MaSV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Ho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `QueQuan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `sinh_vien`
--

TRUNCATE TABLE `sinh_vien`;
--
-- Dumping data for table `sinh_vien`
--

INSERT INTO `sinh_vien` (`MaSV`, `MaLop`, `Ho`, `Ten`, `SoDT`, `QueQuan`) VALUES
('3114410001', 'DCT1141', 'Nguyễn', 'An', '0123', 'TPHCM'),
('3114410002', 'DCT1142', 'Đào Quốc', 'Anh', '0456', 'TPHCM'),
('3114410003', 'DCT1143', 'Nguyễn Thái Duy', 'Anh', '0789', 'TPHCM'),
('3114410005', 'DCT1144', 'Quách Trần Hoàng', 'Anh', '0246', 'TPHCM'),
('3114410006', 'DCT1141', 'Lê Đặng Hoàng', 'Ân', '0680', 'TPHCM'),
('3114410007', 'DCT1142', 'Lâm Thanh', 'Bào', '0135', 'TPHCM'),
('3114410008', 'DCT1143', 'Lê Văn', 'Bào', '0579', 'Thanh Hoá'),
('3114410009', 'DCT1144', 'Phạm Vũ Huy', 'Bảo', '0258', 'TPHCM');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

DROP TABLE IF EXISTS `tai_khoan`;
CREATE TABLE `tai_khoan` (
  `TenDangNhap` varchar(20) CHARACTER SET armscii8 NOT NULL,
  `MatKhau` varchar(20) CHARACTER SET armscii8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tai_khoan`
--

TRUNCATE TABLE `tai_khoan`;
--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`TenDangNhap`, `MatKhau`) VALUES
('admin', '123456'),
('triet', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giang_vien`
--
ALTER TABLE `giang_vien`
  ADD PRIMARY KEY (`MaGV`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaLop`),
  ADD KEY `MaGV` (`MaGV`);

--
-- Indexes for table `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD PRIMARY KEY (`MaSV`),
  ADD KEY `MaLop` (`MaLop`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`TenDangNhap`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`MaGV`) REFERENCES `giang_vien` (`MaGV`);

--
-- Constraints for table `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD CONSTRAINT `sinh_vien_ibfk_1` FOREIGN KEY (`MaLop`) REFERENCES `lop` (`MaLop`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

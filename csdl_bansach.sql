-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 06:12 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csdl_bansach`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_bl` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_gio` datetime NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dien_thoai` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id_bl`, `id_sp`, `ho_ten`, `ngay_gio`, `noi_dung`, `dien_thoai`) VALUES
(1, 1, 'Phát LP', '2020-02-21 06:14:17', 'Dell xin xò', '09637851069'),
(2, 2, 'Phát đẹp trai', '2020-02-22 05:12:12', 'Máy tính Xịn', '0963785109');

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_hd`
--

CREATE TABLE `chitiet_hd` (
  `id_hd` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `hoten_kh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_nhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitiet_hd`
--



-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_sp`
--

CREATE TABLE `danhmuc_sp` (
  `id_dm` int(11) NOT NULL,
  `ten_dm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmuc_sp`
--

INSERT INTO `danhmuc_sp` (`id_dm`, `ten_dm`) VALUES
(1, 'Truyện tranh'),
(2, 'Tiểu thuyết ngôn tình'),
(3, 'Tiểu thuyết trinh thám'),
(4, 'Sách văn học'),
(5, 'Sách thiếu nhi'),
(6, 'Sách nấu ăn'),
(7,'Sách khoa học'),
(8,'Thể loại khác');


-- --------------------------------------------------------

--
-- Table structure for table `don_dh`
--

CREATE TABLE `don_dh` (
  `id_hd` int(11) NOT NULL,
  `id_nd` int(11) NOT NULL,
  `id_nvgh` int(11) NOT NULL,
  `ngay_lap` datetime NOT NULL,
  `tong_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_dh`
--



-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_giohang` int(11) NOT NULL,
  `id_nd` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id_nd` int(11) NOT NULL,
  `tai_khoan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id_nd`, `tai_khoan`, `mat_khau`, `sdt`, `email`, `dia_chi`) VALUES
(1, 'admin', 'admin', '0963785109', 'lytanphat19091999@gmail.com', '82, Rùa Hạ, Thanh Thùy, Thanh Oai, Hà Nội'),
(2, 'lytanphat', '123', '0584744125', 'lytanphat@gmail.com', 'Việt Namm'),
(3, 'phat99', '123', '0123456789', 'phatdz99@gmail.com', 'Hà Nội,Việt Nam'),
(4, 'anhphat', '123456', '0912467852', 'anhphatcool@gmail.com', 'Hà Nội Việt Nam');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien_gh`
--

CREATE TABLE `nhanvien_gh` (
  `id_nvgh` int(11) NOT NULL,
  `ten_nvgh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt_1` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt_2` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhanvien_gh`
--

INSERT INTO `nhanvien_gh` (`id_nvgh`, `ten_nvgh`, `sdt_1`, `sdt_2`) VALUES
(1, 'Grab giao hàng', '0987987987', '0123123123'),
(2, 'Viettel Post', '0654654654', '0456456456');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tac_gia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nxb` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_ct2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_sp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_luong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--



-- --------------------------------------------------------

--
-- Table structure for table `sp_ban`
--

CREATE TABLE `sp_ban` (
  `id_sp_ban` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `so_luong_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sp_ban`
--

INSERT INTO `sp_ban` (`id_sp_ban`, `id_sp`, `so_luong_ban`) VALUES
(1, 1, 2),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `id_tinh_trang` int(11) NOT NULL,
  `tinh_trang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tinhtrang`
--

INSERT INTO `tinhtrang` (`id_tinh_trang`, `tinh_trang`) VALUES
(1, 'Còn Hàng'),
(2, 'Hết Hàng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `chitiet_hd`
--
ALTER TABLE `chitiet_hd`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `danhmuc_sp`
--
ALTER TABLE `danhmuc_sp`
  ADD PRIMARY KEY (`id_dm`);

--
-- Indexes for table `don_dh`
--
ALTER TABLE `don_dh`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `id_nd` (`id_nd`),
  ADD KEY `id_nvgh` (`id_nvgh`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id_giohang`),
  ADD KEY `id_nd` (`id_nd`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id_nd`);

--
-- Indexes for table `nhanvien_gh`
--
ALTER TABLE `nhanvien_gh`
  ADD PRIMARY KEY (`id_nvgh`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_dm` (`id_dm`);

--
-- Indexes for table `sp_ban`
--
ALTER TABLE `sp_ban`
  ADD PRIMARY KEY (`id_sp_ban`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Indexes for table `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`id_tinh_trang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danhmuc_sp`
--
ALTER TABLE `danhmuc_sp`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `don_dh`
--
ALTER TABLE `don_dh`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id_nd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhanvien_gh`
--
ALTER TABLE `nhanvien_gh`
  MODIFY `id_nvgh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `sp_ban`
--
ALTER TABLE `sp_ban`
  MODIFY `id_sp_ban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `id_tinh_trang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `chitiet_hd`
--
ALTER TABLE `chitiet_hd`
  ADD CONSTRAINT `chitiet_hd_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `chitiet_hd_ibfk_2` FOREIGN KEY (`id_hd`) REFERENCES `don_dh` (`id_hd`);

--
-- Constraints for table `don_dh`
--
ALTER TABLE `don_dh`
  ADD CONSTRAINT `don_dh_ibfk_1` FOREIGN KEY (`id_nd`) REFERENCES `nguoi_dung` (`id_nd`),
  ADD CONSTRAINT `don_dh_ibfk_2` FOREIGN KEY (`id_nvgh`) REFERENCES `nhanvien_gh` (`id_nvgh`);

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`id_nd`) REFERENCES `nguoi_dung` (`id_nd`),
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc_sp` (`id_dm`);

--
-- Constraints for table `sp_ban`
--
ALTER TABLE `sp_ban`
  ADD CONSTRAINT `sp_ban_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 04:25 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boxshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietsanphamhoadon`
--

CREATE TABLE `chitietsanphamhoadon` (
  `machitietsanpham` int(10) NOT NULL,
  `masanpham` int(10) DEFAULT NULL,
  `mahoadon` int(10) DEFAULT NULL,
  `soluong` int(10) NOT NULL,
  `gia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietsanphamhoadon`
--

INSERT INTO `chitietsanphamhoadon` (`machitietsanpham`, `masanpham`, `mahoadon`, `soluong`, `gia`) VALUES
(3, 8, 3, 1, '12000'),
(4, 40, 3, 2, '15000'),
(5, 9, 4, 3, NULL),
(6, 8, 4, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dangkynhantin`
--

CREATE TABLE `dangkynhantin` (
  `madangky` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dangkynhantin`
--

INSERT INTO `dangkynhantin` (`madangky`, `email`) VALUES
(1, 'nguyenquangthai@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuccha`
--

CREATE TABLE `danhmuccha` (
  `madanhmuccha` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tendanhmuccha` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuccha`
--

INSERT INTO `danhmuccha` (`madanhmuccha`, `tendanhmuccha`) VALUES
('DV00', 'Nguồn gốc động vật'),
('TV00', 'Nguồn gốc thực vật'),
('VC00', 'Nguồn gốc vơ cơ'),
('VS00', 'Gia vị lên men vi sinh');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuccon`
--

CREATE TABLE `danhmuccon` (
  `madanhmuccon` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tendanhmuccon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madanhmuccha` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuccon`
--

INSERT INTO `danhmuccon` (`madanhmuccon`, `tendanhmuccon`, `madanhmuccha`) VALUES
('CU00', 'Củ', 'TV00'),
('GIAM00', 'Giấm', 'VS00'),
('GV00', 'Gia vị chế biến', 'TV00'),
('GVK00', 'Gia vị khác', 'DV00'),
('GVK000', 'Gia vị khác', 'VS00'),
('HA00', 'Hạt', 'TV00'),
('LA00', 'Lá', 'TV00'),
('MAM00', 'Các loại mắm', 'DV00'),
('ME00', 'Mẻ', 'VS00'),
('RU00', 'Rượu', 'VS00'),
('TPK00', 'Thực phẩm khác', 'TV00'),
('TR00', 'Trái', 'TV00'),
('VOCO00', 'Vô Cơ', 'VC00');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `mahoadon` int(10) NOT NULL,
  `soluong` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tongtien` double DEFAULT NULL,
  `phuongthucthanhtoan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manguoidung` int(10) NOT NULL,
  `trangthai` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaylap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`mahoadon`, `soluong`, `tongtien`, `phuongthucthanhtoan`, `manguoidung`, `trangthai`, `ngaylap`) VALUES
(3, '3', 42000, 'Thanh toán khi giao hàng', 1, 'Duyệt', '2019-11-14'),
(4, '8', 90000, 'Thanh toán khi giao hàng', 1, NULL, '2019-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `makhuyenmai` int(10) NOT NULL,
  `tieude` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `malienhe` int(10) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `manguoidung` int(10) NOT NULL,
  `tennguoidung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matkhau` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`manguoidung`, `tennguoidung`, `email`, `sodienthoai`, `ngaysinh`, `gioitinh`, `diachi`, `matkhau`) VALUES
(1, 'Võ Thị Chung', 'nguyenvana@gmail.com', '0703584997', '1998-09-09', 'Nam', 'Huế - việt  nam - vn', '123');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masanpham` int(10) NOT NULL,
  `tensanpham` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giagoc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakhuyenmai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `thongtinsanpham` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `madanhmuccon` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masanpham`, `tensanpham`, `anh`, `giagoc`, `giakhuyenmai`, `thongtinsanpham`, `mota`, `madanhmuccon`, `trangthai`, `ghichu`) VALUES
(8, 'Chuối xanh', 'qua2.jpg', '15000', '12000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TR00', 'Còn hàng', 'New'),
(9, 'Đậu hà lan', 'hat3.jpg', '12000', '10000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'HA00', 'Hết hàng', 'New'),
(10, 'Su hào', 'cu4.jpg', '20000', '14000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'CU00', 'Còn hàng', 'New'),
(12, 'Rau má', 'rau6.jpg', '50000', '20000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'LA00', 'Còn hàng', 'New'),
(13, 'Cải mầm', 'rau7.jpg', '30000', '10000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'LA00', 'Còn hàng', 'Hot'),
(14, 'Rau má vườn', 'rau8.jpg', '30000', '200000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'LA00', 'Còn hàng', 'Hot'),
(15, 'Quả chanh', 'qua1.jpg', '15000', '30000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TR00', 'Còn hàng', 'Hot'),
(16, 'Cải ngọt', 'rau2.jpg', '15000', '30000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'LA00', 'Còn hàng', 'New'),
(17, 'Quả dừa', 'qua3.jpg', '15000', '40000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TR00', 'Còn hàng', 'Hot'),
(18, 'Quả dưa hấu', 'qua4.jpg', '40000', '30000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TR00', 'Còn hàng', 'New'),
(19, 'Quả đu đủ', 'qua5.jpg', '50000', '40000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TR00', 'Còn hàng', 'Hot'),
(20, 'Quả ổi', 'qua6.jpg', '80000', '50000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TR00', 'Còn hàng', 'New'),
(21, 'Quả xoài', 'qua7.jpg', '92000', '50000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TR00', 'Còn hàng', 'New'),
(22, 'Trái cà pháo', 'qua8.jpg', '70000', '30000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TR00', 'Còn hàng', 'New'),
(23, 'Hạt mắt ngọc', 'hat1.jpg', '50000', '10000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'HA00', 'Còn hàng', 'New'),
(24, 'Đậu ngự xanh', 'hat2.jpg', '40000', '250000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'HA00', 'Còn hàng', 'New'),
(25, 'Rau mồng tơi', 'rau3.jpg', '85000', '60000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'LA00', 'Còn hàng', 'New'),
(26, 'Đậu ngự', 'hat4.jpg', '78000', '65000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'HA00', 'Còn hàng', 'New'),
(27, 'Hạt é', 'hat5.jpg', '78000', '65000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'HA00', 'Còn hàng', 'Hot'),
(28, 'Hạt sen', 'hat6.jpg', '56000', '36000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'HA00', 'Còn hàng', 'New'),
(29, 'Hạt tiêu xanh', 'hat7.jpg', '45000', '35000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'HA00', 'Còn hàng', 'New'),
(30, 'Hạt đậu nành', 'hat8.jpg', '90000', '80000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'HA00', 'Còn hàng', 'New'),
(31, 'Củ cả rốt', 'cu1.jpg', '78800', '68000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'CU00', 'Còn hàng', 'New'),
(32, 'Củ cải trắng', 'cu2.jpg', '45000', '35000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'CU00', 'Còn hàng', 'New'),
(33, 'Củ đậu', 'cu3.jpg', '65000', '36000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'CU00', 'Còn hàng', 'Hot'),
(34, 'Rau đắng', 'rau4.jpg', '45000', '12000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'LA00', 'Còn hàng', 'Hot'),
(35, 'Khoai lang', 'cu5.jpg', '90000', '60000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'CU00', 'Còn hàng', 'Hot'),
(36, 'Khoai tây', 'cu6.jpg', '40000', '30000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'CU00', 'Còn hàng', 'Hot'),
(37, 'Khoai Tây Đà Lạt', 'cu7.jpg', '63000', '52000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'CU00', 'Còn hàng', 'Hot'),
(38, 'Hành tây', 'cu8.jpg', '79000', '35000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'CU00', 'Còn hàng', 'Hot'),
(39, 'Bột ngọt VeDan', 'botngot1.jpg', '75500', '62000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GV00', 'Còn hàng', 'Hot'),
(40, 'Bột ngọt Miwon', 'botngot2.jpg', '78000', '15000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GV00', 'Còn hàng', 'Hot'),
(41, 'Bột ngọt Bio', 'botngot3.jpg', '45000', '36000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GV00', 'Còn hàng', 'Hot'),
(42, 'Bột ngọt AJI-NO-MOTO', 'botngot4.jpg', '79000', '36000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GV00', 'Còn hàng', 'Hot'),
(45, 'Mắm tôm bắc', 'mam7.jpg', '90000', '60000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'MAM00', 'Còn hàng', 'New'),
(46, 'Mắm Hương Sông', 'mam8.jpg', '96000', '35000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'MAM00', 'Còn hàng', 'New'),
(47, 'Lá me xanh', 'rau5.jpg', '42000', '30000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'LA00', 'Còn hàng', 'Hot'),
(48, 'Mắm tôm Hà Nội', 'mam9.jpg', '75000', '65000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'MAM00', 'Còn hàng', 'New'),
(49, 'Mắm tôm Tâm Đức', 'mam10.jpg', '78000', '69000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'MAM00', 'Còn hàng', 'New'),
(50, 'Mắm tôm Trung Thành', 'mam2.jpg', '150000', '130000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'MAM00', 'Còn hàng', 'New'),
(51, 'Dầu SUN GO', 'dau-tv1.jpg', '78000', '64000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TPK00', 'Còn hàng', 'Hot'),
(52, 'Dầu Cái Lân', 'dau-tv2.jpg', '90000', '65000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TPK00', 'Còn hàng', 'Hot'),
(53, 'Dầu VoCa', 'dau-tv3.jpg', '75000', '65000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TPK00', 'Còn hàng', 'Hot'),
(54, 'Dầu Meizan', 'dau-tv4.jpg', '15000', '12000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TPK00', 'Còn hàng', 'Hot'),
(55, 'Dầu SoBy', 'dau-tv5.jpg', '160000', '140000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TPK00', 'Còn hàng', 'Hot'),
(56, 'Dầu Neptune', 'dauan-8.jpg', '150000', '140000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'TPK00', 'Còn hàng', 'Hot'),
(59, 'Mẻ gạo', 'me1.jpg', '90000', '60000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'ME00', 'Còn hàng', 'Hot'),
(60, 'Mẻ Nếp', 'me2.jpg', '65000', '35000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'ME00', 'Còn hàng', 'New'),
(61, 'Giấm táo Heizn', 'giam1.jpg', '150000', '35000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GIAM00', 'Còn hàng', 'New'),
(62, 'Giấm táo Ottogi', 'giam2.jpg', '180000', '96000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GIAM00', 'Còn hàng', 'New'),
(63, 'Giấm táo hữu cơ', 'giam3.jpg', '140000', '120000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GIAM00', 'Còn hàng', 'New'),
(64, 'Giấm táo hữu cơ Bragg', 'giam4.jpg', '98000', '34000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GIAM00', 'Còn hàng', 'New'),
(65, 'Rượn mai quế lộ', 'ruou1.jpg', '150000', '130000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'RU00', 'Còn hàng', 'New'),
(66, 'Rượu nếp', 'ruou2.jpg', '350000', '260000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'RU00', 'Còn hàng', 'New'),
(67, 'Rượu Van', 'ruou3.png', '440000', '350000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'RU00', 'Còn hàng', 'New'),
(68, 'Trứng cút', 'gvk-1.jpg', '90000', '85000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GVK000', 'Còn hàng', 'New'),
(69, 'Nghệ xay', 'gvk-4.jpg', '350000', '260000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GVK000', 'Còn hàng', 'New'),
(70, 'Cá thu', 'gvk-5.jpg', '90000', '65000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GVK000', 'Còn hàng', 'New'),
(71, 'Đường sạch', 'voco1.jpg', '45000', '26000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'VOCO00', 'Còn hàng', 'New'),
(72, 'Đường vàng hoa mai', 'voco2.jpg', '75000', '36000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'VOCO00', 'Còn hàng', 'New'),
(73, 'Muối Visalco', 'voco3.jpg', '96000', '45000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'VOCO00', 'Còn hàng', 'New'),
(74, 'Muối Ottogi', 'voco4.jpg', '78000', '25000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'VOCO00', 'Còn hàng', 'New'),
(90, 'Cua đồng giã Vinacua', 'gkv-5.jpg', '65000', '48000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GVK00', '', 'Hot'),
(91, 'Gia vị nêm sẵn bò kho', 'gkv-6.jpg', '85000', '60000', 'Nó chứa', '35% nho khô hữu cơ 55% yến mạch và 10% bơ.', 'GVK00', '', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `matintuc` int(10) NOT NULL,
  `tentintuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`matintuc`, `tentintuc`, `mota`, `hinhanh`, `noidung`, `ngaydang`) VALUES
(1, 'Lá tía tô có thể bạn', 'Tía tô là loại rau gia vị phổ biến đối với người Việt Nam. Đồng thời, theo y học cổ truyền tía tô còn là một vị thuốc ch', 'tintuc/anh1.jpg', 'Theo PGS. TS. Trần Công Khánh, Trung tâm Nghiên cứu và phát triển cây thuốc dân tộc cổ truyền, cho biết, dưới góc độ Đông y, hương vị của tía tô được đánh giá là sự pha trộn giữa hồi hương, cam thảo, quế và bạc hà sát khuẩn. Chính vì vậy, tía tô được y học cổ truyền xếp vào loại giải biểu, thuộc nhóm phát tán phong hàn, chữa bệnh bằng cách cho ra mồ hôi, giải cảm, khỏi sốt. Khi cộng với hành (một thứ gia vị cũng kích thích tăng tiết dịch vị) thì cháo hành <br> - tía tô sẽ có tác dụng giải cảm cho những người bị cảm.<br>\r\nNgoài ra, lá tía tô non khi vò ra đem sát vào các mụn cơm vài lần thì mụn cơm sẽ bay mất. Dầu được ép từ hạt tía tô cũng có thể làm dầu ăn và làm thành một thứ thuốc.<br>\r\nMột số bài thuốc từ tía tô:<br>\r\n- Chữa mẩn ngứa, làm đẹp da: Vò lá tía tô cho vào nước tắm có thể chữa mẩn ngứa, làm đẹp da, phần bã và lá có thể đắp vào vùng da bị ngứa.<br>\r\n- Chữa cảm, ho: Khi bị cảm, ho có thể dùng 150g lá tía tô tươi, cùng với 3 củ hành tươi thái nhỏ cho vào cháo ăn lúc nóng.<br>\r\n- Chữa cảm lạnh: Lá tí tô nấu với nước uống hoặc dùng lá tía tô cùng với kinh giới, hương nhu, lá sả, lá tre nấu với nước để xông.\r\n', '2019-11-05'),
(2, 'Việc bảo quản gia vị', 'Các gia vị dùng để nấu ăn hằng ngày nếu chúng ta mua về rồi cứ để thế thì chúng rất nhanh bị hư hỏng hoặc khô héo. Muốn ', 'tintuc/anh2.jpg', 'Hạt tiêu<br>\r\nHạt tiêu - loại gia vị có một lượng dầu rất nhỏ để lưu giữ hương thơm, nên để giữ được mùi thơm lâu dài hãy để cả hạt, khi nào ăn đến đâu thì xay ra đến đó. Ngoài ra, bạn nên cho hạt tiêu vào túi nilon buộc kín hoặc hộp nhựa, hộp thủy tinh có nắp đậy để giữ được hạt tiêu thơm ngon lâu hơn.<br>\r\nNấm hương<br>\r\nĐối với nấm hương nếu bạn muốn bảo quản chúng không bị mọt, mốc và giữ được mùi thơm của chúng thì bạn nên bảo quản cho chúng vào hộp nhựa, túi kính, úi ziplog hoặc túi bóng nilon khô và cất chúng vào cửa ngăn mát của tủ lạnh. Hoặc nếu bạn không có tủ lạnh thì bạn có thể cho nấm hương vào các túi giấy và để vào những nơi khô, thoáng mát tránh nhưng nơi ẩm ướt hay quá nóng.<br>\r\nMuối<br>\r\nĐược xem là một trong những gia vị không thể thiếu khi nấu ăn, muối mang lại độ mặn và vị đậm đà cho món ăn. Thời tiết nóng dễ làm muối bị chảy nước hoặc vón cục. Để khắc phục tình trạng này bạn chỉ cần lót một mảnh giấy thấm vào đáy lọ muối. Cách này có tác dụng hút hết hơi ẩm có trong lọ vào giấy thấm đồng thời giữ cho muối luôn khô ráo.\r\nHành tây<br>\r\nĐể ở những nơi khô, thoáng mát, tránh những nơi ẩm thấp và tiếp xúc ánh sáng trực tiếp. Tốt nhất nên để chúng vào ngăn mát của tủ lạnh và nếu muốn bảo quản lâu dài hơn thì bạn nên bọc chúng vào giấy thiếc.\r\nỚt<br>\r\nBảo quản ớt bằng cách sấy khô: Theo kinh nghiệm dân gian, bạn hãy dùng dao rạch ớt lấy hạt ra, ngâm vào nước ấm rồi sấy khô, lúc nào ăn chỉ cần ngâm lại trong nước ấm là ớt sẽ tươi như lúc ban đầu.<br>\r\nBảo quản ớt trong tủ lạnh: Ớt cắt hết cuống, rửa sạch, cho vào hộp đậy kín rồi để vào ngăn đá tủ lạnh. Khi ăn bạn chỉ cần lấy ra, rửa lại nước thì quả ớt sẽ mềm lại như cũ. Đây là cách bảo quản tốt nhất vì sẽ giữ được ớt tươi lâu.<br>\r\nLàm dấm ớt: Cách làm này sẽ khiến ớt có vị riêng rất đặc trưng. Bạn cắt bỏ cuống ớt chín, rửa sạch để ráo nước, dùng kim đâm thủng xuyên nhiều lỗ trên qua ớt rồi bỏ trong hộp. Sau đó bạn đổ dấm cho ngập hết ớt, đập vài tép tỏi để lên trên và đậy kín lọ lại, khi ăn có thể lấy ra sử dụng trực tiếp<br>\r\nVới ớt khô và ớt bột, bạn hãy bỏ vào lọ thủy tinh đậy kín nắp và để nơi khô ráo, tránh ánh sáng trực tiếp chiếu vào để không làm hỏng hương vị đặc trưng của chúng.<br>\r\nTỏi khô, hành khô<br>\r\nĐối với tỏi khô, hành khô thì bạn không nên bảo quản chúng vào túi nilon vì khi đó thực phẩm sẽ bị nóng và dễ bị thối, mốc. Bạn nên để chúng vào rổ, túi lưới hoặc các tui giấy khô để chúng có được sự thông thoáng nhất định. Đồng thời bạn nên để chúng ở nhưng nơi thoáng mát với nhiệt độ không quá cao, không quá thấp để tránh hiện tượng chúng có thể mọc mầm.\r\nGừng<br>\r\nĐối với gừng thì có rất nhiều cách để bảo quản chúng được tươi lâu hơn:<br>\r\nBạn có thể bảo quản chúng bằng cách nghiền nát chúng với một ít muối, nước chanh và một xíu đường. Bạn đổ hỗn hợp này vào một chiếc lọ sạch đậy nắp kín sau đó để vào tủ lạnh. Làm cách này bạn có thể bảo quản chúng từ 6 tháng đến 1 năm<br>\r\nBảo quản trong giấy bạc: Bạn dùng một tờ giấy bạc sau đó quấn chặt, quanh củ gừng tươi rồi để nơi thoáng mát<br>\r\nBảo quản bằng cát: Cách này rất đơn giản, bạn chỉ cần một chiếc bình hơi rộng sau đó cho đầy cát vào bình rồi vùi gừng xuống đó. Để bình nơi thoáng mát, việc này giúp bảo về gừng rất tốt, giúp gừng luôn được tươi lâu và tránh bị khô.<br>\r\n\r\n', '2019-11-05'),
(3, 'Nhiều loại gia vị và', 'Gừng từ lâu đã được sử dụng trong y học dân gian để điều trị rất nhiều bệnh từ cảm đến táo bón. Gừng có thể được dùng tư', 'tintuc/anh3.jpg', 'Gừng<br>\r\n\r\nGừng từ lâu đã được sử dụng trong y học dân gian để điều trị rất nhiều bệnh từ cảm đến táo bón. Gừng có thể được dùng tươi, dạng bột (gừng gia vị) hoặc làm thành kẹo. Mặc dù hương vị của gừng tươi và sau chế biến khác nhau đáng kể, nhưng thêm gừng vào nhiều món ăn có tác dụng rất tốt.\r\nĂn gừng ngoài tác dụng chống nôn, nó còn có hiệu quả bất ngờ trong điều trị ung thư.<br>\r\nCây mê điệt (cây hương thảo)<br>\r\n\r\nCó xuất xứ từ vùng Địa Trung Hải, cây mê điệt là loại cây nhỏ, phân nhánh và mọc thành bụi, toàn cây có mùi rất thơm và chứa rất nhiều chất chống oxy hóa. Loại cây này được sử dụng như một thành phần chính trong các loại gia vị Ý. Nó được thêm vào nhiều món ăn như súp, nước sốt cà chua, bánh mì và các loại thực phẩm giàu protein như thịt gia cầm, thịt bò, thịt cừu.<br>\r\nĐặc biệt, cây mê điệt có thể giúp giải độc, trị khó tiêu, đầy hơi, chán ăn và các bệnh về tiêu hóa khác. Thử uống 3 tách trà hương thảo mỗi ngày, bạn sẽ cảm thấy khỏe mạnh hơn và có thể phòng tránh được ung thư.<br>\r\nNghệ<br>\r\n\r\nNghệ là một loại thảo dược thuộc họ gừng, là một trong những thành phần làm nên hương vị tuyệt vời của món cà ri quen thuộc. Bên cạnh đó, lượng curcumin trong nghệ đã được chứng minh có khả năng chống oxy hóa và chống viêm, có khả năng bảo vệ cơ thể và chống lại sự phát triển ung thư.<br>\r\nBổ sung chiết xuất từ củ nghệ đang được nghiên cứu trong việc ngăn ngừa và điều trị một số bệnh ung thư như đại tràng, tuyến tiền liệt, vú và ung thư da. Mặc dù kết quả thí nghiệm trên động vật cho kết quả đầy hứa hẹn, nhưng vẫn cần thời gian để đưa ra sử dụng cho con người.<br>\r\nỚt Chile<br>\r\n\r\nỚt Chile chứa capsaicin, một hợp chất có thể làm giảm đau. Nó có tác dụng hiệu quả với việc điều trị đau thần kinh sau phẫu thuật ung thư. Ngoài ra, loại ớt này còn có thể trị chứng khó tiêu. Một số nghiên cứu đã chỉ ra rằng ăn một lượng nhỏ ớt có thể làm giảm chứng khó tiêu.<br>\r\nTỏi<br>\r\n\r\nTỏi chứa hàm lượng lưu huỳnh cao và dồi dào arginine, oligosaccharides, flavonoids và selen - tất cả đều rất có lợi cho sức khỏe. Đặc biệt, hợp chất allicin trong tỏi mang lại mùi đặc trưng và được tạo ra khi tỏi được cắt nhỏ, nghiền nát hoặc bị hư hỏng.<br>\r\nMột số nghiên cứu cho thấy rằng ăn tỏi làm giảm nguy cơ ung thư dạ dày, đại tràng, thực quản, tụy và ung thư vú. Tỏi có thể ức chế nhiễm trùng do vi khuẩn và ức chế quá trình hình thành các chất gây ung thư, quá trình thúc đẩy sửa chữa DNA và gây chết tế bào. Tỏi còn hỗ trợ hệ thống miễn dịch và giúp giảm huyết áp.<br>\r\nBạc hà<br>\r\n\r\nTừ ngàn năm nay, bạc hà đã như một phương thuốc hữu hiệu giúp tiêu hóa, giảm bớt khí, khó tiêu, đau bụng, tiêu chảy. Nó có tác dụng loại bỏ các triệu chứng của hội chứng ruột kích thích và ngộ độc thực phẩm. Bạc hà còn giúp làm dịu dạ dày và cải thiện dòng chảy của mật, tạo điều kiện cho thức ăn đi qua dạ dày nhanh hơn.<br>\r\nNếu trong quá trình điều trị ung thư hay xảy ra đau bụng, hãy thử uống một tách trà bạc hà. Tác dụng không ngờ của nó sẽ khiến nhiều người ngạc nhiên đấy.<br>\r\nBạc hà cũng có thể làm dịu cổ họng khi bị đau. Do đó, nó cũng được sử dụng điều trị loét miệng.<br>\r\nHoa Chamomile (hoa cúc)<br>\r\n\r\nTrà hoa cúc có tác dụng hiệu quả trong điều trị mất ngủ. Ngoài ra, nó cũng đã được nghiên cứu trong việc phòng ngừa và điều trị loét miệng bằng hóa trị và xạ trị.<br>\r\nĐặc biệt, trà hoa cúc còn giúp loại bỏ các vấn đề tiêu hóa, bao gồm đau bụng. Nó giúp thư giãn co thắt cơ bắp, đặc biệt là các cơ trơn của ruột và ngăn ngừa ung thư.<br>\r\n', '2019-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `UserName`, `Password`) VALUES
(1, 'kenchung', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietsanphamhoadon`
--
ALTER TABLE `chitietsanphamhoadon`
  ADD PRIMARY KEY (`machitietsanpham`),
  ADD KEY `mahoadon` (`mahoadon`),
  ADD KEY `masanpham` (`masanpham`);

--
-- Indexes for table `dangkynhantin`
--
ALTER TABLE `dangkynhantin`
  ADD PRIMARY KEY (`madangky`);

--
-- Indexes for table `danhmuccha`
--
ALTER TABLE `danhmuccha`
  ADD PRIMARY KEY (`madanhmuccha`);

--
-- Indexes for table `danhmuccon`
--
ALTER TABLE `danhmuccon`
  ADD PRIMARY KEY (`madanhmuccon`),
  ADD KEY `madanhmuccha` (`madanhmuccha`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahoadon`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`makhuyenmai`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`malienhe`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`manguoidung`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masanpham`),
  ADD KEY `madanhmuccon` (`madanhmuccon`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`matintuc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietsanphamhoadon`
--
ALTER TABLE `chitietsanphamhoadon`
  MODIFY `machitietsanpham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dangkynhantin`
--
ALTER TABLE `dangkynhantin`
  MODIFY `madangky` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahoadon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `makhuyenmai` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `malienhe` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `manguoidung` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masanpham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `matintuc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietsanphamhoadon`
--
ALTER TABLE `chitietsanphamhoadon`
  ADD CONSTRAINT `chitietsanphamhoadon_ibfk_2` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`masanpham`);

--
-- Constraints for table `danhmuccon`
--
ALTER TABLE `danhmuccon`
  ADD CONSTRAINT `danhmuccon_ibfk_1` FOREIGN KEY (`madanhmuccha`) REFERENCES `danhmuccha` (`madanhmuccha`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`madanhmuccon`) REFERENCES `danhmuccon` (`madanhmuccon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

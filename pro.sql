-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 21, 2020 lúc 12:10 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `comment` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id_hd` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id_hd`, `id_sp`, `soluong`) VALUES
(21, 16, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `diachi` text NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `ten`, `password`, `diachi`, `user_phone`, `user_email`, `updated_at`, `created_at`) VALUES
(14, 'Nhat Long', '123456', 'TPHCM', 982731, 'goodboyhay', '2020-11-21 07:59:12', '2020-11-21 07:59:12'),
(15, 'Minh', '123456', '1', 9234, 'minh@gmail.com', '2020-11-21 08:52:04', '2020-11-21 08:52:04'),
(16, '12', '123456', '3', 3, 'goodboy@gmail.com', '2020-11-21 08:52:29', '2020-11-21 08:52:29'),
(17, '1', '123456', '1', 1, 'goodboy@gmail.com', '2020-11-21 08:53:47', '2020-11-21 08:53:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang`
--

CREATE TABLE `hang` (
  `id` int(11) NOT NULL,
  `ma_hang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hang`
--

INSERT INTO `hang` (`id`, `ten_hang`) VALUES
(1, 'T-SHIRT'),
(2, 'JAKET'),
(3, 'HOODIE'),
(4, 'POLO'),
(5, 'SWEATER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `hd_user` int(11) NOT NULL,
  `hd_status` int(11) NOT NULL,
  `ship` int(11) NOT NULL,
  `hd_creatat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `hd_user`, `hd_status`, `ship`, `hd_creatat`) VALUES
(21, 14, 0, 0, '2020-05-21 08:02:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `id_quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `user_name`, `password`, `user_phone`, `user_email`, `diachi`, `id_quyen`) VALUES
(1, 'admin', '1', '123456', 'teo@gmail.com', 'TPHCM', 1),
(2, 'nhanvien', '1', '123456', 'teo@gmail.com', 'TPHCM', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(30) NOT NULL,
  `pro_mota` text NOT NULL,
  `anh` varchar(30) NOT NULL,
  `pro_hang` int(11) NOT NULL,
  `pro_gia` int(11) NOT NULL,
  `pro_coupo` int(11) NOT NULL,
  `soluongnhap` int(11) NOT NULL,
  `damua` int(11) NOT NULL,
  `new` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `pro_name`, `pro_mota`, `anh`, `pro_hang`, `pro_gia`, `pro_coupo`, `soluongnhap`, `damua`, `new`, `updated_at`, `created_at`) VALUES
(7, 'VEGAR T-SHIRT', 'abc', 'VEGART-SHIRT.png', 1, 200000, 50000, 10, 4, 1, '2020-12-1 09:53:04', NULL),
(8, 'WHITE DODGERS T-SHIRT', 'TERGRGDFH', 'WHITEDODGERST-SHIRT.png', 1, 150000, 130000, 20, 20, 0, '2020-12-1 09:53:04', NULL),
(9, 'WHITE PINK T-SHIRT', 'FDGDG ', 'WHITEPINKT-SHIRT.png', 1, 300000, 90000, 10, 0,  0, '2020-12-1 09:53:04', NULL),
(10, 'WHITE RELAX T-SHIRT', 'HRHGSDF', 'WHITERELAXT-SHIRT.png', 1, 350000, 10000, 20, 2,  0, '2020-12-1 09:53:04', NULL),
(11, 'BLACK MOTOCYCLE T-SHIRT', 'ASDASDAGER', 'BLACKMOTOCYCLET-SHIRT.png', 1, 350000, 10000, 10, 3, 1, '2020-12-1 09:53:04', NULL),
(12, 'BLACK POLO', 'kkkkkkk', 'BLACKPOLO.png', 4, 400000, 1000, 20, 2,  0, '2020-12-1 09:53:04', NULL),
(13, 'BLUE POLO', 'aaaa', 'BLUEPOLO.png', 4, 400000, 1000, 20, 2,  0, '2020-12-1 09:53:04', NULL),
(14, 'CARO POLO', 'ttttt', 'CAROPOLO.png', 4, 450000, 1000, 20, 2,   1, '2020-12-1 09:53:04', NULL),
(15, 'ENGLAND POLO', 'Đây là polo', 'ENGLANDPOLO.png', 4, 350000, 9000, 10, 0,   0, '2020-12-1 09:53:04', NULL),
(16, 'FNATIC JAKET', 'kdmfdkfm', 'FNATICJAKET.png', 2, 550000, 1000, 20, 6,   1, '2020-12-1 09:53:04', NULL),
(17, 'LAKERS JAKET', 'lakers', 'LAKERSJAKET.png', 2, 500000, 1000, 20, 2,   0, '2020-12-1 09:53:04', NULL),
(18, 'BLACK HOODIE', 'HOODIE', 'BLACKHOODIE.png', 3, 350000, 1000, 20, 2,   0, '2020-12-1 09:53:04', NULL),
(19, 'GREY HOODIE', 'SD ', 'GREYHOODIE.png', 3, 450000, 9000, 10, 8,   0, '2020-12-1 09:53:04', NULL),
(20, 'HYPE HOODIE', 'CVCV', 'HYPEHOODIE.png', 3, 400000, 1000, 20, 3,   1, '2020-12-1 09:53:04', NULL),
(21, 'ORANGE HOODIE', 'BBB', 'ORANGEHOODIE.png', 3, 400000, 1000, 20, 2,   0, '2020-12-1 09:53:04', NULL),
(22, 'SUMMER HOODIE', 'JKYU', 'SUMMERHOODIE.png', 3, 450000, 1000, 20, 2,   0, '2020-12-1 09:53:04', NULL),
(23, 'WHITEHOODIE', 'JKYU', 'WHITEHOODIE.png', 3, 420000, 1000, 20, 2,   0, '2020-12-1 09:53:04', NULL),
(24, 'WNC HOODIE', 'JKYU', 'WNCHOODIE.png', 3, 420000, 1000, 20, 2,   0, '2020-12-1 09:53:04', NULL);
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `id` int(11) NOT NULL,
  `tenquyen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`id`, `tenquyen`) VALUES
(1, 'admin'),
(2, 'nhanvien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ten` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `diachi` varchar(30) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sp_2` (`id_sp`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD KEY `id_hd` (`id_hd`,`id_sp`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hd_user` (`hd_user`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_nhanvien_chucvu` (`id_quyen`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro_hang` (`pro_hang`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `hang`
--
ALTER TABLE `hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`id_hd`) REFERENCES `hoadon` (`id`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

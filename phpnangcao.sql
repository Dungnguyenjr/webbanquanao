-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 14, 2025 lúc 09:49 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phpnangcao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproduct`
--

CREATE TABLE `adproduct` (
  `Ma_loaisp` varchar(100) DEFAULT NULL,
  `Ma_sp` varchar(100) NOT NULL,
  `Tensp` varchar(255) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `gianhap` int(11) DEFAULT NULL,
  `giaxuat` int(11) DEFAULT NULL,
  `khuyenmai` varchar(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `mota_sp` text DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `adproduct`
--

INSERT INTO `adproduct` (`Ma_loaisp`, `Ma_sp`, `Tensp`, `hinhanh`, `gianhap`, `giaxuat`, `khuyenmai`, `soluong`, `mota_sp`, `create_date`) VALUES
('An', '2', '1', '55668000-a9d9-41d1-93e1-f3fa2c631985.jpg', 20000, 10000, '12', 5, 'áđâsdx', '2024-12-02'),
('1', 'a', 'a', '2023_02_11_16_18_IMG_4501.jpg', 1, 1, '', -1, '1', '2025-01-14'),
('áo', 'aaaaaadv', 'cxvxcv', 'z5574226147444_5de525ac6e11ff42bd93434d0d42f640.jpg', 500000, 100000, '15', 6, 'áđâsđâsd', '2024-12-02'),
('áo', 'áda', 'aaaaaaâd', 'kkkkkkkkkkk.jpg', 40000, 20000, '10', 6, 'czxczxc', '2024-12-02'),
('áo', 'áđá', 'aaaaaa', 'âxzxzx.jpg', 123000, 100000, '15', 6, 'sdvxcvxcv', '2024-12-02'),
('An', 'áđâsd', 'aâ', '383a5c253f0e8450dd1f.jpg', 300000, 200000, '10', 6, 'aaaa', '2024-12-02'),
('An', 'áo', 'áo to', '383a5c253f0e8450dd1f.jpg', 100000, 80000, '10', 6, 'aaaaaaaaaa', '2024-11-30'),
('áo', 'aothun', 'áo thun ', 'âxzxzx.jpg', 200000, 100000, '10', 6, 'aaaaâ', '2024-12-02'),
('An', 'khjkhjk', 'avbvcbc', '383a5c253f0e8450dd1f.jpg', 700000, 340000, '10', 6, 'áđâsđâsd', '2024-12-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproducttype`
--

CREATE TABLE `adproducttype` (
  `ma_loaisp` varchar(100) NOT NULL,
  `ten_loaisp` varchar(100) DEFAULT NULL,
  `mota_loaisp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `adproducttype`
--

INSERT INTO `adproducttype` (`ma_loaisp`, `ten_loaisp`, `mota_loaisp`) VALUES
('1', '2', '2'),
('An', 'an', ''),
('áo', 'áo thun', 'áo cộc tay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) DEFAULT NULL,
  `Ma_sp` varchar(50) DEFAULT NULL,
  `Tensp` varchar(100) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `giaxuat` decimal(10,2) DEFAULT NULL,
  `khuyenmai` decimal(10,2) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `ma_hoadon` varchar(255) DEFAULT NULL,
  `ma_khachhang` int(11) DEFAULT NULL,
  `tenkhachhang` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tinhthanhpho` varchar(255) DEFAULT NULL,
  `quanhuyen` varchar(255) DEFAULT NULL,
  `diachigiaohang` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `ma_hoadon`, `ma_khachhang`, `tenkhachhang`, `phone`, `email`, `tinhthanhpho`, `quanhuyen`, `diachigiaohang`, `date`) VALUES
(57, 'HD1736843167', 30, 'Nguyenvietdung', '0348189573', 'dung@gmail.com', 'Hà Nộia', 'hà đôngaa', 'Tổ 1 Phường Quyết Tâm', '2025-01-14'),
(58, 'HD1736844332', 30, 'Nguyenvietdung', '0348189573', 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', '2025-01-14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `Tentintuc` varchar(255) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `motasp` text DEFAULT NULL,
  `createdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `Tentintuc`, `hinhanh`, `motasp`, `createdate`) VALUES
(11, 'áđá', '55668000-a9d9-41d1-93e1-f3fa2c631985.jpg', 'ád', '2024-12-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oderdetail`
--

CREATE TABLE `oderdetail` (
  `id` int(11) NOT NULL,
  `ma_hoadon` varchar(255) DEFAULT NULL,
  `Ma_sp` varchar(255) DEFAULT NULL,
  `Tensp` varchar(255) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `giaxuat` int(11) DEFAULT NULL,
  `khuyenmai` int(11) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oderdetail`
--

INSERT INTO `oderdetail` (`id`, `ma_hoadon`, `Ma_sp`, `Tensp`, `soluong`, `giaxuat`, `khuyenmai`, `hinhanh`) VALUES
(78, 'HD1736843039', 'a', 'a', 1, 1, 0, '2023_02_11_16_18_IMG_4501.jpg'),
(79, 'HD1736843167', 'a', 'a', 1, 1, 0, '2023_02_11_16_18_IMG_4501.jpg'),
(80, 'HD1736844332', '2', '1', 1, 10000, 12, '55668000-a9d9-41d1-93e1-f3fa2c631985.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `Ma_hoadon` varchar(255) DEFAULT NULL,
  `ma_khachhang` int(11) DEFAULT NULL,
  `tenkhachhang` varchar(255) DEFAULT NULL,
  `tongtien` int(11) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `trangthai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `Ma_hoadon`, `ma_khachhang`, `tenkhachhang`, `tongtien`, `createdate`, `trangthai`) VALUES
(57, 'HD1736843039', 30, 'Nguyenvietdung', 1, '2025-01-14', 'Đã thanh toán'),
(58, 'HD1736843167', 30, 'Nguyenvietdung', 1, '2025-01-14', 'Đã thanh toán'),
(59, 'HD1736844332', 30, 'Nguyenvietdung', 8800, '2025-01-14', 'Chờ xét duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderfailed`
--

CREATE TABLE `orderfailed` (
  `id` int(11) NOT NULL,
  `ma_hoadon` varchar(50) NOT NULL,
  `ma_khachhang` varchar(50) NOT NULL,
  `tenkhachhang` varchar(100) DEFAULT NULL,
  `ma_sp` varchar(50) DEFAULT NULL,
  `tensp` varchar(100) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tinhthanhpho` varchar(50) DEFAULT NULL,
  `quanhuyen` varchar(50) DEFAULT NULL,
  `diachigiaohang` varchar(200) DEFAULT NULL,
  `tongtien` int(11) DEFAULT NULL,
  `createdate` varchar(100) NOT NULL,
  `trangthai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderfailed`
--

INSERT INTO `orderfailed` (`id`, `ma_hoadon`, `ma_khachhang`, `tenkhachhang`, `ma_sp`, `tensp`, `soluong`, `phone`, `email`, `tinhthanhpho`, `quanhuyen`, `diachigiaohang`, `tongtien`, `createdate`, `trangthai`) VALUES
(4, 'HD1733232344', '30', 'Nguyenvietdung', '2', '1', 2, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 108000, '2024-12-03 15:28:31', 'Hủy đơn hàng'),
(5, 'HD1733236136', '30', 'Nguyenvietdung', 'aaaaaadv', 'cxvxcv', 1, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 90000, '2024-12-03 15:29:34', 'Hủy đơn hàng'),
(6, 'HD1733236266', '30', 'Nguyenvietdung', 'aaaaaadv', 'cxvxcv', 1, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 90000, '2024-12-03 15:31:25', 'Hủy đơn hàng'),
(7, 'HD1733236304', '30', 'Nguyenvietdung', 'aaaaaadv', 'cxvxcv', 1, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 90000, '2024-12-03 15:35:20', 'Hủy đơn hàng'),
(8, 'HD1733236494', '30', 'Nguyenvietdung', 'aaaaaadv', 'cxvxcv', 1, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 90000, '2024-12-03 15:38:50', 'Hủy đơn hàng'),
(9, 'HD1733236571', '30', 'Nguyenvietdung', 'áda', 'aaaaaaâd', 1, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 18000, '2024-12-03 15:49:53', 'Hủy đơn hàng'),
(10, 'HD1733243335', '30', 'Nguyenvietdung', 'áda', 'aaaaaaâd', 1, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 18000, '2024-12-03 17:29:14', 'Hủy đơn hàng'),
(11, 'HD1733246437', '30', 'Nguyenvietdung', '2', '1', 1, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 99000, '2024-12-03 18:23:17', 'Hủy đơn hàng'),
(12, 'HD1733246683', '30', 'Nguyenvietdung', '2', '1', 1, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 99000, '2024-12-03 18:27:03', 'Hủy đơn hàng'),
(13, 'HD1733246845', '30', 'Nguyenvietdung', '2', '1', 1, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 99000, '2024-12-03 18:29:01', 'Hủy đơn hàng'),
(14, 'HD1733246977', '30', 'Nguyenvietdung', '2', '1', 1, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 99000, '2024-12-04 06:01:04', 'Hủy đơn hàng'),
(15, 'HD1733317854', '30', 'Nguyenvietdung', '2', '1', 1, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 9000, '2024-11-21', 'Hủy đơn hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordersuccessful`
--

CREATE TABLE `ordersuccessful` (
  `id` int(11) NOT NULL,
  `ma_hoadon` varchar(50) NOT NULL,
  `ma_khachhang` varchar(50) NOT NULL,
  `tenkhachhang` varchar(100) DEFAULT NULL,
  `ma_sp` varchar(50) DEFAULT NULL,
  `tensp` varchar(100) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `phone` int(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tinhthanhpho` varchar(50) DEFAULT NULL,
  `quanhuyen` varchar(50) DEFAULT NULL,
  `diachigiaohang` varchar(200) DEFAULT NULL,
  `tongtien` int(11) DEFAULT NULL,
  `createdate` varchar(100) NOT NULL,
  `trangthai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ordersuccessful`
--

INSERT INTO `ordersuccessful` (`id`, `ma_hoadon`, `ma_khachhang`, `tenkhachhang`, `ma_sp`, `tensp`, `soluong`, `phone`, `email`, `tinhthanhpho`, `quanhuyen`, `diachigiaohang`, `tongtien`, `createdate`, `trangthai`) VALUES
(21, 'HD1733288532', '30', 'Nguyenvietdung', 'aothun', 'áo thun ', 1, 348189573, 'dung@gmail.com', 'Hà Nội', 'hà đông', 'Tổ 1 Phường Quyết Tâm', 396000, '2024-12-04 06:02:21', 'Đã thanh toán'),
(25, 'HD1733336145', '30', 'Nguyenvietdung', '2', '1', 1, 348189573, 'dung@gmail.com', 'Hà Nộia', 'hà đôngaa', 'Tổ 1 Phường Quyết Tâm', 8800, '2024-12-05', 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `ma_hoadon` varchar(100) DEFAULT NULL,
  `ma_khachhang` varchar(100) DEFAULT NULL,
  `tenkhachhang` varchar(100) DEFAULT NULL,
  `tongtien` varchar(100) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `rating` varchar(20) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productreviews`
--

INSERT INTO `productreviews` (`id`, `ma_hoadon`, `ma_khachhang`, `tenkhachhang`, `tongtien`, `createdate`, `rating`, `comment`) VALUES
(1, 'HD1733288532', '30', 'Nguyenvietdung', '396000', '2024-12-04', 'good', 's');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `hobbies` text DEFAULT NULL,
  `accessLevel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `phone`, `gender`, `nationality`, `address`, `hobbies`, `accessLevel`) VALUES
(30, 'Nguyenvietdung', 'DUNG', '$2y$10$CkTnvLYvt4CCLohXHWRtQ.aEiWKPBUJ1SQ5gDlOjSjh22i0FhrV6.', 'dung@gmail.com', '0348189573', 'Nam', 'Việt Nam', 'hà đông', 'Web', 'Nguoidung'),
(31, 'đào quỳnh trang', 'DungNguyen', '$2y$10$6UepFkUlZnBXnU7toB4yreQRskThyjnko1dg42bVzeVNlCieR.mvK', 'abc@gmail.com', '123', 'Nam', 'Việt Nam', 'sadsađá', 'Web', 'Nguoidung'),
(33, 'đào quỳnh trang', 'trang', '$2y$10$1.VxgHKuOhXL0JdPO9jWhep2j61LKOSRo1gK8TSlcyR3e2QuQSTpa', 'trang@gmail.com', '12312312312', 'Nam', 'Việt Nam', 'đại địa', 'Web', 'Nguoidung');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `adproduct`
--
ALTER TABLE `adproduct`
  ADD PRIMARY KEY (`Ma_sp`),
  ADD KEY `Ma_loaisp` (`Ma_loaisp`);

--
-- Chỉ mục cho bảng `adproducttype`
--
ALTER TABLE `adproducttype`
  ADD PRIMARY KEY (`ma_loaisp`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oderdetail`
--
ALTER TABLE `oderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderfailed`
--
ALTER TABLE `orderfailed`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ordersuccessful`
--
ALTER TABLE `ordersuccessful`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `oderdetail`
--
ALTER TABLE `oderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `orderfailed`
--
ALTER TABLE `orderfailed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `ordersuccessful`
--
ALTER TABLE `ordersuccessful`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `adproduct`
--
ALTER TABLE `adproduct`
  ADD CONSTRAINT `adproduct_ibfk_1` FOREIGN KEY (`Ma_loaisp`) REFERENCES `adproducttype` (`ma_loaisp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

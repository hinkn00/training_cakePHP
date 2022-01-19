-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 19, 2022 lúc 11:21 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `train`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `o_status` int(50) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `id_product`, `quantity`, `o_status`, `create_at`) VALUES
(11, 37, 52, 4, 3, '2022-01-19'),
(13, 38, 54, 1, 2, '2022-01-19'),
(21, 37, 51, 1, 3, '2022-01-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_detail` varchar(255) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `p_status` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_detail`, `p_price`, `p_image`, `p_status`, `created_at`) VALUES
(51, 'Sản phẩm c', '123', 321, '1642400469_mvc.png', 1, '2022-01-17'),
(52, 'Sản phẩm b', '123', 321, '1642399454_mota_DB.png', 1, '2022-01-17'),
(53, 'Sản phẩm a', '3213', 2132, '1642399470_mota_DB.png', 1, '2022-01-17'),
(54, 'Sản phẩm d', '321', 123, '1642399687_mota_DB.png', 1, '2022-01-17'),
(55, 'Sản phẩm b2', '321', 12321, '1642399859_mota_DB.png', 1, '2022-01-17'),
(56, 'Sản phẩm b4', '23213', 21321, '1642399886_mvc.png', 1, '2022-01-17'),
(57, 'Sản phẩm c', '123', 321, '1642400682_mota_DB.png', 1, '2022-01-17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_token` varchar(255) NOT NULL,
  `verified` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `u_name`, `u_email`, `u_password`, `u_token`, `verified`, `role`, `created_at`, `update_at`) VALUES
(37, 'Nguyễn Thanh Tùng2', 'tung140520@gmail.com', '$2y$10$D0GPL8A9gUeyFPLs/xEwv.3PRQqEaMoB5Gg10HyNP9vtTnELUBXSK', '448d10d8cddb83ef0ccce18b4db5a380ca838a3e', 1, 1, '2022-01-10', NULL),
(38, 'Nguyen Thanh Tung', 'tungnt@ominext.com', '$2y$10$Ab1nV3bq0t5MhOxOvtEb5OZiyt3xuFE31.Hw50/EMwi1AZjgXkZmC', '566699bbbeb3394c06c8bc964146b5934ff3d208', 1, 0, '2022-01-10', NULL),
(40, 'Nguyễn Thanh Tùng', 'tung@gmail.com', '688e1154d0229275a3b9c01f1bfa48fb', 'c4fb85c80d24acae73aa58b48dbf3c5f252f1319', 0, 0, '2022-01-19', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product` (`id_product`),
  ADD KEY `fK_users` (`id_user`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT cho bảng `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fK_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

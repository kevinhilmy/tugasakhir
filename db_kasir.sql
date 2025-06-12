-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 07:32 AM
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
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_pesanan` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `id_detail` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `subtotal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_pesanan`, `id_produk`, `id_detail`, `jumlah`, `subtotal`) VALUES
(19, 6, 1, 1, 26000),
(21, 9, 2, 1, 27000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id` int(15) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`username`, `password`, `id`, `nama`, `email`, `role`) VALUES
('admin', 'admin', 1, 'admin', 'admin', 'admin'),
('abah', 'abah', 9, '', 'abah@gmail.com', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_akun` int(15) NOT NULL,
  `id_pesanan` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `total_produk` int(10) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembali` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_akun`, `id_pesanan`, `tanggal`, `total_produk`, `total_harga`, `bayar`, `kembali`) VALUES
(1, 1, '2025-06-12', 1, 17000, 40000000, 39983000),
(1, 2, '2025-06-12', 2, 77000, 100000, 23000),
(1, 18, '2025-06-12', 1, 26000, 50000, 24000),
(1, 19, '2025-06-12', 1, 26000, 50000, 24000),
(1, 20, '2025-06-12', 1, 24000, 27000, 3000),
(1, 21, '2025-06-12', 1, 27000, 30000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `gambar` varchar(50) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `harga_produk` int(10) NOT NULL,
  `stok_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`gambar`, `id_produk`, `nama_produk`, `harga_produk`, `stok_produk`) VALUES
('Espresso-removebg-preview.png', 2, 'Espresso', 25000, 62),
('creamy-latte-removebg-preview.png', 3, 'Creamy Latte', 17000, 50),
('Cappucino-removebg-preview.png', 4, 'Cappucino', 25000, 45),
('Mocha_Latte-removebg-preview.png', 5, 'Mocha Latte', 17000, 50),
('Iced_americano-removebg-preview.png', 6, 'Iced Americano', 26000, 50),
('Macchiato-removebg-preview.png', 7, 'Macchiato Latte', 24000, 50),
('cold brew.jpg', 8, 'Cold Brew', 24000, 50),
('cafe-au-lait-removebg-preview.png', 9, 'Cafe au Lait', 27000, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pesanan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `id_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pemesanan` (`id_pesanan`),
  ADD CONSTRAINT `id_produk` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD CONSTRAINT `id_akun` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

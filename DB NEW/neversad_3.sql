-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jan 2019 pada 12.39
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neversad_3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(2) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `nasabah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rek`, `nasabah`) VALUES
(1, 'Mandiri', '12345678987', 'Akko'),
(3, 'BNI', '1324569871254', 'Akko'),
(4, 'BTN', '132654897564123', 'Akko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `kode` varchar(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `ukuran` varchar(11) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kd_cus` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kd_cus`, `nama`, `alamat`, `no_telp`, `username`, `password`, `gambar`) VALUES
('20190112113739', 'halimah', 'tegal', '0987665553', 'halimah', 'd48d0eda40668aaa338ecec7130eb378d3b64026', '../admin/gambar_customer/koas.jpg'),
('20190115113904', 'Muhamad Agung Bahagia', 'Jl. Mawar No 25', '08523919293', 'username', '249ba36000029bbe97499c03db5a9001f6b734ec', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_kon` int(6) NOT NULL,
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `bayar_via` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` int(10) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL,
  `status` enum('Bayar','Belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_kon`, `nopo`, `kd_cus`, `bayar_via`, `tanggal`, `jumlah`, `bukti_transfer`, `status`) VALUES
(31, '20190108123514', '20190108123514', 'BNI', '2019-01-12 11:27:18', 204000, '../admin/bukti_transfer/koas.jpg', 'Bayar'),
(32, '20190112113739', '20190112113739', 'BNI', '2019-01-12 11:39:04', 595000, '../admin/bukti_transfer/3.jpg', 'Bayar'),
(33, '20190112113739', '20190112113739', 'Mandiri', '2019-01-12 19:44:32', 1275000, '../admin/bukti_transfer/9.jpg', 'Bayar'),
(34, '20190112113739', '20190112113739', 'BTN', '2019-01-12 19:59:54', 137000, '../admin/bukti_transfer/6.jpg', 'Bayar'),
(35, '20190112113739', '20190112113739', '0', '2019-01-15 05:59:29', 195000, '0', 'Belum'),
(36, '20190112113739', '20190112113739', '0', '2019-01-15 10:57:45', 65000, '0', 'Belum'),
(37, '20190115113904', '20190115113904', 'BNI', '2019-01-15 11:40:56', 200000, '../admin/bukti_transfer/koas.jpg', 'Bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `nopo` varchar(20) NOT NULL,
  `size` varchar(4) NOT NULL,
  `tanggalkirim` date NOT NULL,
  `tanggalexport` date NOT NULL,
  `status` enum('Proses','Selesai','Terkirim','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`nopo`, `size`, `tanggalkirim`, `tanggalexport`, `status`) VALUES
('20190108123514', '40', '2019-01-15', '2019-01-23', 'Terkirim'),
('20190112113739', '39', '2019-01-12', '2019-01-12', 'Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_terima`
--

CREATE TABLE `po_terima` (
  `id` int(10) NOT NULL,
  `nopo` varchar(20) NOT NULL,
  `kd_cus` varchar(20) NOT NULL,
  `kode` int(4) NOT NULL,
  `tanggal` datetime NOT NULL,
  `ukuran` varchar(4) NOT NULL,
  `qty` int(8) NOT NULL,
  `total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po_terima`
--

INSERT INTO `po_terima` (`id`, `nopo`, `kd_cus`, `kode`, `tanggal`, `ukuran`, `qty`, `total`) VALUES
(10, '20190108123514', '20190108123514', 24, '2019-01-12 11:27:08', '39', 1, 70000),
(12, '20190112113739', '20190112113739', 24, '2019-01-12 11:38:36', '39', 2, 140000),
(13, '20190112113739', '20190112113739', 23, '2019-01-12 11:38:47', '37', 2, 130000),
(14, '20190112113739', '20190112113739', 19, '2019-01-12 11:38:54', '38', 1, 325000),
(15, '20190112113739', '20190112113739', 21, '2019-01-12 19:41:14', '40', 2, 150000),
(16, '20190112113739', '20190112113739', 19, '2019-01-12 19:43:56', '38', 3, 975000),
(17, '20190112113739', '20190112113739', 21, '2019-01-12 19:44:17', '40', 2, 150000),
(18, '20190112113739', '20190112113739', 25, '2019-01-12 19:51:16', '38', 1, 67000),
(19, '20190112113739', '20190112113739', 24, '2019-01-12 19:59:43', '39', 1, 70000),
(20, '20190112113739', '20190112113739', 23, '2019-01-13 07:37:52', '37', 2, 130000),
(21, '20190112113739', '20190112113739', 23, '2019-01-15 05:59:15', '37', 1, 65000),
(22, '20190112113739', '20190112113739', 23, '2019-01-15 10:57:26', '38', 1, 65000),
(23, '20190115113904', '20190115113904', 23, '2019-01-15 11:39:56', '37', 2, 130000),
(24, '20190115113904', '20190115113904', 22, '2019-01-15 11:40:36', '38', 1, 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kode` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `harga` int(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `stok` int(3) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kode`, `nama`, `jenis`, `ukuran`, `harga`, `keterangan`, `stok`, `gambar`) VALUES
(17, 'Noble tan Black', 'Sepatu', '39', 650000, 'Bahan Cotton Combed 24s built up', 10, 'gambar_produk/3.jpg'),
(18, 'Alvy Black White', 'Sepatu', '30', 450000, 'Bahan cvc bandung build up tanpa jahitan samping', 24, 'gambar_produk/1.jpg'),
(19, 'Alvy Skyblue', 'Sepatu', '38', 325000, 'Bahan kardet jakarta', 7, 'gambar_produk/4.jpg'),
(20, 'Zach Grey White', 'Sepatu', '40', 512000, 'Bahan cvc bandung build up tanpa jahitan samping', 17, 'gambar_produk/6.jpg'),
(21, 'Alice White', 'Sandal', '40', 75000, 'Bahan Cotton Combed 20s Jahitan samping', 5, 'gambar_produk/2.jpg'),
(22, 'Angelonia White', 'Sandal', '38', 70000, 'Bahan Cotton Combed 24s built up', 15, 'gambar_produk/5.jpg'),
(23, 'sunset', 'Sandal', '37', 65000, 'Bahan karet ', 1, 'gambar_produk/7.jpg'),
(24, 'Stripe Logo Red', 'Sandal', '39', 70000, 'Bahan cvc bandung build up tanpa jahitan samping', 0, 'gambar_produk/8.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
('', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'gambar_admin/koas.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kd_cus`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_kon`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`nopo`);

--
-- Indexes for table `po_terima`
--
ALTER TABLE `po_terima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_kon` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `po_terima`
--
ALTER TABLE `po_terima`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kode` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

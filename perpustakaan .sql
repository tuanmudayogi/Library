-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 02:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id` int(11) NOT NULL,
  `denda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_denda`
--

INSERT INTO `tb_denda` (`id`, `denda`) VALUES
(1, '500\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `t_anggota`
--

CREATE TABLE `t_anggota` (
  `id_anggota` int(11) NOT NULL,
  `kode_anggota` varchar(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nis` int(6) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_anggota`
--

INSERT INTO `t_anggota` (`id_anggota`, `kode_anggota`, `nama`, `nis`, `tempat_lahir`, `alamat`, `kelas`) VALUES
(12, 'KA001', 'Yogi Kurnia Putra', 362241028, '', 'Jalan Aja Dulu Nomer 10C Kota Baghdad\r\n', '1A'),
(13, 'KA002', 'Muhammad Maksum', 362241009, '', 'Jalan Panjang Nan Jauh Di Mato Nomer 212B Kota Cileunyi\r\n', '2B'),
(14, 'KA003', 'Aulia', 362199800, '', 'Jalan Cigiringsing Nomer 21 Kota Bojong Soang', '4A'),
(15, 'KA004', 'Seman Sulaeman', 352211234, '', 'Jalan Merdeka Barat Timur Tengah Selatan Nomer 123 Kota Cimenyan', '6A'),
(16, 'KA005', 'Ahmad Naruto Bin Minato ', 352133432, '', 'Jalan Konoha Raya Nomer 69 Kota Bale Endah', '3B'),
(17, 'KA006', 'Neng Sandy', 362341099, '', 'Jalan Batu Karang Nomer 80 Kota Bikini Bottom', '5A'),
(18, 'KA007', 'Himawari Uzumaki', 362241287, '', 'Jalan Pelajar Pejuang Nomer 18 Kota Bandung', '4B');

-- --------------------------------------------------------

--
-- Table structure for table `t_buku`
--

CREATE TABLE `t_buku` (
  `id_buku` int(5) NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `id_penulis` varchar(50) NOT NULL,
  `id_penerbit` varchar(50) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `jumlah_buku` int(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_buku`
--

INSERT INTO `t_buku` (`id_buku`, `kode_buku`, `judul`, `id_penulis`, `id_penerbit`, `id_kategori`, `tahun_terbit`, `jumlah_buku`, `lokasi`) VALUES
(45, 'KB001', 'Bahasa Indonesia', 'Dadang Anton', 'Penerbit Erlangga', 'Bahasa', '2020', 20, 'Rak 1'),
(46, 'KB002', 'Aljabar Linear', 'Kakang Baginda Raja', 'Gramedia Pustaka Utama', 'Matematika', '2014', 12, 'Rak 5'),
(47, 'KB003', 'Sosial dan Budi Pekerti', 'Asep Saepuloh', 'Haum Media Publishing', 'IPS', '2012', 13, 'Rak 3'),
(48, 'KB004', 'Mengenal Anggota Tubuh', 'Dede Lesty', 'Mizan Publishing', 'IPA', '2021', 2, 'Rak 4'),
(49, 'KB005', 'Seni Tari Tradisional', 'Panji Gumilang', 'Gramedia Pustaka Utama', 'Seni Budaya', '2009', 22, 'Rak 2'),
(50, 'KB006', 'Belajar HTML Pemula', 'Tatang Sutarma', 'Penerbit Erlangga', 'Ilmu Komputer', '2021', 17, 'Rak 4'),
(51, 'KB007', 'Penggunaan SPSS dalam Menunjang Analisis Matematika', 'Haryoso Simatupang', 'Gramedia Pustaka Utama', 'Matematika', '2018', 0, 'Rak 3'),
(52, 'KB008', 'Metode Isolasi Patogen untuk Molekuler', 'Fitri Widiantini', 'Mizan Publishing', 'IPA', '2021', 0, 'Rak 1');

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori`
--

CREATE TABLE `t_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kategori`
--

INSERT INTO `t_kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`) VALUES
(7, 'KT001', 'Bahasa'),
(8, 'KT002', 'Agama'),
(9, 'KT003', 'Matematika'),
(10, 'KT004', 'Pancasila'),
(11, 'KT005', 'IPA'),
(12, 'KT006', 'IPS'),
(13, 'KT007', 'Ilmu Komputer'),
(15, 'KT009', 'Seni Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `t_lokasibuku`
--

CREATE TABLE `t_lokasibuku` (
  `id` int(11) NOT NULL,
  `rak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_lokasibuku`
--

INSERT INTO `t_lokasibuku` (`id`, `rak`) VALUES
(1, 'Rak 1'),
(2, 'Rak 2'),
(3, 'Rak 3'),
(4, 'Rak 4'),
(5, 'Rak 5');

-- --------------------------------------------------------

--
-- Table structure for table `t_penerbit`
--

CREATE TABLE `t_penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `kode_penerbit` varchar(25) NOT NULL,
  `nama_penerbit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_penerbit`
--

INSERT INTO `t_penerbit` (`id_penerbit`, `kode_penerbit`, `nama_penerbit`) VALUES
(5, 'P001', 'Sakeena Publishing'),
(6, 'P002', 'Mizan Publishing'),
(8, 'P003', 'Gramedia Pustaka Utama'),
(9, 'P004', 'Penerbit Erlangga'),
(10, 'P005', 'Haum Media Publishing');

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id` int(9) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `lambat` varchar(100) NOT NULL,
  `denda` varchar(100) DEFAULT NULL,
  `status` enum('Pinjam','Kembali','Hilang','Lunas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id`, `judul`, `nis`, `nama`, `tanggal_pinjam`, `tanggal_kembali`, `lambat`, `denda`, `status`) VALUES
(38, 'Mengenal Anggota Tubuh', '362241287', 'Himawari Uzumaki', '2023-09-25', '2023-10-27', '0', '0', 'Kembali'),
(39, 'Aljabar Linear', '362241028', 'Yogi Kurnia Putra', '2023-09-25', '2023-10-17', '0', '0', 'Kembali'),
(44, 'Sosial dan Budi Pekerti', '352211234', 'Seman Sulaeman', '2023-09-25', '2023-10-09', '0', '0', 'Hilang'),
(45, 'Metode Isolasi Patogen untuk Molekuler', '352133432', 'Ahmad Naruto Bin Minato ', '2023-09-25', '2023-10-09', '', NULL, 'Pinjam'),
(46, 'Mengenal Anggota Tubuh', '362241287', 'Himawari Uzumaki', '2023-09-10', '2023-09-17', '8', '4000', 'Hilang'),
(47, 'Mengenal Anggota Tubuh', '362341099', 'Neng Sandy', '2023-09-01', '2023-09-08', '', NULL, 'Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `no` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`no`, `username`, `password`) VALUES
(2, 'tmyogi', 'tmyogi'),
(3, 'maxieee', 'maxieee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_anggota`
--
ALTER TABLE `t_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `t_buku`
--
ALTER TABLE `t_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `t_lokasibuku`
--
ALTER TABLE `t_lokasibuku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_penerbit`
--
ALTER TABLE `t_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_anggota`
--
ALTER TABLE `t_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `t_buku`
--
ALTER TABLE `t_buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t_lokasibuku`
--
ALTER TABLE `t_lokasibuku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_penerbit`
--
ALTER TABLE `t_penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

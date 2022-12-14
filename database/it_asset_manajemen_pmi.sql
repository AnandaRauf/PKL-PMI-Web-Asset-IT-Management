-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2022 at 05:28 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventarisasi_kantor`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jenis_barang` varchar(50) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `jenis_barang`, `jumlah`, `keterangan`, `gambar`) VALUES
('11111', 'Flashdisk', 'Elektronik ', 8, '<p>Baru</p>', 0x666c6173686469736b2e706e67),
('12345', 'Laptop', 'Elektronik', 9, '<p>Baru</p>', 0x6c6170746f70312e706e67),
('34532', 'Komputer', 'Elektronik', 11, '<p>Baru</p>', 0x6b6f6d70757465722e706e67),
('7723', 'CPU', 'Elektronik', 7, '<p>Baru</p>', 0x6370752e6a7067),
('77231', 'Printer', 'Elektronik', 1, '<p>Baru</p>', 0x7072696e746572312e706e67),
('89247', 'Monitor', 'Elektronik', 1, '<p>Baru</p>', 0x6d6f6e69746f722e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `deskripsi`) VALUES
(1, 'Komputer', '<p>PC, Laptop, Notebook, dan Netbook</p>'),
(2, 'Smartphone', '<p>Handphone, iPhone, Tablet, iPad, dan Smartwatch </p>'),
(3, 'Elektronik', '<p>Proyektor, printer dll</p>');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `bagian` varchar(10) DEFAULT NULL,
  `gambar` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `jk`, `ttl`, `bagian`, `gambar`) VALUES
('20221004', 'Ananda Rauf Maududi', 'L', '2000-08-02', 'Biro IT', 0x616e616e64612d726175662d6d617564756469312e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_transaksi` varchar(12) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_transaksi`, `tgl_pengembalian`, `id_petugas`) VALUES
('20221004001', '2022-10-04', 11),
('20221004002', '2022-10-04', 11),
('20221004003', '2022-10-04', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `nik` varchar(10) DEFAULT NULL,
  `kode_barang` varchar(5) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nik`, `kode_barang`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `id_petugas`) VALUES
('20221004001', '1630511094', '12345', '2022-10-04', '2022-10-11', 'Y', 11),
('20221004002', '3435454', '12345', '2022-10-04', '2022-10-11', 'Y', 11),
('20221004003', '20221004', '7723', '2022-10-04', '2022-10-11', 'Y', 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_petugas`, `username`, `full_name`, `password`) VALUES
(1, 'heru_hh', 'Heru Haerudin', '$2y$05$Ede42suBOxA7JTcMcABaM..cXVsbgyXkwt.bp/g9C1Jjg4cEKsV1K'),
(9, 'Ahmad', 'Ahmad', '$2y$05$c540BVOq8um1JCUK5RJcVOMtNigLFdh9ABMM0n7JqAwnwZAVOQ/Im'),
(10, 'admin', 'admin', '$2y$05$D6hJSWTY0eLbkoPor7KvVu5rCdxaTpzVMlVhsAVyrm9nU0yUkVx32'),
(11, 'rauf', 'Ananda Rauf Maududi', '$2y$05$G2w3xzLUUSXSrKmD2HnjieZOzYlBmK2Ysc6TmYEsV5r9XwOjvhgt6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 10:06 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsbuahhati`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `id_subkat` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_subkat`, `nama_barang`, `stok`) VALUES
('BRG0001', 'SK0001', 'Albendazole', 40),
('BRG0002', 'SK0001', 'Paracetamol', 80),
('BRG0003', 'SK0001', 'Cataflam', 100),
('BRG0004', 'SK0001', 'Decolgen', 100),
('BRG0005', 'SK0001', 'Hydroxyzine', 100),
('BRG0006', 'SK0002', 'Beaker Glass', 100),
('BRG0007', 'SK0002', 'Gelas Ukur', 95),
('BRG0008', 'SK0002', 'Pipet Ukur', 100),
('BRG0009', 'SK0002', 'Spatula ', 100),
('BRG0010', 'SK0002', 'Erlenmeyer', 100),
('BRG0011', 'SK0003', 'Film Computer Radiografi', 100),
('BRG0012', 'SK0003', 'Film USG', 100),
('BRG0013', 'SK0003', 'USG Gel', 100),
('BRG0014', 'SK0003', 'FIlm USG (Warna)', 100),
('BRG0015', 'SK0003', 'Amplop Film', 100),
('BRG0016', 'SK0004', 'GIC HS Posterior Powder', 100),
('BRG0017', 'SK0004', 'GIC HS Posterior Liquid', 100),
('BRG0018', 'SK0004', 'GIC Cement Powder', 100),
('BRG0019', 'SK0005', 'Termometer', 80),
('BRG0020', 'SK0005', 'Tensimeter', 90),
('BRG0021', 'SK0005', 'Pulse Oximeter', 100),
('BRG0022', 'SK0006', 'Stetoskop', 100),
('BRG0023', 'SK0006', 'Timbangan', 100),
('BRG0024', 'SK0006', 'Senter Medis', 100);

-- --------------------------------------------------------

--
-- Table structure for table `brg_keluar`
--

CREATE TABLE `brg_keluar` (
  `id_keluar` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brg_keluar`
--

INSERT INTO `brg_keluar` (`id_keluar`, `tgl`, `id_barang`, `jumlah`, `keterangan`, `status`, `nama`) VALUES
('KEL0001', '2021-11-07', 'BRG0001', 10, 'Rusak', 'Telah di setujui', 'Operator 1'),
('KEL0002', '2021-11-08', 'BRG0002', 10, 'Hilang', 'Ditolak', 'Operator 1'),
('KEL0003', '2021-11-09', 'BRG0007', 5, 'Pecah', 'Telah di setujui', 'Operator 1'),
('KEL0004', '2021-11-11', 'BRG0008', 10, '5 Pecah\r\n5 Retak', 'Belum di setujui', 'Operator 1');

-- --------------------------------------------------------

--
-- Table structure for table `brg_masuk`
--

CREATE TABLE `brg_masuk` (
  `id_masuk` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brg_masuk`
--

INSERT INTO `brg_masuk` (`id_masuk`, `tgl`, `id_barang`, `jumlah`, `nama`) VALUES
('MAS0001', '2021-11-05', 'BRG0001', 100, 'Operator 1'),
('MAS0002', '2021-11-05', 'BRG0002', 100, 'Operator 1'),
('MAS0003', '2021-11-05', 'BRG0003', 100, 'Operator 1'),
('MAS0004', '2021-11-06', 'BRG0004', 100, 'Operator 1'),
('MAS0005', '2021-11-06', 'BRG0005', 100, 'Operator 1'),
('MAS0006', '2021-11-06', 'BRG0006', 100, 'Operator 1'),
('MAS0007', '2021-11-07', 'BRG0007', 100, 'Operator 1'),
('MAS0008', '2021-11-07', 'BRG0008', 100, 'Operator 1'),
('MAS0009', '2021-11-07', 'BRG0009', 100, 'Operator 1'),
('MAS0010', '2021-11-07', 'BRG0010', 100, 'Operator 1'),
('MAS0011', '2021-11-08', 'BRG0011', 100, 'Operator 1'),
('MAS0012', '2021-11-08', 'BRG0012', 100, 'Operator 1'),
('MAS0013', '2021-11-08', 'BRG0013', 100, 'Operator 1'),
('MAS0014', '2021-11-09', 'BRG0014', 100, 'Operator 1'),
('MAS0015', '2021-11-09', 'BRG0015', 100, 'Operator 1'),
('MAS0016', '2021-11-10', 'BRG0016', 100, 'Operator 1'),
('MAS0017', '2021-11-10', 'BRG0017', 100, 'Operator 1'),
('MAS0018', '2021-11-10', 'BRG0018', 100, 'Operator 1'),
('MAS0019', '2021-11-11', 'BRG0019', 100, 'Operator 1'),
('MAS0020', '2021-11-11', 'BRG0020', 100, 'Operator 1'),
('MAS0021', '2021-11-11', 'BRG0021', 100, 'Operator 1'),
('MAS0022', '2021-11-11', 'BRG0022', 100, 'Operator 1'),
('MAS0023', '2021-11-11', 'BRG0023', 100, 'Operator 1'),
('MAS0024', '2021-11-11', 'BRG0024', 100, 'Operator 1');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KAT0001', 'Farmasi'),
('KAT0002', 'Barang Umum'),
('KAT0003', 'Barang Gizi');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nma_peminjam` varchar(50) NOT NULL,
  `id_unit` varchar(10) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `id_barang`, `nma_peminjam`, `id_unit`, `jumlah`, `tgl_pinjam`, `tgl_pengembalian`, `status`) VALUES
('PIN0001', 'BRG0021', 'Staff Unit 1', 'UN0003', 10, '2021-11-09', '2021-11-11', 'Telah di kembalikan'),
('PIN0002', 'BRG0023', 'Staff Unit 1', 'UN0002', 5, '2021-11-10', '0000-00-00', 'Ditolak'),
('PIN0003', 'BRG0024', 'Staff Unit 1', 'UN0004', 30, '2021-11-11', '0000-00-00', 'Belum di setujui');

-- --------------------------------------------------------

--
-- Table structure for table `penyerahan`
--

CREATE TABLE `penyerahan` (
  `id_penyerahan` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nma_penerima` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `id_unit` varchar(10) NOT NULL,
  `tgl_penyerahan` date NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyerahan`
--

INSERT INTO `penyerahan` (`id_penyerahan`, `id_barang`, `nma_penerima`, `jumlah`, `id_unit`, `tgl_penyerahan`, `nama`) VALUES
('PEN0001', 'BRG0001', 'Adi', 50, 'UN0001', '2021-11-08', 'Operator 1'),
('PEN0002', 'BRG0002', 'Putri', 20, 'UN0001', '2021-11-09', 'Operator 1'),
('PEN0003', 'BRG0019', 'Putra', 20, 'UN0002', '2021-11-10', 'Operator 1'),
('PEN0004', 'BRG0020', 'Agung', 10, 'UN0002', '2021-11-11', 'Operator 1');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id_perbaikan` varchar(10) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `tgl` date NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `pemohon` varchar(50) NOT NULL,
  `id_unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perbaikan`
--

INSERT INTO `perbaikan` (`id_perbaikan`, `id_barang`, `jumlah`, `tgl`, `file`, `status`, `pemohon`, `id_unit`) VALUES
('PER0001', 'BRG0020', 5, '2021-11-08', 'Surat Perbaikan Barang.pdf', 'Selesai', 'Staff Unit 1', 'UN0002'),
('PER0002', 'BRG0019', 10, '2021-11-09', 'Surat Perbaikan Barang.pdf', 'Ditolak', 'Staff Unit 1', 'UN0004'),
('PER0003', 'BRG0022', 10, '2021-11-10', 'Surat Perbaikan Barang.pdf', 'Telah di setujui', 'Staff Unit 1', 'UN0003'),
('PER0004', 'BRG0023', 5, '2021-11-11', 'Surat Perbaikan Barang.pdf', 'Belum di setujui', 'Staff Unit 1', 'UN0002');

-- --------------------------------------------------------

--
-- Table structure for table `subkat`
--

CREATE TABLE `subkat` (
  `id_subkat` varchar(10) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `nama_subkat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subkat`
--

INSERT INTO `subkat` (`id_subkat`, `id_kategori`, `nama_subkat`) VALUES
('SK0001', 'KAT0001', 'Obat'),
('SK0002', 'KAT0001', 'Peralatan Lab'),
('SK0003', 'KAT0001', 'BHP Radiologi'),
('SK0004', 'KAT0001', 'BHP Gigi'),
('SK0005', 'KAT0002', 'Alat Medis'),
('SK0006', 'KAT0002', 'Alat Umum'),
('SK0007', 'KAT0003', 'Bahan Kering'),
('SK0008', 'KAT0003', 'Bahan Basah');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telp`) VALUES
('SUP0001', 'PT Ambawang', 'Jalan Fatmawati No.1 RT 02/RT021', '08991230485'),
('SUP0002', 'PT Avo', 'Jalan Fatmawati Raya No.5 RW 03/RT021 Jakarta Selatan Indonesia', '08213456728');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` varchar(10) NOT NULL,
  `nama_unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`) VALUES
('UN0001', 'Unit Farmasi'),
('UN0002', 'Unit Umum'),
('UN0003', 'Unit Rawat Inap'),
('UN0004', 'Unit Keperawatan'),
('UN0005', 'Unit Gizi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
('ID0001', 'Admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin'),
('ID0002', 'Operator 1', 'operator', '827ccb0eea8a706c4c34a16891f84e7b', 'Operator'),
('ID0003', 'Staff Unit 1', 'staffunit', '827ccb0eea8a706c4c34a16891f84e7b', 'Unit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `brg_subkat` (`id_subkat`);

--
-- Indexes for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `kel_brg` (`id_barang`);

--
-- Indexes for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `msk_brg` (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `pin_brg` (`id_barang`),
  ADD KEY `pin_unit` (`id_unit`);

--
-- Indexes for table `penyerahan`
--
ALTER TABLE `penyerahan`
  ADD PRIMARY KEY (`id_penyerahan`),
  ADD KEY `ser_brg` (`id_barang`),
  ADD KEY `ser_unit` (`id_unit`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `per_brg` (`id_barang`),
  ADD KEY `per_unit` (`id_unit`);

--
-- Indexes for table `subkat`
--
ALTER TABLE `subkat`
  ADD PRIMARY KEY (`id_subkat`),
  ADD KEY `sub_kat` (`id_kategori`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `brg_subkat` FOREIGN KEY (`id_subkat`) REFERENCES `subkat` (`id_subkat`);

--
-- Constraints for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  ADD CONSTRAINT `kel_brg` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD CONSTRAINT `msk_brg` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `pin_brg` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `pin_unit` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Constraints for table `penyerahan`
--
ALTER TABLE `penyerahan`
  ADD CONSTRAINT `ser_brg` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `ser_unit` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Constraints for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD CONSTRAINT `per_brg` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `per_unit` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Constraints for table `subkat`
--
ALTER TABLE `subkat`
  ADD CONSTRAINT `sub_kat` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 01:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `rm_obat`
--

CREATE TABLE `rm_obat` (
  `id` int(8) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rm_obat`
--

INSERT INTO `rm_obat` (`id`, `id_rm`, `id_obat`) VALUES
(1, 'a157f0a4-e64b-4e60-a1e4-7e1301651265', '250a68a9-74f8-496b-aa08-6d15e0c2f178'),
(2, '9d2a8762-54e0-446a-9f16-ca4a3dd75859', 'd432a1c2-6a15-11eb-bc9b-b06ebf1667bf'),
(3, '9d2a8762-54e0-446a-9f16-ca4a3dd75859', 'ebc4fa8a-6a11-11eb-bc9b-b06ebf1667bf'),
(4, '6c6bc2a6-a86d-4b55-9b3a-9ab6c4e16b64', '250a68a9-74f8-496b-aa08-6d15e0c2f178'),
(5, '6c6bc2a6-a86d-4b55-9b3a-9ab6c4e16b64', 'd432a1c2-6a15-11eb-bc9b-b06ebf1667bf'),
(6, '6c6bc2a6-a86d-4b55-9b3a-9ab6c4e16b64', 'ebc4fa8a-6a11-11eb-bc9b-b06ebf1667bf'),
(7, '6c6bc2a6-a86d-4b55-9b3a-9ab6c4e16b64', '5cdb286d-69f5-11eb-bc9b-b06ebf1667bf'),
(10, '4fc055df-cd7a-4c39-8892-ed6d82eda647', '250a68a9-74f8-496b-aa08-6d15e0c2f178');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `n_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `n_dokter`, `spesialis`, `alamat`, `telp`) VALUES
('57f3b51b-6abe-11eb-bc9b-b06ebf1667bf', 'Dokter Yola', 'Dokter Cinta', 'Kp. Pasir sereh', '085693797029'),
('57f3e3ab-6abe-11eb-bc9b-b06ebf1667bf', 'Dokter Holid', 'Dokter Rindu', 'Kp. Pasir Sereh', '085780781987');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `n_obat` varchar(50) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `n_obat`, `ket_obat`) VALUES
('250a68a9-74f8-496b-aa08-6d15e0c2f178', 'Baygon', 'Obat Paranti Modaran Rengit'),
('5cdb286d-69f5-11eb-bc9b-b06ebf1667bf', 'Paramex', 'Obat Pusing'),
('8eb9c0ce-c9be-4747-b514-d062c8c49629', 'gvgh', 'gghffchgf'),
('d432a1c2-6a15-11eb-bc9b-b06ebf1667bf', 'konimex', 'Obat Gila'),
('ebc48fea-6a11-11eb-bc9b-b06ebf1667bf', 'Panadol', 'Obat Puyeng'),
('ebc4fa8a-6a11-11eb-bc9b-b06ebf1667bf', 'Oskadon', 'Obat Stress');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `n_pasien` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `no_identitas`, `n_pasien`, `jk`, `alamat`, `telp`) VALUES
('3f8a9ff6-928a-48fa-b1d8-21378f8a1cbd', '35216341536', 'Buaya Darat', 'L', 'Kp. Rawa buntu', '53151352'),
('417f1f92-2856-433e-b616-4bce8a070070', '48586', 'jangkrik', 'L', 'Kp. Selokan', '452458'),
('42a8d91c-8b2a-4566-bd72-1c9f703ecd4d', '0123456789', 'Kadal Buntung', 'L', 'Kp. Sawah', '08798545663145'),
('46ea96c3-521e-4613-9efd-7c9cb37473b4', '9876543210', 'Copet', 'L', 'Kp. Kuwek', '085780781977'),
('4e18a554-d989-4c51-9177-6e87e85355f2', '4786748547', 'Bancet', 'L', 'Kp. Sawah', '524154153'),
('53b657e4-a4f8-45c5-a2f3-3d7a12334e1c', '564153641341', 'Rampog', 'L', 'Kp. Maling', '54534'),
('6c73cfe2-0c94-4cb7-9a83-9d27cebb20d4', '158456554', 'Kuntilanak', '', 'Kp. Angker', '849784122444'),
('7079024f-b00e-4c8b-8eb1-40d4539600e0', '52484524', 'Kelong Wewe', 'P', 'Kp. Kuburan', '4578485'),
('b179ad88-7b01-464d-b451-1a19027058ec', '534584135', 'Orai Banen', 'P', 'Kp. Liang Lahat', '31454153'),
('c63bd7a4-0825-49da-b2cb-c4ab3bc6a975', '789456112', 'Jurig', '', 'Kp. Makam', '08598748999'),
('cffa9720-15db-4bb6-8bec-e7cc85a3cd36', '53434136', 'Kangkrik', 'P', 'Kp. Selokan', '575486485647'),
('e4385c5a-5906-4b55-b512-bbea10cf20bd', '46474364366', 'Rokayah', 'P', 'Kp. Gajebo', '53241584188');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `n_poli` varchar(50) NOT NULL,
  `gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poli`, `n_poli`, `gedung`) VALUES
('53e6c9a3-6c6e-47d9-9205-7c2bee3e3912', 'Poli E', 'Lt. V'),
('d106dbf1-6a7c-11eb-bc9b-b06ebf1667bf', 'Poli A', 'J. Lt.VI'),
('d3d604aa-7454-4336-af62-619f5c1fea2c', 'Poli C', 'Lt. III'),
('d9636fe8-7ecd-498f-9b51-afe1fb5eb913', 'Poli F', 'Lt. VI'),
('db5e77c8-5215-4518-b02f-d9860237ddae', 'Poli D', 'Lt. IV'),
('eea18a2a-0865-4971-a877-4ef13113bf4b', 'Poli B', 'Lt. II');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tgl_periksa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekammedis`
--

INSERT INTO `tb_rekammedis` (`id_rm`, `id_pasien`, `keluhan`, `id_dokter`, `diagnosa`, `id_poli`, `tgl_periksa`) VALUES
('4fc055df-cd7a-4c39-8892-ed6d82eda647', 'b179ad88-7b01-464d-b451-1a19027058ec', '<h1><strong>Mabok Genjer</strong></h1>\r\n', '57f3e3ab-6abe-11eb-bc9b-b06ebf1667bf', '<h1><strong>Kebanyakan Makan Genjer</strong></h1>\r\n', 'd3d604aa-7454-4336-af62-619f5c1fea2c', '2021-02-11'),
('6c6bc2a6-a86d-4b55-9b3a-9ab6c4e16b64', '42a8d91c-8b2a-4566-bd72-1c9f703ecd4d', 'Mabok Cinta', '57f3b51b-6abe-11eb-bc9b-b06ebf1667bf', 'Kebanyakan Pacaran', '53e6c9a3-6c6e-47d9-9205-7c2bee3e3912', '2021-02-09'),
('9d2a8762-54e0-446a-9f16-ca4a3dd75859', '3f8a9ff6-928a-48fa-b1d8-21378f8a1cbd', 'jhhghv', '57f3b51b-6abe-11eb-bc9b-b06ebf1667bf', 'ghc', 'd3d604aa-7454-4336-af62-619f5c1fea2c', '2021-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `n_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`n_user`, `username`, `password`, `level`) VALUES
('30c538db-69bd-11eb-bc9b-b06ebf1667bf', 'holid', '7dd5a28bf6cb295049869e7b5b1546f5dac57760', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rm_obat`
--
ALTER TABLE `rm_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rm` (`id_rm`),
  ADD KEY `id_rm_2` (`id_rm`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD PRIMARY KEY (`id_rm`),
  ADD UNIQUE KEY `id_pasien_2` (`id_pasien`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_pasien_3` (`id_pasien`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`n_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rm_obat`
--
ALTER TABLE `rm_obat`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rm_obat`
--
ALTER TABLE `rm_obat`
  ADD CONSTRAINT `rm_obat_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rm_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);

--
-- Constraints for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 01:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_pm_laravel_10`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`) VALUES
(35, 'Wawan'),
(36, 'Intan'),
(37, 'Mirza'),
(38, 'Hilmi'),
(39, 'Bella'),
(40, 'Alfian');

-- --------------------------------------------------------

--
-- Table structure for table `aspek`
--

CREATE TABLE `aspek` (
  `id_aspek` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kode_aspek` varchar(100) NOT NULL,
  `persentase` float NOT NULL,
  `bobot_cf` float NOT NULL,
  `bobot_sf` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `aspek`
--

INSERT INTO `aspek` (`id_aspek`, `keterangan`, `kode_aspek`, `persentase`, `bobot_cf`, `bobot_sf`) VALUES
(29, 'Kecerdasan', 'C1', 30, 60, 40),
(30, 'Sikap Kerja', 'C2', 30, 70, 30),
(31, 'Perilaku', 'C3', 40, 65, 35);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_alternatif`, `nilai`) VALUES
(1, 35, 4.00875),
(2, 36, 4.29875),
(3, 37, 3.89),
(4, 38, 3.99875),
(5, 39, 3.50875),
(6, 40, 4.16375);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(50) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `nilai` int(100) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `id_aspek`, `deskripsi`, `nilai`, `jenis`) VALUES
(125, 'K1', 29, 'Common Sense', 3, 'Secondary Factor'),
(126, 'K2', 29, 'Verbalisasi Ide', 3, 'Secondary Factor'),
(127, 'K3', 29, 'Sistematika Berpikir', 4, 'Core Factor'),
(128, 'K4', 29, 'Penalaran dan Solusi Real', 4, 'Core Factor'),
(129, 'K5', 29, 'Konsentrasi', 3, 'Secondary Factor'),
(130, 'K6', 29, 'Logika Praktis', 4, 'Core Factor'),
(131, 'K7', 29, 'Fleksibilitas Berpikir', 4, 'Core Factor'),
(132, 'K8', 29, 'Imajinasi Kreatif', 5, 'Core Factor'),
(133, 'K9', 29, 'Antisipasi', 3, 'Secondary Factor'),
(134, 'K10', 29, 'Potensi Kecerdasan', 4, 'Core Factor'),
(135, 'S1', 30, 'Energi Psikis', 3, 'Secondary Factor'),
(136, 'S2', 30, 'Ketelitian dan tanggung jawab', 4, 'Core Factor'),
(137, 'S3', 30, 'Kehati-hatian', 2, 'Secondary Factor'),
(138, 'S4', 30, 'Pengendalian Perasaan', 3, 'Secondary Factor'),
(139, 'S5', 30, 'Dorongan Berprestasi', 3, 'Secondary Factor'),
(140, 'S6', 30, 'Vitalitas dan Perencanaan', 5, 'Core Factor'),
(141, 'P1', 31, 'Dominance (Kekuasaan)', 3, 'Secondary Factor'),
(142, 'P2', 31, 'Influences (Pengaruh)', 3, 'Secondary Factor'),
(143, 'P3', 31, 'Steadiness (Keteguhan Hati)', 4, 'Core Factor'),
(144, 'P4', 31, 'Compliance (Pemenuhan)', 5, 'Core Factor');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_aspek`, `id_kriteria`, `nilai`) VALUES
(506, 35, 29, 125, 2),
(507, 35, 29, 126, 4),
(508, 35, 29, 127, 3),
(509, 35, 29, 128, 3),
(510, 35, 29, 129, 2),
(511, 35, 29, 130, 2),
(512, 35, 29, 131, 4),
(513, 35, 29, 132, 3),
(514, 35, 29, 133, 2),
(515, 35, 29, 134, 3),
(516, 35, 30, 135, 3),
(517, 35, 30, 136, 4),
(518, 35, 30, 137, 3),
(519, 35, 30, 138, 1),
(520, 35, 30, 139, 3),
(521, 35, 30, 140, 1),
(522, 35, 31, 141, 4),
(523, 35, 31, 142, 4),
(524, 35, 31, 143, 4),
(525, 35, 31, 144, 4),
(526, 36, 29, 125, 3),
(527, 36, 29, 126, 5),
(528, 36, 29, 127, 4),
(529, 36, 29, 128, 3),
(530, 36, 29, 129, 4),
(531, 36, 29, 130, 4),
(532, 36, 29, 131, 3),
(533, 36, 29, 132, 5),
(534, 36, 29, 133, 4),
(535, 36, 29, 134, 3),
(536, 36, 30, 135, 1),
(537, 36, 30, 136, 5),
(538, 36, 30, 137, 5),
(539, 36, 30, 138, 5),
(540, 36, 30, 139, 5),
(541, 36, 30, 140, 2),
(542, 36, 31, 141, 3),
(543, 36, 31, 142, 3),
(544, 36, 31, 143, 4),
(545, 36, 31, 144, 5),
(546, 37, 29, 125, 5),
(547, 37, 29, 126, 3),
(548, 37, 29, 127, 2),
(549, 37, 29, 128, 4),
(550, 37, 29, 129, 2),
(551, 37, 29, 130, 2),
(552, 37, 29, 131, 4),
(553, 37, 29, 132, 2),
(554, 37, 29, 133, 3),
(555, 37, 29, 134, 4),
(556, 37, 30, 135, 2),
(557, 37, 30, 136, 3),
(558, 37, 30, 137, 3),
(559, 37, 30, 138, 3),
(560, 37, 30, 139, 4),
(561, 37, 30, 140, 2),
(562, 37, 31, 141, 3),
(563, 37, 31, 142, 4),
(564, 37, 31, 143, 5),
(565, 37, 31, 144, 3),
(566, 38, 29, 125, 3),
(567, 38, 29, 126, 4),
(568, 38, 29, 127, 3),
(569, 38, 29, 128, 3),
(570, 38, 29, 129, 2),
(571, 38, 29, 130, 3),
(572, 38, 29, 131, 4),
(573, 38, 29, 132, 2),
(574, 38, 29, 133, 4),
(575, 38, 29, 134, 4),
(576, 38, 30, 135, 4),
(577, 38, 30, 136, 5),
(578, 38, 30, 137, 5),
(579, 38, 30, 138, 1),
(580, 38, 30, 139, 4),
(581, 38, 30, 140, 1),
(582, 38, 31, 141, 4),
(583, 38, 31, 142, 3),
(584, 38, 31, 143, 4),
(585, 38, 31, 144, 4),
(586, 39, 29, 125, 4),
(587, 39, 29, 126, 4),
(588, 39, 29, 127, 3),
(589, 39, 29, 128, 3),
(590, 39, 29, 129, 4),
(591, 39, 29, 130, 3),
(592, 39, 29, 131, 2),
(593, 39, 29, 132, 3),
(594, 39, 29, 133, 3),
(595, 39, 29, 134, 2),
(596, 39, 30, 135, 4),
(597, 39, 30, 136, 2),
(598, 39, 30, 137, 2),
(599, 39, 30, 138, 4),
(600, 39, 30, 139, 5),
(601, 39, 30, 140, 2),
(602, 39, 31, 141, 4),
(603, 39, 31, 142, 5),
(604, 39, 31, 143, 5),
(605, 39, 31, 144, 2),
(606, 40, 29, 125, 3),
(607, 40, 29, 126, 3),
(608, 40, 29, 127, 3),
(609, 40, 29, 128, 1),
(610, 40, 29, 129, 2),
(611, 40, 29, 130, 5),
(612, 40, 29, 131, 3),
(613, 40, 29, 132, 2),
(614, 40, 29, 133, 5),
(615, 40, 29, 134, 4),
(616, 40, 30, 135, 4),
(617, 40, 30, 136, 5),
(618, 40, 30, 137, 4),
(619, 40, 30, 138, 3),
(620, 40, 30, 139, 5),
(621, 40, 30, 140, 3),
(622, 40, 31, 141, 4),
(623, 40, 31, 142, 3),
(624, 40, 31, 143, 3),
(625, 40, 31, 144, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_user_level`, `nama`, `email`, `username`, `password`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(7, 2, 'User', 'user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'Administrator'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `aspek`
--
ALTER TABLE `aspek`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_aspek` (`id_aspek`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_aspek` (`id_aspek`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `aspek`
--
ALTER TABLE `aspek`
  MODIFY `id_aspek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=688;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_aspek`) REFERENCES `aspek` (`id_aspek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_aspek`) REFERENCES `aspek` (`id_aspek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

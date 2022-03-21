-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2022 at 04:17 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kbs_skincare`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kulit`
--

CREATE TABLE `jenis_kulit` (
  `id_JK` int(11) NOT NULL,
  `nama_Jk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kulit`
--

INSERT INTO `jenis_kulit` (`id_JK`, `nama_Jk`) VALUES
(1, 'kulit normal'),
(9, 'kulit berminyak'),
(13, 'kulit kering'),
(19, 'kulit kombinasi');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_skincare`
--

CREATE TABLE `jenis_skincare` (
  `id_js` int(11) NOT NULL,
  `jenis_skincare` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_skincare`
--

INSERT INTO `jenis_skincare` (`id_js`, `jenis_skincare`) VALUES
(4, 'sabun cuci muka '),
(5, 'toner '),
(6, 'serum'),
(7, 'tabir surya ');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`) VALUES
(1, 'Tidak Berminyak'),
(2, 'Segar dan Halus'),
(3, 'Terlihat Sehat'),
(4, 'Tidak Berjerawat'),
(5, 'Pori-Pori Kulit Besar Terutama di Area Hidung,Pipi, Dagu'),
(6, 'Kulit di Bagian Wajah Terlihat Mengkilat'),
(7, 'Sering di Tumbuhi Jerawat'),
(8, 'Kulit wajah Terlihat Kering Sekali'),
(9, 'Pori-Pori Halus'),
(10, 'Tekstur Kulit Wajah Tipis'),
(11, 'Cepat Menampakan Kerutan di Wajah'),
(12, 'Sebagian Kulit Berminyak Dahi dan Hidung (T zone)'),
(13, 'Sebagian Kulit Kering Dagu dan Pipi'),
(14, 'Kadang Berjerawat');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_bobot`
--

CREATE TABLE `nilai_bobot` (
  `id_bobot` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_bobot`
--

INSERT INTO `nilai_bobot` (`id_bobot`, `keterangan`, `bobot`) VALUES
(1, 'kriteria tidak muncul ', 0),
(2, 'kriteria kurang muncul ', 0.25),
(3, 'kriteria agak muncul ', 0.75),
(4, 'kriteria yakin muncul ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `jenis_skincare` int(11) NOT NULL,
  `merek_produk` varchar(200) NOT NULL,
  `id_JK` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `rekomendasi` int(11) NOT NULL COMMENT 'favorite'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `jenis_skincare`, `merek_produk`, `id_JK`, `nama_produk`, `harga`, `gambar`, `rekomendasi`) VALUES
(1, 1, 'wardah', 1, 'C Defense Serum Productnation', 82500, '(10)C Defense Serum Productnation.png', 0),
(6, 4, 'wardah', 1, 'perfect bright creamy brightening +smoothing', 18500, '(1)Perfect Bright Creamy Brightening + Smoothing.img.png', 4),
(7, 5, 'wardah', 1, 'seaweed balancing toner', 25500, '(5)Seaweed Balancing Toner .img.png', 1),
(8, 6, 'wardah', 1, 'C Defense Serum Productnation', 82500, '(10)C Defense Serum Productnation.png', 0),
(9, 7, 'wardah', 1, 'sunscreen gel SPF 30', 30000, '(13) Sunscreen Gel Spf 30.png', 3),
(10, 4, 'emina', 1, 'bright stuff face wash', 13600, '(2)Bright Stuff Face Wash.img.png', 0),
(11, 5, 'emina', 1, 'the bright stuff face toner ', 27500, '(6)The Bright Stuff Face Toner.png', 0),
(12, 7, 'emina', 1, 'sun protection SPF 30 ', 29000, '(14) Sun Protection Spf 30.img.png', 2),
(13, 4, 'the body shop', 1, 'vitamin E face wash ', 169000, '(3)Vitamin E Face Wash.jfif', 2),
(14, 5, 'the body shop', 1, 'british rose petal-soft toner', 250000, '(7)British Rose Petal-Soft Toner.jfif', 0),
(15, 6, 'the body shop', 1, 'vitamin E overnight serum in oil', 330000, NULL, 1),
(16, 7, 'the body shop', 1, 'skin defence multi-protection essence', 429000, NULL, 2),
(17, 4, 'safi', 1, 'white expert purifying cleanser 2 in 1 ', 50000, NULL, 0),
(18, 4, 'mineral botanica ', 1, 'brightening facial foam', 25000, NULL, 1),
(19, 5, 'mineral botanica', 1, 'brightening toner ', 23000, NULL, 1),
(20, 6, 'mineral botanica ', 1, 'brightening face serum ', 90000, NULL, 0),
(21, 4, 'wardah ', 9, 'perfect bright creamy foam +oil control', 16000, NULL, 0),
(22, 5, 'wardah ', 9, 'acnederm pure refining toner ', 31500, NULL, 0),
(23, 6, 'wardah', 9, 'purifying serum ', 45000, NULL, 0),
(24, 4, 'wardah ', 9, 'sunscreen gel SPF 30 ', 30000, NULL, 0),
(25, 4, 'emina ', 9, 'double bubble face wash', 18500, NULL, 0),
(26, 4, 'emina', 9, 'bright stuff for acne prone skin ', 17500, NULL, 0),
(27, 5, 'emina ', 9, 'witch power face toner ', 27500, NULL, 0),
(28, 7, 'emina ', 9, 'sun protection SPF 30 ', 29000, NULL, 0),
(29, 4, 'the body shop', 9, 'tea tree skin clearing facial wash ', 169000, NULL, 1),
(30, 5, 'the body shop ', 9, 'tea tree skin clearing mattifying toner ', 200000, NULL, 0),
(31, 6, 'the body shop', 9, 'tea tree daily solution ', 350000, NULL, 2),
(32, 7, 'the body shop', 9, 'skin defence multi-protection essence SPF 50 Pa++++', 429000, NULL, 3),
(33, 4, 'safi ', 9, 'white expert oil control & anti acne facial cleanser ', 25000, NULL, 0),
(34, 5, 'safi ', 9, 'white expert oil control & anti acne 2 in 1 cleanser & toner ', 79000, NULL, 0),
(35, 4, 'mineral botanica ', 9, 'acne foaming facial wash ', 24000, NULL, 0),
(36, 6, 'mineral botanica ', 9, 'acne care serum ', 80000, NULL, 0),
(37, 4, 'wardah', 13, 'nature daily seaweed balancing facial wash ', 19000, NULL, 0),
(38, 5, 'wardah', 13, 'hydrating toner ', 38000, NULL, 0),
(39, 6, 'wardah', 13, 'lightening serum ampoule ', 60000, NULL, 0),
(40, 7, 'wardah', 13, 'sunscreen gel SPF 30', 30000, NULL, 0),
(41, 4, 'emina ', 13, 'dot burst face wash ', 18500, NULL, 0),
(42, 5, 'emina  ', 13, 'double the moist face toner', 27500, NULL, 0),
(43, 4, 'the body shop', 13, 'seaweed deep cleansing gel wash ', 152000, NULL, 0),
(44, 5, 'the body shop', 13, 'vitamin E hydrating toner ', 200000, NULL, 0),
(45, 7, 'the body shop', 13, 'Skin Defence Protection Face Mist SPF45 PA++ ', 429000, NULL, 0),
(46, 6, 'the body shop', 13, 'drops of youth concentrate ', 629000, NULL, 0),
(47, 4, 'safi ', 13, 'dermasafe gentel care mousse cleanser ', 80000, NULL, 0),
(48, 5, 'safi ', 13, 'white expert 2 in 1 cleanser & toner ', 25000, NULL, 0),
(49, 4, 'mineral botanica ', 13, 'brightening facial wash ', 75000, NULL, 0),
(50, 5, 'mineral botanica ', 13, 'brightening toner ', 25000, NULL, 0),
(51, 4, 'wardah', 19, 'lightening gentel wash ', 16000, NULL, 0),
(52, 4, 'wardah', 19, 'nature daily seaweed balancing facial wash ', 16000, NULL, 0),
(53, 5, 'wardah', 19, 'Nature daily seaweed balancing toner', 25500, NULL, 0),
(54, 6, 'wardah', 19, 'witch hazel purifying serum', 27500, NULL, 0),
(55, 4, 'emina ', 19, 'dot burst face wash ', 18500, NULL, 0),
(56, 5, 'emina', 19, 'witch power face toner ', 27500, NULL, 0),
(57, 4, 'the body shop', 19, 'seaweed deep cleansing gel wash ', 152000, NULL, 1),
(58, 5, 'the body shop', 19, 'seaweed oil balancing toner', 200000, NULL, 1),
(59, 6, 'the body shop', 19, 'Drops Of Light Brightening Serum ', 629000, NULL, 1),
(60, 7, 'the body shop', 19, 'seaweed oil control SPF 15', 629000, NULL, 1),
(61, 7, 'emina', 13, 'sun protection spf 30 Pa +++', 49500, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id` int(11) NOT NULL,
  `kategori_finansial` int(11) NOT NULL,
  `jenis_kulit` int(11) NOT NULL,
  `certainty` double NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id`, `kategori_finansial`, `jenis_kulit`, `certainty`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 43.75, '2022-02-28 15:04:18', '2022-02-28 15:04:18'),
(2, 3, 1, 43.75, '2022-02-28 15:05:47', '2022-02-28 15:05:47'),
(3, 3, 1, 43.75, '2022-02-28 15:12:21', '2022-02-28 15:12:21'),
(4, 3, 19, 56.388888888889, '2022-03-05 15:29:04', '2022-03-05 15:29:04'),
(5, 3, 19, 56.388888888889, '2022-03-05 15:40:22', '2022-03-05 15:40:22'),
(6, 2, 9, 50, '2022-03-06 05:26:59', '2022-03-06 05:26:59'),
(7, 2, 9, 50, '2022-03-06 05:32:13', '2022-03-06 05:32:13'),
(8, 2, 9, 50, '2022-03-06 05:32:20', '2022-03-06 05:32:20'),
(9, 5, 19, 61.904761904762, '2022-03-06 09:30:49', '2022-03-06 09:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi_produk`
--

CREATE TABLE `rekomendasi_produk` (
  `id` int(11) NOT NULL,
  `id_rekomendasi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekomendasi_produk`
--

INSERT INTO `rekomendasi_produk` (`id`, `id_rekomendasi`, `id_produk`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2022-02-28 15:04:18', '2022-02-28 15:04:18'),
(2, 1, 9, '2022-02-28 15:04:18', '2022-02-28 15:04:18'),
(3, 1, 18, '2022-02-28 15:04:18', '2022-02-28 15:04:18'),
(4, 2, 15, '2022-02-28 15:05:47', '2022-02-28 15:05:47'),
(5, 2, 19, '2022-02-28 15:05:47', '2022-02-28 15:05:47'),
(6, 3, 13, '2022-02-28 15:12:22', '2022-02-28 15:12:22'),
(7, 3, 16, '2022-02-28 15:12:22', '2022-02-28 15:12:22'),
(8, 3, 7, '2022-02-28 15:12:22', '2022-02-28 15:12:22'),
(9, 4, 58, '2022-03-05 15:29:04', '2022-03-05 15:29:04'),
(10, 4, 60, '2022-03-05 15:29:04', '2022-03-05 15:29:04'),
(11, 4, 59, '2022-03-05 15:29:04', '2022-03-05 15:29:04'),
(12, 5, 58, '2022-03-05 15:40:22', '2022-03-05 15:40:22'),
(13, 5, 60, '2022-03-05 15:40:22', '2022-03-05 15:40:22'),
(14, 5, 59, '2022-03-05 15:40:22', '2022-03-05 15:40:22'),
(15, 6, 31, '2022-03-06 05:27:00', '2022-03-06 05:27:00'),
(16, 6, 32, '2022-03-06 05:27:00', '2022-03-06 05:27:00'),
(17, 6, 29, '2022-03-06 05:27:00', '2022-03-06 05:27:00'),
(18, 7, 32, '2022-03-06 05:32:13', '2022-03-06 05:32:13'),
(19, 7, 31, '2022-03-06 05:32:13', '2022-03-06 05:32:13'),
(20, 8, 32, '2022-03-06 05:32:20', '2022-03-06 05:32:20'),
(21, 9, 57, '2022-03-06 09:30:50', '2022-03-06 09:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `sus_feedback`
--

CREATE TABLE `sus_feedback` (
  `id` int(11) NOT NULL,
  `feedback_id` varchar(16) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sus_feedback`
--

INSERT INTO `sus_feedback` (`id`, `feedback_id`, `id_soal`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, '3', 1, 5, '2022-03-21 20:46:02', '2022-03-21 20:46:02'),
(2, '3', 2, 5, '2022-03-21 20:46:02', '2022-03-21 20:46:02'),
(3, '3', 3, 5, '2022-03-21 20:46:02', '2022-03-21 20:46:02'),
(4, '3', 4, 5, '2022-03-21 20:46:02', '2022-03-21 20:46:02'),
(5, '3', 5, 5, '2022-03-21 20:46:02', '2022-03-21 20:46:02'),
(6, '3', 6, 5, '2022-03-21 20:46:02', '2022-03-21 20:46:02'),
(7, '3', 7, 5, '2022-03-21 20:46:02', '2022-03-21 20:46:02'),
(8, '3', 8, 5, '2022-03-21 20:46:02', '2022-03-21 20:46:02'),
(9, '3', 9, 5, '2022-03-21 20:46:02', '2022-03-21 20:46:02'),
(10, '3', 10, 5, '2022-03-21 20:46:02', '2022-03-21 20:46:02'),
(11, 'x4TeoptWhRb5ywO', 1, 4, '2022-03-21 21:34:22', '2022-03-21 21:34:22'),
(12, 'x4TeoptWhRb5ywO', 2, 1, '2022-03-21 21:34:22', '2022-03-21 21:34:22'),
(13, 'x4TeoptWhRb5ywO', 3, 4, '2022-03-21 21:34:23', '2022-03-21 21:34:23'),
(14, 'x4TeoptWhRb5ywO', 4, 3, '2022-03-21 21:34:23', '2022-03-21 21:34:23'),
(15, 'x4TeoptWhRb5ywO', 5, 5, '2022-03-21 21:34:23', '2022-03-21 21:34:23'),
(16, 'x4TeoptWhRb5ywO', 6, 5, '2022-03-21 21:34:23', '2022-03-21 21:34:23'),
(17, 'x4TeoptWhRb5ywO', 7, 3, '2022-03-21 21:34:23', '2022-03-21 21:34:23'),
(18, 'x4TeoptWhRb5ywO', 8, 4, '2022-03-21 21:34:23', '2022-03-21 21:34:23'),
(19, 'x4TeoptWhRb5ywO', 9, 5, '2022-03-21 21:34:23', '2022-03-21 21:34:23'),
(20, 'x4TeoptWhRb5ywO', 10, 4, '2022-03-21 21:34:23', '2022-03-21 21:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `sus_pertanyaan`
--

CREATE TABLE `sus_pertanyaan` (
  `id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sus_pertanyaan`
--

INSERT INTO `sus_pertanyaan` (`id`, `soal`, `created_at`, `updated_at`) VALUES
(1, 'Saya merasa sistem ini membantu saya dalam memilih skincare', '2022-03-11 19:42:03', '2022-03-11 19:42:03'),
(2, 'Saya merasa hasil jenis kulit tidak sesuai', '2022-03-11 19:42:03', '2022-03-11 19:42:03'),
(3, 'Saya merasa sistem ini mudah diguankan', '2022-03-11 19:42:03', '2022-03-11 19:42:03'),
(4, 'Saya merasa bingung menggunakan sistem inik', '2022-03-11 19:42:03', '2022-03-11 19:42:03'),
(5, 'Saya berfikir sistem ini akan saya gunakan lagi', '2022-03-11 19:42:03', '2022-03-11 19:42:03'),
(6, 'Saya merasa hasil rekomendasi tidak sesuai', '2022-03-11 19:42:03', '2022-03-11 19:42:03'),
(7, 'Saya merasa nyaman menggunakan sistem ini', '2022-03-11 19:42:03', '2022-03-11 19:42:03'),
(8, 'Saya merasa sistem ini rumit digunakan', '2022-03-11 19:42:03', '2022-03-11 19:42:03'),
(9, 'Saya merasa hasil rekomendasi tidak sesuai', '2022-03-11 19:42:03', '2022-03-11 19:42:03'),
(10, 'Saya merasa ada banyak hal yang tidak sesuai dengan sistem ini', '2022-03-11 19:42:03', '2022-03-11 19:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `username`, `level`) VALUES
(1, 'viera ', 'viecantik', 'viera_agustin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kulit`
--
ALTER TABLE `jenis_kulit`
  ADD PRIMARY KEY (`id_JK`);

--
-- Indexes for table `jenis_skincare`
--
ALTER TABLE `jenis_skincare`
  ADD PRIMARY KEY (`id_js`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_bobot`
--
ALTER TABLE `nilai_bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekomendasi_produk`
--
ALTER TABLE `rekomendasi_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sus_feedback`
--
ALTER TABLE `sus_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sus_pertanyaan`
--
ALTER TABLE `sus_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kulit`
--
ALTER TABLE `jenis_kulit`
  MODIFY `id_JK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jenis_skincare`
--
ALTER TABLE `jenis_skincare`
  MODIFY `id_js` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `nilai_bobot`
--
ALTER TABLE `nilai_bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rekomendasi_produk`
--
ALTER TABLE `rekomendasi_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sus_feedback`
--
ALTER TABLE `sus_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sus_pertanyaan`
--
ALTER TABLE `sus_pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

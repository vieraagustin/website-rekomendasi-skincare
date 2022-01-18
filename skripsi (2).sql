-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2021 pada 14.40
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kulit`
--

CREATE TABLE `jenis_kulit` (
  `id_JK` int(11) NOT NULL,
  `nama_Jk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kulit`
--

INSERT INTO `jenis_kulit` (`id_JK`, `nama_Jk`) VALUES
(1, 'kulit normal'),
(9, 'kulit berminyak'),
(13, 'kulit kering'),
(19, 'kulit kombinasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_skincare`
--

CREATE TABLE `jenis_skincare` (
  `id_js` int(11) NOT NULL,
  `jenis_skincare` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_skincare`
--

INSERT INTO `jenis_skincare` (`id_js`, `jenis_skincare`) VALUES
(4, 'sabun cuci muka '),
(5, 'toner '),
(6, 'serum'),
(7, 'tabir surya ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
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
-- Struktur dari tabel `nilai_bobot`
--

CREATE TABLE `nilai_bobot` (
  `id_bobot` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_bobot`
--

INSERT INTO `nilai_bobot` (`id_bobot`, `keterangan`, `bobot`) VALUES
(1, 'kriteria tidak muncul ', 0),
(2, 'kriteria kurang muncul ', 0.25),
(3, 'kriteria agak muncul ', 0.75),
(4, 'kriteria yakin muncul ', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `jenis_skincare` int(11) NOT NULL,
  `merek_produk` varchar(200) NOT NULL,
  `id_JK` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` INT(11) NULL DEFAULT NULL,
	`gambar` VARCHAR(255) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `jenis_skincare`, `merek_produk`, `id_JK`, `nama_produk`) VALUES
(1, 1, 'wardah', 1, 'C Defense Serum Productnation'),
(6, 4, 'wardah', 1, 'perfect bright creamy brightening +smoothing'),
(7, 5, 'wardah', 1, 'seaweed balancing toner'),
(8, 6, 'wardah', 1, 'C Defense Serum Productnation'),
(9, 7, 'wardah', 1, 'sunscreen gel SPF 30'),
(10, 4, 'emina', 1, 'bright stuff face wash'),
(11, 5, 'emina', 1, 'the bright stuff face toner '),
(12, 7, 'emina', 1, 'sun protection SPF 30 '),
(13, 4, 'the body shop', 1, 'vitamin E face wash '),
(14, 5, 'the body shop', 1, 'british rose petal-soft toner'),
(15, 6, 'the body shop', 1, 'vitamin E overnight serum in oil'),
(16, 7, 'the body shop', 1, 'skin defence multi-protection essence'),
(17, 4, 'safi', 1, 'white expert purifying cleanser 2 in 1 '),
(18, 4, 'mineral botanica ', 1, 'brightening facial foam'),
(19, 5, 'mineral botanica', 1, 'brightening toner '),
(20, 6, 'mineral botanica ', 1, 'brightening face serum '),
(21, 4, 'wardah ', 9, 'perfect bright creamy foam'),
(22, 5, 'wardah ', 9, 'purifying toner '),
(23, 6, 'wardah', 9, 'purifying serum '),
(24, 4, 'wardah ', 9, 'sunscreen gel SPF 30 '),
(25, 4, 'emina ', 9, 'double bubble face wash'),
(26, 4, 'emina', 9, 'bright stuff for acne prone skin '),
(27, 5, 'emina ', 9, 'witch power face toner '),
(28, 7, 'emina ', 9, 'sun protection SPF 30 '),
(29, 4, 'the body shop', 9, 'tea tree skin clearing facial wash '),
(30, 5, 'the body shop ', 9, 'tea tree skin clearing mattifying toner '),
(31, 6, 'the body shop', 9, 'tea tree daily solution '),
(32, 7, 'the body shop', 9, 'skin defence multi-protection essence SPF 50 Pa++++'),
(33, 4, 'safi ', 9, 'white expert oil control & anti acne facial cleanser '),
(34, 5, 'safi ', 9, 'white expert oil control & anti acne 2 in 1 cleanser & toner '),
(35, 4, 'mineral botanica ', 9, 'acne foaming facial wash '),
(36, 6, 'mineral botanica ', 9, 'acne care serum '),
(37, 4, 'wardah', 13, 'nature daily seaweed balancing facial wash '),
(38, 5, 'wardah', 13, 'hydrating toner '),
(39, 6, 'wardah', 13, 'hydrating facial serum '),
(40, 7, 'wardah', 13, 'sunscreen gel SPF 30'),
(41, 4, 'emina ', 13, 'dot burst face wash '),
(42, 5, 'emina  ', 13, 'double the moist face toner'),
(43, 4, 'the body shop', 13, 'seaweed deep cleansing gel wash '),
(44, 5, 'the body shop', 13, 'vitamin E hydrating toner '),
(45, 7, 'the body shop', 13, 'skin defence SPF 50'),
(46, 6, 'the body shop', 13, 'drops of youth concentrate '),
(47, 4, 'safi ', 13, 'dermasafe gentel care mousse cleanser '),
(48, 5, 'safi ', 13, 'white expert 2 in 1 cleanser & toner '),
(49, 4, 'mineral botanica ', 13, 'brightening facial wash '),
(50, 5, 'mineral botanica ', 13, 'brightening toner '),
(51, 4, 'wardah', 19, 'lightening gentel wash '),
(52, 4, 'wardah', 19, 'nature daily seaweed balancing facial wash '),
(53, 5, 'wardah', 19, 'purifying toner '),
(54, 6, 'wardah', 19, 'witch hazel purifying serum'),
(55, 4, 'emina ', 19, 'dot burst face wash '),
(56, 5, 'emina', 19, 'witch power face toner '),
(57, 4, 'the body shop', 19, 'seaweed deep cleansing gel wash '),
(58, 5, 'the body shop', 19, 'seaweed oil balancing toner'),
(59, 6, 'the body shop', 19, 'drops of youth emulsion '),
(60, 7, 'the body shop', 19, 'seaweed oil control SPF 15'),
(61, 7, 'emina', 13, 'sun protection spf 30 Pa +++');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `username`, `level`) VALUES
(1, 'viera ', 'viecantik', 'viera_agustin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_kulit`
--
ALTER TABLE `jenis_kulit`
  ADD PRIMARY KEY (`id_JK`);

--
-- Indeks untuk tabel `jenis_skincare`
--
ALTER TABLE `jenis_skincare`
  ADD PRIMARY KEY (`id_js`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_bobot`
--
ALTER TABLE `nilai_bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_kulit`
--
ALTER TABLE `jenis_kulit`
  MODIFY `id_JK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `jenis_skincare`
--
ALTER TABLE `jenis_skincare`
  MODIFY `id_js` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `nilai_bobot`
--
ALTER TABLE `nilai_bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

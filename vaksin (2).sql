-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2021 pada 06.42
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaksin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tt_lahir` varchar(50) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `nama`, `alamat`, `tt_lahir`, `kota`, `negara`, `kelamin`, `telp`, `about`) VALUES
(1, 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 'Muhammad Rafi Rahman Habibi', 'Pondok Bestari Indah, Landungsari, Dau', 'Banyumas, 18 Juni 2005', 'Surabaya', 'Indonesia', 'Laki-laki', '08885477865', 'Manusia biasa.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tgl_daftar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `email`, `password`, `nama`, `tgl_daftar`) VALUES
(1, 'alexander@gmail.com', 'b75bd008d5fecb1f50cf026532e8ae67', 'Alexander', 'Thursday, 25-Nov-2021 05:57:54'),
(2, 'indra@gmail.com', '643ae2b352a4917874655aedec5f52e1', 'Indra Wibowo', 'Thursday, 25-Nov-2021 05:54:41'),
(3, 'joni@gmail.com', '1c0ac25b077a885dc53d91b05b14544e', 'Joni', 'Saturday, 04-Dec-2021 12:55:45'),
(4, 'prabowo@gmail.com', '18a9867698b213c9e602ed4a4b2b4a36', 'Prabowo', 'Monday, 29-Nov-2021 11:11:05'),
(5, 'rafi@gmail.com', 'b2f0d9e408eccecc0edb74d654d36a72', 'Muhammad Rafi Rahman Habibi', 'Sunday, 05-Dec-2021 10:17:28'),
(6, 'rafirahman@gmail.com', 'b2f0d9e408eccecc0edb74d654d36a72', 'Muhammad Rafi Rahman Habibi', 'Monday, 29-Nov-2021 05:17:07'),
(7, 'rendra@gmail.com', '62b59bb5025e1be5a060ba38e1ccc707', 'Narendra Aryasuta Widodo', 'Sunday, 28-Nov-2021 18:36:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `sesi` varchar(200) NOT NULL,
  `antrian` varchar(200) NOT NULL,
  `tempat` varchar(222) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `sesi`, `antrian`, `tempat`, `jam`, `tanggal`) VALUES
(1, 'Sesi 1', '1 - 250', 'Stadion Gajayana Malang', '08.00 WIB - 10.00 WIB', '21 Januari 2022'),
(2, 'Sesi 2', '251 - 500', 'Stadion Gajayana Malang', '10.00 WIB - 12.00 WIB', '21 Januari 2022'),
(3, 'Sesi 3', '501 - 750', 'Stadion Gajayana Malang', '12.00 WIB - 14.00 WIB', '21 Januari 2022'),
(4, 'Sesi 4', '751 - 1000', 'Stadion Gajayana Malang', '14.00 WIB - 16.00 WIB', '21 Januari 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(200) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jml_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `telepon`, `alamat`, `jml_siswa`) VALUES
(20533660, 'SMA Negeri 1 Malang', '082733423467', 'Jl. Ijen', 900),
(20533664, 'SMA Negeri 2 Malang', '088853647434', ' Jl. Buntu', 990),
(20533665, 'SMA Negeri 3 Malang', '088834347323', 'Jl. Sultan', 934),
(20533667, 'SMA Negeri 4 Malang', '087733774253', 'Jl. Tugu', 902),
(20533668, 'SMA Negeri 5 Malang', '088345647534', 'Jl. Surabaya', 888),
(20533669, 'SMA Negeri 6 Malang', '088345647345', 'JL. Mayjen', 938),
(20533670, 'SMA Negeri 7 Malang', '088234677443', 'Jl. Bromo', 854),
(20533671, 'SMA Negeri 8 Malang', '08883452273', 'Jl. Semeru', 988),
(20533672, 'SMA Negeri 9 Malang', '088834347756', 'Jl. Anggrek', 878),
(20533673, 'SMA Negeri 10 Malang', '082733427499', 'Jl. Mawar', 865),
(20533674, 'SMA Negeri 11 Malang', '088345647766', 'Jl. Tikus', 880);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(8) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelamin` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tgl_daftar` varchar(100) DEFAULT NULL,
  `id_sekolah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `tgl_lahir`, `kelamin`, `email`, `tgl_daftar`, `id_sekolah`) VALUES
(1, 345, 'Prabowo', '2000-06-05', 'Laki-laki', 'prabowo@gmail.com', 'Monday, 29-Nov-2021 11:11:47', 20533671);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `nis_2` (`nis`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

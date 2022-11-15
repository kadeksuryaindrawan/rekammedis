-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2022 pada 16.28
-- Versi server: 10.4.17-MariaDB-log
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrekammedis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdokter`
--

CREATE TABLE `tbdokter` (
  `id_dokter` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbdokter`
--

INSERT INTO `tbdokter` (`id_dokter`, `id_user`, `nama`, `telp`, `alamat`) VALUES
(1, 2, 'Made Effendi', '0897621234', 'Dalung'),
(4, 3, 'Maman Hendrawan', '5645362456', 'Jawa Barat'),
(9, 4, 'Yayan Suryawan', '1234567', 'Ungasan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbktp`
--

CREATE TABLE `tbktp` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `status_kawin` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbrekammedis`
--

CREATE TABLE `tbrekammedis` (
  `id_rekammedis` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `sakit` varchar(100) NOT NULL,
  `pemeriksaan` text NOT NULL,
  `pengobatan` text NOT NULL,
  `lainnya` text NOT NULL,
  `tgl_periksa` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbusers`
--

CREATE TABLE `tbusers` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `level` enum('admin','dokter') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbusers`
--

INSERT INTO `tbusers` (`id_user`, `email`, `password`, `level`) VALUES
(1, 'admin@google.com', 'admin', 'admin'),
(2, 'efendi@gmail.com', 'efendi', 'dokter'),
(3, 'maman@yahoo.com', 'mamanracing', 'dokter'),
(4, 'yayan@gmail.com', 'yayan123', 'dokter');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbdokter`
--
ALTER TABLE `tbdokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indeks untuk tabel `tbktp`
--
ALTER TABLE `tbktp`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tbrekammedis`
--
ALTER TABLE `tbrekammedis`
  ADD PRIMARY KEY (`id_rekammedis`),
  ADD KEY `fk_ktp` (`nik`);

--
-- Indeks untuk tabel `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbdokter`
--
ALTER TABLE `tbdokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbrekammedis`
--
ALTER TABLE `tbrekammedis`
  MODIFY `id_rekammedis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbdokter`
--
ALTER TABLE `tbdokter`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `tbusers` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbrekammedis`
--
ALTER TABLE `tbrekammedis`
  ADD CONSTRAINT `fk_ktp` FOREIGN KEY (`nik`) REFERENCES `tbktp` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

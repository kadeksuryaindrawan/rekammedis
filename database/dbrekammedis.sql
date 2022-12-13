-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2022 pada 05.29
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
  `nama_dokter` varchar(60) DEFAULT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbdokter`
--

INSERT INTO `tbdokter` (`id_dokter`, `id_user`, `nama_dokter`, `telp`, `alamat`) VALUES
(3, 4, 'Dokter', '081999282738', 'Kuta Selatan'),
(6, 7, 'Dokter 2', '081328212', 'Denpasar'),
(7, 8, 'Made Afandi', '089762783422', 'Jalan Gunung Agung No 9');

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

--
-- Dumping data untuk tabel `tbktp`
--

INSERT INTO `tbktp` (`nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `gol_darah`, `alamat`, `kelurahan`, `kecamatan`, `agama`, `status_kawin`, `pekerjaan`, `kewarganegaraan`) VALUES
('2015354007', 'I Kadek Surya Indrawan', 'Denpasar', '2001-11-29', 'Laki-laki', 'O', 'Denpasar', 'Pemogan', 'Denpasar Selatan', 'Hindu', 'Belum Kawin', 'Karyawan Swasta', 'Indonesia'),
('2015354008', 'Made Mara', 'Badung', '2013-11-07', 'Perempuan', 'AB', 'Badung', 'Panjer', 'Denpasar Selatan', 'Hindu', 'Kawin', 'Mahasiswa', 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbrekammedis`
--

CREATE TABLE `tbrekammedis` (
  `id_rekammedis` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `sakit` varchar(100) NOT NULL,
  `jenis_penyakit` varchar(25) NOT NULL,
  `pemeriksaan` text NOT NULL,
  `alergi_obat` text NOT NULL,
  `pengobatan` text NOT NULL,
  `lainnya` text NOT NULL,
  `tgl_periksa` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbrekammedis`
--

INSERT INTO `tbrekammedis` (`id_rekammedis`, `id_dokter`, `nik`, `sakit`, `jenis_penyakit`, `pemeriksaan`, `alergi_obat`, `pengobatan`, `lainnya`, `tgl_periksa`) VALUES
(1, 3, '2015354007', 'Batuk Berdahak', 'Umum', 'Pemeriksaan tenggorokan, suhu badan', 'Paracetamol', 'Diberi sirup ABC Diminum 2 kali sehari biar jos', '-', '2022-11-16 06:42:56'),
(10, 3, '2015354007', 'Demam', 'Umum', 'Suhu tubuh dan tenggorokan', 'Paracetamol', 'Diberi Paracetamol', 'pemeriksaan mata kaki', '2022-11-16 14:44:40'),
(11, 3, '2015354008', 'Sakit mata', 'Khusus', 'bola mata', 'Paracetamol', 'obat tetes mata', '-', '2022-11-16 15:43:36'),
(14, 3, '2015354007', 'Flu', 'Umum', 'Pemeriksaan Hidung', 'Paracetamol', 'Antibiotik', '-', '2022-11-18 19:15:24'),
(20, 7, '2015354007', 'Kaki Gajah', '', 'Cek Tensi', 'Obat Luar', 'Salep', 'Ada', '2022-12-03 11:00:24');

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
(4, 'dokter@gmail.com', '$2y$12$HG1V6SFUS/H2cfQ7xQSllONUfAMC55e754zO11OtiLOxUdxJ58tjC', 'dokter'),
(5, 'admin@gmail.com', '$2y$12$UBnwKCnPdgDHnHyII38BFOs19txsZUUVxyk4cp8M6FHpby3Ri1DjC', 'admin'),
(7, 'dokter2@gmail.com', '$2y$12$AVPj46DQ8ub0h2bSaBripeEhKsHJiNBlMxFa8VHhT8TnGjYvCC4Su', 'dokter'),
(8, 'afandi@gmail.com', '$2y$12$fDiXUevvBlE2VDZTPN8a2ONC6o.yqfJ3Zz/Bl5VQD0y4vjVtKGEam', 'dokter');

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
  ADD KEY `fk_ktp` (`nik`),
  ADD KEY `id_dokter` (`id_dokter`);

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
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbrekammedis`
--
ALTER TABLE `tbrekammedis`
  MODIFY `id_rekammedis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `fk_ktp` FOREIGN KEY (`nik`) REFERENCES `tbktp` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbrekammedis_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `tbdokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

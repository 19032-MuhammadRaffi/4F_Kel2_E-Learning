-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2021 pada 06.29
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pbw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id` varchar(16) NOT NULL,
  `judul_materi` varchar(50) NOT NULL,
  `file_materi` varchar(100) NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id`, `judul_materi`, `file_materi`, `tgl_dibuat`) VALUES
(54, '19110', 'Materi 1', '60b88bcea15ab.pptx', '2021-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(5) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id` varchar(16) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_tugas`, `id`, `nilai`) VALUES
(139, 1, '19200', 50),
(140, 1, '19100', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(5) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `soal` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `pil_a` text NOT NULL,
  `pil_b` text NOT NULL,
  `pil_c` text NOT NULL,
  `pil_d` text NOT NULL,
  `jawaban` varchar(1) NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `id_tugas`, `soal`, `gambar`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `jawaban`, `tgl_dibuat`) VALUES
(12, 1, 'Apa yang dimaksud dengan Snaping', '6094575301f70.jpg', 'Ruang', 'Waktu', 'Penyimpanan', 'Alokasi', 'A', '2021-05-07'),
(13, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus voluptate id nihil nostrum, distinctio temporibus delectus a reprehenderit perspiciatis ad expedita nobis quam ea quae nisi quod atque voluptas. Libero!', '', 'Lorem A', 'Lorem B', 'Lorem C', 'Lorem D', 'A', '2021-05-07'),
(14, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus voluptate id nihil nostrum, distinctio temporibus delectus a reprehenderit perspiciatis ad expedita nobis quam ea quae nisi quod atque voluptas. Libero!', '', 'Lorem A', 'Lorem B', 'Lorem C', 'Lorem D', 'C', '2021-05-07'),
(15, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus voluptate id nihil nostrum, distinctio temporibus delectus a reprehenderit perspiciatis ad expedita nobis quam ea quae nisi quod atque voluptas. Libero!', '', 'Lorem A', 'Lorem B', 'Lorem C', 'Lorem D', 'D', '2021-05-07'),
(19, 8, 'Pertanyaan 1', '', 'Lorem A', 'Lorem B', 'Lorem C', 'Lorem D', 'A', '2021-05-31'),
(20, 8, 'Pertanyaan 2', '', 'Lorem A', 'Lorem B', 'Lorem C', 'Lorem D', 'A', '2021-05-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id` varchar(16) NOT NULL,
  `judul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id`, `judul`) VALUES
(1, '19032', 'Latihan 1'),
(8, '19032', 'Latihan 2'),
(9, '19110', 'UAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `wa` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `password`, `nama`, `jk`, `wa`, `alamat`, `status`) VALUES
('19032', '202cb962ac59075b964b07152d234b70', 'Muhammad Raffi', 'L', '081315550739', 'Perumnas Bumi Telukjambe Blok PC No.15', 'Guru'),
('19100', '202cb962ac59075b964b07152d234b70', 'Ramadhan', 'L', '08131552131', 'Bekasi', 'Siswa'),
('19110', '202cb962ac59075b964b07152d234b70', 'Ibrohim Husain', 'L', '08131552131', 'Cikampek', 'Guru'),
('19200', '827ccb0eea8a706c4c34a16891f84e7b', 'Ivan Rizwan M.D', 'L', '08131552122', 'Karawang', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `nip` (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `kd_tugas` (`id_tugas`),
  ADD KEY `nis` (`id`),
  ADD KEY `kd_tugas_2` (`id_tugas`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `kd_tugas` (`id_tugas`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `nip` (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

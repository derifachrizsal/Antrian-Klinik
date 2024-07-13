-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2024 pada 12.30
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_antrian_klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_antrian`
--

CREATE TABLE `tbl_antrian` (
  `id_antrian` int(6) NOT NULL,
  `id_pasien` int(6) NOT NULL,
  `id_dokter` int(6) NOT NULL,
  `poli` varchar(32) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `status_antrian` int(1) NOT NULL,
  `no_antrian` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(6) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `poli` varchar(15) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `no_telp` int(16) NOT NULL,
  `image_dokter` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id_dokter`, `nama`, `poli`, `alamat`, `jenis_kelamin`, `no_telp`, `image_dokter`) VALUES
(17, 'dr. Hoo Yumilia, SP. OG', 'kandungan', 'Bandung', 'P', 2147483647, '1720801281_1588671208e99dc1306c.png'),
(18, 'dr. Elise Johana Knoch, Sp.OG', 'kandungan', 'Jakarta', 'P', 2147483647, '1720801573_ec7e4f2e6a563877919d.webp'),
(19, 'dr. Tono Djuwantono, Sp.PD', 'umum', 'Bandung', 'L', 2147483647, '1720801627_9e8c0f4930e164515276.webp'),
(20, 'dr. Djonggi P Panggabean, Sp.PD', 'umum', 'Bandung', 'L', 2147483647, '1720801685_e892ee8de4fa617479ad.webp'),
(21, 'dr. Maximus Mudjur, Sp.A,M.Kes', 'anak', 'Jakarta', 'L', 2147483647, '1720801730_f7ef4f9271764d0db4fd.webp'),
(22, 'dr.Nana Agustina,Sp.KG', 'gigi', 'Bandung', 'P', 2147483647, '1720801771_59ef9aa4fa36c6c0431b.jpg'),
(24, 'Frans', 'gigi', 'jalan jalan', 'L', 2147483647, '1720864756_a166b2fea0b3b854d9a2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(6) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_lengkap` varchar(64) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `email` varchar(15) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `no_bpjs` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kode_pos` int(6) NOT NULL,
  `pendidikan_terakhir` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `nama`, `jenis_kelamin`, `gol_darah`, `tempat_lahir`, `tanggal_lahir`, `alamat_lengkap`, `no_telp`, `email`, `pekerjaan`, `no_bpjs`, `nik`, `kelurahan`, `kecamatan`, `kode_pos`, `pendidikan_terakhir`, `id_user`) VALUES
(5, 'Cika', 'P', 'A', 'Bandung', '2024-07-01', 'Bandung', 8123123, 'test@test.com', 'Karyawan Swasta', '123123', '123123', 'Bandung', 'Bandung', 40532, 'S-1', 2),
(6, 'lala', 'P', 'AB', 'bandung', '2005-06-11', 'jl lili sari ', 81234, 'wilandahaque@gm', 'Wirausaha', '788800', '23114', 'Bandung', 'banajaran', 40532, 'SMA', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(3) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `is_admin`) VALUES
(1, 'Admin', '$2y$10$JKf97.UA1M2uRnZJu9/Wg.SGoOakzjhcetcZcNYrmD7Be7KBkIFhK', 1),
(2, 'user', '$2y$10$E6bFz2JwMrLl18Mm9xV3duNgPp/.uVSeP03wZwynqq4tFYqnBxKQ6', 0),
(3, 'lala', '$2y$10$oKKqdi8UbJNMBkgYrsvQq.EQbB3wkIef8SInu6LpE/anPptmOHXVy', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indeks untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  MODIFY `id_antrian` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id_dokter` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

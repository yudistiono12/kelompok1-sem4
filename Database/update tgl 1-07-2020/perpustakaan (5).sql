-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2020 pada 17.22
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `autentikasi`
--

CREATE TABLE `autentikasi` (
  `id_autentikasi` int(7) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `autentikasi`
--

INSERT INTO `autentikasi` (`id_autentikasi`, `username`, `password`) VALUES
(1, 'TIF20180879', '$2y$10$GHLJjDmqalbJE5hEOGJsEO6vyd3T/tUPnV3T/TO3/IJcLqVrffZmC'),
(2, 'TIF20180880', '$2y$10$iA6lMulLpi8oKivdbIAEbOkSnPQXojBMxNPuCtMMTiHiBkZCLALT.'),
(4, 'Lk2005012001', '$2y$10$UcL.EXUwdA55v2.R9n69tu3PhXi4.0MnuLDAgybkEB.GK8O5vLA7q'),
(5, 'Lk1998021001', '$2y$10$jzSnUUH3d.rl92Lr6vF2..pMvaHMt.FhYmoiOsTlXYH1Upgn4RcvC'),
(6, 'TP201903101', '$2y$10$VQ67pt8BaKRrG6tVRYKyu.d8zUIRy04BSRix73FTc22LVU.vbeLvq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(15) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `ISBN` varchar(15) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `id_pengarang` int(3) NOT NULL,
  `asal_buku` int(2) NOT NULL,
  `id_penerbit` int(3) NOT NULL,
  `id_prodi` int(2) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `edisi` int(3) NOT NULL,
  `exp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `ISBN`, `id_kategori`, `id_pengarang`, `asal_buku`, `id_penerbit`, `id_prodi`, `tahun_terbit`, `edisi`, `exp`) VALUES
('1', 'pemrograman web', '123432', 6, 1, 2, 8, 3, '2020', 2, 10),
('2', 'Pemilihan lahan tamanaman', '7683432', 4, 1, 2, 8, 5, '2019', 1, 4),
('3', 'cara membuat kue ', '535535535', 4, 1, 1, 8, 4, '2019', 2, 10),
('4', 'belajar js ', '0987654', 7, 1, 3, 8, 3, '2019', 1, 2),
('5', 'tanaman holtikultura', '23t3443', 7, 1, 3, 8, 5, '4', 2009, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_buku`
--

CREATE TABLE `detail_buku` (
  `no_buku` varchar(15) NOT NULL,
  `id_buku` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_buku`
--

INSERT INTO `detail_buku` (`no_buku`, `id_buku`, `tanggal_masuk`, `status`) VALUES
('1', '1', '2020-07-01', 1),
('2', '2', '2020-07-01', 1),
('3', '3', '2020-07-01', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `id_jenis` int(2) NOT NULL,
  `id_autentikasi` int(7) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `no_tlp` varchar(14) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `id_jenis`, `id_autentikasi`, `nama`, `id_jabatan`, `no_tlp`, `foto`) VALUES
('197111151998021001', 3, 5, 'Adi Heru Utomo, S.Kom, M.Kom', 1, '0015117106', 'default.jpg'),
('197808192005012001', 3, 4, 'Ika Widiastuti, S.ST, MT', 1, '0019087803', 'default.jpg'),
('19940812201903101', 1, 6, 'Admin', 3, '900000900909', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(3) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis`) VALUES
(1, 'Petugas'),
(2, 'mahasiswa'),
(3, 'dosen'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(3) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'Majalah'),
(5, 'surat'),
(6, 'jurnal'),
(7, 'skripsi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(9) NOT NULL,
  `id_jenis` int(2) NOT NULL,
  `id_autentikasi` int(7) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `id_prodi` int(2) NOT NULL,
  `no_tlp` varchar(14) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `id_jenis`, `id_autentikasi`, `nama`, `angkatan`, `id_prodi`, `no_tlp`, `foto`) VALUES
('E41180879', 2, 1, 'Yudistiono', 2018, 3, '082221616544', '1593483129868.jpg'),
('E41180880', 2, 2, 'wicahyani', 2018, 3, '0873777898980', '1593483172576.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `no_buku` varchar(15) NOT NULL,
  `no_kartu` varchar(20) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pinjam` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `denda` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `id_jenis` int(2) NOT NULL,
  `id_autentifikasi` int(7) NOT NULL,
  `nama` varchar(13) NOT NULL,
  `alamat` varchar(32) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_asal_buku`
--

CREATE TABLE `tb_asal_buku` (
  `id_asal_buku` int(2) NOT NULL,
  `keterangan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_asal_buku`
--

INSERT INTO `tb_asal_buku` (`id_asal_buku`, `keterangan`) VALUES
(1, 'hibah'),
(2, 'pengadaan'),
(3, 'skripsi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `singkatan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`, `singkatan`) VALUES
(1, 'Lektor', 'Lk'),
(2, 'Asisten Ahli', 'AA'),
(3, 'Tenaga Pengajar', 'TP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id_penerbit` int(3) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `alamat` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id_penerbit`, `nama_penerbit`, `alamat`) VALUES
(8, 'Gramedia satu', 'bondowoso / jawatimur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengarang`
--

CREATE TABLE `tb_pengarang` (
  `id_pengarang` int(3) NOT NULL,
  `nama_pengarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengarang`
--

INSERT INTO `tb_pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(1, 'ki hajar dewantara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(2) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `prodi`, `jurusan`) VALUES
(3, 'Teknik Informatika', 'Teknologi Informasi'),
(4, 'Teknik Industri Pangan', 'Teknologi Pertanian'),
(5, 'Manajemen Agribisnis', 'Manajemen Agribisnis');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `autentikasi`
--
ALTER TABLE `autentikasi`
  ADD PRIMARY KEY (`id_autentikasi`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `pengarang_1` (`id_pengarang`),
  ADD KEY `asal_buku` (`asal_buku`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD PRIMARY KEY (`no_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_autentifikasi` (`id_autentikasi`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_autentifikasi` (`id_autentikasi`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_autentifikasi` (`id_autentifikasi`);

--
-- Indeks untuk tabel `tb_asal_buku`
--
ALTER TABLE `tb_asal_buku`
  ADD PRIMARY KEY (`id_asal_buku`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `autentikasi`
--
ALTER TABLE `autentikasi`
  MODIFY `id_autentikasi` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_asal_buku`
--
ALTER TABLE `tb_asal_buku`
  MODIFY `id_asal_buku` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  MODIFY `id_penerbit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  MODIFY `id_pengarang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `buku_ibfk_3` FOREIGN KEY (`asal_buku`) REFERENCES `tb_asal_buku` (`id_asal_buku`),
  ADD CONSTRAINT `buku_ibfk_4` FOREIGN KEY (`id_pengarang`) REFERENCES `tb_pengarang` (`id_pengarang`),
  ADD CONSTRAINT `buku_ibfk_6` FOREIGN KEY (`id_penerbit`) REFERENCES `tb_penerbit` (`id_penerbit`),
  ADD CONSTRAINT `buku_ibfk_7` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD CONSTRAINT `detail_buku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_autentikasi`) REFERENCES `autentikasi` (`id_autentikasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `dosen_ibfk_3` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_autentikasi`) REFERENCES `autentikasi` (`id_autentikasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`);

--
-- Ketidakleluasaan untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_autentifikasi`) REFERENCES `autentikasi` (`id_autentikasi`),
  ADD CONSTRAINT `petugas_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Membuat tabel peminjaman
DROP TABLE IF EXISTS `peminjaman`;

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal_peminjaman` DATE DEFAULT NULL,
  PRIMARY KEY (`id_peminjaman`),
  FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa`(`id_mhs`),
  FOREIGN KEY (`id_buku`) REFERENCES `buku`(`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Menambahkan beberapa data peminjaman contoh
INSERT INTO `peminjaman`(`id_mhs`, `id_buku`, `tanggal_peminjaman`) VALUES
(1, 1, '2025-03-14'),
(2, 2, '2025-03-15'),
(3, 3, '2025-03-16');

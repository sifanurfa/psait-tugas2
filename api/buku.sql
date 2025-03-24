CREATE DATABASE /*!32312 IF NOT EXISTS*/`sait_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `sait_db`;

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) DEFAULT NULL,
  `pengarang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Data untuk tabel buku
INSERT INTO `buku`(`id_buku`, `judul`, `pengarang`) VALUES 
(1, 'How to Train Your Cat', 'Simi'),
(2, 'How to Train Your Neko', 'Kiti'),
(3, 'How to Train Your Kucing', 'Mayo');

/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : evoting

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 10/11/2024 20:34:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Teguh Triatmojo', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2024-11-10 20:11:36');

-- ----------------------------
-- Table structure for ikut_kandidat
-- ----------------------------
DROP TABLE IF EXISTS `ikut_kandidat`;
CREATE TABLE `ikut_kandidat`  (
  `id_ikut_kandidat` int NOT NULL AUTO_INCREMENT,
  `id_voting` int NULL DEFAULT NULL,
  `id_kandidat` int NULL DEFAULT NULL,
  `poin` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_ikut_kandidat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ikut_kandidat
-- ----------------------------
INSERT INTO `ikut_kandidat` VALUES (9, 5, 2, 0);
INSERT INTO `ikut_kandidat` VALUES (10, 5, 3, 1);

-- ----------------------------
-- Table structure for ikut_voting
-- ----------------------------
DROP TABLE IF EXISTS `ikut_voting`;
CREATE TABLE `ikut_voting`  (
  `id_ikut` int NOT NULL AUTO_INCREMENT,
  `id_voting` int NULL DEFAULT NULL,
  `id_pemilih` int NULL DEFAULT NULL,
  `waktu` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_ikut`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ikut_voting
-- ----------------------------
INSERT INTO `ikut_voting` VALUES (3, 5, 6, '2024-11-10 20:23:00');

-- ----------------------------
-- Table structure for kandidat
-- ----------------------------
DROP TABLE IF EXISTS `kandidat`;
CREATE TABLE `kandidat`  (
  `id_kandidat` int NOT NULL AUTO_INCREMENT,
  `nama_kandidat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `foto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `semester` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `angkatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `visi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `misi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kandidat`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kandidat
-- ----------------------------
INSERT INTO `kandidat` VALUES (2, 'Teguh Triatmojo', 'MNP_0335_BIRU.jpg', '4', '2023', '<p>&nbsp;\"Menjadikan Himpunan Mahasiswa sebagai wadah yang solid, inklusif, dan inovatif dalam mengembangkan potensi akademik, keterampilan, dan karakter mahasiswa guna menciptakan generasi yang unggul, berdaya saing, serta siap berkontribusi positif bagi masyarakat dan bangsa.\"</p>', '<ol>\r\n<li>Membangun Solidaritas dan Kebersamaan</li>\r\n<li>Meningkatkan Kualitas Akademik dan Non-akademik</li>\r\n<li>Memfasilitasi Pengembangan Potensi Mahasiswa</li>\r\n</ol>');
INSERT INTO `kandidat` VALUES (3, 'Teguh Triatmojo', 'MNP_0335.JPG', '4', '2024', '<p>dede</p>', '<p>defdgregre</p>');

-- ----------------------------
-- Table structure for pemilih
-- ----------------------------
DROP TABLE IF EXISTS `pemilih`;
CREATE TABLE `pemilih`  (
  `id_pemilih` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `angkatan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `username` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  PRIMARY KEY (`id_pemilih`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemilih
-- ----------------------------
INSERT INTO `pemilih` VALUES (3, '33211019', 'Teguh Triatmojo', '2023', 'teguh', '261a794363c16c2a9969c2ee093673d6');
INSERT INTO `pemilih` VALUES (4, '3313718', 'hilmi raif hakim', '2023', 'hilmi', '202cb962ac59075b964b07152d234b70');
INSERT INTO `pemilih` VALUES (5, '32211020', 'aang', '2022', 'aang', '51288afeef7db2bdb9e63a83ca4d1b78');
INSERT INTO `pemilih` VALUES (6, '32211021', 'hafid', '2022', 'hafid', 'dc8f58593fe3bf6747f7ca75529e17b8');

-- ----------------------------
-- Table structure for voting
-- ----------------------------
DROP TABLE IF EXISTS `voting`;
CREATE TABLE `voting`  (
  `id_voting` int NOT NULL AUTO_INCREMENT,
  `nama_voting` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_voting` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_voting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of voting
-- ----------------------------
INSERT INTO `voting` VALUES (5, 'Pemilihan Ketua Himpunan Mahasiswa Teknik Informatika 2024/2025', 'aktif');

-- ----------------------------
-- Triggers structure for table voting
-- ----------------------------
DROP TRIGGER IF EXISTS `delete_voting`;
delimiter ;;
CREATE TRIGGER `delete_voting` BEFORE DELETE ON `voting` FOR EACH ROW BEGIN
	DELETE FROM ikut_kandidat WHERE ikut_kandidat.id_voting=OLD.id_voting;
	DELETE FROM ikut_voting WHERE ikut_voting.id_voting=OLD.id_voting;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;

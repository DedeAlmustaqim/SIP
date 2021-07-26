/*
 Navicat Premium Data Transfer

 Source Server         : MySql80
 Source Server Type    : MySQL
 Source Server Version : 80025
 Source Host           : localhost:3308
 Source Schema         : db_sip

 Target Server Type    : MySQL
 Target Server Version : 80025
 File Encoding         : 65001

 Date: 25/06/2021 11:45:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_dak_non_fisik
-- ----------------------------
DROP TABLE IF EXISTS `tbl_dak_non_fisik`;
CREATE TABLE `tbl_dak_non_fisik`  (
  `id_non_fisik` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '-',
  `id_bln` int NULL DEFAULT NULL,
  `id_unit` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `urut` int NOT NULL AUTO_INCREMENT,
  `keg` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `per_vol` int NULL DEFAULT 0,
  `per_satuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '-',
  `per_jlm_penerima` int NULL DEFAULT 0,
  `pagu` decimal(14, 2) NULL DEFAULT NULL,
  `jns_mekanisme` enum('Kontraktual','Swakelola','-') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '-',
  `mek_vol_swa` int NULL DEFAULT 0,
  `mek_nilai_swa` decimal(14, 2) UNSIGNED NULL DEFAULT 0.00,
  `mek_vol_kon` int NULL DEFAULT 0,
  `mek_nilai_kon` decimal(14, 2) NULL DEFAULT 0.00,
  `mek_metode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '-',
  `real_keu` decimal(14, 2) NULL DEFAULT 0.00,
  `real_keu_per` decimal(3, 2) NULL DEFAULT 0.00,
  `real_fik` decimal(3, 2) NULL DEFAULT 0.00,
  `kodefikasi` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '-',
  `status_dak_non_fisik` int NULL DEFAULT 0,
  PRIMARY KEY (`urut`) USING BTREE,
  INDEX `id_bln`(`id_bln`) USING BTREE,
  INDEX `id_unit`(`id_unit`) USING BTREE,
  CONSTRAINT `tbl_dak_non_fisik_ibfk_1` FOREIGN KEY (`id_bln`) REFERENCES `tbl_bln` (`id_bln`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_dak_non_fisik_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `tbl_unit` (`id_unit`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_dak_non_fisik
-- ----------------------------
INSERT INTO `tbl_dak_non_fisik` VALUES ('gsHG65Sc9h0B1bI7Oj8mzCKeL', 1, 'oysvxho19c0cbc3le3lck6fvq', '2021', 36, 'Bidang Pendidikan PAUD (Reguler)', 0, '-', 0, 830478000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('ydkW1CMPZpQlYGST6Xnuq8BNL', 2, 'oysvxho19c0cbc3le3lck6fvq', '2021', 37, 'Bidang Pendidikan PAUD (Reguler)', 0, '-', 0, 830478000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('X3WMgbBe0Cvnq7HGotdhD1ELu', 3, 'oysvxho19c0cbc3le3lck6fvq', '2021', 38, 'Bidang Pendidikan PAUD (Reguler)', 0, '-', 0, 830478000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('3eTpl7WEksxghVJRtALy1o5fN', 4, 'oysvxho19c0cbc3le3lck6fvq', '2021', 39, 'Bidang Pendidikan PAUD (Reguler)', 0, '-', 0, 830478000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('e5G4WPE1hHmFg9TKsQn7CJNLZ', 5, 'oysvxho19c0cbc3le3lck6fvq', '2021', 40, 'Bidang Pendidikan PAUD (Reguler)', 0, '-', 0, 830478000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('emzBluwDRFbyUHgh4qG7Axjpd', 6, 'oysvxho19c0cbc3le3lck6fvq', '2021', 41, 'Bidang Pendidikan PAUD (Reguler)', 0, '-', 0, 830478000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('VhSA2Ev8clUPtqk4xWYa6gJ13', 7, 'oysvxho19c0cbc3le3lck6fvq', '2021', 42, 'Bidang Pendidikan PAUD (Reguler)', 0, '-', 0, 830478000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('RetU5bHpOFY8PlMmK93NLQXsg', 8, 'oysvxho19c0cbc3le3lck6fvq', '2021', 43, 'Bidang Pendidikan PAUD (Reguler)', 0, '-', 0, 830478000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('kY4OG5NUjA8RSctfo7D1KMzVF', 9, 'oysvxho19c0cbc3le3lck6fvq', '2021', 44, 'Bidang Pendidikan PAUD (Reguler)', 0, '-', 0, 830478000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('IOGo2cME0Rxar5UtgJL4VqjTs', 10, 'oysvxho19c0cbc3le3lck6fvq', '2021', 45, 'Bidang Pendidikan PAUD (Reguler)', 0, '-', 0, 830478000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('2i4Mrp8jhfUBmzsPHJeX6Salx', 11, 'oysvxho19c0cbc3le3lck6fvq', '2021', 46, 'Bidang Pendidikan PAUD (Reguler)', 0, '-', 0, 830478000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('DcaQhnbNFdZGzRtm1Il4orgWE', 12, 'oysvxho19c0cbc3le3lck6fvq', '2021', 47, 'Bidang Pendidikan PAUD (Reguler)', 0, '-', 0, 830478000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('fcNWLbIxysDpPq0KZujVYaBwF', 1, 'oysvxho19c0cbc3le3lck6fvq', '2021', 48, 'Bidang Pendidikan SD (Reguler)', 0, '-', 0, 18246505000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('QnlJmvN1jSHaTwO37ydstr0RB', 2, 'oysvxho19c0cbc3le3lck6fvq', '2021', 49, 'Bidang Pendidikan SD (Reguler)', 0, '-', 0, 18246505000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('sLO8jRua2EzDc9ZVKd7hgNo56', 3, 'oysvxho19c0cbc3le3lck6fvq', '2021', 50, 'Bidang Pendidikan SD (Reguler)', 0, '-', 0, 18246505000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('V6BS2nms0ND5JUkiQZu9O4XLg', 4, 'oysvxho19c0cbc3le3lck6fvq', '2021', 51, 'Bidang Pendidikan SD (Reguler)', 0, '-', 0, 18246505000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('GmB5nF6Dfz1v8IdKRyrT0w34Z', 5, 'oysvxho19c0cbc3le3lck6fvq', '2021', 52, 'Bidang Pendidikan SD (Reguler)', 0, '-', 0, 18246505000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('4eAJF1bnraUdyczpPqk0mC5Iv', 6, 'oysvxho19c0cbc3le3lck6fvq', '2021', 53, 'Bidang Pendidikan SD (Reguler)', 0, '-', 0, 18246505000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('iIPM8Zd4jy5umGhzVxFURN6lD', 7, 'oysvxho19c0cbc3le3lck6fvq', '2021', 54, 'Bidang Pendidikan SD (Reguler)', 0, '-', 0, 18246505000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('wfI8THv46mQzExCMcphFVNoWj', 8, 'oysvxho19c0cbc3le3lck6fvq', '2021', 55, 'Bidang Pendidikan SD (Reguler)', 0, '-', 0, 18246505000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('rQTLAo7Gwsi1UXalH52IeSxVP', 9, 'oysvxho19c0cbc3le3lck6fvq', '2021', 56, 'Bidang Pendidikan SD (Reguler)', 0, '-', 0, 18246505000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('Ra1ytLOWP3MKfC2EowGYATQZ9', 10, 'oysvxho19c0cbc3le3lck6fvq', '2021', 57, 'Bidang Pendidikan SD (Reguler)', 0, '-', 0, 18246505000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('3RGUylbqSAHXYZk6QzuTas5rK', 11, 'oysvxho19c0cbc3le3lck6fvq', '2021', 58, 'Bidang Pendidikan SD (Reguler)', 0, '-', 0, 18246505000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);
INSERT INTO `tbl_dak_non_fisik` VALUES ('faMYXdp9GBwOj0kqcS8Zvsgyb', 12, 'oysvxho19c0cbc3le3lck6fvq', '2021', 59, 'Bidang Pendidikan SD (Reguler)', 0, '-', 0, 18246505000.00, '-', 0, 0.00, 0, 0.00, '-', 0.00, 0.00, 0.00, '-', 0);

SET FOREIGN_KEY_CHECKS = 1;

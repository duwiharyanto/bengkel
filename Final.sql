/*
Navicat MySQL Data Transfer

Source Server         : mysq on localhost
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : bengkel

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2017-03-18 15:29:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_asset
-- ----------------------------
DROP TABLE IF EXISTS `tb_asset`;
CREATE TABLE `tb_asset` (
  `idasset` int(25) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT NULL,
  `tgl_pembelian` date DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `no_inventaris` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idasset`),
  KEY `kodeasset` (`kode`),
  KEY `no_inventaris` (`no_inventaris`),
  CONSTRAINT `kodeasset` FOREIGN KEY (`kode`) REFERENCES `tb_masterasset` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_asset
-- ----------------------------
INSERT INTO `tb_asset` VALUES ('1', 'DT', '2010-04-09', 'komatsu', 'INV20150001');
INSERT INTO `tb_asset` VALUES ('2', 'FK', '2009-07-18', 'mitsubisii', 'INV20160002');
INSERT INTO `tb_asset` VALUES ('3', 'MB', '2010-02-25', 'honda', 'INV20160003');
INSERT INTO `tb_asset` VALUES ('5', 'TR', '2016-12-07', 'mitsubisi', 'INV20170004');
INSERT INTO `tb_asset` VALUES ('7', 'MB', '2016-12-20', 'mitsubisi', 'INV20170005');
INSERT INTO `tb_asset` VALUES ('8', 'MB', '2016-12-22', 'komatsu', 'INV20170006');
INSERT INTO `tb_asset` VALUES ('11', 'DT', '2011-03-03', 'komatsu', 'INV20170007');
INSERT INTO `tb_asset` VALUES ('12', 'FK', '2010-02-19', 'mitsubisi', 'INV20170008');
INSERT INTO `tb_asset` VALUES ('13', 'MB', '2012-04-06', 'honda', 'INV20170009');
INSERT INTO `tb_asset` VALUES ('15', 'LO', '2011-03-04', 'scania', 'INV20170010');
INSERT INTO `tb_asset` VALUES ('16', 'LO', '2016-02-25', 'scania', 'INV20170011');
INSERT INTO `tb_asset` VALUES ('17', 'mt', '2016-12-29', 'honda', 'INV20170012');
INSERT INTO `tb_asset` VALUES ('18', 'PST', '2017-01-01', 'garuda', 'INV20170013');
INSERT INTO `tb_asset` VALUES ('19', 'TNK', '2017-02-01', 'international defens', 'INV20170014');

-- ----------------------------
-- Table structure for tb_divisi
-- ----------------------------
DROP TABLE IF EXISTS `tb_divisi`;
CREATE TABLE `tb_divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_divisi
-- ----------------------------
INSERT INTO `tb_divisi` VALUES ('1', 'DIV01', 'Bahan Baku');
INSERT INTO `tb_divisi` VALUES ('2', 'DIV02', 'Umum');
INSERT INTO `tb_divisi` VALUES ('5', 'DIV03', 'Inventaris');

-- ----------------------------
-- Table structure for tb_masterasset
-- ----------------------------
DROP TABLE IF EXISTS `tb_masterasset`;
CREATE TABLE `tb_masterasset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kode` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_masterasset
-- ----------------------------
INSERT INTO `tb_masterasset` VALUES ('1', 'DT', 'dump truck');
INSERT INTO `tb_masterasset` VALUES ('2', 'FK', 'forclift');
INSERT INTO `tb_masterasset` VALUES ('3', 'MB', 'mobil');
INSERT INTO `tb_masterasset` VALUES ('4', 'LO', 'loader');
INSERT INTO `tb_masterasset` VALUES ('5', 'TR', 'truck');
INSERT INTO `tb_masterasset` VALUES ('9', 'mt', 'sepeda motor');
INSERT INTO `tb_masterasset` VALUES ('10', 'PST', 'pesawat');
INSERT INTO `tb_masterasset` VALUES ('11', 'TNK', 'tank');

-- ----------------------------
-- Table structure for tb_orderreq
-- ----------------------------
DROP TABLE IF EXISTS `tb_orderreq`;
CREATE TABLE `tb_orderreq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodeorderreq` varchar(25) DEFAULT NULL,
  `tglorder` date DEFAULT NULL,
  `kodepart` varchar(25) DEFAULT NULL,
  `estimasi` text,
  `qty` int(10) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kodepart` (`kodepart`),
  CONSTRAINT `fk_kodepart` FOREIGN KEY (`kodepart`) REFERENCES `tb_part` (`kodepart`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_orderreq
-- ----------------------------
INSERT INTO `tb_orderreq` VALUES ('1', 'ORD/16/0002', '2017-01-01', 'PART0003', '1 minggu', '5', '');
INSERT INTO `tb_orderreq` VALUES ('2', 'ORD/16/0003', '0000-00-00', 'PART0003', '3 hari', '5', '\0');
INSERT INTO `tb_orderreq` VALUES ('3', 'ORD/16/0004', null, 'PART0002', '2 hari', '8', '');
INSERT INTO `tb_orderreq` VALUES ('4', 'ORD/15/0005', '0000-00-00', 'PART0003', '1 minggu', '45', '\0');

-- ----------------------------
-- Table structure for tb_part
-- ----------------------------
DROP TABLE IF EXISTS `tb_part`;
CREATE TABLE `tb_part` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodepart` varchar(20) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `kodesuplier` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kodesup` (`kodesuplier`),
  KEY `kodepart` (`kodepart`),
  CONSTRAINT `kodesup` FOREIGN KEY (`kodesuplier`) REFERENCES `tb_suplier` (`kodesuplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_part
-- ----------------------------
INSERT INTO `tb_part` VALUES ('1', 'PART0001', 'child', 'karburator', '10', '500000', 'SUP0001');
INSERT INTO `tb_part` VALUES ('2', 'PART0002', 'part', 'blok mesin v4', '5', '200000000', 'SUP0001');
INSERT INTO `tb_part` VALUES ('3', 'PART0003', 'part', 'chasis v6', '2', '500000000', 'SUP0002');

-- ----------------------------
-- Table structure for tb_partout
-- ----------------------------
DROP TABLE IF EXISTS `tb_partout`;
CREATE TABLE `tb_partout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodepartout` varchar(25) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `kodepartreq` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kodepartreq` (`kodepartreq`),
  CONSTRAINT `fk_kodepartreq` FOREIGN KEY (`kodepartreq`) REFERENCES `tb_partreq` (`kodepartreq`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_partout
-- ----------------------------

-- ----------------------------
-- Table structure for tb_partreq
-- ----------------------------
DROP TABLE IF EXISTS `tb_partreq`;
CREATE TABLE `tb_partreq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodepartreq` varchar(25) DEFAULT NULL,
  `kodewo` varchar(10) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `kodepart` varchar(25) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kodewo` (`kodewo`),
  KEY `kodepart` (`kodepart`),
  KEY `kodepartreq` (`kodepartreq`),
  CONSTRAINT `kodepart` FOREIGN KEY (`kodepart`) REFERENCES `tb_part` (`kodepart`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kodewo` FOREIGN KEY (`kodewo`) REFERENCES `tb_wo` (`kodewo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_partreq
-- ----------------------------
INSERT INTO `tb_partreq` VALUES ('31', 'RE0001', 'BB0006', '2017-03-18', 'PART0002', '5', '');

-- ----------------------------
-- Table structure for tb_suplier
-- ----------------------------
DROP TABLE IF EXISTS `tb_suplier`;
CREATE TABLE `tb_suplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodesuplier` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `nomortlp` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kodesuplier` (`kodesuplier`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_suplier
-- ----------------------------
INSERT INTO `tb_suplier` VALUES ('1', 'SUP0001', 'PT. Maju Sejahtera', 'jl bantul km 7', '0274254565', 'majusejahtera@gmail.', 'bpk tera');
INSERT INTO `tb_suplier` VALUES ('2', 'SUP0002', 'PT. Alam Raya', 'jl magelang km 15', '027456645', 'alamraya@yahoo.com', 'bpk alam');
INSERT INTO `tb_suplier` VALUES ('4', 'SUP0003', 'pt. array motion', 'jl. bantul km 28', '027456452', 'araymotion@gmail.com', 'alan');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `divisi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('2', 'root', '7b24afc8bc80e548d66c4e7ff72171c5', 'adminstrator', null);
INSERT INTO `tb_user` VALUES ('6', 'duwi', '3155e562d357a7c301d2ccafadb05e17', 'adminstrator', null);
INSERT INTO `tb_user` VALUES ('7', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', null);
INSERT INTO `tb_user` VALUES ('8', 'bengkel', 'b3f4309440dada44a48fccd6164ff8e9', 'operator bengkel', null);
INSERT INTO `tb_user` VALUES ('9', 'gudang', '202446dd1d6028084426867365b0c7a1', 'operator gudang', null);
INSERT INTO `tb_user` VALUES ('10', 'umum', 'adfab9c56b8b16d6c067f8d3cff8818e', 'user', null);

-- ----------------------------
-- Table structure for tb_wo
-- ----------------------------
DROP TABLE IF EXISTS `tb_wo`;
CREATE TABLE `tb_wo` (
  `idwo` int(10) NOT NULL AUTO_INCREMENT,
  `kodewo` varchar(10) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `kepada` varchar(50) DEFAULT NULL,
  `iddiv` int(50) DEFAULT NULL,
  `hal` varchar(50) DEFAULT NULL,
  `des` varchar(50) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `masalah` text,
  `penyebab` text,
  `proses` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `target` varchar(20) DEFAULT NULL,
  `finish` date DEFAULT NULL,
  `idasset` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idwo`),
  KEY `kodewo` (`kodewo`),
  KEY `fk_noinv` (`idasset`),
  KEY `fk_iddiv` (`iddiv`),
  CONSTRAINT `fk_iddiv` FOREIGN KEY (`iddiv`) REFERENCES `tb_divisi` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_noinv` FOREIGN KEY (`idasset`) REFERENCES `tb_asset` (`no_inventaris`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_wo
-- ----------------------------
INSERT INTO `tb_wo` VALUES ('48', 'BB0006', '2017-03-18', 'Bengkel', '2', 'perbaikan', 'Mobil', null, 'Perbaikan Berkala', null, 'on proses', '-', '2017-03-20', '2017-03-20', 'INV20160003');
INSERT INTO `tb_wo` VALUES ('49', 'BB0007', '2017-03-18', 'Bengkel', '1', 'perawatan', 'Truck', null, 'macet', null, 'finish', '-', '2017-03-18', '2017-03-18', 'INV20150001');
INSERT INTO `tb_wo` VALUES ('50', 'BB0009', '2017-03-18', 'Bengkel', '2', 'perbaikan', 'Mobil', null, 'Perbaikan Berkala', null, 'finish', '-', '2017-03-20', '2017-03-20', 'INV20160003');

-- ----------------------------
-- View structure for view_asset
-- ----------------------------
DROP VIEW IF EXISTS `view_asset`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_asset` AS SELECT
tb_masterasset.kode,
tb_masterasset.jenis,
tb_asset.tgl_pembelian,
tb_asset.merk,
tb_asset.no_inventaris,
tb_asset.idasset
FROM
tb_masterasset
INNER JOIN tb_asset ON tb_asset.kode = tb_masterasset.kode
WHERE
tb_asset.idasset = 11 ;

-- ----------------------------
-- View structure for view_orderpart
-- ----------------------------
DROP VIEW IF EXISTS `view_orderpart`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_orderpart` AS SELECT
tb_orderreq.id,
tb_part.nama,
tb_orderreq.kodeorderreq,
tb_orderreq.tglorder,
tb_orderreq.kodepart,
tb_orderreq.estimasi,
tb_orderreq.status,
tb_orderreq.qty
FROM
tb_part
INNER JOIN tb_orderreq ON tb_orderreq.kodepart = tb_part.kodepart ;

-- ----------------------------
-- View structure for view_partout
-- ----------------------------
DROP VIEW IF EXISTS `view_partout`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_partout` AS SELECT
tb_partout.kodepartout,
tb_partout.tgl,
tb_partreq.kodewo,
tb_partreq.tgl as 'Tanggal Part Req',
tb_partreq.qty,
tb_part.nama,
tb_part.kategori
FROM
tb_partout
INNER JOIN tb_partreq ON tb_partout.kodepartreq = tb_partreq.kodepartreq
INNER JOIN tb_part ON tb_partreq.kodepart = tb_part.kodepart ;

-- ----------------------------
-- View structure for view_partreq
-- ----------------------------
DROP VIEW IF EXISTS `view_partreq`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_partreq` AS SELECT
tb_partreq.kodepartreq,
tb_partreq.tgl,
tb_part.nama,
tb_part.harga,
tb_wo.kodewo,
tb_part.kodepart,
tb_wo.tgl AS `Tanggal WO`,
tb_wo.masalah,
tb_suplier.kodesuplier
FROM
tb_part
INNER JOIN tb_partreq ON tb_partreq.kodepart = tb_part.kodepart
INNER JOIN tb_wo ON tb_partreq.kodewo = tb_wo.kodewo
INNER JOIN tb_suplier ON tb_part.kodesuplier = tb_suplier.kodesuplier ;

-- ----------------------------
-- View structure for view_workingout
-- ----------------------------
DROP VIEW IF EXISTS `view_workingout`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_workingout` AS SELECT
tb_wo.kodewo,
tb_wo.tgl,
tb_masterasset.jenis
FROM
tb_wo
INNER JOIN tb_asset ON tb_wo.idasset = tb_asset.no_inventaris
INNER JOIN tb_masterasset ON tb_asset.kode = tb_masterasset.kode ;

-- ----------------------------
-- View structure for v_partout
-- ----------------------------
DROP VIEW IF EXISTS `v_partout`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `v_partout` AS SELECT
tb_partreq.id,
tb_partreq.kodepartreq,
tb_partreq.kodewo,
tb_partreq.tgl,
tb_partreq.qty,
tb_partreq.`status`,
tb_partreq.kodepart,
tb_part.nama
FROM
tb_part
INNER JOIN tb_partreq ON tb_partreq.kodepart = tb_part.kodepart ;

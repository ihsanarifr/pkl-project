-- MySQL dump 10.13  Distrib 5.6.22, for osx10.8 (x86_64)
--
-- Host: garadev.com    Database: k5520385_prakerin
-- ------------------------------------------------------
-- Server version	5.6.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `absensi`
--

DROP TABLE IF EXISTS `absensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `absensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `datang` time DEFAULT NULL,
  `pulang` time DEFAULT NULL,
  `keterangan` text,
  `prakerin_siswa_id` int(11) NOT NULL,
  `status_kehadiran_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_absensi_prakerin_siswa1_idx` (`prakerin_siswa_id`),
  KEY `fk_absensi_status_kehadiran1_idx` (`status_kehadiran_id`),
  CONSTRAINT `fk_absensi_prakerin_siswa1` FOREIGN KEY (`prakerin_siswa_id`) REFERENCES `prakerin_siswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_absensi_status_kehadiran1` FOREIGN KEY (`status_kehadiran_id`) REFERENCES `status_kehadiran` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absensi`
--

LOCK TABLES `absensi` WRITE;
/*!40000 ALTER TABLE `absensi` DISABLE KEYS */;
/*!40000 ALTER TABLE `absensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspek_penilaian`
--

DROP TABLE IF EXISTS `aspek_penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aspek_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `nama_sekolah_id` int(11) NOT NULL,
  `kelompok_penilaian_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_aspek_penilaian_nama_sekolah1_idx` (`nama_sekolah_id`),
  KEY `fk_aspek_penilaian_kelompok_penilaian1_idx` (`kelompok_penilaian_id`),
  CONSTRAINT `fk_aspek_penilaian_kelompok_penilaian1` FOREIGN KEY (`kelompok_penilaian_id`) REFERENCES `kelompok_penilaian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_aspek_penilaian_nama_sekolah1` FOREIGN KEY (`nama_sekolah_id`) REFERENCES `nama_sekolah` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspek_penilaian`
--

LOCK TABLES `aspek_penilaian` WRITE;
/*!40000 ALTER TABLE `aspek_penilaian` DISABLE KEYS */;
/*!40000 ALTER TABLE `aspek_penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gol_darah`
--

DROP TABLE IF EXISTS `gol_darah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gol_darah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gol_darah`
--

LOCK TABLES `gol_darah` WRITE;
/*!40000 ALTER TABLE `gol_darah` DISABLE KEYS */;
INSERT INTO `gol_darah` VALUES (4,'A'),(5,'B'),(6,'AB'),(7,'O');
/*!40000 ALTER TABLE `gol_darah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'members','General User'),(3,'Pembimbing Sekolah','Pembimbing');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_kelamin`
--

DROP TABLE IF EXISTS `jenis_kelamin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_kelamin` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_kelamin`
--

LOCK TABLES `jenis_kelamin` WRITE;
/*!40000 ALTER TABLE `jenis_kelamin` DISABLE KEYS */;
INSERT INTO `jenis_kelamin` VALUES (1,'Laki-laki'),(2,'Perempuan');
/*!40000 ALTER TABLE `jenis_kelamin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_user`
--

DROP TABLE IF EXISTS `jenis_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_user`
--

LOCK TABLES `jenis_user` WRITE;
/*!40000 ALTER TABLE `jenis_user` DISABLE KEYS */;
INSERT INTO `jenis_user` VALUES (1,'administrator'),(2,'siswa'),(3,'pembimbing sekolah'),(7,'pembimbing unit');
/*!40000 ALTER TABLE `jenis_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kegiatan`
--

DROP TABLE IF EXISTS `kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `mulai` time DEFAULT NULL,
  `selesai` time DEFAULT NULL,
  `uraian_kegiatan` text,
  `sarana` text,
  `prakerin_siswa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kegiatan_prakerin_siswa1_idx` (`prakerin_siswa_id`),
  CONSTRAINT `fk_kegiatan_prakerin_siswa1` FOREIGN KEY (`prakerin_siswa_id`) REFERENCES `prakerin_siswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kegiatan`
--

LOCK TABLES `kegiatan` WRITE;
/*!40000 ALTER TABLE `kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (18,'RPL2'),(19,'ANM2');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelompok_penilaian`
--

DROP TABLE IF EXISTS `kelompok_penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kelompok_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelompok_penilaian`
--

LOCK TABLES `kelompok_penilaian` WRITE;
/*!40000 ALTER TABLE `kelompok_penilaian` DISABLE KEYS */;
INSERT INTO `kelompok_penilaian` VALUES (4,'Kepribadian'),(5,'Kedisiplinan'),(6,'produktivitas');
/*!40000 ALTER TABLE `kelompok_penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nama_sekolah`
--

DROP TABLE IF EXISTS `nama_sekolah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nama_sekolah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `hp` varchar(45) DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nama_sekolah`
--

LOCK TABLES `nama_sekolah` WRITE;
/*!40000 ALTER TABLE `nama_sekolah` DISABLE KEYS */;
INSERT INTO `nama_sekolah` VALUES (22,'SMK NEGERI 1 CIOMAS','nio','66',NULL),(23,'SMK NEGERI 1 CIBINONG','cibinong permai','98989',NULL),(24,'SMK PGRI','BOGOR','434234',NULL);
/*!40000 ALTER TABLE `nama_sekolah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembimbing_sekolah`
--

DROP TABLE IF EXISTS `pembimbing_sekolah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembimbing_sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `no_hp` varchar(45) DEFAULT NULL,
  `nama_sekolah_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pembimbing_sekolah_user1_idx` (`id`),
  KEY `fk_pembimbing_sekolah_nama_sekolah1_idx` (`nama_sekolah_id`),
  CONSTRAINT `fk_pembimbing_sekolah_nama_sekolah1` FOREIGN KEY (`nama_sekolah_id`) REFERENCES `nama_sekolah` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pembimbing_sekolah_user1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembimbing_sekolah`
--

LOCK TABLES `pembimbing_sekolah` WRITE;
/*!40000 ALTER TABLE `pembimbing_sekolah` DISABLE KEYS */;
INSERT INTO `pembimbing_sekolah` VALUES (3,'Sample','088577',22);
/*!40000 ALTER TABLE `pembimbing_sekolah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembimbing_unit`
--

DROP TABLE IF EXISTS `pembimbing_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembimbing_unit` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `no_hp` varchar(45) DEFAULT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pembimbing_unit_user1_idx` (`id`),
  KEY `fk_pembimbing_unit_unit1_idx` (`unit_id`),
  CONSTRAINT `fk_pembimbing_unit_unit1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pembimbing_unit_user1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembimbing_unit`
--

LOCK TABLES `pembimbing_unit` WRITE;
/*!40000 ALTER TABLE `pembimbing_unit` DISABLE KEYS */;
INSERT INTO `pembimbing_unit` VALUES (4,'Asep Mulyana','084','13213',5);
/*!40000 ALTER TABLE `pembimbing_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penilaian`
--

DROP TABLE IF EXISTS `penilaian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nilai_angka` float DEFAULT NULL,
  `nilai_huruf` varchar(45) DEFAULT NULL,
  `keterangan` text,
  `prakerin_siswa_id` int(11) NOT NULL,
  `aspek_penilaian_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_penilaian_prakerin_siswa1_idx` (`prakerin_siswa_id`),
  KEY `fk_penilaian_aspek_penilaian1_idx` (`aspek_penilaian_id`),
  CONSTRAINT `fk_penilaian_aspek_penilaian1` FOREIGN KEY (`aspek_penilaian_id`) REFERENCES `aspek_penilaian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_penilaian_prakerin_siswa1` FOREIGN KEY (`prakerin_siswa_id`) REFERENCES `prakerin_siswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penilaian`
--

LOCK TABLES `penilaian` WRITE;
/*!40000 ALTER TABLE `penilaian` DISABLE KEYS */;
/*!40000 ALTER TABLE `penilaian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permasalahan`
--

DROP TABLE IF EXISTS `permasalahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permasalahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `masalah` text,
  `solusi` text,
  `oleh` varchar(45) DEFAULT NULL,
  `prakerin_siswa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_permasalahan_prakerin_siswa1_idx` (`prakerin_siswa_id`),
  CONSTRAINT `fk_permasalahan_prakerin_siswa1` FOREIGN KEY (`prakerin_siswa_id`) REFERENCES `prakerin_siswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permasalahan`
--

LOCK TABLES `permasalahan` WRITE;
/*!40000 ALTER TABLE `permasalahan` DISABLE KEYS */;
/*!40000 ALTER TABLE `permasalahan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prakerin_siswa`
--

DROP TABLE IF EXISTS `prakerin_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prakerin_siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `jabatan_pembimbing` varchar(255) DEFAULT NULL,
  `siswa_id` int(11) NOT NULL,
  `pembimbing_unit_id` int(11) NOT NULL,
  `pembimbing_sekolah_id` int(11) NOT NULL,
  `jabatan_pembimbing_sekolah` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prakerin_siswa_unit1_idx` (`unit_id`),
  KEY `fk_prakerin_siswa_kelas1_idx` (`kelas_id`),
  KEY `fk_prakerin_siswa_siswa1_idx` (`siswa_id`),
  KEY `fk_prakerin_siswa_pembimbing_unit1_idx` (`pembimbing_unit_id`),
  KEY `fk_prakerin_siswa_pembimbing_sekolah1_idx` (`pembimbing_sekolah_id`),
  CONSTRAINT `fk_prakerin_siswa_kelas1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prakerin_siswa_pembimbing_sekolah1` FOREIGN KEY (`pembimbing_sekolah_id`) REFERENCES `pembimbing_sekolah` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prakerin_siswa_pembimbing_unit1` FOREIGN KEY (`pembimbing_unit_id`) REFERENCES `pembimbing_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prakerin_siswa_siswa1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_prakerin_siswa_unit1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prakerin_siswa`
--

LOCK TABLES `prakerin_siswa` WRITE;
/*!40000 ALTER TABLE `prakerin_siswa` DISABLE KEYS */;
INSERT INTO `prakerin_siswa` VALUES (33,5,19,'2017-01-30','2017-01-31','sekertariat',21,4,3,'kepala sekolah'),(34,5,18,'2017-01-26','2017-02-27','Kasubdit',27,4,3,'kepala sekolah');
/*!40000 ALTER TABLE `prakerin_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_keahlian`
--

DROP TABLE IF EXISTS `program_keahlian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_keahlian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_keahlian`
--

LOCK TABLES `program_keahlian` WRITE;
/*!40000 ALTER TABLE `program_keahlian` DISABLE KEYS */;
INSERT INTO `program_keahlian` VALUES (5,'RPL'),(6,'ANIMASI'),(7,'TKR'),(8,'LAS'),(10,'MULTIMEDIA');
/*!40000 ALTER TABLE `program_keahlian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rencana_kegiatan`
--

DROP TABLE IF EXISTS `rencana_kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rencana_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uraian_kegiatan` varchar(45) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `prakerin_siswa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rencana_kegiatan_prakerin_siswa1_idx` (`prakerin_siswa_id`),
  CONSTRAINT `fk_rencana_kegiatan_prakerin_siswa1` FOREIGN KEY (`prakerin_siswa_id`) REFERENCES `prakerin_siswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rencana_kegiatan`
--

LOCK TABLES `rencana_kegiatan` WRITE;
/*!40000 ALTER TABLE `rencana_kegiatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `rencana_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `nomor_induk` varchar(45) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `ayah` varchar(45) DEFAULT NULL,
  `ibu` varchar(45) DEFAULT NULL,
  `alamat` text,
  `kabkot` varchar(45) DEFAULT NULL,
  `catatan_kesehatan` text,
  `nama_sekolah_id` int(11) NOT NULL,
  `program_keahlian_id` int(11) NOT NULL,
  `gol_darah_id` int(11) NOT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_siswa_nama_sekolah_idx` (`nama_sekolah_id`),
  KEY `fk_siswa_program_keahlian1_idx` (`program_keahlian_id`),
  KEY `fk_siswa_gol_darah1_idx` (`gol_darah_id`),
  KEY `fk_siswa_user1_idx` (`id`),
  CONSTRAINT `fk_siswa_gol_darah1` FOREIGN KEY (`gol_darah_id`) REFERENCES `gol_darah` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_siswa_nama_sekolah` FOREIGN KEY (`nama_sekolah_id`) REFERENCES `nama_sekolah` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_siswa_program_keahlian1` FOREIGN KEY (`program_keahlian_id`) REFERENCES `program_keahlian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_siswa_user1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (21,'febri',NULL,'6153545','Bogor',NULL,'jyet','tbuyb4','yb4u','ywb',NULL,22,6,5,0),(23,'siswa b',NULL,'3256464525','bogor','2000-01-01','dtce',' ete','yryec','t3e',NULL,22,10,5,0),(27,'Ihsan Arif','PHOTO27.png','0821309','Kota Tasikmalaya','1992-10-02','ihsan','ihsan','Tegal Manggah No 10A RT 04 RW 06 Kelurahan Tegal Lega Kecamatan Bogor Tengah Kota Bogor (Masuk gang TK Mexindo, Posisi Rumah Setengah Tanjakan, sebelah kanan tanjakan ada Rumah Merah)','Bogor Tengah, Kota Bogor',NULL,22,5,4,0);
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_kehadiran`
--

DROP TABLE IF EXISTS `status_kehadiran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_kehadiran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_kehadiran`
--

LOCK TABLES `status_kehadiran` WRITE;
/*!40000 ALTER TABLE `status_kehadiran` DISABLE KEYS */;
INSERT INTO `status_kehadiran` VALUES (1,'Izin'),(2,'Sakit'),(3,'Alfa');
/*!40000 ALTER TABLE `status_kehadiran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `bidang` varchar(45) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
INSERT INTO `unit` VALUES (5,'Direktorat Integrasi Data dan Sistem Informas','Sistem Informasi','Gedung Perpustakaan Lantai 2 Institut Pertanian Bogor Dramaga');
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jenis_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_jenis_user1_idx` (`jenis_user_id`),
  CONSTRAINT `fk_user_jenis_user1` FOREIGN KEY (`jenis_user_id`) REFERENCES `jenis_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,NULL,NULL,2),(2,'siswa@gmail.com','password',2),(3,'pembimbing@gmail.com','password',3),(4,'pembimbing.unit@gmail.com','password',7),(11,'rahman@gmail.com','12345678',2),(12,'vini@gmail.com','vini1234567',2),(14,'dina@gmail.com','dina',2),(15,'mele@gmail.com','12345678',2),(17,'nana@gmail.com','abcdefghij',2),(18,'ada@gmail.com','qwertyuio',2),(19,'hikmah@gmail.com','hikmah',2),(20,'salsa@gmail.com','salsa12345678',2),(21,'febri@gmail.com','febri12345678',2),(23,'siswab@admin.com','siswab12345',2),(25,'siswaz@gmail.com','siswaz12345678',2),(27,'ihsanarifr@hotmail.com','Rahman13',2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,NULL,'As034EW04Z0VnC/ZL4aqYe',1268889823,1485743242,1,'Admin','istrator','ADMIN','0'),(2,'127.0.0.1','siswa@gmail.com','$2y$08$PAzcc2XEvEUCdTi0biefhetobZSv7v6iUWccceZcDDlvvbBgfTdFW',NULL,'siswa@gmail.com',NULL,NULL,NULL,'xdfbYkIM4pGSJCS5Ghsr4u',1480452665,1483944329,1,'siswa','siswa','siswa','085222828740'),(3,'127.0.0.1','pembimbing@gmail.com','$2y$08$dNIbRJSDubhfsNquzD3VJ.zgTYHfrL6ID3Si38B2QOt7IsaTc9bQS',NULL,'pembimbing@gmail.com',NULL,NULL,NULL,NULL,1480452705,1480475958,1,'Pembimbing Sekolah','pembimbing','pembimbing','085222828740'),(4,'127.0.0.1','pembimbing.unit@gmail.com','$2y$08$4lQmX90l4UIpxNj7ew4bJ.jCNP8Gi3QZQ7k7EO3KAN/70wISRcj7m',NULL,'pembimbing.unit@gmail.com',NULL,NULL,NULL,NULL,1482209254,NULL,1,'Pembimbing Unit','pembimbing','DIDSI','085222828740'),(5,'::1','ihsan@gmail.com','$2y$08$EhzefYwrJhj12C2YlaGWseAoWTBSp26ohg.j7SwaoqPIMkYvBQ7hG',NULL,'ihsan@gmail.com',NULL,NULL,NULL,NULL,1483676820,1484884195,1,'a','a','a','0'),(7,'127.0.0.1','ihsan@ihsan.com','$2y$08$BcxAhpTFz0Hq8XlbFJwawuSPdnj6qip/m6CgPSK.xRCdnPOOibEHe',NULL,'ihsan@ihsan.com',NULL,NULL,NULL,NULL,1483787100,1483787236,1,'Ben','Edmunds','as','085222828740'),(8,'::1','tetst@gmail.com','$2y$08$y4ssvgoX4ulWZeDyFvStW.bc9jZ5A9pRRFvH3wy28xwclAHrrlpIS',NULL,'tetst@gmail.com',NULL,NULL,NULL,NULL,1484189195,NULL,1,'q',NULL,NULL,NULL),(9,'::1','bla@gmail.com','$2y$08$dB6w5/EgV19MosBmabt5sOaAYcUVpVPL9MB07BJGhRo5Qmdo59aFO',NULL,'bla@gmail.com',NULL,NULL,NULL,NULL,1484189342,NULL,1,'bla',NULL,NULL,NULL),(11,'::1','rahman@gmail.com','$2y$08$tmr1.JdPnM6zwRzWDkwS8uyjYE/7wdxZhpQlFxLyM2abt43WCP.SW',NULL,'rahman@gmail.com',NULL,NULL,NULL,NULL,1484546473,NULL,1,'ANM2',NULL,NULL,NULL),(12,'::1','vini@gmail.com','$2y$08$fLaWMAE5d7EqU8HJxezzvuaAiiOpTJbIHFsfC1k5Yz/QGmCODyK3.',NULL,'vini@gmail.com',NULL,NULL,NULL,NULL,1484547719,NULL,1,'ggq',NULL,NULL,NULL),(14,'::1','dina@gmail.com','$2y$08$w3uiHGbsnOCKfBddBkJl3.8L7myNNayZl59HwStte9q74tvqWhXKy',NULL,'dina@gmail.com',NULL,NULL,NULL,NULL,1484706557,NULL,1,'dina anjani',NULL,NULL,NULL),(15,'::1','mele@gmail.com','$2y$08$GZC7HHEBNRQcYpbl8liN7usDHnQmUfV/85o5wgywlFcWR/1ib26Ne',NULL,'mele@gmail.com',NULL,NULL,NULL,NULL,1484711745,NULL,1,'melee',NULL,NULL,NULL),(16,'::1','andini@gmail.com','$2y$08$VXTCnFqDTD23g50zTBercOURxJb/bd9tFiYd.dG0nygsZRVJrEZKm',NULL,'andini@gmail.com',NULL,NULL,NULL,NULL,1484726345,NULL,1,'andini',NULL,NULL,NULL),(17,'::1','nana@gmail.com','$2y$08$QHntVUJDyr8xFCxsc1PWLerxjswzVS0JhXcHn7McNsGLu7qN8akXy',NULL,'nana@gmail.com',NULL,NULL,NULL,NULL,1484726554,NULL,1,'nananana',NULL,NULL,NULL),(18,'::1','ada@gmail.com','$2y$08$octBYRIcn415xGIc0FcgL.Va4M7AywKz7rbWs.B3sInwiPYrNVK6a',NULL,'ada@gmail.com',NULL,NULL,NULL,NULL,1484727059,NULL,1,'aaaa',NULL,NULL,NULL),(19,'::1','hikmah@gmail.com','$2y$08$ZKevfbX.FeY1XnW8cl8f/.JICk.BmQDdQ6g.Q7lsu74sk/HgoD7WO',NULL,'hikmah@gmail.com',NULL,NULL,NULL,NULL,1485305070,NULL,1,'RPL',NULL,NULL,NULL),(20,'::1','salsa@gmail.com','$2y$08$iU1Tca1HRuukSjQNPSLDIuNicV/RH7IdKBz6NsESovcXGOip2kNMC',NULL,'salsa@gmail.com',NULL,NULL,NULL,NULL,1485399482,NULL,1,'salsa',NULL,NULL,NULL),(21,'::1','febri@gmail.com','$2y$08$NxZuguAKJ/N3qc.XDftHtebMKOIq5ewEiD54XrPNjLKcXeOYLuQpu',NULL,'febri@gmail.com',NULL,NULL,NULL,NULL,1485404240,NULL,1,'febri',NULL,NULL,NULL),(23,'::1','siswab@admin.com','$2y$08$OOuuRhcGNnLm1i7Acz7VGuFCx6x0mrctxPt2MpXsOYrv82./U59zS',NULL,'siswab@admin.com',NULL,NULL,NULL,NULL,1485414864,1485509175,1,'siswa b',NULL,NULL,NULL),(25,'::1','siswaz@gmail.com','$2y$08$LIG18zWAT4U495VjWlr4R.ukxeqdEbtz8BF5.erkotyFWtPX5209q',NULL,'siswaz@gmail.com',NULL,NULL,NULL,NULL,1485499088,NULL,1,'siswaz',NULL,NULL,NULL),(27,'127.0.0.1','ihsanarifr@hotmail.com','$2y$08$Zsv7ZBY2RxPvWSrr7DbQEOegwmAVnBqYKE/xnOZPEBy/9foI9oca.',NULL,'ihsanarifr@hotmail.com',NULL,NULL,NULL,NULL,1485504974,1485512077,1,'Ihsan Arif',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(9,2,2),(6,3,3),(16,5,2),(14,7,1),(17,8,2),(18,9,2),(20,11,2),(21,12,2),(23,14,2),(24,15,2),(25,17,2),(26,18,2),(27,19,2),(28,20,2),(29,21,2),(31,23,2),(33,25,2),(35,27,2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-30  9:28:30

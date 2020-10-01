-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for e-raport
CREATE DATABASE IF NOT EXISTS `e-raport` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e-raport`;

-- Dumping structure for table e-raport.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-raport.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table e-raport.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-raport.migrations: ~14 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_06_17_134613_add_new_field__to_users_table', 2),
	(5, '2020_08_05_094110_create_ms_school_identities_table', 3),
	(6, '2020_08_05_113045_create_ms_school_identities_table', 4),
	(7, '2020_08_10_081616_create_ms_teachers_table', 5),
	(8, '2020_08_10_091338_create_ms_mapels_table', 6),
	(9, '2020_08_17_194346_create_ms_kelas_table', 7),
	(10, '2020_08_20_220322_create_ms_ekskuls_table', 8),
	(11, '2020_08_23_075527_create_ms_teachers_table', 9),
	(12, '2020_08_23_081946_create_ms_teachers_table', 10),
	(13, '2020_09_07_212006_create_ms_jurusans_table', 11),
	(14, '2020_09_08_081502_create_ms_students_table', 12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table e-raport.ms_ekskuls
CREATE TABLE IF NOT EXISTS `ms_ekskuls` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_ekskul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembina_ekskul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-raport.ms_ekskuls: ~3 rows (approximately)
/*!40000 ALTER TABLE `ms_ekskuls` DISABLE KEYS */;
INSERT INTO `ms_ekskuls` (`id`, `nama_ekskul`, `pembina_ekskul`, `created_at`, `updated_at`) VALUES
	(1, 'Rohis', 'Pak Dadan', '2020-08-20 22:17:24', '2020-08-20 22:17:24'),
	(2, 'Fourgrammer', 'Pak Munir', '2020-08-20 22:26:06', '2020-08-20 22:26:06'),
	(3, 'Pramuka', 'Pak Dadan', '2020-08-25 16:12:14', '2020-08-25 16:12:14');
/*!40000 ALTER TABLE `ms_ekskuls` ENABLE KEYS */;

-- Dumping structure for table e-raport.ms_jurusans
CREATE TABLE IF NOT EXISTS `ms_jurusans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-raport.ms_jurusans: ~4 rows (approximately)
/*!40000 ALTER TABLE `ms_jurusans` DISABLE KEYS */;
INSERT INTO `ms_jurusans` (`id`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
	(1, 'Teknik Komputer Jaringan', '2020-09-08 11:50:19', '2020-09-08 11:50:19'),
	(2, 'Teknik Bisnis Sepeda Motor', '2020-09-08 11:50:37', '2020-09-08 11:50:37'),
	(3, 'Broadcasting', '2020-09-08 11:50:53', '2020-09-08 11:50:53'),
	(4, 'Produksi Film', '2020-09-08 11:51:08', '2020-09-08 11:51:08');
/*!40000 ALTER TABLE `ms_jurusans` ENABLE KEYS */;

-- Dumping structure for table e-raport.ms_kelas
CREATE TABLE IF NOT EXISTS `ms_kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-raport.ms_kelas: ~14 rows (approximately)
/*!40000 ALTER TABLE `ms_kelas` DISABLE KEYS */;
INSERT INTO `ms_kelas` (`id`, `nama_kelas`, `tingkat_kelas`, `jurusan_kelas`, `max_siswa`, `created_at`, `updated_at`) VALUES
	(1, 'XII TKJ 1', 'XII (12)', 'Teknik Komputer Jaringan', '50', '2020-09-08 11:51:52', '2020-09-08 11:51:52'),
	(2, 'XII TKJ 2', 'XII (12)', 'Teknik Komputer Jaringan', '50', '2020-09-08 11:52:10', '2020-09-08 11:52:10'),
	(3, 'XII TKJ 3', 'XII (12)', 'Teknik Komputer Jaringan', '50', '2020-09-08 11:52:40', '2020-09-08 11:52:40'),
	(4, 'X TKJ 1', 'X (10)', 'Teknik Komputer Jaringan', '50', '2020-09-17 19:12:07', '2020-09-17 19:12:07'),
	(5, 'X TKJ 2', 'X (10)', 'Teknik Komputer Jaringan', '50', '2020-09-17 19:13:10', '2020-09-17 19:13:10'),
	(6, 'X TKJ 3', 'X (10)', 'Teknik Komputer Jaringan', '50', '2020-09-17 19:14:04', '2020-09-17 19:14:04'),
	(7, 'X TBSM 1', 'X (10)', 'Teknik Bisnis Sepeda Motor', '55', '2020-09-25 01:17:44', '2020-09-25 01:17:44'),
	(8, 'X BC 1', 'X (10)', 'Broadcasting', '55', '2020-09-25 01:23:08', '2020-09-25 01:23:08'),
	(9, 'X Profil 1', 'X (10)', 'Produksi Film', '55', '2020-09-25 01:23:35', '2020-09-25 01:23:35'),
	(10, 'X BC 2', 'X (10)', 'Broadcasting', '55', '2020-09-25 01:24:00', '2020-09-25 01:24:00'),
	(11, 'X TBSM 2', 'X (10)', 'Teknik Bisnis Sepeda Motor', '55', '2020-09-25 01:24:25', '2020-09-25 01:24:25'),
	(12, 'X TBSM 3', 'X (10)', 'Teknik Bisnis Sepeda Motor', '55', '2020-09-25 01:26:13', '2020-09-25 01:26:13'),
	(13, 'X BC 3', 'X (10)', 'Broadcasting', '55', '2020-09-25 01:26:44', '2020-09-25 01:26:44'),
	(14, 'XI TKJ 1', 'XI (11)', 'Teknik Komputer Jaringan', '55', '2020-09-25 18:59:06', '2020-09-25 18:59:06');
/*!40000 ALTER TABLE `ms_kelas` ENABLE KEYS */;

-- Dumping structure for table e-raport.ms_mapels
CREATE TABLE IF NOT EXISTS `ms_mapels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KKM` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-raport.ms_mapels: ~1 rows (approximately)
/*!40000 ALTER TABLE `ms_mapels` DISABLE KEYS */;
INSERT INTO `ms_mapels` (`id`, `nama_mapel`, `kode_mapel`, `kategori_mapel`, `KKM`, `created_at`, `updated_at`) VALUES
	(1, 'Matematika', 'MTK1', 'not_produktif', '75', '2020-09-08 11:49:49', '2020-09-08 11:49:49');
/*!40000 ALTER TABLE `ms_mapels` ENABLE KEYS */;

-- Dumping structure for table e-raport.ms_school_identities
CREATE TABLE IF NOT EXISTS `ms_school_identities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NPSN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_resmi_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-raport.ms_school_identities: ~2 rows (approximately)
/*!40000 ALTER TABLE `ms_school_identities` DISABLE KEYS */;
INSERT INTO `ms_school_identities` (`id`, `nama_sekolah`, `NPSN`, `alamat_sekolah`, `kelurahan`, `kecamatan`, `kota_kabupaten`, `provinsi`, `website_resmi_sekolah`, `no_telpon_sekolah`, `email_sekolah`, `logo_sekolah`, `created_at`, `updated_at`) VALUES
	(1, 'SMKN 4 Kota Bekasi', '1122334455667740', 'Jalan Gandaria, Jalan Raya Kranggan Wetan, RT.001/RW.007  Keranggan', 'Jatirangga', 'Jatisampurna', 'Kota Bekasi', 'Jawa Barat', 'www.school.com', '089653652668', 'school@gmail.com', 'SMKN 4 Kota Bekasi/sHO9pZrxl1TffJWZoZIzCL4CMhH1jOjT5BSuSRL0CV5eVxpo60u8XrJVqzRj.jfif', '2020-08-10 02:01:45', '2020-08-24 10:01:03'),
	(2, 'wewe`', 'dhghd', 'hgf', 'ghf', 'hfgf', 'fghfg', 'hgfgf', 'fgfh', 'hghf', 'gfg', 'fgghf', '2020-08-10 02:33:50', '2020-08-10 02:33:51');
/*!40000 ALTER TABLE `ms_school_identities` ENABLE KEYS */;

-- Dumping structure for table e-raport.ms_students
CREATE TABLE IF NOT EXISTS `ms_students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_peserta_didik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jk_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak_ke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dari_berapa_bersaudara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `set_dlm_kel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_peserta_didik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sekolah_asal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_telpon_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_orangtua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_telpon_rumah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_wali` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `di_terima_di_kelas` int(11) DEFAULT NULL,
  `di_terima_pada_tanggal` date DEFAULT NULL,
  `sekarang_kelas` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-raport.ms_students: ~21 rows (approximately)
/*!40000 ALTER TABLE `ms_students` DISABLE KEYS */;
INSERT INTO `ms_students` (`id`, `nama_peserta_didik`, `nomor_induk`, `nis`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `jk_siswa`, `agama`, `anak_ke`, `dari_berapa_bersaudara`, `set_dlm_kel`, `alamat_peserta_didik`, `sekolah_asal`, `nomor_telpon_siswa`, `email_siswa`, `foto_siswa`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_orangtua`, `nomor_telpon_rumah`, `nama_wali`, `jk_wali`, `pekerjaan_wali`, `di_terima_di_kelas`, `di_terima_pada_tanggal`, `sekarang_kelas`, `username`, `status`, `password`, `created_at`, `updated_at`) VALUES
	(22, 'AREDOO RADOOO', '181912309', '209391837', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 4, '2020-09-01', 4, '209391837', 'active', 'siswa123', '2020-09-24 21:49:47', '2020-09-24 21:50:50'),
	(26, 'URFA', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 6, '2020-09-01', 6, '181910174', 'active', 'siswa123', '2020-09-24 21:49:47', '2020-09-24 22:55:46'),
	(27, 'FADILLAH ', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 4, '2020-09-01', 4, '181910174', 'active', 'siswa123', '2020-09-24 21:49:47', '2020-09-28 01:20:30'),
	(28, 'ADILLAH ', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 4, '2010-10-11', 14, '181910174', 'active', 'siswa123', '2020-09-24 21:49:47', '2020-09-28 12:14:59'),
	(29, 'SEFTi', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 6, '2020-09-01', 6, '181910174', 'active', 'siswa123', '2020-09-24 21:49:47', '2020-09-24 22:55:46'),
	(30, 'SEFTIA AYANGAN', '181912309', '209391837', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 6, '2020-09-01', 6, '209391837', 'active', 'siswa123', '2020-09-24 21:49:47', '2020-09-24 22:55:46'),
	(31, 'MELLYNDA NURFADILLAH ', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 5, '2020-09-27', 5, '181910174', 'active', 'siswa123', '2020-09-25 19:44:52', '2020-09-27 22:12:48'),
	(32, 'AREDOO RADOOO', '181912309', '209391837', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 5, '2020-09-27', 5, '209391837', 'active', 'siswa123', '2020-09-25 19:44:52', '2020-09-27 22:12:48'),
	(33, 'NURFADILLAH', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'P', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 3, '2020-09-28', 3, '181910174', 'active', 'siswa123', '2020-09-25 19:44:52', '2020-09-28 01:21:43'),
	(34, 'SEFTIA', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', 'SEFTIA/FwfDOiV5Pe3qX7QPb3pmHrEJ7e8M6YyU4MSCbyc05p2KwSUtVzoAJ9WtParr.jfif', 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 3, '2020-09-28', 3, '181910174', 'active', 'siswa123', '2020-09-25 19:44:52', '2020-09-28 01:21:43'),
	(35, 'MAYADO NURFADILLAH ', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 5, '2020-09-27', 5, '181910174', 'active', 'siswa123', '2020-09-25 19:44:52', '2020-09-27 22:12:48'),
	(37, 'FADILLAH ', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 5, '2020-09-27', 5, '181910174', 'active', 'siswa123', '2020-09-25 19:44:52', '2020-09-27 22:12:48'),
	(38, 'ADILLAH', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 5, '2020-09-27', 5, '181910174', 'active', 'siswa123', '2020-09-25 19:44:52', '2020-09-27 22:12:48'),
	(39, 'SEFTi', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'P', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 3, '2020-09-28', 3, '181910174', 'active', 'siswa123', '2020-09-25 19:44:52', '2020-09-28 01:21:43'),
	(43, 'NURFADILLAH ', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '181910174', 'not_active', 'siswa123', '2020-09-27 23:38:02', '2020-09-27 23:38:02'),
	(44, 'SEFTIA ', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 4, '2020-09-28', 14, '181910174', 'active', 'siswa123', '2020-09-27 23:38:02', '2020-09-28 01:23:47'),
	(46, 'URFA', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '181910174', 'not_active', 'siswa123', '2020-09-27 23:38:02', '2020-09-27 23:38:02'),
	(47, 'FADILLAH ', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 4, '2020-09-14', 1, '181910174', 'active', 'siswa123', '2020-09-27 23:38:02', '2020-09-27 23:38:53'),
	(48, 'ADILLAH ', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, 4, '2020-09-14', 1, '181910174', 'not_active', 'siswa123', '2020-09-27 23:38:02', '2020-09-27 23:39:27'),
	(49, 'SEFTi', '181910174', '181910174', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '181910174', 'not_active', 'siswa123', '2020-09-27 23:38:02', '2020-09-27 23:38:02'),
	(50, 'SEFTIA AYANGAN', '181912309', '209391837', '31563801', 'Bekasi', '2003-07-19', 'L', 'Islam', '1', '1', 'Anak', 'GG.Bunga Wijaya Kusuma V', 'SDN Jatiwarna 2', '89653652668', 'contoh@gmail.com', NULL, 'Dodi Irawan', 'Tati Komalasari', 'Buruh', 'Buruh', 'GG.Bunga wijaya kusuma V', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '209391837', 'not_active', 'siswa123', '2020-09-27 23:38:02', '2020-09-27 23:38:02');
/*!40000 ALTER TABLE `ms_students` ENABLE KEYS */;

-- Dumping structure for table e-raport.ms_teachers
CREATE TABLE IF NOT EXISTS `ms_teachers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nuptk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_study` int(11) DEFAULT NULL,
  `jabatan_fungsional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telpon_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `walas_kelas` int(11) DEFAULT NULL,
  `foto_guru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-raport.ms_teachers: ~2 rows (approximately)
/*!40000 ALTER TABLE `ms_teachers` DISABLE KEYS */;
INSERT INTO `ms_teachers` (`id`, `nama_guru`, `nuptk`, `nip`, `bidang_study`, `jabatan_fungsional`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `jenis_guru`, `no_telpon_guru`, `email_guru`, `walas_kelas`, `foto_guru`, `status_user`, `username`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Denny Joharnudin', '1231312123123121', '123123123123123123', 1, 'PNS', 'Bekasi', '2020-09-15', 'laki-laki', 'Islam', 'produktif', '089653652668', 'denny@gmail.com', 1, 'Denny Joharnudin/dlyTBW94Dl5ymlGqMVUD4tZ5iRQxlWlylDnnI4OLoXQNxlFOUar9tPUpul9y.png', 'not_active', '123123123123123123', 'guru123', '2020-09-08 11:54:22', '2020-09-08 11:54:22'),
	(2, 'Duwi Wulandari', '1293812812387123', '123123123123123123', NULL, NULL, NULL, NULL, 'laki-laki', 'Islam', 'not_produktif', NULL, NULL, NULL, NULL, 'not_active', '191231239123132989', 'guru123', '2020-09-22 12:47:24', '2020-09-22 12:47:40');
/*!40000 ALTER TABLE `ms_teachers` ENABLE KEYS */;

-- Dumping structure for table e-raport.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-raport.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table e-raport.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table e-raport.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `jenis_kelamin`, `no_hp`, `level`, `tempat_lahir`, `tanggal_lahir`, `foto_user`, `status`) VALUES
	(1, 'Diaz Djuliansyah', 'diazdjul19@gmail.com', NULL, '$2y$10$de1IV8.fQ1EJ.BYBqBH6/OoRXYxlcq/dCbG4wQswAp29opcwA0E4a', '1vMJ6d0oA0ogcO2QcAHW1aJ48WlLjQ31vFspHb3aStvVGaCS4a4JT0eOcBIR', '2020-06-14 13:36:33', '2020-09-08 15:39:05', 'laki-laki', '089653652668', 'A', 'Bekasi', '2003-07-19', 'Diaz Djuliansyah/U2ue8NuyjzxT1ERtzB5SobxcQMTm2yvO502rRltV0zQv13YR3jbg7jMjeON9.jpg', 'active'),
	(2, 'Kak Apsyadira', 'Apsya87@gmaiL.com', NULL, '$2y$10$.MphxZYAm4Tu6xOO5e2jA.rzYEG6pFe2RrffcGMRx8jBNRXFIUtJy', NULL, '2020-07-28 12:01:02', '2020-08-23 08:36:53', 'laki-laki', '089653652668', 'A', 'Bekasi', '2020-07-28', 'Kak Apsyadira/0n7qJyPJIqrBUooWR1WFi3mACKDE8V5X3SFKOi6pBwGvEe7eywgsdlGD4K8H.jfif', 'active');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

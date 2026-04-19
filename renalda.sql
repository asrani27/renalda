/*
 Navicat Premium Dump SQL

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80043 (8.0.43)
 Source Host           : localhost:3306
 Source Schema         : renalda

 Target Server Type    : MySQL
 Target Server Version : 80043 (8.0.43)
 File Encoding         : 65001

 Date: 19/04/2026 09:04:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bantuan
-- ----------------------------
DROP TABLE IF EXISTS `bantuan`;
CREATE TABLE `bantuan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL,
  `nilai` bigint NOT NULL,
  `sumber` enum('APBD','HIBAH') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bantuan
-- ----------------------------
BEGIN;
INSERT INTO `bantuan` (`id`, `nama`, `kategori`, `tahun`, `nilai`, `sumber`, `deskripsi`, `created_at`, `updated_at`) VALUES (1, 'Bantuan Sosial Tunai', 'Sosial', 2024, 500000000, 'APBD', 'Bantuan sosial tunai untuk masyarakat kurang mampu di wilayah kabupaten.', '2026-04-05 03:42:05', '2026-04-05 03:42:05');
INSERT INTO `bantuan` (`id`, `nama`, `kategori`, `tahun`, `nilai`, `sumber`, `deskripsi`, `created_at`, `updated_at`) VALUES (2, 'Program Bedah Rumah', 'Perumahan', 2024, 750000000, 'APBD', 'Program renovasi dan pembangunan rumah tidak layak huni bagi keluarga prasejahtera.', '2026-04-05 03:42:05', '2026-04-05 03:42:05');
INSERT INTO `bantuan` (`id`, `nama`, `kategori`, `tahun`, `nilai`, `sumber`, `deskripsi`, `created_at`, `updated_at`) VALUES (3, 'Bantuan Pendampingan UMKM', 'Ekonomi', 2025, 300000000, 'HIBAH', 'Bantuan hibah untuk pendampingan dan pengembangan usaha mikro kecil menengah.', '2026-04-05 03:42:05', '2026-04-05 03:42:05');
INSERT INTO `bantuan` (`id`, `nama`, `kategori`, `tahun`, `nilai`, `sumber`, `deskripsi`, `created_at`, `updated_at`) VALUES (4, 'Beasiswa Pendidikan', 'Pendidikan', 2024, 450000000, 'APBD', 'Program beasiswa untuk siswa berprestasi dari keluarga kurang mampu.', '2026-04-05 03:42:05', '2026-04-05 03:42:05');
INSERT INTO `bantuan` (`id`, `nama`, `kategori`, `tahun`, `nilai`, `sumber`, `deskripsi`, `created_at`, `updated_at`) VALUES (5, 'Bantuan Kesehatan', 'Kesehatan', 2025, 600000000, 'HIBAH', 'Bantuan kesehatan untuk pemeriksaan dan pengobatan gratis bagi masyarakat.', '2026-04-05 03:42:05', '2026-04-05 03:42:05');
INSERT INTO `bantuan` (`id`, `nama`, `kategori`, `tahun`, `nilai`, `sumber`, `deskripsi`, `created_at`, `updated_at`) VALUES (7, 'Bantuan Sosial Tunai', 'Sosial', 2024, 500000000, 'APBD', 'Bantuan sosial tunai untuk masyarakat kurang mampu di wilayah kabupaten.', '2026-04-05 03:59:47', '2026-04-05 03:59:47');
INSERT INTO `bantuan` (`id`, `nama`, `kategori`, `tahun`, `nilai`, `sumber`, `deskripsi`, `created_at`, `updated_at`) VALUES (8, 'Program Bedah Rumah', 'Perumahan', 2024, 750000000, 'APBD', 'Program renovasi dan pembangunan rumah tidak layak huni bagi keluarga prasejahtera.', '2026-04-05 03:59:47', '2026-04-05 03:59:47');
INSERT INTO `bantuan` (`id`, `nama`, `kategori`, `tahun`, `nilai`, `sumber`, `deskripsi`, `created_at`, `updated_at`) VALUES (9, 'Bantuan Pendampingan UMKM', 'Ekonomi', 2025, 300000000, 'HIBAH', 'Bantuan hibah untuk pendampingan dan pengembangan usaha mikro kecil menengah.', '2026-04-05 03:59:47', '2026-04-05 03:59:47');
INSERT INTO `bantuan` (`id`, `nama`, `kategori`, `tahun`, `nilai`, `sumber`, `deskripsi`, `created_at`, `updated_at`) VALUES (10, 'Beasiswa Pendidikan', 'Pendidikan', 2024, 450000000, 'APBD', 'Program beasiswa untuk siswa berprestasi dari keluarga kurang mampu.', '2026-04-05 03:59:47', '2026-04-05 03:59:47');
INSERT INTO `bantuan` (`id`, `nama`, `kategori`, `tahun`, `nilai`, `sumber`, `deskripsi`, `created_at`, `updated_at`) VALUES (11, 'Bantuan Kesehatan', 'Kesehatan', 2025, 600000000, 'HIBAH', 'Bantuan kesehatan untuk pemeriksaan dan pengobatan gratis bagi masyarakat.', '2026-04-05 03:59:47', '2026-04-05 03:59:47');
COMMIT;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for calon_penerima
-- ----------------------------
DROP TABLE IF EXISTS `calon_penerima`;
CREATE TABLE `calon_penerima` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendamping_id` bigint unsigned DEFAULT NULL,
  `dokumen_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_foto_usaha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_sktm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumen_proposal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_verif` enum('valid','tidak valid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tidak valid',
  `tanggal_verif` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `calon_penerima_nik_unique` (`nik`),
  KEY `calon_penerima_pendamping_id_foreign` (`pendamping_id`),
  CONSTRAINT `calon_penerima_pendamping_id_foreign` FOREIGN KEY (`pendamping_id`) REFERENCES `pendamping` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of calon_penerima
-- ----------------------------
BEGIN;
INSERT INTO `calon_penerima` (`id`, `nik`, `nama`, `alamat`, `usaha`, `telp`, `pendamping_id`, `dokumen_ktp`, `dokumen_kk`, `dokumen_foto_usaha`, `dokumen_sktm`, `dokumen_proposal`, `status_verif`, `tanggal_verif`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, '7301010101010001', 'Ahmad Yusuf', 'Jl. Poros No. 45, Kecamatan Mariso, Makassar', 'Warung Makan', '081234567890', 1, 'dokumen/calonpenerima/IafI3E3bL6bE0prPbiOBVhPof3YRdIXnupM6Tz6G.png', 'dokumen/calonpenerima/EQZTo65xbQCey9ITHN4XtkGelfrTqY2z5Cf2xY9c.png', NULL, NULL, NULL, 'valid', '2026-04-05', '2026-04-05 03:59:06', '2026-04-05 04:05:50', NULL);
INSERT INTO `calon_penerima` (`id`, `nik`, `nama`, `alamat`, `usaha`, `telp`, `pendamping_id`, `dokumen_ktp`, `dokumen_kk`, `dokumen_foto_usaha`, `dokumen_sktm`, `dokumen_proposal`, `status_verif`, `tanggal_verif`, `created_at`, `updated_at`, `deleted_at`) VALUES (2, '7302020202020002', 'Siti Aminah', 'Jl. Sungai Saddang No. 12, Kecamatan Ujung Pandang, Makassar', 'Toko Kelontong', '082345678901', 1, NULL, NULL, NULL, NULL, NULL, 'tidak valid', NULL, '2026-04-05 03:59:06', '2026-04-05 03:59:06', NULL);
INSERT INTO `calon_penerima` (`id`, `nik`, `nama`, `alamat`, `usaha`, `telp`, `pendamping_id`, `dokumen_ktp`, `dokumen_kk`, `dokumen_foto_usaha`, `dokumen_sktm`, `dokumen_proposal`, `status_verif`, `tanggal_verif`, `created_at`, `updated_at`, `deleted_at`) VALUES (3, '7303030303030003', 'Budi Santoso', 'Jl. Perintis Kemerdekaan No. 78, Kecamatan Tamalanrea, Makassar', 'Bengkel Motor', '083456789012', 1, NULL, NULL, NULL, NULL, NULL, 'tidak valid', NULL, '2026-04-05 03:59:06', '2026-04-05 03:59:06', NULL);
INSERT INTO `calon_penerima` (`id`, `nik`, `nama`, `alamat`, `usaha`, `telp`, `pendamping_id`, `dokumen_ktp`, `dokumen_kk`, `dokumen_foto_usaha`, `dokumen_sktm`, `dokumen_proposal`, `status_verif`, `tanggal_verif`, `created_at`, `updated_at`, `deleted_at`) VALUES (4, '7304040404040004', 'Dewi Sartika', 'Jl. AP. Pettarani No. 56, Kecamatan Rappocini, Makassar', 'Konveksi', '084567890123', 1, NULL, NULL, NULL, NULL, NULL, 'tidak valid', NULL, '2026-04-05 03:59:06', '2026-04-05 03:59:06', NULL);
INSERT INTO `calon_penerima` (`id`, `nik`, `nama`, `alamat`, `usaha`, `telp`, `pendamping_id`, `dokumen_ktp`, `dokumen_kk`, `dokumen_foto_usaha`, `dokumen_sktm`, `dokumen_proposal`, `status_verif`, `tanggal_verif`, `created_at`, `updated_at`, `deleted_at`) VALUES (5, '7305050505050005', 'Rudi Hartono', 'Jl. Bau Massepe No. 23, Kecamatan Panakkukang, Makassar', 'Jasa Servis Elektronik', '085678901234', 1, NULL, NULL, NULL, NULL, NULL, 'tidak valid', NULL, '2026-04-05 03:59:06', '2026-04-05 03:59:06', NULL);
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for jadwal_penyaluran
-- ----------------------------
DROP TABLE IF EXISTS `jadwal_penyaluran`;
CREATE TABLE `jadwal_penyaluran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendamping_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jadwal_penyaluran_pendamping_id_foreign` (`pendamping_id`),
  CONSTRAINT `jadwal_penyaluran_pendamping_id_foreign` FOREIGN KEY (`pendamping_id`) REFERENCES `pendamping` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jadwal_penyaluran
-- ----------------------------
BEGIN;
INSERT INTO `jadwal_penyaluran` (`id`, `nama`, `tanggal`, `lokasi`, `pendamping_id`, `created_at`, `updated_at`) VALUES (1, 'Penyaluran Bantuan Sosial Tahap 1', '2026-01-15', 'Kecamatan Ujung Pandang, Balai Desa', 1, '2026-04-05 04:21:09', '2026-04-05 04:21:09');
INSERT INTO `jadwal_penyaluran` (`id`, `nama`, `tanggal`, `lokasi`, `pendamping_id`, `created_at`, `updated_at`) VALUES (2, 'Penyaluran Bantuan Sosial Tahap 2', '2026-02-20', 'Kecamatan Rappocini, Aula Kantor Camat', 2, '2026-04-05 04:21:09', '2026-04-05 04:21:09');
INSERT INTO `jadwal_penyaluran` (`id`, `nama`, `tanggal`, `lokasi`, `pendamping_id`, `created_at`, `updated_at`) VALUES (3, 'Penyaluran Bantuan Pangan Non Tunai', '2026-03-10', 'Kecamatan Makassar, Gedung Serbaguna', 3, '2026-04-05 04:21:09', '2026-04-05 04:21:09');
INSERT INTO `jadwal_penyaluran` (`id`, `nama`, `tanggal`, `lokasi`, `pendamping_id`, `created_at`, `updated_at`) VALUES (4, 'Penyaluran Bantuan Sosial Tahap 3', '2026-04-05', 'Kecamatan Panakkukang, Puskesmas Pembantu', 4, '2026-04-05 04:21:09', '2026-04-05 04:21:09');
INSERT INTO `jadwal_penyaluran` (`id`, `nama`, `tanggal`, `lokasi`, `pendamping_id`, `created_at`, `updated_at`) VALUES (5, 'Penyaluran Bantuan Sosial Akhir Tahun', '2026-12-15', 'Kecamatan Tamalanrea, Kantor Kelurahan', 5, '2026-04-05 04:21:09', '2026-04-05 04:21:09');
COMMIT;

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of job_batches
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2026_04_05_031030_create_pendamping_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2026_04_05_032345_add_jabatan_and_unitkerja_to_pendamping_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2026_04_05_033918_create_bantuan_table', 3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7, '2026_04_05_035438_create_calon_penerima_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2026_04_05_040833_create_penerima_table', 5);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9, '2026_04_05_041754_create_jadwal_penyaluran_table', 6);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2026_04_05_042701_create_penyaluran_bantuan_table', 7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11, '2026_04_05_043244_create_serah_terima_table', 8);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12, '2026_04_05_044052_create_monitoring_table', 9);
COMMIT;

-- ----------------------------
-- Table structure for monitoring
-- ----------------------------
DROP TABLE IF EXISTS `monitoring`;
CREATE TABLE `monitoring` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `penerima_id` bigint unsigned NOT NULL,
  `pendamping_id` bigint unsigned NOT NULL,
  `tanggal_monitoring` date NOT NULL,
  `kondisi_usaha` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `perkembangan_usaha` enum('baik','cukup','kurang') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cukup',
  `foto_monitoring` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `monitoring_penerima_id_foreign` (`penerima_id`),
  KEY `monitoring_pendamping_id_foreign` (`pendamping_id`),
  CONSTRAINT `monitoring_pendamping_id_foreign` FOREIGN KEY (`pendamping_id`) REFERENCES `pendamping` (`id`) ON DELETE CASCADE,
  CONSTRAINT `monitoring_penerima_id_foreign` FOREIGN KEY (`penerima_id`) REFERENCES `penerima` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of monitoring
-- ----------------------------
BEGIN;
INSERT INTO `monitoring` (`id`, `penerima_id`, `pendamping_id`, `tanggal_monitoring`, `kondisi_usaha`, `perkembangan_usaha`, `foto_monitoring`, `created_at`, `updated_at`) VALUES (1, 1, 1, '2026-01-20', 'Usaha warung berkembang dengan baik, penjualan meningkat sejak menerima bantuan. Stok barang terjaga dengan baik.', 'baik', NULL, '2026-04-05 04:45:16', '2026-04-05 04:45:16');
INSERT INTO `monitoring` (`id`, `penerima_id`, `pendamping_id`, `tanggal_monitoring`, `kondisi_usaha`, `perkembangan_usaha`, `foto_monitoring`, `created_at`, `updated_at`) VALUES (2, 1, 1, '2026-02-25', 'Usaha berjalan stabil, perlu peningkatan dalam manajemen keuangan dan pencatatan.', 'cukup', NULL, '2026-04-05 04:45:16', '2026-04-05 04:45:16');
INSERT INTO `monitoring` (`id`, `penerima_id`, `pendamping_id`, `tanggal_monitoring`, `kondisi_usaha`, `perkembangan_usaha`, `foto_monitoring`, `created_at`, `updated_at`) VALUES (3, 1, 1, '2026-03-15', 'Usaha mengalami penurunan penjualan akibat cuaca buruk, perlu strategi pemasaran baru.', 'kurang', NULL, '2026-04-05 04:45:16', '2026-04-05 04:45:16');
COMMIT;

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for pendamping
-- ----------------------------
DROP TABLE IF EXISTS `pendamping`;
CREATE TABLE `pendamping` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitkerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pendamping_user_id_foreign` (`user_id`),
  CONSTRAINT `pendamping_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pendamping
-- ----------------------------
BEGIN;
INSERT INTO `pendamping` (`id`, `nama`, `telp`, `kecamatan`, `jabatan`, `unitkerja`, `user_id`, `created_at`, `updated_at`) VALUES (1, 'Ahmad Fauzi', '081234567890', 'Basarang', 'Pendamping Lapangan', 'Dinas Sosial', 3, '2026-04-05 03:23:24', '2026-04-05 03:26:43');
INSERT INTO `pendamping` (`id`, `nama`, `telp`, `kecamatan`, `jabatan`, `unitkerja`, `user_id`, `created_at`, `updated_at`) VALUES (2, 'Siti Aminah', '081234567891', 'Bataguh', 'Pendamping Lapangan', 'Dinas Sosial', 4, '2026-04-05 03:23:25', '2026-04-05 03:26:43');
INSERT INTO `pendamping` (`id`, `nama`, `telp`, `kecamatan`, `jabatan`, `unitkerja`, `user_id`, `created_at`, `updated_at`) VALUES (3, 'Budi Santoso', '081234567892', 'Dadahup', 'Pendamping Lapangan', 'Dinas Sosial', 5, '2026-04-05 03:23:25', '2026-04-05 03:26:43');
INSERT INTO `pendamping` (`id`, `nama`, `telp`, `kecamatan`, `jabatan`, `unitkerja`, `user_id`, `created_at`, `updated_at`) VALUES (4, 'Dewi Sartika', '081234567893', 'Kapuas Barat', 'Pendamping Lapangan', 'Dinas Sosial', 6, '2026-04-05 03:23:25', '2026-04-05 03:26:43');
INSERT INTO `pendamping` (`id`, `nama`, `telp`, `kecamatan`, `jabatan`, `unitkerja`, `user_id`, `created_at`, `updated_at`) VALUES (5, 'Eko Prasetyo', '081234567894', 'Kapuas Hilir', 'Pendamping Lapangan', 'Dinas Sosial', 7, '2026-04-05 03:23:25', '2026-04-05 03:26:43');
INSERT INTO `pendamping` (`id`, `nama`, `telp`, `kecamatan`, `jabatan`, `unitkerja`, `user_id`, `created_at`, `updated_at`) VALUES (6, 'Fitriani Rahayu', '081234567895', 'Kapuas Hulu', 'Pendamping Lapangan', 'Dinas Sosial', 8, '2026-04-05 03:23:26', '2026-04-05 03:26:43');
INSERT INTO `pendamping` (`id`, `nama`, `telp`, `kecamatan`, `jabatan`, `unitkerja`, `user_id`, `created_at`, `updated_at`) VALUES (7, 'Gunawan Wijaya', '081234567896', 'Kapuas Kuala', 'Pendamping Lapangan', 'Dinas Sosial', 9, '2026-04-05 03:23:26', '2026-04-05 03:26:43');
INSERT INTO `pendamping` (`id`, `nama`, `telp`, `kecamatan`, `jabatan`, `unitkerja`, `user_id`, `created_at`, `updated_at`) VALUES (8, 'Hartini Putri', '081234567897', 'Kapuas Murung', 'Pendamping Lapangan', 'Dinas Sosial', 10, '2026-04-05 03:23:26', '2026-04-05 03:26:43');
INSERT INTO `pendamping` (`id`, `nama`, `telp`, `kecamatan`, `jabatan`, `unitkerja`, `user_id`, `created_at`, `updated_at`) VALUES (9, 'Indra Lesmana', '081234567898', 'Kapuas Tengah', 'Pendamping Lapangan', 'Dinas Sosial', 11, '2026-04-05 03:23:26', '2026-04-05 03:26:43');
INSERT INTO `pendamping` (`id`, `nama`, `telp`, `kecamatan`, `jabatan`, `unitkerja`, `user_id`, `created_at`, `updated_at`) VALUES (10, 'Junita Sari', '081234567899', 'Kapuas Timur', 'Pendamping Lapangan', 'Dinas Sosial', 12, '2026-04-05 03:23:27', '2026-04-05 03:26:43');
COMMIT;

-- ----------------------------
-- Table structure for penerima
-- ----------------------------
DROP TABLE IF EXISTS `penerima`;
CREATE TABLE `penerima` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `calon_penerima_id` bigint unsigned NOT NULL,
  `bantuan_id` bigint unsigned NOT NULL,
  `status_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `tanggal_penyaluran` date DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penerima_calon_penerima_id_foreign` (`calon_penerima_id`),
  KEY `penerima_bantuan_id_foreign` (`bantuan_id`),
  CONSTRAINT `penerima_bantuan_id_foreign` FOREIGN KEY (`bantuan_id`) REFERENCES `bantuan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `penerima_calon_penerima_id_foreign` FOREIGN KEY (`calon_penerima_id`) REFERENCES `calon_penerima` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of penerima
-- ----------------------------
BEGIN;
INSERT INTO `penerima` (`id`, `calon_penerima_id`, `bantuan_id`, `status_penerima`, `tanggal_penyaluran`, `catatan`, `created_at`, `updated_at`) VALUES (1, 1, 1, 'Disetujui', '2026-01-15', 'Penyaluran bantuan telah dilakukan dengan lancar. Penerima sudah menerima dana bantuan.', '2026-04-05 04:14:31', '2026-04-05 04:14:31');
COMMIT;

-- ----------------------------
-- Table structure for penyaluran_bantuan
-- ----------------------------
DROP TABLE IF EXISTS `penyaluran_bantuan`;
CREATE TABLE `penyaluran_bantuan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jadwal_penyaluran_id` bigint unsigned NOT NULL,
  `penerima_id` bigint unsigned NOT NULL,
  `status` enum('dalam proses','salur') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dalam proses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penyaluran_bantuan_jadwal_penyaluran_id_foreign` (`jadwal_penyaluran_id`),
  KEY `penyaluran_bantuan_penerima_id_foreign` (`penerima_id`),
  CONSTRAINT `penyaluran_bantuan_jadwal_penyaluran_id_foreign` FOREIGN KEY (`jadwal_penyaluran_id`) REFERENCES `jadwal_penyaluran` (`id`) ON DELETE CASCADE,
  CONSTRAINT `penyaluran_bantuan_penerima_id_foreign` FOREIGN KEY (`penerima_id`) REFERENCES `penerima` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of penyaluran_bantuan
-- ----------------------------
BEGIN;
INSERT INTO `penyaluran_bantuan` (`id`, `tanggal`, `jadwal_penyaluran_id`, `penerima_id`, `status`, `created_at`, `updated_at`) VALUES (1, '2026-04-01', 1, 1, 'salur', '2026-04-05 04:31:04', '2026-04-05 04:31:04');
INSERT INTO `penyaluran_bantuan` (`id`, `tanggal`, `jadwal_penyaluran_id`, `penerima_id`, `status`, `created_at`, `updated_at`) VALUES (2, '2026-01-15', 1, 1, 'salur', '2026-04-05 04:31:37', '2026-04-05 04:31:37');
INSERT INTO `penyaluran_bantuan` (`id`, `tanggal`, `jadwal_penyaluran_id`, `penerima_id`, `status`, `created_at`, `updated_at`) VALUES (3, '2026-03-10', 3, 1, 'dalam proses', '2026-04-05 04:31:37', '2026-04-05 04:31:37');
COMMIT;

-- ----------------------------
-- Table structure for serah_terima
-- ----------------------------
DROP TABLE IF EXISTS `serah_terima`;
CREATE TABLE `serah_terima` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `penerima_id` bigint unsigned NOT NULL,
  `pendamping_id` bigint unsigned NOT NULL,
  `nomor_bast` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bast` date NOT NULL,
  `foto_bast` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `serah_terima_penerima_id_foreign` (`penerima_id`),
  KEY `serah_terima_pendamping_id_foreign` (`pendamping_id`),
  CONSTRAINT `serah_terima_pendamping_id_foreign` FOREIGN KEY (`pendamping_id`) REFERENCES `pendamping` (`id`) ON DELETE CASCADE,
  CONSTRAINT `serah_terima_penerima_id_foreign` FOREIGN KEY (`penerima_id`) REFERENCES `penerima` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of serah_terima
-- ----------------------------
BEGIN;
INSERT INTO `serah_terima` (`id`, `penerima_id`, `pendamping_id`, `nomor_bast`, `tanggal_bast`, `foto_bast`, `created_at`, `updated_at`) VALUES (1, 1, 1, 'BAST/001/2026', '2026-01-15', '1775363804_sakti.png', '2026-04-05 04:36:18', '2026-04-05 04:36:44');
INSERT INTO `serah_terima` (`id`, `penerima_id`, `pendamping_id`, `nomor_bast`, `tanggal_bast`, `foto_bast`, `created_at`, `updated_at`) VALUES (2, 1, 1, 'BAST/002/2026', '2026-02-20', NULL, '2026-04-05 04:36:18', '2026-04-05 04:36:18');
INSERT INTO `serah_terima` (`id`, `penerima_id`, `pendamping_id`, `nomor_bast`, `tanggal_bast`, `foto_bast`, `created_at`, `updated_at`) VALUES (3, 1, 1, 'BAST/003/2026', '2026-03-10', NULL, '2026-04-05 04:36:18', '2026-04-05 04:36:18');
COMMIT;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'Super Admin', 'superadmin', 'admin', '$2y$12$mOw5E3nkQ4gFZJGceUNnIee5bkYn8zHqhp2sDvTSZ7KxZBm3/1bE2', NULL, '2026-04-05 03:23:24', '2026-04-05 03:23:24');
INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (2, 'Pendamping', 'pendamping', 'user', '$2y$12$3PgmRq.r2NUHYsHr6Uh9wOgKI7puxe3UdnWaAn0dVkP7uaVO5SMvG', NULL, '2026-04-05 03:23:24', '2026-04-05 03:23:24');
INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (3, 'Ahmad Fauzi', 'ahmadfauzi', 'user', '$2y$12$bxxKpcRoe6o83DfXnHXsbObhoVQwuiHK8KJr2B.6KuyI675GzY8VG', NULL, '2026-04-05 03:23:24', '2026-04-05 03:23:24');
INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (4, 'Siti Aminah', 'sitiaminah', 'user', '$2y$12$43zjUFxxC0No.UsEy5I0XefSi41ocrcelQglLfr9.APqX3YgrYifm', NULL, '2026-04-05 03:23:25', '2026-04-05 03:23:25');
INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (5, 'Budi Santoso', 'budisantoso', 'user', '$2y$12$SorI5TC4CXXxACeCODSOBOE46vOqWC3sjku.GeJB9iIMU9VnidHwa', NULL, '2026-04-05 03:23:25', '2026-04-05 03:23:25');
INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (6, 'Dewi Sartika', 'dewisartika', 'user', '$2y$12$6nXZVFjkZNXr3.H86I4j6.hgDoybtH6Beayd7KJTiI8cD/9Rrch/i', NULL, '2026-04-05 03:23:25', '2026-04-05 03:23:25');
INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (7, 'Eko Prasetyo', 'ekoprasetyo', 'user', '$2y$12$0Ki8lfjiQNJRaiLTPiV.L.NLVl0pXUFwYbRZXSLUI86IBpuoISJr.', NULL, '2026-04-05 03:23:25', '2026-04-05 03:23:25');
INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (8, 'Fitriani Rahayu', 'fitrianirahayu', 'user', '$2y$12$4fjSyRN4nHezlrg5vA1lC.UytwdMXLByRc8pbr/I5dJG8WYsdi.La', NULL, '2026-04-05 03:23:26', '2026-04-05 03:23:26');
INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (9, 'Gunawan Wijaya', 'gunawanwijaya', 'user', '$2y$12$IgfF0cV/tYqDL6FPVJ4TFulOBmZtQv7ozRPBzJ7xZhas8guKzdMUu', NULL, '2026-04-05 03:23:26', '2026-04-05 03:23:26');
INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (10, 'Hartini Putri', 'hartiniputri', 'user', '$2y$12$xEeqwNLxeXspqBQIS3Gq.uL1ntkuOhEtukG1T.yxQBD69cDd8QA46', NULL, '2026-04-05 03:23:26', '2026-04-05 03:23:26');
INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (11, 'Indra Lesmana', 'indralesmana', 'user', '$2y$12$qxYgy3VRoMyl8ONinW7WEeQwIna6xrO0nX0.U2I6jh/nRKeonOeam', NULL, '2026-04-05 03:23:26', '2026-04-05 03:23:26');
INSERT INTO `users` (`id`, `name`, `username`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (12, 'Junita Sari', 'junitasari', 'user', '$2y$12$p.5HUVhPPXAEUEAee9D9TexwiXteCZX1JmKY55ujAfRnBYat/8ueO', NULL, '2026-04-05 03:23:27', '2026-04-05 03:23:27');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

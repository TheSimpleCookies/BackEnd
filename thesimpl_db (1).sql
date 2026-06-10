-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Jun 2026 pada 19.16
-- Versi server: 10.11.18-MariaDB
-- Versi PHP: 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesimpl_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_06_135036_create_products_table', 2),
(5, '2026_04_06_155335_create_orders_table', 3),
(6, '2026_04_21_204412_create_testimonies_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `detail_pesanan` text NOT NULL,
  `total_harga` int(11) NOT NULL,
  `catatan` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `nama_pembeli`, `tanggal_pesanan`, `detail_pesanan`, `total_harga`, `catatan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'saodah', '2026-04-17', '[{\"name\":\"Fruit Salad\",\"price\":25000,\"qty\":3}]', 75000, 'hampers', 'completed', '2026-04-07 22:18:56', '2026-04-27 12:27:50'),
(3, 'udin', '2026-04-11', '[{\"name\":\"Nastar\",\"price\":45000,\"qty\":1},{\"name\":\"Brownies\",\"price\":35000,\"qty\":1}]', 80000, 'buat yang cantik ya', 'completed', '2026-04-08 00:34:13', '2026-04-27 12:27:41'),
(4, 'udin', '2026-04-11', '[{\"name\":\"Nastar\",\"price\":45000,\"qty\":1},{\"name\":\"Brownies\",\"price\":35000,\"qty\":1}]', 80000, 'buat yang cantik ya', 'completed', '2026-04-08 00:34:13', '2026-04-27 12:27:45'),
(5, 'Zahrina', '2026-04-26', 'Nastar (1) - Rp45000\nKastengel (1) - Rp55000\nBrownies (1) - Rp35000\nFruit Salad (1) - Rp25000', 160000, 'ultah', 'completed', '2026-04-19 10:32:55', '2026-04-20 01:19:12'),
(6, 'Zahrina', '2026-04-26', 'Kastengel (1) - Rp55000\nNastar (1) - Rp45000\nBrownies (1) - Rp35000', 135000, 'ultah', 'completed', '2026-04-19 10:42:16', '2026-04-19 13:17:06'),
(7, 'dwi', '2026-04-25', 'Nastar (1) - Rp45000\nKastengel (1) - Rp55000', 100000, 'ooo', 'completed', '2026-04-19 10:42:59', '2026-04-19 13:17:01'),
(8, 'alin', '2026-04-28', 'Nastar (1) - Rp45000\nKastengel (1) - Rp55000', 100000, 'oooo', 'completed', '2026-04-19 10:49:28', '2026-04-19 10:49:28'),
(9, 'ara', '2026-04-24', 'Nastar (1) - Rp45000\nKastengel (1) - Rp55000', 100000, 'oooo', 'completed', '2026-04-19 10:50:06', '2026-04-19 10:50:06'),
(10, 'uu', '2026-04-24', 'Nastar (1) - Rp45000', 45000, 'uuu', 'completed', '2026-04-19 10:52:45', '2026-04-19 12:50:58'),
(11, 'Dwi Hesti', '2026-04-26', 'Klappertarr (6) - Rp21000\nNagasari (6) - Rp12000\nKroket (6) - Rp15000\nDadar Gulung (6) - Rp18000\nBirthday Cake (1) - Rp80000', 146000, 'buatkan kue ultah yang lucu', 'completed', '2026-04-21 12:56:51', '2026-04-27 12:27:36'),
(12, 'Dwi Hesti', '2026-04-30', 'Birthday Cake 3 (1) - Rp150000', 150000, 'tolong buat warna biru elegan simple', 'completed', '2026-04-27 07:13:37', '2026-04-27 12:27:33'),
(13, 'hAI', '2026-04-30', 'Arem-arem (1) - Rp3500\nCornflake (1) - Rp55000\nChoco chips (1) - Rp55000', 113500, 'IIII', 'completed', '2026-04-28 23:05:36', '2026-05-02 06:30:26'),
(14, 'ila', '2026-05-16', 'Cornflake (1) - Rp55000\nChoco chips (1) - Rp55000\nFudgy Brownies (1) - Rp55000', 165000, 'nnnnn', 'completed', '2026-05-05 05:41:57', '2026-05-11 07:14:47'),
(15, 'Dita', '2026-05-22', 'Nagasari (20) - Rp40000\nKlappertarr (20) - Rp70000\nKroket (20) - Rp50000', 160000, 'iiiiii', 'completed', '2026-05-05 06:18:36', '2026-05-11 07:14:30'),
(16, 'asma', '2026-05-28', 'Fudgy Brownies (2) - Rp110000', 110000, 'iiiii', 'completed', '2026-05-11 05:58:17', '2026-05-11 06:37:21'),
(17, 'Salad Buah enakk', '2026-05-13', 'Dadar Gulung (1) - Rp3000\nKroket (1) - Rp2500\nFudgy Brownies (1) - Rp55000', 60500, NULL, 'completed', '2026-05-13 04:44:04', '2026-05-20 00:05:54'),
(18, 'Anissa Fauzia Isyanti', '2026-05-15', 'Birthday Cake 2 (1) - Rp100000', 100000, 'Diambil', 'completed', '2026-05-14 08:54:24', '2026-06-02 18:47:55'),
(582, 'Araachan', '2026-05-27', 'Dadar Gulung (1) - Rp3000\nRollCake Keju (1) - Rp40000\nKastengel (1) - Rp80000', 123000, 'suka suka', 'new', '2026-05-19 23:51:32', '2026-05-19 23:51:32'),
(583, 'Anisa', '2026-05-20', 'Fudgy Brownies (1) - Rp55000', 55000, 'dibungkus kado', 'new', '2026-05-20 01:01:51', '2026-05-20 01:01:51'),
(584, 'Anisa', '2026-05-27', 'Fudgy Brownies (1) - Rp45000\nArem-arem (1) - Rp3500', 48500, 'packing', 'new', '2026-05-20 01:14:15', '2026-05-20 01:14:15'),
(585, 'Anisa', '2026-06-05', 'Pistuban (1) - Rp3500', 3500, NULL, 'new', '2026-06-02 18:39:49', '2026-06-02 18:39:49'),
(586, 'Anisa', '2026-06-05', 'Fudgy Brownies (1) - Rp55000', 55000, NULL, 'new', '2026-06-02 18:40:51', '2026-06-02 18:40:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `kategori`, `image`, `description`, `created_at`, `updated_at`) VALUES
(14, 'Dadar Gulung', 3000, 'Snack', '1776784418.jpeg', 'Isian gula merah', '2026-04-21 08:13:38', '2026-04-21 08:13:38'),
(18, 'Kroket', 2500, 'Snack', '1776799675.jpeg', 'isian banyak', '2026-04-21 12:27:55', '2026-04-21 12:27:55'),
(19, 'Pistuban', 3500, 'Snack', '1776799755.jpeg', 'Bisa ada tambahan nangka', '2026-04-21 12:29:15', '2026-05-21 08:59:32'),
(20, 'Klappertarr', 3500, 'Snack', '1776799815.jpeg', 'kue enak', '2026-04-21 12:30:15', '2026-04-21 12:30:15'),
(21, 'Birthday Cake', 80000, 'Birthday Cake', '1776799905.jpeg', '20x10 cm', '2026-04-21 12:31:45', '2026-04-21 12:31:45'),
(22, 'Birthday Cake 2', 100000, 'Birthday Cake', '1776799955.jpeg', 'Bisa request', '2026-04-21 12:32:35', '2026-04-21 12:32:35'),
(23, 'Roti Goreng', 3500, 'Snack', '1776800152.jpeg', 'isi mayo, rougot, sosis', '2026-04-21 12:35:52', '2026-04-21 12:35:52'),
(24, 'RollCake 22 cm', 35000, 'Bolu', '1776800548.jpeg', 'start harga 35 ribu', '2026-04-21 12:42:28', '2026-04-21 12:42:28'),
(25, 'RollCake Keju', 40000, 'Bolu', '1776800598.jpeg', 'topping keju yang melimpah', '2026-04-21 12:43:18', '2026-04-21 12:43:18'),
(26, 'Kastengel', 80000, 'Kue Kering', '1776840201.jpeg', 'Kue kering', '2026-04-21 23:43:21', '2026-04-21 23:43:21'),
(27, 'Nastar Keju', 85000, 'Kue Kering', '1776840274.jpeg', 'nastar taburan keju', '2026-04-21 23:44:34', '2026-04-21 23:44:34'),
(28, 'Birthday Cake 3', 150000, 'Birthday Cake', '1776840331.jpeg', 'custom', '2026-04-21 23:45:31', '2026-04-21 23:45:31'),
(29, 'Jentik Manis', 2000, 'Snack', '1776840524.jpeg', 'mutiara', '2026-04-21 23:48:44', '2026-04-21 23:48:44'),
(32, 'Lidah Kucing', 55000, 'Kue Kering', '1776840764.jpeg', 'Lidah kucing', '2026-04-21 23:52:44', '2026-04-21 23:52:44'),
(33, 'Putri Salju', 75000, 'Kue Kering', '1776840811.jpeg', 'putsal', '2026-04-21 23:53:31', '2026-04-21 23:53:31'),
(34, 'Chiffon Keju', 55000, 'Bolu', '1776840877.jpeg', 'uk 20 cm', '2026-04-21 23:54:37', '2026-04-21 23:54:37'),
(35, 'Fudgy Brownies', 45000, 'Bolu', '1776840931.jpeg', 'Fudgy', '2026-04-21 23:55:31', '2026-04-21 23:55:31'),
(36, 'Arem-arem', 3500, 'Snack', '1776841103.jpeg', 'arem-arem mie', '2026-04-21 23:58:23', '2026-04-21 23:58:23'),
(37, 'Cornflake', 55000, 'Kue Kering', '1776841167.jpeg', 'kue jagung', '2026-04-21 23:59:27', '2026-04-21 23:59:27'),
(38, 'Choco chips', 55000, 'Kue Kering', '1777391307.jpeg', 'coklat', '2026-04-22 00:05:18', '2026-04-28 08:48:27'),
(41, 'Fudgy Brownies', 55000, 'Bolu', '1777392466.jpeg', 'custom', '2026-04-28 09:05:26', '2026-05-02 06:43:42'),
(43, 'Ketan Gula Jawa', 3500, 'Snack', '1780468633.jpeg', '......', '2026-06-02 23:37:13', '2026-06-02 23:37:13'),
(44, 'Pastery', 3500, 'Snack', '1780469305.jpeg', 'seperti pastel', '2026-06-02 23:48:25', '2026-06-02 23:48:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dkOcyeo3eGQOtUnCXZyFou303C9DcEey1nZFHnGK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTjQ1QzZyZU92QWVtdUtiUjJ4RHljNXBuOW9vZ2RoUWZkdE9USkVkWCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjk6ImRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1778645452),
('fdxV2P6SKx5PJXWOnfdZutkcfGd3mBW81ttnGtnV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieWViekdkZjJqZk43NDdWdTNoaE5sOHMxcjg4amFidlA3U1g0cG0yeSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjk6ImRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1778500250),
('jCGWFIPy5nDV2hE8S617WDywrfITQaKVhraKbj1D', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRTZYWlpZbGdhbFhFMmhsdXAxaGFENjNRbUl4RVl5aU5tSUI3TWM1WSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjk6ImRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1777987381),
('VLIiYqvkAhC2wo3JRLpPMkhvM0Ix7hUxLfYEXVRb', 3, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 8.0.0; SM-G955U Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUW5JaW1KSnduTU55cGI0dGRUVGVTREFqQ1pNdTlGYUdhbUFuQWdreiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvY2F0YWxvZyI7czo1OiJyb3V0ZSI7czoxMzoiY2F0YWxvZy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1778645562),
('ZZrzCtnNJhk7oGOmX5qZalrjLqkfn2TSRDMOBj0D', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaTJTQkw2SjB3ZlBIOURqQXpCWWJRaTQzUzJFY0RvQmp5RVBhZmpkcyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXRhbG9nP3NlYXJjaD1wdXRyaSUyMHNhbGp1IjtzOjU6InJvdXRlIjtzOjEzOiJjYXRhbG9nLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1778509486);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonies`
--

CREATE TABLE `testimonies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `testimonies`
--

INSERT INTO `testimonies` (`id`, `nama`, `rating`, `pesan`, `created_at`, `updated_at`) VALUES
(394, 'Citra', 5, 'Kue enak dan harga murah dijamin ga nyesal beli di sini', '2026-05-19 18:36:26', '2026-05-19 18:36:26'),
(395, 'Anisa', 5, 'enak dan banyak pilihan, murce, packaging rapi dan bagus', '2026-05-20 00:39:19', '2026-05-20 00:39:19'),
(396, 'DavidVot', 5, 'Good morning! thesimple.my.id, \r\nWhile browsing web pages I noticed your website. \r\nOur service helps companies reach new partners through website contact pages. \r\nMany businesses use platforms like this to connect with website owners online. \r\n  \r\nYou can try the service without any commitment. \r\nLet us know if this approach might interest you. \r\n \r\nAppreciate your time. \r\nContact us. \r\nTelegram - https://t.me/FeedbackFormEU \r\nWhatsApp - +375259112693 \r\nWhatsApp  https://wa.me/+375259112693', '2026-05-27 16:47:19', '2026-05-27 16:47:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'adminmanis', 'haiii@gmail.com', NULL, '$2y$12$gPTwc9nGm1XM8CwbNMhsWOjCayASGns64Ybe4zT6umCqdzM4UQj02', NULL, '2026-04-06 10:30:16', '2026-04-06 10:30:16'),
(3, 'admincantiksekali', 'admincantikskl@gmail.com', NULL, '$2y$12$dzeoQbCnS8AU0Rx5HaJ5M.idBGwwsu/FuQQ9QUYU8x2N1n.bp0F.y', NULL, '2026-04-19 10:02:16', '2026-04-19 13:07:02'),
(4, 'zahrina', 'antikazahrina@gmail.com', NULL, '$2y$12$c.0YmsG0joHjuC09RcZjeePef/jO5h0nj2PiycWnXRwTywvgOm0QO', NULL, '2026-05-19 09:32:30', '2026-05-19 09:32:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `testimonies`
--
ALTER TABLE `testimonies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=587;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `testimonies`
--
ALTER TABLE `testimonies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

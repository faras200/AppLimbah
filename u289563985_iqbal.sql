-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 10 Agu 2023 pada 13.25
-- Versi server: 10.6.14-MariaDB-cll-lve
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u289563985_iqbal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis_alamat` varchar(100) DEFAULT NULL,
  `alamat_lengkap` text DEFAULT NULL,
  `lang` varchar(100) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `patokan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`id`, `user_id`, `jenis_alamat`, `alamat_lengkap`, `lang`, `lat`, `patokan`, `created_at`, `updated_at`) VALUES
(3, 5, 'Rumah', 'Villa Karawaci Indah Blok A21 No2 Rt14 Rw9 Jl. Kenari mawar 3', '106.701777', '-6.1442185', 'Rumah cat biru, pagar hitam', '2023-07-13 21:31:08', '2023-07-13 21:42:03'),
(4, 4, 'Kantor', 'Villa Perum Indah Tangsel', '106.7018378', '-6.1441713', 'Rumah cat oren, pagar hitam', '2023-07-14 00:19:56', '2023-07-14 00:19:56'),
(5, 8, 'Rumah', 'Villa Perum Karawaci Tangerang', '106.6138022', '-6.2088137', 'Rumah cat biru, pagar hitam', '2023-07-15 17:11:54', '2023-07-15 17:11:54'),
(6, 10, 'Gudang', 'Villa Tangerang Elok Blok b2 No1', '106.6138272', '-6.2088238', 'Rumah cat biru, pagar hitam', '2023-07-15 21:21:11', '2023-07-15 21:21:11'),
(7, 1, 'Rumah', 'Cipondoh', '106.6138228', '-6.2088314', 'Rumah cat biru, pagar hitam', '2023-07-15 22:30:21', '2023-07-15 22:30:21'),
(8, 14, 'Kantor', 'jl kamboja teluknaga', '106.6893312', '-6.209536', 'jalan  gang merah', '2023-07-25 23:28:24', '2023-07-25 23:28:37'),
(9, 15, 'Rumah', 'teluknaga', '106.660801', '-6.055207', 'pinggir jalan', '2023-07-29 13:30:16', '2023-07-29 13:30:16'),
(10, 13, 'Kantor', 'RT 12 RW 07', '106.6138968', '-6.208815', 'Rumah cat biru, pagar hitam', '2023-07-30 20:09:48', '2023-07-30 20:09:48'),
(11, 16, 'Rumah', 'RT 02/ RW 07', '106.6138998', '-6.2088157', 'Rumah cat biru, pagar hitam', '2023-07-30 20:13:09', '2023-07-30 20:13:09'),
(12, 17, 'Rumah', 'tangerang', '106.807296', '-6.2291968', 'pinggir jalam', '2023-08-01 13:31:41', '2023-08-01 13:31:41'),
(13, 20, 'Rumah', 'tangerang', '106.807296', '-6.22592', 'belakang', '2023-08-03 16:55:59', '2023-08-03 16:55:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `komentar` text DEFAULT NULL,
  `penawaran` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `user_id`, `komentar`, `penawaran`, `created_at`, `updated_at`) VALUES
(24, 8, 13, 'Gimana Gan?', 'kosong', '2023-07-25 23:25:03', '2023-07-25 23:25:03'),
(25, 8, 13, 'kosong', '180000', '2023-07-25 23:25:19', '2023-07-25 23:25:19'),
(26, 8, 4, 'Oke deal gan', 'kosong', '2023-07-25 23:26:07', '2023-07-25 23:26:07'),
(27, 9, 4, 'kosong', '150000', '2023-07-25 23:32:14', '2023-07-25 23:32:14'),
(28, 9, 14, 'oke gan', 'kosong', '2023-07-25 23:34:11', '2023-07-25 23:34:11'),
(31, 11, 4, 'kosong', '190000', '2023-07-29 19:47:13', '2023-07-29 19:47:13'),
(32, 11, 4, '190rb yah gan jika sesuai langsung pegawai langsung berangkat gan', 'kosong', '2023-07-29 19:47:52', '2023-07-29 19:47:52'),
(33, 11, 15, 'oke baik gan langsung jemput sesuai alamat yang tertera yah gan', 'kosong', '2023-07-29 19:48:48', '2023-07-29 19:48:48'),
(34, 12, 4, 'kosong', '190000', '2023-07-30 20:15:10', '2023-07-30 20:15:10'),
(36, 12, 4, 'ok gan', 'kosong', '2023-07-30 20:17:27', '2023-07-30 20:17:27'),
(37, 13, 4, 'kosong', '1900000', '2023-07-31 19:43:27', '2023-07-31 19:43:27'),
(38, 13, 15, 'oke gan', 'kosong', '2023-07-31 19:43:49', '2023-07-31 19:43:49'),
(39, 14, 4, 'kosong', '190000', '2023-07-31 19:49:23', '2023-07-31 19:49:23'),
(40, 14, 15, 'oke gan', 'kosong', '2023-07-31 19:50:00', '2023-07-31 19:50:00'),
(41, 15, 4, 'kosong', '150000', '2023-08-01 09:36:04', '2023-08-01 09:36:04'),
(42, 15, 4, 'barang terlalu jadul gan gimana', 'kosong', '2023-08-01 09:36:55', '2023-08-01 09:36:55'),
(43, 15, 15, 'kosong', '160', '2023-08-01 09:37:32', '2023-08-01 09:37:32'),
(44, 15, 15, 'kosong', '160000', '2023-08-01 09:37:44', '2023-08-01 09:37:44'),
(45, 15, 15, 'gimana gan segitu gan', 'kosong', '2023-08-01 09:38:00', '2023-08-01 09:38:00'),
(46, 15, 4, 'oke gan', 'kosong', '2023-08-01 09:38:21', '2023-08-01 09:38:21'),
(47, 16, 4, 'kosong', '150000', '2023-08-01 13:29:52', '2023-08-01 13:29:52'),
(48, 16, 17, 'oke gan setuju', 'kosong', '2023-08-01 13:30:36', '2023-08-01 13:30:36'),
(49, 16, 4, 'oke lanjut transkaksi', 'kosong', '2023-08-01 13:30:57', '2023-08-01 13:30:57'),
(50, 17, 4, 'kosong', '140000', '2023-08-01 14:00:20', '2023-08-01 14:00:20'),
(51, 17, 18, 'Ga masuk harganya', 'kosong', '2023-08-01 14:01:39', '2023-08-01 14:01:39'),
(52, 18, 4, 'kosong', '150000', '2023-08-03 16:49:05', '2023-08-03 16:49:05'),
(53, 19, 4, 'kosong', '150000', '2023-08-03 16:52:10', '2023-08-03 16:52:10');

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
(7, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(10, '2020_12_22_000000_create_connected_accounts_table', 1),
(11, '2022_09_15_161713_create_posts_table', 1),
(12, '2022_09_16_075859_create_sessions_table', 1),
(13, '2022_09_16_135128_create_mahasiswas_table', 1),
(22, '2014_10_12_000000_create_users_table', 2),
(23, '2014_10_12_100000_create_password_resets_table', 2),
(24, '2019_08_19_000000_create_failed_jobs_table', 2),
(25, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(26, '2018_06_30_113500_create_comments_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjemputan`
--

CREATE TABLE `penjemputan` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alamat_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjemputan`
--

INSERT INTO `penjemputan` (`id`, `transaksi_id`, `user_id`, `alamat_id`, `petugas_id`, `status`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(12, 18, 15, 9, 12, 'Selesai', 'okee', 'https://muhamad-iqbal.skripsiit2023.online//storage/photos/12/istockphoto-1134301606-612x612.jpg', '2023-07-31 19:44:27', '2023-07-31 19:46:48'),
(13, 19, 15, 9, 12, 'Selesai', 'sesuai gan', 'https://muhamad-iqbal.skripsiit2023.online//storage/photos/12/WhatsApp Image 2023-07-31 at 18.52.09.jpeg', '2023-07-31 19:51:25', '2023-07-31 19:53:04'),
(14, 20, 15, 9, 12, 'Selesai', 'barang sudah sesuai', 'https://muhamad-iqbal.skripsiit2023.online//storage/photos/12/WhatsApp Image 2023-07-31 at 18.52.16.jpeg', '2023-08-01 09:40:13', '2023-08-01 09:42:21'),
(15, 21, 17, 12, 12, 'Selesai', 'sudah sesuai', 'https://muhamad-iqbal.skripsiit2023.online//storage/photos/12/WhatsApp Image 2023-07-31 at 17.18.08.jpeg', '2023-08-01 13:33:00', '2023-08-01 13:34:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `user_id`, `nama_barang`, `deskripsi_barang`, `jenis`, `status`, `harga`, `foto`, `berat`, `created_at`, `updated_at`) VALUES
(6, 5, 'Limbah Botol', '<p>Barang oke gan</p>', 'plastik', 'Non-Aktif', 200000, 'https://muhamad-iqbal.skripsiit2023.online/storage/photos/5/logo.png', '150Kg', '2023-07-18 14:09:36', '2023-07-20 06:43:58'),
(9, 14, 'limbah besi', '<p>gan jemput ke langsung yah ke kanton</p>', 'besi', 'Aktif', 200000, 'https://muhamad-iqbal.skripsiit2023.online//storage/photos/14/WhatsApp Image 2023-07-31 at 19.15.08.jpeg', '200kg', '2023-07-25 23:30:18', '2023-07-31 19:16:10'),
(13, 15, 'Limbah elektronik', '<p>Barang Limbah elektronik dengan 200 kg untuk harga 2.000.000</p>\r\n\r\n<p>mohon di jemput yah gan&nbsp;</p>', 'elektronik', 'Aktif', 2000000, 'https://muhamad-iqbal.skripsiit2023.online//storage/photos/15/WhatsApp Image 2023-07-31 at 18.52.59.jpeg', '200kg', '2023-07-31 19:40:36', '2023-07-31 19:54:36'),
(14, 15, 'Limbah Plastik', '<p>jemput yah gan</p>', 'plastik', 'Non-Aktif', 200000, 'https://muhamad-iqbal.skripsiit2023.online//storage/photos/15/WhatsApp Image 2023-07-31 at 18.52.09.jpeg', '200 kg', '2023-07-31 19:48:30', '2023-07-31 19:50:11'),
(15, 15, 'Barang elektronik', '<p>Limbah elektronik bekas komponen leptop seberat 10 kg&nbsp;</p>\r\n\r\n<p>mohon di jemput yah gan&nbsp;</p>', 'elektronik', 'Non-Aktif', 200000, 'https://muhamad-iqbal.skripsiit2023.online//storage/photos/15/WhatsApp Image 2023-07-31 at 18.52.16.jpeg', '10', '2023-08-01 09:35:24', '2023-08-01 09:38:53'),
(16, 17, 'Limbah elekktronik', '<p>jemput gan</p>', 'elektronik', 'Non-Aktif', 200000, 'https://muhamad-iqbal.skripsiit2023.online//storage/photos/17/WhatsApp Image 2023-07-31 at 17.18.08.jpeg', '2kg', '2023-08-01 13:29:01', '2023-08-01 13:32:03'),
(17, 18, 'Prosesor', '<p>Asep.hardiyanto@unis.ac.id&nbsp;</p>', 'elektronik', 'Aktif', 150000, 'https://muhamad-iqbal.skripsiit2023.online//storage/photos/18/Screenshot_20230703_104150_com.huawei.android.launcher.jpg', '2kg', '2023-08-01 13:59:33', '2023-08-01 13:59:33'),
(18, 15, 'barang elektronik', '<p>jemput gan</p>', 'elektronik', 'Aktif', 200000, 'https://muhamad-iqbal.skripsiit2023.online//storage/photos/15/WhatsApp Image 2023-07-31 at 18.52.16.jpeg', '200kg', '2023-08-03 16:39:31', '2023-08-03 16:39:31'),
(19, 20, 'besi', '<p>jemput gan</p>', 'besi', 'Aktif', 200000, 'https://muhamad-iqbal.skripsiit2023.online//storage/photos/20/istockphoto-1134301606-612x612.jpg', '200kg', '2023-08-03 16:51:35', '2023-08-03 16:51:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `harga_deal` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `post_id`, `harga_deal`, `deskripsi`, `status`, `type`, `created_at`, `updated_at`) VALUES
(14, 14, 9, 150000, 'sesuai titik yah gan', 'Selesai', 'di-rumah', '2023-07-25 23:34:31', '2023-07-25 23:38:27'),
(18, 15, 13, 1900000, NULL, 'Selesai', 'di-rumah', '2023-07-31 19:43:59', '2023-07-31 19:46:48'),
(19, 15, 14, 190000, NULL, 'Selesai', 'di-rumah', '2023-07-31 19:50:11', '2023-07-31 19:53:04'),
(20, 15, 15, 160000, 'sesuai titik ya', 'Selesai', 'di-rumah', '2023-08-01 09:38:53', '2023-08-01 09:42:21'),
(21, 17, 16, 150000, NULL, 'Selesai', 'di-rumah', '2023-08-01 13:32:03', '2023-08-01 13:34:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Administrator', 'admin@gmail.com', NULL, 0, '$2y$10$rGts9NDD/CtDW23tJSsOAePQuPjvTUStqVTpSk04XIwqwXI1SeobG', NULL, '2023-06-14 08:43:16', '2023-07-18 12:05:19'),
(12, 'muzaqi', 'muzaki@gmail.com', NULL, 1, '$2y$10$9fKRvTX5IUE.8vs.yq6q5ezcD122lzjzJlRRCR8fwVCd91LDUYNRG', NULL, '2023-07-25 02:07:03', '2023-07-25 02:07:03'),
(14, 'wanda', 'wanda@gmail.com', NULL, 2, '$2y$10$slO6mNnbZrupww29yS3YCuZPKuUIGmwdIgMM9ZLMfseMYJbh6mC4G', NULL, '2023-07-25 23:25:01', '2023-07-25 23:25:01'),
(15, 'musin', 'musin@gmail.com', NULL, 2, '$2y$10$BduzNiTVyisPC1nYTaLWru0rj0KrKe0IOwVg/AashjwEg/4QyH0fC', NULL, '2023-07-29 13:17:20', '2023-07-29 13:17:20'),
(17, 'saki', 'saki@gmail.com', NULL, 2, '$2y$10$DsjM1kl4n59GEweoKvc26OXA3KPveXsz3EnHVaxbmOvxM6a4hR2Z.', NULL, '2023-08-01 13:27:32', '2023-08-01 13:27:32'),
(18, 'Asep', 'asep.hardiyanto@unis.ac.id', NULL, 2, '$2y$10$Li5hh/gBuYo0vZYozKvIRuAPcEAFSI5VTbLlJcaHaPW48aosBDsHi', NULL, '2023-08-01 13:54:09', '2023-08-01 13:54:09'),
(19, 'Dzikri Septiandi', 'dzikri@gmail.com', NULL, 2, '$2y$10$5KnlI3oZiaBgeVsQTbaWieG34xbRqCz8mbjj7rrd1Fn7PoWZiHqze', NULL, '2023-08-02 19:13:10', '2023-08-02 19:13:10'),
(20, 'balabal', 'balabal@gmail.com', NULL, 2, '$2y$10$mQipKaIaX6u2eygkhp0ctON4o9IfQajFcrYM/2yhgOYT3SSzd7D7y', NULL, '2023-08-03 16:50:38', '2023-08-03 16:50:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `penjemputan`
--
ALTER TABLE `penjemputan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `penjemputan`
--
ALTER TABLE `penjemputan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

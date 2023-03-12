-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 03:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `penerbit`, `gambar`, `stok`, `created_at`, `updated_at`) VALUES
(3, 'Harry Potter and The Chamber Of Secret', 'JK. Rowling', 'Gramedia', '1678262345588.buku1.webp', 10, '2023-03-08 00:59:05', '2023-03-11 05:10:49'),
(4, 'Batman - Nightwalker', 'Marie Lu', 'DC Comics', '1678522807234.batman-nightwalker.jpg', 10, '2023-03-11 01:20:07', '2023-03-11 01:21:23'),
(5, 'Batman Year One', 'Frank Miller', 'DC Comics', '1678522872992.043cf095-3546-4ef4-a98f-35586238be34.jpg', 15, '2023-03-11 01:21:12', '2023-03-11 01:21:12'),
(7, 'Harry Potter and The Philospher\'s Stone', 'JK. Rowling', 'Gramedia', '1678523045782.32732234_c58483ee-cdec-4849-b5f2-980a245259d0_1080_1080.jpg', 3, '2023-03-11 01:24:05', '2023-03-11 01:24:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `fitur`
--

CREATE TABLE `fitur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fitur`
--

INSERT INTO `fitur` (`id`, `judul`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'Up-to-date', 'Dengan adanya up-to-date ini kami jamin semua buku di sini dalam keadaan Up-to-Date semua.', '1678608013482.icons8-sign-up-in-calendar-100.png', '2023-03-12 01:00:13', '2023-03-12 01:00:13'),
(3, 'Member', 'Dengan adanya member ini memudahkan pengunjung dalam peminjaman buku.', '1678608031298.icons8-user-groups-100.png', '2023-03-12 01:00:31', '2023-03-12 01:00:31'),
(4, 'Peminjaman', 'Dengan adanya fitur peminjaman ini dapat membuat peminjaman semakin fleksibel bisa kapanpun dan di mana pun.', '1678608048368.icons8-borrow-book-100.png', '2023-03-12 01:00:48', '2023-03-12 01:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `nama`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Gambar 1', '1678413442477.images.jfif', '2023-03-09 18:57:22', '2023-03-09 18:57:22'),
(3, 'Gambar 2', '1678535860440.download.jfif', '2023-03-11 04:57:40', '2023-03-11 04:57:40'),
(4, 'Gambar 3', '1678535933804.shutterstock_794015686-1.jpg', '2023-03-11 04:58:53', '2023-03-11 04:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_28_001127_create_buku_table', 1),
(6, '2023_02_28_001644_create_transaksi_table', 1),
(7, '2023_03_10_010215_create_galeri_table', 2),
(8, '2023_03_12_060853_create_sampuls_table', 3),
(9, '2023_03_12_073433_create_fiturs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sampul`
--

CREATE TABLE `sampul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sampul`
--

INSERT INTO `sampul` (`id`, `judul`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'Selamat Datang di Website Perpustakaan', 'Yuk jelajahi sekarang!', '1678603296785.sampul_new.png', '2023-03-11 23:41:36', '2023-03-11 23:41:36'),
(4, 'Carilah Ilmu Setiap Harinya', 'Sedikit demi sedikit lama-lama menjadi bukit!', '1678604106173.1.png', '2023-03-11 23:55:06', '2023-03-11 23:55:06'),
(5, 'Embanlah ilmu sebagai cahaya kehidupan', 'Semangat terus dalam mencari ilmu!', '1678604366421.2.png', '2023-03-11 23:59:26', '2023-03-11 23:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `jumlah_pinjaman` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `buku_id`, `users_id`, `tgl_pinjam`, `tgl_kembali`, `status`, `jumlah_pinjaman`, `created_at`, `updated_at`) VALUES
(3, 5, 6, '2023-03-11', '2023-03-12', 'kembali', 1, '2023-03-11 08:48:34', '2023-03-11 09:13:07'),
(5, 7, 6, '2023-03-11', '2023-03-12', 'kembali', 1, '2023-03-11 09:47:14', '2023-03-12 07:19:19'),
(6, 4, 5, '2023-03-11', '2023-03-12', 'pinjam', 1, '2023-03-11 20:51:30', '2023-03-11 20:51:30'),
(7, 7, 6, '2023-03-18', '2023-03-19', 'kembali', 1, '2023-03-11 23:00:01', '2023-03-11 23:00:07'),
(8, 3, 6, '2023-03-12', '2023-03-13', 'kembali', 1, '2023-03-12 07:19:48', '2023-03-12 07:20:00');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `triggerkurangstok` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
UPDATE buku SET stok = stok - NEW.jumlah_pinjaman WHERE id = NEW.buku_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `triggertambahstok` AFTER UPDATE ON `transaksi` FOR EACH ROW BEGIN
UPDATE buku SET stok = stok + NEW.jumlah_pinjaman WHERE id = NEW.buku_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, '$2y$10$qkx431kV4TTeOoVAZvRGPeHd69kb28AvrtfXg786tdRH3iAMbqHfi', 'admin', NULL, NULL, NULL),
(5, 'Udin', 'udin', NULL, '$2y$10$MWJJQvZZN6WabCwu6kAexep7qompnEqfWArBh6uaaJIYm5WDG33te', 'user', NULL, '2023-03-11 05:57:48', '2023-03-11 05:57:48'),
(6, 'Budi', 'budi', NULL, '$2y$10$ioO3bvrinw6Z9MlrkB20P.2YhF09G.qi3Ija55a18RtoTWfayBixm', 'user', NULL, '2023-03-11 08:13:10', '2023-03-11 08:13:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fitur`
--
ALTER TABLE `fitur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sampul`
--
ALTER TABLE `sampul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_id` (`buku_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fitur`
--
ALTER TABLE `fitur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sampul`
--
ALTER TABLE `sampul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

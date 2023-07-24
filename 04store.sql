-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2023 pada 08.22
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_04store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'MOC', 'moc', 0, '2023-06-15 04:14:17', '2023-06-18 22:14:45', 2),
(2, 'Samsung', 'samsung', 0, '2023-06-15 04:30:21', '2023-06-18 22:14:32', 4),
(3, 'Apple', 'apple', 0, '2023-06-15 04:31:00', '2023-06-18 22:14:24', 4),
(5, 'Salt n Papper', 'saltnpapper', 0, '2023-06-17 01:57:36', '2023-06-18 22:14:16', 2),
(6, 'Bose', 'bose', 0, '2023-06-19 00:53:23', '2023-06-19 00:53:50', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(33, 5, 9, 2, '2023-06-26 19:22:45', '2023-07-11 04:58:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible, 1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Fashion Pria', 'fashion-pria', 'Deskripsi kategori Fashion Pria', 'uploads/category/1687124772.jpg', 'Fashion Pria', 'Deskripsi kategori Fashion', 'Deskripsi kategori Fashion', 0, '2023-06-14 06:52:01', '2023-06-18 16:15:23'),
(4, 'Tech.', 'tech', 'Produk Gadget dan Teknologi', 'uploads/category/1687124998.jpg', 'Tech', 'Tech', 'Tech', 0, '2023-06-14 08:28:12', '2023-06-18 13:49:58'),
(6, 'Sports', 'sports', 'Aksesoris dan peralatan olahraga', 'uploads/category/1687181528.jpg', 'Sports', 'Sports', 'Sports', 0, '2023-06-18 05:36:26', '2023-06-19 05:32:08');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_14_025019_add_details_to_users_table', 2),
(6, '2023_06_14_051545_create_categories_table', 3),
(7, '2023_06_15_054018_create_brands_table', 4),
(8, '2023_06_15_214746_create_products_table', 5),
(9, '2023_06_15_220741_create_product_images_table', 5),
(10, '2023_06_17_150830_create_sliders_table', 6),
(11, '2023_06_19_060333_add_category_id_to_brands_table', 7),
(12, '2023_06_20_132408_create_wishlists_table', 8),
(13, '2023_06_23_095759_create_carts_table', 9),
(14, '2023_06_26_031857_create_orders_table', 10),
(15, '2023_06_26_032523_create_order_items_table', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `pincode`, `address`, `status_message`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 5, '04:Store-WMtFFchEBw', 'Habib', 'yusrilhabib99@gmail.com', '081918409604', '062623', 'Lombok, Indonesia', 'Dalam proses', 'COD', NULL, '2023-06-25 21:52:50', '2023-06-25 21:52:50'),
(2, 5, '04:Store-VsFqArMQSB', 'Habib', 'yusrilhabib99@gmail.com', '081918409604', '062623', 'Habib Yusril. Lombok, Inonesia.', 'Dalam proses', 'COD', NULL, '2023-06-25 22:01:35', '2023-06-25 22:01:35'),
(3, 5, '04:Store-yaCpOrq2Rj', 'Habib', 'yusrilhabib99@gmail.com', '081918409604', '062623', 'Habibullah Yusril. Lombok, Indonesia.', 'Dalam proses', 'COD', NULL, '2023-06-25 22:33:53', '2023-06-25 22:33:53'),
(4, 5, '04:Store-RgfRQ3Wid1', 'Habib', 'yusrilhabib99@gmail.com', '081918409604', '062623', 'Habibullah Yusril. Lombok, Indonesia.', 'Dalam proses', 'COD', NULL, '2023-06-25 22:35:25', '2023-06-25 22:35:25'),
(5, 5, '04:Store-8C1IYnAR5t', 'Habib', 'yusrilhabib99@gmail.com', '081918409604', '062623', 'Indonesia', 'Dalam proses', 'COD', NULL, '2023-06-25 22:41:44', '2023-06-25 22:41:44'),
(6, 5, '04:Store-LTxyBV924V', 'Habib', 'yusrilhabib99@gmail.com', '081918409604', '062623', 'Yusril Habibullah. \nPancor, Lombok Timur, Indonesia.', 'Dalam proses', 'COD', NULL, '2023-06-25 23:53:33', '2023-06-25 23:53:33'),
(7, 5, '04:Store-x5LCnU1Uz9', 'Habib', 'yusrilhabib99@gmail.com', '081918409604', '232606', 'Habib. Test perbaikan kode awal', 'Dalam proses', 'COD', NULL, '2023-06-26 01:00:34', '2023-06-26 01:00:34'),
(8, 5, '04:Store-urp7ARydKn', 'Yusril Habibullah', 'yusrilhabib99@gmail.com', '081918409604', '232606', 'Check berkurang stok dan message', 'Dalam proses', 'COD', NULL, '2023-06-26 01:29:43', '2023-06-26 01:29:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 9, NULL, 1, 2600000, '2023-06-25 21:52:50', '2023-06-25 21:52:50'),
(2, 1, 2, NULL, 1, 40, '2023-06-25 21:52:50', '2023-06-25 21:52:50'),
(3, 1, 1, NULL, 1, 1900, '2023-06-25 21:52:50', '2023-06-25 21:52:50'),
(4, 2, 6, NULL, 1, 110, '2023-06-25 22:01:35', '2023-06-25 22:01:35'),
(5, 2, 7, NULL, 1, 200, '2023-06-25 22:01:35', '2023-06-25 22:01:35'),
(6, 3, 7, NULL, 1, 200, '2023-06-25 22:33:53', '2023-06-25 22:33:53'),
(7, 5, 6, NULL, 1, 110, '2023-06-25 22:41:44', '2023-06-25 22:41:44'),
(8, 6, 1, NULL, 1, 1900, '2023-06-25 23:53:33', '2023-06-25 23:53:33'),
(9, 7, 9, NULL, 1, 2600000, '2023-06-26 01:00:34', '2023-06-26 01:00:34'),
(10, 8, 7, NULL, 1, 200, '2023-06-26 01:29:43', '2023-06-26 01:29:43');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_description` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=trending, 0=not-trending',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden, 0=visible',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `small_description`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 4, 'HomePod', 'homepod', 'Apple', 'Good', 'Good', 2000, 1900, 1, 1, 0, 'HomePod', 'HomePod', 'HomePod', '2023-06-15 18:54:07', '2023-06-19 05:21:47'),
(2, 4, 'VisionPro', 'visionpro', 'Apple', 'New', 'New', 50, 40, 1, 0, 0, 'VisionPro', 'VisionPro', 'VisionPro', '2023-06-15 19:30:05', '2023-06-19 05:20:26'),
(6, 2, 'Baju Muslim', 'baju-muslim', 'MOC', 'Men', 'Men', 100, 110, 2, 1, 0, 'Men', 'Men', 'Men', '2023-06-15 19:44:32', '2023-06-20 02:22:36'),
(7, 2, 'Baju Muslim Putih', 'baju-muslim-putih', 'MOC', 'Baju baru lebaran haji warna putih', 'Baju baru lebaran haji', 90, 200, 4, 0, 0, 'Baju Muslim', 'baju', 'baju', '2023-06-17 01:59:23', '2023-06-26 01:29:43'),
(8, 4, 'SoundLink Revolve+', 'bose-revolve', 'Bose', 'Bose Revolve+ Gen. I', 'Bose SoundLink Revolve+ Gen. I\r\nSpeaker Premium', 6100000, 3600000, 0, 0, 0, 'Bose Revolve+', 'Bose Revolve+', 'Bose Revolve+', '2023-06-19 00:57:43', '2023-06-20 01:46:41'),
(9, 4, 'SoundLink II Mini', 'soundlink-mini', 'Bose', 'Bose SoundLink II Mini', 'Bose SoundLink II Mini\r\nPremium Speaker', 4500000, 2600000, 2, 0, 0, 'SoundLink II Mini', 'SoundLink II Mini', 'SoundLink II Mini', '2023-06-19 01:14:52', '2023-06-19 01:14:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(16, 1, 'uploads/products/16870052141.jpeg', '2023-06-17 04:33:34', '2023-06-17 04:33:34'),
(17, 2, 'uploads/products/16870052441.jpeg', '2023-06-17 04:34:04', '2023-06-17 04:34:04'),
(19, 6, 'uploads/products/16870057292.jpg', '2023-06-17 04:42:09', '2023-06-17 04:42:09'),
(20, 6, 'uploads/products/16870059011.jpg', '2023-06-17 04:45:01', '2023-06-17 04:45:01'),
(21, 7, 'uploads/products/16870059611.jpg', '2023-06-17 04:46:01', '2023-06-17 04:46:01'),
(22, 7, 'uploads/products/16870059612.jpg', '2023-06-17 04:46:01', '2023-06-17 04:46:01'),
(23, 7, 'uploads/products/16870059613.jpg', '2023-06-17 04:46:01', '2023-06-17 04:46:01'),
(24, 7, 'uploads/products/16870059614.jpg', '2023-06-17 04:46:01', '2023-06-17 04:46:01'),
(25, 8, 'uploads/products/16871650631.jpeg', '2023-06-19 00:57:43', '2023-06-19 00:57:43'),
(26, 9, 'uploads/products/16871802641.jpeg', '2023-06-19 05:11:04', '2023-06-19 05:11:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=hidden,0=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '<span>Best Ecommerce Solutions 1 </span>  to Boost your Brand Name &amp; Sales', 'We offer an industry-driven and successful digital marketing strategy that helps our clients in achieving a strong online presence and maximum company profit.', 'uploads/slider/1687024031.jpg', 1, '2023-06-17 09:47:11', '2023-06-20 04:34:48'),
(2, 'Hero 1 Kartun UPDATED', 'Home Slider Kartun UPDATED', 'uploads/slider/1687047280.png', 1, '2023-06-17 15:21:02', '2023-06-17 19:45:46'),
(4, 'Slider ke-4', 'Untuk testing checkbox', 'uploads/slider/1687048397.jpg', 1, '2023-06-17 16:33:17', '2023-06-17 19:45:54'),
(5, '<span>Special Shopping Day </span>  to Boost your 04:Store &amp; Products', 'Diskon special produk kategori fashion', 'uploads/slider/1687060097.png', 0, '2023-06-17 19:48:17', '2023-06-20 04:37:57'),
(6, 'Smartphone of The Year', 'Diskon pembelian produk Smartphone', 'uploads/slider/1687060188.png', 0, '2023-06-17 19:49:48', '2023-06-17 19:49:48');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(3, 'Admin', 'Admin@gmail.com', NULL, '$2y$10$j/IOQtMKvLCUrCePIxTvlOQJ/f7Lf.g7vmFxXJUGLkABxBzk2p1Pe', NULL, '2023-06-13 19:41:24', '2023-06-13 19:41:24', 1),
(5, 'Habib', 'yusrilhabib99@gmail.com', NULL, '$2y$10$JYp1OKgXXPZnsDKlPiHGJOoElq3f8BjyMXY9O/.dDTcKNpSQuxmmO', NULL, '2023-06-20 06:10:50', '2023-06-20 06:10:50', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(12, 5, 1, '2023-06-22 04:45:11', '2023-06-22 04:45:11'),
(13, 5, 8, '2023-06-22 04:57:48', '2023-06-22 04:57:48'),
(14, 5, 9, '2023-06-22 04:58:13', '2023-06-22 04:58:13'),
(15, 5, 7, '2023-06-22 06:21:09', '2023-06-22 06:21:09'),
(16, 5, 2, '2023-06-24 09:34:52', '2023-06-24 09:34:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
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
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

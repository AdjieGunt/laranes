-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2019 at 04:20 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `laranes`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `created_at`, `updated_at`) VALUES
(1, 'Adjie Guntoro', '083813360366', 'adjie1607@gmail.com', 'Petukangan Utara', NULL, NULL),
(1607, 'Agnes', '0828132131', 'adjie@adsa.com', 'Pamulang', NULL, NULL),
(1608, 'Endang', '083823284778', 'endang@ena.com', 'Ciputat', '2018-07-14 19:10:23', '2018-07-14 19:10:23'),
(1609, 'Riyanti', '088293829123', 'riyanti@ena.com', 'Bintaro Sek 5', '2018-07-14 19:11:10', '2018-07-14 19:11:10'),
(1610, 'Fachry', '08324823424239', 'fachry@gmail.com', 'Bintaro', '2019-01-30 07:36:56', '2019-01-30 07:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `customer_transactions`
--

CREATE TABLE `customer_transactions` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_transaction_detail`
--

CREATE TABLE `customer_transaction_detail` (
  `transaction_detail_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_base` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_02_07_033746_create_product_table', 1),
(3, '2018_02_07_072756_create_table_sell', 1),
(4, '2018_02_07_072950_create_table_sell_products_detail', 1),
(5, '2018_02_07_073828_create_table_products_stock', 1),
(6, '2018_02_07_074809_create_table_customers', 1),
(7, '2018_02_07_075749_create_table_customer_transactions', 1),
(8, '2018_02_07_083028_create_table_customer_transaction_detail', 1),
(9, '2018_02_09_001740_create_table_stock', 1),
(10, '2018_06_27_030204_edit_table_sell_detail', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_updated_date` timestamp NULL DEFAULT NULL,
  `product_created_by` int(11) NOT NULL,
  `product_updated_by` int(11) NOT NULL,
  `product_description` longtext COLLATE utf8mb4_unicode_ci,
  `product_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_created_date`, `product_updated_date`, `product_created_by`, `product_updated_by`, `product_description`, `product_status`) VALUES
(1, 'Pentalite', '2018-06-30 08:05:06', NULL, 1, 1, 'lorem ipsum si dolor amet', 0),
(2, 'Dulux', '2018-07-01 09:57:03', '2018-07-01 09:57:03', 1, 1, '', 1),
(3, 'Easy Clean', '2018-07-01 09:59:38', '2018-07-01 09:58:52', 1, 1, '', 1),
(4, 'Nippon', '2018-07-12 17:26:54', '2018-07-12 17:26:54', 1, 1, '', 1),
(5, 'Powerflex', '2019-01-30 14:38:09', '2019-01-30 14:38:09', 1, 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_stock`
--

CREATE TABLE `products_stock` (
  `stock_id` int(10) UNSIGNED NOT NULL,
  `stock_product_id` int(10) UNSIGNED NOT NULL,
  `stock_product_color_base` int(11) NOT NULL,
  `stock_product_qty` int(11) NOT NULL,
  `stock_product_packages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `sell_id` int(10) UNSIGNED NOT NULL,
  `sell_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sell_flag` enum('IN','OUT') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_updated_date` timestamp NULL DEFAULT NULL,
  `sell_created_by` int(10) UNSIGNED NOT NULL,
  `sell_updated_by` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`sell_id`, `sell_created_date`, `sell_flag`, `sell_updated_date`, `sell_created_by`, `sell_updated_by`, `customer_id`) VALUES
(1, '2018-07-12 16:53:56', 'OUT', NULL, 1, 1, NULL),
(2, '2018-07-12 17:02:22', 'OUT', NULL, 1, 1, NULL),
(3, '2018-07-12 17:03:23', 'OUT', NULL, 1, 1, 1607),
(4, '2018-07-12 17:13:18', 'IN', NULL, 1, 1, NULL),
(5, '2018-07-12 17:16:49', 'IN', NULL, 1, 1, NULL),
(6, '2018-07-15 02:13:04', 'OUT', NULL, 1, 1, 1609),
(7, '2019-01-30 14:31:43', 'OUT', NULL, 1, 1, 1609),
(8, '2019-01-30 14:39:04', 'IN', NULL, 1, 1, NULL),
(9, '2019-01-30 14:39:47', 'OUT', NULL, 1, 1, NULL),
(10, '2019-01-30 14:40:21', 'OUT', NULL, 1, 1, 1610);

-- --------------------------------------------------------

--
-- Table structure for table `sell_products_detail`
--

CREATE TABLE `sell_products_detail` (
  `sell_products_detail_id` int(10) UNSIGNED NOT NULL,
  `sell_id` int(10) UNSIGNED NOT NULL,
  `sell_products_detail_product_id` int(10) UNSIGNED NOT NULL,
  `sell_products_detail_product_qty` int(11) NOT NULL,
  `sell_products_detail_product_base` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_products_detail_product_packages` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_products_detail_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sell_products_detail_updated_date` timestamp NULL DEFAULT NULL,
  `sell_products_detail_created_by` int(10) UNSIGNED NOT NULL,
  `sell_products_detail_updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sell_products_detail`
--

INSERT INTO `sell_products_detail` (`sell_products_detail_id`, `sell_id`, `sell_products_detail_product_id`, `sell_products_detail_product_qty`, `sell_products_detail_product_base`, `sell_products_detail_product_packages`, `sell_products_detail_created_date`, `sell_products_detail_updated_date`, `sell_products_detail_created_by`, `sell_products_detail_updated_by`) VALUES
(1, 1, 1, 12, 'A', '2 L', '2018-07-12 16:53:56', NULL, 1, 1),
(2, 2, 1, 14, 'A', '2 L', '2018-07-12 17:02:22', NULL, 1, 1),
(3, 3, 1, 1, 'D', '20 L', '2018-07-12 17:03:23', NULL, 1, 1),
(4, 4, 2, 2, 'A', '2 L', '2018-07-12 17:13:18', NULL, 1, 1),
(5, 5, 1, 1, 'A', '2 L', '2018-07-12 17:16:49', NULL, 1, 1),
(6, 6, 2, 1, 'A', '2 L', '2018-07-15 02:13:04', NULL, 1, 1),
(7, 7, 2, 1, 'A', '2.5 L', '2019-01-30 14:31:43', NULL, 1, 1),
(8, 8, 5, 211, 'C', '2.5 L', '2019-01-30 14:39:04', NULL, 1, 1),
(9, 9, 5, 11, 'C', '2.5 L', '2019-01-30 14:39:47', NULL, 1, 1),
(10, 10, 5, 10, 'C', '2.5 L', '2019-01-30 14:40:21', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(10) UNSIGNED NOT NULL,
  `stock_product_id` int(10) UNSIGNED NOT NULL,
  `stock_product_color_base` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_product_package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_product_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_product_number_of_revisioin` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_product_id`, `stock_product_color_base`, `stock_product_package`, `stock_product_qty`, `stock_product_number_of_revisioin`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', '2.5 L', '1', NULL, '2018-06-30 00:48:47', '2018-07-12 10:16:49'),
(2, 3, 'C', '2.5 L', '1', NULL, '2018-07-01 03:06:09', '2018-07-01 03:06:09'),
(3, 1, 'D', '20 L', '2', NULL, '2018-07-01 03:06:09', '2018-07-12 10:03:23'),
(4, 2, 'A', '2.5 L', '0', NULL, '2018-07-12 10:13:18', '2019-01-30 07:31:43'),
(5, 5, 'C', '2.5 L', '190', NULL, '2019-01-30 07:39:04', '2019-01-30 07:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_nickname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_nickname`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_transactions`
--
ALTER TABLE `customer_transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `customer_transactions_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customer_transaction_detail`
--
ALTER TABLE `customer_transaction_detail`
  ADD PRIMARY KEY (`transaction_detail_id`),
  ADD KEY `customer_transaction_detail_product_id_foreign` (`product_id`),
  ADD KEY `customer_transaction_detail_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_stock`
--
ALTER TABLE `products_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `stock_product_id` (`stock_product_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`sell_id`),
  ADD KEY `sell_sell_created_by_foreign` (`sell_created_by`),
  ADD KEY `sell_sell_updated_by_foreign` (`sell_updated_by`),
  ADD KEY `sell_customer_id_foreign` (`customer_id`) USING BTREE;

--
-- Indexes for table `sell_products_detail`
--
ALTER TABLE `sell_products_detail`
  ADD PRIMARY KEY (`sell_products_detail_id`),
  ADD KEY `sell_in_id` (`sell_id`),
  ADD KEY `product_id` (`sell_products_detail_product_id`),
  ADD KEY `created_by` (`sell_products_detail_created_by`),
  ADD KEY `updated_by` (`sell_products_detail_updated_by`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `stock_stock_product_id_foreign` (`stock_product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1611;

--
-- AUTO_INCREMENT for table `customer_transactions`
--
ALTER TABLE `customer_transactions`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_transaction_detail`
--
ALTER TABLE `customer_transaction_detail`
  MODIFY `transaction_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products_stock`
--
ALTER TABLE `products_stock`
  MODIFY `stock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `sell_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sell_products_detail`
--
ALTER TABLE `sell_products_detail`
  MODIFY `sell_products_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_transactions`
--
ALTER TABLE `customer_transactions`
  ADD CONSTRAINT `customer_transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `customer_transaction_detail`
--
ALTER TABLE `customer_transaction_detail`
  ADD CONSTRAINT `customer_transaction_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `customer_transaction_detail_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `customer_transactions` (`transaction_id`);

--
-- Constraints for table `products_stock`
--
ALTER TABLE `products_stock`
  ADD CONSTRAINT `stock_product_id` FOREIGN KEY (`stock_product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `sell_sell_created_by_foreign` FOREIGN KEY (`sell_created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `sell_sell_updated_by_foreign` FOREIGN KEY (`sell_updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sell_products_detail`
--
ALTER TABLE `sell_products_detail`
  ADD CONSTRAINT `created_by` FOREIGN KEY (`sell_products_detail_created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`sell_products_detail_product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `sell_in_id` FOREIGN KEY (`sell_id`) REFERENCES `sell` (`sell_id`),
  ADD CONSTRAINT `updated_by` FOREIGN KEY (`sell_products_detail_updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_stock_product_id_foreign` FOREIGN KEY (`stock_product_id`) REFERENCES `products` (`product_id`);

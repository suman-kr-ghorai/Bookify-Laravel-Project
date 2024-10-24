-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2024 at 12:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_booking_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `source` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `to_details` varchar(100) NOT NULL,
  `from_details` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `name`, `phone`, `source`, `destination`, `time`, `price`, `category`, `rating`, `photo`, `to_details`, `from_details`, `capacity`) VALUES
(1, 'Diamond Bus Service', 7430828041, 'Kolkata', 'Haldia', '04:15', 200, 'AC', 5, 'photos/vAgojuz3JByaCzRw5z4qxiumoEGgrLdOlCumVGbi.jpg', 'haldia', 'kolkata', 51);

-- --------------------------------------------------------

--
-- Table structure for table `bus_booking`
--

CREATE TABLE `bus_booking` (
  `bus_id` int(100) NOT NULL,
  `seat_no_occupied` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_booking`
--

INSERT INTO `bus_booking` (`bus_id`, `seat_no_occupied`, `date`, `id`) VALUES
(1, '5,10,15', '2024-10-31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `ticket_number` text NOT NULL,
  `bus_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `seat_numbers` text NOT NULL,
  `price` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `ticket_number`, `bus_id`, `date`, `seat_numbers`, `price`, `id`) VALUES
(9, 'T-671ACCF5D58EC,T-671ACCF5D5D71,T-671ACCF5D605C', 1, '2024-10-31', '5,10,15', 660, 4);

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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

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
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `bus_id` varchar(100) NOT NULL,
  `row` int(11) NOT NULL,
  `columns` int(11) NOT NULL,
  `seat_number` varchar(100) NOT NULL,
  `is_gap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `bus_id`, `row`, `columns`, `seat_number`, `is_gap`) VALUES
(39, '1', 1, 1, '1', 0),
(40, '1', 1, 2, '2', 0),
(41, '1', 1, 3, '0', 1),
(42, '1', 1, 4, '3', 0),
(43, '1', 1, 5, '4', 0),
(44, '1', 1, 6, '5', 0),
(45, '1', 2, 1, '6', 0),
(46, '1', 2, 2, '7', 0),
(47, '1', 2, 3, '0', 1),
(48, '1', 2, 4, '8', 0),
(49, '1', 2, 5, '9', 0),
(50, '1', 2, 6, '10', 0),
(51, '1', 3, 1, '11', 0),
(52, '1', 3, 2, '12', 0),
(53, '1', 3, 3, '0', 1),
(54, '1', 3, 4, '13', 0),
(55, '1', 3, 5, '14', 0),
(56, '1', 3, 6, '15', 0),
(57, '1', 4, 1, '16', 0),
(58, '1', 4, 2, '17', 0),
(59, '1', 4, 3, '0', 1),
(60, '1', 4, 4, '18', 0),
(61, '1', 4, 5, '19', 0),
(62, '1', 4, 6, '20', 0),
(63, '1', 5, 1, '21', 0),
(64, '1', 5, 2, '22', 0),
(65, '1', 5, 3, '0', 1),
(66, '1', 5, 4, '23', 0),
(67, '1', 5, 5, '24', 0),
(68, '1', 5, 6, '25', 0),
(69, '1', 6, 1, '26', 0),
(70, '1', 6, 2, '27', 0),
(71, '1', 6, 3, '0', 1),
(72, '1', 6, 4, '28', 0),
(73, '1', 6, 5, '29', 0),
(74, '1', 6, 6, '30', 0),
(75, '1', 7, 1, '31', 0),
(76, '1', 7, 2, '32', 0),
(77, '1', 7, 3, '0', 1),
(78, '1', 7, 4, '33', 0),
(79, '1', 7, 5, '34', 0),
(80, '1', 7, 6, '35', 0),
(81, '1', 8, 1, '36', 0),
(82, '1', 8, 2, '37', 0),
(83, '1', 8, 3, '0', 1),
(84, '1', 8, 4, '38', 0),
(85, '1', 8, 5, '39', 0),
(86, '1', 8, 6, '40', 0),
(87, '1', 9, 1, '41', 0),
(88, '1', 9, 2, '42', 0),
(89, '1', 9, 3, '0', 1),
(90, '1', 9, 4, '43', 0),
(91, '1', 9, 5, '44', 0),
(92, '1', 9, 6, '45', 0),
(93, '1', 10, 1, '46', 0),
(94, '1', 10, 2, '47', 0),
(95, '1', 10, 3, '48', 0),
(96, '1', 10, 4, '49', 0),
(97, '1', 10, 5, '50', 0),
(98, '1', 10, 6, '51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('76CgMH4hFWSciU63v6GBzBdBI0VUc1bqmKthtIu5', NULL, '127.0.0.1', 'PostmanRuntime/7.42.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNllxQzhLVTlmZHBDNUhHTWxjTjNOdkE3Z1Badk1WYnlZRDRySUtJbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1729527689),
('ckMWLufKevXinfwV0VICyjE2SnmMf4E47JxH31gx', NULL, '127.0.0.1', 'PostmanRuntime/7.39.1', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYWZmaTlETDRoVnJTdnpKRDFpVkxHclBidldBVGo5Qm5wdERqZFhrRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1729534902),
('OaZD2EwkrUK8pp2OvHM0aSgXzF2UYm56Ti2FJXOl', NULL, '127.0.0.1', 'PostmanRuntime/7.42.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQWV1bWV4TGcwZ2x1blp6dkVqaWVDMjBsRm5XVHBiN1g3enVwVXd4ayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1729535259),
('zJfcZYo71P6Zq0cloYpdJB2i4VNs4pO9T8tITMms', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTBrRERNRWpteVVoMm5mb3o5cGJFWjNiSjdzT2dUZHNySmdDbnFDTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1729534937);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `user_id` int(100) NOT NULL,
  `ticket_number` text NOT NULL,
  `bus_id` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`user_id`, `ticket_number`, `bus_id`, `date`) VALUES
(9, 'T-671ACCF5D58EC', 1, '2024-10-31'),
(9, 'T-671ACCF5D5D71', 1, '2024-10-31'),
(9, 'T-671ACCF5D605C', 1, '2024-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `user-type` varchar(10) NOT NULL DEFAULT 'user',
  `ticket-id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `phone`, `password`, `DOB`, `user-type`, `ticket-id`) VALUES
(1, 'Suman Kumar Ghorai', 'sumanghorai000000000@gmail.com', 7439146998, 'Suman123', '2000-12-27', 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
  `phone` bigint(10) NOT NULL,
  `DOB` date NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `ticket_id` text NOT NULL,
  `auth` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `DOB`, `user_type`, `ticket_id`, `auth`) VALUES
(8, 'sampad', 'sampad@gmail.com', NULL, '$2y$12$l5vRlFNJwHz4gpjQfyPzJ.LgaU/GKylXi4PEvd2fJycYlPQa6j8lS', NULL, NULL, NULL, 7439146998, '2000-12-05', 'user', '', 0),
(9, 'suman', 'sumanghorai000000000@gmail.com', NULL, '$2y$10$MVPSuEUmUM3mbSk1RSs/deyJKIMjvXW5/zWkHTxDInHUQN.ezCFRy', NULL, NULL, NULL, 7439146998, '2000-12-27', 'admin', 'T-671ACCF5D58EC,T-671ACCF5D5D71,T-671ACCF5D605C', 0),
(10, 'suman', 'test@gmail.com', NULL, '$2y$10$SiH2QhDYrmwDyUaSk4jnPeWXA6LDRHaJ6RCqlSkk..aRWet16o5te', NULL, NULL, NULL, 1000000000, '2000-12-05', 'user', '', 0),
(11, 'anjan', 'test@test.com', NULL, '$2y$10$yMSmdZMUXcB5OkN88JNm7.OCLgv9r7MUBdRw3A93VRmv9ouRKBgTq', NULL, NULL, NULL, 7439146998, '2006-12-05', 'user', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `bus_booking`
--
ALTER TABLE `bus_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bus_booking`
--
ALTER TABLE `bus_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

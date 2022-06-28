-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Haz 2022, 18:08:00
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `laravelcountry`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_country` varchar(255) NOT NULL,
  `city_continets` varchar(255) NOT NULL,
  `city_createduser` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `city_country`, `city_continets`, `city_createduser`, `created_at`, `updated_at`) VALUES
(4, 'Şehir', '23', '3', '1', '2022-06-13 13:28:54', '2022-06-13 13:28:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `continents`
--

CREATE TABLE `continents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `continent_name` varchar(255) NOT NULL,
  `continent_createduser` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `continents`
--

INSERT INTO `continents` (`id`, `continent_name`, `continent_createduser`, `created_at`, `updated_at`) VALUES
(3, 'Kıta', '1', '2022-06-13 13:27:45', '2022-06-13 13:27:45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_continent` varchar(255) NOT NULL,
  `country_createduser` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_continent`, `country_createduser`, `created_at`, `updated_at`) VALUES
(23, 'Ülke', '3', '1', '2022-06-13 13:28:06', '2022-06-13 13:28:06'),
(24, '2', '3', '1', '2022-06-13 13:29:10', '2022-06-13 13:29:10'),
(25, 'dsdsd', '3', '3', '2022-06-14 06:22:47', '2022-06-14 06:23:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `information`
--

CREATE TABLE `information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `information_detail` text NOT NULL,
  `information_parent` varchar(255) NOT NULL,
  `information_type` varchar(255) NOT NULL,
  `information_createduser` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `information`
--

INSERT INTO `information` (`id`, `information_detail`, `information_parent`, `information_type`, `information_createduser`, `created_at`, `updated_at`) VALUES
(21, 'Kıta', '3', 'continent', '1', '2022-06-13 13:27:45', '2022-06-13 13:27:45'),
(22, 'Ülke', '23', 'country', '1', '2022-06-13 13:28:06', '2022-06-13 13:28:06'),
(23, 'Şehir', '4', 'city', '1', '2022-06-13 13:28:54', '2022-06-13 13:28:54'),
(24, '2', '24', 'country', '1', '2022-06-13 13:29:10', '2022-06-13 13:29:10'),
(25, 'fdssxaa', '25', 'country', '3', '2022-06-14 06:22:47', '2022-06-14 06:23:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_06_10_161602_create_countries_table', 1),
(11, '2022_06_10_161629_create_cities_table', 1),
(12, '2022_06_10_161825_create_continents_table', 1),
(13, '2022_06_10_161853_create_information_table', 1),
(14, '2022_06_10_161911_create_photos_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `photo_parent` varchar(255) NOT NULL,
  `photo_type` varchar(255) NOT NULL,
  `photo_createduser` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `photos`
--

INSERT INTO `photos` (`id`, `photo_path`, `photo_parent`, `photo_type`, `photo_createduser`, `created_at`, `updated_at`) VALUES
(21, '165513766562a76581d140c.JPG', '3', 'continent', '1', '2022-06-13 13:27:45', '2022-06-13 13:27:45'),
(22, '165513768662a76596407ca.JPG', '23', 'country', '1', '2022-06-13 13:28:06', '2022-06-13 13:28:06'),
(23, '165513773462a765c695063.JPG', '4', 'city', '1', '2022-06-13 13:28:54', '2022-06-13 13:28:54'),
(24, '165513775162a765d700fa5.JPG', '24', 'country', '1', '2022-06-13 13:29:11', '2022-06-13 13:29:11'),
(25, '165519856762a85367a2907.JPG', '25', 'country', '3', '2022-06-14 06:22:47', '2022-06-14 06:22:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2a$12$Yev/XxD1GM7lXo.fkCDO9e2oiDXm/aVjjBCavlxG3wljR4mbJiLPa', 'admin', NULL, NULL, NULL),
(3, NULL, 'rkulcu6@gmail.com', NULL, '$2y$10$jBzl99sRef8tzqifg7mqxu5uqrw5ftvRTKxy9lAS6cUWe./Y8RHXi', 'user', NULL, '2022-06-14 06:21:48', '2022-06-14 06:21:48');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `continents`
--
ALTER TABLE `continents`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `continents`
--
ALTER TABLE `continents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

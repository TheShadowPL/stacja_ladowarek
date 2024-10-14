-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 14 Paź 2024, 09:27
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `bazydanych_project`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `charging_sessions`
--

CREATE TABLE `charging_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `charger_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `energy_charged` decimal(8,2) NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `charging_sessions`
--

INSERT INTO `charging_sessions` (`id`, `user_id`, `charger_id`, `start_time`, `end_time`, `energy_charged`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-01-29 20:11:00', '2024-01-30 21:11:00', '0.00', '0.00', 'reserved', '2024-01-29 17:11:55', NULL),
(2, 1, 1, '2024-01-29 20:11:00', '2024-01-30 21:11:00', '0.00', '0.00', 'reserved', '2024-01-29 17:12:08', NULL),
(3, 2, 1, '2024-01-29 19:54:00', '2024-01-30 19:55:00', '0.00', '0.00', 'reserved', '2024-01-29 17:50:29', NULL),
(4, 2, 1, '2024-01-29 19:54:00', '2024-01-30 19:55:00', '0.00', '0.00', 'reserved', '2024-01-29 17:50:42', NULL),
(5, 2, 1, '2024-01-29 21:42:00', '2024-01-31 00:42:00', '0.00', '0.00', 'reserved', '2024-01-29 18:42:40', NULL),
(6, 2, 3, '2024-01-30 13:06:00', '2024-01-31 13:05:00', '0.00', '0.00', 'reserved', '2024-01-30 11:05:53', NULL),
(7, 2, 3, '2024-01-30 13:06:00', '2024-01-31 13:05:00', '0.00', '0.00', 'reserved', '2024-01-30 11:06:10', NULL),
(8, 2, 3, '2024-01-30 13:06:00', '2024-01-31 13:05:00', '0.00', '0.00', 'reserved', '2024-01-30 11:06:25', NULL),
(9, 2, 3, '2024-01-30 13:06:00', '2024-01-31 13:05:00', '0.00', '0.00', 'reserved', '2024-01-30 11:06:25', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ladowarki`
--

CREATE TABLE `ladowarki` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closestTerm_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closestTerm_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `standard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `ladowarki`
--

INSERT INTO `ladowarki` (`id`, `city`, `street`, `number`, `comment`, `status`, `closestTerm_time`, `closestTerm_date`, `standard`, `power`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Jelenia Góra', 'Józefa Piłsudskiego', '15', '', 'unavailable', '', '2024-01-31T00:42', 'CHAdeMO', '11.00', '3.00', NULL, NULL),
(2, 'Karpacz', 'Batorego', '66', '', 'unavailable', '12:00', '25/03/2023', 'CCS', '22.00', '4.00', NULL, NULL),
(3, 'Szklarska Poręba', 'Mickiewicza', '30', 'Biedronka', 'unavailable', '', '2024-01-31T13:05', 'CHAdeMO', '12.00', '3.50', NULL, NULL),
(4, 'Wałbrzych', 'Piastów', '5', '', 'available', '', '', 'CCS', '24.00', '4.20', NULL, NULL),
(5, 'Legnica', 'Kościuszki', '18', '', 'available', '', '', 'CHAdeMO', '10.00', '3.20', NULL, NULL),
(6, 'Głogów', 'Sienkiewicza', '7', 'Orlen', 'unavailable', '14:30', '28/03/2023', 'CCS', '20.00', '4.50', NULL, NULL),
(7, 'Zgorzelec', 'Zamkowa', '42', 'Lewiatan', 'available', '', '', 'CHAdeMO', '11.50', '3.70', NULL, NULL),
(8, 'Jawor', 'Słowackiego', '3', '', 'available', '', '', 'CCS', '23.00', '4.10', NULL, NULL),
(9, 'Świdnica', 'Piłsudskiego', '10', 'Orlen', 'available', '', '', 'CHAdeMO', '13.00', '3.80', NULL, NULL),
(10, 'Lubań', 'Kopernika', '22', 'Lubań Plaza', 'unavailable', '11:15', '30/03/2023', 'CCS', '21.00', '4.30', NULL, NULL),
(11, 'Góra', 'Polna', '9', '', 'available', '', '', 'Tesla Supercharger', '50.00', '5.00', NULL, NULL),
(12, 'Oleśnica', 'Wrocławska', '17', '', 'available', '', '', 'Tesla Supercharger', '50.00', '5.00', NULL, NULL),
(13, 'Wrocław', 'Nowy Świat', '7', '', 'available', '', '', 'Tesla Supercharger', '50.00', '5.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `malfunctions`
--

CREATE TABLE `malfunctions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `charger_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reported_time` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `malfunctions`
--

INSERT INTO `malfunctions` (`id`, `charger_id`, `user_id`, `reported_time`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2024-01-29 18:30:35', 'Zjebalo sie', '2024-01-29 17:30:35', '2024-01-29 17:30:35');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_22_140953_chargers', 1),
(6, '2023_12_17_173341_create_charging_sessions_table', 1),
(7, '2024_01_09_190327_reservations', 1),
(8, '2024_01_13_165831_chargers_malfunctions', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `charger_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`id`, `charger_id`, `user_id`, `start_time`, `end_time`) VALUES
(1, 1, 1, '2024-01-29 20:11:00', '2024-01-30 21:11:00'),
(2, 1, 1, '2024-01-29 20:11:00', '2024-01-30 21:11:00'),
(3, 1, 2, '2024-01-29 19:54:00', '2024-01-30 19:55:00'),
(4, 1, 2, '2024-01-29 19:54:00', '2024-01-30 19:55:00'),
(5, 1, 2, '2024-01-29 21:42:00', '2024-01-31 00:42:00'),
(6, 3, 2, '2024-01-30 13:06:00', '2024-01-31 13:05:00'),
(7, 3, 2, '2024-01-30 13:06:00', '2024-01-31 13:05:00'),
(8, 3, 2, '2024-01-30 13:06:00', '2024-01-31 13:05:00'),
(9, 3, 2, '2024-01-30 13:06:00', '2024-01-31 13:05:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `first_name`, `last_name`, `phone`, `dob`, `remember_token`, `created_at`, `updated_at`, `permission`) VALUES
(1, 'admin', 'admin@example.com', NULL, '$2y$10$j.i42TWxvoybnBhQvvygXOhN8ekV6tRh0mL5h1DjQkIGMO3DhTdY2', 'Admin', 'User', '123456789', '1990-01-01', NULL, NULL, NULL, 'admin'),
(2, 'user1', 'user1@example.com', NULL, '$2y$10$lXgnFXGp5yhmuv.GjleFgOkO7aQGuQb9oahb8x7FmU0YogRNWK6.m', 'John', 'Doe', '987654321', '1985-05-15', NULL, NULL, NULL, 'worker'),
(7, 'krynio', 'krynio340@gmail.com', NULL, '$2y$10$yMAJcY6Ng0XIIx6JIoKUkefKALlFYz9oHQ7.dTCOq9sBCcYY90YBu', 'Krystian', 'Tomczyk', '533630409', '2001-05-16', NULL, '2024-10-13 12:27:40', '2024-10-13 12:27:40', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `charging_sessions`
--
ALTER TABLE `charging_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `charging_sessions_user_id_foreign` (`user_id`),
  ADD KEY `charging_sessions_charger_id_foreign` (`charger_id`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `ladowarki`
--
ALTER TABLE `ladowarki`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `malfunctions`
--
ALTER TABLE `malfunctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `malfunctions_charger_id_foreign` (`charger_id`),
  ADD KEY `malfunctions_user_id_foreign` (`user_id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeksy dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_charger_id_foreign` (`charger_id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `charging_sessions`
--
ALTER TABLE `charging_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `ladowarki`
--
ALTER TABLE `ladowarki`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `malfunctions`
--
ALTER TABLE `malfunctions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `charging_sessions`
--
ALTER TABLE `charging_sessions`
  ADD CONSTRAINT `charging_sessions_charger_id_foreign` FOREIGN KEY (`charger_id`) REFERENCES `ladowarki` (`id`),
  ADD CONSTRAINT `charging_sessions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `malfunctions`
--
ALTER TABLE `malfunctions`
  ADD CONSTRAINT `malfunctions_charger_id_foreign` FOREIGN KEY (`charger_id`) REFERENCES `ladowarki` (`id`),
  ADD CONSTRAINT `malfunctions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_charger_id_foreign` FOREIGN KEY (`charger_id`) REFERENCES `ladowarki` (`id`),
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

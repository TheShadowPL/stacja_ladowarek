-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Lis 2023, 22:50
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `power`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `chargers`
--

CREATE TABLE `chargers` (
  `charger_id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `power` decimal(10,0) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `compatibility` varchar(255) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `station_id` int(11) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `google_maps_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `chargingstations`
--

CREATE TABLE `chargingstations` (
  `station_id` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `number_of_chargers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employeeassignments`
--

CREATE TABLE `employeeassignments` (
  `assignment_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `station_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `faults`
--

CREATE TABLE `faults` (
  `fault_id` int(11) NOT NULL,
  `charger_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('reported','confirmed','resolved') DEFAULT NULL,
  `responsible_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `charger_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `role` enum('employee','manager','end_user') DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `chargers`
--
ALTER TABLE `chargers`
  ADD PRIMARY KEY (`charger_id`),
  ADD KEY `station_id` (`station_id`);

--
-- Indeksy dla tabeli `chargingstations`
--
ALTER TABLE `chargingstations`
  ADD PRIMARY KEY (`station_id`);

--
-- Indeksy dla tabeli `employeeassignments`
--
ALTER TABLE `employeeassignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `station_id` (`station_id`);

--
-- Indeksy dla tabeli `faults`
--
ALTER TABLE `faults`
  ADD PRIMARY KEY (`fault_id`),
  ADD KEY `charger_id` (`charger_id`),
  ADD KEY `responsible_user_id` (`responsible_user_id`);

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `charger_id` (`charger_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `chargers`
--
ALTER TABLE `chargers`
  MODIFY `charger_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `chargingstations`
--
ALTER TABLE `chargingstations`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `employeeassignments`
--
ALTER TABLE `employeeassignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `faults`
--
ALTER TABLE `faults`
  MODIFY `fault_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `chargers`
--
ALTER TABLE `chargers`
  ADD CONSTRAINT `chargers_ibfk_1` FOREIGN KEY (`station_id`) REFERENCES `chargingstations` (`station_id`);

--
-- Ograniczenia dla tabeli `employeeassignments`
--
ALTER TABLE `employeeassignments`
  ADD CONSTRAINT `employeeassignments_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `employeeassignments_ibfk_2` FOREIGN KEY (`station_id`) REFERENCES `chargingstations` (`station_id`);

--
-- Ograniczenia dla tabeli `faults`
--
ALTER TABLE `faults`
  ADD CONSTRAINT `faults_ibfk_1` FOREIGN KEY (`charger_id`) REFERENCES `chargers` (`charger_id`),
  ADD CONSTRAINT `faults_ibfk_2` FOREIGN KEY (`responsible_user_id`) REFERENCES `users` (`user_id`);

--
-- Ograniczenia dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`charger_id`) REFERENCES `chargers` (`charger_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

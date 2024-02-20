-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 20 fév. 2024 à 21:21
-- Version du serveur : 10.6.14-MariaDB-cll-lve
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u954960852_Parrot`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admins`
--

CREATE TABLE `Admins` (
  `admin_id` varchar(36) NOT NULL,
  `level_admin` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ContactFormHandlers`
--

CREATE TABLE `ContactFormHandlers` (
  `user_id` varchar(36) NOT NULL,
  `form_contact_id` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `FormsContact`
--

CREATE TABLE `FormsContact` (
  `form_contact_id` varchar(36) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `subject` varchar(80) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Options`
--

CREATE TABLE `Options` (
  `option_id` varchar(36) NOT NULL,
  `category` varchar(30) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `OptionsForUsedCars`
--

CREATE TABLE `OptionsForUsedCars` (
  `option_id` varchar(36) NOT NULL,
  `used_car_ad_id` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_requests`
--

CREATE TABLE `password_reset_requests` (
  `reset_request_id` varchar(36) NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `token` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `password_reset_requests`
--

INSERT INTO `password_reset_requests` (`reset_request_id`, `user_id`, `token`, `created_at`) VALUES
('02e0c3fb-44c7-4e7b-846f-262ba5c19474', 'e803c2cc-b0da-49e9-9df2-8b9655976d15', '6cd03ddcc0d9db65f3514c56b685ad4dc8a908b964ef5112f21d64c565f9b33c', '2024-02-18 08:20:57'),
('b4e4538a-6df2-470c-b0ee-cc5a85b27d1f', 'b4138e86-3178-432f-aaf2-23af3f5e7bcb', '7d1cff0d541ea26b91caab0047f7477eb6b3363f97b0e027a955eb848aec0811', '2024-02-20 10:20:19'),
('e96c5c4a-eb74-4587-afd7-dfeefc6e8517', 'e803c2cc-b0da-49e9-9df2-8b9655976d15', 'e4067a70b9472cd9915dc9e694d42955992c841d0323cc2147bc7b3603bbd038', '2024-02-18 08:24:35');

-- --------------------------------------------------------

--
-- Structure de la table `Ratings`
--

CREATE TABLE `Ratings` (
  `rating_id` varchar(36) NOT NULL,
  `name` varchar(40) NOT NULL,
  `rate` tinyint(1) NOT NULL,
  `message` varchar(150) NOT NULL,
  `is_validate` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Ratings`
--

INSERT INTO `Ratings` (`rating_id`, `name`, `rate`, `message`, `is_validate`) VALUES
('2ce69e5f-513e-4a9f-a679-4063bb130b4a', 'JeanValJean', 5, 'Incroyable gentillesse', 1);

-- --------------------------------------------------------

--
-- Structure de la table `repairServices`
--

CREATE TABLE `repairServices` (
  `repair_service_id` varchar(36) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `managed_by` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `repairServices`
--

INSERT INTO `repairServices` (`repair_service_id`, `name`, `price`, `picture`, `description`, `managed_by`) VALUES
('d89f32a4-1ab5-4f5a-9183-24055fe05b3d', 'Plaquettes de freins', 89.99, 'ImgRepairServices/Plaquettes de freins.jpg', 'Changement des plaquettes de freins avec nettoyage des tambours ou disques.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` varchar(36) NOT NULL,
  `days` varchar(8) NOT NULL,
  `houry_start` time DEFAULT NULL,
  `houry_end` time DEFAULT NULL,
  `houry_start_opt` time DEFAULT NULL,
  `houry_end_opt` time DEFAULT NULL,
  `managed_by` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `days`, `houry_start`, `houry_end`, `houry_start_opt`, `houry_end_opt`, `managed_by`) VALUES
('145ABA2B-DA4F-4958-AF32-C06BC6DE8152', 'jeudi', '07:30:00', '12:00:00', '14:30:00', '19:00:00', NULL),
('2BBE8EB7-3F43-4FD0-8794-DFF8BB96505A', 'lundi', '08:30:00', '12:30:00', '14:00:00', '17:30:00', NULL),
('81CFD706-FDB5-4DF8-9582-FA5B9AE0BDB3', 'mardi', '07:30:00', '12:00:00', '14:30:00', '19:00:00', NULL),
('8E2A2B87-4DE0-4DA0-9CDB-D62464ED6301', 'vendredi', '08:00:00', '12:00:00', '14:00:00', '18:00:00', NULL),
('CFC35A80-8070-4453-8D16-415DAE7DD82D', 'dimanche', NULL, NULL, NULL, NULL, NULL),
('D42B07E3-B662-494D-A2DF-303CE6FA5DE8', 'mercredi', '07:30:00', '13:00:00', NULL, NULL, NULL),
('DD28AF97-D0CF-436E-AB9D-F05D7BD6E116', 'samedi', '08:00:00', '12:00:00', '14:00:00', '18:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `usedCarsAd`
--

CREATE TABLE `usedCarsAd` (
  `used_car_ad_id` varchar(36) NOT NULL,
  `brand` varchar(40) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `gearbox` varchar(12) NOT NULL,
  `motorisation` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `color` varchar(50) NOT NULL,
  `model` varchar(30) NOT NULL,
  `kilometers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `usedCarsAd`
--

INSERT INTO `usedCarsAd` (`used_car_ad_id`, `brand`, `price`, `picture`, `year`, `gearbox`, `motorisation`, `description`, `color`, `model`, `kilometers`) VALUES
('23eed6d2-ed49-452d-bbc5-c108f41e33b9', 'Chevrolet', 43200.00, 'ImgVehicles/.jpeg', '1973', 'Manuelle', 'essence', 'Le joyaux des US.', 'rouge blush', 'Corvette C3', 32400);

-- --------------------------------------------------------

--
-- Structure de la table `UserCarListings`
--

CREATE TABLE `UserCarListings` (
  `user_id` varchar(36) NOT NULL,
  `used_car_ad_id` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `UserRatingReview`
--

CREATE TABLE `UserRatingReview` (
  `user_id` varchar(36) NOT NULL,
  `rating_id` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `USERS`
--

CREATE TABLE `USERS` (
  `user_id` varchar(36) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `role` varchar(50) NOT NULL,
  `managed_by` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `USERS`
--

INSERT INTO `USERS` (`user_id`, `mail`, `password`, `first_name`, `last_name`, `address`, `birthdate`, `role`, `managed_by`) VALUES
('955e2065-b723-4539-8fa8-7216e562d9ae', 'anthony.statek@gmail.com', '$2y$10$D1KuCl.9ruw6IThjz9/KjeDP2GkLNyMItBdz0plsk8jxtofCJqYsi', 'Anthony', 'STATEK', '13 rue des roses', '1993-12-31', 'admin', NULL),
('b4138e86-3178-432f-aaf2-23af3f5e7bcb', 'anthony.statek1@icloud.com', '$2y$10$vmtcuZk1kCuQRXrpQv9QvOzNCWA8cGON.QN5Nz6qX/woc75o5uN/i', 'Freddie', 'Mercury', '139 Kenyatta Road', '1955-09-05', 'employé', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `ContactFormHandlers`
--
ALTER TABLE `ContactFormHandlers`
  ADD PRIMARY KEY (`user_id`,`form_contact_id`),
  ADD KEY `form_contact_id` (`form_contact_id`);

--
-- Index pour la table `FormsContact`
--
ALTER TABLE `FormsContact`
  ADD PRIMARY KEY (`form_contact_id`);

--
-- Index pour la table `Options`
--
ALTER TABLE `Options`
  ADD PRIMARY KEY (`option_id`);

--
-- Index pour la table `OptionsForUsedCars`
--
ALTER TABLE `OptionsForUsedCars`
  ADD PRIMARY KEY (`option_id`,`used_car_ad_id`),
  ADD KEY `used_car_ad_id` (`used_car_ad_id`);

--
-- Index pour la table `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  ADD PRIMARY KEY (`reset_request_id`);

--
-- Index pour la table `Ratings`
--
ALTER TABLE `Ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Index pour la table `repairServices`
--
ALTER TABLE `repairServices`
  ADD PRIMARY KEY (`repair_service_id`),
  ADD KEY `managed_by` (`managed_by`);

--
-- Index pour la table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `managed_by` (`managed_by`);

--
-- Index pour la table `usedCarsAd`
--
ALTER TABLE `usedCarsAd`
  ADD PRIMARY KEY (`used_car_ad_id`);

--
-- Index pour la table `UserCarListings`
--
ALTER TABLE `UserCarListings`
  ADD PRIMARY KEY (`user_id`,`used_car_ad_id`),
  ADD KEY `used_car_ad_id` (`used_car_ad_id`);

--
-- Index pour la table `UserRatingReview`
--
ALTER TABLE `UserRatingReview`
  ADD PRIMARY KEY (`user_id`,`rating_id`),
  ADD KEY `rating_id` (`rating_id`);

--
-- Index pour la table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_managed_by` (`managed_by`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Admins`
--
ALTER TABLE `Admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `Users` (`user_id`);

--
-- Contraintes pour la table `ContactFormHandlers`
--
ALTER TABLE `ContactFormHandlers`
  ADD CONSTRAINT `contactformhandlers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `contactformhandlers_ibfk_2` FOREIGN KEY (`form_contact_id`) REFERENCES `FormsContact` (`form_contact_id`);

--
-- Contraintes pour la table `OptionsForUsedCars`
--
ALTER TABLE `OptionsForUsedCars`
  ADD CONSTRAINT `optionsforusedcars_ibfk_1` FOREIGN KEY (`option_id`) REFERENCES `Options` (`option_id`),
  ADD CONSTRAINT `optionsforusedcars_ibfk_2` FOREIGN KEY (`used_car_ad_id`) REFERENCES `UsedCarsAd` (`used_car_ad_id`);

--
-- Contraintes pour la table `repairServices`
--
ALTER TABLE `repairServices`
  ADD CONSTRAINT `repairservices_ibfk_1` FOREIGN KEY (`managed_by`) REFERENCES `Admins` (`admin_id`);

--
-- Contraintes pour la table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`managed_by`) REFERENCES `Admins` (`admin_id`);

--
-- Contraintes pour la table `UserCarListings`
--
ALTER TABLE `UserCarListings`
  ADD CONSTRAINT `usercarlistings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `usercarlistings_ibfk_2` FOREIGN KEY (`used_car_ad_id`) REFERENCES `UsedCarsAd` (`used_car_ad_id`);

--
-- Contraintes pour la table `UserRatingReview`
--
ALTER TABLE `UserRatingReview`
  ADD CONSTRAINT `userratingreview_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `userratingreview_ibfk_2` FOREIGN KEY (`rating_id`) REFERENCES `Ratings` (`rating_id`);

--
-- Contraintes pour la table `USERS`
--
ALTER TABLE `USERS`
  ADD CONSTRAINT `fk_managed_by` FOREIGN KEY (`managed_by`) REFERENCES `Admins` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: So 15.Apr 2023, 21:24
-- Verzia serveru: 10.4.28-MariaDB
-- Verzia PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `wtech_app`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `order_infos`
--

CREATE TABLE `order_infos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shopping_card_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `house_number` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `order_infos`
--

INSERT INTO `order_infos` (`id`, `user_id`, `shopping_card_id`, `name`, `email`, `phone_number`, `street`, `house_number`, `city`, `postal_code`, `country`, `delivery`, `payment`, `updated_at`, `created_at`) VALUES
(1, NULL, NULL, 'Miroslava Mäsiariková', 'miroslava.masiarikova@gmail.com', '0912345678', 'Višňové', '1', 'Štiavnik', '01355', 'Slovensko', NULL, NULL, '2023-04-15 17:20:36', '2023-04-15 17:20:36'),
(2, NULL, NULL, 'Jozefina Nováková', 'jozka.novak@centrum.sk', '0921218015', 'Košická', '6', 'Žilina', '01001', 'Slovensko', NULL, NULL, '2023-04-15 17:21:49', '2023-04-15 17:21:49');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image1` varchar(50) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `image2` varchar(50) NOT NULL,
  `image3` varchar(50) DEFAULT NULL,
  `category1` varchar(50) NOT NULL,
  `category2` varchar(50) NOT NULL,
  `category3` varchar(50) DEFAULT NULL,
  `category4` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `image1`, `rating`, `image2`, `image3`, `category1`, `category2`, `category3`, `category4`) VALUES
(2, 'Gold Standard Whey 100%', 'Kvalitný proteín od špičkového výrobcu.', 25, '../images/product1_1.png', 4, '../images/product1_2.png', NULL, 'vyziva', 'GN', 'protein', 'whey'),
(3, 'Gold Standard Whey 100% Sáčok', 'Kvalitný proteín v šáčku', 15, '../images/product2_1.png', 4, '2../images/product1_2.png', NULL, 'vyziva', 'GN', 'protein', 'whey'),
(4, 'ISO Whey Zero', 'Najlepší proteín na trhu', 35, '../images/product4_1.png', 5, '../images/product4_2.png', NULL, 'vyziva', 'Biotech', 'protein', 'whey'),
(5, 'Enjoy Whey Protein', 'Kvalitný proteín od špičkového výrobcu v oblasti proteínov.', 30, '../images/product5_1.png', 4, '../images/product5_2.png', NULL, 'vyziva', 'Gymbeam', 'protein', 'whey'),
(6, 'Just Whey Protein', 'Kvalitný proteín od špičkového výrobcu v oblasti proteinov.', 32, '../images/product6_1.png', 4, '../images/product6_2.png', NULL, 'vyziva', 'Gymbeam', 'protein', 'whey'),
(7, 'Beast Yum Yum', 'Kvalitný proteín od špičkového výrobcu v oblasti proteinov.', 26, '../images/product7_1.png', 3, '../images/product7_2.png', NULL, 'vyziva', 'Gymbeam', 'protein', 'whey'),
(8, 'GymBeam Tričko Fialové', 'Športové tričko od spoločnosti GymBeam na všetky typy tréningov.', 15, '../images/product8_1.png', 5, '../images/product8_2.png', NULL, 'oblecenie', 'Gymbeam', 'tricko', NULL),
(9, 'GymBeam Tričko Červené', 'Športové tričko od spoločnosti GymBeam na všetky typy tréningov.', 15, '../images/product9_1.png', 5, '../images/product9_2.png', NULL, 'oblecenie', 'GymBeam', 'tricko', NULL),
(10, 'GymBeam Mikina Biela', 'Športová mikina od spoločnosti GymBeam pre chladné počasie.', 40, '../images/product10_1.png', 5, '../images/product10_2.png', NULL, 'oblecenie', 'GymBeam', 'mikina', NULL),
(11, 'GymBeam Mikina Modrá', 'Športová mikina od spoločnosti GymBeam pre chladné počasie.', 40, '../images/product11_1.png', 5, '../images/product11_2.png', NULL, 'oblecenie', 'GymBeam', 'mikina', NULL),
(12, 'Peanut Butter', 'Arašidové maslo od spoločnosti GymBeam pre každé jedlo.', 5, '../images/product12_1.png', 4, '../images/product12_2.png', NULL, 'potraviny', 'GymBeam', 'butter', NULL),
(13, 'Liquid Eggs Whites', 'Vaječné bielka od spoločnosti GymBeam pre zdravé raňajky a varenie.', 10, '../images/product13_1.png', 4, '../images/product13_2.png', NULL, 'potraviny', 'GymBeam', 'bielka', NULL),
(14, 'Zero Syrup', 'Nula kalorický sirup na dochutenie jedál', 10, '../images/product14_1.png', 3, '../images/product14_2.png', NULL, 'potraviny', 'GymBeam', 'syrup', NULL),
(15, 'Záťažová vesta', 'Záťažová vesta s hmotnosťou 15kg na zlepšenie tréningu.', 80, '../images/product15_1.png', 4, '../images/product15_2.png', NULL, 'prislusenstvo', 'GymBeam', 'vesta', NULL),
(16, 'Popruhy na cvičenie', 'Popruhy na zlepšenie tréningu', 75, '../images/product16_1.png', 3, '../images/product16_2.png', NULL, 'prislusenstvo', 'Gymbeam', 'popruhy', NULL),
(17, 'Vsperačsný Opasok GymBeam', 'Opasok na spevnenie stredu tela počas tréningu.', 50, '../images/product17_1.png', 4, '../images/product17_2.png', NULL, 'prislusenstvo', 'Gymbeam', 'opasok', NULL);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `shopping_cart_item`
--

CREATE TABLE `shopping_cart_item` (
  `id` int(11) NOT NULL,
  `shopping_cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `shopping_history`
--

CREATE TABLE `shopping_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shopping_cart_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `updated_at`, `created_at`) VALUES
(4, 'Ján Mareček', 'jano', '$2y$10$z2pID8qsYrRGRAfRr2PXfuoPyJYU8GX1NrOkrXjmzOkfdx9E4D0SG', 'janomarecek2002@gmail.com', '2023-04-07 12:46:29', '2023-04-07 12:46:29'),
(5, 'admin', 'admin', '$2y$10$y2lT3Mj6OtF37lrf8Ii4f.GDFcYSGGr3asVizelWKcbKHu8psZaD2', 'admin@gmail.com', '2023-04-07 15:07:42', '2023-04-07 15:07:42'),
(8, 'Miroslava Mäsiariková', 'mirus', '$2y$10$z94hiMl.FIBHd0v0fmb/2Og9WKXcS9Yu7AzBJ8WRZh.7RCTzdw2oi', 'miroslava.masiarikova@gmail.com', '2023-04-14 18:08:32', '2023-04-14 18:08:32'),
(9, 'Jozo Mrkva', 'jozo', '$2y$10$q/GF8aqK2dVK.qR3Xt4DbeTS5Kr.TVVV/r.1GR.OGKcdrJZZTDoOO', 'jozo@gmail.com', '2023-04-15 15:20:58', '2023-04-15 15:20:58');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `order_infos`
--
ALTER TABLE `order_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `shopping_cart_item`
--
ALTER TABLE `shopping_cart_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `shopping_history`
--
ALTER TABLE `shopping_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `order_infos`
--
ALTER TABLE `order_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pre tabuľku `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `shopping_cart_item`
--
ALTER TABLE `shopping_cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `shopping_history`
--
ALTER TABLE `shopping_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

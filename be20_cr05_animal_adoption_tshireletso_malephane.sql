-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 04:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be20_cr05_animal_adoption_tshireletso_malephane`
--
CREATE DATABASE IF NOT EXISTS `be20_cr05_animal_adoption_tshireletso_malephane` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be20_cr05_animal_adoption_tshireletso_malephane`;

-- --------------------------------------------------------

--
-- Table structure for table `adoptions`
--

DROP TABLE IF EXISTS `adoptions`;
CREATE TABLE `adoptions` (
  `id` int(11) NOT NULL,
  `adoption_date` date NOT NULL,
  `user_id_fk` int(11) DEFAULT NULL,
  `animal_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `animal_type` varchar(30) NOT NULL,
  `breed` varchar(30) NOT NULL,
  `age` varchar(11) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(10) NOT NULL,
  `vaccinated` varchar(8) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `picture`, `animal_type`, `breed`, `age`, `gender`, `description`, `size`, `vaccinated`, `address`, `status`) VALUES
(1, 'Dodge', 'Dodge.jpg', 'Dog', 'Pit Bull Terrier', 'Adult', 'Male', 'Meet Dodge, the resilient adventurer! Dodge is a spirited pup with a charming personality. Despite a rough start in life, this survivor exudes boundless energy and an infectious zest for life. His playful antics will keep you entertained for hours. Dodge is seeking a loving home where he can share his enthusiasm and love for life. He\'s a medium-sized bundle of joy, always ready for a game of fetch or a cozy snuggle. Email us at adopt@dodgerescue.org to make Dodge a part of your family!\r\n', '15kg', 'Yes', 'Paws for Hope Rescue Center\r\n', 1),
(2, 'Bunny', 'Bunny.jpg', 'Dog', 'Husky', '7 months', 'Female', 'This sweetheart is in search of their forever home. Meet Bunny! She gets her name cause she sort of has a certain hop in her gait. She had head trauma as a puppy (from likely being hit by a car), which led to her having some ataxia (wobbly gait), but she doesn\'t let that slow her down. She is a sweet talkative girl looking for a home that will give her all the blankets to snuggle in and space to run (awkwardly, but adorably) around. She would do best in a single-level home (or one where someone is willing to help carry her up and down stairs and have gates to prevent her trying to do it on her own), with either cats or dogs (she LOVES her foster siblings - both cats and dogs) that respect her mobility limitations. Interested in meeting this cute girl and learning more about her special needs? Email us today! She is estimated to be 7 months old (as of 10/2023) (Estimated birthdate is 03/19/2023) and is: -Spayed -Microchipped -Vaccinated (up to date for their age) -Dewormed -Come with a lifetime supply of love Please email info@soulanimalshelter.org if interested in adopting! As we are run by full time veterinary students and veterinarians, we appreciate your patience. We strive to answer your email as soon as possible (usually within 24 hours); however please allow for 2-4 business days pending class/case loads. Please also check your spam email if you do not see a response from us!	\r\n', '26kg', 'No', 'SHELTER FOR OUTCASTS, UNUSUALS, AND THE LOST AN ANIMAL RESCUE (SOUL)\r\n', 1),
(3, 'Sunbeam', 'Sundbeam.jpg', 'Dog', 'Labrador Retriever Mix', '9years', 'Female', 'Introducing Sunbeam, the gentle soul with a heart as big as the sun! Sunbeam is a serene beauty looking for a calm and loving home. She\'s the perfect companion for someone who enjoys quiet moments and peaceful walks. Sunbeam adores curling up in a sunbeam or beside you on the couch. She\'s spayed, microchipped, and up-to-date on vaccinations. If you\'re ready to welcome serenity and grace into your life, email us at sunbeam.lover@rescuehaven.org.\r\n', '20kg', 'Yes', 'Rescue Haven', 1),
(4, 'Cocoa', 'Cocoa.jpg', 'Dog', 'Golden Retriever', '3 years', 'Male', 'Meet Cocoa, the charming goofball ready to steal your heart! Cocoa is a big, lovable boy with a heart as large as his paws. He\'s got an outgoing personality and a tail that never stops wagging. Cocoa is looking for an active family who enjoys outdoor adventures and playtime. Despite his large size, he\'s a gentle giant who loves cuddles and belly rubs. Contact us at cocoaadventures@gmail.com to meet Cocoa today!\r\n', '27kg', 'Yes', 'Happy Tails Rescue\r\n', 1),
(5, 'Max', 'Max.jpg', 'Dog', 'Border Collie Mix', '6 years', 'Female', 'Max, the enchanting sweetheart, is ready to fill your home with love! This elegant lady has a graceful demeanor and a gentle spirit. Max enjoys leisurely strolls and quiet moments by the fire. She\'s spayed, microchipped, and fully vaccinated. Max is seeking a cozy home where she can be the center of attention. If you\'re looking for a refined canine companion, email us at adoptmax@gracefulpaws.org.\r\n', '18kg', 'Yes', 'Graceful Paws Animal Rescue\r\n', 1),
(6, 'Marble', 'Marble.jpg', 'Cat', 'Domestic Shorthair', '4 years', 'Male', 'Marble, the mischievous feline extraordinaire, is ready to bring joy into your life! With an impressive set of whiskers and a playful spirit, Marble is the perfect addition to any cat-loving home. This charismatic cat loves to climb and explore, always on the lookout for the next adventure. Marble is spayed, microchipped, and has all the purrs you\'ll ever need. Email marblejoy@catadventures.org to meet this lively character!\r\n', '4kg', '3 years', 'Cat Adventures Rescue', 1),
(7, 'Mocha', 'Mocha.jpg', 'Cat', 'Siamese Mix', '10 years', 'Female', 'Mocha, the regal queen of cuddles, is seeking her forever kingdom! Mocha is a majestic cat with a soft fur coat and a penchant for luxurious naps. This elegant lady enjoys lounging on plush pillows and receiving gentle head scratches. Mocha is spayed, microchipped, and up-to-date on vaccinations. If you\'re ready to welcome royalty into your home, email adoptmocha@royalpaws.org.\r\n', '5kg', 'Yes', 'Royal Paw Cat Sanctuary', 1),
(8, 'Tango', 'Tango.jpg', 'Cat', 'Tabby', '3', 'Male', '', '3kg', 'Yes', 'Happy Tails Cat Rescue\r\n', 1),
(9, 'Mittens', 'Mittens.jpg', 'Cat', 'Domestic Shorthair', '1 year', 'Male', 'Mittens, the charming adventurer, is ready for a forever playmate! With a twinkle in his eye and a spring in his step, Mittens is a cat that embodies the spirit of curiosity. This handsome feline is neutered, microchipped, and always up for a game of chase or a cozy nap on your lap. If you\'re ready for a companion that adds a dash of excitement to your days, email adoptmittens@whiskerwonders.org.\r\n', '5kg', 'Yes', 'Whisker Wonders Cat Haven\r\n', 1),
(10, 'Leon', 'Leon.jpg', 'Cat', 'Persian Mix', '9', 'Male', 'Leon, the enchanting lionheart, is ready to light up your life! With a silky coat and a graceful demeanor, Leon is a serene and elegant cat. He enjoys basking in the sun and watching the world go by. Leon is neutered, microchipped, and fully vaccinated. If you\'re looking for a cat that brings peace and tranquility, email adoptLeonn@serenitypaws.org.\r\n', '5kg', 'Yes', 'Serenity Paws Cat Haven\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD PRIMARY KEY (`id`) KEY_BLOCK_SIZE=12 USING BTREE,
  ADD KEY `user_id_fk` (`user_id_fk`),
  ADD KEY `animal_id_fk` (`animal_id_fk`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoptions`
--
ALTER TABLE `adoptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoptions`
--
ALTER TABLE `adoptions`
  ADD CONSTRAINT `animal_id_fk` FOREIGN KEY (`animal_id_fk`) REFERENCES `animals` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id_fk`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

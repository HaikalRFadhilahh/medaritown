-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2023 at 06:08 AM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_perumahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bio`
--

CREATE TABLE `bio` (
  `id` int NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bio`
--

INSERT INTO `bio` (`id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '&lt;p&gt;Medaritown adalah sebuah perusahaan perumahan yang berdedikasi untuk menghadirkan lingkungan hunian yang nyaman dan modern bagi masyarakat. Dengan fokus pada desain inovatif, keberlanjutan, dan kualitas bangunan, Medaritown telah membangun reputasi sebagai pengembang properti yang terkemuka. Perusahaan ini menawarkan berbagai tipe rumah mulai dari apartemen hingga rumah mewah, memberikan pilihan hunian yang sesuai dengan berbagai kebutuhan dan gaya hidup.&lt;/p&gt;\r\n\r\n&lt;p&gt;Salah satu keunggulan Medaritown terletak pada komitmennya terhadap keberlanjutan dan ramah lingkungan. Dalam setiap proyeknya, perusahaan ini mengintegrasikan teknologi hijau dan praktik konstruksi berkelanjutan untuk mengurangi dampak lingkungan. Dengan demikian, Medaritown tidak hanya memberikan rumah yang nyaman bagi penghuninya, tetapi juga berupaya untuk memastikan bahwa setiap pembangunan mencerminkan tanggung jawab lingkungan.&lt;/p&gt;\r\n\r\n&lt;p&gt;Tidak hanya membangun rumah, Medaritown juga aktif dalam mengembangkan fasilitas umum dan infrastruktur yang mendukung kehidupan komunitas. Dengan menciptakan ruang terbuka, taman, dan area rekreasi, perusahaan ini berusaha mempromosikan kehidupan sosial yang seimbang dan berkelanjutan bagi penghuninya. Medaritown bukan sekadar pengembang properti, tetapi mitra dalam membentuk lingkungan hunian yang berdaya, indah, dan berkelanjutan.&lt;/p&gt;\r\n', '2023-11-18 11:28:10', '2023-11-22 11:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Haikal R Fadhilah', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2023-11-18 09:32:10', '2023-11-22 13:02:44'),
(2, 'Haikal Raditya Fadhilah', 'haikalrfadhilah', 'haikalrfadhilah', '2023-11-18 16:05:07', '2023-11-18 23:05:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bio`
--
ALTER TABLE `bio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bio`
--
ALTER TABLE `bio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `slider_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

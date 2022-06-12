-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2022 at 12:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `owner_name`, `photo`, `link`, `start`, `end`, `created_at`) VALUES
(23, 'zaw', 'https://tpc.googlesyndication.com/simgad/319706570501237828?sqp=4sqPyQQrQikqJwhfEAEdAAC0QiABKAEwCTgDQPCTCUgAUAFYAWBfcAJ4AcUBLbKdPg&rs=AOga4ql_5U7zaiSSS39HdJKgqUhmQB-U3g', 'https://cymulate.com/resources/gartner-report/?ppc_keyword=&utm_device=c&utm_term=&utm_campaign=Display-Remarketing&utm_source=adwords&utm_medium=cpc&utm_content=597723716118&hsa_acc=5342569174&hsa_cam=17239567174&hsa_grp=131835103130&hsa_ad=597723716118&hsa_src=d&hsa_tgt=&hsa_kw=&hsa_mt=&hsa_net=adwords&hsa_ver=3&gclid=EAIaIQobChMIsp2mnoOl-AIVRoCsAh2DqAaVEAEYASAAEgLh3_D_BwE', '2022-06-11', '2022-06-13', '2022-06-11 08:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordering` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `color`, `ordering`, `user_id`, `created_at`) VALUES
(1, 'news', '#06283D', 0, 1, '2022-06-11 06:03:25'),
(2, 'sport', '#FFA500', 0, 1, '2022-06-11 06:12:42'),
(3, 'movie', '#CC9C75', 0, 1, '2022-06-11 06:14:26'),
(4, 'mobile', '#354259', 0, 1, '2022-06-11 06:28:46'),
(9, 'music', '#5FD068', 0, 1, '2022-06-11 06:45:17'),
(10, 'fashion', '#F2D1D1', 0, 1, '2022-06-11 09:08:06'),
(12, 'Health', '#80c8ff', 0, 1, '2022-06-11 16:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `amount` double NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `from_user`, `to_user`, `amount`, `description`, `created_at`) VALUES
(1, 1, 2, 200, 'for salary', '2022-06-11 11:08:00'),
(2, 1, 2, 100, 'for daily upload', '2022-06-11 11:10:11'),
(3, 1, 3, 100, 'for entry', '2022-06-11 11:28:10'),
(4, 1, 2, 200, 'for developing website', '2022-06-11 12:03:12'),
(5, 1, 3, 150, 'for work', '2022-06-12 08:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_publish` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ordering` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `user_id`, `category_id`, `is_publish`, `ordering`, `created_at`) VALUES
(4, 'The &lsquo;Stranger Things&rsquo; Season 4 Part 2 Release Date And New Trailer', '&lt;p&gt;&lt;img src=&quot;https://imageio.forbes.com/specials-images/imageserve/62a4a499c2489f599a350263/stranger/960x0.jpg?format=jpg&amp;amp;width=960&quot; style=&quot;width: 100%;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 1.2rem; margin-left: 0px; caret-color: rgb(51, 51, 51); color: rgb(51, 51, 51); font-family: Georgia, Cambria, &amp;quot;Times New Roman&amp;quot;, Times, serif; font-size: 18px; text-size-adjust: auto;&quot;&gt;I am very curious if Stranger Things may make it all the way to the second collection of its season 4 episodes being #1 on Netflix&rsquo;s top 10 list. It just has a few more weeks to go, as the release date for season 4 part 2 is and remains&lt;span style=&quot;font-weight: bolder;&quot;&gt;&lt;span class=&quot;Apple-converted-space&quot;&gt;&amp;nbsp;&lt;/span&gt;July 1, 2022&lt;/span&gt;, just a little over a month since the release of the first seven episodes.&lt;/p&gt;&lt;div class=&quot;halfway_hardwall_1&quot; style=&quot;margin: 0px 0px 1.2rem; caret-color: rgb(51, 51, 51); color: rgb(51, 51, 51); font-family: Georgia, Cambria, &amp;quot;Times New Roman&amp;quot;, Times, serif; font-size: 18px; text-size-adjust: auto;&quot;&gt;&lt;/div&gt;&lt;div class=&quot;article_paragraph_2&quot; style=&quot;margin: 0px 0px 1.2rem; caret-color: rgb(51, 51, 51); color: rgb(51, 51, 51); font-family: Georgia, Cambria, &amp;quot;Times New Roman&amp;quot;, Times, serif; font-size: 18px; text-size-adjust: auto;&quot;&gt;&lt;/div&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 1.2rem; margin-left: 0px; caret-color: rgb(51, 51, 51); color: rgb(51, 51, 51); font-family: Georgia, Cambria, &amp;quot;Times New Roman&amp;quot;, Times, serif; font-size: 18px; text-size-adjust: auto;&quot;&gt;The final two episodes also have new teaser&lt;span class=&quot;Apple-converted-space&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;a href=&quot;https://www.youtube.com/watch?v=_73MRQSGO1w&quot; target=&quot;_blank&quot; class=&quot;color-link&quot; title=&quot;https://www.youtube.com/watch?v=_73MRQSGO1w&quot; rel=&quot;nofollow noopener noreferrer&quot; data-ga-track=&quot;ExternalLink:https://www.youtube.com/watch?v=_73MRQSGO1w&quot; aria-label=&quot;trailer&quot; style=&quot;color: rgb(0, 56, 145); cursor: pointer; text-decoration: none;&quot;&gt;trailer&lt;span class=&quot;Apple-converted-space&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/a&gt;previewing the final conflict, which you can check out below, as it was released during Netflix&rsquo;s GeekedWeek:&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 1.2rem; margin-left: 0px; caret-color: rgb(51, 51, 51); color: rgb(51, 51, 51); font-family: Georgia, Cambria, &amp;quot;Times New Roman&amp;quot;, Times, serif; font-size: 18px; text-size-adjust: auto;&quot;&gt;&lt;iframe frameborder=&quot;0&quot; src=&quot;//www.youtube.com/embed/_73MRQSGO1w&quot; width=&quot;640&quot; height=&quot;360&quot; class=&quot;note-video-clip&quot;&gt;&lt;/iframe&gt;&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 1.2rem; margin-left: 0px; caret-color: rgb(51, 51, 51); color: rgb(51, 51, 51); font-family: Georgia, Cambria, &amp;quot;Times New Roman&amp;quot;, Times, serif; font-size: 18px; text-size-adjust: auto;&quot;&gt;We know there&rsquo;s a big final showdown versus Vecna, but I&rsquo;m more curious about what Hopper and Joyce appear to be finding in the Soviet facility, as it appears to be a lot more than just a Demigorgon they feed prisoners too. I wonder how that&rsquo;s going to play into both the finale and the final season.&lt;/p&gt;&lt;div class=&quot;halfway_hardwall_3&quot; style=&quot;margin: 0px 0px 1.2rem; caret-color: rgb(51, 51, 51); color: rgb(51, 51, 51); font-family: Georgia, Cambria, &amp;quot;Times New Roman&amp;quot;, Times, serif; font-size: 18px; text-size-adjust: auto;&quot;&gt;&lt;/div&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 1.2rem; margin-left: 0px; caret-color: rgb(51, 51, 51); color: rgb(51, 51, 51); font-family: Georgia, Cambria, &amp;quot;Times New Roman&amp;quot;, Times, serif; font-size: 18px; text-size-adjust: auto;&quot;&gt;Even though there are just two more episodes left for Stranger Things season 4 part 2, we know they are&lt;span class=&quot;Apple-converted-space&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;em&gt;massive&lt;/em&gt;. Episode 8 is an hour and a half and episode 9, the finale, is two and a half hours long, a complete blockbuster movie with a budget to match, it seems.&lt;/p&gt;', 1, 3, '0', NULL, '2022-06-11 16:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `money` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `photo`, `money`, `created_at`) VALUES
(1, 'Lucien', 'admin@gmail.com', '$2y$10$CoBwvjlUJC6uBZ4Eq/IxSuBdyeb6qkjOUlp.0WGOdwL4hvoiz3DFO', '0', 'default.png', 99250, '2022-06-11 05:39:26'),
(2, 'daniel', 'daniel@gmail.com', '$2y$10$FnCMAh4RiAJI5pemAq3cTeJkX7A77Io7QCG5ei7J8s88q.Kd6o6ea', '1', 'default.png', 35000, '2022-06-11 05:49:42'),
(3, 'thein', 'thein@gmail.com', '$2y$10$97C3sm6DE0yoljc2ilGbnu8G70QI2TrIp8mIUUml3OrRF.mEIUuCO', '2', 'default.png', 250, '2022-06-11 11:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `viewers`
--

CREATE TABLE `viewers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `viewers`
--

INSERT INTO `viewers` (`id`, `user_id`, `post_id`, `device`, `created_at`) VALUES
(1, 1, 1, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Safari/605.1.15', '2022-06-11 06:04:43'),
(2, 2, 1, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Safari/605.1.15', '2022-06-11 11:14:26'),
(3, 1, 2, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '2022-06-11 14:11:28'),
(4, 1, 2, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '2022-06-11 14:18:49'),
(5, 3, 3, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Safari/605.1.15', '2022-06-11 14:50:48'),
(6, 3, 2, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Safari/605.1.15', '2022-06-11 14:50:51'),
(7, 0, 2, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '2022-06-11 16:29:42'),
(8, 1, 4, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '2022-06-11 16:56:30'),
(9, 1, 4, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '2022-06-11 17:02:38'),
(10, 3, 4, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '2022-06-11 17:31:53'),
(11, 1, 4, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '2022-06-11 17:52:52'),
(12, 1, 4, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '2022-06-11 17:53:48'),
(13, 1, 4, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '2022-06-11 17:54:05'),
(14, 0, 4, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '2022-06-11 18:07:58'),
(15, 3, 4, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.4 Safari/605.1.15', '2022-06-12 09:06:10'),
(16, 1, 4, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36', '2022-06-12 10:05:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewers`
--
ALTER TABLE `viewers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `viewers`
--
ALTER TABLE `viewers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

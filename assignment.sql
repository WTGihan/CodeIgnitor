-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 01:53 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(3, 1, 1, 'Assignment 1', 'Assignment-1', '<p><strong>Vestibulum sollicitudin vulputate ultrices</strong></p>\r\n\r\n<p>Mauris maximus lectus metus, id venenatis justo pulvinar a. Integer accumsan libero est, id rhoncus arcu sodales at. Curabitur vel viverra risus. Quisque auctor, urna ut dapibus commodo, est nulla aliquam mauris, dapibus ultricies ex diam id est. Integer tristique nibh id metus faucibus dignissim. Quisque rhoncus sollicitudin libero, vel facilisis tellus pretium ut. Vivamus consectetur a elit ut facilisis. Donec vel ultrices lacus. Sed quis tortor quis mi accumsan rhoncus non a lectus. Ut vel sagittis nulla. Integer laoreet lorem vel velit mattis tincidunt. Cras in suscipit ipsum. Mauris fermentum, massa vitae porttitor ullamcorper, neque elit pretium lectus, ac pretium urna libero iaculis ipsum. Vestibulum sollicitudin vulputate ultrices. Maecenas ut neque ut mi maximus varius sed quis diam. Proin sit amet elementum diam, nec porttitor neque.</p>\r\n', 'noimage.jpg', '2020-07-30 22:39:13'),
(4, 2, 2, 'Assignment 2', 'Assignment-2', '<p><strong>Mauris faucibus consectetur sodales.</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum risus pellentesque, commodo nibh in, faucibus dui. Pellentesque feugiat orci velit, eu volutpat sapien mollis id. Nunc est felis, faucibus vitae tincidunt quis, bibendum in sem. Sed eu diam non justo semper lacinia. Sed tincidunt ut odio in cursus. Fusce ac dictum magna, nec dignissim turpis. Vivamus venenatis consequat dignissim. Aenean ultricies est et tempus cursus. Cras elit nisl, aliquet eget euismod eu, condimentum nec ante. Mauris faucibus consectetur sodales.</p>\r\n', 'noimage.jpg', '2020-07-30 22:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`) VALUES
(1, 'Data Structure and Algorithms', '2020-07-30 21:54:59'),
(2, 'Rapid Application Development', '2020-07-30 21:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `zipcode`, `email`, `username`, `password`, `register_date`) VALUES
(1, 'Tharindu Gihan', '80170', 'wtgihan@gmail.com', 'WTGihan', '63a9f0ea7bb98050796b649e85481845', '2020-07-30 21:08:44'),
(2, 'Himasha Anjalii', '15847', 'anjali@gmail.com', 'Anjali', '63a9f0ea7bb98050796b649e85481845', '2020-07-30 22:42:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Lip 03, 2024 at 09:10 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `message_board`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL DEFAULT 'Anon',
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `thread_id`, `username`, `body`) VALUES
(1, 2, 'Anon', 'Welcome! First, make sure you have a good understanding of PHP basics. Setting up a local development environment with XAMPP or MAMP can be really helpful.'),
(2, 2, 'Anon', 'Don&#039;t forget about security! Always sanitize user inputs to prevent SQL injection. Using prepared statements with PDO is a good practice.'),
(3, 2, 'Anon', 'For the message board, you&#039;ll need a database to store posts and user information. MySQL is commonly used with PHP. Start by designing your database schema.'),
(14, 2, 'Anon', 'Consider using a PHP framework like Laravel or Symfony. They can make development faster and help you follow best practices.'),
(25, 2, 'Anon', 'Make sure your site is mobile-friendly. Using a front-end framework like Bootstrap can help with responsive design.'),
(26, 2, 'Anon', 'Implement user authentication early on. PHP has built-in functions like password_hash() and password_verify() that make handling passwords easier and more secure.'),
(27, 2, 'Anon', 'Version control is important. Use Git to keep track of your changes and collaborate with others.'),
(28, 2, 'Anon', 'Don&#039;t forget about error handling and logging. They are essential for debugging and maintaining your site.'),
(29, 2, 'Anon', 'Finally, deploy your site to a reliable hosting provider and keep it updated. Regular maintenance is key to keeping your message board secure and running smoothly.'),
(30, 3, 'Anon', 'Welcome! First things first, MySQL is a relational database management system (RDBMS). It&#039;s used to store and manage data in a structured way.'),
(31, 3, 'Anon', 'You&#039;ll need to understand databases, tables, and SQL (Structured Query Language). SQL is the language used to interact with the database.'),
(32, 3, 'Anon', 'Start by installing MySQL on your local machine or using a web-based service like phpMyAdmin. This will give you a user-friendly interface to manage your databases.'),
(33, 3, 'Anon', 'In MySQL, a database contains tables, and tables contain rows and columns. Each column has a data type, like INT for integers or VARCHAR for strings.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL DEFAULT 'Anon',
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_expired` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `username`, `title`, `body`, `created`, `updated`, `is_expired`) VALUES
(2, 'Anon', 'Message board site in PHP', 'Hey everyone, I&#039;m starting to build a message board site in PHP. Any tips on where to begin?', '2024-07-03 18:19:05', '2024-07-03 18:19:05', 0),
(3, 'Anon', 'Basics of MySQL', 'Hi everyone, I&#039;m new to MySQL. What are the basics I should know to get started?', '2024-07-03 19:08:56', '2024-07-03 19:08:56', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_ibfk_1` (`thread_id`);

--
-- Indeksy dla tabeli `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

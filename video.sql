
--
-- Database: `movie`
--

--
-- Table structure for table `video`
--

CREATE DATABASE IF NOT EXISTS movie;

USE movie;

CREATE TABLE IF NOT EXISTS `video` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `video_url` varchar(255) NOT NULL,
    `cover_url` varchar(255) NOT NULL,
    `title` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

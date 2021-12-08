-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2021 at 11:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `cloudvistaticket`
--

CREATE TABLE `cloudvistaticket` (
  `id` int(11) NOT NULL,
  `c_date` varchar(255) DEFAULT NULL,
  `c_time` varchar(255) DEFAULT NULL,
  `ticket` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `agent_id` varchar(255) DEFAULT NULL,
  `campaign` varchar(255) DEFAULT NULL,
  `cust_message` text DEFAULT NULL,
  `sup_message` text DEFAULT NULL,
   `assign_by` varchar(255) DEFAULT NULL,
  
  `status` varchar(50) NOT NULL DEFAULT 'Open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Indexes for table `cloudvistaticket`
--
ALTER TABLE `cloudvistaticket`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for table `cloudvistaticket`
--
ALTER TABLE `cloudvistaticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

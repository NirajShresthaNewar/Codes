SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Database: `wbillingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `email`, `phone_number`) VALUES
(1, 'admin1', 'Password@123', 'admin@gmail.com', '9849878988');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reading_id` int(11) DEFAULT NULL,
  `tariff_id` int(11) DEFAULT NULL,
  `units` int(11) NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` enum('paid','unpaid') DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `user_id`, `reading_id`, `tariff_id`, `units`, `total_amount`, `payment_status`) VALUES
(3, 1, 10, 1, 100, 2000.00, 'unpaid'),
(4, 2, 11, 1, 200, 4000.00, 'unpaid'),
(5, 1, 12, 1, 100, 2000.00, 'unpaid'),
(6, 1, 14, 1, 1600, 32000.00, 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complain_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `complain_text` varchar(20) DEFAULT NULL,
  `complain_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `resolved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complain_id`, `user_id`, `complain_text`, `complain_date`, `resolved`) VALUES
(1, NULL, NULL, '2024-04-28 05:53:43', 0),
(2, NULL, NULL, '2024-04-28 05:57:40', 0),
(3, NULL, NULL, '2024-04-28 06:01:58', 0),
(4, NULL, NULL, '2024-04-28 06:26:56', 0),
(5, 2, NULL, '2024-04-28 06:33:28', 1),
(6, 2, 'hi', '2024-04-28 06:42:21', 1),
(7, 2, NULL, '2024-04-30 07:16:04', 0),
(8, 2, 'kkk', '2024-04-30 07:20:03', 0),
(9, 2, 'kk', '2024-04-30 07:20:20', 0),
(10, 2, NULL, '2024-04-30 07:22:04', 1),
(11, 2, NULL, '2024-04-30 07:39:52', 1),
(12, 2, NULL, '2024-04-30 07:40:08', 1),
(13, 2, NULL, '2024-04-30 07:41:03', 1),
(14, 2, NULL, '2024-04-30 07:41:09', 1),
(15, 2, NULL, '2024-04-30 07:55:29', 1),
(16, 2, 'kkk', '2024-04-30 07:56:47', 1),
(17, 2, 'kkk', '2024-04-30 07:58:22', 1),
(18, 2, 'hi', '2024-04-30 08:04:53', 1),
(19, 2, 'hi', '2024-04-30 08:06:34', 1),
(20, 2, 'niraj', '2024-04-30 08:20:29', 1),
(21, 2, 'hoo', '2024-05-03 11:21:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `meter_reader`
--

CREATE TABLE `meter_reader` (
  `reader_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meter_reader`
--

INSERT INTO `meter_reader` (`reader_id`, `admin_id`, `username`, `password`, `email`, `phone_number`) VALUES
(1, 1, 'reader1', 'Password@123', 'reader@gmail.com', '9846985489'),
(3, 1, 'bcaii', '123456789', 'reader1@gmail.com', '982132456');

-- --------------------------------------------------------

--
-- Table structure for table `meter_reader_user`
--

CREATE TABLE `meter_reader_user` (
  `reader_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meter_reading`
--

CREATE TABLE `meter_reading` (
  `reading_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `previous_reading_date` date DEFAULT NULL,
  `previous_reading_value` decimal(10,2) DEFAULT NULL,
  `current_reading_date` date DEFAULT NULL,
  `current_reading_value` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meter_reading`
--

INSERT INTO `meter_reading` (`reading_id`, `user_id`, `previous_reading_date`, `previous_reading_value`, `current_reading_date`, `current_reading_value`) VALUES
(1, 1, '2024-03-30', 100.00, '2024-04-30', 200.00),
(3, 1, '2024-04-30', 200.00, '2024-04-16', 300.00),
(4, 1, '2024-04-30', 200.00, '2024-04-19', 300.00),
(5, 1, '2024-04-30', 200.00, '2024-04-19', 300.00),
(6, 1, '2024-04-30', 200.00, '2024-04-19', 300.00),
(8, 2, '2024-03-30', 100.00, '2024-04-30', 200.00),
(9, 2, '2024-04-30', 200.00, '2024-04-28', 300.00),
(10, 1, '2024-04-30', 200.00, '2024-05-02', 300.00),
(11, 2, '2024-04-30', 200.00, '2024-05-02', 400.00),
(12, 1, '2024-05-02', 300.00, '2024-05-02', 400.00),
(13, 1, '2024-05-02', 400.00, '2024-05-03', 0.00),
(14, 1, '2024-05-02', 400.00, '2024-05-03', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `payment_record`
--

CREATE TABLE `payment_record` (
  `payment_id` int(11) NOT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `payable_amount` decimal(10,2) DEFAULT NULL,
  `payment_mode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tariff`
--

CREATE TABLE `tariff` (
  `tariff_id` int(11) NOT NULL,
  `grace_period_days` int(11) DEFAULT NULL,
  `additional_charge_rate` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tariff`
--

INSERT INTO `tariff` (`tariff_id`, `grace_period_days`, `additional_charge_rate`) VALUES
(1, 30, 20.00),
(2, 60, 25.00),
(3, 90, 30.00),
(4, 100, 32.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `contact_num` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `admin_id`, `username`, `password`, `email`, `phone_number`, `address`, `otp`, `contact_num`) VALUES
(1, NULL, 'username', '123456789', 'aaa@gmail.com', NULL, 'ITAHARI', 6507, '9807059177'),
(2, NULL, 'username', 'Password@123', 'ngg12581@gmail.com', NULL, 'rameshowor', 9952, '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tariff_id` (`tariff_id`),
  ADD KEY `fk_Reading_id` (`reading_id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complain_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `meter_reader`
--
ALTER TABLE `meter_reader`
  ADD PRIMARY KEY (`reader_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `meter_reader_user`
--
ALTER TABLE `meter_reader_user`
  ADD PRIMARY KEY (`reader_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `meter_reading`
--
ALTER TABLE `meter_reading`
  ADD PRIMARY KEY (`reading_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payment_record`
--
ALTER TABLE `payment_record`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`tariff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `meter_reader`
--
ALTER TABLE `meter_reader`
  MODIFY `reader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1672;

--
-- AUTO_INCREMENT for table `meter_reading`
--
ALTER TABLE `meter_reading`
  MODIFY `reading_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment_record`
--
ALTER TABLE `payment_record`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tariff`
--
ALTER TABLE `tariff`
  MODIFY `tariff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`tariff_id`) REFERENCES `tariff` (`tariff_id`),
  ADD CONSTRAINT `fk_Reading_id` FOREIGN KEY (`reading_id`) REFERENCES `meter_reading` (`reading_id`);

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `complain_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `meter_reader`
--
ALTER TABLE `meter_reader`
  ADD CONSTRAINT `meter_reader_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `meter_reader_user`
--
ALTER TABLE `meter_reader_user`
  ADD CONSTRAINT `meter_reader_user_ibfk_1` FOREIGN KEY (`reader_id`) REFERENCES `meter_reader` (`reader_id`),
  ADD CONSTRAINT `meter_reader_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `meter_reading`
--
ALTER TABLE `meter_reading`
  ADD CONSTRAINT `meter_reading_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `payment_record`
--
ALTER TABLE `payment_record`
  ADD CONSTRAINT `payment_record_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);
COMMIT;

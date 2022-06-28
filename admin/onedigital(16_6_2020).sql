-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 09:32 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onedigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `acct_details`
--

CREATE TABLE `acct_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `currently_invested` int(11) NOT NULL,
  `available_bal` int(11) NOT NULL,
  `total_withdrawal` int(11) NOT NULL,
  `ref_bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acct_details`
--

INSERT INTO `acct_details` (`id`, `user_id`, `currently_invested`, `available_bal`, `total_withdrawal`, `ref_bonus`) VALUES
(1, 1, 0, 2500, 0, 0),
(2, 2, 0, 0, 0, 0),
(32, 3, 0, 0, 0, 0),
(33, 4, 0, 0, 0, 0),
(34, 5, 0, 0, 0, 0),
(35, 6, 0, 0, 0, 0),
(37, 8, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `btc_equiv` decimal(10,4) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id`, `user_id`, `plan`, `date`, `amount`, `btc_equiv`, `status`) VALUES
(7, 2, 'Basic Plan', '2020-06-11', 230, '0.0230', 'Pending'),
(8, 2, 'Professional Plan', '2020-06-11', 500, '0.0500', 'Pending'),
(9, 2, 'Secondary Plan', '2020-06-11', 270, '0.0270', 'Pending'),
(10, 1, 'Professional Plan', '2020-06-11', 5000, '0.5000', 'Pending'),
(11, 1, 'Basic Plan', '2020-06-11', 50, '0.0050', 'Pending'),
(12, 1, 'Professional Plan', '2020-06-11', 900, '0.0900', 'Pending'),
(13, 1, 'Basic Plan', '2020-06-13', 230, '0.0230', 'Pending'),
(14, 1, 'Basic Plan', '2020-06-13', 200, '0.0200', 'Pending'),
(15, 1, 'Professional Plan', '2020-06-13', 120, '0.0120', 'Pending'),
(16, 1, 'A.I Special Plan', '2020-06-13', 100, '0.0100', 'Pending'),
(17, 1, 'Secondary Plan', '2020-06-13', 230, '0.0230', 'Pending'),
(18, 1, 'A.I Special Plan', '2020-06-13', 100, '0.0100', 'Pending'),
(19, 1, 'Professional Plan', '2020-06-15', 200, '0.0200', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `amount` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `earnings`
--

INSERT INTO `earnings` (`id`, `user_id`, `type`, `date`, `status`, `amount`) VALUES
(8, 1, '', '0000-00-00', '', 0),
(9, 2, '', '0000-00-00', '', 0),
(39, 3, '', '0000-00-00', '', 0),
(40, 4, '', '0000-00-00', '', 0),
(41, 5, '', '0000-00-00', '', 0),
(42, 6, '', '0000-00-00', '', 0),
(44, 8, '', '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `investment`
--

CREATE TABLE `investment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL DEFAULT 'Fund Deposit',
  `amount` int(11) NOT NULL,
  `btc_eq` decimal(10,0) NOT NULL,
  `status` varchar(100) NOT NULL,
  `mode_of_pay` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investment`
--

INSERT INTO `investment` (`id`, `user_id`, `plan`, `type`, `amount`, `btc_eq`, `status`, `mode_of_pay`, `date`) VALUES
(1, 1, '', '', 0, '0', '', '', '0000-00-00'),
(2, 2, '', '', 0, '0', '', '', '0000-00-00'),
(32, 3, '', '', 0, '0', '', '', '0000-00-00'),
(33, 4, '', '', 0, '0', '', '', '0000-00-00'),
(34, 5, '', '', 0, '0', '', '', '0000-00-00'),
(35, 6, '', '', 0, '0', '', '', '0000-00-00'),
(37, 8, '', '', 0, '0', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `currently_invested` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`id`, `user_id`, `fname`, `user`, `email`, `reg_date`, `currently_invested`) VALUES
(21, 2, 'Final One', 'final', 'final@gmail.com', '2020-06-14', 0),
(23, 1, 'This Worked', 'ThisWorked', 'work@gmail.com', '2020-06-15', 0),
(24, 1, 'kskfsdkfskjfkj', 'dfssf', 'ddsdfs@gmail.com', '2020-06-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `secret_q` text NOT NULL,
  `secret_ans` text NOT NULL,
  `bit_wallet` varchar(100) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `user`, `pass`, `email`, `secret_q`, `secret_ans`, `bit_wallet`, `reg_date`) VALUES
(1, 'Lawrence Madu', 'Lawrence', '25d55ad283aa400af464c76d713c07ad', 'law@gmail.com', 'Whats ur hobby', 'Programming', '933115555745656dgdfgsdfsiiooo', '2020-06-10'),
(2, 'Jack Sparrow', 'Jack', '202cb962ac59075b964b07152d234b70', 'jack@gmail.com', 'Whats ur hobby', 'Otedola', 'rewrwetgfczxdcscxczczzzczczcz', '2020-06-11'),
(3, 'Normal User', 'Normal', '202cb962ac59075b964b07152d234b70', 'normal@gmail.com', 'Who is ur bestie', 'Yanga', 'fsfsdf666dfdfdfdfd22', '2020-06-15'),
(4, 'Another Nomal', 'NOMRSSS', '202cb962ac59075b964b07152d234b70', 'fdfs@gmail.com', 'dfdfdfs', 'sdfdf', 'dsfdf', '2020-06-15'),
(5, 'This Worked', 'ThisWorked', '202cb962ac59075b964b07152d234b70', 'work@gmail.com', 'Who is your zaddy', 'Otedola', 'dfsdfsf669sdfsdf1sf4dfs', '2020-06-15'),
(6, 'kskfsdkfskjfkj', 'dfssf', '202cb962ac59075b964b07152d234b70', 'ddsdfs@gmail.com', 'dsdfs', 'dfs', 'dsfsf', '2020-06-15'),
(8, 'lets see', 'jdjdf', '202cb962ac59075b964b07152d234b70', 'sssfdf@gmail.com', 'dfdfsdf', 'sfsf', 'fsd21fdfdfdfdf', '2020-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`id`, `user_id`, `amount`, `status`, `date`) VALUES
(13, 1, 250, 'Pending', '2020-06-13'),
(14, 1, 500, 'Pending', '2020-06-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acct_details`
--
ALTER TABLE `acct_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `investment`
--
ALTER TABLE `investment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user` (`user`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acct_details`
--
ALTER TABLE `acct_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `investment`
--
ALTER TABLE `investment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acct_details`
--
ALTER TABLE `acct_details`
  ADD CONSTRAINT `acct_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `earnings`
--
ALTER TABLE `earnings`
  ADD CONSTRAINT `earnings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `investment`
--
ALTER TABLE `investment`
  ADD CONSTRAINT `investment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `referral`
--
ALTER TABLE `referral`
  ADD CONSTRAINT `referral_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD CONSTRAINT `withdrawal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

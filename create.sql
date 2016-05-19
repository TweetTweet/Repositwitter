-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 19, 2016 at 03:35 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `testdb`
--
-- testdb is needed
-- testdb is needed
-- testdb is needed
-- testdb is needed
 

-- --------------------------------------------------------

--
-- Table structure for table `symbols`
--

CREATE TABLE `symbols` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL DEFAULT '',
  `animal` varchar(255) NOT NULL DEFAULT '',
  `cur_date` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symbols`
--

INSERT INTO `symbols` (`id`, `country`, `animal`, `cur_date`) VALUES
(110, 'test', 'asfiujansdfkvasdg', '2016-05-19 14:31:03'),
(111, 'test', 'helloworld', '2016-05-19 14:37:21'),
(112, 'bird', 'hello', '2016-05-19 15:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `email`) VALUES
(9, 'test', '238534ce0d98434ba64660fac26b98008b48069331461cb2de27c254d8ed15f3', '401a40b65ad4cd7c', 'danieltest@gmail.com'),
(10, 'test1', '1980d3b8a3dfeb27fe535c760f64f51f08ca7d0f96bb614b84587ad63233f046', '3579528921829998', 'danieltest1@gmail.com'),
(11, 'test2', '336ea3c4e39c0615b1e05723f5e09dd319bb2d8c2f50de715e20e7f5e6ba990f', '749d09e74b62ead', 'test2@eads.com'),
(12, 'bird', '962c4a3b8c46fb652f2463067130fff9b4be28e9069058005998018c25ce6014', '3c1a53d2587ffcb2', 'hello@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `symbols`
--
ALTER TABLE `symbols`
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
-- AUTO_INCREMENT for table `symbols`
--
ALTER TABLE `symbols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
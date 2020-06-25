-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 08:29 AM
-- Server version: 5.5.21
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blockchain_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_node`
--

CREATE TABLE IF NOT EXISTS `add_node` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `node_id` int(10) NOT NULL,
  `node_name` varchar(50) NOT NULL,
  `node_ip_address` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) 

--
-- Dumping data for table `add_node`
--



-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `block_id` varchar(100) NOT NULL,
  `hash_of_blockid` varchar(300) NOT NULL,
  `id_of_previousblock` varchar(50) NOT NULL,
  `hash_of_previousblock` varchar(500) NOT NULL,
  `encrypted_data` varchar(500) NOT NULL,
  `hash_of_data` varchar(500) NOT NULL,
  `related_node` varchar(30) NOT NULL,
  `related_db` varchar(20) NOT NULL,
  `related_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) 

--
-- Dumping data for table `block`
--


-- --------------------------------------------------------

--
-- Table structure for table `distribute`
--

CREATE TABLE IF NOT EXISTS `distribute` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `did` int(10) NOT NULL,
  `exam_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `node_id` int(10) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) 

--
-- Dumping data for table `distribute`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_admin`
--

CREATE TABLE IF NOT EXISTS `exam_admin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `exam_id` int(20) NOT NULL,
  `exam_name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) 

--
-- Dumping data for table `exam_admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `exam_subject`
--

CREATE TABLE IF NOT EXISTS `exam_subject` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `paper_id` int(20) NOT NULL,
  `exam_id` int(20) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `exam_date` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) 

--
-- Dumping data for table `exam_subject`
--


-- --------------------------------------------------------

--
-- Table structure for table `exam_subject_node`
--

CREATE TABLE IF NOT EXISTS `exam_subject_node` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `exam_id` int(20) NOT NULL,
  `sub_id` int(20) NOT NULL,
  `node_id` int(20) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) 

--
-- Dumping data for table `exam_subject_node`
--


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ipaddr` varchar(20) NOT NULL,
  `pass_hash` varchar(100) NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `createdDate` datetime DEFAULT NULL,
  `updatedBy` varchar(20) NOT NULL,
  `updatedDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) 

--
-- Dumping data for table `login`
--


-- --------------------------------------------------------

--
-- Table structure for table `node_security_key`
--

CREATE TABLE IF NOT EXISTS `node_security_key` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `keyid` int(20) NOT NULL,
  `nodeid` int(20) NOT NULL,
  `algorithm` varchar(30) NOT NULL,
  `key_type` varchar(30) NOT NULL,
  `key_value` varchar(20) NOT NULL,
  `type` varchar(30) NOT NULL,
  `subtype` varchar(30) NOT NULL,
  `createdby` varchar(30) NOT NULL,
  `createddate` datetime NOT NULL,
  `updatedby` varchar(20) NOT NULL,
  `updateddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) 

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `question_id` int(20) NOT NULL,
  `exam_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `node_id` int(20) NOT NULL,
  `question` varchar(120) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) 

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE IF NOT EXISTS `student_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) 

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

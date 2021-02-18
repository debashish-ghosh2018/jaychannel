-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2021 at 04:27 AM
-- Server version: 10.3.27-MariaDB-log-cll-lve
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
-- Database: `digiioux_jaychannel`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `banner_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'First Banner', 'xb0Jwvw4orzkZGOtCmSEosiF1ntYjIZm9aa8a2Ia.jpeg', 1, '2021-02-10 23:22:04', '2021-02-10 23:26:49'),
(2, 'Second Banner', 'ksK0FQyp5QxdBGQoYPthRGcRzQGWKIDRPt7t1Ump.jpeg', 1, '2021-02-10 23:28:09', '2021-02-10 23:28:45'),
(3, 'Third Banner', 'CrYH8iBQ4P5bAieuLcLQXoI5ofY80G0gC2KHMLCb.jpeg', 1, '2021-02-10 23:29:20', '2021-02-10 23:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `credit_amount` float(10,2) NOT NULL,
  `auto_refill` tinyint(1) NOT NULL DEFAULT 0,
  `card_no` varchar(255) NOT NULL,
  `exp_from` varchar(255) NOT NULL,
  `exp_to` varchar(255) NOT NULL,
  `ccv_no` int(5) NOT NULL,
  `flightdeck_login` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `offline_invoice` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `jaymobile_users` varchar(255) DEFAULT NULL,
  `jaypad_users` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_details`
--

INSERT INTO `card_details` (`user_id`, `user_name`, `address`, `city`, `state`, `zipcode`, `tel`, `email`, `credit_amount`, `auto_refill`, `card_no`, `exp_from`, `exp_to`, `ccv_no`, `flightdeck_login`, `created_at`, `updated_at`, `offline_invoice`, `logo`, `jaymobile_users`, `jaypad_users`) VALUES
(13, 'Kash Enterprise', 'UNITED POINT RESIDENCE (RESIDENSI BERPADU)', NULL, NULL, NULL, '23434343', 'kashif.mh2u@gmail.com', 45.00, 0, '1212121', '1', '26', 23, 'test@test.com', '2021-01-27 16:10:12', '2021-01-27 16:10:12', '', '', '', ''),
(18, 'Ammar', 'PV-21, KL', 'SF', 'SF', '2500', '090909090', 'unisolutionz@yahoo.com', 555.00, 0, '4545454545454454', '1', '25', 454, 'test@test.com', '2021-01-27 16:07:19', '2021-01-27 16:07:19', '', '', '', ''),
(19, 'asdsaD', 'adwaferg', NULL, NULL, NULL, '89495901455', 'priyanka12323ladhani@gmail.com', 122233.00, 0, '1234567890122334', '2', '26', 123, 'qwedrftgyhu', '2021-01-28 09:50:22', '2021-01-28 09:50:22', '', '', '', ''),
(24, 'Dev', 'Bkn', NULL, NULL, NULL, '123123', 'dev@gmail.com', 111.00, 0, '1234567890122334', '1', '25', 111, '11', '2021-01-29 18:13:34', '2021-01-29 18:13:34', NULL, NULL, '111', '111'),
(27, 'demo', 'demo', NULL, NULL, NULL, '123123', 'demoo@gmail.com', 100.00, 0, '123123123113', '1', '25', 123, NULL, '2021-01-31 08:57:09', '2021-01-31 08:57:09', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `class_booked`
--

CREATE TABLE `class_booked` (
  `id` bigint(20) NOT NULL,
  `booking_no` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `credit_available` int(5) NOT NULL,
  `credit_used` int(5) NOT NULL,
  `credit_returned` int(5) NOT NULL DEFAULT 0,
  `session_completed` tinyint(1) NOT NULL DEFAULT 0,
  `session_cancelled` tinyint(1) NOT NULL DEFAULT 0,
  `session_cancelled_datetime` datetime DEFAULT NULL,
  `session_cancelled_reason` text DEFAULT NULL,
  `session_approved` tinyint(1) NOT NULL DEFAULT 0,
  `booking_status` tinyint(1) NOT NULL DEFAULT 1,
  `booking_person_name` varchar(255) NOT NULL,
  `booking_person_email` varchar(255) NOT NULL,
  `booking_person_phone` varchar(255) NOT NULL,
  `booking_person_address` text NOT NULL,
  `booking_person_country` varchar(255) NOT NULL,
  `booking_person_city` varchar(255) NOT NULL,
  `booking_person_state` varchar(255) NOT NULL,
  `booking_person_postalcode` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_booked`
--

INSERT INTO `class_booked` (`id`, `booking_no`, `user_id`, `credit_available`, `credit_used`, `credit_returned`, `session_completed`, `session_cancelled`, `session_cancelled_datetime`, `session_cancelled_reason`, `session_approved`, `booking_status`, `booking_person_name`, `booking_person_email`, `booking_person_phone`, `booking_person_address`, `booking_person_country`, `booking_person_city`, `booking_person_state`, `booking_person_postalcode`, `created_at`, `updated_at`) VALUES
(3, '601806ad36544', 18, 500, 10, 0, 0, 0, NULL, NULL, 0, 1, 'Muhammad Kashif', 'unisolutionz@yahoo.com', '+60182044350', 'A-13-05, Setapak', 'United States of America', 'Kuala Lumpur', 'Kuala Lumpur', '50450', '2021-02-01 13:48:29', '2021-02-01 13:48:29'),
(4, '601807069f5ca', 18, 490, 15, 5, 0, 0, NULL, NULL, 0, 1, 'Muhammad Kashif', 'unisolutionz@yahoo.com', '+60182044350', 'A-13-05, Setapak', 'United States of America', 'Kuala Lumpur', 'Kuala Lumpur', '50450', '2021-02-01 13:49:58', '2021-02-17 00:37:11'),
(5, '60183469c76a6', 15, 500, 15, 0, 0, 0, NULL, NULL, 0, 1, 'Debashish Ghosh', 'dev.test.debashish@gmail.com', '+919830185746', 'Not Applicable', 'Argentina', 'kolkata', 'West Bengal', '700034', '2021-02-01 17:03:37', '2021-02-01 17:03:37'),
(6, '601e32020e376', 13, 1500, 15, 0, 0, 0, NULL, NULL, 0, 1, 'Khaled Masud', 'kashif.mh2u@gmail.com', '0182044350', 'A-13-15, Pangsapuri Berembang Indah', 'United States of America', 'Kuala Lumpur', 'Kuala Lumpur', '68000', '2021-02-06 06:06:58', '2021-02-06 06:06:58'),
(7, '602c658582b8e', 18, 480, 10, 10, 0, 0, NULL, NULL, 0, 1, 'Ammar', 'unisolutionz@yahoo.com', '090909090', 'PV-21, KL', 'United States of America', 'SF', 'SF', '2500', '2021-02-17 00:38:29', '2021-02-18 04:42:36'),
(8, '602ca98bbec46', 18, 480, 10, 10, 0, 0, NULL, NULL, 0, 1, 'Ammar', 'unisolutionz@yahoo.com', '090909090', 'PV-21, KL', 'United States of America', 'SF', 'SF', '2500', '2021-02-17 05:28:43', '2021-02-17 11:11:21'),
(9, '602ca9938683c', 18, 480, 10, 10, 0, 0, NULL, NULL, 0, 1, 'Ammar', 'unisolutionz@yahoo.com', '090909090', 'PV-21, KL', 'United States of America', 'SF', 'SF', '2500', '2021-02-17 05:28:51', '2021-02-17 11:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `class_booking_details`
--

CREATE TABLE `class_booking_details` (
  `id` bigint(20) NOT NULL,
  `class_booking_id` bigint(20) NOT NULL,
  `session_start_datetime` datetime DEFAULT NULL,
  `session_end_datetime` datetime DEFAULT NULL,
  `no_of_participants_per_class` int(5) DEFAULT NULL,
  `registered_participants` int(5) DEFAULT NULL,
  `canceled_participants` int(5) NOT NULL DEFAULT 0,
  `no_of_participants_attended` int(5) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_booking_details`
--

INSERT INTO `class_booking_details` (`id`, `class_booking_id`, `session_start_datetime`, `session_end_datetime`, `no_of_participants_per_class`, `registered_participants`, `canceled_participants`, `no_of_participants_attended`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, NULL, 10, 15, 0, NULL, 2, '2021-02-01 13:48:29', '2021-02-13 05:27:08'),
(2, 4, NULL, NULL, 5, 25, 5, NULL, 1, '2021-02-01 13:49:58', '2021-02-17 00:37:11'),
(3, 5, NULL, NULL, 5, 25, 0, NULL, 1, '2021-02-01 17:03:37', '2021-02-01 17:03:37'),
(4, 6, NULL, NULL, 5, 30, 0, NULL, 1, '2021-02-06 06:06:58', '2021-02-06 06:06:58'),
(5, 7, NULL, NULL, 10, 15, 10, NULL, 2, '2021-02-17 00:38:29', '2021-02-18 04:42:36'),
(6, 8, NULL, NULL, 5, 15, 15, NULL, 1, '2021-02-17 05:28:43', '2021-02-17 11:11:21'),
(7, 9, NULL, NULL, 5, 15, 15, NULL, 1, '2021-02-17 05:28:51', '2021-02-17 11:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `class_cancellation_history`
--

CREATE TABLE `class_cancellation_history` (
  `id` bigint(20) NOT NULL,
  `class_booking_id` bigint(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `current_participants` int(5) NOT NULL,
  `cancel_participants` int(5) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_cancellation_history`
--

INSERT INTO `class_cancellation_history` (`id`, `class_booking_id`, `course_id`, `user_id`, `current_participants`, `cancel_participants`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 18, 25, 5, '2021-02-17 00:37:11', '2021-02-17 00:37:11'),
(7, 8, 1, 18, 15, 15, '2021-02-17 11:11:21', '2021-02-17 11:11:21'),
(8, 9, 1, 18, 15, 13, '2021-02-17 11:16:43', '2021-02-17 11:16:43'),
(9, 9, 1, 18, 2, 2, '2021-02-17 11:17:39', '2021-02-17 11:17:39'),
(10, 7, 2, 18, 15, 10, '2021-02-18 04:42:36', '2021-02-18 04:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `content_types`
--

CREATE TABLE `content_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_types`
--

INSERT INTO `content_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Arts & Crafts', '2021-01-24 19:38:09', '2021-02-05 16:00:39'),
(2, 'Food & Diet', '2021-01-24 19:38:34', '2021-01-24 19:38:34'),
(3, 'Fitness & Mindfullness', '2021-01-24 19:38:54', '2021-01-24 19:38:54'),
(4, 'Memory Health', '2021-01-24 19:39:14', '2021-01-24 19:39:14'),
(5, 'Outdoor', '2021-01-24 19:41:12', '2021-01-24 19:41:12'),
(6, '@Work', '2021-01-24 19:41:25', '2021-01-24 19:41:25'),
(7, 'Education & Family', '2021-01-24 19:41:42', '2021-01-24 19:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day_monday` tinyint(1) NOT NULL DEFAULT 0,
  `day_tuesday` tinyint(1) NOT NULL DEFAULT 0,
  `day_wednesday` tinyint(1) NOT NULL DEFAULT 0,
  `day_thursday` tinyint(1) NOT NULL DEFAULT 0,
  `day_friday` tinyint(1) NOT NULL DEFAULT 0,
  `day_saturday` tinyint(1) NOT NULL DEFAULT 0,
  `day_sunday` tinyint(1) NOT NULL DEFAULT 0,
  `re_occur` tinyint(1) NOT NULL DEFAULT 0,
  `credits` int(5) NOT NULL DEFAULT 0,
  `class_size` int(5) NOT NULL DEFAULT 0,
  `join_by` varchar(50) NOT NULL,
  `content_type_id` bigint(20) DEFAULT NULL,
  `about_class` text DEFAULT NULL,
  `equipment_require` text DEFAULT NULL,
  `hero_image` varchar(255) DEFAULT NULL,
  `browser_image_1` varchar(255) DEFAULT NULL,
  `browser_image_2` varchar(255) DEFAULT NULL,
  `video_clip` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `start_date`, `end_date`, `start_time`, `end_time`, `day_monday`, `day_tuesday`, `day_wednesday`, `day_thursday`, `day_friday`, `day_saturday`, `day_sunday`, `re_occur`, `credits`, `class_size`, `join_by`, `content_type_id`, `about_class`, `equipment_require`, `hero_image`, `browser_image_1`, `browser_image_2`, `video_clip`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Online Marketing', '2021-02-10', '2021-02-24', '04:02:00', '02:58:00', 0, 0, 1, 1, 1, 0, 0, 1, 5, 11, 'Audio', 7, 'The internet has changed the way businesses are conducted. You can now reach out to customers from all over the world easily if you know how to leverage on the internet\'s full potential.\r\nIn 12 weeks, master in-demand skills and obtain a 360-degree understanding of the digital marketing ecosystem. Receive real-world experience in digital marketing that will ready you for a career in digital marketing or accelerate your company’s growth.', 'Laptop and Internet', 'tiQ2l1KVi4Qemtz4qP6aQ4gnW2W7nExLq6wh01NM.png', '897u1L7P8hgXohQjuZYM8wmW4wQ2KUrNNRzUSmfs.jpeg', 'xdGwrTKqgFQeogxzGl8RM8z3Fgw5VnlDoDT9RFln.jpeg', 'mAScE4JmxNYsaAGoPX0jnaM5dVzZZnx5tJfPIzDh.mp4', 12, '2021-01-24 10:00:45', '2021-02-01 19:18:17'),
(2, 'Digital Marketing', '2021-02-16', '2021-01-30', '03:04:00', '18:05:00', 1, 1, 1, 1, 1, 1, 1, 1, 10, 21, 'Audio', 7, 'Learn Digital Marketing course and become a pro. Build effective strategies using digital channels like social media, search engines, email, and websites to escalate business.\r\n32 Hours Classroom & Online Sessions\r\n3 Months of Live Project\r\n100% Job Assistance\r\n10 International Certifications\r\nReceive Certificate from Top University - UTM, Malaysia\r\nIndustry Placement Training', 'Computer\r\nInternet', 'fVTlbYsY9q7wq8SRg5jzjONRI7Iaz8OT314rQAU5.jpeg', 'WEEBmHamBvPXGT8VTLwzMQzoj9IxHZGEGINmeIhE.jpeg', 'EOWgbcHaWsUm4USUoDpWmRYX4PqgQkdLdRdz9C8O.jpeg', 'GL7Hh3u5N2VNqEkDzomhDZjlLYitdT2CuGtuLAbK.mp4', 12, '2021-01-25 08:05:27', '2021-02-01 19:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Fixed','Variable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Fixed',
  `cost_amount` float(10,2) NOT NULL DEFAULT 0.00,
  `points` int(5) UNSIGNED NOT NULL DEFAULT 0,
  `is_for_sale` tinyint(1) NOT NULL DEFAULT 1,
  `is_auto_renewal` tinyint(1) NOT NULL DEFAULT 0,
  `homepage_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`id`, `title`, `content`, `type`, `cost_amount`, `points`, `is_for_sale`, `is_auto_renewal`, `homepage_image`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(2, '200 Credits', 'Buy 200 credit to use any time.', 'Fixed', 200.00, 500, 1, 1, 'hCw55mzpEGLTYSu9ZZcLP85JRmT7bccq1qWM6YxB.png', 1, NULL, 1, '2021-01-21 11:18:20', '2021-02-06 10:33:04'),
(3, '600 Credits', 'Buy 600 Credits now.', 'Fixed', 600.00, 1000, 1, 1, 'o4btIsSXKmpDCkcSiQQj9x25ZBjfyYEyDLJqphtY.png', 1, NULL, 1, '2021-01-21 11:19:07', '2021-01-28 07:33:26'),
(4, '500', 'Buy 500 credits in 1000', 'Fixed', 1000.00, 500, 1, 0, '1uxszG84Ll73kDoHrX6Er3knL385J64cu2ZPfHK0.png', 1, NULL, 1, '2021-01-28 07:34:51', '2021-01-28 07:34:51'),
(5, 'Enterprise', 'Get a quote from us. Plenty of bonus for getting credits in bulk.', 'Fixed', 0.00, 1, 0, 0, 'ZGlFN1R3kqG4Z38aww23QqW1mEZctOZ6fc7AjD3a.jpeg', 1, NULL, 1, '2021-01-28 07:36:42', '2021-01-28 07:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `created_at`, `updated_at`, `content`, `name`, `subject`, `email_key`) VALUES
(1, NULL, NULL, '<!DOCTYPE html>\r\n                <html lang=\"en\">\r\n                <head>\r\n                    <meta charset=\"utf-8\">\r\n                    <meta name=\"viewport\" content=\"width=device-width\">\r\n                    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> \r\n                    <meta name=\"x-apple-disable-message-reformatting\">\r\n                    <title>Example</title>\r\n                    <style>\r\n                        body {\r\n                            background-color:#fff;\r\n                            color:#222222;\r\n                            margin: 0px auto;\r\n                            padding: 0px;\r\n                            height: 100%;\r\n                            width: 100%;\r\n                            font-weight: 400;\r\n                            font-size: 15px;\r\n                            line-height: 1.8;\r\n                        }\r\n                        .continer{\r\n                            width:400px;\r\n                            margin-left:auto;\r\n                            margin-right:auto;\r\n                            background-color:#efefef;\r\n                            padding:30px;\r\n                        }\r\n                        .btn{\r\n                            padding: 5px 15px;\r\n                            display: inline-block;\r\n                        }\r\n                        .btn-primary{\r\n                            border-radius: 3px;\r\n                            background: #0b3c7c;\r\n                            color: #fff;\r\n                            text-decoration: none;\r\n                        }\r\n                        .btn-primary:hover{\r\n                            border-radius: 3px;\r\n                            background: #4673ad;\r\n                            color: #fff;\r\n                            text-decoration: none;\r\n                        }\r\n                    </style>\r\n                </head>\r\n                <body>\r\n                    <div class=\"continer\">\r\n                        <h1>Lorem ipsum dolor</h1>\r\n                        <h4>Ipsum dolor cet emit amet</h4>\r\n                        <p>\r\n                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea <strong>commodo consequat</strong>. \r\n                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\n                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                        </p>\r\n                        <h4>Ipsum dolor cet emit amet</h4>\r\n                        <p>\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <a href=\"#\">tempor incididunt ut labore</a> et dolore magna aliqua.\r\n                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n                        </p>\r\n                        <h4>Ipsum dolor cet emit amet</h4>\r\n                        <p>\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\n                        </p>\r\n                        <a href=\"#\" class=\"btn btn-primary\">Lorem ipsum dolor</a>\r\n                        <h4>Ipsum dolor cet emit amet</h4>\r\n                        <p>\r\n                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n                            Ut enim ad minim veniam, quis nostrud exercitation <a href=\"#\">ullamco</a> laboris nisi ut aliquip ex ea commodo consequat. \r\n                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\n                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n                        </p>\r\n                    </div>\r\n                </body>\r\n                </html>', 'Example E-mail', 'Example E-mail', ''),
(2, '2021-02-10 10:56:38', '2021-02-10 10:56:38', '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width\">\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> \r\n    <meta name=\"x-apple-disable-message-reformatting\">\r\n    <title>Example</title>\r\n    <style>\r\n        body {\r\n            background-color:#fff;\r\n            color:#222222;\r\n            margin: 0px auto;\r\n            padding: 0px;\r\n            height: 100%;\r\n            width: 100%;\r\n            font-weight: 400;\r\n            font-size: 15px;\r\n            line-height: 1.8;\r\n        }\r\n        .continer{\r\n            width:400px;\r\n            margin-left:auto;\r\n            margin-right:auto;\r\n            background-color:#efefef;\r\n            padding:30px;\r\n        }\r\n        .btn{\r\n            padding: 5px 15px;\r\n            display: inline-block;\r\n        }\r\n        .btn-primary{\r\n            border-radius: 3px;\r\n            background: #0b3c7c;\r\n            color: #fff;\r\n            text-decoration: none;\r\n        }\r\n        .btn-primary:hover{\r\n            border-radius: 3px;\r\n            background: #4673ad;\r\n            color: #fff;\r\n            text-decoration: none;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div class=\"continer\">\r\n        <h1>Thank tou for subscribing with us</h1>\r\n        <p>\r\n            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n             Ut enim ad minim veniam, quis nostrud exercitation <a href=\"#\">ullamco</a> laboris nisi ut aliquip ex ea commodo consequat. \r\n             Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\n             Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n        </p>\r\n    </div>\r\n</body>\r\n</html>', 'Subscription Response', 'Thank tou for subscribing with us', 'subscription_response'),
(3, '2021-02-10 10:59:10', '2021-02-10 10:59:10', '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width\">\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> \r\n    <meta name=\"x-apple-disable-message-reformatting\">\r\n    <title>Example</title>\r\n    <style>\r\n        body {\r\n            background-color:#fff;\r\n            color:#222222;\r\n            margin: 0px auto;\r\n            padding: 0px;\r\n            height: 100%;\r\n            width: 100%;\r\n            font-weight: 400;\r\n            font-size: 15px;\r\n            line-height: 1.8;\r\n        }\r\n        .continer{\r\n            width:400px;\r\n            margin-left:auto;\r\n            margin-right:auto;\r\n            background-color:#efefef;\r\n            padding:30px;\r\n        }\r\n        .btn{\r\n            padding: 5px 15px;\r\n            display: inline-block;\r\n        }\r\n        .btn-primary{\r\n            border-radius: 3px;\r\n            background: #0b3c7c;\r\n            color: #fff;\r\n            text-decoration: none;\r\n        }\r\n        .btn-primary:hover{\r\n            border-radius: 3px;\r\n            background: #4673ad;\r\n            color: #fff;\r\n            text-decoration: none;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div class=\"continer\">\r\n        <h4>Hi <username>, </h4><br/>\r\n        <h1>Thank you for registering with us</h1>\r\n        <p>\r\n            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n             Ut enim ad minim veniam, quis nostrud exercitation <a href=\"#\">ullamco</a> laboris nisi ut aliquip ex ea commodo consequat. \r\n             Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \r\n             Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n        </p>\r\n    </div>\r\n</body>\r\n</html>', 'User Registration', 'Your registration is successful', 'user_registration'),
(4, '2021-02-10 17:32:32', '2021-02-10 17:32:32', '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width\">\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> \r\n    <meta name=\"x-apple-disable-message-reformatting\">\r\n    <title>Example</title>\r\n    <style>\r\n        body {\r\n            background-color:#fff;\r\n            color:#222222;\r\n            margin: 0px auto;\r\n            padding: 0px;\r\n            height: 100%;\r\n            width: 100%;\r\n            font-weight: 400;\r\n            font-size: 15px;\r\n            line-height: 1.8;\r\n        }\r\n        .continer{\r\n            width:400px;\r\n            margin-left:auto;\r\n            margin-right:auto;\r\n            background-color:#efefef;\r\n            padding:30px;\r\n        }\r\n        .btn{\r\n            padding: 5px 15px;\r\n            display: inline-block;\r\n        }\r\n        .btn-primary{\r\n            border-radius: 3px;\r\n            background: #0b3c7c;\r\n            color: #fff;\r\n            text-decoration: none;\r\n        }\r\n        .btn-primary:hover{\r\n            border-radius: 3px;\r\n            background: #4673ad;\r\n            color: #fff;\r\n            text-decoration: none;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div class=\"continer\">\r\n        <h1>Please contact regarding following enquiry. Below are my contact details</h1>\r\n        <p>\r\n             <content>\r\n        </p>\r\n    </div>\r\n</body>\r\n</html>', 'Contact Us', 'Please contact regarding following enquiry', 'contact_us'),
(5, '2021-02-13 03:24:26', '2021-02-13 03:24:26', '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width\">\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> \r\n    <meta name=\"x-apple-disable-message-reformatting\">\r\n    <title>Example</title>\r\n    <style>\r\n        body {\r\n            background-color:#fff;\r\n            color:#222222;\r\n            margin: 0px auto;\r\n            padding: 0px;\r\n            height: 100%;\r\n            width: 100%;\r\n            font-weight: 400;\r\n            font-size: 15px;\r\n            line-height: 1.8;\r\n        }\r\n        .continer{\r\n            width:400px;\r\n            margin-left:auto;\r\n            margin-right:auto;\r\n            background-color:#efefef;\r\n            padding:30px;\r\n        }\r\n        .btn{\r\n            padding: 5px 15px;\r\n            display: inline-block;\r\n        }\r\n        .btn-primary{\r\n            border-radius: 3px;\r\n            background: #0b3c7c;\r\n            color: #fff;\r\n            text-decoration: none;\r\n        }\r\n        .btn-primary:hover{\r\n            border-radius: 3px;\r\n            background: #4673ad;\r\n            color: #fff;\r\n            text-decoration: none;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div class=\"continer\">\r\n        <p>\r\n           <content>\r\n        </p>\r\n    </div>\r\n</body>\r\n</html>', 'Admin Course Booking Notification', 'New Class Booking Details', 'admin_course_booking_notification'),
(6, '2021-02-13 03:25:02', '2021-02-13 03:25:02', '<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width\">\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"> \r\n    <meta name=\"x-apple-disable-message-reformatting\">\r\n    <title>Example</title>\r\n    <style>\r\n        body {\r\n            background-color:#fff;\r\n            color:#222222;\r\n            margin: 0px auto;\r\n            padding: 0px;\r\n            height: 100%;\r\n            width: 100%;\r\n            font-weight: 400;\r\n            font-size: 15px;\r\n            line-height: 1.8;\r\n        }\r\n        .continer{\r\n            width:400px;\r\n            margin-left:auto;\r\n            margin-right:auto;\r\n            background-color:#efefef;\r\n            padding:30px;\r\n        }\r\n        .btn{\r\n            padding: 5px 15px;\r\n            display: inline-block;\r\n        }\r\n        .btn-primary{\r\n            border-radius: 3px;\r\n            background: #0b3c7c;\r\n            color: #fff;\r\n            text-decoration: none;\r\n        }\r\n        .btn-primary:hover{\r\n            border-radius: 3px;\r\n            background: #4673ad;\r\n            color: #fff;\r\n            text-decoration: none;\r\n        }\r\n    </style>\r\n</head>\r\n<body>\r\n    <div class=\"continer\">\r\n        <p>\r\n           <content>\r\n        </p>\r\n    </div>\r\n</body>\r\n</html>', 'Vendor Course Booking Notification', 'New Class Booking Details', 'vendor_course_booking_notification');

-- --------------------------------------------------------

--
-- Table structure for table `example`
--

CREATE TABLE `example` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `example`
--

INSERT INTO `example` (`id`, `created_at`, `updated_at`, `name`, `description`, `status_id`) VALUES
(1, NULL, NULL, 'Sequi totam qui et et eum.', 'Eum deserunt excepturi natus nulla.', 3),
(2, NULL, NULL, 'Sunt harum recusandae temporibus.', 'Sit nihil deserunt voluptas omnis. Reprehenderit illum voluptatem iusto impedit.', 2),
(3, NULL, NULL, 'Eum nulla commodi odio.', 'Consequatur earum consequatur odio voluptatem et numquam.', 2),
(4, NULL, NULL, 'Dignissimos nulla provident id quaerat.', 'Est esse laudantium beatae. Est mollitia voluptatum molestiae qui enim voluptatem consequatur.', 1),
(5, NULL, NULL, 'Voluptas voluptatem et in.', 'Ut in et cupiditate.', 4),
(6, NULL, NULL, 'Recusandae eius dolores.', 'Sed deleniti culpa non tempore saepe.', 1),
(7, NULL, NULL, 'Id illum nostrum aut.', 'Id ut tempora quasi quia reprehenderit aut. Dolorem minus fugit recusandae saepe dolorem dolores et.', 4),
(8, NULL, NULL, 'Aut voluptatem a qui doloribus.', 'Neque impedit doloremque labore distinctio quos. Molestiae expedita quia omnis molestias quod autem enim.', 1),
(9, NULL, NULL, 'Quos autem delectus recusandae non.', 'Ducimus necessitatibus tenetur sit ea. Voluptatum voluptates omnis cupiditate porro magni quibusdam sed.', 4),
(10, NULL, NULL, 'Et autem sed vero rem ea.', 'Veritatis voluptatibus voluptatem voluptatibus eum debitis non doloribus.', 1),
(11, NULL, NULL, 'Optio sunt neque perferendis alias.', 'Unde quod doloribus quis enim eveniet.', 4),
(12, NULL, NULL, 'Similique ut explicabo molestiae.', 'Ut iusto eos perspiciatis qui. Qui aut modi rerum ex hic.', 3),
(13, NULL, NULL, 'Voluptas dolorem aperiam culpa quia officiis.', 'Nostrum ab eos beatae eum possimus eum.', 1),
(14, NULL, NULL, 'Nostrum sed dolorum exercitationem mollitia.', 'Enim ut facilis quisquam commodi ratione quod. Debitis sit consectetur laborum magni placeat qui.', 2),
(15, NULL, NULL, 'Et voluptate consequatur quis.', 'Neque illum id sunt optio qui.', 4),
(16, NULL, NULL, 'Ut hic omnis.', 'Occaecati qui veritatis voluptatum harum.', 1),
(17, NULL, NULL, 'Saepe omnis omnis animi.', 'Sequi ut nemo architecto est.', 1),
(18, NULL, NULL, 'Sapiente ut fuga culpa qui.', 'Facilis rem id tenetur eius a. Veritatis natus sit aperiam asperiores.', 2),
(19, NULL, NULL, 'Quos rerum nulla necessitatibus quia.', 'Dolorem eos consectetur dolore eos a et molestiae.', 3),
(20, NULL, NULL, 'Illo excepturi ut qui.', 'Laudantium sint tenetur in a minima dolor. Dolores blanditiis suscipit quas repellat qui quam quo.', 3),
(21, NULL, NULL, 'Inventore vero quisquam veniam et natus.', 'Eum quibusdam ipsam cumque sit iste quia. Laboriosam eligendi adipisci ut est nesciunt.', 1),
(22, NULL, NULL, 'Veniam amet ipsum quos.', 'Iste voluptatibus omnis dicta eos et.', 3),
(23, NULL, NULL, 'Est tenetur adipisci vero fuga.', 'Rerum sit expedita quisquam aut ab.', 2),
(24, NULL, NULL, 'Consequatur nulla commodi ratione iure quia.', 'Voluptatem sapiente et exercitationem.', 4),
(25, NULL, NULL, 'Perspiciatis harum ipsam optio ut consequatur.', 'Fuga voluptas non sapiente aut labore. Esse est alias perspiciatis consequatur iure.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` int(10) UNSIGNED DEFAULT NULL,
  `resource` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id`, `created_at`, `updated_at`, `name`, `folder_id`, `resource`) VALUES
(1, NULL, NULL, 'root', NULL, NULL),
(2, NULL, NULL, 'resource', 1, 1),
(3, NULL, NULL, 'documents', 1, NULL),
(4, NULL, NULL, 'graphics', 1, NULL),
(5, NULL, NULL, 'other', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL,
  `edit` tinyint(1) NOT NULL,
  `add` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `pagination` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `created_at`, `updated_at`, `name`, `table_name`, `read`, `edit`, `add`, `delete`, `pagination`) VALUES
(1, NULL, NULL, 'Example', 'example', 1, 1, 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `form_field`
--

CREATE TABLE `form_field` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browse` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `edit` tinyint(1) NOT NULL,
  `add` tinyint(1) NOT NULL,
  `relation_table` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation_column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int(10) UNSIGNED NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_field`
--

INSERT INTO `form_field` (`id`, `created_at`, `updated_at`, `name`, `type`, `browse`, `read`, `edit`, `add`, `relation_table`, `relation_column`, `form_id`, `column_name`) VALUES
(1, NULL, NULL, 'Title', 'text', 1, 1, 1, 1, NULL, NULL, 1, 'name'),
(2, NULL, NULL, 'Description', 'text_area', 1, 1, 1, 1, NULL, NULL, 1, 'description'),
(3, NULL, NULL, 'Status', 'relation_select', 1, 1, 1, 1, 'status', 'name', 1, 'status_id');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `uuid` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menulist`
--

CREATE TABLE `menulist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menulist`
--

INSERT INTO `menulist` (`id`, `name`) VALUES
(1, 'sidebar menu'),
(2, 'top menu');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `href`, `icon`, `slug`, `parent_id`, `menu_id`, `sequence`) VALUES
(1, 'Dashboard', '/admin/', 'cil-speedometer', 'link', NULL, 1, 1),
(2, 'Settings', NULL, 'cil-calculator', 'dropdown', NULL, 1, 2),
(4, 'Users', '/admin/users', NULL, 'link', 2, 1, 4),
(7, 'Edit roles', '/admin/roles', NULL, 'link', 2, 1, 7),
(10, 'Email', '/admin/mail', NULL, 'link', 2, 1, 10),
(17, 'Breadcrumb', '/admin/base/breadcrumb', NULL, 'link', 16, 1, 17),
(18, 'Cards', '/admin/base/cards', NULL, 'link', 16, 1, 18),
(19, 'Carousel', '/admin/base/carousel', NULL, 'link', 16, 1, 19),
(20, 'Collapse', '/admin/base/collapse', NULL, 'link', 16, 1, 20),
(21, 'Forms', '/admin/base/forms', NULL, 'link', 16, 1, 21),
(22, 'Jumbotron', '/admin/base/jumbotron', NULL, 'link', 16, 1, 22),
(23, 'List group', '/admin/base/list-group', NULL, 'link', 16, 1, 23),
(24, 'Navs', '/admin/base/navs', NULL, 'link', 16, 1, 24),
(25, 'Pagination', '/admin/base/pagination', NULL, 'link', 16, 1, 25),
(26, 'Popovers', '/admin/base/popovers', NULL, 'link', 16, 1, 26),
(27, 'Progress', '/admin/base/progress', NULL, 'link', 16, 1, 27),
(28, 'Scrollspy', '/admin/base/scrollspy', NULL, 'link', 16, 1, 28),
(29, 'Switches', '/admin/base/switches', NULL, 'link', 16, 1, 29),
(30, 'Tables', '/admin/base/tables', NULL, 'link', 16, 1, 30),
(31, 'Tabs', '/admin/base/tabs', NULL, 'link', 16, 1, 31),
(32, 'Tooltips', '/admin/base/tooltips', NULL, 'link', 16, 1, 32),
(34, 'Buttons', '/admin/buttons/buttons', NULL, 'link', 33, 1, 34),
(35, 'Buttons Group', '/admin/buttons/button-group', NULL, 'link', 33, 1, 35),
(36, 'Dropdowns', '/admin/buttons/dropdowns', NULL, 'link', 33, 1, 36),
(37, 'Brand Buttons', '/admin/buttons/brand-buttons', NULL, 'link', 33, 1, 37),
(40, 'CoreUI Icons', '/admin/icon/coreui-icons', NULL, 'link', 39, 1, 40),
(41, 'Flags', '/admin/icon/flags', NULL, 'link', 39, 1, 41),
(42, 'Brands', '/admin/icon/brands', NULL, 'link', 39, 1, 42),
(44, 'Alerts', '/admin/notifications/alerts', NULL, 'link', 43, 1, 44),
(45, 'Badge', '/admin/notifications/badge', NULL, 'link', 43, 1, 45),
(46, 'Modals', '/admin/notifications/modals', NULL, 'link', 43, 1, 46),
(56, 'Pages', NULL, '', 'dropdown', NULL, 2, 56),
(57, 'Dashboard', '/admin/', NULL, 'link', 56, 2, 57),
(59, 'Users', '/admin/users', NULL, 'link', 56, 2, 59),
(60, 'Settings', NULL, '', 'dropdown', NULL, 2, 60),
(63, 'Edit roles', '/admin/roles', NULL, 'link', 60, 2, 63),
(68, 'Credits', '/admin/credits', NULL, 'link', NULL, 1, 52),
(69, 'Subscribers', '/admin/subscribers', NULL, 'link', NULL, 1, 53),
(70, 'Category Types', '/admin/content_types', NULL, 'link', NULL, 1, 56),
(71, 'Manage Content', '/admin/notes', NULL, 'link', NULL, 1, 57),
(72, 'Members', '/admin/members', NULL, 'link', 77, 1, 58),
(73, 'Enterprises', '/admin/enterprises', NULL, 'link', 77, 1, 59),
(74, 'Vendors', '/admin/vendors', NULL, 'link', 77, 1, 60),
(77, 'Users Management', NULL, NULL, 'dropdown', NULL, 1, 61),
(78, 'Courses', '/admin/courses', NULL, 'link', NULL, 1, 62),
(79, 'Orders', '/admin/orders', NULL, 'link', NULL, 1, 63),
(80, 'Banners', '/admin/banners', NULL, 'link', NULL, 1, 64);

-- --------------------------------------------------------

--
-- Table structure for table `menu_role`
--

CREATE TABLE `menu_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menus_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_role`
--

INSERT INTO `menu_role` (`id`, `role_name`, `menus_id`) VALUES
(4, 'admin', 2),
(6, 'admin', 4),
(9, 'admin', 7),
(12, 'admin', 10),
(23, 'user', 17),
(24, 'admin', 17),
(25, 'user', 18),
(26, 'admin', 18),
(27, 'user', 19),
(28, 'admin', 19),
(29, 'user', 20),
(30, 'admin', 20),
(31, 'user', 21),
(32, 'admin', 21),
(33, 'user', 22),
(34, 'admin', 22),
(35, 'user', 23),
(36, 'admin', 23),
(37, 'user', 24),
(38, 'admin', 24),
(39, 'user', 25),
(40, 'admin', 25),
(41, 'user', 26),
(42, 'admin', 26),
(43, 'user', 27),
(44, 'admin', 27),
(45, 'user', 28),
(46, 'admin', 28),
(47, 'user', 29),
(48, 'admin', 29),
(49, 'user', 30),
(50, 'admin', 30),
(51, 'user', 31),
(52, 'admin', 31),
(53, 'user', 32),
(54, 'admin', 32),
(57, 'user', 34),
(58, 'admin', 34),
(59, 'user', 35),
(60, 'admin', 35),
(61, 'user', 36),
(62, 'admin', 36),
(63, 'user', 37),
(64, 'admin', 37),
(69, 'user', 40),
(70, 'admin', 40),
(71, 'user', 41),
(72, 'admin', 41),
(73, 'user', 42),
(74, 'admin', 42),
(77, 'user', 44),
(78, 'admin', 44),
(79, 'user', 45),
(80, 'admin', 45),
(81, 'user', 46),
(82, 'admin', 46),
(97, 'guest', 54),
(98, 'user', 54),
(99, 'admin', 54),
(100, 'guest', 55),
(101, 'user', 55),
(102, 'admin', 55),
(103, 'guest', 56),
(104, 'user', 56),
(105, 'admin', 56),
(106, 'guest', 57),
(107, 'user', 57),
(108, 'admin', 57),
(111, 'admin', 59),
(112, 'admin', 60),
(115, 'admin', 63),
(118, 'admin', 1),
(121, 'admin', 68),
(122, 'admin', 69),
(124, 'admin', 70),
(125, 'admin', 71),
(126, 'admin', 72),
(128, 'admin', 74),
(129, 'admin', 73),
(130, 'admin', 77),
(131, 'admin', 78),
(132, 'admin', 79),
(133, 'admin', 80);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_11_085455_create_notes_table', 1),
(5, '2019_10_12_115248_create_status_table', 1),
(6, '2019_11_08_102827_create_menus_table', 1),
(7, '2019_11_13_092213_create_menurole_table', 1),
(8, '2019_12_10_092113_create_permission_tables', 1),
(9, '2019_12_11_091036_create_menulist_table', 1),
(10, '2019_12_18_092518_create_role_hierarchy_table', 1),
(11, '2020_01_07_093259_create_folder_table', 1),
(12, '2020_01_08_184500_create_media_table', 1),
(13, '2020_01_21_161241_create_form_field_table', 1),
(14, '2020_01_21_161242_create_form_table', 1),
(15, '2020_01_21_161243_create_example_table', 1),
(16, '2020_03_12_111400_create_email_template_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applies_to_date` date NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `content`, `note_type`, `applies_to_date`, `users_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Ways we care test', 'JayChannel is the marketplace to transform our healthcare experience by empowering all people with access to healthy activities and informative classes any time any where. Our Channel delivers virtual content to the user-friendly JayPad with a diverse selection of classes and language options - allowing all people to live their ways of life while obtaining quality care through sharing virtual contents. No matter you are a Provider, a Care Enterprise, a Caregiver, a Client or a Family, you will be pride of being a part of our digitally inclusive community.', 'way_we_care', '2021-01-28', 1, 3, '2021-01-28 18:58:59', '2021-02-05 16:00:21'),
(2, 'How it works', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'how_it_work', '2021-01-28', 1, 3, '2021-01-28 18:59:47', '2021-01-28 18:59:47'),
(4, 'Privacy Policy', '<b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'privacy_policy', '2021-02-10', 1, 3, '2021-02-10 14:31:49', '2021-02-10 14:31:49'),
(5, 'Terms & Conditions', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'terms_coditions', '2021-02-10', 1, 3, '2021-02-10 14:32:59', '2021-02-10 14:32:59'),
(6, 'Accessibility', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'accessibility', '2021-02-10', 1, 3, '2021-02-10 14:33:30', '2021-02-10 14:33:30'),
(7, 'Cookie Policy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'cookie_policy', '2021-02-10', 1, 3, '2021-02-10 14:35:22', '2021-02-10 14:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'browse bread 1', 'web', '2021-01-12 11:36:37', '2021-01-12 11:36:37'),
(2, 'read bread 1', 'web', '2021-01-12 11:36:37', '2021-01-12 11:36:37'),
(3, 'edit bread 1', 'web', '2021-01-12 11:36:37', '2021-01-12 11:36:37'),
(4, 'add bread 1', 'web', '2021-01-12 11:36:37', '2021-01-12 11:36:37'),
(5, 'delete bread 1', 'web', '2021-01-12 11:36:37', '2021-01-12 11:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-01-12 11:36:35', '2021-01-12 11:36:35'),
(2, 'user', 'web', '2021-01-12 11:36:35', '2021-01-12 11:36:35'),
(3, 'guest', 'web', '2021-01-12 11:36:35', '2021-01-12 11:36:35'),
(4, 'Enterprise', 'web', '2021-01-18 18:10:25', '2021-01-18 18:11:05'),
(5, 'Kash tester', 'web', '2021-01-29 20:16:39', '2021-01-29 20:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `role_hierarchy`
--

CREATE TABLE `role_hierarchy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `hierarchy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_hierarchy`
--

INSERT INTO `role_hierarchy` (`id`, `role_id`, `hierarchy`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `class`) VALUES
(1, 'ongoing', 'badge badge-pill badge-primary'),
(2, 'stopped', 'badge badge-pill badge-secondary'),
(3, 'completed', 'badge badge-pill badge-success'),
(4, 'expired', 'badge badge-pill badge-warning');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `firstname`, `lastname`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Debashish', 'Ghosh', 'dev.test.debashish@gmail.com', '2021-01-21 06:32:34', NULL),
(2, 'Muhammad', 'Kashif', 'email2mkashif@gmail.com', '2021-01-21 08:32:17', '2021-01-21 08:32:17'),
(3, 'Muhammad', 'Asif', 'kashif.mh2u@gmail.com', '2021-01-22 07:50:39', '2021-01-22 07:50:39'),
(6, 'Debashish', 'Ghosh', 'ws.debashish@gmail.com', '2021-02-10 11:19:18', '2021-02-10 11:19:18'),
(10, 'Muhammad', 'Kashif', 'email2mkashif@gmail.com', '2021-02-10 18:36:18', '2021-02-10 18:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuroles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `address`, `city`, `state`, `zipcode`, `tel`, `user_type`, `password`, `menuroles`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@admin.com', '2021-01-12 11:36:35', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user,admin', 'gYrxsq5CgPBBkOZuyQRtNWxxb6CkpEb14jKdUyt20Ujwxu0UMivcoaXw3T60', '2021-01-12 11:36:35', '2021-01-12 11:36:35', NULL),
(12, 'Kashif', 'email2mkashif@gmail.com', NULL, 'KL, Malaysia', NULL, NULL, NULL, '0909090909', 'Vendor', '$2y$10$wdhroMI2Bd3qjFd6dKxp1uCb8mulyyMPk7XB634.j1yN4NMtropZu', 'user', NULL, '2021-01-21 11:13:45', '2021-01-21 11:13:45', NULL),
(13, 'Kash Enterprise', 'kashif.mh2u@gmail.com', NULL, 'UNITED POINT RESIDENCE (RESIDENSI BERPADU)', NULL, NULL, NULL, '23434343', 'Enterprise', '$2y$10$KAbTZR2v8JsglLvkesrJTeeTjESffKn6LVbPqJPnMuwzAjSabgkDC', 'user', NULL, '2021-01-22 07:50:02', '2021-01-22 07:50:02', NULL),
(15, 'Member', 'habiba.kashif@gmail.com', NULL, 'A-13-05, Setapak', NULL, NULL, NULL, '0182044350', 'Member', '$2y$10$FSN8OSeyi4fbBJAKq/9D3.s/X76nXc4K2x0Y9GFP.HinlDf4b0c56', 'user', NULL, '2021-01-24 10:08:04', '2021-02-10 18:38:29', '2021-02-10 18:38:29'),
(16, 'Nikki', 'nikitachoudhary1810@gmail.com', NULL, 'bkn', NULL, NULL, NULL, '123123123', 'Member', '$2y$10$W1WgrbDIpmMsjc4p4HL24usSD2NFPYgnbsgOa/ywm1A9aRwJlHjrW', 'user', NULL, '2021-01-25 20:27:07', '2021-01-28 16:02:08', '2021-01-28 16:02:08'),
(17, 'demo', 'demo@gmail.com', NULL, 'demo', NULL, NULL, NULL, '123123', 'Vendor', '$2y$10$kAzB1CS.LOq86scaqUUCuONr1WksbbFWn57bc/qn853yS4gc38CEi', 'user', NULL, '2021-01-26 16:11:45', '2021-01-26 16:11:45', NULL),
(18, 'Ammar', 'unisolutionz@yahoo.com', NULL, 'PV-21, KL', 'SF', 'SF', '2500', '090909090', 'Member', '$2y$10$NRuN8Q/xhnr2phA7rCKF0O6llApm1bMDkAvfhGRfxnpotCtSuNESu', 'user', NULL, '2021-01-27 14:01:33', '2021-02-13 10:05:47', NULL),
(19, 'asdsaD', 'priyanka12323ladhani@gmail.com', NULL, 'adwaferg', NULL, NULL, NULL, '89495901455', 'Member', '$2y$10$lDVMbGxhMG7XhQqkERYaqObv2GQY9belcHJlIG7NQx3udOmkcD8P2', 'user', NULL, '2021-01-28 09:49:27', '2021-01-28 16:02:00', '2021-01-28 16:02:00'),
(20, 'demo', 'nikki@gmail.com', NULL, 'address', NULL, NULL, NULL, '123123', 'Member', '$2y$10$ne2WiCKcrCocwMGBAOs51O8lUs3chzsTcyKD0hkvPFKr76vwTVr.q', 'user', NULL, '2021-01-28 09:50:09', '2021-01-28 16:02:16', '2021-01-28 16:02:16'),
(21, 'adasfd', 'priyanka1232311ladhani@gmail.com', NULL, 'awefaef', NULL, NULL, NULL, '123456789', 'Enterprise', '$2y$10$zCItCi7drMM4J4UwEMXbfen4kShZSkCLFhibsDncyO9xEmyB7bVlu', 'user', NULL, '2021-01-28 09:51:57', '2021-01-28 16:02:22', '2021-01-28 16:02:22'),
(22, 'demo 2', 'demo2@gmail.com', NULL, 'address 2', NULL, NULL, NULL, '123123', 'Enterprise', '$2y$10$KGrcwDf/Y.sLE3i7CoxeUucBr142wQGm1u9BBoBejg6x/hMEJ.tuG', 'user', NULL, '2021-01-28 10:02:30', '2021-01-28 16:02:26', '2021-01-28 16:02:26'),
(23, 'Dev', 'dev@gmail.com', NULL, 'Bkn', NULL, NULL, NULL, '123123', 'Member', '$2y$10$jIYzxaBr2wOM9zGDMkPd2uX5WMnfeyWFD/q5iq1g6UEI4vSg8HIF6', 'user', NULL, '2021-01-29 18:11:21', '2021-01-29 18:11:21', NULL),
(24, 'dev e', 'deve@gmail.com', NULL, 'bkn', NULL, NULL, NULL, '123123', 'Enterprise', '$2y$10$8YcK6TvSG3Pi19LUmvmP/OSMXbV1hS4txbaf5/WBKekoGcrH2H8GC', 'user', NULL, '2021-01-29 22:22:35', '2021-01-29 22:22:35', NULL),
(25, 'priyanka', 'priyanka23ladhani@gmail.com', NULL, 'yt', NULL, NULL, NULL, '8949590145', 'Member', '$2y$10$lxG6sAhyoT0GQZyklhd5iu4MAMBqwz6l/8gt43gIKT.YIoDFaaDA6', 'user', NULL, '2021-01-30 13:52:04', '2021-01-30 13:52:04', NULL),
(26, 'priyanka123', 'priyanka1211ladhani@gmail.com', NULL, 'wf', NULL, NULL, NULL, '1234567789', 'Enterprise', '$2y$10$FvzbXDrpkkTmgpX1k64JRu5a9fHAX0MMHUUkRMMQ2f3eDdR2s6gvG', 'user', NULL, '2021-01-30 13:54:33', '2021-01-30 13:54:33', NULL),
(27, 'demo', 'demoo@gmail.com', NULL, 'demo', NULL, NULL, NULL, '123123', 'Member', '$2y$10$fDpcQse3G6LJ/xu4kwu0kOI9D0jLntn2jZ2iZSwgx6kyOzK2iz9JS', 'user', NULL, '2021-01-31 08:56:15', '2021-01-31 08:56:15', NULL),
(28, 'Ammar', 'click2tube@gmail.com', NULL, 'Kl', NULL, NULL, NULL, '0909090', 'Member', '$2y$10$9Vzya4SK1rq8XSs7GR0OoeTCYfJlpfWiEI2Nfm7fJw8U/m0L.rjn.', 'user', NULL, '2021-02-10 18:47:09', '2021-02-10 18:47:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_available_credits`
--

CREATE TABLE `user_available_credits` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `credit_id` bigint(20) DEFAULT NULL,
  `credit_purchased` bigint(10) NOT NULL DEFAULT 0,
  `credit_used` bigint(10) NOT NULL DEFAULT 0,
  `credit_purchase_order_id` bigint(20) DEFAULT NULL,
  `credit_redeem_order_id` bigint(20) DEFAULT NULL,
  `credit_purchase_amt` double(10,2) DEFAULT NULL,
  `credit_purchase_datetime` datetime DEFAULT NULL,
  `credit_redeem_datetime` datetime DEFAULT NULL,
  `credit_return_id` bigint(20) DEFAULT NULL,
  `credit_return_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_available_credits`
--

INSERT INTO `user_available_credits` (`id`, `user_id`, `credit_id`, `credit_purchased`, `credit_used`, `credit_purchase_order_id`, `credit_redeem_order_id`, `credit_purchase_amt`, `credit_purchase_datetime`, `credit_redeem_datetime`, `credit_return_id`, `credit_return_date`, `created_at`, `updated_at`) VALUES
(1, 18, 4, 500, 0, 1, NULL, 1000.00, '2021-02-01 13:47:05', NULL, NULL, NULL, '2021-02-01 13:47:05', '2021-02-01 13:47:05'),
(2, 18, NULL, 0, 10, NULL, 3, NULL, NULL, '2021-02-01 13:48:29', NULL, NULL, '2021-02-01 13:48:29', '2021-02-01 13:48:29'),
(3, 18, NULL, 0, 15, NULL, 4, NULL, NULL, '2021-02-01 13:49:58', NULL, NULL, '2021-02-01 13:49:58', '2021-02-01 13:49:58'),
(4, 15, 2, 500, 0, 2, NULL, 200.00, '2021-02-01 16:55:39', NULL, NULL, NULL, '2021-02-01 16:55:39', '2021-02-01 16:55:39'),
(5, 15, NULL, 0, 15, NULL, 5, NULL, NULL, '2021-02-01 17:03:37', NULL, NULL, '2021-02-01 17:03:37', '2021-02-01 17:03:37'),
(6, 13, 3, 1000, 0, 3, NULL, 1200.00, '2021-02-06 06:06:01', NULL, NULL, NULL, '2021-02-06 06:06:01', '2021-02-06 06:06:01'),
(7, 13, 4, 500, 0, 3, NULL, 1000.00, '2021-02-06 06:06:01', NULL, NULL, NULL, '2021-02-06 06:06:01', '2021-02-06 06:06:01'),
(8, 13, NULL, 0, 15, NULL, 6, NULL, NULL, '2021-02-06 06:06:58', NULL, NULL, '2021-02-06 06:06:58', '2021-02-06 06:06:58'),
(9, 18, NULL, 5, 0, NULL, NULL, NULL, NULL, NULL, 1, '2021-02-17 00:37:11', '2021-02-17 00:37:11', '2021-02-17 00:37:11'),
(10, 18, NULL, 0, 10, NULL, 9, NULL, NULL, '2021-02-17 05:29:01', NULL, NULL, '2021-02-17 05:29:01', '2021-02-17 05:29:01'),
(11, 18, NULL, 0, 10, NULL, 8, NULL, NULL, '2021-02-17 05:29:05', NULL, NULL, '2021-02-17 05:29:05', '2021-02-17 05:29:05'),
(16, 18, NULL, 10, 0, NULL, NULL, NULL, NULL, NULL, 7, '2021-02-17 11:11:21', '2021-02-17 11:11:21', '2021-02-17 11:11:21'),
(17, 18, NULL, 5, 0, NULL, NULL, NULL, NULL, NULL, 8, '2021-02-17 11:16:43', '2021-02-17 11:16:43', '2021-02-17 11:16:43'),
(18, 18, NULL, 5, 0, NULL, NULL, NULL, NULL, NULL, 9, '2021-02-17 11:17:39', '2021-02-17 11:17:39', '2021-02-17 11:17:39'),
(19, 18, NULL, 10, 0, NULL, NULL, NULL, NULL, NULL, 10, '2021-02-18 04:42:36', '2021-02-18 04:42:36', '2021-02-18 04:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `enterprise_name` varchar(255) DEFAULT NULL,
  `business_type` varchar(255) DEFAULT NULL,
  `business_address` text DEFAULT NULL,
  `business_address_zipcode` varchar(50) DEFAULT NULL,
  `client_size` int(11) DEFAULT NULL,
  `staff_size` int(11) DEFAULT NULL,
  `business_timezone` varchar(255) DEFAULT NULL,
  `business_email_for_inquiry` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `about_your_enterprise` text DEFAULT NULL,
  `area_of_service` text DEFAULT NULL,
  `service_offered_patient_monitoring` tinyint(1) NOT NULL DEFAULT 0,
  `service_offered_home_health` tinyint(1) NOT NULL DEFAULT 0,
  `service_offered_activities` tinyint(1) NOT NULL DEFAULT 0,
  `service_offered_counselling` tinyint(1) NOT NULL DEFAULT 0,
  `service_offered_support_group` tinyint(1) NOT NULL DEFAULT 0,
  `service_offered_case_management` tinyint(1) NOT NULL DEFAULT 0,
  `service_offered_food_nutrition` tinyint(1) NOT NULL DEFAULT 0,
  `service_offered_memory_care` tinyint(1) NOT NULL DEFAULT 0,
  `service_offered_vocational_help` tinyint(1) NOT NULL DEFAULT 0,
  `membership_in_center` tinyint(1) NOT NULL DEFAULT 0,
  `membership_virtual` tinyint(1) NOT NULL DEFAULT 0,
  `membership_hybrid` tinyint(1) NOT NULL DEFAULT 0,
  `logo` varchar(255) DEFAULT NULL,
  `contact_person_firstname` varchar(255) DEFAULT NULL,
  `contact_person_lastname` varchar(255) DEFAULT NULL,
  `contact_person_position` varchar(255) DEFAULT NULL,
  `contact_person_direct_line` varchar(255) DEFAULT NULL,
  `contact_person_email` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `enterprise_name`, `business_type`, `business_address`, `business_address_zipcode`, `client_size`, `staff_size`, `business_timezone`, `business_email_for_inquiry`, `website`, `about_your_enterprise`, `area_of_service`, `service_offered_patient_monitoring`, `service_offered_home_health`, `service_offered_activities`, `service_offered_counselling`, `service_offered_support_group`, `service_offered_case_management`, `service_offered_food_nutrition`, `service_offered_memory_care`, `service_offered_vocational_help`, `membership_in_center`, `membership_virtual`, `membership_hybrid`, `logo`, `contact_person_firstname`, `contact_person_lastname`, `contact_person_position`, `contact_person_direct_line`, `contact_person_email`, `location`, `created_at`, `updated_at`) VALUES
(12, 'KL Education Center', 'Adult Day Center', 'Menara HSC, 187 Jalan Ampang', '2500', 250, 25, 'EST', 'kashif@hsc.com.my', 'http://www.kl.com', 'Machine Learning A-Z™: Hands-On Python & R In Data Science\r\nLearn to create Machine Learning Algorithms in Python and R from two Data Science experts. Code templates included.', 'Master Machine Learning on Python & R\r\nMake accurate predictions\r\nMake robust Machine Learning models\r\nUse Machine Learning for personal purpose', 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0, 'X88qkD5CYcfhWNVlDM8T6VTKPznobRju841VKM7t.jpeg', 'M', 'Kash', 'Web Developer', '54545554', 'kashif.mh2u@gmail.com', 'Kuala Lumpur', '2021-01-24 09:58:09', '2021-02-01 19:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `use_credit_purchase_orders`
--

CREATE TABLE `use_credit_purchase_orders` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `booking_no` varchar(255) NOT NULL,
  `credit_available` int(5) NOT NULL,
  `credit_purchase` int(5) NOT NULL,
  `booking_person_name` varchar(255) NOT NULL,
  `booking_person_email` varchar(255) NOT NULL,
  `booking_person_phone` varchar(255) NOT NULL,
  `booking_person_address` text NOT NULL,
  `booking_person_country` varchar(255) NOT NULL,
  `booking_person_city` varchar(255) NOT NULL,
  `booking_person_state` varchar(255) NOT NULL,
  `booking_person_postalcode` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `use_credit_purchase_orders`
--

INSERT INTO `use_credit_purchase_orders` (`id`, `user_id`, `booking_no`, `credit_available`, `credit_purchase`, `booking_person_name`, `booking_person_email`, `booking_person_phone`, `booking_person_address`, `booking_person_country`, `booking_person_city`, `booking_person_state`, `booking_person_postalcode`, `created_at`, `updated_at`) VALUES
(1, 18, '6018065940537', 0, 500, 'Ammar', 'unisolutionz@yahoo.com', '090909090', 'PV-21, KL', 'United States of America', 'KL', 'Kuala Lumpuer', '2500', '2021-02-01 13:47:05', '2021-02-01 13:47:05'),
(2, 15, '6018328b1996a', 0, 500, 'Member', 'habiba.kashif@gmail.com', '0182044350', 'A-13-05, Setapak', 'India', 'kolkata', 'west Bengal', '700034', '2021-02-01 16:55:39', '2021-02-01 16:55:39'),
(3, 13, '601e31c91ca8d', 0, 1500, 'Muhammad Kashif', 'kashif.mh2u@gmail.com', '+60182044350', 'A-13-05, Setapak', 'United States of America', 'Kuala Lumpur', 'Kuala Lumpur', '50450', '2021-02-06 06:06:01', '2021-02-06 06:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `use_credit_purchase_order_details`
--

CREATE TABLE `use_credit_purchase_order_details` (
  `credit_purchase_order_id` bigint(20) NOT NULL,
  `credit_id` bigint(20) NOT NULL,
  `credit_qty` int(5) NOT NULL,
  `credit_points` int(5) NOT NULL,
  `credit_amount` double(10,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `use_credit_purchase_order_details`
--

INSERT INTO `use_credit_purchase_order_details` (`credit_purchase_order_id`, `credit_id`, `credit_qty`, `credit_points`, `credit_amount`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 500, 1000.00, '2021-02-01 13:47:05', '2021-02-01 13:47:05'),
(2, 2, 1, 500, 200.00, '2021-02-01 16:55:39', '2021-02-01 16:55:39'),
(3, 3, 2, 1000, 1200.00, '2021-02-06 06:06:01', '2021-02-06 06:06:01'),
(3, 4, 1, 500, 1000.00, '2021-02-06 06:06:01', '2021-02-06 06:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) NOT NULL,
  `wishlist_id` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `wishlist_id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'ENJI1SL8', 18, 1, '2021-02-13 10:06:10', '2021-02-13 10:06:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- Indexes for table `class_booked`
--
ALTER TABLE `class_booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_booking_details`
--
ALTER TABLE `class_booking_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_booking_id` (`class_booking_id`,`course_id`);

--
-- Indexes for table `class_cancellation_history`
--
ALTER TABLE `class_cancellation_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_types`
--
ALTER TABLE `content_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `example`
--
ALTER TABLE `example`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_field`
--
ALTER TABLE `form_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `menulist`
--
ALTER TABLE `menulist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_hierarchy`
--
ALTER TABLE `role_hierarchy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_available_credits`
--
ALTER TABLE `user_available_credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD UNIQUE KEY `unique_user_details` (`user_id`);

--
-- Indexes for table `use_credit_purchase_orders`
--
ALTER TABLE `use_credit_purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `use_credit_purchase_order_details`
--
ALTER TABLE `use_credit_purchase_order_details`
  ADD PRIMARY KEY (`credit_purchase_order_id`,`credit_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_wishlist_id` (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_booked`
--
ALTER TABLE `class_booked`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `class_booking_details`
--
ALTER TABLE `class_booking_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_cancellation_history`
--
ALTER TABLE `class_cancellation_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `content_types`
--
ALTER TABLE `content_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `example`
--
ALTER TABLE `example`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_field`
--
ALTER TABLE `form_field`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menulist`
--
ALTER TABLE `menulist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_hierarchy`
--
ALTER TABLE `role_hierarchy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_available_credits`
--
ALTER TABLE `user_available_credits`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `use_credit_purchase_orders`
--
ALTER TABLE `use_credit_purchase_orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `FK_user_details_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

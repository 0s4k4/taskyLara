-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 03:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasky`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_balance`
--

CREATE TABLE `available_balance` (
  `aid` int(11) NOT NULL,
  `user_id` int(200) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `post_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `name`, `description`, `image`, `post_date`) VALUES
(13, 'Excepteur sint occaecat cupidatat lau', '&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;lau ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur&lt;/span&gt;&lt;div&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur&lt;/span&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;', '1537879974.jpeg', '2018-09-25'),
(14, 'At vero eos et accusamus', '&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat&lt;/span&gt;&lt;div&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat&lt;/span&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;', '1537859669.jpeg', '2018-09-25'),
(15, 'Quis autem vel eum iure reprehenderit', '&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur&lt;/span&gt;&lt;div&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur&lt;/span&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;', '1537859715.jpeg', '2018-09-25'),
(16, 'Temporibus autem quibusdam', '&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.&amp;nbsp;&lt;/span&gt;&lt;div&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;&lt;div&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/div&gt;', '1537860320.jpeg', '2018-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `stripe_token` varchar(500) NOT NULL,
  `payu_token` varchar(200) NOT NULL,
  `paypal_token` varchar(500) NOT NULL,
  `services_id` varchar(50) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `booking_address` text NOT NULL,
  `booking_city` varchar(200) NOT NULL,
  `booking_pincode` varchar(100) NOT NULL,
  `booking_note` text NOT NULL,
  `user_id` int(50) NOT NULL,
  `amount_by` varchar(50) NOT NULL,
  `subtotal_amt` float NOT NULL,
  `total_amt` float NOT NULL,
  `tax_amt` float NOT NULL,
  `admin_commission` float NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `reject` varchar(100) NOT NULL,
  `service_complete` int(50) NOT NULL,
  `shop_id` int(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `curr_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `id` int(11) NOT NULL,
  `gid` int(200) NOT NULL,
  `order_id` int(200) NOT NULL,
  `msg_type` varchar(50) NOT NULL,
  `buyer_id` int(200) NOT NULL,
  `seller_id` int(200) NOT NULL,
  `message` text NOT NULL,
  `submit_date` datetime NOT NULL,
  `file` varchar(1000) NOT NULL,
  `got_problem` varchar(200) NOT NULL,
  `complete_work` varchar(50) NOT NULL,
  `submission` varchar(50) NOT NULL,
  `problem_reason` varchar(200) NOT NULL,
  `mutual_cancel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_vendor`
--

CREATE TABLE `contact_vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `vendor_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `gig_id` varchar(200) NOT NULL,
  `sender` int(200) NOT NULL,
  `receiver` int(200) NOT NULL,
  `message` text NOT NULL,
  `read_write_status` int(100) NOT NULL,
  `date_submitted` datetime NOT NULL,
  `file` varchar(200) NOT NULL,
  `report` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dispute`
--

CREATE TABLE `dispute` (
  `dispute_id` int(11) NOT NULL,
  `booking_id` int(200) NOT NULL,
  `booking_date` date NOT NULL,
  `dispute_date` date NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `vendor_name` varchar(200) NOT NULL,
  `vendor_id` int(100) NOT NULL,
  `payment` float NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gigs`
--

CREATE TABLE `gigs` (
  `gid` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(100) NOT NULL,
  `giger_id` int(100) NOT NULL,
  `subject` text NOT NULL,
  `request_slug` varchar(200) NOT NULL,
  `featured_image` varchar(200) NOT NULL,
  `request_skills` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `category` int(100) NOT NULL,
  `subcategory` int(200) NOT NULL,
  `category_type` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `instruction` text NOT NULL,
  `budget_type` varchar(200) NOT NULL,
  `submit_date` date NOT NULL,
  `featured` int(50) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `feature_price` int(11) NOT NULL,
  `feature_start_date` date NOT NULL,
  `feature_end_date` date NOT NULL,
  `reference_id` int(255) NOT NULL,
  `payment_date` varchar(200) NOT NULL,
  `additional_info` text NOT NULL,
  `tags` varchar(500) NOT NULL,
  `complete_days` int(50) NOT NULL,
  `preferred_location` text NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `gig_type` varchar(50) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `maximum_qty` int(50) NOT NULL,
  `extra_text1` varchar(200) NOT NULL,
  `extra_price1` int(100) NOT NULL,
  `extra_text2` varchar(200) NOT NULL,
  `extra_price2` int(100) NOT NULL,
  `extra_text3` varchar(200) NOT NULL,
  `extra_price3` int(100) NOT NULL,
  `fixed_price` varchar(200) NOT NULL,
  `hour_price` varchar(200) NOT NULL,
  `minimum_budget` int(200) NOT NULL,
  `maximum_budget` int(200) NOT NULL,
  `fixed_minimum` int(100) NOT NULL,
  `fixed_maximum` int(100) NOT NULL,
  `hour_minimum` int(100) NOT NULL,
  `hour_maximum` int(100) NOT NULL,
  `local_ship_price` int(100) NOT NULL,
  `local_ship_place` varchar(200) NOT NULL,
  `world_ship_price` int(100) NOT NULL,
  `view_count` int(255) NOT NULL,
  `delete_status` varchar(50) NOT NULL,
  `request_status` int(50) NOT NULL,
  `bid_status` int(50) NOT NULL,
  `sent_mail` int(50) NOT NULL,
  `status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gig_images`
--

CREATE TABLE `gig_images` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gig_order`
--

CREATE TABLE `gig_order` (
  `id` int(11) NOT NULL,
  `gid` int(200) NOT NULL,
  `gig_user_id` int(100) NOT NULL,
  `user_id` int(200) NOT NULL,
  `reference_id` int(200) NOT NULL,
  `token` varchar(500) NOT NULL,
  `paypal_token` varchar(1000) NOT NULL,
  `coupon_id` int(50) NOT NULL,
  `coupon_code` varchar(100) NOT NULL,
  `coupon_by` int(100) NOT NULL,
  `coupon_user` varchar(100) NOT NULL,
  `coupon_commission` float NOT NULL,
  `price` int(200) NOT NULL,
  `processing_fee` varchar(50) NOT NULL,
  `seller_price` float NOT NULL,
  `admin_price` float NOT NULL,
  `affiliate_price` float NOT NULL,
  `affiliate_id` int(100) NOT NULL,
  `amount_by` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `ex_text` varchar(200) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `additional_info` text NOT NULL,
  `payment_date` date NOT NULL,
  `awaiting` int(50) NOT NULL,
  `payment_level` int(50) NOT NULL,
  `withdraw` varchar(50) NOT NULL,
  `withdraw_token` varchar(255) NOT NULL,
  `upcoming_payment` int(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '2019-05-09 20:56:37', '2019-05-09 20:56:37'),
(2, 'Spanish', 'es', '2019-05-09 20:56:47', '2019-05-09 20:56:47'),
(3, 'Arabic', 'ar', '2019-05-09 20:56:55', '2019-05-09 20:56:55');

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_title`, `page_desc`) VALUES
(1, 'About', '\'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\''),
(2, 'Terms and Conditions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(3, 'Privacy Policy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum'),
(4, 'Contact', '\'<div style=\"width: 100%\"><iframe width=\"100%\" height=\"300\" src=\"https://www.mapsdirections.info/en/custom-google-maps/map.php?width=100%&height=300&hl=ru&q=London+(Responsive)&ie=UTF8&t=&z=14&iwloc=A&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"><a href=\"https://www.mapsdirections.info/en/custom-google-maps/\">Create a custom Google Map</a> by <a href=\"https://www.mapsdirections.info/en/\">UK Maps</a></iframe></div>\''),
(5, 'How it works', '\'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\'\'\''),
(6, 'Safety', '\'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\''),
(7, 'Service Guide', '\'\'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\'\''),
(8, 'How to pages', '\'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\''),
(9, 'Sucess Stories', '\'\'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<br/><br/>\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum\'\'');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rid` int(11) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rshop_id` int(50) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_file`
--

CREATE TABLE `request_file` (
  `rf_id` int(11) NOT NULL,
  `token_key` varchar(200) NOT NULL,
  `file_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_proposal`
--

CREATE TABLE `request_proposal` (
  `prp_id` int(11) NOT NULL,
  `gid` int(100) NOT NULL,
  `req_user_id` int(100) NOT NULL,
  `prop_user_id` int(100) NOT NULL,
  `bid_price` int(100) NOT NULL,
  `bid_email` varchar(200) NOT NULL,
  `desc_proposal` text NOT NULL,
  `proposal_estimate` varchar(50) NOT NULL,
  `bid_date` date NOT NULL,
  `award` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

CREATE TABLE `revenues` (
  `rwid` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `revenues_token` varchar(255) NOT NULL,
  `total_amount` int(255) NOT NULL,
  `revenues_type` varchar(200) NOT NULL,
  `revenues_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rid` int(11) NOT NULL,
  `gid` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `buyer_id` int(100) NOT NULL,
  `seller_id` int(100) NOT NULL,
  `rate` int(100) NOT NULL,
  `star_rate` int(200) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller_services`
--

CREATE TABLE `seller_services` (
  `id` int(11) NOT NULL,
  `service_id` int(50) NOT NULL,
  `subservice_id` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `shop_id` int(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `status`) VALUES
(8, 'Events', '1495189404.png', 1),
(9, 'Home', '1495189518.png', 0),
(10, 'Lessons', '1495189626.png', 0),
(11, 'Wellness', '1495189741.png', 0),
(12, 'Business', '1495189828.png', 0),
(13, 'Crafts', '1495190009.png', 1),
(14, 'Design & Web', '1495190181.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_desc` text NOT NULL,
  `site_keyword` text NOT NULL,
  `site_ads_space` text CHARACTER SET utf8 NOT NULL,
  `site_facebook` varchar(255) NOT NULL,
  `site_twitter` varchar(255) NOT NULL,
  `site_gplus` varchar(255) NOT NULL,
  `site_pinterest` varchar(255) NOT NULL,
  `site_instagram` varchar(255) NOT NULL,
  `site_currency` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `site_banner` varchar(255) NOT NULL,
  `site_copyright` varchar(255) NOT NULL,
  `commission_mode` varchar(255) NOT NULL,
  `commission_from` varchar(50) NOT NULL,
  `commission_amt` float NOT NULL,
  `paypal_id` varchar(255) NOT NULL,
  `paypal_url` varchar(255) NOT NULL,
  `stripe_mode` varchar(50) NOT NULL,
  `test_publish_key` varchar(200) NOT NULL,
  `test_secret_key` varchar(200) NOT NULL,
  `live_publish_key` varchar(200) NOT NULL,
  `live_secret_key` varchar(200) NOT NULL,
  `payu_mode` varchar(50) NOT NULL,
  `merchant_key` varchar(200) NOT NULL,
  `salt_id` varchar(200) NOT NULL,
  `message_per_page` int(100) NOT NULL,
  `withdraw_amt` float NOT NULL,
  `withdraw_option` varchar(255) NOT NULL,
  `payment_option` varchar(200) NOT NULL,
  `social_login_option` varchar(100) NOT NULL,
  `approve_requests` varchar(200) NOT NULL,
  `min_skills` varchar(200) NOT NULL,
  `max_skills` varchar(200) NOT NULL,
  `featured_gig_price` float NOT NULL,
  `featured_days` int(100) NOT NULL,
  `processing_fee` float NOT NULL,
  `google_map_key` varchar(255) NOT NULL,
  `site_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_desc`, `site_keyword`, `site_ads_space`, `site_facebook`, `site_twitter`, `site_gplus`, `site_pinterest`, `site_instagram`, `site_currency`, `site_logo`, `site_favicon`, `site_banner`, `site_copyright`, `commission_mode`, `commission_from`, `commission_amt`, `paypal_id`, `paypal_url`, `stripe_mode`, `test_publish_key`, `test_secret_key`, `live_publish_key`, `live_secret_key`, `payu_mode`, `merchant_key`, `salt_id`, `message_per_page`, `withdraw_amt`, `withdraw_option`, `payment_option`, `social_login_option`, `approve_requests`, `min_skills`, `max_skills`, `featured_gig_price`, `featured_days`, `processing_fee`, `google_map_key`, `site_address`) VALUES
(1, 'Tasky', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'lorem,ipsum,lorem,ipsum', '&lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;http://demowpthemes.com/privatemessage/ad.png&quot; border=&quot;0&quot; /&gt;&lt;/a&gt;', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.google.com', 'http://www.pinterest.com', 'http://www.instagram.com', 'USD', '1544424761.png', '1544448323.png', '1501837831.jpg', '© 2017. All Rights Reserved. Designed by Migrateshop', 'percentage', 'buyer', 10, 'sang_1354798740_biz@gmail.com', 'https://www.sandbox.paypal.com/cgi-bin/webscr', 'test', 'pk_test_bWx1fEQgVZozaQyPZpAjwDMQ', 'sk_test_JKf2bTvOtK7fPFrHoMphlvAV', 'pk_live_fdsafsa', 'sk_live_dafdsfdsadfsa', 'test', 'gtKFFx', 'eCwWELxi', 3, 10, 'paypal,bank,stripe,payumoney', 'paypal,stripe,payumoney', 'GPlus,Facebook,Twitter', 'yes', '2', '10', 15, 10, 10, 'AIzaSyAlBu8MsC7jxJ68rpRR722Ojl_HQiWpnhQ', 'Sangvish Technologies, Simmakal, Madurai, Tamilnadu, India 625001');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(25) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `shop_phone_no` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `shop_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `cover_photo` varchar(255) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `shop_document` varchar(500) NOT NULL,
  `seller_email` varchar(250) NOT NULL,
  `user_id` int(50) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `admin_email_status` varchar(200) NOT NULL,
  `booking_opening_days` varchar(255) NOT NULL,
  `booking_per_hour` varchar(255) NOT NULL,
  `tax_percent` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop_gallery`
--

CREATE TABLE `shop_gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(50) NOT NULL,
  `shop_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill` varchar(500) NOT NULL,
  `delete_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subservices`
--

CREATE TABLE `subservices` (
  `subid` int(11) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `subimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subservices`
--

INSERT INTO `subservices` (`subid`, `subname`, `service`, `subimage`) VALUES
(3, 'Accounting', '12', '1495433279.jpg'),
(4, 'Advertising', '12', '1495433362.jpg'),
(8, 'Data Entry', '12', '1495456036.jpg'),
(9, 'Digital Marketing', '12', '1495456096.jpg'),
(10, 'lighting', '13', '1545308657.jpg'),
(11, 'Paper craft', '13', '1545306342.jpg'),
(12, 'Wooden craft', '13', '1545308485.jpg'),
(13, 'Cloth Bracelets', '13', '1545223428.jpg'),
(14, 'Animation', '14', '1545309844.jpg'),
(15, 'E Commerce', '14', '1545306450.jpg'),
(16, 'Technical Design', '14', '1545221858.jpg'),
(17, 'Software Development', '14', '1545308756.jpg'),
(18, 'Wedding', '8', '1545306867.jpg'),
(19, 'Meeting', '8', '1545300350.jpg'),
(20, 'Photography', '8', '1545306745.jpg'),
(21, 'Cooking', '8', '1545306784.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_private_message`
--

CREATE TABLE `tbl_private_message` (
  `pid` int(11) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `send_by` varchar(50) NOT NULL,
  `read_status` int(50) NOT NULL,
  `submitted` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `image`) VALUES
(3, 'Mickey Peter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1495604998.jpg'),
(5, 'John', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1495544971.jpg'),
(6, 'Barbie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '1495604691.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `wallet` float NOT NULL,
  `confirmation` int(50) NOT NULL,
  `confirm_key` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `provider`, `provider_id`, `gender`, `phone`, `photo`, `admin`, `wallet`, `confirmation`, `confirm_key`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'test@studentsvsteachers.com', '$2y$10$QKmqNVSrMGfkOOXxf9L6mOHS69fmxrlCQu6eSi1JoIOL5cbLHJNQ6', '', '', 'male', '9876543211', '1497867287.jpg', 1, 0, 1, '', '2hovpQuqnFECB2R0Gtbv2UzIO7PjdOXly6BKPvMUf01IzPPCS4B0NKZyYCJy', '2017-05-25 01:30:45', '2017-05-25 01:30:45'),
(4, 'seller', 'seller@seller.com', '$2y$10$pwVcpcfi9nUebYbOPeH72.Begd5SeSuUhCV8pwgA/n1t9/K7uzDC6', '', '', 'female', '9876543210', '1497510195.jpg', 2, 9.9, 1, '', 'EYXGZzl6iiujIJKsD7qfVnRFN04nTjxtckvEPy9tKGNd1TJbgS3GSE11vner', '2017-05-29 04:11:47', '2017-05-29 04:11:47'),
(5, 'sample2', 'sample2@gmail.com', '$2y$10$pwVcpcfi9nUebYbOPeH72.Begd5SeSuUhCV8pwgA/n1t9/K7uzDC6', '', '', 'male', '965666536', '', 2, 794, 1, '', 'Pt2L3G6lRshQx2D9svMrTPs8GEhRwHckxrm0GPb2enQhlX2ypsVSF0GGuXBE', '2017-05-30 02:00:10', '2017-05-30 02:00:10'),
(12, 'demo', 'demo@demo.com', '$2y$10$3naRLn1sp3BrMsU3TWNS3e1n3RXCByorqWgSFJ82cwJN1LQ.aG6dm', '', '', 'male', '4654546', '', 2, 44, 1, '', 'grOIxjZsyhPOIpl56sOq8UacCFtBEj6lxwTQAlDsTV52h5tFA9UnhJy8kZ58', '2017-06-12 06:52:17', '2017-06-12 06:52:17'),
(13, 'example', 'example@example.com', '$2y$10$t38C7Wffmy2oeEq5JSScBeFgfe.dfLYCoSbX6ZBndc9xkan0pQK8C', '', '', 'male', '2132131', '', 2, 104, 1, '', 'Q473VsnYY5ODmym8NzPaplzQpFfJgOeA2ihlNomawnYRn3YoAVANQCmNXYN4', '2017-06-12 07:11:47', '2017-06-12 07:11:47'),
(14, 'sample', 'sample@sample.com', '$2y$10$QKmqNVSrMGfkOOXxf9L6mOHS69fmxrlCQu6eSi1JoIOL5cbLHJNQ6', '', '', 'male', '32432', '1497864972.jpg', 2, 0, 1, '', 'Te0JPnXNX0Yb6KrePLWXtC0KfuLn0R4muCPLgojLTiXJxne6MtdN6N008nAX', '2017-06-12 07:22:31', '2017-06-12 07:22:31'),
(15, 'test', 'test@test.com', '$2y$10$QKmqNVSrMGfkOOXxf9L6mOHS69fmxrlCQu6eSi1JoIOL5cbLHJNQ6', '', '', 'male', '655554', '', 2, 0, 1, '', 'VZ3PM4pFtFXRoIVfw8UGQulFkxsUZxTg1gRt6iu0cppKuXEpaETKZP1Hrd9V', '2017-06-13 00:18:47', '2017-06-13 00:18:47'),
(16, 'checking', 'checking@checking.com', '$2y$10$F4pp.n0CJTJU6lKAXtVjc.zVGR3Y4VqlUKZPtSVt16fE4QcQmmuAy', '', '', 'male', '3243232', '', 2, 44, 1, '', 'Ribyq1sXB6HRiFqlZfdNMYo2CqIA2k0hnMVCklyItDoVlc0XzvuNW0c4XaQX', '2017-06-13 00:25:28', '2017-06-13 00:25:28'),
(17, 'customer1', 'customer1@customer.com', '$2y$10$3naRLn1sp3BrMsU3TWNS3e1n3RXCByorqWgSFJ82cwJN1LQ.aG6dm', '', '', 'female', '565655', '', 0, 690, 1, '', '9jjNsNKDUgBUf6amF4OUKOl7WHWREkz1hOjnaaW3ic5xPWTTRDFYn5wypN2g', '2017-06-13 02:06:25', '2017-06-13 02:06:25'),
(18, 'vendor', 'vendor@gmail.com', '$2y$10$qedTvlo5BRugLLwq2x4tyuMrTg6xym0JTc1ivl3xcZE.p6W6wRasi', '', '', 'male', '9858554', '', 2, 98.6, 1, '', 'duHfLdyPR82uhYkMPQ259ciItAYTLYCEh2nUQZ2JF48HNoZKPBwrDV9doJ2J', NULL, NULL),
(22, 'customer', 'customer@gmail.com', '$2y$10$YtcIn7SPT1ALMhvqppA7deqb41inT7bGNgHhuTnSSIiNKFWMnSz26', '', '', 'male', '3452342', '', 2, 255.25, 1, '', '2vhxBOyfGgZ1YvpVUfNqfs2INX6JK1LN47lF8FbD1OVeAawzNYvaLmVsL4O4', '2018-04-06 04:22:05', '2018-04-06 04:22:05'),
(25, 'tester', 'tester@gmail.com', '$2y$10$nSEClyWx8YeElTETjrlFGucEPxrC0gJNGaiM4hq5gYJh4sLSAKonm', '', '', 'male', '9876543210', '', 2, 0, 1, '', 'Ggr9N232HUjPTfUfvN6igEFD5RcoyR9sFoXy7wRT4N5QFJYU8oOn5k6lqbdh', NULL, NULL),
(26, 'hh', 'hh@hh.com', '$2y$10$4CfWINeNqqaEqJPc/GR3IuD3EOQ.gAHg3TpguVkU8oz8wha1oDOBm', '', '', 'male', '324234', '', 2, 0, 1, '', 'hM4AMr4hq7fj4s6SHj2tiqths7L1BY8Ny5WhAtLWxO03MUdEl9GxxNI6ihAH', NULL, NULL),
(27, 'vv', 'vv@gmail.com', '$2y$10$Jz1Hse3Haibly5GSXZ8FFuzFyAURCSMg2nXm2yaQlYj3umluF838W', '', '', 'male', '464646', '', 2, 0, 1, '', 'mnXsMdEyi1I7K9SYk3mVCuMuWSJVju8SMUFe8sY1hwu8G2MFIozoBNeBCQrv', NULL, NULL),
(28, 'sample_vendor', 'saravanan@sangvish.com', '$2y$10$4qOkIWok4JxeUg5SOJPk/O0aMiZpLEYhDiRep5XYPA4edzu1YnOSm', '', '', 'male', '9876543212', '1524203272.png', 2, 0, 1, '', 'YdHau72Vp6IKgKxDl9OPvIDLYZDZyBdQ2vyQRJu8grp2MlnEqCWH7EZebCZP', '2018-04-20 05:47:09', '2018-04-20 05:47:09'),
(29, 'sample_customer', 'newsss@gmail.com', '$2y$10$FQwJ0sMgKADClEPDcZnGEuR6PiBvNDxxPjhTyOJNtJFJEXyCB.y/K', '', '', 'male', '54545454', '', 0, 14.5, 1, '', 'eqv50P94f3acstkRCYZr3xaZWbtHrYyeuDiqfPoOTlUdCNunNHQhDa8AvESR', '2018-04-20 05:52:21', '2018-04-20 05:52:21'),
(31, 'alexxiazofia', 'alexxiazofia@gmail.com', '', 'twitter', '910388547730812930', 'female', '4444464', '', 0, 0, 1, '', 'OtgcINmPo8Omb8utFjOPZxLUkvTCWSEb6hqGDayXTiJQzJ0OGylrgOIeLcUQ', '2018-04-20 06:47:02', '2018-04-20 06:47:02'),
(32, 'buyer20', 'buyer20@g.com', '$2y$10$NQfOw.VjOOhz43JpS1dK6O1hTvAGYtWi0Ton68OBSS22AmftAZ5Jy', '', '', 'male', '778745454787', '', 0, 30, 1, '', 'PzXcs3ak2JBpqgmyvW8NRCIZx2wCkpW6xZmAfshCtuIqJ2zrY4zrZvu5RDZG', '2018-04-20 06:50:39', '2018-04-20 06:50:39'),
(33, 'seller20', 'seller20@gmail.com', '$2y$10$iS.6UBVkO1xK6nMZ6DOMzuqMQeTn0nsl0gcpl2tTsE9UIEHu99tiK', '', '', 'female', '87644787', '', 2, 10, 1, '', 'lBUQ2ku7eUpiaV9les6XeZg2KmMJ6RnigNdOKecpWuHinKAcDERDvnQivN6i', '2018-04-20 06:51:40', '2018-04-20 06:51:40'),
(36, 'jj', 'jj@gmail.com', '$2y$10$Am7Uz.2Hw8nIWmhKVgosquHqiiGV7KAsFOcGd7hVB501qLBH/jc2a', '', '', 'female', '324324', '', 0, 2, 1, '', '6CD5Lf8vjW3bOIBPcnvO97mH8jjIXkeKuXF3mLUhVXxgGPA1oNG4L2XlwuM3', '2018-04-20 10:59:43', '2018-04-20 10:59:43'),
(37, 'fdsa', 'fdsa@dfsa.com', '$2y$10$G0KElXnr412rE9U5PKzjx.nAo0hXKkVmhjt8pKUbL5s4e5cVgNNwW', '', '', 'female', '32423', '', 2, 0, 1, '', 'zAXRT4XsymmjmErPOerVBRCT2kjU2mTZ70XioWjpo2OVJ5GYuYrD99c0L4Xh', NULL, NULL),
(40, 'best', 'best@gmail.com', '$2y$10$9EnWd8.rtiSPySsunwghgeyJXWB3Wv9CmBSS0cobUAbF4LC3Gaqye', '', '', 'male', '8558454', '', 2, 0, 1, '', 'QjdxHV5uHfGnAgwHdxRooACHfPbgsE6yxmdpWkzbmY8xBybSMhIm8aFtRpsL', '2018-08-16 04:38:10', '2018-08-16 04:38:10'),
(45, 'samp', 'samp@gmail.com', '$2y$10$uykefZeSJUcaOYmDySs5quoghXONJ2o21Vp/NKaEbxTLj2.paIcbG', '', '', 'male', '32432423', '', 2, 0, 1, '5b75708c5f462', 'ca9CUl0LmnGDLk7Iq6cXs25UxwDYubVNEolHSiI4gPdrQUwl0Rz5ZGjtNBeR', NULL, NULL),
(46, 'checked', 'checked@gmail.com', '$2y$10$cje//Q1Hf6ajqxIVfUfNBODq48xFjkhYt5k5XZP39AVLEOO9aR4KK', '', '', 'male', '956565656', '', 2, 0, 1, '5b767164808b3', 'XOAVaVvU9ZSsQh3CapndqeoiJHyJi7CaLABLg8x3K9r7phy66JUo4nlPKIor', NULL, NULL),
(47, 'newwork', 'newwork@gmail.com', '$2y$10$B.w2o6.zHgkFafosiLXx7e2j/25rgKyhtTcQLP.XSsJrCYeU/i/1.', '', '', 'male', '5441', '', 2, 0, 1, '5b76c93e3643b', 'wZlpyrqpenibvflbgzxHmmLY3iFzLaK4nndJP9begp2MYGwYxqkOmRUxcq3c', NULL, NULL),
(48, 'weldone1', 'weldone1@gmail.com', '$2y$10$lWP5drl.ZeItUlDOIY/EGu.nrZ/eVJ3oqBIsI8VkC9wDv5wJZ2LXy', '', '', 'male', '9876543210', '', 2, 0, 1, '5b90c84be8c3a', 'dP28FIzgfG6bikguM0f6utYdQFjxrNbK9xwD3hXWgOgmhuy7aGvXgqjjGZc2', NULL, NULL),
(49, 'weldone2', 'weldone2@gmail.com', '$2y$10$xm2Rq46lb.5ucjiLNFka0eE2WqpwHl3RvdxRq0cFJPIthg2VBmSNO', '', '', 'male', '987654221', '', 2, 85, 1, '5b90c8944e6c7', 'y4MukJDPGhZIOTxxuOep0u4Du4tXZa9Qh7aMx5Got4QUoggvP4njce0ewV5t', NULL, NULL),
(50, 'customerr', 'customerr@gmail.com', '$2y$10$MXjHK6.mOdGG9u7pY/ARLudNgUbEFhffnDd9KMn0RC7fO/pQmFaCu', '', '', 'male', '879879', '', 2, 0, 1, '5ba22c5c70a33', NULL, NULL, NULL),
(51, 'go', 'go@gmail.com', '$2y$10$hsnTHtQNOmP74tzsjplz6O/N56ZUfdWIm3v.5H8clyMaMPSY.7fhO', '', '', 'male', '3243242', '', 2, 0, 1, '5ba4bf0d150ed', 'ux7872ndwrFZSbrzlG0OjztM4frKUQrzR6ZXjJdhyH1J1fL3mEU2n5OTjDTY', NULL, NULL),
(52, 'woo', 'woo@gmail.com', '$2y$10$JgO/v/tUZkfCXbmfFBsvfezTW71Bv./Dshr5/LSGQONAQYwyO2P.m', '', '', 'male', '9797565656', '', 2, 0, 1, '5bbb4fb9286e4', 'bvwiC4ysN06ZfumLm8Q0DCHDY3hSiVV6ulEkhsqc5W6ZhmJBvwsoTKGerFsC', NULL, NULL),
(53, 'Geechyman', 'nuclearfuzion@yahoo.com', '$2y$10$sq3mkrI8Dm5BfSPD0UVyyehciDf8HcclyQCd7G0DcGFgf51h5Pefi', '', '', 'male', '8437188617', '', 0, 0, 0, '5c52acf48d109', NULL, NULL, NULL),
(54, 'alex', 'alex@gmail.com', '$2y$10$7ca5/9qq3Xwwxe.HQM1V7udO0AN3N5SiXoKL.OSKAQNSbHi8qmN56', '', '', 'male', '8465415545', '', 0, 0, 1, '5ccd421516eb6', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `wid` int(11) NOT NULL,
  `shop_balance` float NOT NULL,
  `withdraw_amt` float NOT NULL,
  `total_balance` float NOT NULL,
  `withdraw_mode` varchar(255) NOT NULL,
  `paypal_id` varchar(255) NOT NULL,
  `stripe_id` varchar(200) NOT NULL,
  `payumoney` varchar(100) NOT NULL,
  `bank_acc_no` varchar(255) NOT NULL,
  `bank_info` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `user_id` int(50) NOT NULL,
  `withdraw_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_balance`
--
ALTER TABLE `available_balance`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_vendor`
--
ALTER TABLE `contact_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispute`
--
ALTER TABLE `dispute`
  ADD PRIMARY KEY (`dispute_id`);

--
-- Indexes for table `gigs`
--
ALTER TABLE `gigs`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `gig_images`
--
ALTER TABLE `gig_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gig_order`
--
ALTER TABLE `gig_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `request_file`
--
ALTER TABLE `request_file`
  ADD PRIMARY KEY (`rf_id`);

--
-- Indexes for table `request_proposal`
--
ALTER TABLE `request_proposal`
  ADD PRIMARY KEY (`prp_id`);

--
-- Indexes for table `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`rwid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `seller_services`
--
ALTER TABLE `seller_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_gallery`
--
ALTER TABLE `shop_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subservices`
--
ALTER TABLE `subservices`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `tbl_private_message`
--
ALTER TABLE `tbl_private_message`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_balance`
--
ALTER TABLE `available_balance`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_vendor`
--
ALTER TABLE `contact_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dispute`
--
ALTER TABLE `dispute`
  MODIFY `dispute_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gigs`
--
ALTER TABLE `gigs`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gig_images`
--
ALTER TABLE `gig_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gig_order`
--
ALTER TABLE `gig_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_file`
--
ALTER TABLE `request_file`
  MODIFY `rf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_proposal`
--
ALTER TABLE `request_proposal`
  MODIFY `prp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenues`
--
ALTER TABLE `revenues`
  MODIFY `rwid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_services`
--
ALTER TABLE `seller_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_gallery`
--
ALTER TABLE `shop_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subservices`
--
ALTER TABLE `subservices`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_private_message`
--
ALTER TABLE `tbl_private_message`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

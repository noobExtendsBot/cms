-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2018 at 08:47 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_blog_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'JavaScript'),
(3, 'PHP'),
(9, 'CSS'),
(10, 'Procedural PHP'),
(14, 'Object Oriented PHP'),
(15, 'Python'),
(16, 'SEO');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) DEFAULT NULL,
  `comment_author` varchar(255) DEFAULT NULL,
  `comment_email` varchar(255) DEFAULT NULL,
  `comment_content` text,
  `comment_status` varchar(255) DEFAULT NULL,
  `comment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(22, 24, 'ed', 'd@gmail.com', 'adssadd', 'approved', '2018-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_author` varchar(255) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `post_image` text,
  `post_content` text,
  `post_tags` varchar(255) DEFAULT NULL,
  `post_comment_count` int(11) NOT NULL DEFAULT '0',
  `post_status` varchar(255) DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(1, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-03', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 1, 'published', 8),
(13, 3, 'PHP', 'Nazish', '2018-01-24', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 1, 'published', 1),
(16, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-01-29', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 1),
(17, 1, 'JavaScript Is awesome', 'diaz', '2018-01-29', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(19, 3, 'PHP is awesome', 'diaz', '2018-01-29', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(20, 3, 'PHP', 'Nazish', '2018-02-03', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(21, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-03', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(22, 1, 'JavaScript Is awesome', 'diaz', '2018-02-03', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(23, 3, 'PHP is awesome', 'diaz', '2018-02-03', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(24, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-03', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 1, 'published', 2),
(25, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-03', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(26, 3, 'PHP', 'Nazish', '2018-02-03', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(27, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-03', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(28, 1, 'JavaScript Is awesome', 'diaz', '2018-02-03', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(29, 3, 'PHP is awesome', 'diaz', '2018-02-03', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(30, 3, 'PHP', 'Nazish', '2018-02-03', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(31, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-03', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(32, 1, 'JavaScript Is awesome', 'diaz', '2018-02-03', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(33, 3, 'PHP is awesome', 'diaz', '2018-02-03', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(34, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-03', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(35, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(36, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(37, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(38, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(39, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(40, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(41, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(42, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(43, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(44, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(45, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(46, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(47, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(48, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(49, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(50, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(51, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(52, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(53, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(54, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(55, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(56, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(57, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(58, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(59, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(60, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(61, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(62, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(63, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(64, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(65, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(66, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(67, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(68, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(69, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(70, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(71, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(72, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(73, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(74, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(75, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(76, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(77, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(78, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(79, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(80, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(81, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(82, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(83, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(84, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(85, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(86, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(87, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(88, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(89, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(90, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(91, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(92, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(93, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(94, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(95, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(96, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(97, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(98, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(99, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(100, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(101, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(102, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(103, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(104, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(105, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(106, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(107, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(108, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(109, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(110, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(111, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(112, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(113, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(114, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(115, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(116, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(117, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(118, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(119, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(120, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(121, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(122, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(123, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(124, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(125, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(126, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(127, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(128, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(129, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(130, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(131, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(132, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(133, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(134, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(135, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(136, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(137, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(138, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(139, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(140, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(141, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(142, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(143, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(144, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(145, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(146, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(147, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(148, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(149, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0);
INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(150, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(151, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(152, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(153, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(154, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(155, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(156, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(157, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(158, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(159, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(160, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(161, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(162, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(163, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(164, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(165, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(166, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(167, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(168, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(169, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(170, 3, 'PHP', 'Nazish', '2018-02-10', 'banner-img.jpg', '<p><strong>This CMS was created using PHP, so you can see how good PHP is. This is why you should learn it and it was updated baby.</strong></p>', 'php,awesome', 0, 'published', 0),
(171, 3, 'PHP zend engine', 'Nazish Akhtar', '2018-02-10', 'php_development_banner.jpg', '<p>As soon as zend engine was added to php it became really awesome.</p>', 'zend,php', 0, 'published', 0),
(172, 1, 'JavaScript Is awesome', 'diaz', '2018-02-10', 'image_5.jpg', '<p>This is a excellent javascript course.</p>', 'javascript,course,good', 0, 'published', 0),
(173, 3, 'PHP is awesome', 'diaz', '2018-02-10', 'image_1.jpg', '<p>dssfsfdsfddsffds</p>', 'php,awesome', 0, 'published', 0),
(174, 3, 'Edwin\'s PHP course is awesome', 'John Doe', '2018-02-10', 'javascriptlogo-2.jpg', '<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', 'edwin, javascript,php', 0, 'published', 0),
(175, 1, 'some random post', 'new_admin', '2018-03-21', 'image_1.jpg', '<p>this is some dummy post to check :DDDDDD</p>', 'random post', 0, 'published', 4),
(176, 1, 'TEST POST', 'new_admin', '2018-03-23', 'javascriptlogo-2.jpg', '<p>asdsadaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasadsasddasdsdaasdsa&lt;script&gt;alert(1)&lt;/script&gt;</p>', 'random post', 0, 'published', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`) VALUES
(14, 'liz', '$1$L5k1FSNe$oB6PmlQvBg7oWd4.QvgJ30', '', '', 'liz@seven.com', NULL, 'subscriber'),
(15, 'ultear', '$2y$10$iusesomecrazystrings2ujgBayIXSu.OYcFnkWAk8t20fths6k0W', '', '', 'ul@fairy.com', NULL, 'admin'),
(16, 'wendy', '$2y$12$8CE4vY7Way8HU1NLtPm7LewUg.5LXsoRQLTbvj94Imz5K1bgc7vmS', 'Wendy', 'Scarlet', 'wendy@fairy.com', NULL, 'admin'),
(17, 'new_admin', '$2y$12$GdNOzHIK/RRaqgF.X5aup.19BZLXO4ZOvZczS1L7sds6maypjhbBO', 'New', 'Admin', 'ad@gmail.com', NULL, 'admin'),
(18, 'diaz', '$2y$12$u5JgoMtFLnUiB9FnQSHIKODQ2hLrOZEID4.UV9HMCbJ8kSz/M8W9q', 'Edwin', 'DIaz', 'diaz@gmail.com', NULL, 'admin'),
(19, '', '$2y$12$8ws40VTeHNtqqPoI7Cf3teYdb.woZ3cuyoFGJkm5PMTKi753kGzSC', '', '', '', NULL, 'subscriber'),
(20, 'nazish', '$2y$12$5e69QtYrwKx2PQhThsE8fOqskJPY3uIYdTHlR2Sh20rMWw1pJmJX.', '', '', 'n@gmail.com', NULL, 'subscriber');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` char(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(4, '16374f1dc159d68aef0b05f36cb24ff4', 1521043743),
(5, 'd020f53735c292083059d218edbfb045', 1521043743),
(6, '4931acec0dc1b116ae8ed0612114e141', 1521043743),
(7, 'f792a457ac270c142f01853cb866518a', 1521064892),
(8, '8a7667af5ff971f0197f96a84cebb25b', 1521059460),
(9, 'f33b853a842a5c9844f14660805c8856', 1521391639),
(10, 'cc72ca486457a6c65d7af2c0aa752aec', 1521168976),
(11, 'e740f0d4e751acc7fbed1012dd91566d', 1521230590),
(12, 'ef9a56fdf67411844a7bacba3852fc86', 1521252224),
(13, '9aa03491b1b3bd0d04baafcb9a02376a', 1521391605),
(14, '560f01a6352cc181174ec3c53ca8b192', 1521626286),
(15, '24ae8fe96b326ad7045155299e96f52c', 1521626344),
(16, '5dd0a6ed36dce881eee54cbb14e05be7', 1521747643),
(17, '5b4177ad7569cc732747d43cec8e7883', 1521786040),
(18, 'bdc845512a0be838951464fc97e82cf4', 1521806375),
(19, 'a90b87f50b2323edec7f1e78fc2b0e83', 1535208220);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_category_id` (`post_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_category_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

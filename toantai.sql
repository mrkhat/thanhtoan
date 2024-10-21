/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : toantai

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2017-05-28 00:26:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `ordering` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('2', '5', '', '', '99', '1', '0', '0', '2016-09-06 09:30:09', '2016-09-10 14:32:20');
INSERT INTO `articles` VALUES ('4', '5', '', '', '99', '1', '0', '0', '2016-09-06 09:29:50', '2016-09-06 09:29:50');
INSERT INTO `articles` VALUES ('5', '5', '', '', '99', '1', '0', '0', '2016-09-06 09:30:00', '2016-09-06 09:30:00');
INSERT INTO `articles` VALUES ('7', '10', '', '', '99', '1', '0', '0', '2016-09-12 20:12:37', '2016-09-12 20:12:37');
INSERT INTO `articles` VALUES ('8', '6', '', '', '99', '1', '0', '0', '2016-09-12 20:12:45', '2016-09-12 20:12:45');
INSERT INTO `articles` VALUES ('9', '9', '', '', '99', '1', '0', '0', '2016-09-12 20:12:54', '2016-09-12 20:12:54');
INSERT INTO `articles` VALUES ('10', '6', '', '', '99', '1', '0', '0', '2016-09-12 20:13:03', '2016-09-12 20:13:03');
INSERT INTO `articles` VALUES ('11', '9', '', '', '99', '1', '0', '0', '2016-09-12 20:13:13', '2016-09-12 20:13:13');
INSERT INTO `articles` VALUES ('12', '6', '', '', '99', '1', '0', '0', '2016-09-12 20:13:25', '2016-09-12 20:13:25');
INSERT INTO `articles` VALUES ('13', '10', '', '', '99', '1', '0', '0', '2016-09-12 20:13:38', '2016-09-12 20:13:38');
INSERT INTO `articles` VALUES ('14', '6', '', '', '99', '1', '0', '0', '2016-09-12 20:13:49', '2016-09-12 20:13:49');
INSERT INTO `articles` VALUES ('15', '5', '', '', '99', '1', '0', '0', '2016-09-12 20:14:00', '2016-09-12 20:14:00');

-- ----------------------------
-- Table structure for article_language
-- ----------------------------
DROP TABLE IF EXISTS `article_language`;
CREATE TABLE `article_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `introduce` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `language_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `language_id` (`language_id`),
  KEY `article_id` (`article_id`),
  CONSTRAINT `article_language_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `article_language_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_language
-- ----------------------------
INSERT INTO `article_language` VALUES ('4', 'dddddddddddddddddddd', 'dfs', '<p>sdf</p>\r\n', '1', '4');
INSERT INTO `article_language` VALUES ('5', 'dfs', 'dsf', '<p>sdfdfdfdf</p>\r\n', '1', '5');
INSERT INTO `article_language` VALUES ('6', 'dfs', 'fdssdf', '<p><img alt=\"\" src=\"/upload/images/12345.jpg\" style=\"width: 792px; height: 1056px;\" />dsffds</p>\r\n', '1', '2');
INSERT INTO `article_language` VALUES ('7', 'dsadsad', 'adad', '<p>adada</p>\r\n', '2', '2');
INSERT INTO `article_language` VALUES ('8', 'sasaas', 'sas', '<p>aas</p>\r\n', '2', '5');
INSERT INTO `article_language` VALUES ('9', 'bai viet so ', 'adada', '<p>sd</p>\r\n', '1', '7');
INSERT INTO `article_language` VALUES ('10', 'sdad', 'sad', '<p>sdasd</p>\r\n', '1', '8');
INSERT INTO `article_language` VALUES ('11', 'dsada', 'sad', '<p>dsa</p>\r\n', '1', '9');
INSERT INTO `article_language` VALUES ('12', 'dfsssssss', 'fdsfsfsfs', '<p>sdffs</p>\r\n', '1', '10');
INSERT INTO `article_language` VALUES ('13', 'fdsfdsdf', 'fsdsdfdfs', '<p>fdssdfdfs</p>\r\n', '1', '11');
INSERT INTO `article_language` VALUES ('14', 'dfsfs', 'fdsfsdfds', '<p>sdffsdsdf</p>\r\n', '1', '12');
INSERT INTO `article_language` VALUES ('15', 'dssssssssssss', 'fdsfsf', '<p>sfsfs</p>\r\n', '1', '13');
INSERT INTO `article_language` VALUES ('16', 'ddddddddddddd ', 'sdfsdfs', '<p>dfsfsfs</p>\r\n', '1', '14');
INSERT INTO `article_language` VALUES ('17', 'ddsfd sdfs sdf sf', ' sf sdf ', '<p>sf sffsdfs</p>\r\n', '1', '15');

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `banner` varchar(300) NOT NULL,
  `page` int(11) NOT NULL,
  `ordern` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES ('7', 'sad', 'banners/smdn-banner-thoi-trang-tre-em-28-06-2014-09-06-00mongtron9-jpg.jpg', '2', '99', '1', '2016-09-06 14:25:56', '2016-09-06 14:46:11');

-- ----------------------------
-- Table structure for careers
-- ----------------------------
DROP TABLE IF EXISTS `careers`;
CREATE TABLE `careers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of careers
-- ----------------------------
INSERT INTO `careers` VALUES ('2', '', '1', '0000-00-00', '0000-00-00');
INSERT INTO `careers` VALUES ('3', '', '1', '0000-00-00', '0000-00-00');
INSERT INTO `careers` VALUES ('8', '', '1', '2016-09-09', '2016-09-09');
INSERT INTO `careers` VALUES ('9', '', '1', '2016-09-09', '2016-09-09');

-- ----------------------------
-- Table structure for career_language
-- ----------------------------
DROP TABLE IF EXISTS `career_language`;
CREATE TABLE `career_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `career_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `career_id` (`career_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `career_language_ibfk_1` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`),
  CONSTRAINT `career_language_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of career_language
-- ----------------------------
INSERT INTO `career_language` VALUES ('10', 'test', '<p>sad</p>\r\n', '8', '1');
INSERT INTO `career_language` VALUES ('11', 'test2', '<p>sad</p>\r\n', '9', '1');
INSERT INTO `career_language` VALUES ('12', 'sdada', '<p>dsa</p>\r\n', '8', '2');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `image` varchar(200) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '99',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'tin-benh-vien-1212131', '0', 'categories/smdn-category-mau3-jpg.jpg', '1', '2016-08-04 06:38:16', '2016-08-05 00:19:16');
INSERT INTO `categories` VALUES ('2', '5151', '1', '', '1', '2016-08-04 13:04:04', '2016-08-04 13:04:04');
INSERT INTO `categories` VALUES ('3', 'era', '1', '', '12', '2016-08-04 13:05:03', '2016-08-04 13:05:03');
INSERT INTO `categories` VALUES ('4', '', '1', '', '1', '2016-08-07 14:31:33', '2016-08-07 14:31:33');
INSERT INTO `categories` VALUES ('5', 'baio-so-1', '1', 'categories/smdn-category-logo-vnpt-vector-jpg.jpg', '213', '2016-08-14 10:31:52', '2016-09-03 10:59:17');
INSERT INTO `categories` VALUES ('6', '', '1', '', '213', '2016-08-14 11:37:06', '2016-08-14 11:37:06');
INSERT INTO `categories` VALUES ('9', '', '1', 'categories/smdn-category-img-4904-jpg.jpg', '99', '2016-08-21 10:49:34', '2016-08-21 10:49:34');
INSERT INTO `categories` VALUES ('10', 'nguyen-khanh-thoai', '1', 'categories/smdn-category-img-4904-jpg.jpg', '99', '2016-08-21 10:50:08', '2016-09-06 16:45:52');

-- ----------------------------
-- Table structure for category_language
-- ----------------------------
DROP TABLE IF EXISTS `category_language`;
CREATE TABLE `category_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `category_language_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `category_language_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category_language
-- ----------------------------
INSERT INTO `category_language` VALUES ('1', 'baio so 1', '<p>sdaddssssssssssssssssssssssssssssss</p>\r\n', '5', '1');
INSERT INTO `category_language` VALUES ('2', 'tieng anh bai so 1', '<p>rte</p>\r\n', '5', '2');
INSERT INTO `category_language` VALUES ('3', 'test bai viet so 1', '<p>sda</p>\r\n', '6', '1');
INSERT INTO `category_language` VALUES ('6', 'sdadadadada', '<p>sdaada</p>\r\n', '9', '1');
INSERT INTO `category_language` VALUES ('7', 'nguyen khanh thoai', '<p>sdadddddddddddddddd</p>\r\n', '10', '1');
INSERT INTO `category_language` VALUES ('8', 'bvfg', '<p>gfdgffd</p>\r\n', '10', '2');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `activate` int(11) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'sfd dsfs', '', '', '', '0000-00-00 00:00:00', '1', null);
INSERT INTO `customer` VALUES ('2', '32131', '', '', '', '2034-04-03 00:00:00', '0', null);

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ordering` int(11) DEFAULT '99',
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `galary` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES ('22', 'smdn-department-untitled-png.png', 'department', '1', '324', '2016-08-14 10:45:39', '2016-09-03 11:00:54', null);
INSERT INTO `departments` VALUES ('23', 'smdn-department-logo-vnpt-vector-jpg.jpg', 'test', '1', '213', '2016-08-14 11:05:22', '2016-09-12 11:26:13', '[]');
INSERT INTO `departments` VALUES ('24', 'smdn-department-bn1-jpg.jpg', 'department', '1', '12', '2016-08-14 11:13:23', '2016-09-12 11:55:11', '{\"6\":\"smdn-department-1473655632.jpg\",\"7\":\"smdn-department-1473656110.jpg\"}');
INSERT INTO `departments` VALUES ('25', '', '', '1', null, '2016-08-14 11:13:49', '2016-08-14 11:13:49', null);
INSERT INTO `departments` VALUES ('26', '', '', '1', '123', '2016-08-14 11:14:02', '2016-08-14 11:14:02', null);
INSERT INTO `departments` VALUES ('27', '', '', '1', '12', '2016-08-14 11:16:27', '2016-08-14 11:16:27', null);
INSERT INTO `departments` VALUES ('28', 'departments/smdn-department-img-2107-jpg.jpg', '', '1', null, '2016-08-14 11:17:48', '2016-08-14 11:17:48', null);
INSERT INTO `departments` VALUES ('29', 'departments/smdn-department-img-2107-jpg.jpg', '', '1', '21', '2016-08-14 11:18:06', '2016-08-14 11:18:06', null);

-- ----------------------------
-- Table structure for department_language
-- ----------------------------
DROP TABLE IF EXISTS `department_language`;
CREATE TABLE `department_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `introduce` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `department_language_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  CONSTRAINT `department_language_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department_language
-- ----------------------------
INSERT INTO `department_language` VALUES ('9', 'test', 'sda', '<p>sda</p>\r\n', '23', '1');
INSERT INTO `department_language` VALUES ('10', 'department', 'dsa', '<p>sda</p>\r\n', '24', '1');
INSERT INTO `department_language` VALUES ('11', 'department', 'sda', '<p>dsa</p>\r\n', '25', '1');
INSERT INTO `department_language` VALUES ('12', 'tieng anh', 'dsa', '<p>dsasda</p>\r\n', '26', '1');
INSERT INTO `department_language` VALUES ('13', 'nội thần kinh', 'af', '<p>saw</p>\r\n', '27', '1');
INSERT INTO `department_language` VALUES ('14', 'tieng anh', 'sad', '<p>dsa</p>\r\n', '28', '1');
INSERT INTO `department_language` VALUES ('15', 'tieng anh', 'as', '<p>AS</p>\r\n', '29', '1');

-- ----------------------------
-- Table structure for doctors
-- ----------------------------
DROP TABLE IF EXISTS `doctors`;
CREATE TABLE `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `ordering` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doctors
-- ----------------------------
INSERT INTO `doctors` VALUES ('2', '22', 'test1', 'doctors/smdn-doctor-img-4904-jpg.jpg', '1', '2016-08-14 22:18:13', '0', '2016-08-14 22:18:13', null, null);
INSERT INTO `doctors` VALUES ('3', '22', 'test1', 'doctors/smdn-doctor-img-4904-jpg.jpg', '1', '2016-08-14 22:19:35', '0', '2016-08-14 22:19:35', null, null);
INSERT INTO `doctors` VALUES ('4', '22', 'test1', 'doctors/smdn-doctor-img-4904-jpg.jpg', '1', '2016-08-14 22:20:34', '0', '2016-08-14 22:20:34', null, null);
INSERT INTO `doctors` VALUES ('5', '22', 'test1', 'doctors/smdn-doctor-img-4904-jpg.jpg', '1', '2016-08-14 22:20:56', '0', '2016-08-14 22:20:56', null, null);
INSERT INTO `doctors` VALUES ('7', '23', 'test1', '', '1', '2016-08-14 22:31:52', '0', '2016-09-10 09:10:21', null, null);
INSERT INTO `doctors` VALUES ('8', '24', 'sad', '', '1', '2016-08-14 22:35:26', '0', '2016-08-14 22:35:37', null, null);
INSERT INTO `doctors` VALUES ('13', '27', 'nguyen-van-b', '', '1', '2016-09-10 11:08:33', '99', '2016-09-10 11:08:33', null, null);
INSERT INTO `doctors` VALUES ('14', '25', 'sd', '', '1', '2016-09-12 16:42:44', '99', '2016-09-12 16:42:44', 'xc', 'sdas');

-- ----------------------------
-- Table structure for doctor_language
-- ----------------------------
DROP TABLE IF EXISTS `doctor_language`;
CREATE TABLE `doctor_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `doctor_language_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  CONSTRAINT `doctor_language_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doctor_language
-- ----------------------------
INSERT INTO `doctor_language` VALUES ('3', 'test1', '<p>sadda</p>\r\n', '7', '1');
INSERT INTO `doctor_language` VALUES ('4', 'sad', '<p>dsa</p>\r\n', '8', '1');
INSERT INTO `doctor_language` VALUES ('10', 'nguyễn văn b', '<p>sda</p>\r\n', '13', '1');
INSERT INTO `doctor_language` VALUES ('11', 'sd', '<p>sddsa</p>\r\n', '14', '1');

-- ----------------------------
-- Table structure for faqs
-- ----------------------------
DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faq_category_id` (`faq_category_id`),
  CONSTRAINT `faqs_ibfk_1` FOREIGN KEY (`faq_category_id`) REFERENCES `faq_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of faqs
-- ----------------------------
INSERT INTO `faqs` VALUES ('1', '1', '1', '', '2016-08-21 10:13:42', '2016-09-06 12:36:40');
INSERT INTO `faqs` VALUES ('2', '1', '1', '', '2016-08-21 10:13:59', '2016-08-21 10:13:59');
INSERT INTO `faqs` VALUES ('3', '1', '1', '', '2016-08-21 10:23:11', '2016-08-21 10:29:27');

-- ----------------------------
-- Table structure for faq_categories
-- ----------------------------
DROP TABLE IF EXISTS `faq_categories`;
CREATE TABLE `faq_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of faq_categories
-- ----------------------------
INSERT INTO `faq_categories` VALUES ('1', '1', 'fds', '2016-08-20 13:19:50', '2016-08-20 13:19:50');

-- ----------------------------
-- Table structure for faq_category_language
-- ----------------------------
DROP TABLE IF EXISTS `faq_category_language`;
CREATE TABLE `faq_category_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `faq_category_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faq_category_id` (`faq_category_id`),
  KEY `languageid` (`language_id`),
  CONSTRAINT `faq_category_language_ibfk_1` FOREIGN KEY (`faq_category_id`) REFERENCES `faq_categories` (`id`),
  CONSTRAINT `faq_category_language_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of faq_category_language
-- ----------------------------
INSERT INTO `faq_category_language` VALUES ('1', 'fds', '1', '1');
INSERT INTO `faq_category_language` VALUES ('4', 'sdada', '1', '2');

-- ----------------------------
-- Table structure for faq_language
-- ----------------------------
DROP TABLE IF EXISTS `faq_language`;
CREATE TABLE `faq_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `answer` text NOT NULL,
  `faq_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faq_id` (`faq_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `faq_language_ibfk_1` FOREIGN KEY (`faq_id`) REFERENCES `faqs` (`id`),
  CONSTRAINT `faq_language_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of faq_language
-- ----------------------------
INSERT INTO `faq_language` VALUES ('1', '<p>dsada</p>\r\n', '<p>dasda</p>\r\n', '2', '1');
INSERT INTO `faq_language` VALUES ('2', '<p>sadsssssssssssssssssssssssssssss</p>\r\n', '<p>dsadsasdassssssssssssss</p>\r\n', '3', '1');
INSERT INTO `faq_language` VALUES ('3', '<p>sdaadadasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss saadddddd</p>\r\n', '<p>sdadada sadsssssssssssssssssc sadsa saaaaaaaaaa ssssssss saaaaaaaaa ssssssdddddddd &nbsp; fg</p>\r\n', '1', '1');
INSERT INTO `faq_language` VALUES ('4', '<p>dddddddddddddddddddddddddddddddddddddd</p>\r\n', '<p>dddddddddddddddddddddddddddddddddddddddsssssssss</p>\r\n', '3', '2');

-- ----------------------------
-- Table structure for galleries
-- ----------------------------
DROP TABLE IF EXISTS `galleries`;
CREATE TABLE `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of galleries
-- ----------------------------
INSERT INTO `galleries` VALUES ('1', '0', '0', '1', '0000-00-00', '0000-00-00');
INSERT INTO `galleries` VALUES ('3', 'smdn-gallery-160226024226-151009020751-logo-2-jpg.jpg', '[\"smdn-gallery-dsc-6826-jpg.jpg\",\"smdn-gallery-untitled-png.png\",\"smdn-gallery-screenshot2-png.png\"]', '1', '0000-00-00', '0000-00-00');

-- ----------------------------
-- Table structure for gallery_language
-- ----------------------------
DROP TABLE IF EXISTS `gallery_language`;
CREATE TABLE `gallery_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `language_id` (`language_id`),
  KEY `gallery_id` (`gallery_id`),
  CONSTRAINT `gallery_language_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `gallery_language_ibfk_2` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gallery_language
-- ----------------------------
INSERT INTO `gallery_language` VALUES ('2', 'dsf', '<p>dfs</p>\r\n', '3', '1');

-- ----------------------------
-- Table structure for languages
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `code` varchar(5) NOT NULL,
  `default` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES ('1', 'Tiếng Việt', 'vi', '1', '1', '0', '2016-08-03 12:15:58', '2016-09-06 14:09:16');
INSERT INTO `languages` VALUES ('2', 'English', 'en', '0', '1', '0', '2016-08-03 12:16:34', '2016-09-06 14:09:27');
INSERT INTO `languages` VALUES ('3', 'Taiwan', 'tw', '0', '1', '0', '2016-08-03 12:17:08', '2016-08-03 12:17:08');

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `option` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', '1', '0', '0', '#', 'fdgdg ffffffffff', '0000-00-00 00:00:00', '2016-09-12 16:15:12', '0');
INSERT INTO `menus` VALUES ('3', '1', '3', '0', '#', '', '0000-00-00 00:00:00', '2016-09-12 19:28:11', '0');
INSERT INTO `menus` VALUES ('5', '1', '1', '4', '#', '', '0000-00-00 00:00:00', '2016-09-05 11:49:03', '0');
INSERT INTO `menus` VALUES ('7', '1', '2', '3', '#', '', '0000-00-00 00:00:00', '2016-09-05 11:48:55', '0');
INSERT INTO `menus` VALUES ('8', '1', '1', '3', '#', '', '0000-00-00 00:00:00', '2016-09-05 11:48:49', '0');
INSERT INTO `menus` VALUES ('9', '1', '4', '0', '#', '', '0000-00-00 00:00:00', null, '0');
INSERT INTO `menus` VALUES ('10', '1', '5', '0', '#', '', '0000-00-00 00:00:00', null, '0');
INSERT INTO `menus` VALUES ('11', '1', '6', '0', '#', '', '0000-00-00 00:00:00', null, '0');
INSERT INTO `menus` VALUES ('12', '1', '7', '0', '#', '', '0000-00-00 00:00:00', null, '0');
INSERT INTO `menus` VALUES ('13', '1', '8', '0', '#', '', '0000-00-00 00:00:00', null, '0');
INSERT INTO `menus` VALUES ('14', '1', '99', '0', '#', '', '2016-09-08 13:05:47', '2016-09-08 13:05:47', '1');
INSERT INTO `menus` VALUES ('15', '1', '99', '0', '#', '', '2016-09-08 13:06:27', '2016-09-08 13:06:27', '0');
INSERT INTO `menus` VALUES ('16', '1', '99', '0', '#', '', '2016-09-08 13:08:34', '2016-09-08 13:08:34', '0');

-- ----------------------------
-- Table structure for menu_language
-- ----------------------------
DROP TABLE IF EXISTS `menu_language`;
CREATE TABLE `menu_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `introduce` text,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `menu_language_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  CONSTRAINT `menu_language_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu_language
-- ----------------------------
INSERT INTO `menu_language` VALUES ('1', '1', '1', 'menu', null);
INSERT INTO `menu_language` VALUES ('14', '3', '1', 'Tin Tức', '<p>saddddddddd</p>\r\n');
INSERT INTO `menu_language` VALUES ('16', '5', '1', 'Sơ Đồ Tổ Chức', null);
INSERT INTO `menu_language` VALUES ('18', '7', '1', 'Tin Hoạt Động', null);
INSERT INTO `menu_language` VALUES ('19', '8', '1', 'Tin Y Học', null);
INSERT INTO `menu_language` VALUES ('20', '9', '1', 'Thông Tin Cho Bệnh Nhân', null);
INSERT INTO `menu_language` VALUES ('21', '10', '1', 'Quy Trình Khám Chữa Bệnh', null);
INSERT INTO `menu_language` VALUES ('22', '11', '1', 'Dịch Vụ', null);
INSERT INTO `menu_language` VALUES ('23', '12', '1', 'Hình Ảnh', null);
INSERT INTO `menu_language` VALUES ('24', '13', '1', 'Tuyễn Dụng', null);
INSERT INTO `menu_language` VALUES ('25', '14', '1', 'wqewqe', null);
INSERT INTO `menu_language` VALUES ('26', '15', '1', 'dsffds', null);
INSERT INTO `menu_language` VALUES ('27', '16', '1', 'fsfsdfs', null);

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1', '1', 'dsaasd', '0', '0', '2016-09-09 09:09:38', '2016-09-09 09:09:38');
INSERT INTO `pages` VALUES ('2', '1', 'test', '0', '0', '2016-09-09 09:09:43', '2016-09-09 09:16:13');

-- ----------------------------
-- Table structure for page_language
-- ----------------------------
DROP TABLE IF EXISTS `page_language`;
CREATE TABLE `page_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `language_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `language_id` (`language_id`),
  KEY `page_id` (`page_id`),
  CONSTRAINT `page_language_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `page_language_ibfk_2` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page_language
-- ----------------------------
INSERT INTO `page_language` VALUES ('1', 'test', '<p>DSAdddddddddddddddddd</p>\r\n', '1', '2');
INSERT INTO `page_language` VALUES ('3', 'dddddddddd', '<p>dfssfdfsd</p>\r\n', '2', '2');

-- ----------------------------
-- Table structure for partner
-- ----------------------------
DROP TABLE IF EXISTS `partner`;
CREATE TABLE `partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `attach` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- ----------------------------
-- Records of partner
-- ----------------------------
INSERT INTO `partner` VALUES ('5', 'hafale', 'Anh Kiệt', 'giam doc', '0901235547', 'nguyenvan@gmail.com', '50%', 'dsfs', '');
INSERT INTO `partner` VALUES ('6', 'dfsf', 'dsfdf', '', '', '', '', '', '');
INSERT INTO `partner` VALUES ('7', 'dfsf', 'dsfdf', '', '', '', '', '', '');
INSERT INTO `partner` VALUES ('8', 'gdf', 'rte', '', '', '', '', '', '');
INSERT INTO `partner` VALUES ('9', 'gdf', 'rte', '', '', '', '', '', '');
INSERT INTO `partner` VALUES ('10', 'gdf', 'rte', '', '', '', '', '', '');
INSERT INTO `partner` VALUES ('11', 'gdf', 'rte', '', '', '', '', '', '');
INSERT INTO `partner` VALUES ('12', 'gdf', 'rte', '', '', '', '', '', '');
INSERT INTO `partner` VALUES ('13', 'gdf', 'rte', '', '', '', '', '', 'baogia1495812268.jpg');
INSERT INTO `partner` VALUES ('14', 'hlo0oo', 'sad', '', '', '', '', '', '');
INSERT INTO `partner` VALUES ('15', 'fddfdfdfdfdf', 'fg', '', '', '', '', '', 'baogia1495812488.jpg');
INSERT INTO `partner` VALUES ('16', 'g', 'fggfdgfdgd', 'dfs', 'dsf', 'dsf', 'sdf', 'dsfsdf', 'baogia1495812525.jpg');
INSERT INTO `partner` VALUES ('17', 'sad', 'dassaddsa', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for schedules
-- ----------------------------
DROP TABLE IF EXISTS `schedules`;
CREATE TABLE `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `working_day` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of schedules
-- ----------------------------
INSERT INTO `schedules` VALUES ('1', '7', '1', '1', '1');
INSERT INTO `schedules` VALUES ('2', '8', '1', '2', '1');
INSERT INTO `schedules` VALUES ('3', '13', '2', '1', '1');
INSERT INTO `schedules` VALUES ('4', '8', '5', '2', '1');
INSERT INTO `schedules` VALUES ('5', '13', '7', '1', '1');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'sad', 'sdada');

-- ----------------------------
-- Table structure for testimonials
-- ----------------------------
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_name` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of testimonials
-- ----------------------------

-- ----------------------------
-- Table structure for testimonial_language
-- ----------------------------
DROP TABLE IF EXISTS `testimonial_language`;
CREATE TABLE `testimonial_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` int(11) NOT NULL,
  `testimonial_id` int(11) NOT NULL,
  `languageid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `testimonial_id` (`testimonial_id`),
  KEY `languageid` (`languageid`),
  CONSTRAINT `testimonial_language_ibfk_1` FOREIGN KEY (`testimonial_id`) REFERENCES `testimonials` (`id`),
  CONSTRAINT `testimonial_language_ibfk_2` FOREIGN KEY (`languageid`) REFERENCES `languages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of testimonial_language
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password_hash` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `auth_key` varchar(200) NOT NULL,
  `active_key` varchar(50) NOT NULL,
  `password_reset_token` varchar(50) NOT NULL,
  `login_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_type` (`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=1049 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1045', 'Administrator', 'User', 'admin@toantai.com', '$2y$13$nNdyN.EpKuS0LFa83XFgNOK4Hi4VgNMKRJvd.RoVvev17sLJnYqNa', '30', '30', '1', 'C6gWlGmii83YoDVUFmX5FiFOXdcnU6KO', '', '', '2017-05-26 15:09:50', '2015-10-24 06:30:37', '2017-05-26 20:09:50');
INSERT INTO `users` VALUES ('1046', 'thoai', 'nk', 'thoaink@smdn.com', '$2y$13$8CfS4OR2NGxubbr4A.zTiezHGq1.LVBmypb2jADdfocNaeXs7BXbu', '10', '0', '1', '', '', '', '0000-00-00 00:00:00', '2016-09-11 10:48:15', '2016-09-12 18:26:38');
INSERT INTO `users` VALUES ('1047', 'mrkhat', 'nguyen', 'qwe@gasd.com', '$2y$13$iBHB9VVy9wtQOJrbrA25C.8IW/CEH.p/l8JOGtumu9eKEnS2CNAF6', '10', '10', '1', '', '', '', '0000-00-00 00:00:00', '2016-09-11 11:06:59', '2016-09-12 18:19:37');
INSERT INTO `users` VALUES ('1048', '324', '324', '234@sda.com', '$2y$13$qWsWBv5EfSCgxy8Dsx1OkuWY63GwEXKEu8HXi87xxSo4csqeVF/jK', '10', '0', '1', '', '', '', '0000-00-00 00:00:00', '2016-09-12 18:18:44', '2016-09-12 18:18:44');

-- ----------------------------
-- Table structure for user_types
-- ----------------------------
DROP TABLE IF EXISTS `user_types`;
CREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_types
-- ----------------------------
INSERT INTO `user_types` VALUES ('10', 'Nomal User', '1');
INSERT INTO `user_types` VALUES ('20', 'Content Manager', '1');
INSERT INTO `user_types` VALUES ('30', 'Administrator', '1');

-- ----------------------------
-- View structure for articles_information
-- ----------------------------
DROP VIEW IF EXISTS `articles_information`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `articles_information` AS select `articles`.`id` AS `id`,`article_language`.`id` AS `artlang_id`,`article_language`.`title` AS `title`,`article_language`.`introduce` AS `introduce`,`article_language`.`description` AS `description`,`articles`.`slug` AS `slug`,`articles`.`image` AS `image`,`articles`.`status` AS `status`,`articles`.`created_date` AS `created_date`,`languages`.`name` AS `language`,`languages`.`id` AS `language_id`,`languages`.`code` AS `code`,`languages`.`default` AS `default`,`articles`.`modified_date` AS `modified_date`,`articles`.`category_id` AS `category_id`,`category_language`.`title` AS `category` from (((`articles` join `article_language` on((`article_language`.`article_id` = `articles`.`id`))) join `languages` on(((`article_language`.`language_id` = `languages`.`id`) and (`languages`.`status` = 1)))) join `category_language` on(((`category_language`.`language_id` = `languages`.`id`) and (`articles`.`category_id` = `category_language`.`category_id`)))); ;

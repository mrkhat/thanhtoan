/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : toantai

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2017-06-08 00:05:31
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `birthday` date DEFAULT NULL,
  `activate` int(11) DEFAULT NULL,
  `note` text,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'sfd dsfs', '', '', '', '2013-03-12', '1', null, null);
INSERT INTO `customer` VALUES ('2', '32131', '', '', '', '2034-04-03', '1', null, null);
INSERT INTO `customer` VALUES ('3', '23131', '', '', '', '2014-01-02', '0', null, '2017-05-28');
INSERT INTO `customer` VALUES ('4', '3123131', '', '', '', null, '0', null, '2017-05-28');
INSERT INTO `customer` VALUES ('5', 'dfsdfs', '', '', '', null, '0', null, '2017-05-28');
INSERT INTO `customer` VALUES ('6', 'sdada', '', '', '', null, '0', null, '2017-05-28');
INSERT INTO `customer` VALUES ('7', 'sdfs', '', 'fsd', 'nghuyer@gmail.com', null, '0', null, '2017-05-29');

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
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `money` int(255) DEFAULT NULL,
  `deliver` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `receiver` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `project_id` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `attach` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified_by` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- ----------------------------
-- Records of payment
-- ----------------------------
INSERT INTO `payment` VALUES ('1', 'dfgdfgd', null, '3424242', '1045', '24234 2342', '2', '', '', null, null);
INSERT INTO `payment` VALUES ('2', 'ghjgjg', null, '2147483647', '1047', 'hghgj', '2', '', 'hoadon1496141972.pdf', '2017-04-19', null);
INSERT INTO `payment` VALUES ('3', 'sdf s', null, '322222', '1046', '432234', '2', '', 'hoadon1496141954.pdf', '2017-06-08', null);
INSERT INTO `payment` VALUES ('4', ' asd asd', null, '2131123131', '1046', 'adasda', '2', '', '', '2017-05-14', null);
INSERT INTO `payment` VALUES ('5', 'weq', null, '2112313131', '1047', 'sad asda', '2', '', '', '2017-05-30', null);
INSERT INTO `payment` VALUES ('6', 'wdqew q', null, '12312313', '1048', 'wqeeq', '2', '', '', '2017-05-30', null);
INSERT INTO `payment` VALUES ('7', 'wewer werw rw', null, '2147483647', '1046', '432342342', '2', '', '', '2017-05-27', null);
INSERT INTO `payment` VALUES ('8', '32423432', null, '23424324', '1045', '423424', '2', '', '', '2017-05-30', null);
INSERT INTO `payment` VALUES ('9', '342243', null, '2147483647', '1048', '432423432', '2', '', '', '2017-05-09', null);
INSERT INTO `payment` VALUES ('10', 'ds sdsaf sdf', null, '342424', '1047', 'fdsafsad', '2', ' saf asf asf', '', '0000-00-00', null);
INSERT INTO `payment` VALUES ('11', 'ewrw wer wr', null, '324242', '1048', 'fsfsfs', '2', '', '', '2017-05-30', null);
INSERT INTO `payment` VALUES ('12', 'sdfsfs', '1045', '12312231', '1045', ' 23424 23423 ', '2', '', '', '2017-06-07', '1045');

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `guarantee` date DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `attach` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('2', 'dự án 1', '2', '12343', '2010-01-03', 'sdad sada asdd ád', '0', '', null);
INSERT INTO `project` VALUES ('3', 'dfs sd sdff sdf', '1', '2147483647', '2044-03-02', '', '0', 'hopdong1496069598.jpg', '2017-05-29');

-- ----------------------------
-- Table structure for recive
-- ----------------------------
DROP TABLE IF EXISTS `recive`;
CREATE TABLE `recive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `deliver` varchar(255) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `attach` varchar(255) DEFAULT NULL,
  `step` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of recive
-- ----------------------------
INSERT INTO `recive` VALUES ('1', 'yhgjhgj', null, '123456456', 'utiuoli;l', '1045', '2', '', '2017-05-31', '', '1', null);
INSERT INTO `recive` VALUES ('2', 'fg', null, '4353453', '435353', '1046', '2', '', '2017-05-31', '', '2', null);
INSERT INTO `recive` VALUES ('3', 'sdadada', '1045', '12312321', 'qưeqeq', '1047', '2', '', '2030-11-01', '', '2', '1045');

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
  `phone` varchar(255) DEFAULT NULL,
  `attach` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_type` (`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=1050 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1045', 'Administrator', '1', 'admin@toantai.com', '$2y$13$nNdyN.EpKuS0LFa83XFgNOK4Hi4VgNMKRJvd.RoVvev17sLJnYqNa', '30', '30', '1', 'C6gWlGmii83YoDVUFmX5FiFOXdcnU6KO', '', '', '2017-05-26 15:09:50', '2015-10-24 06:30:37', '2017-05-26 20:09:50', null, null);
INSERT INTO `users` VALUES ('1046', 'thoai', '1', 'thoaink@smdn.com', '$2y$13$8CfS4OR2NGxubbr4A.zTiezHGq1.LVBmypb2jADdfocNaeXs7BXbu', '10', '0', '1', '', '', '', '0000-00-00 00:00:00', '2016-09-11 10:48:15', '2016-09-12 18:26:38', null, null);
INSERT INTO `users` VALUES ('1047', 'mrkhat', '1', 'qwe@gasd.com', '$2y$13$iBHB9VVy9wtQOJrbrA25C.8IW/CEH.p/l8JOGtumu9eKEnS2CNAF6', '10', '10', '1', '', '', '', '0000-00-00 00:00:00', '2016-09-11 11:06:59', '2017-06-02 07:57:44', '', 'avata1496365064.jpg');
INSERT INTO `users` VALUES ('1048', '324', '1', '234@sda.com', '$2y$13$qWsWBv5EfSCgxy8Dsx1OkuWY63GwEXKEu8HXi87xxSo4csqeVF/jK', '10', '10', '1', '', '', '', '0000-00-00 00:00:00', '2016-09-12 18:18:44', '2017-06-02 07:48:00', '', '');
INSERT INTO `users` VALUES ('1049', 'ưadsa', '1', '123@gmail.com', '$2y$13$nIa1YY3dxhFaS2BSjhFCcO.giOjYn76gMtsYUeQx9TyBA30WgT8kS', '10', '10', '0', '', '', '', '0000-00-00 00:00:00', '2017-06-01 20:54:29', '2017-06-01 20:54:29', '', 'avata1496327156');

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
-- Table structure for work_list
-- ----------------------------
DROP TABLE IF EXISTS `work_list`;
CREATE TABLE `work_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_german2_ci DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- ----------------------------
-- Records of work_list
-- ----------------------------
INSERT INTO `work_list` VALUES ('1', '52231', '1047', '', '0', null);
INSERT INTO `work_list` VALUES ('3', '123', '1045', '', '1', '2030-11-01');
INSERT INTO `work_list` VALUES ('4', '123456', null, '', '0', '2030-11-01');
INSERT INTO `work_list` VALUES ('5', 'asdaa', '1045', '', '1', '0000-00-00');

-- ----------------------------
-- View structure for project_infomation
-- ----------------------------
DROP VIEW IF EXISTS `project_infomation`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `project_infomation` AS SELECT
project.id,
project.`name`,
project.customer_id,
project.money,
project.guarantee,
project.note,
project.`status`,
project.attach,
project.created,
(SELECT SUM(money) FROM payment where id=project.id) as payment,
(SELECT SUM(money) FROM recive where id=project.id) as recive
FROM
project ;

/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : toantai

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2017-06-01 22:01:55
*/

SET FOREIGN_KEY_CHECKS=0;

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
INSERT INTO `users` VALUES ('1047', 'mrkhat', '1', 'qwe@gasd.com', '$2y$13$iBHB9VVy9wtQOJrbrA25C.8IW/CEH.p/l8JOGtumu9eKEnS2CNAF6', '10', '10', '1', '', '', '', '0000-00-00 00:00:00', '2016-09-11 11:06:59', '2016-09-12 18:19:37', null, 'avata1496327156');
INSERT INTO `users` VALUES ('1048', '324', '1', '234@sda.com', '$2y$13$qWsWBv5EfSCgxy8Dsx1OkuWY63GwEXKEu8HXi87xxSo4csqeVF/jK', '10', '0', '1', '', '', '', '0000-00-00 00:00:00', '2016-09-12 18:18:44', '2016-09-12 18:18:44', null, 'avata1496327156');
INSERT INTO `users` VALUES ('1049', 'ưadsa', '1', '123@gmail.com', '$2y$13$nIa1YY3dxhFaS2BSjhFCcO.giOjYn76gMtsYUeQx9TyBA30WgT8kS', '10', '10', '0', '', '', '', '0000-00-00 00:00:00', '2017-06-01 20:54:29', '2017-06-01 20:54:29', '', 'avata1496327156');

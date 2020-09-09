/*
 Navicat Premium Data Transfer

 Source Server         : connection
 Source Server Type    : MySQL
 Source Server Version : 100133
 Source Host           : localhost:3306
 Source Schema         : designer

 Target Server Type    : MySQL
 Target Server Version : 100133
 File Encoding         : 65001

 Date: 10/09/2020 01:31:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact`  (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone1` int(11) NOT NULL,
  `phone2` int(11) NOT NULL,
  PRIMARY KEY (`contact_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES (1, ' Address : 13 ST Abd elkader baker  Madint Nasr - Cairo', 'HamzaFashionCuture@gmail.com', 1067200974, 1550543626);

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `department_name_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `department_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `department_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`department_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES (7, 'Couture', 'تصميم أزياء', 'IMG_0354.JPG', '2020-02-19 15:25:05');
INSERT INTO `department` VALUES (8, 'Bridal', 'زفافى', '222A0636.jpg', '2020-02-19 15:26:30');
INSERT INTO `department` VALUES (9, 'Ready To Wear', 'جاهز', 'IMG_6805.JPG', '2020-02-19 15:27:03');
INSERT INTO `department` VALUES (10, 'Little Princess', 'فساتين اطفال', 'IMG_7052.JPG', '2020-02-19 15:27:57');
INSERT INTO `department` VALUES (11, 'Accessories', 'أكسسورات', 'IMG_8068.JPG', '2020-02-19 23:46:50');

-- ----------------------------
-- Table structure for logo
-- ----------------------------
DROP TABLE IF EXISTS `logo`;
CREATE TABLE `logo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of logo
-- ----------------------------
INSERT INTO `logo` VALUES (1, '2.png');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `product_date` datetime(0) NULL DEFAULT NULL,
  `product_image` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `featured` int(2) NOT NULL,
  `price` int(10) NOT NULL,
  `discount` float(20, 0) UNSIGNED NOT NULL,
  `video` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `model_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gallery` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (4, '12', 7, 25, '2020-02-19 22:21:59', '222A0597.jpg', 1, 1200, 4, 'https://www.youtube.com/watch?v=20qvdTDdW-c', 'Saraa', '00.jpg,222A0506.jpg');
INSERT INTO `product` VALUES (6, '17', 7, 25, '2020-02-19 22:14:55', '222A0442a.jpg', 1, 1400, 4, 'https://www.youtube.com/watch?v=20qvdTDdW-c', 'Saraa', '222A0442a.jpg,IMG_8529.JPG');
INSERT INTO `product` VALUES (7, '16', 7, 25, '2020-02-20 12:37:21', '222A0534s.jpg', 1, 1400, 5, 'https://www.youtube.com/watch?v=20qvdTDdW-c', 'Saraa', '222A0534s.jpg,222A0557s.jpg');
INSERT INTO `product` VALUES (8, '18', 7, 25, '2020-02-20 12:38:00', 'IMG_6556.JPG', 1, 1900, 10, 'https://www.youtube.com/watch?v=20qvdTDdW-c', 'Saraa', 'IMG_6556.JPG,IMG_6758.JPG');
INSERT INTO `product` VALUES (9, '13', 7, 25, '2020-02-20 12:38:37', 'IMG_6376.JPG', 1, 1800, 12, 'https://www.youtube.com/watch?v=20qvdTDdW-c', 'Saraa', 'IMG_6376.JPG,IMG_6378.JPG');
INSERT INTO `product` VALUES (10, '89', 8, 25, '2020-02-22 17:41:20', 'IMG_8363.JPG', 1, 1500, 6, 'https://www.youtube.com/watch?v=20qvdTDdW-c', 'Saraa', 'IMG_8362.JPG,IMG_8363.JPG,IMG_8364.JPG,IMG_8365.JPG');
INSERT INTO `product` VALUES (11, '30', 7, 25, '2020-02-24 11:15:42', '222A0478.jpg', 1, 1900, 5, 'https://www.youtube.com/watch?v=fBAUo5AVqDE', 'Saraa', '222A0478.jpg,222A0483s.jpg');
INSERT INTO `product` VALUES (12, 'C12', 7, 26, '2020-09-06 12:42:08', 'IMG_0356.JPG', 1, 2400, 0, 'https://www.youtube.com/watch?v=Sv1Hd2DHTok', 'Naglaa', 'image_1555335997850.jpg,IMG_0356.JPG,IMG_6377.JPG');
INSERT INTO `product` VALUES (13, 'M44', 8, 26, '2020-09-06 12:50:51', '6dc78106-a6fd-4d51-938a-ec89bb4c99c3.jpg', 1, 2000, 5, 'https://www.youtube.com/watch?v=fBAUo5AVqDE', 'Saraa', '6dc78106-a6fd-4d51-938a-ec89bb4c99c3.jpg,FB_IMG_1554811141627.jpg,IMG_1017.JPG');
INSERT INTO `product` VALUES (14, 'H45', 7, 26, '2020-09-06 12:52:53', 'IMG_6376.JPG', 1, 4000, 4, 'https://www.youtube.com/watch?v=Sv1Hd2DHTok', 'Saraa', 'IMG_6376.JPG,IMG_6377.JPG,IMG_6379.JPG');
INSERT INTO `product` VALUES (15, 'K45', 8, 26, '2020-09-06 12:54:11', 'IMG_6426.PNG', 1, 3000, 8, 'https://www.youtube.com/watch?v=Sv1Hd2DHTok', 'Naglaa', 'IMG_6426.PNG,IMG_6427.PNG,IMG_6428.PNG,IMG_6429.PNG,IMG_6430.PNG');

-- ----------------------------
-- Table structure for season
-- ----------------------------
DROP TABLE IF EXISTS `season`;
CREATE TABLE `season`  (
  `season_id` int(11) NOT NULL AUTO_INCREMENT,
  `season_name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `season_name_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `season_year` year NULL DEFAULT NULL,
  `season_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`season_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of season
-- ----------------------------
INSERT INTO `season` VALUES (23, 'Winter', 'الشتاء', 2019, '2020-02-19 01:55:09');
INSERT INTO `season` VALUES (25, 'Winter', 'الشتاء', 2020, '2020-02-19 15:29:21');
INSERT INTO `season` VALUES (26, 'Summer', 'الصيف', 2020, '2020-09-06 12:38:46');

-- ----------------------------
-- Table structure for social
-- ----------------------------
DROP TABLE IF EXISTS `social`;
CREATE TABLE `social`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `instgram` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of social
-- ----------------------------
INSERT INTO `social` VALUES (1, 'https://www.facebook.com/HamzaFashionCouture/', 'https://www.youtube.com/channel/UCogyenzvPBVyJNylWkii32w/videos', 'https://twitter.com/HamzaCouture', 'https://www.instagram.com/ahmedhamza_official/');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_lname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_phone` int(255) NOT NULL,
  `user_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Ahmed', 'Zaki', 'HamzaFashionCuture@gmail.com', 'hamza123456789', 1067200974, 'admin.jpg');

SET FOREIGN_KEY_CHECKS = 1;

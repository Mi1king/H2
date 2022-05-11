/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : ecommerce

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 11/05/2022 20:10:22
*/
DROP database IF EXISTS ecommerce;
CREATE database ecommerce;
USE ecommerce;
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'admin', '123');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_danish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (3, 'Weight Lose');
INSERT INTO `categories` VALUES (1, 'Yoga');

-- ----------------------------
-- Table structure for certifications
-- ----------------------------
DROP TABLE IF EXISTS `certifications`;
CREATE TABLE `certifications`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `certification_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('created','completed') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'created',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_ce`(`user_id`) USING BTREE,
  CONSTRAINT `user_ce` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_danish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of certifications
-- ----------------------------
INSERT INTO `certifications` VALUES (1, 4, 'XMALJ12', 'completed');

-- ----------------------------
-- Table structure for item_history
-- ----------------------------
DROP TABLE IF EXISTS `item_history`;
CREATE TABLE `item_history`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_item_id`(`user_id`) USING BTREE,
  INDEX `item_id`(`item_id`) USING BTREE,
  CONSTRAINT `item_history_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_item_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = latin1 COLLATE = latin1_danish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of item_history
-- ----------------------------
INSERT INTO `item_history` VALUES (37, 4, 47);
INSERT INTO `item_history` VALUES (38, 4, 49);
INSERT INTO `item_history` VALUES (39, 4, 48);
INSERT INTO `item_history` VALUES (41, 2, 47);
INSERT INTO `item_history` VALUES (43, 2, 49);
INSERT INTO `item_history` VALUES (44, 2, 48);

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` int NOT NULL,
  `time` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `coach_id` int NOT NULL,
  `image` mediumblob NULL,
  `category` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `item_coach_id`(`coach_id`) USING BTREE,
  INDEX `cat`(`category`) USING BTREE,
  CONSTRAINT `cat` FOREIGN KEY (`category`) REFERENCES `categories` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `item_coach_id` FOREIGN KEY (`coach_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES (47, 'The best yoga (level 1)', 1000, '1:00-2:00', 4, 0x696D672F32333336313635323236383431322E6A7067, 'Yoga');
INSERT INTO `items` VALUES (48, 'The best yoga (level 2)', 1000, '1:00-2:00', 4, 0x696D672F32333834313635323236383436342E6A7067, 'Yoga');
INSERT INTO `items` VALUES (49, 'The best yoga (level 3)', 1000, '1:00-2:00', 4, 0x696D672F32323830313635323236383438352E6A7067, 'Yoga');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contact` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `city` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `photo` mediumblob NULL,
  `is_coach` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (2, 'user_mike', 'mike@gmail.com', '123', '8120822235', 'durh', 'bhil', 0x696D672F34393637313635323237303938372E77656270, '0');
INSERT INTO `users` VALUES (4, 'Amy', '123456@qq.com', '123', '123456', 'Suzou', 'XJTLU', 0x696D672F34373539313635323131363332342E706E67, '1');

-- ----------------------------
-- Table structure for users_items
-- ----------------------------
DROP TABLE IF EXISTS `users_items`;
CREATE TABLE `users_items`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  `status` enum('Added to cart','Confirmed') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `course_status` enum('Unfinished','Finished') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `teach` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `item_id`(`item_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `users_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `users_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 82 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users_items
-- ----------------------------
INSERT INTO `users_items` VALUES (80, 2, 48, 'Confirmed', 'Unfinished', '0');
INSERT INTO `users_items` VALUES (81, 2, 47, 'Added to cart', 'Unfinished', '0');

SET FOREIGN_KEY_CHECKS = 1;

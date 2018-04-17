/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : yj

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 17/04/2018 17:03:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '组名',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES (1, '一组', 1523424767, 1523424767);
INSERT INTO `group` VALUES (3, '二组', 1523425108, 1523425108);
INSERT INTO `group` VALUES (4, '三组', 1523431255, 1523431255);

-- ----------------------------
-- Table structure for score
-- ----------------------------
DROP TABLE IF EXISTS `score`;
CREATE TABLE `score`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(10) UNSIGNED NOT NULL COMMENT '对应员工',
  `value` int(10) UNSIGNED NOT NULL COMMENT '业绩',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 48 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of score
-- ----------------------------
INSERT INTO `score` VALUES (28, 3, 13, 2369, 1523433210, 1523433210);
INSERT INTO `score` VALUES (27, 1, 10, 1820, 1523433019, 1523433037);
INSERT INTO `score` VALUES (24, 3, 11, 1523, 1523432767, 1523433267);
INSERT INTO `score` VALUES (26, 3, 11, 1529, 1523432914, 1523433268);
INSERT INTO `score` VALUES (25, 1, 10, 1200, 1523432787, 1523433039);
INSERT INTO `score` VALUES (42, 4, 16, 5223, 1523436940, 1523436940);
INSERT INTO `score` VALUES (41, 4, 16, 32, 1523436828, 1523769841);
INSERT INTO `score` VALUES (29, 3, 13, 8523, 1523433234, 1523433234);
INSERT INTO `score` VALUES (46, 4, 12, 1535, 1523769960, 1523769960);
INSERT INTO `score` VALUES (47, 1, 18, 5823, 1523943124, 1523943124);

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL COMMENT '分组id',
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '用户名称',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES (13, 3, '王恒', 1523433210, 1523433210);
INSERT INTO `staff` VALUES (11, 3, '哈哈', 1523432845, 1523432845);
INSERT INTO `staff` VALUES (12, 4, '哈哈', 1523432977, 1523432977);
INSERT INTO `staff` VALUES (10, 1, '呼呼', 1523432767, 1523496060);
INSERT INTO `staff` VALUES (16, 4, '小红', 1523436828, 1523436828);
INSERT INTO `staff` VALUES (18, 1, '呵呵', 1523943124, 1523943725);

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` int(10) UNSIGNED NOT NULL COMMENT '组id',
  `staff_id` int(10) UNSIGNED NOT NULL COMMENT '成员id',
  `call_num` int(11) UNSIGNED NOT NULL COMMENT '外呼次数',
  `call_time` int(10) UNSIGNED NOT NULL COMMENT '外呼时长',
  `h_call` int(11) UNSIGNED NOT NULL COMMENT '已接通',
  `n_call` int(11) UNSIGNED NOT NULL COMMENT '未接通',
  `n_intention` int(11) UNSIGNED NOT NULL COMMENT '无意向',
  `h_intention` int(11) UNSIGNED NOT NULL COMMENT '有意向',
  `weixin` int(11) UNSIGNED NOT NULL COMMENT '微信通过',
  `register` int(11) UNSIGNED NOT NULL COMMENT '注册次数',
  `w_return` int(11) UNSIGNED NOT NULL COMMENT '待回访',
  `clinch` int(10) UNSIGNED NOT NULL COMMENT '成交',
  `create_time` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `update_time` int(10) UNSIGNED NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES (1, 1, 10, 99, 88, 88, 88, 8, 8, 8, 88, 88, 8, 1523778532, 1523857961);
INSERT INTO `test` VALUES (2, 4, 12, 8, 8, 888, 8, 8, 88, 8, 88, 8, 8, 1523784722, 1523784722);
INSERT INTO `test` VALUES (3, 4, 16, 562, 232, 230, 231, 323, 20, 21, 23, 23, 0, 1523842903, 1523842903);
INSERT INTO `test` VALUES (4, 1, 10, 15, 133, 12, 52, 2, 125, 1236, 25, 35, 123, 1523844637, 1523942229);
INSERT INTO `test` VALUES (6, 3, 11, 982, 232, 2323, 2323, 212, 21212, 312, 1231, 121, 321, 1523942855, 1523942855);
INSERT INTO `test` VALUES (7, 3, 13, 485, 15313, 135151, 5151, 1, 212162, 1515, 1215, 15121, 1212, 1523942975, 1523942975);
INSERT INTO `test` VALUES (8, 1, 18, 845, 2, 1, 23, 1212, 21, 3213, 32, 321, 13, 1523943152, 1523943152);
INSERT INTO `test` VALUES (9, 1, 19, 999, 56, 523, 232, 212, 231, 21231, 23, 12, 12, 1523948037, 1523948037);

SET FOREIGN_KEY_CHECKS = 1;

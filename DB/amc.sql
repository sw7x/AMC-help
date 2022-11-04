/*
Navicat MySQL Data Transfer

Source Server         : DBcon
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : amc

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-03-12 10:30:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_admin
-- ----------------------------
INSERT INTO `tbl_admin` VALUES ('1', 'admin', 'abc123');

-- ----------------------------
-- Table structure for `tbl_category`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `cid` int(4) NOT NULL AUTO_INCREMENT,
  `parent_id` int(4) NOT NULL DEFAULT '0',
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=373 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO `tbl_category` VALUES ('1', '0', 'cars');
INSERT INTO `tbl_category` VALUES ('2', '0', 'pens');
INSERT INTO `tbl_category` VALUES ('3', '0', 'pc');
INSERT INTO `tbl_category` VALUES ('4', '0', 'books');
INSERT INTO `tbl_category` VALUES ('5', '0', 'foods');
INSERT INTO `tbl_category` VALUES ('6', '0', 'news paper');
INSERT INTO `tbl_category` VALUES ('7', '1', 'audiad');
INSERT INTO `tbl_category` VALUES ('8', '1', 'lambogini');
INSERT INTO `tbl_category` VALUES ('9', '3', 'asus');
INSERT INTO `tbl_category` VALUES ('10', '3', 'hp');
INSERT INTO `tbl_category` VALUES ('11', '3', 'acer');
INSERT INTO `tbl_category` VALUES ('12', '5', 'buns');
INSERT INTO `tbl_category` VALUES ('13', '5', 'breads');
INSERT INTO `tbl_category` VALUES ('14', '5', 'salt');
INSERT INTO `tbl_category` VALUES ('15', '5', 'fruits');
INSERT INTO `tbl_category` VALUES ('16', '5', 'vegetable');
INSERT INTO `tbl_category` VALUES ('17', '0', 'catz');
INSERT INTO `tbl_category` VALUES ('18', '12', 'katar');
INSERT INTO `tbl_category` VALUES ('19', '3', 'dell');
INSERT INTO `tbl_category` VALUES ('20', '0', 'bars');
INSERT INTO `tbl_category` VALUES ('21', '7', 'mini cars');
INSERT INTO `tbl_category` VALUES ('22', '3', 'ibm');
INSERT INTO `tbl_category` VALUES ('23', '7', 'A44');
INSERT INTO `tbl_category` VALUES ('24', '7', 'A555');
INSERT INTO `tbl_category` VALUES ('25', '9', 'asus1');
INSERT INTO `tbl_category` VALUES ('26', '9', 'asus2');
INSERT INTO `tbl_category` VALUES ('27', '8', 'Aventador');
INSERT INTO `tbl_category` VALUES ('28', '0', 'phones');
INSERT INTO `tbl_category` VALUES ('30', '1', 'ford');
INSERT INTO `tbl_category` VALUES ('31', '0', 'Bio');
INSERT INTO `tbl_category` VALUES ('32', '0', 'disc');
INSERT INTO `tbl_category` VALUES ('33', '0', 'Bio5');
INSERT INTO `tbl_category` VALUES ('34', '0', 'science');
INSERT INTO `tbl_category` VALUES ('35', '0', 'mthematics');
INSERT INTO `tbl_category` VALUES ('36', '0', 'chemistry');
INSERT INTO `tbl_category` VALUES ('37', '0', 'physics');
INSERT INTO `tbl_category` VALUES ('38', '0', 'arts');
INSERT INTO `tbl_category` VALUES ('39', '0', 'sony');
INSERT INTO `tbl_category` VALUES ('40', '0', 'apple');
INSERT INTO `tbl_category` VALUES ('41', '0', 'booksqq');
INSERT INTO `tbl_category` VALUES ('42', '0', 'aaaaaaa');
INSERT INTO `tbl_category` VALUES ('44', '1', 'ferari');
INSERT INTO `tbl_category` VALUES ('45', '1', 'nissan');
INSERT INTO `tbl_category` VALUES ('46', '1', 'toyota');
INSERT INTO `tbl_category` VALUES ('47', '1', 'lotuss');
INSERT INTO `tbl_category` VALUES ('49', '7', 'ada');
INSERT INTO `tbl_category` VALUES ('50', '7', 'bbb');
INSERT INTO `tbl_category` VALUES ('51', '7', 'ccc');
INSERT INTO `tbl_category` VALUES ('52', '44', 'adcc');
INSERT INTO `tbl_category` VALUES ('53', '2', 'atlas');
INSERT INTO `tbl_category` VALUES ('54', '53', 'normal');
INSERT INTO `tbl_category` VALUES ('56', '0', 'windows');
INSERT INTO `tbl_category` VALUES ('57', '1', 'lancer');
INSERT INTO `tbl_category` VALUES ('58', '0', 'mouse');
INSERT INTO `tbl_category` VALUES ('59', '0', 'mobitel');
INSERT INTO `tbl_category` VALUES ('60', '59', 'm3');
INSERT INTO `tbl_category` VALUES ('62', '61', 'pc games');
INSERT INTO `tbl_category` VALUES ('63', '62', 'fantasy');
INSERT INTO `tbl_category` VALUES ('64', '30', 'sdd');
INSERT INTO `tbl_category` VALUES ('65', '30', 'acc');
INSERT INTO `tbl_category` VALUES ('66', '1', 'xy');
INSERT INTO `tbl_category` VALUES ('67', '45', 's1');
INSERT INTO `tbl_category` VALUES ('68', '45', 's2');
INSERT INTO `tbl_category` VALUES ('69', '45', 's3');
INSERT INTO `tbl_category` VALUES ('70', '46', 'ac1');
INSERT INTO `tbl_category` VALUES ('71', '3', 'aus');
INSERT INTO `tbl_category` VALUES ('72', '7', 'aun');
INSERT INTO `tbl_category` VALUES ('73', '4', 'hp');
INSERT INTO `tbl_category` VALUES ('74', '73', 'aui');
INSERT INTO `tbl_category` VALUES ('75', '0', 'atx');
INSERT INTO `tbl_category` VALUES ('76', '8', 'ata');
INSERT INTO `tbl_category` VALUES ('77', '0', 'acx');
INSERT INTO `tbl_category` VALUES ('78', '71', 'ac23');
INSERT INTO `tbl_category` VALUES ('79', '0', 'ICT');
INSERT INTO `tbl_category` VALUES ('80', '0', 'GIS');
INSERT INTO `tbl_category` VALUES ('81', '0', 'Networking');
INSERT INTO `tbl_category` VALUES ('82', '79', 'NET');
INSERT INTO `tbl_category` VALUES ('83', '79', 'NTW');
INSERT INTO `tbl_category` VALUES ('84', '82', 'C#');
INSERT INTO `tbl_category` VALUES ('85', '0', 'Computer');
INSERT INTO `tbl_category` VALUES ('86', '85', 'abc');
INSERT INTO `tbl_category` VALUES ('87', '86', 'xyz');
INSERT INTO `tbl_category` VALUES ('88', '86', 'DEF');
INSERT INTO `tbl_category` VALUES ('89', '0', 'A1');
INSERT INTO `tbl_category` VALUES ('90', '89', 'A2');
INSERT INTO `tbl_category` VALUES ('91', '90', 'A3');
INSERT INTO `tbl_category` VALUES ('92', '0', 'AAAA');
INSERT INTO `tbl_category` VALUES ('93', '0', 'BBBB');
INSERT INTO `tbl_category` VALUES ('94', '93', 'B1');
INSERT INTO `tbl_category` VALUES ('95', '0', 'CCCC');
INSERT INTO `tbl_category` VALUES ('96', '95', 'C1');
INSERT INTO `tbl_category` VALUES ('97', '96', 'C2');
INSERT INTO `tbl_category` VALUES ('98', '0', 'Php');
INSERT INTO `tbl_category` VALUES ('99', '0', 'L1');
INSERT INTO `tbl_category` VALUES ('100', '0', 'L2');
INSERT INTO `tbl_category` VALUES ('101', '0', 'L3');
INSERT INTO `tbl_category` VALUES ('102', '100', 'll');
INSERT INTO `tbl_category` VALUES ('103', '101', 'll');
INSERT INTO `tbl_category` VALUES ('104', '103', 'lll');
INSERT INTO `tbl_category` VALUES ('105', '100', 'iihi');
INSERT INTO `tbl_category` VALUES ('106', '100', 'AWE');
INSERT INTO `tbl_category` VALUES ('107', '103', 'qw');
INSERT INTO `tbl_category` VALUES ('108', '103', '12');
INSERT INTO `tbl_category` VALUES ('109', '103', '34');
INSERT INTO `tbl_category` VALUES ('110', '99', '67');
INSERT INTO `tbl_category` VALUES ('111', '110', '672');
INSERT INTO `tbl_category` VALUES ('112', '0', 'asdc');
INSERT INTO `tbl_category` VALUES ('113', '0', 'qasdw');
INSERT INTO `tbl_category` VALUES ('114', '0', 'xcv');
INSERT INTO `tbl_category` VALUES ('115', '0', 'a89');
INSERT INTO `tbl_category` VALUES ('116', '0', 'yui');
INSERT INTO `tbl_category` VALUES ('117', '0', 'wert');
INSERT INTO `tbl_category` VALUES ('118', '0', 'olp');
INSERT INTO `tbl_category` VALUES ('119', '0', 'klm');
INSERT INTO `tbl_category` VALUES ('120', '0', 'sssdf');
INSERT INTO `tbl_category` VALUES ('121', '0', 'adcvb');
INSERT INTO `tbl_category` VALUES ('122', '0', 'jkl');
INSERT INTO `tbl_category` VALUES ('123', '121', 'asd');
INSERT INTO `tbl_category` VALUES ('124', '1', 'wolks');
INSERT INTO `tbl_category` VALUES ('125', '1', 'black');
INSERT INTO `tbl_category` VALUES ('126', '1', 'white');
INSERT INTO `tbl_category` VALUES ('127', '3', 'green');
INSERT INTO `tbl_category` VALUES ('128', '1', 'green1');
INSERT INTO `tbl_category` VALUES ('129', '1', 'dfg');
INSERT INTO `tbl_category` VALUES ('130', '1', 'cv');
INSERT INTO `tbl_category` VALUES ('131', '3', 'ababa');
INSERT INTO `tbl_category` VALUES ('132', '11', 'ad');
INSERT INTO `tbl_category` VALUES ('133', '7', 'seven');
INSERT INTO `tbl_category` VALUES ('134', '7', 'six');
INSERT INTO `tbl_category` VALUES ('135', '127', 'dfg');
INSERT INTO `tbl_category` VALUES ('136', '0', 'gmh');
INSERT INTO `tbl_category` VALUES ('137', '1', 'sdf');
INSERT INTO `tbl_category` VALUES ('138', '7', 'qqqqw');
INSERT INTO `tbl_category` VALUES ('139', '0', 'qwerfds');
INSERT INTO `tbl_category` VALUES ('140', '0', 'ssddg');
INSERT INTO `tbl_category` VALUES ('141', '0', 'ip2');
INSERT INTO `tbl_category` VALUES ('142', '136', 'llo');
INSERT INTO `tbl_category` VALUES ('143', '0', 'sdcard');
INSERT INTO `tbl_category` VALUES ('144', '0', 'hddvd');
INSERT INTO `tbl_category` VALUES ('145', '136', 'dsdd');
INSERT INTO `tbl_category` VALUES ('146', '15', 'beans');
INSERT INTO `tbl_category` VALUES ('147', '8', 'dfm');
INSERT INTO `tbl_category` VALUES ('148', '144', '9gb');
INSERT INTO `tbl_category` VALUES ('149', '0', 'mousepad');
INSERT INTO `tbl_category` VALUES ('150', '125', 'b2');
INSERT INTO `tbl_category` VALUES ('151', '125', 'b3');
INSERT INTO `tbl_category` VALUES ('152', '7', 'a1');
INSERT INTO `tbl_category` VALUES ('153', '125', 'b4');
INSERT INTO `tbl_category` VALUES ('154', '7', 'rty');
INSERT INTO `tbl_category` VALUES ('155', '0', 'bnm');
INSERT INTO `tbl_category` VALUES ('156', '0', 'cvbn');
INSERT INTO `tbl_category` VALUES ('157', '3', 'lenova');
INSERT INTO `tbl_category` VALUES ('158', '103', 'book');
INSERT INTO `tbl_category` VALUES ('159', '1', 'sdm');
INSERT INTO `tbl_category` VALUES ('160', '3', 'hp2');
INSERT INTO `tbl_category` VALUES ('161', '128', 'g5');
INSERT INTO `tbl_category` VALUES ('162', '157', 'lp');
INSERT INTO `tbl_category` VALUES ('163', '22', 'ibm400');
INSERT INTO `tbl_category` VALUES ('164', '73', 'windows');
INSERT INTO `tbl_category` VALUES ('165', '0', 'dfvc');
INSERT INTO `tbl_category` VALUES ('166', '0', 'dfgh');
INSERT INTO `tbl_category` VALUES ('167', '0', 'asdfc');
INSERT INTO `tbl_category` VALUES ('168', '0', 'lm');
INSERT INTO `tbl_category` VALUES ('169', '2', 'aci');
INSERT INTO `tbl_category` VALUES ('170', '73', 'plc');
INSERT INTO `tbl_category` VALUES ('171', '53', 'ch');
INSERT INTO `tbl_category` VALUES ('172', '0', 'pencil');
INSERT INTO `tbl_category` VALUES ('173', '17', 'brown');
INSERT INTO `tbl_category` VALUES ('174', '157', 'le34');
INSERT INTO `tbl_category` VALUES ('175', '126', 'w3');
INSERT INTO `tbl_category` VALUES ('176', '0', 'aad');
INSERT INTO `tbl_category` VALUES ('177', '172', 'asd');
INSERT INTO `tbl_category` VALUES ('178', '177', 'asdd');
INSERT INTO `tbl_category` VALUES ('179', '172', 'asdo');
INSERT INTO `tbl_category` VALUES ('180', '172', 'df');
INSERT INTO `tbl_category` VALUES ('181', '179', 'a');
INSERT INTO `tbl_category` VALUES ('182', '172', 'adA');
INSERT INTO `tbl_category` VALUES ('183', '0', 'kkkass');
INSERT INTO `tbl_category` VALUES ('184', '4', 'book12');
INSERT INTO `tbl_category` VALUES ('185', '176', 'sasdasd');
INSERT INTO `tbl_category` VALUES ('186', '176', 'ffff');
INSERT INTO `tbl_category` VALUES ('187', '0', 'sdtr');
INSERT INTO `tbl_category` VALUES ('188', '0', 'ssdsdsdsdsd');
INSERT INTO `tbl_category` VALUES ('189', '0', 'sdsdsd4');
INSERT INTO `tbl_category` VALUES ('190', '5', 'fg');
INSERT INTO `tbl_category` VALUES ('191', '5', 'dfgd');
INSERT INTO `tbl_category` VALUES ('192', '5', 'dsdsdsdfsdf');
INSERT INTO `tbl_category` VALUES ('193', '172', 'sadsdas');
INSERT INTO `tbl_category` VALUES ('194', '172', 'aaaaasdf');
INSERT INTO `tbl_category` VALUES ('195', '172', 'asadasdsdasdadasdasd');
INSERT INTO `tbl_category` VALUES ('196', '172', 'gkgkg');
INSERT INTO `tbl_category` VALUES ('197', '172', 'wfadada');
INSERT INTO `tbl_category` VALUES ('198', '172', 'sddsdsds');
INSERT INTO `tbl_category` VALUES ('199', '172', 'sadasdas');
INSERT INTO `tbl_category` VALUES ('200', '188', 'sdasdada');
INSERT INTO `tbl_category` VALUES ('201', '172', 'sdasdada');
INSERT INTO `tbl_category` VALUES ('202', '172', 'szzzz');
INSERT INTO `tbl_category` VALUES ('203', '172', 'sasdasdsadsadas');
INSERT INTO `tbl_category` VALUES ('204', '172', 'sdsadsadsad');
INSERT INTO `tbl_category` VALUES ('205', '172', 'aaasssd');
INSERT INTO `tbl_category` VALUES ('206', '172', 'sdasdsadasda');
INSERT INTO `tbl_category` VALUES ('207', '172', 'sdsdsddddsas');
INSERT INTO `tbl_category` VALUES ('208', '172', 'sdasdadsddd');
INSERT INTO `tbl_category` VALUES ('209', '172', 'qqqwsa');
INSERT INTO `tbl_category` VALUES ('210', '172', 'asasas');
INSERT INTO `tbl_category` VALUES ('211', '172', 'adaswsws');
INSERT INTO `tbl_category` VALUES ('212', '172', 'dasdasdasdasdsadasdas');
INSERT INTO `tbl_category` VALUES ('213', '188', 'asasasas');
INSERT INTO `tbl_category` VALUES ('214', '172', 'sadsadsad');
INSERT INTO `tbl_category` VALUES ('215', '172', 'aaaaaaaaaaaaa');
INSERT INTO `tbl_category` VALUES ('216', '172', 'cccd');
INSERT INTO `tbl_category` VALUES ('217', '172', 'ssssssss');
INSERT INTO `tbl_category` VALUES ('218', '172', 'aaaassssssssssddddddddddd');
INSERT INTO `tbl_category` VALUES ('219', '172', 'a111');
INSERT INTO `tbl_category` VALUES ('220', '172', 'a2222');
INSERT INTO `tbl_category` VALUES ('221', '172', 'a333');
INSERT INTO `tbl_category` VALUES ('222', '172', 'b222');
INSERT INTO `tbl_category` VALUES ('223', '121', 'edede');
INSERT INTO `tbl_category` VALUES ('224', '172', 'asdsss');
INSERT INTO `tbl_category` VALUES ('225', '172', 'asas');
INSERT INTO `tbl_category` VALUES ('226', '172', 'ssdsd');
INSERT INTO `tbl_category` VALUES ('227', '172', 'dfdfd');
INSERT INTO `tbl_category` VALUES ('228', '172', 'ssasdas');
INSERT INTO `tbl_category` VALUES ('229', '172', 'sdsd');
INSERT INTO `tbl_category` VALUES ('230', '2', 'as');
INSERT INTO `tbl_category` VALUES ('231', '2', 'cxcz');
INSERT INTO `tbl_category` VALUES ('232', '0', 'asasa');
INSERT INTO `tbl_category` VALUES ('233', '2', 'sdasdasdd');
INSERT INTO `tbl_category` VALUES ('234', '2', 'sadas');
INSERT INTO `tbl_category` VALUES ('235', '2', 'ert');
INSERT INTO `tbl_category` VALUES ('236', '2', 'ee');
INSERT INTO `tbl_category` VALUES ('237', '236', 'asd');
INSERT INTO `tbl_category` VALUES ('238', '172', 'sdsdsds');
INSERT INTO `tbl_category` VALUES ('239', '2', 'zxz');
INSERT INTO `tbl_category` VALUES ('240', '2', 'sds');
INSERT INTO `tbl_category` VALUES ('241', '2', 'xxc');
INSERT INTO `tbl_category` VALUES ('242', '172', 'sda');
INSERT INTO `tbl_category` VALUES ('243', '2', 'asaxx');
INSERT INTO `tbl_category` VALUES ('244', '172', 'asasq');
INSERT INTO `tbl_category` VALUES ('245', '172', 'asww');
INSERT INTO `tbl_category` VALUES ('246', '2', 'asd');
INSERT INTO `tbl_category` VALUES ('247', '172', 'sssA');
INSERT INTO `tbl_category` VALUES ('248', '2', 'SDSDSD');
INSERT INTO `tbl_category` VALUES ('249', '2', 'zz');
INSERT INTO `tbl_category` VALUES ('250', '2', 'yu');
INSERT INTO `tbl_category` VALUES ('251', '2', 'asa1');
INSERT INTO `tbl_category` VALUES ('252', '249', 'vcx');
INSERT INTO `tbl_category` VALUES ('253', '246', 'kkkkl');
INSERT INTO `tbl_category` VALUES ('254', '246', 'asd');
INSERT INTO `tbl_category` VALUES ('255', '246', 'zxcx');
INSERT INTO `tbl_category` VALUES ('256', '246', 'zvb');
INSERT INTO `tbl_category` VALUES ('257', '246', 'mnb');
INSERT INTO `tbl_category` VALUES ('258', '246', 'asd9');
INSERT INTO `tbl_category` VALUES ('259', '246', 'ss');
INSERT INTO `tbl_category` VALUES ('260', '216', 'asd');
INSERT INTO `tbl_category` VALUES ('261', '216', 'as');
INSERT INTO `tbl_category` VALUES ('262', '2', 'mkl');
INSERT INTO `tbl_category` VALUES ('263', '262', 'asd');
INSERT INTO `tbl_category` VALUES ('264', '262', 'dfg');
INSERT INTO `tbl_category` VALUES ('265', '262', 'qwas');
INSERT INTO `tbl_category` VALUES ('266', '249', 'zxs');
INSERT INTO `tbl_category` VALUES ('267', '235', '454');
INSERT INTO `tbl_category` VALUES ('268', '53', 'we');
INSERT INTO `tbl_category` VALUES ('269', '53', 'asdf');
INSERT INTO `tbl_category` VALUES ('270', '250', 'ax');
INSERT INTO `tbl_category` VALUES ('271', '2', 'asc');
INSERT INTO `tbl_category` VALUES ('272', '0', 'sas');
INSERT INTO `tbl_category` VALUES ('273', '0', 'sdwdwdwdw');
INSERT INTO `tbl_category` VALUES ('274', '22', 'sdfc');
INSERT INTO `tbl_category` VALUES ('275', '19', 'sdsd');
INSERT INTO `tbl_category` VALUES ('276', '19', 'sdf');
INSERT INTO `tbl_category` VALUES ('277', '71', 'sd4');
INSERT INTO `tbl_category` VALUES ('278', '127', 'asdf');
INSERT INTO `tbl_category` VALUES ('279', '22', 'asd');
INSERT INTO `tbl_category` VALUES ('280', '11', 'qwsa');
INSERT INTO `tbl_category` VALUES ('281', '10', 'asdcx');
INSERT INTO `tbl_category` VALUES ('282', '127', 'ad');
INSERT INTO `tbl_category` VALUES ('283', '127', 'qqqq');
INSERT INTO `tbl_category` VALUES ('284', '19', 'sdad');
INSERT INTO `tbl_category` VALUES ('285', '19', 'sdas');
INSERT INTO `tbl_category` VALUES ('286', '22', 'ssasa');
INSERT INTO `tbl_category` VALUES ('287', '11', 'ssss');
INSERT INTO `tbl_category` VALUES ('288', '19', 'sdsdq');
INSERT INTO `tbl_category` VALUES ('289', '172', 'aaaaa');
INSERT INTO `tbl_category` VALUES ('290', '11', 'sssaasw');
INSERT INTO `tbl_category` VALUES ('291', '22', 'sw');
INSERT INTO `tbl_category` VALUES ('292', '19', 'sw2');
INSERT INTO `tbl_category` VALUES ('293', '22', 'sw3');
INSERT INTO `tbl_category` VALUES ('294', '183', 'aaa');
INSERT INTO `tbl_category` VALUES ('295', '3', 'ss');
INSERT INTO `tbl_category` VALUES ('296', '3', 'zx123');
INSERT INTO `tbl_category` VALUES ('297', '71', 'aswd');
INSERT INTO `tbl_category` VALUES ('298', '3', 'aaas');
INSERT INTO `tbl_category` VALUES ('299', '3', 'aa3');
INSERT INTO `tbl_category` VALUES ('300', '3', 'asdad');
INSERT INTO `tbl_category` VALUES ('301', '2', 'das');
INSERT INTO `tbl_category` VALUES ('302', '3', 'sa');
INSERT INTO `tbl_category` VALUES ('303', '3', 'asada');
INSERT INTO `tbl_category` VALUES ('304', '3', 'pc001');
INSERT INTO `tbl_category` VALUES ('305', '3', 'pc002');
INSERT INTO `tbl_category` VALUES ('306', '3', 'asw');
INSERT INTO `tbl_category` VALUES ('307', '3', 'asa');
INSERT INTO `tbl_category` VALUES ('308', '306', 'sdasd');
INSERT INTO `tbl_category` VALUES ('309', '302', '123e');
INSERT INTO `tbl_category` VALUES ('310', '302', '123ee');
INSERT INTO `tbl_category` VALUES ('311', '299', '12qwe');
INSERT INTO `tbl_category` VALUES ('312', '299', 'sasswsw');
INSERT INTO `tbl_category` VALUES ('313', '302', 'qwa');
INSERT INTO `tbl_category` VALUES ('314', '302', 'asqa');
INSERT INTO `tbl_category` VALUES ('315', '304', 'asd');
INSERT INTO `tbl_category` VALUES ('316', '295', '127');
INSERT INTO `tbl_category` VALUES ('317', '299', '3d');
INSERT INTO `tbl_category` VALUES ('318', '299', 'azs');
INSERT INTO `tbl_category` VALUES ('319', '299', 'asas');
INSERT INTO `tbl_category` VALUES ('320', '299', 'qwa3');
INSERT INTO `tbl_category` VALUES ('321', '304', 'qwea');
INSERT INTO `tbl_category` VALUES ('322', '299', 'aasa');
INSERT INTO `tbl_category` VALUES ('323', '299', 'g');
INSERT INTO `tbl_category` VALUES ('324', '304', 'ZZZZ');
INSERT INTO `tbl_category` VALUES ('325', '304', 'cccvvv');
INSERT INTO `tbl_category` VALUES ('326', '304', 'qsdf');
INSERT INTO `tbl_category` VALUES ('327', '304', 'gggg');
INSERT INTO `tbl_category` VALUES ('328', '11', 'sasa');
INSERT INTO `tbl_category` VALUES ('329', '3', 'asd');
INSERT INTO `tbl_category` VALUES ('330', '3', 'sw7');
INSERT INTO `tbl_category` VALUES ('331', '3', 'sw7x');
INSERT INTO `tbl_category` VALUES ('332', '3', 'sw71');
INSERT INTO `tbl_category` VALUES ('333', '3', 'sw22');
INSERT INTO `tbl_category` VALUES ('334', '3', 'sw4');
INSERT INTO `tbl_category` VALUES ('335', '15', 'mango');
INSERT INTO `tbl_category` VALUES ('336', '3', 'rt');
INSERT INTO `tbl_category` VALUES ('337', '3', 'sww');
INSERT INTO `tbl_category` VALUES ('338', '3', 'asas');
INSERT INTO `tbl_category` VALUES ('339', '3', 'dfg');
INSERT INTO `tbl_category` VALUES ('340', '3', 'cvbnm');
INSERT INTO `tbl_category` VALUES ('341', '3', 'saq');
INSERT INTO `tbl_category` VALUES ('342', '28', 'weq');
INSERT INTO `tbl_category` VALUES ('343', '340', 'sddf');
INSERT INTO `tbl_category` VALUES ('344', '330', 'qwerq');
INSERT INTO `tbl_category` VALUES ('345', '333', 'qwasd');
INSERT INTO `tbl_category` VALUES ('346', '337', '231w');
INSERT INTO `tbl_category` VALUES ('347', '232', 'sdd2');
INSERT INTO `tbl_category` VALUES ('348', '4', 'qw123');
INSERT INTO `tbl_category` VALUES ('349', '3', 'xcv');
INSERT INTO `tbl_category` VALUES ('350', '339', 'dfg3');
INSERT INTO `tbl_category` VALUES ('351', '0', 'dfvbn');
INSERT INTO `tbl_category` VALUES ('352', '0', 'sdasdas');
INSERT INTO `tbl_category` VALUES ('353', '0', 'sdasd');
INSERT INTO `tbl_category` VALUES ('354', '0', 'dfe');
INSERT INTO `tbl_category` VALUES ('355', '0', 'dadxww');
INSERT INTO `tbl_category` VALUES ('356', '0', 'sdswsw');
INSERT INTO `tbl_category` VALUES ('357', '0', 'ssa2daxa');
INSERT INTO `tbl_category` VALUES ('358', '0', 'saws');
INSERT INTO `tbl_category` VALUES ('359', '0', 'wswawsw');
INSERT INTO `tbl_category` VALUES ('360', '0', 'sds2s');
INSERT INTO `tbl_category` VALUES ('361', '0', 'asad222');
INSERT INTO `tbl_category` VALUES ('362', '0', 'sdasdafva');
INSERT INTO `tbl_category` VALUES ('363', '0', 'iudbd');
INSERT INTO `tbl_category` VALUES ('364', '0', 'sefsf');
INSERT INTO `tbl_category` VALUES ('365', '3', 'sdsd');
INSERT INTO `tbl_category` VALUES ('366', '3', 'sasdsa');
INSERT INTO `tbl_category` VALUES ('367', '9', 'asuspc1');
INSERT INTO `tbl_category` VALUES ('368', '9', 'df999');
INSERT INTO `tbl_category` VALUES ('369', '9', 'sdf');
INSERT INTO `tbl_category` VALUES ('370', '0', 'sws');
INSERT INTO `tbl_category` VALUES ('371', '364', 'sws');
INSERT INTO `tbl_category` VALUES ('372', '342', 'wws');

-- ----------------------------
-- Table structure for `tbl_comments`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_comments`;
CREATE TABLE `tbl_comments` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `comment` varchar(300) DEFAULT NULL,
  `user_email` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_comments
-- ----------------------------
INSERT INTO `tbl_comments` VALUES ('1', '11', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'abc@gmail.com');
INSERT INTO `tbl_comments` VALUES ('2', '11', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'abc@gmail.com');
INSERT INTO `tbl_comments` VALUES ('3', '13', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwww wwwwwwwwwwwww wwwwwwwwwwwwwww wwwwwwwwwwww wwwwwwwwwwwww', 'susantha@google.com');
INSERT INTO `tbl_comments` VALUES ('4', '13', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwww wwwwwwwwwwwww wwwwwwwwwwwwwww wwwwwwwwwwww wwwwwwwwwwwww', 'susantha@google.com');
INSERT INTO `tbl_comments` VALUES ('5', '14', 'sasas dasd asd asd d asd asd dasd sd as d asd ad asd sd  ', 'qwerty@gmail.com');
INSERT INTO `tbl_comments` VALUES ('6', '14', 'We are lucky that some really ingenious people did the hard work for us. This hard work entails the use of a Javascript parser, because what does this transform really mean In a summary it means reordering the sequence of the operation such that what is really done first comes first.', 'sssjjjjj@katare.com');
INSERT INTO `tbl_comments` VALUES ('7', '15', 'hghgc dcdd d d d', 'asdasd@gmail.com');
INSERT INTO `tbl_comments` VALUES ('8', '16', 'hhhhhhhh', 'asdasd@gmail.com');
INSERT INTO `tbl_comments` VALUES ('9', '16', 'susantha----------- ------------ -     ', 'susantha@gmail.com');
INSERT INTO `tbl_comments` VALUES ('10', '16', 'susantha----------- ------------ -     ', 'susantha@gmail.com');
INSERT INTO `tbl_comments` VALUES ('11', '17', 'mmmmmmmmmmmmmmmmm   ', 'abc@gmail.com');
INSERT INTO `tbl_comments` VALUES ('12', '18', 'mmmmmmmmmmmmmmmmm   ', 'abc@gmail.com');
INSERT INTO `tbl_comments` VALUES ('13', '19', 'fsdfdsf', 'asas@gmail.com');
INSERT INTO `tbl_comments` VALUES ('16', '21', 'ghgfh', 'qsa@gmail.com');
INSERT INTO `tbl_comments` VALUES ('17', '22', 'h', 'hftg@gmail.com');
INSERT INTO `tbl_comments` VALUES ('18', '22', 'ghjfh', 'bhuj@gmail.com');
INSERT INTO `tbl_comments` VALUES ('19', '24', 'gdh', 'ikl@gmail.com');
INSERT INTO `tbl_comments` VALUES ('20', '24', 'ggd', 'qssdg@gmail.com');
INSERT INTO `tbl_comments` VALUES ('21', '24', 'dgd', 'fsfes@gmail.com');
INSERT INTO `tbl_comments` VALUES ('22', '10', '|||||||||||||||||||||||||!!!!!!!!!!!!!!!!!!!!!!!!!!!!LLLLLLLLLLLLLLLLLLLLLL', 'abc@gmail.com');
INSERT INTO `tbl_comments` VALUES ('23', '12', 'qwert77777777777777777777777777777777', 'abc@gmail.com');
INSERT INTO `tbl_comments` VALUES ('24', '10', 'à·€à·’à¶¸à¶½à·Š à·€à·“à¶»à·€à¶‚à·ƒ à¶¸à·„à¶­à·à·€ à¶¢à·€à·’à¶´à·™à¶±à·Š à¶‰à·€à¶­à·Š à¶šà·… à¶…à·€à·ƒà·Šà¶®à·à·€à·š à¶­à¶¸à¶±à·Š à¶‡à¶­à·”à·…à·” à¶´à·’à¶»à·’à·ƒ à¶”à·„à·” à·ƒà¶¸à¶œ à¶‘à¶šà·Šà·€à·“ à¶¢à·à¶­à·’à¶š à¶±à·’à¶¯à·„à·ƒà·Š à¶´à·™à¶»à¶¸à·”à¶« à¶œà·œà¶©à¶±à·â€à¶œà·”à·€à·š à¶¢à·€à·’à¶´à·™à', 'susanthawar@gmail.co');
INSERT INTO `tbl_comments` VALUES ('25', '10', 'qqqqqqq\r\nqqqqqqqq\r\nqqqq\r\nqqqqqqqqqq\r\nq1111111111111111111', 'su@gmail.com');
INSERT INTO `tbl_comments` VALUES ('26', '10', 'à·„à·’à¶§à¶´à·” à¶¢à¶±à·à¶°à·’à¶´à¶­à·’ à¶¸à·„à·’à¶±à·Šà¶¯ à¶»à·à¶¢à¶´à¶šà·Šà·‚ à¶¸à·„à¶­à· à¶±à·à¶ºà¶šà¶­à·Šà·€à¶º à¶¯à·à¶»à·– à·ƒà¶±à·Šà¶°à·à¶± à¶»à¶¢à¶ºà·š à¶…à¶¸à·à¶­à·Šâ€à¶ºà·€à¶»à¶ºà·™à¶šà·” à¶½à·™à·ƒ à¶šà¶§à¶ºà·”à¶­à·” à¶šà¶½ à¶»à·à·„à·’à¶­ ', 'susanthawar@gmail.co');
INSERT INTO `tbl_comments` VALUES ('28', '102', 'tst', 'anuradha.br@gmail.co');
INSERT INTO `tbl_comments` VALUES ('29', '100', 'sdasdasdas', 'sdsdsd@sfsfs.vi');
INSERT INTO `tbl_comments` VALUES ('30', '100', 'sdasdasdas', 'sdsdsd@sfsfs.vi');
INSERT INTO `tbl_comments` VALUES ('31', '100', 'Aad', 'sdasdasd@gssSaan.com');
INSERT INTO `tbl_comments` VALUES ('32', '100', '', 'sdasd@sdfas.cm');
INSERT INTO `tbl_comments` VALUES ('33', '100', '', 'sdasd@sdfas.cm');
INSERT INTO `tbl_comments` VALUES ('34', '100', '', 'sdasd@sdfas.cm');
INSERT INTO `tbl_comments` VALUES ('35', '100', '', 'sdasd@sdfas.cm');
INSERT INTO `tbl_comments` VALUES ('36', '100', '', 'sdasd@sdfas.cm');
INSERT INTO `tbl_comments` VALUES ('37', '100', '', 'sdasd@sdfas.cm');
INSERT INTO `tbl_comments` VALUES ('38', '100', '', 'sdasd@sdfas.cm');
INSERT INTO `tbl_comments` VALUES ('39', '100', '', 'sdasd@sdfas.cm');
INSERT INTO `tbl_comments` VALUES ('40', '100', '', 'sdasd@sdfas.cm');
INSERT INTO `tbl_comments` VALUES ('41', '100', '', 'sdasd@sdfas.cm');
INSERT INTO `tbl_comments` VALUES ('42', '100', '', 'sdasd@sdfas.cm');
INSERT INTO `tbl_comments` VALUES ('43', '100', '', 'DSFSDFSF@SFSF.COM');
INSERT INTO `tbl_comments` VALUES ('44', '100', '', 'DSFSDFSF@SFSF.COM');
INSERT INTO `tbl_comments` VALUES ('45', '100', '', 'SADAD@DFSFSFs.fdf');
INSERT INTO `tbl_comments` VALUES ('46', '100', '', 'SADAD@DFSFSFs.fdf');
INSERT INTO `tbl_comments` VALUES ('47', '100', '', 'SADAD@DFSFSFs.fdf');
INSERT INTO `tbl_comments` VALUES ('48', '100', '', 'SADAD@DFSFSFs.fdf');
INSERT INTO `tbl_comments` VALUES ('49', '100', '', 'SADAD@DFSFSFs.fdf');
INSERT INTO `tbl_comments` VALUES ('50', '100', '', 'SADAD@DFSFSFs.fdf');
INSERT INTO `tbl_comments` VALUES ('51', '100', '', 'sdasdsa@gmail.com');
INSERT INTO `tbl_comments` VALUES ('52', '100', '', 'sdasdsa@gmail.com');
INSERT INTO `tbl_comments` VALUES ('53', '100', '', 'sdasd@sdfsd.com');
INSERT INTO `tbl_comments` VALUES ('54', '100', 'hi sw', 'susa@gmail.com');
INSERT INTO `tbl_comments` VALUES ('55', '100', 'hi sw', 'susa@gmail.com');
INSERT INTO `tbl_comments` VALUES ('56', '100', 'saddadada ssaw ', 'susa@gmail.com');
INSERT INTO `tbl_comments` VALUES ('57', '100', 'saddadada ssaw ', 'susa@gmail.com');
INSERT INTO `tbl_comments` VALUES ('58', '100', 'sdsd sdsd', 'susantha@gmail.com');
INSERT INTO `tbl_comments` VALUES ('59', '100', 'zcsds dcacaca ', 'susanthawarnapura@gm');
INSERT INTO `tbl_comments` VALUES ('60', '100', 'sdasdasdas', 'asadasd@sadsa.com');

-- ----------------------------
-- Table structure for `tbl_docs`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_docs`;
CREATE TABLE `tbl_docs` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `userid` int(5) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `doc_name` varchar(255) NOT NULL,
  `categoryid` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=421 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_docs
-- ----------------------------
INSERT INTO `tbl_docs` VALUES ('0', '16', '3378_Lush_Summer.jpg', '1', 'tyu', '15');
INSERT INTO `tbl_docs` VALUES ('2', '10', 'cover_inlay02.jpg', '1', 'as', '7');
INSERT INTO `tbl_docs` VALUES ('3', '10', 'cover_back.jpg', '1', 'sd', '7');
INSERT INTO `tbl_docs` VALUES ('4', '10', 'Folder.jpg', '1', 'ff', '8');
INSERT INTO `tbl_docs` VALUES ('7', '10', 'markup1.jpg', '1', 'ggd', '1');
INSERT INTO `tbl_docs` VALUES ('9', '12', 'What is a Software Development Process_ _ Analysis and Design.pdf', '1', 'ffg', '8');
INSERT INTO `tbl_docs` VALUES ('13', '12', 'steve_jobs_art-wallpaper-1280x800 (1).jpg', '1', 'rrc', '9');
INSERT INTO `tbl_docs` VALUES ('14', '12', '_____2_1920_1080.jpg', '1', 'ewr', '10');
INSERT INTO `tbl_docs` VALUES ('15', '12', 'slider-2.jpg', '1', 'qqqw', '10');
INSERT INTO `tbl_docs` VALUES ('16', '12', '(138).jpg', '1', 'tyu', '11');
INSERT INTO `tbl_docs` VALUES ('17', '12', '4085_Blue_Tubes.jpg', '1', 'edf', '12');
INSERT INTO `tbl_docs` VALUES ('18', '22', '6336_Vista_Field_-_II.jpg', '1', 'fb rr', '13');
INSERT INTO `tbl_docs` VALUES ('20', '12', '8092_cool_tulips.jpg', '1', 'frfrf', '14');
INSERT INTO `tbl_docs` VALUES ('21', '20', 'ffttr.jpg', '1', 'ffgrrf', '15');
INSERT INTO `tbl_docs` VALUES ('23', '16', '6336_Vista_Field_-_II.jpg', '1', 'egb', '16');
INSERT INTO `tbl_docs` VALUES ('24', '16', '5487_Green_Vista.jpg', '1', 'yuuiop', '17');
INSERT INTO `tbl_docs` VALUES ('25', '16', '2497_Hardy_White_Water.jpg', '1', 'pool', '17');
INSERT INTO `tbl_docs` VALUES ('26', '12', '2545_Sky.jpg', '1', 'hjk', '17');
INSERT INTO `tbl_docs` VALUES ('27', '12', 'ffttr.jpg', '1', 'gtr', '18');
INSERT INTO `tbl_docs` VALUES ('28', '12', 'f.jpg', '1', 'ewq', '18');
INSERT INTO `tbl_docs` VALUES ('29', '12', 'IP011039.jpg', '1', 'scsfsf', '19');
INSERT INTO `tbl_docs` VALUES ('46', '12', '19.jpg', '1', 'aat', '20');
INSERT INTO `tbl_docs` VALUES ('47', '12', '1898185_314022138793224_2706070738705973547_n.jpg', '1', 'ddd', '20');
INSERT INTO `tbl_docs` VALUES ('48', '12', '20.jpg', '1', 'gb10', '21');
INSERT INTO `tbl_docs` VALUES ('49', '12', '20.jpg', '1', 'zsczfz', '21');
INSERT INTO `tbl_docs` VALUES ('50', '12', '20.jpg', '1', 'z123', '2');
INSERT INTO `tbl_docs` VALUES ('55', '64', '50 - Copy.jpg', '1', 'paradise hill', '3');
INSERT INTO `tbl_docs` VALUES ('56', '64', '45 - Copy.jpg', '1', 'paradise hill', '4');
INSERT INTO `tbl_docs` VALUES ('57', '12', 'NewPreview.jpg', '1', 'paradise hill', '5');
INSERT INTO `tbl_docs` VALUES ('58', '12', 'beautiful tree.jpg', '1', 'paradise hill', '6');
INSERT INTO `tbl_docs` VALUES ('59', '12', '15 sri 7483.jpg', '1', 'asasas', '22');
INSERT INTO `tbl_docs` VALUES ('60', '12', 'DSC00704.jpg', '1', 'vvvv', '23');
INSERT INTO `tbl_docs` VALUES ('62', '13', 'DSC00001.JPG', '1', 'hoiio', '23');
INSERT INTO `tbl_docs` VALUES ('64', '11', 'DSC00010.JPG', '0', 'kkoki', '24');
INSERT INTO `tbl_docs` VALUES ('66', '14', 'DSC00029.JPG', '1', 'oplkm', '25');
INSERT INTO `tbl_docs` VALUES ('90', '47', 'Lithia Park, Ashland, Oregon.jpg', '1', 'sfs', '25');
INSERT INTO `tbl_docs` VALUES ('91', '21', 'Palm Canyon Creek, Borrego Palm Canyon, San Ysidro Mountains, California.jpg', '1', 'ascxdf', '26');
INSERT INTO `tbl_docs` VALUES ('92', '27', 'Lithia Park, Ashland, Oregon.jpg', '1', 'sdzscszs', '24');
INSERT INTO `tbl_docs` VALUES ('93', '22', 'Humboldt River, Nevada.jpg', '1', 'uirv', '23');
INSERT INTO `tbl_docs` VALUES ('94', '11', 'Lithia Park, Ashland, Oregon.jpg', '1', 'ububub', '23');
INSERT INTO `tbl_docs` VALUES ('95', '10', 'abc.pdf', '1', 'PHP', '23');
INSERT INTO `tbl_docs` VALUES ('96', '16', '3D Animals 7.jpg', '1', 'dfgdfgvg', '7');
INSERT INTO `tbl_docs` VALUES ('97', '10', '3D Animals 3.jpg', '1', 'cvbn', '7');
INSERT INTO `tbl_docs` VALUES ('98', '10', '3D Animals 6.jpg', '1', '3D', '7');
INSERT INTO `tbl_docs` VALUES ('99', '10', 'wallpaper-387461.jpg', '1', 'car', '8');
INSERT INTO `tbl_docs` VALUES ('100', '10', 'wallpaper-426640.jpg', '1', 'apple', '23');
INSERT INTO `tbl_docs` VALUES ('101', '10', 'wallpaper-824504.jpg', '1', 'microsoft', '21');
INSERT INTO `tbl_docs` VALUES ('102', '10', 'The IT Professional\'s Guide to Researching a New Industry [eBook].swf', '1', 'job', '21');
INSERT INTO `tbl_docs` VALUES ('104', '10', 'avn', '1', 'avn', '27');
INSERT INTO `tbl_docs` VALUES ('105', '10', 'White-paper.swf', '1', 'books2', '21');
INSERT INTO `tbl_docs` VALUES ('106', '90', 'White-paper.swf', '1', 'graphics', '23');
INSERT INTO `tbl_docs` VALUES ('107', '90', '_____169_1920_1080.jpg', '1', 'vzcscas', '1');
INSERT INTO `tbl_docs` VALUES ('108', '90', '_____3_1920_1080.jpg', '1', 'sawdae', '4');
INSERT INTO `tbl_docs` VALUES ('109', '87', 'matrix_binary-1366x768.jpg', '1', 'sfasas', '2');
INSERT INTO `tbl_docs` VALUES ('110', '88', '8.jpg', '1', 'swswsw', '37');
INSERT INTO `tbl_docs` VALUES ('111', '88', '21.jpg', '1', 'swswsw', '37');
INSERT INTO `tbl_docs` VALUES ('112', '88', '8.jpg', '1', 'swswsw', '37');
INSERT INTO `tbl_docs` VALUES ('113', '88', '6.jpg', '1', 'swswsw', '37');
INSERT INTO `tbl_docs` VALUES ('114', '88', '24.jpg', '1', 'ddzd', '37');
INSERT INTO `tbl_docs` VALUES ('115', '90', '21.jpg', '1', 'czxczxc', '37');
INSERT INTO `tbl_docs` VALUES ('116', '90', '21.jpg', '1', 'czxczxc', '37');
INSERT INTO `tbl_docs` VALUES ('117', '90', '21.jpg', '1', 'asdadsd', '18');
INSERT INTO `tbl_docs` VALUES ('118', '90', '26.jpg', '1', 'aaaaaassssssss', '18');
INSERT INTO `tbl_docs` VALUES ('119', '53', '8.jpg', '1', 'dfxdg', '18');
INSERT INTO `tbl_docs` VALUES ('120', '53', '8.jpg', '1', 'dfxdg', '18');
INSERT INTO `tbl_docs` VALUES ('121', '53', '7.jpg', '1', 'dfxdg', '18');
INSERT INTO `tbl_docs` VALUES ('122', '53', '8.jpg', '1', 'dfxdg', '18');
INSERT INTO `tbl_docs` VALUES ('123', '53', '15.jpg', '1', 'dfxdg', '18');
INSERT INTO `tbl_docs` VALUES ('124', '53', '16.jpg', '1', 'dfxdg', '18');
INSERT INTO `tbl_docs` VALUES ('125', '90', '8.jpg', '1', 'zczc', '17');
INSERT INTO `tbl_docs` VALUES ('126', '90', '8.jpg', '1', 'zczc', '17');
INSERT INTO `tbl_docs` VALUES ('127', '14', '40.jpg', '1', 'dczdc', '15');
INSERT INTO `tbl_docs` VALUES ('128', '15', '5.jpg', '1', 'scsc', '6');
INSERT INTO `tbl_docs` VALUES ('129', '84', '30.jpg', '1', 'sa', '19');
INSERT INTO `tbl_docs` VALUES ('130', '79', '69.jpg', '1', 'sadsad', '11');
INSERT INTO `tbl_docs` VALUES ('131', '66', '76.jpg', '1', 'asd', '15');
INSERT INTO `tbl_docs` VALUES ('132', '80', '25.jpg', '1', 'asdasd', '18');
INSERT INTO `tbl_docs` VALUES ('133', '86', '75.jpg', '1', 'asdasdd', '18');
INSERT INTO `tbl_docs` VALUES ('134', '87', '38.jpg', '1', 'adgd', '17');
INSERT INTO `tbl_docs` VALUES ('135', '86', 'New_windows7_starter_wallpasper_by_tonev.jpg', '1', 'asdasd', '36');
INSERT INTO `tbl_docs` VALUES ('136', '87', 'pure_grass-1440x900.jpg', '1', 'fsdfsf', '17');
INSERT INTO `tbl_docs` VALUES ('137', '89', 'drops_on_flower_petals-1440x900.jpg', '1', 'vdfvfb', '17');
INSERT INTO `tbl_docs` VALUES ('138', '51', 'pure_abstraction-1440x900.jpg', '1', 'd', '4');
INSERT INTO `tbl_docs` VALUES ('139', '88', 'clean_sky-1440x900.jpg', '1', 's', '33');
INSERT INTO `tbl_docs` VALUES ('140', '80', 'abstract_poster-wallpaper-2560x1600.jpg', '1', 'sfs', '6');
INSERT INTO `tbl_docs` VALUES ('141', '80', 'actress_kajol-1600x1200.jpg', '1', 'dada', '6');
INSERT INTO `tbl_docs` VALUES ('142', '88', 'mortal_kombat-wallpaper-2560x1600.jpg', '1', 'dg', '56');
INSERT INTO `tbl_docs` VALUES ('143', '66', 'mortal_kombat-wallpaper-2560x1600.jpg', '1', 'ioioi', '39');
INSERT INTO `tbl_docs` VALUES ('144', '66', 'mortal_kombat-wallpaper-2560x1600.jpg', '1', 'ad', '39');
INSERT INTO `tbl_docs` VALUES ('145', '10', 'christmas_snowflakes-1440x900.jpg', '1', 'ada', '58');
INSERT INTO `tbl_docs` VALUES ('146', '10', 'matrix_binary-1440x900.jpg', '1', 'a', '42');
INSERT INTO `tbl_docs` VALUES ('147', '10', 'chandrika_234.jpg', '1', 'aasdsa', '2');
INSERT INTO `tbl_docs` VALUES ('148', '10', 'chandrika_234.jpg', '1', 'hyr', '2');
INSERT INTO `tbl_docs` VALUES ('149', '50', '10952068_842794029093109_8681678790687399868_n.jpg', '1', 'hfhth', '39');
INSERT INTO `tbl_docs` VALUES ('150', '50', '10952068_842794029093109_8681678790687399868_n.jpg', '1', 'wqe', '39');
INSERT INTO `tbl_docs` VALUES ('151', '88', '10933870_10204672100456316_6849997729458732274_n.jpg', '1', 'hhh', '3');
INSERT INTO `tbl_docs` VALUES ('152', '88', '10933870_10204672100456316_6849997729458732274_n.jpg', '1', 'ddd', '3');
INSERT INTO `tbl_docs` VALUES ('153', '88', '10919010_855566064487128_632061997485809316_n.jpg', '1', 'gghgh', '3');
INSERT INTO `tbl_docs` VALUES ('154', '88', '10919010_855566064487128_632061997485809316_n.jpg', '1', 'dddfscs', '3');
INSERT INTO `tbl_docs` VALUES ('155', '89', '1743638_342310839292477_3660662982175155401_n.jpg', '1', 'zcz', '4');
INSERT INTO `tbl_docs` VALUES ('156', '89', '1743638_342310839292477_3660662982175155401_n.jpg', '1', '23e23e2eq', '4');
INSERT INTO `tbl_docs` VALUES ('157', '89', 'wallpaper-387461.jpg', '1', 'tyty', '4');
INSERT INTO `tbl_docs` VALUES ('158', '89', 'wallpaper-387461.jpg', '1', '2z2', '4');
INSERT INTO `tbl_docs` VALUES ('159', '90', '10891568_856875244373461_5619557749013049856_n.jpg', '1', 'wewewewew', '2');
INSERT INTO `tbl_docs` VALUES ('160', '90', '10891568_856875244373461_5619557749013049856_n.jpg', '1', 'zz2', '2');
INSERT INTO `tbl_docs` VALUES ('161', '86', 'chandrika_234.jpg', '1', 'dadawdadar4', '4');
INSERT INTO `tbl_docs` VALUES ('162', '86', 'chandrika_234.jpg', '1', '454', '4');
INSERT INTO `tbl_docs` VALUES ('163', '86', '10407181_628196054002320_3318938313535163103_n.jpg', '1', 'sdsds', '4');
INSERT INTO `tbl_docs` VALUES ('164', '86', '10407181_628196054002320_3318938313535163103_n.jpg', '1', '44', '4');
INSERT INTO `tbl_docs` VALUES ('165', '86', '10407084_351083071748587_3108764637224523707_n.jpg', '1', 'rtt4f', '4');
INSERT INTO `tbl_docs` VALUES ('166', '86', '10407084_351083071748587_3108764637224523707_n.jpg', '1', '4f4f', '4');
INSERT INTO `tbl_docs` VALUES ('167', '86', '10390376_776145292474261_6281639095281082169_n.jpg', '1', 'qwe', '4');
INSERT INTO `tbl_docs` VALUES ('168', '86', '10390376_776145292474261_6281639095281082169_n.jpg', '1', 'eff44f', '4');
INSERT INTO `tbl_docs` VALUES ('169', '87', 'screenshot3.jpg', '1', 'saa', '35');
INSERT INTO `tbl_docs` VALUES ('170', '87', 'screenshot3.jpg', '1', '6u6', '35');
INSERT INTO `tbl_docs` VALUES ('171', '87', 'screenshot2.jpg', '1', 'asADadAD', '35');
INSERT INTO `tbl_docs` VALUES ('172', '87', 'screenshot2.jpg', '1', 'g6hju66', '35');
INSERT INTO `tbl_docs` VALUES ('173', '49', 'swcreenshot5.jpg', '1', 'AAAAAAAAAAAAAA', '37');
INSERT INTO `tbl_docs` VALUES ('174', '49', 'swcreenshot5.jpg', '1', 'gwgg6', '37');
INSERT INTO `tbl_docs` VALUES ('175', '51', 'swcreenshot5.jpg', '1', 'ZDZDASDA', '36');
INSERT INTO `tbl_docs` VALUES ('176', '51', 'swcreenshot5.jpg', '1', 'wg6', '36');
INSERT INTO `tbl_docs` VALUES ('177', '80', 'connections_by_hildron101010-d85bl75.jpg', '1', 'asddaded', '32');
INSERT INTO `tbl_docs` VALUES ('178', '51', '1552993_194613614078552_2099929541_n.jpg', '1', 'AWAFAWFA', '40');
INSERT INTO `tbl_docs` VALUES ('179', '51', '1552993_194613614078552_2099929541_n.jpg', '1', 'gwg6', '40');
INSERT INTO `tbl_docs` VALUES ('180', '64', '10006318_730723323618487_1981928016_n.jpg', '1', 'fafafafafa', '31');
INSERT INTO `tbl_docs` VALUES ('181', '64', '10006318_730723323618487_1981928016_n.jpg', '1', 'gwg6g', '31');
INSERT INTO `tbl_docs` VALUES ('182', '52', '.jpg', '1', 'fzzfafa', '37');
INSERT INTO `tbl_docs` VALUES ('183', '52', '.jpg', '1', '6gwg', '37');
INSERT INTO `tbl_docs` VALUES ('184', '52', 'connections_by_hildron101010-d85bl75.jpg', '1', 'zzzzzzzzcedfe', '37');
INSERT INTO `tbl_docs` VALUES ('185', '52', 'connections_by_hildron101010-d85bl75.jpg', '1', '6grwg6', '37');
INSERT INTO `tbl_docs` VALUES ('186', '81', 'connections_by_hildron101010-d85bl75.jpg', '1', 'zfsfsfs', '34');
INSERT INTO `tbl_docs` VALUES ('187', '81', 'connections_by_hildron101010-d85bl75.jpg', '1', '6gr6gw', '34');
INSERT INTO `tbl_docs` VALUES ('188', '92', '1925159_628195780669014_526461639802235630_n.jpg', '1', 'cats', '5');
INSERT INTO `tbl_docs` VALUES ('189', '92', '1925159_628195780669014_526461639802235630_n.jpg', '1', '6rfw', '5');
INSERT INTO `tbl_docs` VALUES ('190', '92', '10801752_355295261322294_8288866290844416134_n.jpg', '1', 'asd', '5');
INSERT INTO `tbl_docs` VALUES ('191', '92', '10801752_355295261322294_8288866290844416134_n.jpg', '1', '6y6r', '5');
INSERT INTO `tbl_docs` VALUES ('192', '92', '10426322_621980837957175_6851041273146791064_n.jpg', '1', 'acv', '5');
INSERT INTO `tbl_docs` VALUES ('193', '92', '10426322_621980837957175_6851041273146791064_n.jpg', '1', '66y', '5');
INSERT INTO `tbl_docs` VALUES ('194', '93', '10407181_628196054002320_3318938313535163103_n.jpg', '1', 'bear', '31');
INSERT INTO `tbl_docs` VALUES ('195', '93', '10407181_628196054002320_3318938313535163103_n.jpg', '1', '6g6', '31');
INSERT INTO `tbl_docs` VALUES ('196', '94', '10940436_628195894002336_7395452478720984368_n.jpg', '1', 'snail', '6');
INSERT INTO `tbl_docs` VALUES ('197', '94', '10940436_628195894002336_7395452478720984368_n.jpg', '1', '6y6gr', '6');
INSERT INTO `tbl_docs` VALUES ('198', '95', '10440754_919526064725380_4292375914299077152_n.jpg', '1', 'net', '6');
INSERT INTO `tbl_docs` VALUES ('199', '95', '10440754_919526064725380_4292375914299077152_n.jpg', '1', 'y56y6', '6');
INSERT INTO `tbl_docs` VALUES ('200', '96', '1925159_628195780669014_526461639802235630_n.jpg', '1', 'cat3', '32');
INSERT INTO `tbl_docs` VALUES ('201', '96', '1925159_628195780669014_526461639802235630_n.jpg', '1', '33e33', '32');
INSERT INTO `tbl_docs` VALUES ('202', '97', '1743638_342310839292477_3660662982175155401_n.jpg', '1', '3e3', '40');
INSERT INTO `tbl_docs` VALUES ('203', '79', '10945576_351369711719923_2681510040731739234_n.jpg', '1', 'd3d', '5');
INSERT INTO `tbl_docs` VALUES ('204', '79', 'connections_by_hildron101010-d85bl75.jpg', '1', 'd3', '5');
INSERT INTO `tbl_docs` VALUES ('205', '66', '10868211_367209770070349_2862298587587467268_n.jpg', '1', 'd33', '33');
INSERT INTO `tbl_docs` VALUES ('206', '79', 'nov26.jpg', '1', 'd3', '17');
INSERT INTO `tbl_docs` VALUES ('207', '98', 'factroymanB.jpg', '1', '33', '67');
INSERT INTO `tbl_docs` VALUES ('208', '98', 'factoryman.jpg', '1', 'd3', '67');
INSERT INTO `tbl_docs` VALUES ('209', '92', '10644646_10152362226997546_6637084111152591667_n.jpg', '1', 'wdded', '6');
INSERT INTO `tbl_docs` VALUES ('210', '100', '10428027_628196087335650_3884488670582508105_n.jpg', '1', 'ewd', '4');
INSERT INTO `tbl_docs` VALUES ('211', '100', '1925159_628195780669014_526461639802235630_n.jpg', '1', 'wed', '2');
INSERT INTO `tbl_docs` VALUES ('212', '100', '10940436_628195894002336_7395452478720984368_n.jpg', '1', 'ded', '4');
INSERT INTO `tbl_docs` VALUES ('213', '12', 'cccc.jpg', '1', '333', '1');
INSERT INTO `tbl_docs` VALUES ('214', '12', 'bbbb.jpg', '1', '222', '9');
INSERT INTO `tbl_docs` VALUES ('215', '12', 'aaaa.jpg', '1', 'Funny cat1', '18');
INSERT INTO `tbl_docs` VALUES ('216', '101', 'cccc.jpg', '1', 'keny', '1');
INSERT INTO `tbl_docs` VALUES ('217', '101', 'bbbb.jpg', '1', '222', '1');
INSERT INTO `tbl_docs` VALUES ('218', '101', 'aaaa.jpg', '1', '333', '1');
INSERT INTO `tbl_docs` VALUES ('219', '102', 'Mr.paint new.swf', '1', 'C# - Level 1', '84');
INSERT INTO `tbl_docs` VALUES ('220', '102', 'Mr.paint new2 .swf', '1', 'NTW Level 2', '83');
INSERT INTO `tbl_docs` VALUES ('221', '102', 'Hotplate150.jpg', '1', 'GIS', '83');
INSERT INTO `tbl_docs` VALUES ('222', '102', 'test123.swf', '1', 'Computer Level 1', '88');
INSERT INTO `tbl_docs` VALUES ('223', '103', 'test123.swf', '1', 'SRK', '88');
INSERT INTO `tbl_docs` VALUES ('224', '103', 'test1234.swf', '1', 'test 2', '84');
INSERT INTO `tbl_docs` VALUES ('225', '103', 'qq.swf', '1', 'asd9', '3');
INSERT INTO `tbl_docs` VALUES ('226', '103', '11e9c530-ba3d-48d8-a20e-10cf611ea068.jpg', '1', 'cat', '86');
INSERT INTO `tbl_docs` VALUES ('227', '10', '183757_10151160146546294_615856270_n.jpg', '1', 'srk', '92');
INSERT INTO `tbl_docs` VALUES ('228', '10', '199568_10151224041551154_1064273501_n.jpg', '1', 'lord budhdha', '94');
INSERT INTO `tbl_docs` VALUES ('229', '10', '11e9c530-ba3d-48d8-a20e-10cf611ea068.jpg', '1', 'funny cat', '97');
INSERT INTO `tbl_docs` VALUES ('230', '104', '45204_10151510898692988_35037515_n.jpg', '1', 'op1', '99');
INSERT INTO `tbl_docs` VALUES ('231', '104', '64734_256013274484462_210617382357385_556633_1231197104_n.jpg', '1', 'oop2', '102');
INSERT INTO `tbl_docs` VALUES ('232', '104', '217998_362107277201292_2002111436_n.jpg', '0', 'ooop3', '104');
INSERT INTO `tbl_docs` VALUES ('233', '103', '47513_391347877601531_516723036_n.jpg', '1', 'qwer', '15');
INSERT INTO `tbl_docs` VALUES ('234', '103', '221961_518709518144541_98911681_n.jpg', '1', 'ssss', '6');
INSERT INTO `tbl_docs` VALUES ('235', '103', '304377_346341038783315_257033373_n.jpg', '1', 'eeeeeee', '6');
INSERT INTO `tbl_docs` VALUES ('236', '103', '183757_10151160146546294_615856270_n.jpg', '1', 'sssr', '5');
INSERT INTO `tbl_docs` VALUES ('237', '103', '523558_366414220064428_193218727383979_955078_1053198298_n.jpg', '1', 'ert', '5');
INSERT INTO `tbl_docs` VALUES ('238', '104', '16128_844651128909425_8904845688307235401_n.jpg', '1', 'wert', '6');
INSERT INTO `tbl_docs` VALUES ('239', '104', '422946_308635605863878_406736403_n.jpg', '1', 'ghn', '6');
INSERT INTO `tbl_docs` VALUES ('240', '104', '1779100_384913561646531_1738113478_n.jpg', '1', 'zzzzz', '6');
INSERT INTO `tbl_docs` VALUES ('241', '102', '421073_334807819886713_206974312670065_1090313_1094034651_n.jpg', '1', '11111111111', '6');
INSERT INTO `tbl_docs` VALUES ('242', '102', '1002464_293751264152348_9179908671118108538_n.jpg', '1', '22222222222', '6');
INSERT INTO `tbl_docs` VALUES ('243', '101', '559251_430776390294877_459140112_n.jpg', '1', 'wer', '6');
INSERT INTO `tbl_docs` VALUES ('244', '101', '576608_10151795216826840_861296851_n.jpg', '1', 'dfg', '6');
INSERT INTO `tbl_docs` VALUES ('245', '101', '413704_215927548501148_100002517127366_443601_1075603867_o.jpg', '1', 'jk', '6');
INSERT INTO `tbl_docs` VALUES ('246', '101', '64734_256013274484462_210617382357385_556633_1231197104_n.jpg', '1', 'jjk', '6');
INSERT INTO `tbl_docs` VALUES ('247', '101', '248028_410149779036337_1723077500_n.jpg', '1', 'vsfsf', '6');
INSERT INTO `tbl_docs` VALUES ('248', '100', '224879_10151022284645873_1790937325_n.jpg', '1', 'asdfdfe', '6');
INSERT INTO `tbl_docs` VALUES ('249', '102', '392031_249688375094201_228131663916539_694095_661169349_n.jpg', '1', 'ert', '17');
INSERT INTO `tbl_docs` VALUES ('250', '103', '1070029_678296945514248_616379260_n.jpg', '1', 'asd', '6');
INSERT INTO `tbl_docs` VALUES ('251', '103', '418453_350478424972677_100000315679852_1160294_964651483_n.jpg', '1', 'pppp', '5');
INSERT INTO `tbl_docs` VALUES ('252', '102', '540511_429991930356160_1019925091_n.jpg', '1', 'gfgfdd', '5');
INSERT INTO `tbl_docs` VALUES ('253', '102', '408717_276532442409794_228131663916539_771409_205372145_n.jpg', '1', 'lkj', '5');
INSERT INTO `tbl_docs` VALUES ('254', '104', '530037_365085263530657_193218727383979_951296_1108382774_n.jpg', '1', 'q5', '4');
INSERT INTO `tbl_docs` VALUES ('255', '104', '1485101_439769336122574_160041588_n.jpg', '0', 'wwww', '4');
INSERT INTO `tbl_docs` VALUES ('256', '104', '10006318_730723323618487_1981928016_n.jpg', '0', 'ssssss', '4');
INSERT INTO `tbl_docs` VALUES ('257', '104', '183757_10151160146546294_615856270_n.jpg', '0', 'wwwwwww', '4');
INSERT INTO `tbl_docs` VALUES ('258', '104', '600px-Randy_orton.jpg', '0', 'eeeeeeee', '4');
INSERT INTO `tbl_docs` VALUES ('262', '104', '1.jpg', '0', '111', '15');
INSERT INTO `tbl_docs` VALUES ('263', '103', '33.jpg', '1', 'op', '6');
INSERT INTO `tbl_docs` VALUES ('264', '103', '28.jpg', '1', 'jgjgjg', '4');
INSERT INTO `tbl_docs` VALUES ('265', '103', '31.JPG', '1', 'ili', '4');
INSERT INTO `tbl_docs` VALUES ('266', '103', '114.jpg', '1', 'susantha', '4');
INSERT INTO `tbl_docs` VALUES ('267', '103', '38.jpg', '1', 'sd', '17');
INSERT INTO `tbl_docs` VALUES ('268', '104', '101.jpg', '1', 'zxcvmb', '17');
INSERT INTO `tbl_docs` VALUES ('271', '103', '21.jpg', '1', 'ssdsd', '17');
INSERT INTO `tbl_docs` VALUES ('272', '102', '115.JPG', '0', 'sdf', '3');
INSERT INTO `tbl_docs` VALUES ('273', '104', '44.jpg', '1', 'polos', '6');
INSERT INTO `tbl_docs` VALUES ('274', '103', '37.jpg', '1', 'jjjk', '33');
INSERT INTO `tbl_docs` VALUES ('275', '104', '13.jpg', '1', 'qwerty', '6');
INSERT INTO `tbl_docs` VALUES ('276', '97', '110.jpg', '1', 'sus', '6');
INSERT INTO `tbl_docs` VALUES ('277', '102', '40.jpg', '1', 'asdfgh', '34');
INSERT INTO `tbl_docs` VALUES ('278', '103', '26.jpg', '1', 'dddd', '5');
INSERT INTO `tbl_docs` VALUES ('279', '90', '41.jpg', '1', 'dfg', '39');
INSERT INTO `tbl_docs` VALUES ('280', '92', '100.jpg', '1', 'asdf', '6');
INSERT INTO `tbl_docs` VALUES ('281', '94', '27.jpg', '1', 'dfsfsf', '4');
INSERT INTO `tbl_docs` VALUES ('282', '92', '33.jpg', '1', 'dsdsd', '6');
INSERT INTO `tbl_docs` VALUES ('283', '92', '1.jpg', '1', 'aaa', '2');
INSERT INTO `tbl_docs` VALUES ('284', '92', '2.JPG', '1', 'bbb', '2');
INSERT INTO `tbl_docs` VALUES ('285', '92', '3.jpg', '1', 'opi', '37');
INSERT INTO `tbl_docs` VALUES ('286', '92', '10.jpg', '1', 'ikl', '34');
INSERT INTO `tbl_docs` VALUES ('287', '92', '36.jpg', '1', 'ccc', '1');
INSERT INTO `tbl_docs` VALUES ('288', '92', '269759_342703942483943_400763069_n.jpg', '1', 'aaaa', '6');
INSERT INTO `tbl_docs` VALUES ('289', '92', '43.jpg', '1', 'zxcvbf', '2');
INSERT INTO `tbl_docs` VALUES ('290', '92', '296534_1698161792117_3158280_n.jpg', '1', 'qwer', '41');
INSERT INTO `tbl_docs` VALUES ('291', '92', '301888_349298345125726_345405288848365_853728_1237703419_n.jpg', '1', 'dfdfdf', '6');
INSERT INTO `tbl_docs` VALUES ('292', '92', '321133_247201031999661_107459895973776_636788_535372995_n.jpg', '1', 'aaaa', '35');
INSERT INTO `tbl_docs` VALUES ('293', '92', 'DSC_0003.jpg', '1', 'sw1', '35');
INSERT INTO `tbl_docs` VALUES ('294', '103', 'aozd34g_700b_v1.jpg', '1', 'aaa', '5');
INSERT INTO `tbl_docs` VALUES ('295', '105', '16.JPG', '1', 'cad', '65');
INSERT INTO `tbl_docs` VALUES ('296', '105', '26.jpg', '1', 'fgr', '65');
INSERT INTO `tbl_docs` VALUES ('297', '105', '21.jpg', '1', 'kli', '3');
INSERT INTO `tbl_docs` VALUES ('298', '105', '29.jpg', '1', 'ssds', '3');
INSERT INTO `tbl_docs` VALUES ('299', '105', '117.jpg', '1', 'kjohoh', '6');
INSERT INTO `tbl_docs` VALUES ('300', '105', '116.jpg', '1', 'qwe', '5');
INSERT INTO `tbl_docs` VALUES ('301', '105', '18.jpg', '1', 'asda', '17');
INSERT INTO `tbl_docs` VALUES ('302', '105', '35.jpg', '1', 'qwert', '28');
INSERT INTO `tbl_docs` VALUES ('303', '97', '18.jpg', '1', 'qwe', '5');
INSERT INTO `tbl_docs` VALUES ('304', '105', '19.jpg', '1', 'iop', '6');
INSERT INTO `tbl_docs` VALUES ('305', '105', '13.jpg', '1', 'onm', '6');
INSERT INTO `tbl_docs` VALUES ('306', '105', '1.jpg', '1', 'njm', '17');
INSERT INTO `tbl_docs` VALUES ('307', '105', '20.jpg', '1', 'plm', '2');
INSERT INTO `tbl_docs` VALUES ('308', '96', '25.jpg', '1', 'll', '6');
INSERT INTO `tbl_docs` VALUES ('309', '105', '115.JPG', '1', 'er', '173');
INSERT INTO `tbl_docs` VALUES ('310', '105', 'wwqe.jpg', '1', 'cat1', '173');
INSERT INTO `tbl_docs` VALUES ('311', '105', 'wqeqw.jpg', '1', 'cat2', '173');
INSERT INTO `tbl_docs` VALUES ('312', '105', 'VRAE.jpg', '1', 'cat2', '173');
INSERT INTO `tbl_docs` VALUES ('313', '105', 'srgrrg.jpg', '1', 'uif', '6');
INSERT INTO `tbl_docs` VALUES ('314', '105', 'sFVGWG.jpg', '1', 'gr', '6');
INSERT INTO `tbl_docs` VALUES ('315', '105', 'RRb.jpg', '1', 'fgd', '6');
INSERT INTO `tbl_docs` VALUES ('316', '105', 'hgg.jpg', '1', 'ghf', '6');
INSERT INTO `tbl_docs` VALUES ('317', '108', 'qeq.jpg', '1', 'adada', '6');
INSERT INTO `tbl_docs` VALUES ('318', '110', 'qdq.jpg', '1', 'lop', '6');
INSERT INTO `tbl_docs` VALUES ('319', '110', 'zzTLK.jpg', '1', 'qq', '17');
INSERT INTO `tbl_docs` VALUES ('320', '110', 'aozd34g_700b_v1.jpg', '1', 'wswswsws', '17');
INSERT INTO `tbl_docs` VALUES ('321', '110', 'DSC_0003.jpg', '1', 'wdeddwqdqd', '17');
INSERT INTO `tbl_docs` VALUES ('322', '110', '304377_346341038783315_257033373_n.jpg', '1', 'qazxc', '6');
INSERT INTO `tbl_docs` VALUES ('323', '110', 'screenshot3.jpg', '1', 'tgtgtgtg', '6');
INSERT INTO `tbl_docs` VALUES ('324', '109', '10471414_285939554933519_5954204096466358117_n.jpg', '1', 'swsw', '6');
INSERT INTO `tbl_docs` VALUES ('325', '109', '1002464_293751264152348_9179908671118108538_n.jpg', '1', 'wwwwsedqdqd', '6');
INSERT INTO `tbl_docs` VALUES ('326', '109', '10570287_285941418266666_5758988755747469992_n.jpg', '1', 'rrradw', '6');
INSERT INTO `tbl_docs` VALUES ('327', '110', '10537333_1444992805755491_691401039732794324_n.jpg', '1', 'qwqwqwqwqw', '34');
INSERT INTO `tbl_docs` VALUES ('328', '110', '10857855_565951526869246_4331281031405569747_n.jpg', '1', 'cvdefefefef', '34');
INSERT INTO `tbl_docs` VALUES ('329', '110', 'a2NMY6p_460s.jpg', '1', 'hvhvh', '5');
INSERT INTO `tbl_docs` VALUES ('330', '110', 'p33.jpg', '1', 'fdgxfnzrzs', '5');
INSERT INTO `tbl_docs` VALUES ('331', '110', '1184343847.jpg', '1', 'fffffffffhdgrdgere', '31');
INSERT INTO `tbl_docs` VALUES ('332', '110', '50.jpg', '1', 'asdadedadawsaw', '34');
INSERT INTO `tbl_docs` VALUES ('333', '110', '50 - Copy.jpg', '1', 'wqeqedqfff', '34');
INSERT INTO `tbl_docs` VALUES ('334', '110', '49.jpg', '1', 'drrgffwwe', '34');
INSERT INTO `tbl_docs` VALUES ('335', '109', '47.jpg', '1', 'asasddd', '6');
INSERT INTO `tbl_docs` VALUES ('336', '109', '46.jpg', '1', 'qwweqq1', '6');
INSERT INTO `tbl_docs` VALUES ('337', '109', '45.jpg', '1', 'qsad12wws', '6');
INSERT INTO `tbl_docs` VALUES ('338', '109', '32.jpg', '1', 'wqdqwdqcwfwqf', '4');
INSERT INTO `tbl_docs` VALUES ('339', '109', '31.jpg', '1', 'efwfwfwfwxdsded', '4');
INSERT INTO `tbl_docs` VALUES ('340', '109', '30.jpg', '1', 'efwewfwfwfwcc', '4');
INSERT INTO `tbl_docs` VALUES ('341', '109', '24.jpg', '1', 'dfdawdwdwdwdw', '4');
INSERT INTO `tbl_docs` VALUES ('342', '109', '23.jpg', '1', 'wddfwdfwfwfwfw', '4');
INSERT INTO `tbl_docs` VALUES ('343', '109', '22.jpg', '1', 'wer43d', '4');
INSERT INTO `tbl_docs` VALUES ('344', '110', '16.jpg', '1', 'sasasasasa', '3');
INSERT INTO `tbl_docs` VALUES ('345', '110', '15.jpg', '1', 'qq21ws', '3');
INSERT INTO `tbl_docs` VALUES ('346', '110', '14.jpg', '1', 'w2w2waa', '3');
INSERT INTO `tbl_docs` VALUES ('347', '108', '17.jpg', '1', 'qww2s', '1');
INSERT INTO `tbl_docs` VALUES ('348', '108', '9.jpg', '0', 'sdsaq2', '1');
INSERT INTO `tbl_docs` VALUES ('349', '110', '22.jpg', '1', 'wdedde', '17');
INSERT INTO `tbl_docs` VALUES ('350', '110', '21.jpg', '1', 'wdwddc', '17');
INSERT INTO `tbl_docs` VALUES ('351', '110', '20.jpg', '1', 'dwasas', '17');
INSERT INTO `tbl_docs` VALUES ('352', '109', '26.jpg', '1', 'sasq1w1w', '17');
INSERT INTO `tbl_docs` VALUES ('353', '109', '25.jpg', '1', 'as2', '17');
INSERT INTO `tbl_docs` VALUES ('354', '109', '37.jpg', '1', 'asq21w', '17');
INSERT INTO `tbl_docs` VALUES ('355', '109', '36.jpg', '1', '11333', '17');
INSERT INTO `tbl_docs` VALUES ('356', '102', '48.jpg', '1', 'wa2q21', '6');
INSERT INTO `tbl_docs` VALUES ('357', '102', '34.jpg', '1', 'qwe12we11', '6');
INSERT INTO `tbl_docs` VALUES ('358', '104', '15 - Copy.jpg', '0', 'dwdw22', '5');
INSERT INTO `tbl_docs` VALUES ('359', '104', '12.jpg', '0', 'adda1', '335');
INSERT INTO `tbl_docs` VALUES ('360', '104', '4.jpg', '0', 'sadad', '335');
INSERT INTO `tbl_docs` VALUES ('361', '104', '16 - Copy.jpg', '0', 'adawdwd', '15');
INSERT INTO `tbl_docs` VALUES ('362', '104', '18 - Copy.jpg', '0', 'adqd', '5');
INSERT INTO `tbl_docs` VALUES ('363', '112', '7 - Copy.jpg', '1', 'addwdd', '3');
INSERT INTO `tbl_docs` VALUES ('364', '113', '304377_346341038783315_257033373_n.jpg', '1', 'amc_cat1', '4');
INSERT INTO `tbl_docs` VALUES ('365', '114', 'inspirational-steave-jobs-quotes-hd-wallpapers.jpg', '1', 'amc_steve1', '71');
INSERT INTO `tbl_docs` VALUES ('366', '112', 'Sharukh-Khan.jpg', '1', 'dfrr', '6');
INSERT INTO `tbl_docs` VALUES ('367', '112', '10338745_10152544635069433_5607772679768913047_n.jpg', '1', 'qwez1', '4');
INSERT INTO `tbl_docs` VALUES ('368', '112', '10251889_10152179867311840_6939927888367980005_n.jpg', '1', 'asdq1', '4');
INSERT INTO `tbl_docs` VALUES ('369', '112', '10155694_658176090897939_7146890_n.jpg', '1', '1aw21', '4');
INSERT INTO `tbl_docs` VALUES ('370', '112', '10001320_455800204552615_7487612137344752718_n.jpg', '1', 'efe2', '6');
INSERT INTO `tbl_docs` VALUES ('371', '112', '1549478_537671449711585_4339026546695090643_n.jpg', '1', '33232', '6');
INSERT INTO `tbl_docs` VALUES ('372', '112', '983621_455707607895208_5897774694851140159_n.jpg', '1', '2w2s', '6');
INSERT INTO `tbl_docs` VALUES ('373', '102', '10001320_455800204552615_7487612137344752718_n.jpg', '1', 'wew', '6');
INSERT INTO `tbl_docs` VALUES ('374', '112', 'a-history-of-browser-usage_50290f25b40d4_w1500.jpg', '1', 'qsq', '6');
INSERT INTO `tbl_docs` VALUES ('375', '111', 'interface in programming.jpg', '1', 'drgdg', '6');
INSERT INTO `tbl_docs` VALUES ('376', '112', 'What is a package manager.jpg', '1', 'sas', '17');
INSERT INTO `tbl_docs` VALUES ('377', '112', 'Web application.jpg', '1', 'aaws', '17');
INSERT INTO `tbl_docs` VALUES ('378', '112', 'screenshot2.jpg', '1', 'sax2', '17');
INSERT INTO `tbl_docs` VALUES ('379', '112', 'screenshot1.jpg', '1', 'sdqw21', '17');
INSERT INTO `tbl_docs` VALUES ('380', '112', 'Database Driven Website.jpg', '1', '1232w12w', '17');
INSERT INTO `tbl_docs` VALUES ('381', '112', 'Database Management Systems.jpg', '1', '2ww2', '17');
INSERT INTO `tbl_docs` VALUES ('382', '112', 'Database index.jpg', '1', '2e2q', '17');
INSERT INTO `tbl_docs` VALUES ('383', '112', 'screenshot3.jpg', '1', 'sdsdf', '6');
INSERT INTO `tbl_docs` VALUES ('384', '112', 'Callback .jpg', '1', 'wsqssdf', '6');
INSERT INTO `tbl_docs` VALUES ('385', '112', 'an-overview-of-computer-programing_50290c3634fa3.jpg', '1', 'edqdqdq33', '6');
INSERT INTO `tbl_docs` VALUES ('386', '112', 'all-about-apis_51c218ca92dc9.jpg', '1', 'ddfff', '6');
INSERT INTO `tbl_docs` VALUES ('387', '112', '4833512699_761a3fcc61_b.jpg', '1', 'wwd3', '6');
INSERT INTO `tbl_docs` VALUES ('388', '112', 'VRAE.jpg', '1', '2qeqd', '40');
INSERT INTO `tbl_docs` VALUES ('389', '112', 'qdq.jpg', '1', '34dd', '40');
INSERT INTO `tbl_docs` VALUES ('390', '112', 'NMN.jpg', '1', '1112s', '40');
INSERT INTO `tbl_docs` VALUES ('391', '112', 'RRb.jpg', '1', 'tfhfth', '40');
INSERT INTO `tbl_docs` VALUES ('392', '112', 'hgg.jpg', '1', 'grr44', '40');
INSERT INTO `tbl_docs` VALUES ('393', '112', 'sFVGWG.jpg', '1', 'wdqwdwd', '38');
INSERT INTO `tbl_docs` VALUES ('394', '112', 'srgrrg.jpg', '1', 'qwe34', '38');
INSERT INTO `tbl_docs` VALUES ('395', '112', 'NGNFN.jpg', '1', 'wqdqwd34', '38');
INSERT INTO `tbl_docs` VALUES ('396', '112', 'dabad.jpg', '1', 'zxcww', '38');
INSERT INTO `tbl_docs` VALUES ('397', '112', 'DGDG.jpg', '1', '455wf', '38');
INSERT INTO `tbl_docs` VALUES ('398', '112', 'VRAE - Copy.jpg', '1', 'asxadqw33', '38');
INSERT INTO `tbl_docs` VALUES ('399', '112', 'RRb - Copy.jpg', '1', 'd3e212w1', '38');
INSERT INTO `tbl_docs` VALUES ('400', '112', 'qdq - Copy.jpg', '1', '231232s2w21w', '38');
INSERT INTO `tbl_docs` VALUES ('401', '112', 'hgg - Copy.jpg', '1', '21221sqsq2s2w', '38');
INSERT INTO `tbl_docs` VALUES ('402', '112', 'FDDGA - Copy.jpg', '1', '2w2wzz2w2w', '38');
INSERT INTO `tbl_docs` VALUES ('403', '112', 'NGNFN - Copy.jpg', '1', 'wwd', '6');
INSERT INTO `tbl_docs` VALUES ('404', '112', 'GWGW - Copy.jpg', '1', 'dqdfff', '6');
INSERT INTO `tbl_docs` VALUES ('405', '112', 'zzTLK - Copy.jpg', '1', 'dwdqdqd', '6');
INSERT INTO `tbl_docs` VALUES ('406', '112', 'wwqe - Copy.jpg', '1', 'wdwdqq', '6');
INSERT INTO `tbl_docs` VALUES ('407', '112', 'wqeqw - Copy.jpg', '1', 'fqfqfqqdqd', '6');
INSERT INTO `tbl_docs` VALUES ('408', '112', 'Fsdqwe - Copy.jpg', '1', 'AAAAAEQ2', '17');
INSERT INTO `tbl_docs` VALUES ('409', '112', 'VRDADAadsdE.jpg', '1', 'cedea', '17');
INSERT INTO `tbl_docs` VALUES ('410', '112', 'VRAEdq - Copy.jpg', '1', 'wdwdwdwddff', '17');
INSERT INTO `tbl_docs` VALUES ('411', '112', 'srgrQErg - Copy.jpg', '1', 'afdwdwds', '17');
INSERT INTO `tbl_docs` VALUES ('412', '112', 'sFVSFSFAFDWQGWG.jpg', '1', 'sdasda3ff', '36');
INSERT INTO `tbl_docs` VALUES ('413', '112', 'sFVGAFWWG - Copy.jpg', '1', 'dawdd2', '36');
INSERT INTO `tbl_docs` VALUES ('414', '112', 'RSFSFRb.jpg', '1', 'd2e2wqxwsws', '36');
INSERT INTO `tbl_docs` VALUES ('415', '112', 'VRAedaedwdwdwEdq - Copy - Copy.jpg', '1', 'daed23', '36');
INSERT INTO `tbl_docs` VALUES ('416', '112', 'VdedddwdcxdqwRAEdq - Copy.jpg', '1', '3e3434axa', '36');
INSERT INTO `tbl_docs` VALUES ('417', '115', '2AFAFA.jpg', '1', 'cdsrbhh', '6');
INSERT INTO `tbl_docs` VALUES ('418', '115', 'dssawdwqbad.jpg', '1', 'asdadaw334', '3');
INSERT INTO `tbl_docs` VALUES ('419', '115', 'DGsssqDG.jpg', '1', 'fbsfw', '3');
INSERT INTO `tbl_docs` VALUES ('420', '115', 'DGs1sDG - Copy.jpg', '1', '12asde', '3');

-- ----------------------------
-- Table structure for `tbl_user`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` char(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(2) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `warnings` int(1) DEFAULT NULL,
  `account_status` int(1) DEFAULT NULL,
  `account_disable_code` varchar(4) DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL,
  `logout_time` int(11) DEFAULT NULL,
  `tel_country` varchar(4) NOT NULL,
  `tel_number` varchar(9) NOT NULL,
  `temp_pass` varchar(8) DEFAULT NULL,
  `temp_pass_time` int(11) DEFAULT NULL,
  `amc` varchar(5) DEFAULT NULL,
  `ipaddress` varchar(255) DEFAULT NULL,
  `reglink` mediumtext,
  `amc1password` varchar(8) DEFAULT NULL,
  `amc1link` mediumtext,
  `amc2password` varchar(8) DEFAULT NULL,
  `amc2link` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES ('10', 'susantha', 'wranapura', 'susanthawarnapura7@gmail.com', 'LK', 'sus', 'e821db73', '0', '1', '22f8', '1422518346', '1423724430', '+94', '712579230', '701f8dba', '1421110923', '1', '::1', 'http://demo.ozisolutions.com/amcpdf/index.php?doctor=aWQ9MTIzc2RzU0RjU0UzM3NkWWFzZGZXSCZwYXJhbWV0ZXI9cXcyZHFmREtzZG40S3JzVDkmQThoeT1aVzFoYVd3OWMzVnpZVzUwYUdGM1lYSnVZWEIxY21GQVoyMWhhV3d1WTI5dCZTTjlwPXR2c0hEVzg5MEtibnRkZg==', null, null, null, null);
INSERT INTO `tbl_user` VALUES ('12', 'kalana', 'n', 'oopopo', 'VN', 'kl', '1ert', '0', '0', 'fe6f', '1420000188', '1423665001', '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('14', 'piyals', 'q', 'abc@gmail.com', 'BD', 'piya7', '421ef179', null, '1', null, '1421060882', '1421060930', '+94', '712579230', null, null, null, '::1', null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('15', 'jagath', 's', 'asasdasdasd', 'LK', 'jag', null, null, '1', null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('16', 'sadasd', 'd', 'sdasdasdasd', 'VN', 'dasdasda', null, null, '0', null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('19', 'ayesh7', 'q', 'dadasdasd', 'BD', 'ay2', 'dele', null, '1', null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('20', 'namal', 's', 'xyz@gmail.com', 'LK', 'namal', '90909090', null, '1', null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('21', 'amila', 'q', 'amila@gmail.com', 'LK', 'amila562', 'abc123', null, '1', null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('22', 'jagath', 'g', 'ssdfsdfdsf', 'LK', 'jagath123', 'qwerty', null, '1', null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('26', 'kasun', 'a', 'sdasdasd', 'VN', 'ks32', '123', null, '1', null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('27', 'warnapura', 's', 'asdasdasd', 'WS', 'war', '321', null, '1', null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('28', 'haritha', 'w', 'sdfscsdfs', 'VN', 'hw', 'ccc', null, null, null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('29', 'thisaran', 'k', 'thisara@gmail.co', 'WS', 'this', '12345678', null, '1', null, null, null, '', '0', '1b2978fd', '1420110665', null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('47', 'katare', 'a', 'abcd@gmail.com', 'AT', 'ktr', '12345678', null, null, null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('49', 'harith', 'f', 'abcf@gmail.com', 'LK', 'ht32', '12345678', null, '1', null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('50', 'geeth', 'Q', 'geeth@abc.com', 'GD', 'geethq', '12345678', null, null, null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('51', 'karuna', 's', 'abcg@gmail.com', 'BD', 'krln', 'xyz12345', null, null, null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('52', 'veronica', 'j', 'abch@gmail.com', 'VN', 'vjn', '12345678', null, '1', null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('53', 'chamila', 'a', 'chamilak@gmail.com', 'KN', 'cha', '12345678', null, null, null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('56', 'asasdsad', 's', 'abci@gmail.com', 'AT', 'sqwea', '123qweas', null, '0', null, null, null, '+43', '123123123', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('58', 'wawdada', 'd', 'abcj@gmail.com', 'BJ', 'sdadsad', 'qwedcvbb', null, null, null, null, null, '', '0', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('63', 'warnapura', 's', 'warnapura@gmail.com', 'FR', 'ws2', 'a406b5b5', null, '1', null, null, null, '+33', '125690123', null, null, null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('64', 'wimalk', 'd', 'wimalk@gmail.com', 'AU', 'wim8', 'e0f3f0d4', '0', '1', null, '1420010834', '1420010870', '+43', '12345678', 'caf92340', '1420022090', null, null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('66', 'swx', 'a', 'sw7x@gmail.com', 'PH', 'sw7x', '12312312', '0', '0', null, '1420010834', '1420010830', '+63', '345678091', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('79', 'aasd', 'a', 'susanthawarnapura345@gmail.com', 'LK', 'sdasd', '5f47cbff', null, '0', null, null, null, '+94', '712579230', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('80', 'asasd', 'd', 'susanthawarnapura12@gmail.com', 'LK', 'dadasd', '5f47cbff', null, null, null, null, null, '+94', '712579230', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('82', 'adDASDASD', 'DSdsdsds', 'sus@agmil.com', 'AU', 'sus7d8', null, null, '1', null, null, null, '+43', '121232321', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('83', 'samirak', 'alawathugo', 'sus@gmail.com', 'AU', 'sus933', null, null, '1', null, null, null, '+43', '121212121', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('84', 'DASDASDSAD', 'aSASADASDS', 'sus@gmail.com', 'AU', 'sus425', null, null, '1', null, null, null, '+43', '333333333', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('85', 'saman', 'dsadsadas', 'sus@gmail.com', 'AU', 'suscc2', null, null, '1', null, null, null, '+43', '444444444', '', null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('86', 'saman', 'weerakon', 'samanweerakon@gmail.com', 'AU', 'samanweera', null, null, '1', null, null, null, '+43', '127217127', '', null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('87', 'adsdsa', 'sasafadf', 'fadsaa@gmil.com', 'AU', 'fadsaa', null, null, '1', null, null, null, '+43', '121212123', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('88', 'asanka', 'wijesooriy', 'asankawijesooriy@gmail.com', 'LK', 'asankawije', null, null, '1', null, null, null, '+94', '999999999', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('89', 'sadasdasd', 'dadwdawdwd', 'awdadwxasawssww@gal.com', 'BY', 'awdadwxasawssww', null, null, '1', null, null, null, '+375', '444333555', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('90', 'susanthas', 'warnapura', 'susanthawarnapura1111@gmail.com', 'LK', 'susanthawarnapura', null, null, '1', null, null, null, '+94', '712579230', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('91', 'susanthasa', 'warnapura', 'susanthawarnapura222@gail.com', 'LK', 'susanthawarnapura05a', null, null, '1', null, null, null, '+94', '712579230', '', null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('92', 'thilan', 'daksina', 'thilandakshina@gmail.com', 'LK', 'thilandakshina', null, null, '1', null, null, null, '+94', '779403184', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('93', 'susanthas', 'warnapuras', 'susanthawarnapura8@gmail.com', 'AU', 'susanthawarnapura046', null, null, '1', null, null, null, '+61', '121212123', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('94', 'susanthas', 'warnapura', 'susanthawarnapura9@gmail.com', 'LK', 'susanthawarnapurae2f', null, null, '1', null, null, null, '+94', '712579230', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('95', 'aaaaaaaa', 'bbbbbbbbb', 'susanthawarnapura10@gmail.com', 'LK', 'susanthawarnapura760', null, null, '1', null, null, null, '+94', '121212123', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('96', 'abbbbbbbbbb', 'cddddddddddd', 'susanthawarnapura11@gmail.com', 'LK', 'susanthawarnapura05b', null, null, '1', null, null, null, '+94', '712579230', null, null, '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('97', 'xxxxxxxxx', 'yyyyyyyyy', 'susantha@gmail.com', 'LK', 'susanthawarnapura4a1', 'e21a0a85', null, '0', null, null, '1423192168', '+94', '712579230', 'c36db77b', '1423164077', '0', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('100', 'sus', 'war', 'susanthawarnapuraxxxxxxx@gmail.com', 'LK', 'susanthawarnapura1a1', 'd8790b09', null, '1', 'b627', '1424321010', '1424335410', '+94', '712579230', '0af31ad1', '1424250681', '0', '::1', null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('101', 'ssss', 'www', 'susanthawarnapura123@gmail.com', 'LK', 'susanthawarnapura123', '48f9d9cc', null, '1', null, '1423548037', '1423548145', '+94', '712579230', '', null, '', '220.247.247.221', null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('102', 'Anuradha', 'Rajanayake', 'anuradha.br@gmail.com', 'LK', 'anuradha.br', '1e7a2e73', null, '1', null, '1424130355', '1424130400', '+94', '712579230', null, null, '0', '::1', null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('103', 'anuradha', 'Rajanayake', 'ozisolutions@gmail.com', 'LK', 'ozisolutions', '20b9813e', null, '1', null, '1423647597', '1423647531', '+94', '777636487', null, null, '0', '220.247.247.221', null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('104', 'aaaaaaaaa', 'bbbbbbbbb', 'abcdefg@gmail.com', 'AO', 'abcdefg', null, null, '1', null, null, null, '+244', '123123123', '', null, 'amc2', null, '1111doctor=aWQ9MTIzc2RzU0RjU0UzM3NkWWFzZGZXSCZwYXJhbWV0ZXI9cXcyZHFmREtzZG40S3JzVDkmQThoeT1aVzFoYVd3OWMzVnpZVzUwYUdGM1lYSnVZWEIxY21GQVoyMWhhV3d1WTI5dCZTTjlwPXR2c0hEVzg5MEtibnRkZg==', null, null, null, null);
INSERT INTO `tbl_user` VALUES ('106', 'test', 'testing', 'testing@gmail.com', 'AU', 'testing', null, null, '1', null, null, null, '+61', '121212121', '', null, 'amc1', null, 'http://demo.ozisolutions.com/amcpdf/index.php?doctor=aWQ9MTIzc2RzU0RjU0UzM3NkWWFzZGZXSCZwYXJhbWV0ZXI9cXcyZHFmREtzZG40S3JzVDkmQThoeT1aVzFoYVd3OWMzVnpZVzUwYUdGM1lYSnVZWEIxY21GQVoyMWhhV3d1WTI5dCZTTjlwPXR2c0hEVzg5MEtibnRkZg==', null, null, null, null);
INSERT INTO `tbl_user` VALUES ('108', 'testingtwo', 'test', 'susanthawarnapuraq@gmail.com', 'LK', 'susanthawarnapura5bjc', null, null, '1', null, null, null, '+94', '712579230', null, null, null, null, 'http://demo.ozisolutions.com/amcpdf/index.php?doctor=aWQ9MTIzc2RzU0RjU0UzM3NkWWFzZGZXSCZwYXJhbWV0ZXI9cXcyZHFmREtzZG40S3JzVDkmQThoeT1aVzFoYVd3OWMzVnpZVzUwYUdGM1lYSnVZWEIxY21GQVoyMWhhV3d1WTI5dCZTTjlwPXR2c0hEVzg5MEtibnRkZg==', null, null, null, null);
INSERT INTO `tbl_user` VALUES ('109', 'testingsdvvv', 'sdasfsa', 'sdasdasdas@fdsf.com', 'AI', 'sdasdasdas', null, null, '1', null, null, null, '+1', '121212121', null, null, null, null, 'http://demo.ozisolutions.com/amcpdf/index.php?doctor=aWQ9MTIzc2RzU0RjU0UzM3NkWWFzZGZXSCZwYXJhbWV0ZXI9cXcyZHFmREtzZG40S3JzVDkmQThoeT1aVzFoYVd3OWMyUmhjMlJoYzJSaGMwQm1aSE5tTG1OdmJRPT0mU045cD10dnNIRFc4OTBLYm50ZGY=', null, null, null, null);
INSERT INTO `tbl_user` VALUES ('111', 'testingthree', 'asdasd', 'susanthawarnapura@gmail.com', 'LK', 'susanthawarnapura3zf3', 'fc072a6d', null, '1', null, null, null, '+94', '712579230', null, null, null, null, 'http://demo.ozisolutions.com/amcpdf/index.php?doctor=aWQ9MTIzc2RzU0RjU0UzM3NkWWFzZGZXSCZwYXJhbWV0ZXI9cXcyZHFmREtzZG40S3JzVDkmQThoeT1aVzFoYVd3OWMzVnpZVzUwYUdGM1lYSnVZWEIxY21GQVoyMWhhV3d1WTI5dCZTTjlwPXR2c0hEVzg5MEtibnRkZg==', '3cbc1aef', null, 'd94299a6', null);
INSERT INTO `tbl_user` VALUES ('113', 'amc1', '', '', '', 'amc1', null, null, '1', null, null, null, '', '', null, null, 'amc1', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('114', 'amc2', '', '', '', 'amc2', null, null, '1', null, null, null, '', '', null, null, 'amc2', null, null, null, null, null, null);
INSERT INTO `tbl_user` VALUES ('115', 'samanthau', 'perera', 'samanthauperera@gmail.com', 'AO', 'samanthauperera', 'f8e04b77', null, '1', null, '1424754155', '1424754167', '+94', '766755645', null, null, null, '::1', 'http://demo.ozisolutions.com/amcpdf/index.php?doctor=aWQ9MTIzc2RzU0RjU0UzM3NkWWFzZGZXSCZwYXJhbWV0ZXI9cXcyZHFmREtzZG40S3JzVDkmQThoeT1aVzFoYVd3OWMyRnRZVzUwYUdGMWNHVnlaWEpoUUdkdFlXbHNMbU52YlE9PSZTTjlwPXR2c0hEVzg5MEtibnRkZg==', null, null, null, null);

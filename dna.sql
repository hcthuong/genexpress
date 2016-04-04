/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : phuquoc

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-04-21 15:23:58
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Admin_ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `Admin_Login` varchar(100) NOT NULL,
  `Admin_Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `IsAdmin` tinyint(1) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Ip` varchar(15) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO admin VALUES ('1', 'admin', 'Higolas', 'e10adc3949ba59abbe56e057f20f883e', '1', 'thuongcam2002@yahoo.com', '', '0');
INSERT INTO admin VALUES ('7', 'tintuc', '123456', 'e10adc3949ba59abbe56e057f20f883e', '0', 'tintuc@anhtui.com', '', '0');

-- ----------------------------
-- Table structure for `bad_image`
-- ----------------------------
DROP TABLE IF EXISTS `bad_image`;
CREATE TABLE `bad_image` (
  `Image_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Image_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bad_image
-- ----------------------------

-- ----------------------------
-- Table structure for `block`
-- ----------------------------
DROP TABLE IF EXISTS `block`;
CREATE TABLE `block` (
  `Block_ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Template` varchar(50) NOT NULL,
  `Source` varchar(100) NOT NULL,
  `Style` varchar(20) NOT NULL,
  `Position` tinyint(1) NOT NULL,
  `St` tinyint(1) NOT NULL,
  `Per_Page` tinyint(1) NOT NULL,
  PRIMARY KEY (`Block_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of block
-- ----------------------------
INSERT INTO block VALUES ('4', 'Top Banner', 'default', 'block/Logo_Top.php', 'block_top.html', '3', '1', '0');
INSERT INTO block VALUES ('5', 'TÃŒM KIáº¾M', 'default', 'block/Search.php', 'block_search.html', '2', '1', '0');
INSERT INTO block VALUES ('6', 'Há»– TRá»¢ TRá»°C TUYáº¾N', 'default', 'block/Support_Yahoo.php', 'block_support.html', '2', '2', '0');
INSERT INTO block VALUES ('7', 'TIN Tá»¨C', 'default', 'block/Top_News.php', 'block_news.html', '2', '3', '0');
INSERT INTO block VALUES ('8', 'Quáº£ng cÃ¡o', 'default', 'block/Web_Link.php', 'block_ads.html', '2', '4', '0');

-- ----------------------------
-- Table structure for `block_list`
-- ----------------------------
DROP TABLE IF EXISTS `block_list`;
CREATE TABLE `block_list` (
  `List_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Block_ID` tinyint(1) NOT NULL,
  `Module_ID` tinyint(1) NOT NULL,
  PRIMARY KEY (`List_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of block_list
-- ----------------------------
INSERT INTO block_list VALUES ('20', '4', '5');
INSERT INTO block_list VALUES ('19', '4', '4');
INSERT INTO block_list VALUES ('18', '4', '3');
INSERT INTO block_list VALUES ('17', '4', '2');
INSERT INTO block_list VALUES ('16', '4', '0');
INSERT INTO block_list VALUES ('21', '5', '0');
INSERT INTO block_list VALUES ('22', '5', '2');
INSERT INTO block_list VALUES ('23', '5', '3');
INSERT INTO block_list VALUES ('24', '5', '4');
INSERT INTO block_list VALUES ('25', '5', '5');
INSERT INTO block_list VALUES ('26', '6', '0');
INSERT INTO block_list VALUES ('27', '6', '2');
INSERT INTO block_list VALUES ('28', '6', '3');
INSERT INTO block_list VALUES ('29', '6', '4');
INSERT INTO block_list VALUES ('30', '6', '5');
INSERT INTO block_list VALUES ('31', '7', '0');
INSERT INTO block_list VALUES ('32', '7', '2');
INSERT INTO block_list VALUES ('33', '7', '3');
INSERT INTO block_list VALUES ('34', '7', '4');
INSERT INTO block_list VALUES ('35', '7', '5');
INSERT INTO block_list VALUES ('36', '8', '0');
INSERT INTO block_list VALUES ('37', '8', '2');
INSERT INTO block_list VALUES ('38', '8', '3');
INSERT INTO block_list VALUES ('39', '8', '4');
INSERT INTO block_list VALUES ('40', '8', '5');

-- ----------------------------
-- Table structure for `diary_system`
-- ----------------------------
DROP TABLE IF EXISTS `diary_system`;
CREATE TABLE `diary_system` (
  `Diary_ID` mediumint(20) NOT NULL AUTO_INCREMENT,
  `Module_ID` tinyint(1) NOT NULL,
  `Admin_ID` tinyint(1) NOT NULL,
  `Action` varchar(100) NOT NULL,
  `Create_Time` int(10) NOT NULL,
  PRIMARY KEY (`Diary_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of diary_system
-- ----------------------------
INSERT INTO diary_system VALUES ('1', '1', '1', 'ThÃªm tin tá»©c.', '1324370654');
INSERT INTO diary_system VALUES ('2', '1', '1', 'ThÃªm tin tá»©c.', '1324370837');
INSERT INTO diary_system VALUES ('3', '1', '1', 'Cáº­p nháº­t ná»™i dung tin tá»©c.', '1324372098');
INSERT INTO diary_system VALUES ('4', '1', '1', 'ThÃªm tin tá»©c.', '1324372142');
INSERT INTO diary_system VALUES ('5', '1', '1', 'Cáº­p nháº­t tráº¡ng thÃ¡i tin tá»©c.', '1324372349');
INSERT INTO diary_system VALUES ('6', '1', '1', 'Cáº­p nháº­t tráº¡ng thÃ¡i tin tá»©c.', '1324372431');
INSERT INTO diary_system VALUES ('7', '1', '1', 'Cáº­p nháº­t tráº¡ng thÃ¡i tin tá»©c.', '1324372459');
INSERT INTO diary_system VALUES ('8', '1', '1', 'ThÃªm tin tá»©c.', '1324372863');
INSERT INTO diary_system VALUES ('9', '1', '1', 'XÃ³a tin tá»©c.', '1324372880');
INSERT INTO diary_system VALUES ('10', '0', '1', 'XÃ³a quáº£n trá»‹ viÃªn', '1324436736');
INSERT INTO diary_system VALUES ('11', '0', '1', 'XÃ³a quáº£n trá»‹ viÃªn', '1324436736');
INSERT INTO diary_system VALUES ('12', '0', '1', 'XÃ³a quáº£n trá»‹ viÃªn', '1324436748');
INSERT INTO diary_system VALUES ('13', '0', '1', 'XÃ³a quáº£n trá»‹ viÃªn', '1324436748');
INSERT INTO diary_system VALUES ('14', '0', '1', 'Cáº­p nháº­t thÃ´ng tin quáº£n trá»‹ viÃªn', '1324436776');
INSERT INTO diary_system VALUES ('15', '4', '1', 'ThÃªm quáº£ng cÃ¡o.', '1324438576');
INSERT INTO diary_system VALUES ('16', '4', '1', 'ThÃªm quáº£ng cÃ¡o.', '1324439691');
INSERT INTO diary_system VALUES ('57', '3', '1', 'XÃ³a tin tá»©c.', '1345706876');
INSERT INTO diary_system VALUES ('58', '0', '1', 'Cáº­p nháº­t thÃ´ng tin quáº£n trá»‹ viÃªn', '1347508604');
INSERT INTO diary_system VALUES ('59', '3', '1', 'Cáº­p nháº­t ná»™i dung tin tá»©c.', '1348733322');
INSERT INTO diary_system VALUES ('60', '3', '1', 'Cáº­p nháº­t ná»™i dung tin tá»©c.', '1348733604');
INSERT INTO diary_system VALUES ('61', '3', '1', 'Cáº­p nháº­t ná»™i dung tin tá»©c.', '1348733645');
INSERT INTO diary_system VALUES ('62', '3', '1', 'ThÃªm tin tá»©c.', '1396605724');
INSERT INTO diary_system VALUES ('63', '3', '1', 'Cáº­p nháº­t ná»™i dung tin tá»©c.', '1396606053');
INSERT INTO diary_system VALUES ('64', '3', '1', 'ThÃªm tin tá»©c.', '1397234890');
INSERT INTO diary_system VALUES ('65', '3', '1', 'XÃ³a tin tá»©c.', '1397234913');
INSERT INTO diary_system VALUES ('66', '3', '1', 'XÃ³a tin tá»©c.', '1397234913');
INSERT INTO diary_system VALUES ('67', '3', '1', 'Cáº­p nháº­t ná»™i dung tin tá»©c.', '1397234973');

-- ----------------------------
-- Table structure for `information`
-- ----------------------------
DROP TABLE IF EXISTS `information`;
CREATE TABLE `information` (
  `Information_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Information_CatID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Title_EN` varchar(255) DEFAULT NULL,
  `Summary` text,
  `Summary_EN` text,
  `Description` text,
  `Description_EN` text,
  `Image` varchar(255) DEFAULT NULL,
  `Source` varchar(255) DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Updated` datetime DEFAULT NULL,
  PRIMARY KEY (`Information_ID`),
  KEY `information_cat` (`Information_CatID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of information
-- ----------------------------
INSERT INTO information VALUES ('7', '4', 'tiÃªu Ä‘á» 1', 'title 1', 'mo ta', 'summary', '<p>\r\n	chi tiáº¿t</p>\r\n', '<p>\r\n	description</p>\r\n', 'xvSfcbb4fd8508fd7d2809fd976e12667b3.jpg', 'nguá»“n', '2014-04-08 11:47:28', '2014-04-18 12:17:09');
INSERT INTO information VALUES ('8', '4', 'Real tÃ¡i ngá»™ Bayern á»Ÿ bÃ¡n káº¿t Champions League', 'Real tÃ¡i ngá»™ Bayern á»Ÿ bÃ¡n káº¿t Champions League', 'Káº¿t quáº£ bá»‘c thÄƒm cá»§a UEFA chiá»u 11/4 giÃºp Real cÃ³ cÆ¡ há»™i phá»¥c háº­n Bayern. Chelsea tranh vÃ© vÃ o chung káº¿t vá»›i \"ngá»±a Ã´\" Atletico Madrid.', 'Káº¿t quáº£ bá»‘c thÄƒm cá»§a UEFA chiá»u 11/4 giÃºp Real cÃ³ cÆ¡ há»™i phá»¥c háº­n Bayern. Chelsea tranh vÃ© vÃ o chung káº¿t vá»›i \"ngá»±a Ã´\" Atletico Madrid.', '<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	LÆ°á»£t Ä‘i c&aacute;c tráº­n b&aacute;n káº¿t diá»…n ra v&agrave;o c&aacute;c ng&agrave;y 22 v&agrave; 23/4, lÆ°á»£t vá» sau Ä‘&oacute; má»™t tuáº§n v&agrave;o c&aacute;c ng&agrave;y 29 v&agrave; 30/4. Tráº­n chung káº¿t diá»…n ra tr&ecirc;n s&acirc;n Da Luz, Lisbon, Bá»“ Ä&agrave;o Nha ng&agrave;y 24/5.</p>\r\n<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\" class=\"tbl_insert\" style=\"margin: 0px auto 10px; padding: 0px; max-width: 100%; width: 478px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	<tbody style=\"margin: 0px; padding: 0px;\">\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td colspan=\"3\" style=\"margin: 0px; padding: 0px; border: none; text-align: center; background-color: rgb(51, 102, 102);\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px;\">\r\n					<span style=\"margin: 0px; padding: 0px; color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">B&aacute;n káº¿t Champions League 2013-2014</strong></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; border: none;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px; text-align: center;\">\r\n					B&aacute;n káº¿t 1</p>\r\n			</td>\r\n			<td colspan=\"2\" rowspan=\"1\" style=\"margin: 0px; padding: 0px; border: none;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px; text-align: center;\">\r\n					<strong style=\"margin: 0px; padding: 0px;\">Real Madrid</strong>&nbsp; -&nbsp;<strong style=\"margin: 0px; padding: 0px;\">Bayern Munich</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; border: none;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px; text-align: center;\">\r\n					B&aacute;n káº¿t 2</p>\r\n			</td>\r\n			<td colspan=\"2\" rowspan=\"1\" style=\"margin: 0px; padding: 0px; border: none;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px; text-align: center;\">\r\n					<strong style=\"margin: 0px; padding: 0px;\">Atletico Madrid</strong>&nbsp;-&nbsp;<strong style=\"margin: 0px; padding: 0px;\">Chelsea</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td colspan=\"3\" style=\"margin: 0px; padding: 0px; border: none; text-align: center;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px;\">\r\n					<em style=\"margin: 0px; padding: 0px;\">* Äá»™i Ä‘á»©ng trÆ°á»›c Ä‘&aacute; tráº­n lÆ°á»£t Ä‘i tr&ecirc;n s&acirc;n nh&agrave;.</em></p>\r\n			</td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td colspan=\"3\" style=\"margin: 0px; padding: 0px; border: none; text-align: center;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px;\">\r\n					<a href=\"http://thethao.vnexpress.net/tin-tuc/champions-league/real-tai-ngo-bayern-o-ban-ket-champions-league-2976443-p2.html\" style=\"margin: 0px; padding: 0px; color: rgb(0, 79, 139); text-decoration: none; outline: none;\" title=\"Káº¿t quáº£ bá»‘c thÄƒm bÃ¡n káº¿t Europa League\">Káº¿t quáº£ bá»‘c thÄƒm b&aacute;n káº¿t Europa League</a></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	<strong style=\"margin: 0px; padding: 0px;\">Duy&ecirc;n ná»£ giá»¯a Real Madrid vá»›i c&aacute;c Ä‘á»‘i thá»§ Äá»©c</strong></p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	L&aacute; thÄƒm Ä‘Æ°a há» v&agrave;o chung cáº·p b&aacute;n káº¿t vá»›i Bayern Ä‘á»“ng nghÄ©a vá»›i viá»‡c Real Madrid Ä‘á»©ng trÆ°á»›c cÆ¡ há»™i rá»­a th&ugrave; vá»›i b&oacute;ng Ä‘&aacute; Äá»©c á»Ÿ s&acirc;n chÆ¡i sá»‘ má»™t ch&acirc;u &Acirc;u cáº¥p CLB&nbsp;<span style=\"margin: 0px; padding: 0px;\">hoáº·c ná»—i Ä‘au sáº½ th&ecirc;m d&agrave;i.</span></p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Ä&acirc;y l&agrave; m&ugrave;a thá»© ba li&ecirc;n tiáº¿p Real tranh suáº¥t v&agrave;o chung káº¿t Champions League vá»›i má»™t Ä‘áº¡i diá»‡n b&oacute;ng Ä‘&aacute; Äá»©c. Hai m&ugrave;a trÆ°á»›c Ä‘&oacute; Ä‘á»™i b&oacute;ng T&acirc;y Ban Nha, khi Ä‘&oacute; c&ograve;n dÆ°á»›i trÆ°á»›ng HLV Jose Mourinho, Ä‘á»u bá»‹ loáº¡i.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	á»ž m&ugrave;a 2011-2012, Bayern khiáº¿n Real rá»i cuá»™c chÆ¡i trong nÆ°á»›c máº¯t tiáº¿c nuá»‘i. Cristiano Ronaldo v&agrave; Ä‘á»“ng Ä‘á»™i thua tráº­n lÆ°á»£t Ä‘i vá»›i tá»· sá»‘ 1-2 tr&ecirc;n Ä‘áº¥t Äá»©c, rá»“i tháº¯ng láº¡i 2-1 táº¡i Bernabeu Ä‘á»ƒ c&acirc;n báº±ng tá»•ng tá»· sá»‘ 3-3. NhÆ°ng Ä‘áº¿n loáº¡t s&uacute;t lu&acirc;n lÆ°u náº·ng t&iacute;nh may rá»§i, Real chá»‰ th&agrave;nh c&ocirc;ng trong láº§n thá»±c hiá»‡n cá»§a Xabi Alonso á»Ÿ lÆ°á»£t s&uacute;t thá»© ba v&agrave; thua Bayern 1-3 v&igrave; c&aacute;c c&uacute; s&uacute;t há»ng cá»§a Ronaldo, Kaka rá»“i Sergio Ramos.</p>\r\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"margin: 0px auto 10px; padding: 0px; max-width: 100%; width: 480px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	<tbody style=\"margin: 0px; padding: 0px;\">\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; line-height: 0;\">\r\n				<img alt=\"ronaldo13-8015-1397218648.jpg\" src=\"http://m.f1.img.vnecdn.net/2014/04/11/ronaldo13-8015-1397218648.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 0px; line-height: 0; max-width: 100%; width: 480px;\" /></td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; line-height: 0;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 10px; line-height: normal; font-size: 12px; background-color: rgb(245, 245, 245);\">\r\n					Ronaldo tháº¥t vá»ng sau khi Ä‘&aacute; há»ng quáº£ s&uacute;t lu&acirc;n lÆ°u Ä‘áº§u ti&ecirc;n trong tráº­n b&aacute;n káº¿t lÆ°á»£t vá» m&agrave; Real bá»‹ Bayern loáº¡i nÄƒm 2012.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Má»™t nÄƒm sau Ä‘&oacute;, Real láº¡i gáº·p má»™t Ä‘áº¡i diá»‡n Äá»©c kh&aacute;c l&agrave; Borussia Dortmund á»Ÿ b&aacute;n káº¿t v&agrave; láº§n n&agrave;y rá»i cuá»™c chÆ¡i má»™t c&aacute;ch t&acirc;m phá»¥c kháº©u phá»¥c. Tháº§y tr&ograve; Mourinho khi Ä‘&oacute; tháº£m báº¡i 1-4 trong tráº­n lÆ°á»£t Ä‘i m&agrave; h&agrave;ng thá»§ máº¯c qu&aacute; nhiá»u sai s&oacute;t v&agrave; bá»‹ trá»«ng pháº¡t Ä‘&iacute;ch Ä‘&aacute;ng vá»›i bá»‘n b&agrave;n thua Ä‘á»u tá»« c&aacute;c pha dá»©t Ä‘iá»ƒm cá»§a Robert Lewandowski. Tráº­n tháº¯ng 2-0 á»Ÿ lÆ°á»£t vá» chá»‰ Ä‘á»§ Ä‘á»ƒ Real vá»›t v&aacute;t láº¡i ch&uacute;t danh dá»±.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Cháº¡m tr&aacute;n Bayern á»Ÿ b&aacute;n káº¿t m&ugrave;a n&agrave;y,&nbsp;<strong style=\"margin: 0px; padding: 0px;\">Real Ä‘á»‘i máº·t vá»›i nguy cÆ¡ ba nÄƒm liá»n bá»‹ c&aacute;c Ä‘á»‘i thá»§ Äá»©c Ä‘&aacute; bay khá»i cuá»™c chÆ¡i ngay trÆ°á»›c thá»m tráº­n tranh ng&ocirc;i v&ocirc; Ä‘á»‹ch</strong>. NhÆ°ng so vá»›i hai m&ugrave;a trÆ°á»›c, Real hiá»‡n táº¡i sáº½ c&oacute; hai yáº¿u tá»‘ thuáº­n lá»£i.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Äáº§u ti&ecirc;n l&agrave; yáº¿u tá»‘ t&acirc;m l&yacute;, bá»Ÿi cáº£ hai láº§n bá»‹ loáº¡i á»Ÿ c&aacute;c m&ugrave;a káº¿ trÆ°á»›c, Real Ä‘á»u Ä‘&aacute; tráº­n lÆ°á»£t Ä‘i tr&ecirc;n s&acirc;n cá»§a Bayern v&agrave; Dortmund, c&ograve;n láº§n n&agrave;y há» sáº½ Ä‘&aacute; tráº­n cáº§u Ä‘&oacute; táº¡i th&aacute;nh Ä‘á»‹a Bernabeu. Viá»‡c Bayern pháº£i chá»‹u &aacute;p lá»±c báº£o vá»‡ ng&ocirc;i b&aacute;u - Ä‘iá»u chÆ°a nh&agrave; v&ocirc; Ä‘á»‹ch n&agrave;o l&agrave;m Ä‘Æ°á»£c trong ká»· nguy&ecirc;n Champions League (tá»« 1992) - cÅ©ng c&oacute; thá»ƒ Ä‘Æ°á»£c xem nhÆ° má»™t thuáº­n lá»£i, d&ugrave; ráº¥t nhá», Ä‘á»ƒ Real c&oacute; thá»ƒ nu&ocirc;i má»™ng phá»¥c háº­n.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Náº¿u Ä‘&aacute;nh báº¡i Bayern Ä‘á»ƒ v&agrave;o chung káº¿t,&nbsp;<strong style=\"margin: 0px; padding: 0px;\">Real sáº½ láº­p hattrick chiáº¿n tháº¯ng trÆ°á»›c ba Ä‘á»‘i thá»§ Äá»©c á»Ÿ c&aacute;c giai Ä‘oáº¡n Ä‘áº¥u knock-out Champions League m&ugrave;a n&agrave;y</strong>. Táº¡i v&ograve;ng 16 Ä‘á»™i, tháº§y tr&ograve; HLV Carlo Ancelotti tháº¯ng Schalke 04 cáº£ hai lÆ°á»£t (6-1 tr&ecirc;n s&acirc;n kh&aacute;ch, 3-1 á»Ÿ s&acirc;n nh&agrave;) Ä‘á»ƒ Ä‘i tiáº¿p vá»›i tá»•ng tá»· sá»‘ 9-2. V&agrave;o tá»© káº¿t, Real tráº£ s&ograve;ng pháº³ng ná»£ náº§n khi loáº¡i Dortmund vá»›i tá»•ng tá»· sá»‘ 3-2 theo ká»‹ch báº£n gáº§n giá»‘ng há»‡t m&ugrave;a trÆ°á»›c - tháº¯ng Ä‘áº­m 3-0 tr&ecirc;n s&acirc;n nh&agrave; á»Ÿ lÆ°á»£t Ä‘i rá»“i thua 0-2 tr&ecirc;n s&acirc;n Ä‘á»‘i thá»§ Äá»©c.</p>\r\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"margin: 0px auto 10px; padding: 0px; max-width: 100%; width: 480px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	<tbody style=\"margin: 0px; padding: 0px;\">\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; line-height: 0;\">\r\n				<img alt=\"Casillas-2-3735-1397218648.jpg\" src=\"http://m.f1.img.vnecdn.net/2014/04/11/Casillas-2-3735-1397218648.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 0px; line-height: 0; max-width: 100%; width: 480px;\" /></td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; line-height: 0;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 10px; line-height: normal; font-size: 12px; background-color: rgb(245, 245, 245);\">\r\n					Real Ä‘&atilde; rá»­a háº­n th&agrave;nh c&ocirc;ng trÆ°á»›c Dortmund á»Ÿ tá»© káº¿t m&ugrave;a n&agrave;y. B&aacute;n káº¿t sáº½ l&agrave; cÆ¡ há»™i Ä‘á»ƒ Casillas v&agrave; Ä‘á»“ng Ä‘á»™i tráº£ má»™t m&oacute;n ná»£ ná»¯a trÆ°á»›c Bayern.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	<strong style=\"margin: 0px; padding: 0px;\">Atletico Madrid - Chelsea: &#39;Ma cÅ©&#39; chÆ°a cháº¯c báº¯t náº¡t Ä‘Æ°á»£c &#39;ma má»›i&#39;</strong></p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	á»ž cáº·p b&aacute;n káº¿t c&ograve;n láº¡i, thoáº¡t nh&igrave;n, Atletico Madrid sáº½ kh&ocirc;ng c&oacute; cá»­a tranh v&eacute; Ä‘i tiáº¿p vá»›i Chelsea. Cáº£m quan áº¥y xuáº¥t ph&aacute;t tá»« thá»±c táº¿ Ä‘áº¡i diá»‡n T&acirc;y Ban Nha n&agrave;y ho&agrave;n tho&agrave;n thua k&eacute;m &ocirc;ng lá»›n Ngoáº¡i háº¡ng Anh vá» kinh nghiá»‡m v&agrave; danh tiáº¿ng.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Atletico Madrid má»›i láº§n Ä‘áº§u v&agrave;o tá»›i v&ograve;ng b&aacute;n káº¿t Champions League ká»ƒ tá»« giáº£i mang t&ecirc;n n&agrave;y nÄƒm 1992. C&ograve;n náº¿u t&iacute;nh tá»« thá»i giáº£i váº«n Ä‘Æ°á»£c gá»i theo t&ecirc;n cÅ© - Cup C1, Ä‘&acirc;y l&agrave; láº§n Ä‘áº§u ti&ecirc;n sau 40 nÄƒm Atletico Madrid lá»t v&agrave;o v&ograve;ng bá»‘n Ä‘á»™i cuá»‘i c&ugrave;ng ká»ƒ tá»« láº§n gáº§n nháº¥t á»Ÿ m&ugrave;a 1973-1974.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Náº¿u xem Atletico Madrid l&agrave; anh l&iacute;nh má»›i t&ograve; te, th&igrave; Chelsea giá»‘ng nhÆ° má»™t cá»±u binh d&agrave;y dáº¡n kinh nghiá»‡m, vá»›i láº§n thá»© s&aacute;u v&agrave;o b&aacute;n káº¿t Champions League ká»ƒ tá»« m&ugrave;a 2004-2005, trong Ä‘&oacute; c&oacute; hai láº§n chiáº¿n tháº¯ng Ä‘á»ƒ v&agrave;o chung káº¿t v&agrave; má»™t láº§n l&ecirc;n ng&ocirc;i v&ocirc; Ä‘á»‹ch á»Ÿ m&ugrave;a 2011-2012.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Tr&ecirc;n bÄƒng gháº¿ huáº¥n luyá»‡n, t&agrave;i nÄƒng cá»§a Diego Simeone Ä‘&atilde; Ä‘Æ°á»£c thá»«a nháº­n rá»™ng r&atilde;i qua nhá»¯ng th&agrave;nh tá»±u lá»›n lao c&ugrave;ng Atletico Madrid trong gáº§n ba nÄƒm qua - v&ocirc; Ä‘á»‹ch Europa League, Ä‘oáº¡t Si&ecirc;u Cup ch&acirc;u &Acirc;u, dáº«n Ä‘áº§u La Liga m&ugrave;a n&agrave;y. NhÆ°ng chiáº¿n lÆ°á»£c gia 43 tuá»•i ngÆ°á»i Argentina c&oacute; láº½ váº«n chÆ°a thá»ƒ s&aacute;nh vá»›i Ä‘á»“ng nhiá»‡m b&ecirc;n ph&iacute;a Chelsea, Jose Mourinho vá» tiáº¿ng tÄƒm v&agrave; kinh nghiá»‡m á»Ÿ Champions League.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Ä&acirc;y l&agrave; láº§n thá»© t&aacute;m &quot;NgÆ°á»i Äáº·c Biá»‡t&quot; Ä‘Æ°a c&aacute;c Ä‘á»™i &ocirc;ng dáº«n dáº¯t v&agrave;o b&aacute;n káº¿t giáº£i Ä‘áº¥u sá»‘ má»™t ch&acirc;u &Acirc;u. Trong báº£y láº§n trÆ°á»›c Ä‘&oacute;, Mourinho c&oacute; hai láº§n chiáº¿n tháº¯ng rá»“i Ä‘i tiáº¿p Ä‘á»ƒ chinh phá»¥c Champions League c&aacute;c nÄƒm 2004 (c&ugrave;ng Porto), 2010 (Inter). HLV cá»§a Chelsea cÅ©ng tá»«ng v&ocirc; Ä‘á»‹ch quá»‘c gia á»Ÿ má»i ná»n b&oacute;ng Ä‘&aacute; &ocirc;ng tá»«ng l&agrave;m viá»‡c.</p>\r\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"margin: 0px auto 10px; padding: 0px; max-width: 100%; width: 480px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	<tbody style=\"margin: 0px; padding: 0px;\">\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; line-height: 0;\">\r\n				<img alt=\"Simeone-5135-1397218648.jpg\" src=\"http://m.f1.img.vnecdn.net/2014/04/11/Simeone-5135-1397218648.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 0px; line-height: 0; max-width: 100%; width: 480px;\" /></td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; line-height: 0;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 10px; line-height: normal; font-size: 12px; background-color: rgb(245, 245, 245);\">\r\n					Tá»«ng tháº¯ng Mourinho á»Ÿ chung káº¿t Cup Nh&agrave; Vua m&ugrave;a trÆ°á»›c, Simeone láº¡i c&oacute; cÆ¡ há»™i tá»‘t Ä‘á»ƒ chá»©ng tá» &ocirc;ng cÅ©ng t&agrave;i nÄƒng kh&ocirc;ng k&eacute;m cáº¡nh &quot;NgÆ°á»i Äáº·c Biá»‡t&quot;.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Mourinho cÅ©ng kh&ocirc;ng há» láº¡ Simeone v&igrave; tá»«ng ch&iacute;n láº§n cháº¡m tr&aacute;n thá»i &ocirc;ng c&ograve;n dáº«n dáº¯t Real Madrid. &quot;NgÆ°á»i Äáº·c Biá»‡t&quot; thá»i áº¥y tháº¯ng Ä‘áº¿n t&aacute;m tráº­n v&agrave; chá»‰ thua Simeone má»™t láº§n duy nháº¥t trong tráº­n chung káº¿t Cup Nh&agrave; Vua T&acirc;y Ban Nha m&ugrave;a trÆ°á»›c (Real thua Atletico 1-2).</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	NhÆ°ng viá»‡c há» quáº­t ng&atilde; ngÆ°á»i khá»•ng lá»“ Ä‘á»“ng hÆ°Æ¡ng Barca vá»›i tá»•ng tá»· sá»‘ 2-1 á»Ÿ tá»© káº¿t cho tháº¥y&nbsp;<strong style=\"margin: 0px; padding: 0px;\">Atletico Madrid l&agrave; Ä‘á»‘i thá»§ kh&ocirc;ng thá»ƒ xem thÆ°á»ng</strong>. Báº£n th&acirc;n Chelsea cÅ©ng tráº§y vi tr&oacute;c váº£y má»›i c&oacute; thá»ƒ gi&agrave;nh quyá»n v&agrave;o b&aacute;n káº¿t nhá» b&agrave;n tháº¯ng muá»™n m&agrave;ng á»Ÿ ph&uacute;t 87 tráº­n lÆ°á»£t vá» cá»§a Andre Schurrle, Ä‘á»ƒ qu&acirc;n b&igrave;nh tá»· sá»‘ 3-3 qua hai lÆ°á»£t v&agrave; loáº¡i PSG theo luáº­t b&agrave;n tháº¯ng s&acirc;n kh&aacute;ch.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Tráº­n b&aacute;n káº¿t giá»¯a Atletico Madrid vá»›i Chelsea c&ograve;n th&uacute; vá»‹ á»Ÿ chi tiáº¿t li&ecirc;n quan Ä‘áº¿n Thibault Courtois - thá»§ m&ocirc;n m&agrave; Ä‘á»™i b&oacute;ng Anh sá»Ÿ há»¯u nhÆ°ng Ä‘ang báº¯t ráº¥t hay trong m&agrave;u &aacute;o cho CLB T&acirc;y Ban Nha theo há»£p Ä‘á»“ng mÆ°á»£n cáº§u thá»§. Má»™t Ä‘iá»u khoáº£n trong há»£p Ä‘á»“ng Ä‘&oacute; quy Ä‘á»‹nh Courtois kh&ocirc;ng Ä‘Æ°á»£c ph&eacute;p thi Ä‘áº¥u náº¿u hai Ä‘á»™i cháº¡m tr&aacute;n á»Ÿ Cup ch&acirc;u &Acirc;u v&agrave; náº¿u muá»‘n l&aacute;ch Ä‘iá»u khoáº£n áº¥y, Atletico Madrid sáº½ pháº£i tráº£ khoáº£n ph&iacute; 6 triá»‡u euro.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	UEFA nhiá»u kháº£ nÄƒng sáº½ pháº£i v&agrave;o cuá»™c Ä‘á»ƒ ph&acirc;n xá»­ vá»¥ n&agrave;y, v&igrave; Atletico Madrid kh&ocirc;ng muá»‘n máº¥t tiá»n nhÆ°ng cÅ©ng cháº³ng há» muá»‘n gáº¡t thá»§ m&ocirc;n g&oacute;p c&ocirc;ng lá»›n Ä‘Æ°a há» v&agrave;o b&aacute;n káº¿t ra ngo&agrave;i danh s&aacute;ch Ä‘Äƒng k&yacute; thi Ä‘áº¥u.</p>\r\n', '<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	LÆ°á»£t Ä‘i c&aacute;c tráº­n b&aacute;n káº¿t diá»…n ra v&agrave;o c&aacute;c ng&agrave;y 22 v&agrave; 23/4, lÆ°á»£t vá» sau Ä‘&oacute; má»™t tuáº§n v&agrave;o c&aacute;c ng&agrave;y 29 v&agrave; 30/4. Tráº­n chung káº¿t diá»…n ra tr&ecirc;n s&acirc;n Da Luz, Lisbon, Bá»“ Ä&agrave;o Nha ng&agrave;y 24/5.</p>\r\n<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\" class=\"tbl_insert\" style=\"margin: 0px auto 10px; padding: 0px; max-width: 100%; width: 478px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	<tbody style=\"margin: 0px; padding: 0px;\">\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td colspan=\"3\" style=\"margin: 0px; padding: 0px; border: none; text-align: center; background-color: rgb(51, 102, 102);\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px;\">\r\n					<span style=\"margin: 0px; padding: 0px; color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">B&aacute;n káº¿t Champions League 2013-2014</strong></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; border: none;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px; text-align: center;\">\r\n					B&aacute;n káº¿t 1</p>\r\n			</td>\r\n			<td colspan=\"2\" rowspan=\"1\" style=\"margin: 0px; padding: 0px; border: none;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px; text-align: center;\">\r\n					<strong style=\"margin: 0px; padding: 0px;\">Real Madrid</strong>&nbsp; -&nbsp;<strong style=\"margin: 0px; padding: 0px;\">Bayern Munich</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; border: none;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px; text-align: center;\">\r\n					B&aacute;n káº¿t 2</p>\r\n			</td>\r\n			<td colspan=\"2\" rowspan=\"1\" style=\"margin: 0px; padding: 0px; border: none;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px; text-align: center;\">\r\n					<strong style=\"margin: 0px; padding: 0px;\">Atletico Madrid</strong>&nbsp;-&nbsp;<strong style=\"margin: 0px; padding: 0px;\">Chelsea</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td colspan=\"3\" style=\"margin: 0px; padding: 0px; border: none; text-align: center;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px;\">\r\n					<em style=\"margin: 0px; padding: 0px;\">* Äá»™i Ä‘á»©ng trÆ°á»›c Ä‘&aacute; tráº­n lÆ°á»£t Ä‘i tr&ecirc;n s&acirc;n nh&agrave;.</em></p>\r\n			</td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td colspan=\"3\" style=\"margin: 0px; padding: 0px; border: none; text-align: center;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 5px; line-height: 18px;\">\r\n					<a href=\"http://thethao.vnexpress.net/tin-tuc/champions-league/real-tai-ngo-bayern-o-ban-ket-champions-league-2976443-p2.html\" style=\"margin: 0px; padding: 0px; color: rgb(0, 79, 139); text-decoration: none; outline: none;\" title=\"Káº¿t quáº£ bá»‘c thÄƒm bÃ¡n káº¿t Europa League\">Káº¿t quáº£ bá»‘c thÄƒm b&aacute;n káº¿t Europa League</a></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	<strong style=\"margin: 0px; padding: 0px;\">Duy&ecirc;n ná»£ giá»¯a Real Madrid vá»›i c&aacute;c Ä‘á»‘i thá»§ Äá»©c</strong></p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	L&aacute; thÄƒm Ä‘Æ°a há» v&agrave;o chung cáº·p b&aacute;n káº¿t vá»›i Bayern Ä‘á»“ng nghÄ©a vá»›i viá»‡c Real Madrid Ä‘á»©ng trÆ°á»›c cÆ¡ há»™i rá»­a th&ugrave; vá»›i b&oacute;ng Ä‘&aacute; Äá»©c á»Ÿ s&acirc;n chÆ¡i sá»‘ má»™t ch&acirc;u &Acirc;u cáº¥p CLB&nbsp;<span style=\"margin: 0px; padding: 0px;\">hoáº·c ná»—i Ä‘au sáº½ th&ecirc;m d&agrave;i.</span></p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Ä&acirc;y l&agrave; m&ugrave;a thá»© ba li&ecirc;n tiáº¿p Real tranh suáº¥t v&agrave;o chung káº¿t Champions League vá»›i má»™t Ä‘áº¡i diá»‡n b&oacute;ng Ä‘&aacute; Äá»©c. Hai m&ugrave;a trÆ°á»›c Ä‘&oacute; Ä‘á»™i b&oacute;ng T&acirc;y Ban Nha, khi Ä‘&oacute; c&ograve;n dÆ°á»›i trÆ°á»›ng HLV Jose Mourinho, Ä‘á»u bá»‹ loáº¡i.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	á»ž m&ugrave;a 2011-2012, Bayern khiáº¿n Real rá»i cuá»™c chÆ¡i trong nÆ°á»›c máº¯t tiáº¿c nuá»‘i. Cristiano Ronaldo v&agrave; Ä‘á»“ng Ä‘á»™i thua tráº­n lÆ°á»£t Ä‘i vá»›i tá»· sá»‘ 1-2 tr&ecirc;n Ä‘áº¥t Äá»©c, rá»“i tháº¯ng láº¡i 2-1 táº¡i Bernabeu Ä‘á»ƒ c&acirc;n báº±ng tá»•ng tá»· sá»‘ 3-3. NhÆ°ng Ä‘áº¿n loáº¡t s&uacute;t lu&acirc;n lÆ°u náº·ng t&iacute;nh may rá»§i, Real chá»‰ th&agrave;nh c&ocirc;ng trong láº§n thá»±c hiá»‡n cá»§a Xabi Alonso á»Ÿ lÆ°á»£t s&uacute;t thá»© ba v&agrave; thua Bayern 1-3 v&igrave; c&aacute;c c&uacute; s&uacute;t há»ng cá»§a Ronaldo, Kaka rá»“i Sergio Ramos.</p>\r\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"margin: 0px auto 10px; padding: 0px; max-width: 100%; width: 480px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	<tbody style=\"margin: 0px; padding: 0px;\">\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; line-height: 0;\">\r\n				<img alt=\"ronaldo13-8015-1397218648.jpg\" src=\"http://m.f1.img.vnecdn.net/2014/04/11/ronaldo13-8015-1397218648.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 0px; line-height: 0; max-width: 100%; width: 480px;\" /></td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; line-height: 0;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 10px; line-height: normal; font-size: 12px; background-color: rgb(245, 245, 245);\">\r\n					Ronaldo tháº¥t vá»ng sau khi Ä‘&aacute; há»ng quáº£ s&uacute;t lu&acirc;n lÆ°u Ä‘áº§u ti&ecirc;n trong tráº­n b&aacute;n káº¿t lÆ°á»£t vá» m&agrave; Real bá»‹ Bayern loáº¡i nÄƒm 2012.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Má»™t nÄƒm sau Ä‘&oacute;, Real láº¡i gáº·p má»™t Ä‘áº¡i diá»‡n Äá»©c kh&aacute;c l&agrave; Borussia Dortmund á»Ÿ b&aacute;n káº¿t v&agrave; láº§n n&agrave;y rá»i cuá»™c chÆ¡i má»™t c&aacute;ch t&acirc;m phá»¥c kháº©u phá»¥c. Tháº§y tr&ograve; Mourinho khi Ä‘&oacute; tháº£m báº¡i 1-4 trong tráº­n lÆ°á»£t Ä‘i m&agrave; h&agrave;ng thá»§ máº¯c qu&aacute; nhiá»u sai s&oacute;t v&agrave; bá»‹ trá»«ng pháº¡t Ä‘&iacute;ch Ä‘&aacute;ng vá»›i bá»‘n b&agrave;n thua Ä‘á»u tá»« c&aacute;c pha dá»©t Ä‘iá»ƒm cá»§a Robert Lewandowski. Tráº­n tháº¯ng 2-0 á»Ÿ lÆ°á»£t vá» chá»‰ Ä‘á»§ Ä‘á»ƒ Real vá»›t v&aacute;t láº¡i ch&uacute;t danh dá»±.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Cháº¡m tr&aacute;n Bayern á»Ÿ b&aacute;n káº¿t m&ugrave;a n&agrave;y,&nbsp;<strong style=\"margin: 0px; padding: 0px;\">Real Ä‘á»‘i máº·t vá»›i nguy cÆ¡ ba nÄƒm liá»n bá»‹ c&aacute;c Ä‘á»‘i thá»§ Äá»©c Ä‘&aacute; bay khá»i cuá»™c chÆ¡i ngay trÆ°á»›c thá»m tráº­n tranh ng&ocirc;i v&ocirc; Ä‘á»‹ch</strong>. NhÆ°ng so vá»›i hai m&ugrave;a trÆ°á»›c, Real hiá»‡n táº¡i sáº½ c&oacute; hai yáº¿u tá»‘ thuáº­n lá»£i.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Äáº§u ti&ecirc;n l&agrave; yáº¿u tá»‘ t&acirc;m l&yacute;, bá»Ÿi cáº£ hai láº§n bá»‹ loáº¡i á»Ÿ c&aacute;c m&ugrave;a káº¿ trÆ°á»›c, Real Ä‘á»u Ä‘&aacute; tráº­n lÆ°á»£t Ä‘i tr&ecirc;n s&acirc;n cá»§a Bayern v&agrave; Dortmund, c&ograve;n láº§n n&agrave;y há» sáº½ Ä‘&aacute; tráº­n cáº§u Ä‘&oacute; táº¡i th&aacute;nh Ä‘á»‹a Bernabeu. Viá»‡c Bayern pháº£i chá»‹u &aacute;p lá»±c báº£o vá»‡ ng&ocirc;i b&aacute;u - Ä‘iá»u chÆ°a nh&agrave; v&ocirc; Ä‘á»‹ch n&agrave;o l&agrave;m Ä‘Æ°á»£c trong ká»· nguy&ecirc;n Champions League (tá»« 1992) - cÅ©ng c&oacute; thá»ƒ Ä‘Æ°á»£c xem nhÆ° má»™t thuáº­n lá»£i, d&ugrave; ráº¥t nhá», Ä‘á»ƒ Real c&oacute; thá»ƒ nu&ocirc;i má»™ng phá»¥c háº­n.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Náº¿u Ä‘&aacute;nh báº¡i Bayern Ä‘á»ƒ v&agrave;o chung káº¿t,&nbsp;<strong style=\"margin: 0px; padding: 0px;\">Real sáº½ láº­p hattrick chiáº¿n tháº¯ng trÆ°á»›c ba Ä‘á»‘i thá»§ Äá»©c á»Ÿ c&aacute;c giai Ä‘oáº¡n Ä‘áº¥u knock-out Champions League m&ugrave;a n&agrave;y</strong>. Táº¡i v&ograve;ng 16 Ä‘á»™i, tháº§y tr&ograve; HLV Carlo Ancelotti tháº¯ng Schalke 04 cáº£ hai lÆ°á»£t (6-1 tr&ecirc;n s&acirc;n kh&aacute;ch, 3-1 á»Ÿ s&acirc;n nh&agrave;) Ä‘á»ƒ Ä‘i tiáº¿p vá»›i tá»•ng tá»· sá»‘ 9-2. V&agrave;o tá»© káº¿t, Real tráº£ s&ograve;ng pháº³ng ná»£ náº§n khi loáº¡i Dortmund vá»›i tá»•ng tá»· sá»‘ 3-2 theo ká»‹ch báº£n gáº§n giá»‘ng há»‡t m&ugrave;a trÆ°á»›c - tháº¯ng Ä‘áº­m 3-0 tr&ecirc;n s&acirc;n nh&agrave; á»Ÿ lÆ°á»£t Ä‘i rá»“i thua 0-2 tr&ecirc;n s&acirc;n Ä‘á»‘i thá»§ Äá»©c.</p>\r\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"margin: 0px auto 10px; padding: 0px; max-width: 100%; width: 480px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	<tbody style=\"margin: 0px; padding: 0px;\">\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; line-height: 0;\">\r\n				<img alt=\"Casillas-2-3735-1397218648.jpg\" src=\"http://m.f1.img.vnecdn.net/2014/04/11/Casillas-2-3735-1397218648.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 0px; line-height: 0; max-width: 100%; width: 480px;\" /></td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; line-height: 0;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 10px; line-height: normal; font-size: 12px; background-color: rgb(245, 245, 245);\">\r\n					Real Ä‘&atilde; rá»­a háº­n th&agrave;nh c&ocirc;ng trÆ°á»›c Dortmund á»Ÿ tá»© káº¿t m&ugrave;a n&agrave;y. B&aacute;n káº¿t sáº½ l&agrave; cÆ¡ há»™i Ä‘á»ƒ Casillas v&agrave; Ä‘á»“ng Ä‘á»™i tráº£ má»™t m&oacute;n ná»£ ná»¯a trÆ°á»›c Bayern.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	<strong style=\"margin: 0px; padding: 0px;\">Atletico Madrid - Chelsea: &#39;Ma cÅ©&#39; chÆ°a cháº¯c báº¯t náº¡t Ä‘Æ°á»£c &#39;ma má»›i&#39;</strong></p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	á»ž cáº·p b&aacute;n káº¿t c&ograve;n láº¡i, thoáº¡t nh&igrave;n, Atletico Madrid sáº½ kh&ocirc;ng c&oacute; cá»­a tranh v&eacute; Ä‘i tiáº¿p vá»›i Chelsea. Cáº£m quan áº¥y xuáº¥t ph&aacute;t tá»« thá»±c táº¿ Ä‘áº¡i diá»‡n T&acirc;y Ban Nha n&agrave;y ho&agrave;n tho&agrave;n thua k&eacute;m &ocirc;ng lá»›n Ngoáº¡i háº¡ng Anh vá» kinh nghiá»‡m v&agrave; danh tiáº¿ng.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Atletico Madrid má»›i láº§n Ä‘áº§u v&agrave;o tá»›i v&ograve;ng b&aacute;n káº¿t Champions League ká»ƒ tá»« giáº£i mang t&ecirc;n n&agrave;y nÄƒm 1992. C&ograve;n náº¿u t&iacute;nh tá»« thá»i giáº£i váº«n Ä‘Æ°á»£c gá»i theo t&ecirc;n cÅ© - Cup C1, Ä‘&acirc;y l&agrave; láº§n Ä‘áº§u ti&ecirc;n sau 40 nÄƒm Atletico Madrid lá»t v&agrave;o v&ograve;ng bá»‘n Ä‘á»™i cuá»‘i c&ugrave;ng ká»ƒ tá»« láº§n gáº§n nháº¥t á»Ÿ m&ugrave;a 1973-1974.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Náº¿u xem Atletico Madrid l&agrave; anh l&iacute;nh má»›i t&ograve; te, th&igrave; Chelsea giá»‘ng nhÆ° má»™t cá»±u binh d&agrave;y dáº¡n kinh nghiá»‡m, vá»›i láº§n thá»© s&aacute;u v&agrave;o b&aacute;n káº¿t Champions League ká»ƒ tá»« m&ugrave;a 2004-2005, trong Ä‘&oacute; c&oacute; hai láº§n chiáº¿n tháº¯ng Ä‘á»ƒ v&agrave;o chung káº¿t v&agrave; má»™t láº§n l&ecirc;n ng&ocirc;i v&ocirc; Ä‘á»‹ch á»Ÿ m&ugrave;a 2011-2012.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Tr&ecirc;n bÄƒng gháº¿ huáº¥n luyá»‡n, t&agrave;i nÄƒng cá»§a Diego Simeone Ä‘&atilde; Ä‘Æ°á»£c thá»«a nháº­n rá»™ng r&atilde;i qua nhá»¯ng th&agrave;nh tá»±u lá»›n lao c&ugrave;ng Atletico Madrid trong gáº§n ba nÄƒm qua - v&ocirc; Ä‘á»‹ch Europa League, Ä‘oáº¡t Si&ecirc;u Cup ch&acirc;u &Acirc;u, dáº«n Ä‘áº§u La Liga m&ugrave;a n&agrave;y. NhÆ°ng chiáº¿n lÆ°á»£c gia 43 tuá»•i ngÆ°á»i Argentina c&oacute; láº½ váº«n chÆ°a thá»ƒ s&aacute;nh vá»›i Ä‘á»“ng nhiá»‡m b&ecirc;n ph&iacute;a Chelsea, Jose Mourinho vá» tiáº¿ng tÄƒm v&agrave; kinh nghiá»‡m á»Ÿ Champions League.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Ä&acirc;y l&agrave; láº§n thá»© t&aacute;m &quot;NgÆ°á»i Äáº·c Biá»‡t&quot; Ä‘Æ°a c&aacute;c Ä‘á»™i &ocirc;ng dáº«n dáº¯t v&agrave;o b&aacute;n káº¿t giáº£i Ä‘áº¥u sá»‘ má»™t ch&acirc;u &Acirc;u. Trong báº£y láº§n trÆ°á»›c Ä‘&oacute;, Mourinho c&oacute; hai láº§n chiáº¿n tháº¯ng rá»“i Ä‘i tiáº¿p Ä‘á»ƒ chinh phá»¥c Champions League c&aacute;c nÄƒm 2004 (c&ugrave;ng Porto), 2010 (Inter). HLV cá»§a Chelsea cÅ©ng tá»«ng v&ocirc; Ä‘á»‹ch quá»‘c gia á»Ÿ má»i ná»n b&oacute;ng Ä‘&aacute; &ocirc;ng tá»«ng l&agrave;m viá»‡c.</p>\r\n<table align=\"center\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" class=\"tplCaption\" style=\"margin: 0px auto 10px; padding: 0px; max-width: 100%; width: 480px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	<tbody style=\"margin: 0px; padding: 0px;\">\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; line-height: 0;\">\r\n				<img alt=\"Simeone-5135-1397218648.jpg\" src=\"http://m.f1.img.vnecdn.net/2014/04/11/Simeone-5135-1397218648.jpg\" style=\"margin: 0px; padding: 0px; border: 0px; font-size: 0px; line-height: 0; max-width: 100%; width: 480px;\" /></td>\r\n		</tr>\r\n		<tr style=\"margin: 0px; padding: 0px;\">\r\n			<td style=\"margin: 0px; padding: 0px; line-height: 0;\">\r\n				<p class=\"Image\" style=\"margin: 0px; padding: 10px; line-height: normal; font-size: 12px; background-color: rgb(245, 245, 245);\">\r\n					Tá»«ng tháº¯ng Mourinho á»Ÿ chung káº¿t Cup Nh&agrave; Vua m&ugrave;a trÆ°á»›c, Simeone láº¡i c&oacute; cÆ¡ há»™i tá»‘t Ä‘á»ƒ chá»©ng tá» &ocirc;ng cÅ©ng t&agrave;i nÄƒng kh&ocirc;ng k&eacute;m cáº¡nh &quot;NgÆ°á»i Äáº·c Biá»‡t&quot;.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Mourinho cÅ©ng kh&ocirc;ng há» láº¡ Simeone v&igrave; tá»«ng ch&iacute;n láº§n cháº¡m tr&aacute;n thá»i &ocirc;ng c&ograve;n dáº«n dáº¯t Real Madrid. &quot;NgÆ°á»i Äáº·c Biá»‡t&quot; thá»i áº¥y tháº¯ng Ä‘áº¿n t&aacute;m tráº­n v&agrave; chá»‰ thua Simeone má»™t láº§n duy nháº¥t trong tráº­n chung káº¿t Cup Nh&agrave; Vua T&acirc;y Ban Nha m&ugrave;a trÆ°á»›c (Real thua Atletico 1-2).</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	NhÆ°ng viá»‡c há» quáº­t ng&atilde; ngÆ°á»i khá»•ng lá»“ Ä‘á»“ng hÆ°Æ¡ng Barca vá»›i tá»•ng tá»· sá»‘ 2-1 á»Ÿ tá»© káº¿t cho tháº¥y&nbsp;<strong style=\"margin: 0px; padding: 0px;\">Atletico Madrid l&agrave; Ä‘á»‘i thá»§ kh&ocirc;ng thá»ƒ xem thÆ°á»ng</strong>. Báº£n th&acirc;n Chelsea cÅ©ng tráº§y vi tr&oacute;c váº£y má»›i c&oacute; thá»ƒ gi&agrave;nh quyá»n v&agrave;o b&aacute;n káº¿t nhá» b&agrave;n tháº¯ng muá»™n m&agrave;ng á»Ÿ ph&uacute;t 87 tráº­n lÆ°á»£t vá» cá»§a Andre Schurrle, Ä‘á»ƒ qu&acirc;n b&igrave;nh tá»· sá»‘ 3-3 qua hai lÆ°á»£t v&agrave; loáº¡i PSG theo luáº­t b&agrave;n tháº¯ng s&acirc;n kh&aacute;ch.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	Tráº­n b&aacute;n káº¿t giá»¯a Atletico Madrid vá»›i Chelsea c&ograve;n th&uacute; vá»‹ á»Ÿ chi tiáº¿t li&ecirc;n quan Ä‘áº¿n Thibault Courtois - thá»§ m&ocirc;n m&agrave; Ä‘á»™i b&oacute;ng Anh sá»Ÿ há»¯u nhÆ°ng Ä‘ang báº¯t ráº¥t hay trong m&agrave;u &aacute;o cho CLB T&acirc;y Ban Nha theo há»£p Ä‘á»“ng mÆ°á»£n cáº§u thá»§. Má»™t Ä‘iá»u khoáº£n trong há»£p Ä‘á»“ng Ä‘&oacute; quy Ä‘á»‹nh Courtois kh&ocirc;ng Ä‘Æ°á»£c ph&eacute;p thi Ä‘áº¥u náº¿u hai Ä‘á»™i cháº¡m tr&aacute;n á»Ÿ Cup ch&acirc;u &Acirc;u v&agrave; náº¿u muá»‘n l&aacute;ch Ä‘iá»u khoáº£n áº¥y, Atletico Madrid sáº½ pháº£i tráº£ khoáº£n ph&iacute; 6 triá»‡u euro.</p>\r\n<p class=\"Normal\" style=\"margin: 0px 0px 1em; padding: 0px; line-height: 18px; color: rgb(51, 51, 51); font-family: arial; font-size: 14px;\">\r\n	UEFA nhiá»u kháº£ nÄƒng sáº½ pháº£i v&agrave;o cuá»™c Ä‘á»ƒ ph&acirc;n xá»­ vá»¥ n&agrave;y, v&igrave; Atletico Madrid kh&ocirc;ng muá»‘n máº¥t tiá»n nhÆ°ng cÅ©ng cháº³ng há» muá»‘n gáº¡t thá»§ m&ocirc;n g&oacute;p c&ocirc;ng lá»›n Ä‘Æ°a há» v&agrave;o b&aacute;n káº¿t ra ngo&agrave;i danh s&aacute;ch Ä‘Äƒng k&yacute; thi Ä‘áº¥u.</p>\r\n', 'nOtronaldo13-8015-1397218648.jpg', 'Vnexpress.net', '2014-04-11 20:14:02', '2014-04-18 14:18:54');
INSERT INTO information VALUES ('9', '1', 'Suarez, Gerrard â€“ Aguero, Toure: Kinh Ä‘iá»ƒn á»Ÿ Anfield', 'Suarez, Gerrard â€“ Aguero, Toure: Kinh Ä‘iá»ƒn á»Ÿ Anfield', '2 tiá»n Ä‘áº¡o hay nháº¥t vÃ  2 tiá»n vá»‡ hay nháº¥t sáº½ cÃ³ mÃ n so tÃ i vÃ´ cÃ¹ng thÃº vá»‹ á»Ÿ tráº­n Ä‘áº¥u Ä‘Æ°á»£c coi lÃ  chung káº¿t cá»§a mÃ¹a giáº£i giá»¯a Liverpool vÃ  Man City táº¡i Anfield vÃ o 19h37, 13/4.', '2 tiá»n Ä‘áº¡o hay nháº¥t vÃ  2 tiá»n vá»‡ hay nháº¥t sáº½ cÃ³ mÃ n so tÃ i vÃ´ cÃ¹ng thÃº vá»‹ á»Ÿ tráº­n Ä‘áº¥u Ä‘Æ°á»£c coi lÃ  chung káº¿t cá»§a mÃ¹a giáº£i giá»¯a Liverpool vÃ  Man City táº¡i Anfield vÃ o 19h37, 13/4.', '<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	<strong>Liverpool &ndash; Man City</strong>, tráº­n cáº§u c&oacute; nhiá»u &yacute; nghÄ©a hÆ¡n 3 Ä‘iá»ƒm, bá»Ÿi náº¿u Ä‘á»™i n&agrave;o tháº¯ng sáº½ náº¯m lá»£i tháº¿ cá»±c lá»›n trong cuá»™c Ä‘ua gi&agrave;nh chá»©c v&ocirc; Ä‘á»‹ch. Cáº£ 2 b&ecirc;n Ä‘á»u Ä‘ang c&oacute; phong Ä‘á»™ cá»±c cao, náº¿u nhÆ° Liverpool c&oacute; chuá»—i 9 v&ograve;ng tháº¯ng li&ecirc;n tiáº¿p th&igrave; Man City c&oacute; sá»± trá»Ÿ láº¡i máº¡nh máº½ vá»›i viá»‡c gi&agrave;nh 13 Ä‘iá»ƒm trong 5 v&ograve;ng Ä‘áº¥u gáº§n nháº¥t (trong Ä‘&oacute; c&oacute; c&aacute;c tráº­n Ä‘áº¥u kh&oacute; khÄƒn tr&ecirc;n s&acirc;n cá»§a MU v&agrave; Arsenal).</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	<strong>Suarez, Gerrard: Má»™t ná»­a sá»©c máº¡nh cá»§a Liverpool</strong></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	Nháº­n x&eacute;t n&agrave;y sáº½ cháº³ng qu&aacute; náº¿u dá»±a v&agrave;o nhá»¯ng Ä‘&oacute;ng g&oacute;p cá»§a Suarez v&agrave; Gerrard tá»« Ä‘áº§u m&ugrave;a cho Quá»· Ä‘á» v&ugrave;ng Merseyside. Kh&ocirc;ng thi Ä‘áº¥u v&agrave;i tráº­n há»“i Ä‘áº§u m&ugrave;a do &aacute;n treo gi&ograve; tá»« m&ugrave;a trÆ°á»›c v&igrave; cáº¯n Ivanovic cá»§a Chelsea, tiá»n Ä‘áº¡o ngÆ°á»i Uruguay &ndash; Suarez Ä‘&atilde; c&oacute; sá»± trá»Ÿ láº¡i máº¡nh máº½, tháº­m ch&iacute; l&agrave; b&ugrave;ng ná»•. Kh&ocirc;ng chá»‰ tiáº¿t cháº¿ Ä‘Æ°á»£c báº£n th&acirc;n Ä‘á»ƒ tr&aacute;nh nhá»¯ng ráº¯c rá»‘i kh&ocirc;ng Ä‘&aacute;ng c&oacute;, Suarez c&ograve;n ph&aacute;t huy Ä‘Æ°á»£c táº¥t cáº£ nhá»¯ng Ä‘iá»ƒm máº¡nh cá»§a m&igrave;nh Ä‘á»ƒ &ldquo;h&agrave;nh háº¡&rdquo; h&agrave;ng thá»§ Ä‘á»‘i phÆ°Æ¡ng. 29 b&agrave;n sau 28 tráº­n, c&ugrave;ng 11 Ä‘Æ°á»ng kiáº¿n táº¡o, cá»±u cáº§u thá»§ cá»§a Ajax Ä‘ang c&oacute;&nbsp; m&ugrave;a giáº£i thÄƒng hoa nháº¥t trong sá»± nghiá»‡p v&agrave; g&oacute;p c&ocirc;ng cá»±c lá»›n v&agrave;o ng&ocirc;i Ä‘áº§u báº£ng cá»§a The Kop hiá»‡n táº¡i, c&ugrave;ng th&agrave;nh t&iacute;ch l&agrave; Ä‘á»™i b&oacute;ng c&oacute; h&agrave;ng c&ocirc;ng xuáº¥t sáº¯c nháº¥t (90 b&agrave;n).</p>\r\n<p align=\"center\" style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0);\">\r\n	<img alt=\"Suarez, Gerrard â€“ Aguero, Toure: Kinh Ä‘iá»ƒn á»Ÿ Anfield - 1\" class=\"news-image\" src=\"http://img-hcm.24hstatic.com:8008/upload/2-2014/images/2014-04-12/1397277109-bong-da-suarez-gerrard.jpg\" style=\"border: 0px; max-width: 400px;\" /></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;\">\r\n	Suarez, Gerrard xá»©ng Ä‘&aacute;ng l&agrave; má»™t ná»­a sá»©c máº¡nh cá»§a Liverpool</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	C&ograve;n vá»›i Gerrard, á»Ÿ tuá»•i 33 &iacute;t ai ngá» ngÆ°á»i Ä‘á»™i trÆ°á»Ÿng cá»§a Liverpool váº«n c&ograve;n c&oacute; thá»ƒ Ä‘&oacute;ng g&oacute;p nhiá»u Ä‘áº¿n tháº¿ cho Ä‘á»™i chá»§ s&acirc;n Anfield. NHM kh&ocirc;ng c&ograve;n tháº¥y nhiá»u khoáº£nh kháº¯c G8 lao l&ecirc;n v&agrave; tung nhá»¯ng c&uacute; s&uacute;t sáº¥m s&eacute;t nhÆ° thá»i trai tráº», nhÆ°ng anh váº«n hoáº¡t Ä‘á»™ng &acirc;m tháº§m v&agrave; cá»±c k&igrave; hiá»‡u quáº£ á»Ÿ tuyáº¿n giá»¯a vá»›i vai tr&ograve; cáº§m trá»‹ch, cáº§u ná»‘i Ä‘á»ƒ l&agrave;m bá»‡ ph&oacute;ng cho c&aacute;c Ä‘á»“ng Ä‘á»™i tráº» á»Ÿ ph&iacute;a tr&ecirc;n tá»a s&aacute;ng. Äáº·c biá»‡t, viá»‡c Gerrard ghi tá»›i 13 b&agrave;n táº¡i&nbsp;<a href=\"http://www.24h.com.vn/premier-league-2012-13-tu-dai-gia-quyet-dau-c48e2367.html\" style=\"text-decoration: none; color: rgb(0, 0, 255);\">Premier League</a>&nbsp;m&ugrave;a giáº£i nÄƒm nay (chÆ¡i 29 tráº­n, 8 Ä‘Æ°á»ng kiáº¿n táº¡o), trong Ä‘&oacute; c&oacute; 10 b&agrave;n tá»« cháº¥m 11m cho tháº¥y anh váº«n cá»±c k&igrave; quan trá»ng. Náº¿u kh&ocirc;ng c&oacute; báº£n lÄ©nh, kinh nghiá»‡m cá»§a G8, chÆ°a cháº¯c Liverpool Ä‘&atilde; c&oacute; Ä‘Æ°á»£c vá»‹ tháº¿ nhÆ° hiá»‡n táº¡i.</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	Má»›i Ä‘&acirc;y nháº¥t, Gerrard v&agrave; Suarez c&ugrave;ng chia sáº» danh hiá»‡u Cáº§u thá»§ xuáº¥t sáº¯c nháº¥t giáº£i Ngoáº¡i háº¡ng th&aacute;ng 3. Ä&oacute; l&agrave; pháº§n thÆ°á»Ÿng ho&agrave;n to&agrave;n xá»©ng Ä‘&aacute;ng sau nhá»¯ng g&igrave; &quot;má»™t ná»­a&quot; cá»§a&nbsp;<em>Liverpool Ä‘&atilde; thá»ƒ hiá»‡n v&agrave; cÅ©ng l&agrave; Ä‘á»™ng lá»±c Ä‘á»ƒ G8 v&agrave; S7 tiáº¿p tá»¥c tá»a s&aacute;ng trong pháº§n c&ograve;n láº¡i cá»§a m&ugrave;a giáº£i, nháº¥t l&agrave; trong tráº­n Ä‘áº¥u v&ocirc; c&ugrave;ng quan trá»ng gáº·p Man City</em></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	<strong>Aguero, Yaya Toure: Nhá»¯ng si&ecirc;u nh&acirc;n cá»§a Man xanh</strong></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	Náº¿u kh&ocirc;ng d&iacute;nh cháº¥n thÆ°Æ¡ng, cháº¯c cháº¯n Aguero sáº½ Ä‘&oacute;ng g&oacute;p nhiá»u hÆ¡n cho Man City. NhÆ°ng th&agrave;nh t&iacute;ch ghi 15 b&agrave;n, 5 Ä‘Æ°á»ng kiáº¿n táº¡o sau 17 tráº­n cÅ©ng l&agrave; Ä‘á»§ Ä‘á»ƒ tháº¥y Ä‘Æ°á»£c t&agrave;i nÄƒng cá»§a tiá»n Ä‘áº¡o ngÆ°á»i Argentina. V&agrave;o tá»‘i mai, Kun sáº½ trá»Ÿ láº¡i Ä‘á»™i h&igrave;nh cá»§a The Citizens sau má»™t thá»i gian dÆ°á»¡ng thÆ°Æ¡ng v&agrave; Ä‘&oacute; sáº½ l&agrave; má»™t má»‘i nguy hiá»ƒm thÆ°á»ng trá»±c trÆ°á»›c h&agrave;ng thá»§ vá»‘n kh&ocirc;ng qu&aacute; vá»¯ng cháº¯c cá»§a Liverpool (thá»§ng lÆ°á»›i nhiá»u nháº¥t trong top 5 vá»›i 40 b&agrave;n thua).</p>\r\n<p align=\"center\" style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0);\">\r\n	<img alt=\"Suarez, Gerrard â€“ Aguero, Toure: Kinh Ä‘iá»ƒn á»Ÿ Anfield - 2\" class=\"news-image\" src=\"http://img-hcm.24hstatic.com:8008/upload/2-2014/images/2014-04-12/1397277109-bong-da-aguero-toure.jpg\" style=\"border: 0px; max-width: 400px;\" /></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;\">\r\n	Aguero, Yaya Toure l&agrave; nhá»¯ng con &aacute;t chá»§ b&agrave;i trong lá»‘i chÆ¡i cá»§a Man City</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	Trong khi Ä‘&oacute;, Yaya Toure Ä‘ang tiáº¿p tá»¥c chá»©ng minh anh l&agrave; tiá»n vá»‡ trung t&acirc;m hay nháº¥t giáº£i Ngoáº¡i háº¡ng, tháº­m ch&iacute; l&agrave; tháº¿ giá»›i. KÄ© thuáº­t, thá»ƒ h&igrave;nh, nh&atilde;n quan ho&agrave;n háº£o, Yaya c&ograve;n ráº¥t biáº¿t c&aacute;ch ghi b&agrave;n. 18 pha láº­p c&ocirc;ng táº¡i Premier League tá»« Ä‘áº§u m&ugrave;a c&ugrave;ng 5 Ä‘Æ°á»ng kiáº¿n táº¡o (sau 30 tráº­n), ngÆ°á»i em nh&agrave; Toure ch&iacute;nh l&agrave; cáº§u thá»§ ghi nhiá»u b&agrave;n nháº¥t cho Man xanh. Tiá»n vá»‡ ngÆ°á»i Bá» Biá»ƒn Ng&agrave; ch&iacute;nh l&agrave; con &aacute;t chá»§ b&agrave;i trong lá»‘i chÆ¡i táº¥n c&ocirc;ng rá»±c lá»­a HLV Pellegrini &aacute;p dá»¥ng vá»›i kháº£ nÄƒng c&ocirc;ng thá»§ to&agrave;n diá»‡n hiáº¿m c&oacute;.</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	Nhá»¯ng con sá»‘ thá»‘ng k&ecirc; háº³n Ä‘ang khiáº¿n NHM h&aacute;o há»©c chá» Ä‘á»£i m&agrave;n Ä‘á»‘i Ä‘áº§u giá»¯a Suarez, Gerrard &ndash; Aguero, Yaya Toure trong tráº­n chung káº¿t giá»¯a&nbsp;<u>Liverpool v&agrave; Man City</u>. Báº¥t cá»© ai trong 4 ng&ocirc;i sao ká»ƒ tr&ecirc;n tá»a s&aacute;ng Ä‘á»u c&oacute; thá»ƒ sáº½ quyáº¿t Ä‘á»‹nh sá»‘ pháº­n tráº­n Ä‘áº¥u. Má»™t cuá»™c Ä‘á» sá»©c xá»©ng Ä‘&aacute;ng Ä‘Æ°á»£c coi l&agrave; kinh Ä‘iá»ƒn á»Ÿ giáº£i Ngoáº¡i háº¡ng Ä‘á»ƒ quyáº¿t Ä‘á»‹nh má»™t trong nhá»¯ng cuá»™c Ä‘ua Ä‘Æ°á»£c cho l&agrave; háº¥p dáº«n nháº¥t trong lá»‹ch sá»­ Premier League.</p>\r\n<table align=\"center\" cellpadding=\"3\" cellspacing=\"0\" style=\"font-family: Arial, Helvetica, sans-serif; max-width: 500px; color: rgb(0, 0, 0); text-align: justify; border-style: solid; border-color: rgb(187, 187, 187); background-color: rgb(222, 241, 200); margin: 5px auto;\" width=\"500\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">\r\n				<p>\r\n					<strong>Liverpool l&agrave; &ldquo;Vua&rdquo; penalty</strong></p>\r\n				Vá»›i 2 c&uacute; Ä‘&aacute; penalty th&agrave;nh c&ocirc;ng cá»§a Gerrard á»Ÿ chiáº¿n tháº¯ng 3-2 trÆ°á»›c West Ham v&agrave;o tuáº§n trÆ°á»›c, Liverpool Ä‘&atilde; n&acirc;ng tá»•ng sá»‘ b&agrave;n tháº¯ng há» ghi Ä‘Æ°á»£c tr&ecirc;n cháº¥m 11m trong suá»‘t chiá»u d&agrave;i lá»‹ch sá»­ Premier League l&ecirc;n con sá»‘ 97 b&agrave;n. Hiá»‡n, Liverpool c&ugrave;ng Chelsea chia sáº» ng&ocirc;i sá»‘ 1 vá» sá»‘ b&agrave;n tháº¯ng tá»« cháº¥m penalty. NhÆ°ng th&agrave;nh t&iacute;ch n&agrave;y kh&ocirc;ng pháº£i tá»± nhi&ecirc;n m&agrave; c&oacute;, Ä‘áº·c biá»‡t l&agrave; á»Ÿ m&ugrave;a giáº£i nÄƒm nay vá»›i lá»‘i chÆ¡i kÄ© thuáº­t, tinh qu&aacute;i cá»§a Suarez v&agrave; c&aacute;c Ä‘á»“ng Ä‘á»™i tr&ecirc;n h&agrave;ng c&ocirc;ng, sá»©c &eacute;p cá»§a The Kop Ä‘&egrave; l&ecirc;n c&aacute;c h&agrave;ng ph&ograve;ng ngá»± Ä‘á»‘i phÆ°Æ¡ng l&agrave; cá»±c k&igrave; khá»§ng khiáº¿p v&agrave; pháº§n lá»›n nhá»¯ng quáº£ pháº¡t 11m trá»ng t&agrave;i cho Quá»· Ä‘á» v&ugrave;ng Merseyside hÆ°á»Ÿng Ä‘á»u ch&iacute;nh x&aacute;c.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', '<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	<strong>Liverpool &ndash; Man City</strong>, tráº­n cáº§u c&oacute; nhiá»u &yacute; nghÄ©a hÆ¡n 3 Ä‘iá»ƒm, bá»Ÿi náº¿u Ä‘á»™i n&agrave;o tháº¯ng sáº½ náº¯m lá»£i tháº¿ cá»±c lá»›n trong cuá»™c Ä‘ua gi&agrave;nh chá»©c v&ocirc; Ä‘á»‹ch. Cáº£ 2 b&ecirc;n Ä‘á»u Ä‘ang c&oacute; phong Ä‘á»™ cá»±c cao, náº¿u nhÆ° Liverpool c&oacute; chuá»—i 9 v&ograve;ng tháº¯ng li&ecirc;n tiáº¿p th&igrave; Man City c&oacute; sá»± trá»Ÿ láº¡i máº¡nh máº½ vá»›i viá»‡c gi&agrave;nh 13 Ä‘iá»ƒm trong 5 v&ograve;ng Ä‘áº¥u gáº§n nháº¥t (trong Ä‘&oacute; c&oacute; c&aacute;c tráº­n Ä‘áº¥u kh&oacute; khÄƒn tr&ecirc;n s&acirc;n cá»§a MU v&agrave; Arsenal).</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	<strong>Suarez, Gerrard: Má»™t ná»­a sá»©c máº¡nh cá»§a Liverpool</strong></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	Nháº­n x&eacute;t n&agrave;y sáº½ cháº³ng qu&aacute; náº¿u dá»±a v&agrave;o nhá»¯ng Ä‘&oacute;ng g&oacute;p cá»§a Suarez v&agrave; Gerrard tá»« Ä‘áº§u m&ugrave;a cho Quá»· Ä‘á» v&ugrave;ng Merseyside. Kh&ocirc;ng thi Ä‘áº¥u v&agrave;i tráº­n há»“i Ä‘áº§u m&ugrave;a do &aacute;n treo gi&ograve; tá»« m&ugrave;a trÆ°á»›c v&igrave; cáº¯n Ivanovic cá»§a Chelsea, tiá»n Ä‘áº¡o ngÆ°á»i Uruguay &ndash; Suarez Ä‘&atilde; c&oacute; sá»± trá»Ÿ láº¡i máº¡nh máº½, tháº­m ch&iacute; l&agrave; b&ugrave;ng ná»•. Kh&ocirc;ng chá»‰ tiáº¿t cháº¿ Ä‘Æ°á»£c báº£n th&acirc;n Ä‘á»ƒ tr&aacute;nh nhá»¯ng ráº¯c rá»‘i kh&ocirc;ng Ä‘&aacute;ng c&oacute;, Suarez c&ograve;n ph&aacute;t huy Ä‘Æ°á»£c táº¥t cáº£ nhá»¯ng Ä‘iá»ƒm máº¡nh cá»§a m&igrave;nh Ä‘á»ƒ &ldquo;h&agrave;nh háº¡&rdquo; h&agrave;ng thá»§ Ä‘á»‘i phÆ°Æ¡ng. 29 b&agrave;n sau 28 tráº­n, c&ugrave;ng 11 Ä‘Æ°á»ng kiáº¿n táº¡o, cá»±u cáº§u thá»§ cá»§a Ajax Ä‘ang c&oacute;&nbsp; m&ugrave;a giáº£i thÄƒng hoa nháº¥t trong sá»± nghiá»‡p v&agrave; g&oacute;p c&ocirc;ng cá»±c lá»›n v&agrave;o ng&ocirc;i Ä‘áº§u báº£ng cá»§a The Kop hiá»‡n táº¡i, c&ugrave;ng th&agrave;nh t&iacute;ch l&agrave; Ä‘á»™i b&oacute;ng c&oacute; h&agrave;ng c&ocirc;ng xuáº¥t sáº¯c nháº¥t (90 b&agrave;n).</p>\r\n<p align=\"center\" style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0);\">\r\n	<img alt=\"Suarez, Gerrard â€“ Aguero, Toure: Kinh Ä‘iá»ƒn á»Ÿ Anfield - 1\" class=\"news-image\" src=\"http://img-hcm.24hstatic.com:8008/upload/2-2014/images/2014-04-12/1397277109-bong-da-suarez-gerrard.jpg\" style=\"border: 0px; max-width: 400px;\" /></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;\">\r\n	Suarez, Gerrard xá»©ng Ä‘&aacute;ng l&agrave; má»™t ná»­a sá»©c máº¡nh cá»§a Liverpool</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	C&ograve;n vá»›i Gerrard, á»Ÿ tuá»•i 33 &iacute;t ai ngá» ngÆ°á»i Ä‘á»™i trÆ°á»Ÿng cá»§a Liverpool váº«n c&ograve;n c&oacute; thá»ƒ Ä‘&oacute;ng g&oacute;p nhiá»u Ä‘áº¿n tháº¿ cho Ä‘á»™i chá»§ s&acirc;n Anfield. NHM kh&ocirc;ng c&ograve;n tháº¥y nhiá»u khoáº£nh kháº¯c G8 lao l&ecirc;n v&agrave; tung nhá»¯ng c&uacute; s&uacute;t sáº¥m s&eacute;t nhÆ° thá»i trai tráº», nhÆ°ng anh váº«n hoáº¡t Ä‘á»™ng &acirc;m tháº§m v&agrave; cá»±c k&igrave; hiá»‡u quáº£ á»Ÿ tuyáº¿n giá»¯a vá»›i vai tr&ograve; cáº§m trá»‹ch, cáº§u ná»‘i Ä‘á»ƒ l&agrave;m bá»‡ ph&oacute;ng cho c&aacute;c Ä‘á»“ng Ä‘á»™i tráº» á»Ÿ ph&iacute;a tr&ecirc;n tá»a s&aacute;ng. Äáº·c biá»‡t, viá»‡c Gerrard ghi tá»›i 13 b&agrave;n táº¡i&nbsp;<a href=\"http://www.24h.com.vn/premier-league-2012-13-tu-dai-gia-quyet-dau-c48e2367.html\" style=\"text-decoration: none; color: rgb(0, 0, 255);\">Premier League</a>&nbsp;m&ugrave;a giáº£i nÄƒm nay (chÆ¡i 29 tráº­n, 8 Ä‘Æ°á»ng kiáº¿n táº¡o), trong Ä‘&oacute; c&oacute; 10 b&agrave;n tá»« cháº¥m 11m cho tháº¥y anh váº«n cá»±c k&igrave; quan trá»ng. Náº¿u kh&ocirc;ng c&oacute; báº£n lÄ©nh, kinh nghiá»‡m cá»§a G8, chÆ°a cháº¯c Liverpool Ä‘&atilde; c&oacute; Ä‘Æ°á»£c vá»‹ tháº¿ nhÆ° hiá»‡n táº¡i.</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	Má»›i Ä‘&acirc;y nháº¥t, Gerrard v&agrave; Suarez c&ugrave;ng chia sáº» danh hiá»‡u Cáº§u thá»§ xuáº¥t sáº¯c nháº¥t giáº£i Ngoáº¡i háº¡ng th&aacute;ng 3. Ä&oacute; l&agrave; pháº§n thÆ°á»Ÿng ho&agrave;n to&agrave;n xá»©ng Ä‘&aacute;ng sau nhá»¯ng g&igrave; &quot;má»™t ná»­a&quot; cá»§a&nbsp;<em>Liverpool Ä‘&atilde; thá»ƒ hiá»‡n v&agrave; cÅ©ng l&agrave; Ä‘á»™ng lá»±c Ä‘á»ƒ G8 v&agrave; S7 tiáº¿p tá»¥c tá»a s&aacute;ng trong pháº§n c&ograve;n láº¡i cá»§a m&ugrave;a giáº£i, nháº¥t l&agrave; trong tráº­n Ä‘áº¥u v&ocirc; c&ugrave;ng quan trá»ng gáº·p Man City</em></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	<strong>Aguero, Yaya Toure: Nhá»¯ng si&ecirc;u nh&acirc;n cá»§a Man xanh</strong></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	Náº¿u kh&ocirc;ng d&iacute;nh cháº¥n thÆ°Æ¡ng, cháº¯c cháº¯n Aguero sáº½ Ä‘&oacute;ng g&oacute;p nhiá»u hÆ¡n cho Man City. NhÆ°ng th&agrave;nh t&iacute;ch ghi 15 b&agrave;n, 5 Ä‘Æ°á»ng kiáº¿n táº¡o sau 17 tráº­n cÅ©ng l&agrave; Ä‘á»§ Ä‘á»ƒ tháº¥y Ä‘Æ°á»£c t&agrave;i nÄƒng cá»§a tiá»n Ä‘áº¡o ngÆ°á»i Argentina. V&agrave;o tá»‘i mai, Kun sáº½ trá»Ÿ láº¡i Ä‘á»™i h&igrave;nh cá»§a The Citizens sau má»™t thá»i gian dÆ°á»¡ng thÆ°Æ¡ng v&agrave; Ä‘&oacute; sáº½ l&agrave; má»™t má»‘i nguy hiá»ƒm thÆ°á»ng trá»±c trÆ°á»›c h&agrave;ng thá»§ vá»‘n kh&ocirc;ng qu&aacute; vá»¯ng cháº¯c cá»§a Liverpool (thá»§ng lÆ°á»›i nhiá»u nháº¥t trong top 5 vá»›i 40 b&agrave;n thua).</p>\r\n<p align=\"center\" style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0);\">\r\n	<img alt=\"Suarez, Gerrard â€“ Aguero, Toure: Kinh Ä‘iá»ƒn á»Ÿ Anfield - 2\" class=\"news-image\" src=\"http://img-hcm.24hstatic.com:8008/upload/2-2014/images/2014-04-12/1397277109-bong-da-aguero-toure.jpg\" style=\"border: 0px; max-width: 400px;\" /></p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;\">\r\n	Aguero, Yaya Toure l&agrave; nhá»¯ng con &aacute;t chá»§ b&agrave;i trong lá»‘i chÆ¡i cá»§a Man City</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	Trong khi Ä‘&oacute;, Yaya Toure Ä‘ang tiáº¿p tá»¥c chá»©ng minh anh l&agrave; tiá»n vá»‡ trung t&acirc;m hay nháº¥t giáº£i Ngoáº¡i háº¡ng, tháº­m ch&iacute; l&agrave; tháº¿ giá»›i. KÄ© thuáº­t, thá»ƒ h&igrave;nh, nh&atilde;n quan ho&agrave;n háº£o, Yaya c&ograve;n ráº¥t biáº¿t c&aacute;ch ghi b&agrave;n. 18 pha láº­p c&ocirc;ng táº¡i Premier League tá»« Ä‘áº§u m&ugrave;a c&ugrave;ng 5 Ä‘Æ°á»ng kiáº¿n táº¡o (sau 30 tráº­n), ngÆ°á»i em nh&agrave; Toure ch&iacute;nh l&agrave; cáº§u thá»§ ghi nhiá»u b&agrave;n nháº¥t cho Man xanh. Tiá»n vá»‡ ngÆ°á»i Bá» Biá»ƒn Ng&agrave; ch&iacute;nh l&agrave; con &aacute;t chá»§ b&agrave;i trong lá»‘i chÆ¡i táº¥n c&ocirc;ng rá»±c lá»­a HLV Pellegrini &aacute;p dá»¥ng vá»›i kháº£ nÄƒng c&ocirc;ng thá»§ to&agrave;n diá»‡n hiáº¿m c&oacute;.</p>\r\n<p style=\"font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;\">\r\n	Nhá»¯ng con sá»‘ thá»‘ng k&ecirc; háº³n Ä‘ang khiáº¿n NHM h&aacute;o há»©c chá» Ä‘á»£i m&agrave;n Ä‘á»‘i Ä‘áº§u giá»¯a Suarez, Gerrard &ndash; Aguero, Yaya Toure trong tráº­n chung káº¿t giá»¯a&nbsp;<u>Liverpool v&agrave; Man City</u>. Báº¥t cá»© ai trong 4 ng&ocirc;i sao ká»ƒ tr&ecirc;n tá»a s&aacute;ng Ä‘á»u c&oacute; thá»ƒ sáº½ quyáº¿t Ä‘á»‹nh sá»‘ pháº­n tráº­n Ä‘áº¥u. Má»™t cuá»™c Ä‘á» sá»©c xá»©ng Ä‘&aacute;ng Ä‘Æ°á»£c coi l&agrave; kinh Ä‘iá»ƒn á»Ÿ giáº£i Ngoáº¡i háº¡ng Ä‘á»ƒ quyáº¿t Ä‘á»‹nh má»™t trong nhá»¯ng cuá»™c Ä‘ua Ä‘Æ°á»£c cho l&agrave; háº¥p dáº«n nháº¥t trong lá»‹ch sá»­ Premier League.</p>\r\n<table align=\"center\" cellpadding=\"3\" cellspacing=\"0\" style=\"font-family: Arial, Helvetica, sans-serif; max-width: 500px; color: rgb(0, 0, 0); text-align: justify; border-style: solid; border-color: rgb(187, 187, 187); background-color: rgb(222, 241, 200); margin: 5px auto;\" width=\"500\">\r\n	<tbody>\r\n		<tr>\r\n			<td valign=\"top\">\r\n				<p>\r\n					<strong>Liverpool l&agrave; &ldquo;Vua&rdquo; penalty</strong></p>\r\n				Vá»›i 2 c&uacute; Ä‘&aacute; penalty th&agrave;nh c&ocirc;ng cá»§a Gerrard á»Ÿ chiáº¿n tháº¯ng 3-2 trÆ°á»›c West Ham v&agrave;o tuáº§n trÆ°á»›c, Liverpool Ä‘&atilde; n&acirc;ng tá»•ng sá»‘ b&agrave;n tháº¯ng há» ghi Ä‘Æ°á»£c tr&ecirc;n cháº¥m 11m trong suá»‘t chiá»u d&agrave;i lá»‹ch sá»­ Premier League l&ecirc;n con sá»‘ 97 b&agrave;n. Hiá»‡n, Liverpool c&ugrave;ng Chelsea chia sáº» ng&ocirc;i sá»‘ 1 vá» sá»‘ b&agrave;n tháº¯ng tá»« cháº¥m penalty. NhÆ°ng th&agrave;nh t&iacute;ch n&agrave;y kh&ocirc;ng pháº£i tá»± nhi&ecirc;n m&agrave; c&oacute;, Ä‘áº·c biá»‡t l&agrave; á»Ÿ m&ugrave;a giáº£i nÄƒm nay vá»›i lá»‘i chÆ¡i kÄ© thuáº­t, tinh qu&aacute;i cá»§a Suarez v&agrave; c&aacute;c Ä‘á»“ng Ä‘á»™i tr&ecirc;n h&agrave;ng c&ocirc;ng, sá»©c &eacute;p cá»§a The Kop Ä‘&egrave; l&ecirc;n c&aacute;c h&agrave;ng ph&ograve;ng ngá»± Ä‘á»‘i phÆ°Æ¡ng l&agrave; cá»±c k&igrave; khá»§ng khiáº¿p v&agrave; pháº§n lá»›n nhá»¯ng quáº£ pháº¡t 11m trá»ng t&agrave;i cho Quá»· Ä‘á» v&ugrave;ng Merseyside hÆ°á»Ÿng Ä‘á»u ch&iacute;nh x&aacute;c.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 'PQv1397277721-bong-da-liverpool-manc.jpg', 'Khampha.vn', '2014-04-12 13:41:58', '2014-04-12 13:41:58');

-- ----------------------------
-- Table structure for `information_category`
-- ----------------------------
DROP TABLE IF EXISTS `information_category`;
CREATE TABLE `information_category` (
  `InCat_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Name_EN` varchar(255) DEFAULT NULL,
  `ParentID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`InCat_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of information_category
-- ----------------------------
INSERT INTO information_category VALUES ('1', 'ChÃ³ PhÃº Quá»‘c', 'Phu Quoc Dog', '0');
INSERT INTO information_category VALUES ('3', 'Category test 1', 'Category test 1', '0');
INSERT INTO information_category VALUES ('4', 'ChÃ³ 1', 'Dog type 1', '1');
INSERT INTO information_category VALUES ('5', 'Category test 2', 'Category test 2', '0');

-- ----------------------------
-- Table structure for `lock_ip`
-- ----------------------------
DROP TABLE IF EXISTS `lock_ip`;
CREATE TABLE `lock_ip` (
  `Lock_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(15) DEFAULT NULL,
  `Lock_Time` varchar(10) DEFAULT NULL,
  `Lock_By` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Lock_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lock_ip
-- ----------------------------

-- ----------------------------
-- Table structure for `modules`
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `Module_ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `Module_Name` varchar(100) NOT NULL,
  `Module_Code` varchar(15) NOT NULL,
  `Summary` text NOT NULL,
  `Description` text NOT NULL,
  `Act` text NOT NULL,
  PRIMARY KEY (`Module_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO modules VALUES ('3', 'Tin t&#7913;c', 'news', '<li class=\"\"><a class=\"sf-with-ul\" href=\"?module=news\">Tin t&#7913;c</a>\r\n<ul style=\"display: none; visibility: hidden;\">							<li><a href=\"?module=news&a=news_add\">Th&ecirc;m tin t&#7913;c</a></li>					</ul></li>', '<li><a href=\"?module=news\"><b>Tin t&#7913;c</b></a>\r\n<ul>								<li><a href=\"?module=news&a=news_add\">Th&ecirc;m tin t&#7913;c</a></li>\r\n</ul></li>', '<li>\r\n<a href=\"?module=news\" title=\"Danh s&aacute;ch tin t&#7913;c\" class=\"tooltip\">						<img src=\"images/7_48x48.png\" alt=\"\">							<span>Danh s&aacute;ch tin t&#7913;c</span>\r\n</a>\r\n</li>\r\n<li>\r\n								<a href=\"?module=news&a=news_add\" title=\"Th&ecirc;m tin t&#7913;c\" class=\"tooltip\">\r\n									<img src=\"images/8_48x48.png\" alt=\"\">\r\n									<span>Th&ecirc;m tin t&#7913;c</span>\r\n								</a>\r\n							</li>');
INSERT INTO modules VALUES ('2', 'S&#7843;n ph&#7849;m', 'product', '<li class=\"\"><a class=\"sf-with-ul\" href=\"?module=product\">S&#7843;n ph&#7849;m</a>\r\n<ul style=\"display: none; visibility: hidden;\"><li><a href=\"?module=product&a=product_category_manager\">Danh m&#7909;c s&#7843;n ph&#7849;m</a></li>\r\n<li><a href=\"?module=product&a=product_category_add\">Th&ecirc;m danh m&#7909;c</a></li><li><a href=\"?module=product\">Danh s&aacute;ch s&#7843;n ph&#7849;m</a></li><li><a href=\"?module=product&a=product_add\">Th&ecirc;m s&#7843;n ph&#7849;m</a></li>\r\n<li><a href=\"?module=product&a=order_list\">Qu&#7843;n l&yacute; &#273;&#417;n h&agrave;ng</a></li>					</ul></li>', '<li><a href=\"?module=product\"><b>S&#7843;n ph&#7849;m</b></a>\r\n<ul><li><a href=\"?module=product&a=product_category_manager\">Danh m&#7909;c s&#7843;n ph&#7849;m</a></li>\r\n<li><a href=\"?module=product&a=product_category_add\">Th&ecirc;m danh m&#7909;c</a></li><li><a href=\"?module=product\">Danh s&aacute;ch s&#7843;n ph&#7849;m</a></li><li><a href=\"?module=product&a=product_add\">Th&ecirc;m s&#7843;n ph&#7849;m</a></li>\r\n<li><a href=\"?module=product&a=order_list\">Qu&#7843;n l&yacute; &#273;&#417;n h&agrave;ng</a></li>\r\n</ul></li>', '<li>\r\n<a href=\"?module=product\" title=\"Danh s&aacute;ch s&#7843;n ph&#7849;m\" class=\"tooltip\">						<img src=\"images/troubleshooter.png\" alt=\"\">							<span>Danh s&aacute;ch s&#7843;n ph&#7849;m</span>\r\n</a>\r\n</li>\r\n<li>\r\n								<a href=\"?module=product&a=product_add\" title=\"Th&ecirc;m s&#7843;n ph&#7849;m\" class=\"tooltip\">\r\n									<img src=\"images/Add-Folder-icon.png\" alt=\"\">\r\n									<span>Th&ecirc;m s&#7843;n ph&#7849;m</span>\r\n								</a>\r\n							</li>\r\n<li>\r\n								<a href=\"?module=product&a=order_list\" title=\"Qu&#7843;n l&yacute; &#273;&#417;n h&agrave;ng\" class=\"tooltip\">\r\n									<img src=\"images/insert_to_shopping_cart.gif\" alt=\"\">\r\n									<span>Qu&#7843;n l&yacute; &#273;&#417;n h&agrave;ng</span>\r\n								</a>\r\n							</li>		');
INSERT INTO modules VALUES ('4', 'Qu&#7843;ng c&aacute;o', 'ads', '<li><a href=\"?module=ads\">Qu&#7843;ng c&aacute;o</a>\r\n							<ul style=\"display: none; visibility: hidden;\">\r\n								<li><a href=\"?module=ads&a=ads_add\">Th&ecirc;m qu&#7843;ng c&aacute;o</a></li>\r\n							</ul>\r\n						</li>', '<li><a href=\"?module=ads\"><b>Qu&#7843;ng c&aacute;o</b></a>\r\n							<ul>\r\n								<li><a href=\"?module=ads&a=ads_add\">Th&ecirc;m qu&#7843;ng c&aacute;o</a></li>\r\n							</ul>\r\n						</li>', '<li>\r\n								<a href=\"?module=ads\" title=\"Danh s&aacute;ch qu&#7843;ng c&aacute;o\" class=\"tooltip\">\r\n									<img src=\"images/ads.png\" alt=\"\">\r\n									<span>Qu&#7843;ng c&aacute;o</span>\r\n								</a>\r\n							</li>\r\n							<li>\r\n								<a href=\"?module=ads&a=ads_add\" title=\"Th&ecirc;m qu&#7843;ng c&aacute;o\" class=\"tooltip\">\r\n									<img src=\"images/ads_add.png\" alt=\"\">\r\n									<span>Th&ecirc;m qu&#7843;ng c&aacute;o</span>\r\n								</a>\r\n							</li>');
INSERT INTO modules VALUES ('5', 'H&#7895; tr&#7907;', 'yahoo', '\r\n<li class=\"\"><a class=\"sf-with-ul\" href=\"?module=yahoo\">H&#7895; tr&#7907;</a>\r\n<ul style=\"display: none; visibility: hidden;\">							<li><a href=\"?module=yahoo&a=insert_yahoo\">Th&ecirc;m h&#7895; tr&#7907;</a></li>					</ul></li>', '<li><a href=\"?module=yahoo\"><b>H&#7895; tr&#7907;</b></a>\r\n<ul>								<li><a href=\"?module=yahoo&a=insert_yahoo\">Th&ecirc;m h&#7895; tr&#7907;</a></li>\r\n</ul></li>', '<li>\r\n<a href=\"?module=yahoo\" title=\"Danh s&aacute;ch h&#7895; tr&#7907;\" class=\"tooltip\">						<img src=\"images/support.gif\" alt=\"\">							<span>Danh s&aacute;ch h&#7895; tr&#7907;</span>\r\n</a>\r\n</li>\r\n<li>\r\n								<a href=\"?module=yahoo&a=insert_yahoo\" title=\"Th&ecirc;m h&#7895; tr&#7907;\" class=\"tooltip\">\r\n									<img src=\"images/VideoJoiner_icon.gif\" alt=\"\">\r\n									<span>Th&ecirc;m h&#7895; tr&#7907;</span>\r\n								</a>\r\n							</li>');
INSERT INTO modules VALUES ('11', 'Giá»›i thiá»‡u', 'information', '', '<li><a href=\"?module=information\"><b>Giá»›i thiá»‡u</b></a>\r\n<ul>								<li><a href=\"?module=information&a=iclist\">Danh má»¥c giá»›i thiá»‡u</a></li>\r\n<li><a href=\"?module=information&a=list\">Danh sÃ¡ch tin giá»›i thiá»‡u</a></li>\r\n<li><a href=\"?module=information&a=add\">ThÃªm tin giá»›i thiá»‡u</a></li>\r\n</ul></li>', '');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `News_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Summary` mediumtext NOT NULL,
  `Description` mediumtext NOT NULL,
  `Title_EN` varchar(255) NOT NULL,
  `Summary_EN` mediumtext NOT NULL,
  `Description_EN` mediumtext NOT NULL,
  `Image_Name` varchar(100) NOT NULL,
  `Source` varchar(100) NOT NULL,
  `Hot` tinyint(1) NOT NULL,
  `Views` smallint(4) NOT NULL,
  `Create_By` tinyint(1) NOT NULL,
  `Create_Time` int(10) NOT NULL,
  `Update_By` tinyint(1) NOT NULL,
  `Update_Time` int(10) NOT NULL,
  PRIMARY KEY (`News_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO news VALUES ('1', 'Test tiÃªu Ä‘á» 1', 'Test tÃ³m táº¯t 1', '<p>\r\n	Test chi tiáº¿t 1</p>\r\n', '', '', '', 'zMPimg2.jpg', 'Cua tui 1', '0', '2', '1', '1324370837', '1', '1330274776');
INSERT INTO news VALUES ('2', 'Test láº§n 2', 'Tom tat noi dung lan 2', '<p>\r\n	Chi tiet noi dung lan 2</p>\r\n', 'De Finibus Bonorum et Malorum', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '<p>\r\n	<span style=\"color: rgb(0, 0, 0); font-family: Arial,Helvetica,sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; display: inline ! important; float: none;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </span><span style=\"color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none; \">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</span></p>\r\n<p>\r\n	<span style=\"color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none; \">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</span></p>\r\n<p>\r\n	<span style=\"color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none; \">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</span></p>\r\n<p>\r\n	<span style=\"color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none; \">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</span></p>\r\n<p>\r\n	<span style=\"color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none; \">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</span></p>\r\n', 'ML9img1.jpg', 'Cá»§a tui Ä‘Ã³', '0', '17', '1', '1324372142', '1', '1348733645');
INSERT INTO news VALUES ('4', 'Barca táº¡i La Liga: Cá»­a tháº¯ng rá»™ng má»Ÿ? ', 'CÃ¡c cáº§u thá»§ Barca chÆ°a háº¿t hy vá»ng báº£o vá»‡ chá»©c vÃ´ Ä‘á»‹ch La Liga mÃ¹a nÃ y.', '<p>\r\n	Sau chiáº¿n tháº¯ng kh&oacute; nhá»c tr&ecirc;n s&acirc;n Vicente Calderon cá»§a Atletico táº¡i v&ograve;ng 24, c&aacute;c cáº§u thá»§ Barca váº«n duy tr&igrave; Ä‘Æ°á»£c khoáº£ng c&aacute;ch &iacute;t hÆ¡n 10 Ä‘iá»ƒm so vá»›i Real táº¡i giáº£i Ä‘áº¥u cao nháº¥t xá»© b&ograve; t&oacute;t. R&otilde; r&agrave;ng vá»›i 3 Ä‘iá»ƒm c&oacute; Ä‘Æ°á»£c cuá»‘i tuáº§n qua, tháº§y tr&ograve; HLV Guardiola váº«n c&ograve;n hy vá»ng báº£o vá»‡ danh hiá»‡u v&ocirc; Ä‘á»‹ch sau m&ugrave;a giáº£i nÄƒm nay.</p>\r\n<p style=\"text-align: center;\">\r\n	<em style=\"color: rgb(0, 0, 255);\">Lá»‹ch thi Ä‘áº¥u Ä‘ang á»§ng há»™ Barca</em></p>\r\n<p>\r\n	Bá»Ÿi t&iacute;nh ri&ecirc;ng á»Ÿ 14 tráº­n Ä‘áº¥u c&ograve;n láº¡i táº¡i La Liga, c&aacute;c cáº§u thá»§ <strong>Barca sáº½ tráº£i qua má»™t lá»‹ch thi Ä‘áº¥u v&ocirc; c&ugrave;ng thuáº­n lá»£i</strong>. Ngo&agrave;i 7 tráº­n Ä‘áº¥u tr&ecirc;n s&acirc;n nh&agrave; Nou Camp, nÆ¡i Barca Ä‘ang thá»ƒ hiá»‡n sá»©c máº¡nh tuyá»‡t Ä‘á»‘i vá»›i 50 b&agrave;n tháº¯ng, 4 b&agrave;n thua c&ugrave;ng 34/36 Ä‘iá»ƒm tá»‘i Ä‘a, tháº§y tr&ograve; HLV Guardiola cÅ©ng chá»‰ c&ograve;n 1 tráº­n Ä‘áº¥u kh&oacute; khÄƒn tr&ecirc;n s&acirc;n kh&aacute;ch. Ngo&agrave;i chuyáº¿n h&agrave;nh qu&acirc;n Sevilla á»Ÿ v&ograve;ng 27, nhá»¯ng Ä‘á»‘i thá»§ c&ograve;n láº¡i á»Ÿ c&aacute;c tráº­n Ä‘áº¥u xa nh&agrave; nhÆ° Santander, Mallorca, Zaragoza, Levante, Rayo Vallecano, Betis Ä‘á»u kh&ocirc;ng pháº£i l&agrave; Ä‘á»‘i thá»§ cá»§a &ldquo;g&atilde; khá»•ng lá»“&rdquo; xá»© Catalan trong giai Ä‘oáº¡n nÆ°á»›c r&uacute;t tá»›i Ä‘&acirc;y.</p>\r\n<p>\r\n	Trong khi Ä‘&oacute; vá»›i Real, chÆ°a ká»ƒ nhá»¯ng tráº­n Ä‘áº¥u kh&oacute; khÄƒn tr&ecirc;n s&acirc;n nh&agrave; tiáº¿p Ä‘&oacute;n Valencia, Malaga, Sevilla&hellip; á»Ÿ 7 chuyáº¿n l&agrave;m kh&aacute;ch c&ograve;n láº¡i, tháº§y tr&ograve; HLV Mourinho sáº½ váº¥p pháº£i kh&ocirc;ng &iacute;t th&aacute;ch thá»©c. Vá»›i li&ecirc;n tiáº¿p nhá»¯ng tráº­n Ä‘áº¥u kh&oacute; tr&ecirc;n s&acirc;n Villarreal, Osasuna, Atletico Madrid trÆ°á»›c khi pháº£i l&agrave;m kh&aacute;ch táº¡i Nou Camp cá»§a Barca trong tráº­n cáº§u &ldquo;6 Ä‘iá»ƒm&rdquo;. Tháº­m ch&iacute; sau Ä‘&oacute;, Ä‘á»™i b&oacute;ng Ho&agrave;ng gia c&ograve;n pháº£i h&agrave;nh qu&acirc;n tá»›i San Mames Ä‘á»ƒ Ä‘á»‘i Ä‘áº§u Bilbao Ä‘ang thÄƒng hoa dÆ°á»›i b&agrave;n tay HLV Marcelo Bielsa. Ch&iacute;nh v&igrave; váº­y c&oacute; thá»ƒ kháº³ng Ä‘á»‹nh lá»‹ch thi Ä‘áº¥u trong pháº§n c&ograve;n láº¡i cá»§a m&ugrave;a giáº£i sáº½ táº¡o Ä‘iá»u kiá»‡n gi&uacute;p Barca láº­t ngÆ°á»£c t&igrave;nh tháº¿ trÆ°á»›c sá»©c máº¡nh khá»§ng khiáº¿p c&ugrave;ng lá»£i tháº¿ dáº«n &nbsp;10 Ä‘iá»ƒm cá»§a Real táº¡i La Liga hiá»‡n nay.</p>\r\n<p>\r\n	Thá»±c táº¿, d&ugrave; lá»‹ch thi Ä‘áº¥u Ä‘ang á»§ng há»™ c&aacute;c cáº§u thá»§ Barca, nhÆ°ng Ä‘á»ƒ c&oacute; thá»ƒ táº¡o ra cuá»™c lá»™i ngÆ°á»£c d&ograve;ng thá»© 3 trong lá»‹ch sá»­ giá»‘ng nhÆ° á»Ÿ m&ugrave;a giáº£i 1991/1992 cÅ©ng nhÆ° 1993/1994, Ä‘o&agrave;n qu&acirc;n cá»§a Guardiola váº«n c&ograve;n ráº¥t nhiá»u viá»‡c pháº£i l&agrave;m. Ngo&agrave;i viá»‡c táº­n dá»¥ng tá»‘i Ä‘a cÆ¡ há»™i á»Ÿ tráº­n &ldquo;si&ecirc;u kinh Ä‘iá»ƒn&rdquo; táº¡i Nou Camp tiáº¿p Ä‘&oacute;n Real nháº±m thu háº¹p khoáº£ng c&aacute;ch xuá»‘ng c&ograve;n 7 Ä‘iá»ƒm, Barca cÅ©ng kh&ocirc;ng Ä‘Æ°á»£c ph&eacute;p Ä‘á»ƒ máº¥t th&ecirc;m nhá»¯ng Ä‘iá»ƒm sá»‘ Ä‘&aacute;ng tiáº¿c á»Ÿ c&aacute;c tráº­n Ä‘áº¥u c&ograve;n láº¡i. B&ecirc;n cáº¡nh Ä‘&oacute;, &ldquo;g&atilde; khá»•ng lá»“&rdquo; xá»© Catalan cÅ©ng cáº§n Ä‘á»£i chá» nhá»¯ng Ä‘iá»u ká»³ diá»‡u tá»« lá»‹ch thi Ä‘áº¥u khá»‘c liá»‡t cá»§a Ä‘á»™i b&oacute;ng Ho&agrave;ng gia T&acirc;y Ban Nha.</p>\r\n<p style=\"text-align: center;\">\r\n	<em style=\"color: rgb(0, 0, 255);\">Cáº§n pháº£i gi&agrave;nh 3 Ä‘iá»ƒm trÆ°á»›c Real á»Ÿ tráº­n El Clasico tr&ecirc;n s&acirc;n Nou Camp</em></p>\r\n<p>\r\n	Kh&ocirc;ng chá»‰ c&oacute; lá»‹ch thi Ä‘áº¥u thuáº­n lá»£i, c&aacute;c cáº§u thá»§ Barca cÅ©ng Ä‘ang c&oacute; lá»£i tháº¿ kh&aacute; lá»›n vá» máº·t nh&acirc;n sá»±. Ngo&agrave;i sá»± trá»Ÿ láº¡i cá»§a nhá»¯ng Xavi, Iniesta á»Ÿ h&agrave;ng tiá»n vá»‡, tr&ecirc;n h&agrave;ng táº¥n c&ocirc;ng HLV Guardiola cÅ©ng chá»‰ duy nháº¥t kh&ocirc;ng c&oacute; sá»± g&oacute;p máº·t cá»§a David Villa trong pháº§n c&ograve;n láº¡i cá»§a m&ugrave;a giáº£i. Tháº­m ch&iacute;, ph&iacute;a trÆ°á»›c khung th&agrave;nh cá»§a Valdes, nhá»¯ng Busquets, Pique, Adriano cÅ©ng Ä‘&atilde; trá»Ÿ láº¡i sau má»™t sá»‘ tráº­n kh&ocirc;ng thi Ä‘áº¥u gáº§n Ä‘&acirc;y.</p>\r\n<p>\r\n	Ngo&agrave;i ra, sau tráº­n giao há»¯u c&ugrave;ng ÄT Argentina, ch&acirc;n s&uacute;t Messi cÅ©ng sáº½ c&oacute; th&ecirc;m thá»i gian nghá»‰ ngÆ¡i Ä‘á»ƒ c&oacute; Ä‘Æ°á»£c thá»ƒ lá»±c sung m&atilde;n nháº¥t trÆ°á»›c khi bÆ°á»›c v&agrave;o cháº·ng Ä‘Æ°á»ng quyáº¿t Ä‘á»‹nh táº¡i La Liga. Bá»Ÿi á»Ÿ tráº­n Ä‘áº¥u tiáº¿p Ä‘&oacute;n Sporting Gijon tr&ecirc;n s&acirc;n Nou Camp Ä‘áº§u th&aacute;ng 3, sá»‘ 10 sáº½ kh&ocirc;ng thi Ä‘áº¥u do Ä‘&atilde; nháº­n Ä‘á»§ 5 tháº» pháº¡t táº¡i La Liga. V&agrave; Ä‘&oacute; thá»±c sá»± l&agrave; cÆ¡ há»™i Ä‘á»ƒ Messi nghá»‰ ngÆ¡i trÆ°á»›c khi gi&uacute;p Ä‘á»™i b&oacute;ng táº¡o ra m&agrave;n nÆ°á»›c r&uacute;t ngoáº¡n má»¥c trÆ°á»›c sá»©c máº¡nh cá»§a &quot;ká»n ká»n tráº¯ng&quot;.</p>\r\n', 'De Finibus Bonorum et Malorum', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', '<p>\r\n	<span style=\"color: rgb(0, 0, 0); font-family: Arial,Helvetica,sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; display: inline ! important; float: none;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </span><span style=\"color: rgb(0, 0, 0); font-family: Arial,Helvetica,sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; display: inline ! important; float: none;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </span><span style=\"color: rgb(0, 0, 0); font-family: Arial,Helvetica,sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; display: inline ! important; float: none;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </span><span style=\"color: rgb(0, 0, 0); font-family: Arial,Helvetica,sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; display: inline ! important; float: none;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</span><span style=\"color: rgb(0, 0, 0); font-family: Arial,Helvetica,sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; display: inline ! important; float: none;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </span><span style=\"color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 14px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none; \">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</span></p>\r\n', 'BEI1330544859.jpg', '24h.com.vn', '0', '35', '1', '1330574567', '1', '1397234973');
INSERT INTO news VALUES ('8', 'Há»•ng vui tÃ­ nÃ o nah', 'MÃ´ táº£ nÃ¨', '<p>\r\n	Chi tiáº¿t n&egrave;</p>\r\n', 'Not funny', 'Summary nÃ¨', '<p>\r\n	Detail</p>\r\n', 'AyXb2d00b907f76df3bd1b8022aad9feecd.jpg', 'abc', '0', '2', '1', '1397234890', '1', '1397234890');

-- ----------------------------
-- Table structure for `order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Full_Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Requirement` tinytext NOT NULL,
  `Description` text NOT NULL,
  `Method` tinyint(1) NOT NULL,
  `Create_Time` int(10) NOT NULL,
  `Receipt` varchar(255) NOT NULL,
  `Update_By` tinyint(1) NOT NULL,
  `Update_Time` int(10) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Pay_Type` tinyint(1) DEFAULT NULL,
  `Payment_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Order_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_detail
-- ----------------------------
INSERT INTO order_detail VALUES ('12', 'Tui ne', 'noi tinh yeu bat dau', '0987654321', 'tuine@yahoo.com', '', '|NÆ°á»›c máº¯m PhÃº Quá»‘c 1_N1_120.000_1_120.000', '0', '1373876016', '--', '0', '1389154991', '1', '2', null);
INSERT INTO order_detail VALUES ('13', 'ha', 'o day ne', '0908472682', 'odayne@nonono.com', 'roi ec ec ec', '|NÆ°á»›c máº¯m PhÃº Quá»‘c 1_N1_120.000_9_1.080.000', '0', '1373958995', '--', '0', '1373958995', '0', '2', null);
INSERT INTO order_detail VALUES ('15', 'Cao Thu Ne 2', 'U Danh Coc 2', '0908070605', 'udanh2@coc.com', '', '|NÆ°á»›c máº¯m PhÃº Quá»‘c 1_N1_120.000_1_120.000', '0', '1378265226', '--', '0', '1378265226', '0', '2', null);
INSERT INTO order_detail VALUES ('16', 'Cao Thu Ne 3', 'U Danh Coc 3', '0908070605', 'udanh3@coc.com', 'dsfs', '|NÆ°á»›c máº¯m PhÃº Quá»‘c 1_N1_120.000_1_120.000', '0', '1378265794', '--', '0', '1378265794', '0', '2', null);

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category_ID` tinyint(1) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Product_Name_EN` varchar(255) NOT NULL,
  `Product_Name_Search` varchar(255) NOT NULL,
  `Product_Code` varchar(20) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Description_EN` mediumtext NOT NULL,
  `Image_Name` varchar(100) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Hot` tinyint(1) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `Price_EN` varchar(20) NOT NULL,
  `Create_By` tinyint(1) NOT NULL,
  `Create_Time` int(10) NOT NULL,
  `Update_By` tinyint(1) NOT NULL,
  `Update_Time` int(10) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO product VALUES ('21', '1', 'Muá»‘i 1', 'Salt 1', 'muoi_1', 'S1', '<p>\r\n	Muá»‘i ngon loáº¡i sá»‘ 1</p>\r\n', '<p>\r\n	Salt 1 is the best salt</p>\r\n', 'JVk4888118721_4312a93987.jpg', '1', '1', '210000', '10', '1', '1348108532', '1', '1395635388');
INSERT INTO product VALUES ('22', '5', 'NÆ°á»›c máº¯m PhÃº Quá»‘c 1', 'Phu Quocâ€™s Fishsause 1', 'nuoc_mam_phu_quoc_1', 'N1', '<p>\r\n	NÆ°á»›c máº¯m Ph&uacute; Quá»‘c 1</p>\r\n', '<p>\r\n	Phu Quoc&#39;s fishsause 1</p>\r\n', 'i3EPenguins.jpg', '1', '1', '120000', '7', '1', '1348109580', '1', '1378277072');
INSERT INTO product VALUES ('23', '1', 'Muá»‘i 2', 'Salt 2', 'muoi_2', 'M2', '<p>\r\n	Muoi loai 2</p>\r\n', '<p>\r\n	Salt 2</p>\r\n', 'RBAHydrangeas.jpg', '1', '1', '160000', '8', '1', '1348214939', '1', '1378277062');

-- ----------------------------
-- Table structure for `product_category`
-- ----------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE `product_category` (
  `Category_ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(255) NOT NULL,
  `Category_Name_EN` varchar(255) NOT NULL,
  `Parent_ID` tinyint(1) NOT NULL,
  `Information_ProductCat` int(10) DEFAULT NULL,
  `Create_By` tinyint(1) NOT NULL,
  `Create_Time` int(10) NOT NULL,
  `Update_By` tinyint(1) NOT NULL,
  `Update_Time` int(10) NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_category
-- ----------------------------
INSERT INTO product_category VALUES ('1', 'Muá»‘i PhÃº Quá»‘c', 'Phu Quoc Salt', '0', '3', '1', '1330259856', '1', '1397749843');
INSERT INTO product_category VALUES ('5', 'NÆ°á»›c máº¯m PhÃº Quá»‘c', 'Phu Quoc Fishsauce', '0', '5', '1', '1330259969', '1', '1397749909');
INSERT INTO product_category VALUES ('12', 'Test 1', 'test 1', '1', '1', '1', '1395908032', '1', '1395908032');
INSERT INTO product_category VALUES ('13', 'ChÃ³ PhÃº Quá»‘c', 'Phu Quoc Dog', '0', '1', '1', '1397236762', '1', '1397236762');

-- ----------------------------
-- Table structure for `product_comment`
-- ----------------------------
DROP TABLE IF EXISTS `product_comment`;
CREATE TABLE `product_comment` (
  `Comment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_ID` int(11) NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Description` tinytext NOT NULL,
  `Comment_Status` tinyint(1) NOT NULL,
  `Create_Time` int(10) NOT NULL,
  PRIMARY KEY (`Comment_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_comment
-- ----------------------------
INSERT INTO product_comment VALUES ('5', '2', 'Test 1', 'test1@yahoo.com', 'Test lan 1', '2', '1330420322');
INSERT INTO product_comment VALUES ('4', '2', 'Test', 'test@yahoo.com', 'Test noi dung comment san pham', '1', '1330420216');
INSERT INTO product_comment VALUES ('6', '18', 'Nguyá»…n LÃª ÄÃ¬nh QuÃ½', 'nguyenledinhquy1983@yahoo.com', 'Good', '1', '1330587326');
INSERT INTO product_comment VALUES ('7', '20', 'nguyen le dinh quy', 'nguyen@yahoo.com', 'ASDFSD DF SF SFS  SDF', '1', '1330590278');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `Roles_ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `Admin_ID` tinyint(1) NOT NULL,
  `Module_ID` tinyint(1) NOT NULL,
  PRIMARY KEY (`Roles_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO roles VALUES ('21', '7', '1');
INSERT INTO roles VALUES ('26', '7', '3');

-- ----------------------------
-- Table structure for `shopping`
-- ----------------------------
DROP TABLE IF EXISTS `shopping`;
CREATE TABLE `shopping` (
  `Shopping_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Session` varchar(255) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Amount` smallint(4) NOT NULL,
  `Create_Time` int(10) NOT NULL,
  PRIMARY KEY (`Shopping_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shopping
-- ----------------------------
INSERT INTO shopping VALUES ('180', 'b3f6a8ed7712901b51bf94a18394a60f', '20', '2', '1330590973');
INSERT INTO shopping VALUES ('181', 'b3f6a8ed7712901b51bf94a18394a60f', '19', '1', '1330590983');
INSERT INTO shopping VALUES ('182', '8edc00625d7e16601de6e652cc5b2227', '8', '0', '1345437661');
INSERT INTO shopping VALUES ('183', 'vdk4dacflv21fe0c1qav7jggm4', '22', '10', '1369800965');
INSERT INTO shopping VALUES ('184', 'o57r2dnislffj8tn8j71oevfg5', '23', '3', '1369800980');
INSERT INTO shopping VALUES ('185', 'o57r2dnislffj8tn8j71oevfg5', '22', '18', '1369801825');
INSERT INTO shopping VALUES ('186', 'hs5jvcca5jl1dse2ockuuvljb1', '22', '1', '1369972282');
INSERT INTO shopping VALUES ('187', 'hs5jvcca5jl1dse2ockuuvljb1', '23', '5', '1369972784');
INSERT INTO shopping VALUES ('188', '5rnpe6oj6f9ddej14kv0jm6tq3', '23', '1', '1370059077');
INSERT INTO shopping VALUES ('189', 's4846bvubab4n7fihltd8o4hn5', '22', '1', '1370243824');
INSERT INTO shopping VALUES ('190', 's4846bvubab4n7fihltd8o4hn5', '21', '3', '1370247303');
INSERT INTO shopping VALUES ('194', 'ocddg7nf9l3b0dj2ch9r8k1uq2', '22', '1', '1370932256');
INSERT INTO shopping VALUES ('193', '6ei4vvhqtem0lj4es6t1qo60p6', '23', '2', '1370320359');
INSERT INTO shopping VALUES ('195', 'eclsupaa9633ousfprge7etfq5', '23', '2', '1371180269');
INSERT INTO shopping VALUES ('196', 'eclsupaa9633ousfprge7etfq5', '22', '1', '1371180290');
INSERT INTO shopping VALUES ('202', '4qfpj8sjbr0r8pslmdeephls50', '23', '5', '1373524726');
INSERT INTO shopping VALUES ('201', '4qfpj8sjbr0r8pslmdeephls50', '22', '2', '1373524720');
INSERT INTO shopping VALUES ('210', 'psgjgtlv2an05hdu95amqoq4k0', '23', '5', '1395633284');

-- ----------------------------
-- Table structure for `statistics`
-- ----------------------------
DROP TABLE IF EXISTS `statistics`;
CREATE TABLE `statistics` (
  `online` varchar(255) NOT NULL,
  `clients` varchar(255) NOT NULL,
  `hits` mediumint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of statistics
-- ----------------------------
INSERT INTO statistics VALUES ('client', '115.78.226.76:1315886881', '2495');

-- ----------------------------
-- Table structure for `web_link`
-- ----------------------------
DROP TABLE IF EXISTS `web_link`;
CREATE TABLE `web_link` (
  `Link_ID` tinyint(1) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `Image_Name` varchar(100) NOT NULL,
  `Position` tinyint(1) NOT NULL,
  `Create_By` tinyint(1) NOT NULL,
  `Create_Time` int(10) NOT NULL,
  `Update_By` tinyint(1) NOT NULL,
  `Update_Time` int(10) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  PRIMARY KEY (`Link_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_link
-- ----------------------------
INSERT INTO web_link VALUES ('20', 'Chorparde', 'http://dantri.com.vn', 'Lgzlogo2.jpg', '1', '1', '1330271535', '1', '1330271535', '1');
INSERT INTO web_link VALUES ('21', 'Dunhill', 'http://dantri.com.vn', 'x3slogo3.jpg', '1', '1', '1330271586', '1', '1330271586', '1');
INSERT INTO web_link VALUES ('19', 'Cartier', 'http://dantri.com.vn', 'lgzlogo1.jpg', '1', '1', '1330271418', '1', '1330271486', '1');
INSERT INTO web_link VALUES ('22', 'Rolex', 'http://dantri.com.vn', 'igVlogo4.jpg', '1', '1', '1330271609', '1', '1330271609', '1');
INSERT INTO web_link VALUES ('23', 'Monte Blanc', 'http://dantri.com.vn', 'JZslogo5.jpg', '1', '1', '1330271638', '1', '1330271638', '1');
INSERT INTO web_link VALUES ('24', 'Climbing', 'http://dantri.com.vn', 'oVtbanner2.jpg', '2', '1', '1330275035', '1', '1330275064', '1');

-- ----------------------------
-- Table structure for `yahoo`
-- ----------------------------
DROP TABLE IF EXISTS `yahoo`;
CREATE TABLE `yahoo` (
  `Yahoo_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nick` varchar(100) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  PRIMARY KEY (`Yahoo_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of yahoo
-- ----------------------------
INSERT INTO yahoo VALUES ('4', 'nguyenledinhquy1983', 'Nguyá»…n LÃª ÄÃ¬nh QuÃ½ - Ká»¹ thuáº­t');

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-06-15 20:41:37
-- 服务器版本： 5.7.13-log
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unionservice`
--

-- --------------------------------------------------------

--
-- 表的结构 `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language` char(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'zh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `language`) VALUES
(1, '关于我们', '<div class="text">\r\n                            <p>润通航运服务有限公司成立于1993年，专业从事船舶物资供应、食品/邮轮供应、备件供应、船舶安全检测服务、航修服务、海工服务、出口贸易、国际产品代理和售后服务、物流以及船舶总代等多种专业的一站式船舶服务。</p>\r\n                            <p>经过20多年的发展，润通现拥有海内外共9个分公司，分别位于上海（总部）、秦皇岛、大连、天津、青岛、舟山/宁波、广州/深圳, 韩国以及新加坡；480余名高度敬业的员工队伍，总计22,000m²自有库存、现代化的信息管理系统、快速备货系统和专业的操作人员，50名以上的服务工程师，精英的销售采购和运营团队等，可在最快的时间内提供准确合理的报价，并将船舶物资，备件和安全，修理服务等及时提供上船。</p>\r\n                            <p>自1998年加入ISSA《国际船舶供应协会》到2003加入IMPA《国际海事购买协会》，一直到2014年RMS作为国际品牌的供应商代表被选为IMPA的常任理事单位，RMS（润通航运服务有限公司）秉承国际化的标准，严格规范和提升我们的服务质量和水平，我们于2007年取得ISO9001质量认证，于2010年即获得ISO14001环境管理体系认证，并与2016年获得ISO22000食品安全管理体系认证，RMS坚信品牌来自于可靠的质量和持续提升的服务能力。</p>\r\n                        </div>\r\n', 'zh'),
(2, '联系我们', '<h3>秦皇岛分公司：</h3>\r\n                            <table border="0" cellspacing="0" cellpadding="0">\r\n                                <tr>\r\n                                    <td class="td1"></td>\r\n                                    <td>润通航运服务有限公司 秦皇岛分公司</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td class="td1">地址</td>\r\n                                    <td>中国河北秦皇岛市开发区雪山路12号</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td class="td1">邮编</td>\r\n                                    <td>066004</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td class="td1">电话</td>\r\n                                    <td>+86-335-5910190</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td class="td1">传真</td>\r\n                                    <td>+86-335-8500886</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td class="td1">手机</td>\r\n                                    <td>+86-13933591006</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td class="td1">服务港口</td>\r\n                                    <td>秦皇岛、山海关、曹妃甸、京唐、锦州、葫芦岛</td>\r\n                                </tr>\r\n                            </table>\r\n', 'zh'),
(3, '加入我们', '', 'zh'),
(4, 'About us', '', 'en');

-- --------------------------------------------------------

--
-- 表的结构 `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `profile` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `profile`) VALUES
(1, 'wsl', 'Csbtbl-kXB8ZNGWJq_uSLZ7jg58-2cwA', '$2y$13$mOksaAuYQquySCEfsjIFgu0sM8Vm9A9rMD8jsJx7MNqDFh9SZx3NW', NULL, 'weixi@weixistyle.com', 10, 1462597929, 1497170316, '系统管理员.'),
(2, 'zz', 'xqGDBMlylihvNddSQgDkjAdpJwV4d02C', '$2y$13$64G3tOzyJefZQKBNIavT0.Qxd1BwmITv7S1c/vA5OMc6gz6j2GInC', NULL, 'mchael@163.com', 10, 1475850924, 1497183742, ''),
(4, 'root', 'a1mm9FTMzATgMBO2AbOG2071fGGqhCGM', '$2y$13$LWIpAWlU.THf3lI8f/bhQOJQMDjco5WkJBOIY23tGHEYPfv/4VfXK', NULL, '4654644@qq.c', 0, 1497161267, 1497168437, '46546');

-- --------------------------------------------------------

--
-- 表的结构 `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img_url` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img_text` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_link` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '图片点击链接'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text NOT NULL,
  `language` varchar(8) NOT NULL COMMENT 'zh:中文;en:英文'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `business`
--

INSERT INTO `business` (`id`, `name`, `content`, `language`) VALUES
(1, '航修', '\n                     <p style="line-height: 2em; margin-bottom: 5px; margin-top: 5px;"><span style="font-family: 宋体, SimSun; font-size: 12px; line-height: 2em;">为了解决机务对于航行船舶故障的紧急修理需求，RMS的航修事业部秉承公司的一切为客户着想的理念，致力于提供高效快速优质的一站式船舶修理服务解决方案。</span></p><p style="line-height: 2em; margin-bottom: 5px; margin-top: 5px;"><strong><span style="font-size: 12px; font-family: 宋体, SimSun;">RMS航修事业部可为您提供全天候24小时的快速响应和周到专业的修理服务，整合了国内的优质渠道和资源，结合了每个领域的专家的技术实力，可以帮助客户协调和解决船舶修理服务包括：</span></strong></p><p style="line-height: 2em; margin-bottom: 5px; margin-top: 5px;"><strong><span style="font-size: 12px; font-family: 宋体, SimSun;"></span></strong></p><ul class=" list-paddingleft-2" style="width: 785.641px; white-space: normal;"><li><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 2em;"><strong>大修和翻新服务</strong><br/></p></li></ul><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">-主辅机/增压器/调速器大修服务<strong style="line-height: 32px; white-space: normal;"><span style="font-size: 12px; font-family: 宋体, SimSun;"><strong><strong><strong style="text-indent: 32px;"><strong style="text-align: right; font-family: arial, helvetica, sans-serif; font-size: 18px;"><img src="http://www.rmsmarineservice.com/ueditor/net/upload/image/20150313/6356183350059179693785094.png" title="blob.png" alt="blob.png" style="float: right;"/></strong></strong></strong></strong></span></strong></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">-柴油机零部件翻新，比如铸铁钢头、汽缸盖、镍基不锈钢阀杆和阀座、铝合金活塞</p><ul class=" list-paddingleft-2" style="width: 785.641px; white-space: normal;"><li><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px;"><strong>常规修理</strong></p></li></ul><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;"><strong>-甲板</strong></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">钢结构焊接</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">克令吊吊重试验</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">锚和锚链换新</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">更换船名</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">油水分离器和排油监控系统年检</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal;"><br/></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;"><strong>-机舱</strong></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">管路换新</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">马达重绕</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">主机遥控系统</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">机舱监控报警系统</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">换热器换管</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">锅炉和焚烧器修理</p><p style="line-height: 2em; margin-bottom: 5px; margin-top: 5px;"><strong><span style="font-size: 12px; font-family: 宋体, SimSun;"></span></strong></p><ul class=" list-paddingleft-2" style="width: 785.641px; white-space: normal;"><li><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px;"><strong>船舶通讯和导航设备</strong></p></li></ul><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">-通讯导航设备安装</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">-通讯导航设备修理</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">-无线电年检</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">-航行记录仪年检</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">-电罗经年检</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">-磁罗经年检</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">-岸基证书申请服务</p><ul class=" list-paddingleft-2" style="width: 785.641px; white-space: normal;"><li><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px;"><strong>液压和克令吊服务</strong></p></li><li><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px;"><strong>制冷服务</strong></p></li></ul><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">-生活区空调&nbsp;</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">-集控室空调</p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; white-space: normal; text-indent: 2em;">-冰机制冷系统</p><ul class=" list-paddingleft-2" style="width: 785.641px; white-space: normal;"><li><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px;"><strong>11家船级社认可的水下清洁和拍照、录像检查</strong></p></li><li><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px;"><strong>康明斯售后服务合作伙伴</strong></p></li></ul><p style="line-height: 2em; margin-bottom: 5px; margin-top: 5px;"><span style="font-family: 宋体, SimSun; font-size: 12px; line-height: 2em;">电邮：engineering@rmsmarineservice.com</span><strong><span style="font-size: 12px; font-family: 宋体, SimSun;"><br/></span></strong></p><p style="line-height: 2em; margin-bottom: 5px; margin-top: 5px;"><span style="font-size: 12px; font-family: 宋体, SimSun;">电话：</span>+86-18221398748</p><p><strong style="line-height: 32px; white-space: normal;"><span style="font-size: 12px; font-family: 宋体, SimSun;"><strong><strong><strong style="text-indent: 32px;"><strong style="text-align: right; font-family: arial, helvetica, sans-serif; font-size: 18px;"><br/></strong></strong></strong></strong></span></strong></p>\n', 'zh'),
(2, '坞修', '', 'zh'),
(3, '维护保养', '', 'zh'),
(4, '备件', '                       <p><span style="font-size: 12px;"><span style="font-family: 宋体;">润通备件部</span>2008<span style="font-family: 宋体;">年成立于上海总部，专业提供原厂船舶备件，多年的经验以及品牌的维护得以使我们的质量以及价格在国际市场有很强的竞争力。润通专业提供国内厂家的一手原产件和国外著名厂家在国内的授权生产件。除了优惠的价格和最周到的服务，我们的网络服务和物流团队可以把备件及时送达到您指定的世界主要港口和目的地。</span></span></p><p><span style="font-family: 宋体; font-size: 12px;">随着韩国、新加坡分公司的成立，以及与日本专业备件厂商的合作，我司可提供中、日、韩三国的优势备件。</span></p><p><span style="font-family: 宋体; font-size: 12px;"></span></p><p><span style="font-size: 14px;"><strong style="font-size: 12px;"><span style="font-family: 宋体;">船舶备件供应范围：</span></strong></span><img src="http://www.rmsmarineservice.com/ueditor/net/upload/image/20160202/6359001098484396424055254.png" title="blob.png" alt="blob.png" style="white-space: normal; float: right;"/><span style="font-size: 14px;"><strong style="font-size: 12px;"><span style="font-family: 宋体;"></span></strong></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">主机、辅机</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">增压器</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">空压机</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">辅助鼓风机</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">泵</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">锅炉</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">焚烧炉</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">造水机</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">油水分离器</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">生活污水处理装置</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span>15ppm<span style="font-size: 12px; font-family: 宋体;">报警单元</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">供油单元</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">分油机</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">制冷和空调</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">热交换器</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">厨房设备</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">电机</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">甲板克令吊、抓斗</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">锚绞机</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">舱盖</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">舷梯及绞车</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">救生设备</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">舵机</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">高分子舵承衬套</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">阀</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">防海生物</span>/<span style="font-size: 12px; font-family: 宋体;">外加电流阴极保护</span>/<span style="font-size: 12px; font-family: 宋体;">防污</span>/<span style="font-size: 12px; font-family: 宋体;">轴接地</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">消防探头</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">通导设备</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">大舱进水报警</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">电气和自动化</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">喷油器试验台</span></span></p><p class="MsoListParagraph" style="margin-left:28px"><span style="font-size: 12px;"><span style="font-size: 12px; font-family: Wingdings;">l<span style="font-stretch: normal; font-size: 9px; font-family: &#39;Times New Roman&#39;;">&nbsp; </span></span><span style="font-size: 12px; font-family: 宋体;">膨胀节、液压软管、化工软管</span></span></p><p><span style="font-size: 12px;">电邮: spare@rmsmarineservice.com</span></p>', 'zh'),
(5, '建筑业', '', 'zh'),
(6, 'Voyage Repair', '789555555', 'en'),
(7, 'Dock Repair', '', 'en'),
(8, 'Maintenance', '', 'en'),
(9, 'Spare Parts', '', 'en'),
(10, 'Construction Business\n', '', 'en');

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1494668844),
('m130524_201442_init', 1494668856);

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'zh' COMMENT 'zh:中文;en:英文',
  `author` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0:未发布,1:已发布'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `language`, `author`, `create_time`, `update_time`, `status`) VALUES
(1, '深创投荣获“2016中国最佳创业投资机构”等多项荣誉', '地方撒放大萨芬的范德萨范德萨发达dsaf暗示法我确认而我却而温润群', 'zh', 'qwe', 1495259312, 1495259312, 1),
(2, '深创投资集团党委召开领导班子民主生活会', '地方撒放大萨芬的范德萨范德萨发达dsaf暗示法我确认而我却而温润群', 'zh', 'qwe', 1495259312, 1495259312, 1),
(3, '这是第三条新闻这是第三条新闻这是第三条新闻这是第三条新闻这是第三条新闻这是第三条新闻这是第三条新闻这是第三条新闻', '地方撒放大萨芬的范德萨范德萨发达dsaf暗示法我确认而我却而温润群', 'zh', 'qwe', 1495259312, 1495259312, 1),
(4, '深创投第116家投资企业上市', '地方撒放大萨芬的范德萨范德萨发达dsaf暗示法我确认而我却而温润群', 'zh', 'qwe', 1495259312, 1495259312, 1),
(5, '公司2017年4月份新增6个投资项目', '地方撒放大萨芬的范德萨范德萨发达dsaf暗示法我确认而我却而温润群', 'zh', 'qwe', 1495259312, 1495259312, 1),
(6, '深创投第117家投资企业上市', '地方撒放大萨芬的范德萨范德萨发达dsaf暗示法我确认而我却而温润群', 'zh', 'qwe', 1495259330, 1495259312, 1),
(7, '深创投荣获“中国最佳创业投资机构”等多项荣誉', '地方撒放大萨芬的范德萨范德萨发达dsaf暗示法我确认而我却而温润群', 'zh', 'qwe', 1495346752, 1495259312, 1),
(8, '这是第八条新闻', '<div class="">\n                            <h3>热烈祝贺第二届航运资本链接论坛圆满闭幕，润通作为晚宴主赞助方出席</h3>\n                            <span>Date of release: 2017-05-10</span>\n                        </div>\n                        <div class="textbox mb30">\n                            <p style="text-align: justify; text-indent: 2em;"><span style="color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei; font-size: 16px;">5月4日-5日，润通航运服务有限公司受邀出席由哥仑比亚船舶管理公司和森海海事服务公司联合举办的第二届资本链接国际航运论坛。本次活动分为两大部分：</span></p><p style="background: white; text-align: justify; line-height: 26px; text-indent: 28px;"><span style="color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei; font-size: 16px;">1. 5月4日嘉宾欢迎晚宴</span></p><p style="background: white; text-align: justify; line-height: 26px; text-indent: 28px;"><span style="color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei; font-size: 16px;"></span><span style="color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei; font-size: 16px;">2. 5月5日资本链接论坛</span></p><p style="background: white; text-align: justify; line-height: 26px; text-indent: 28px;"><span style="font-family: 微软雅黑,Microsoft YaHei; font-size: 16px;"><span style="font-family: 宋体;"><span style="background: white; color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei;">此次晚宴由润通航运服务有限公司独家赞助，晚宴</span><span style="color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei;">邀请了逾百名国内外航运企业高管及重要决策者。</span><span style="background: white; color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei;">伴随着悠扬高雅的音乐，润通公司副总裁范悦女士上台发言，表达对与会嘉宾的欢迎和对本次论坛的祝贺和期待，也对本次论坛主办方哥仑比亚船舶管理公司和森海海事服务公司邀请</span></span><span style="background: white; color: rgb(62, 62, 62); font-family: ;">RMS</span><span style="background: white; color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei;">成为主要赞助商表示了真挚的感谢。</span></span></p><p style="background: white; text-align: justify; line-height: 26px; text-indent: 2em;"><span style="color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei; font-size: 16px;">5月5日，第二届资本链接国际航运论坛（中国）在位于上海陆家嘴的凯宾斯基大酒店举行。润通及润通邀请的一些客户也作为嘉宾参与出席，聆听国内外航运企业，船东，投资方，服务方等有关中国航运金融息息相关的话题，努力探究航运业变革的方法和途径。</span></p><p style="background: white; text-align: justify; line-height: 26px; text-indent: 28px;"><span style="color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei; font-size: 16px;">润通始终秉持一站式的航运服务理念，积极响应各方号召，致力于为船东和船舶管理公司及船舶供应链的合作伙伴提供最具信赖的专业服务</span></p><p style="background: white; text-align: justify; line-height: 26px; text-indent: 28px;"><span style="color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei; font-size: 16px;">&nbsp;藉此契机，润通衷心祝愿已在国际航运业上享有盛名的航运资本链接论坛越办越好，祝愿所有润通合作伙伴事业顺利！</span></p><p style="text-align: justify;"><span style="font-family: 微软雅黑,Microsoft YaHei; font-size: 14px;"><span style="background: white; color: rgb(62, 62, 62); font-family: 宋体; font-size: 15px;"></span><span style="color: rgb(62, 62, 62); font-family: 宋体; font-size: 18px;">&nbsp;&nbsp;<span style="color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei; font-size: 14px;">主办方照片：</span></span></span></p><p style="text-align: center;"><span style="color: rgb(62, 62, 62); font-family: 宋体; font-size: 14px;"><img title="dinner1.jpg" alt="dinner1.jpg" src="/ueditor/net/upload/image/20170510/6363002391713725009353585.jpg" width="798" height="491"/></span></p><p style="text-align: left;"><span style="color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei; font-size: 16px;">&nbsp;&nbsp;&nbsp; <span style="color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei; font-size: 14px;">润通副总裁范悦女士发言致辞：</span></span></p><p style="text-align: center;"><span style="color: rgb(62, 62, 62); font-family: 宋体; font-size: 14px;"><img title="speech2.jpg" alt="speech2.jpg" src="/ueditor/net/upload/image/20170510/6363002398374662502601982.jpg" width="798" height="477"/></span></p><p style="text-align: left;"><span style="color: rgb(62, 62, 62); font-family: 微软雅黑,Microsoft YaHei; font-size: 16px;">&nbsp;&nbsp;&nbsp;</span><span style="background: white; color: rgb(38, 38, 38); font-family: 微软雅黑,Microsoft YaHei; font-size: 14px;">&nbsp;亲切合影：</span></p><p style="text-align: center;"><span style="background: white; color: rgb(38, 38, 38); font-family: 宋体;"><img style="width: 790px; height: 504px;" title="合照.jpg" alt="合照.jpg" src="/ueditor/net/upload/image/20170510/6363002410055912506689772.jpg" width="1065" height="810"/></span></p><p style="text-align: center;"><span style="background: white; color: rgb(38, 38, 38); font-family: 宋体; word-spacing: 0px; word-wrap: break-word !important; max-width: 100%; box-sizing: border-box !important; widows: 1; -webkit-text-stroke-width: 0px;"><img style="width: 796px; height: 495px;" title="论坛照片.webp.jpg" alt="论坛照片.webp.jpg" src="/ueditor/net/upload/image/20170510/6363002421391850005487224.jpg" width="801" height="426"/></span></p><p style="text-align: center;"><span style="background: white; color: rgb(38, 38, 38); font-family: 宋体; word-spacing: 0px; word-wrap: break-word !important; max-width: 100%; box-sizing: border-box !important; widows: 1; -webkit-text-stroke-width: 0px;"><img title="forum1.jpg" alt="forum1.jpg" src="/ueditor/net/upload/image/20170510/6363002423674662506161573.jpg"/></span></p><p><span style="color: rgb(62, 62, 62); font-family: ;">(Nicolas</span><span style="color: rgb(62, 62, 62); font-family: 宋体;">，</span><span style="color: rgb(62, 62, 62); font-family: ;">Cindy</span><span style="color: rgb(62, 62, 62); font-family: 宋体;">，</span><span style="color: rgb(62, 62, 62); font-family: ;">George)</span></p><p style="text-align: center;"><span style="background: white; color: rgb(38, 38, 38); font-family: 宋体; word-spacing: 0px; word-wrap: break-word !important; max-width: 100%; box-sizing: border-box !important; widows: 1; -webkit-text-stroke-width: 0px;"><img title="forum2.jpg" alt="forum2.jpg" src="/ueditor/net/upload/image/20170510/6363002425109037509143213.jpg"/></span></p><p><span style="color: rgb(62, 62, 62); font-family: ;">&nbsp;&nbsp;&nbsp;&nbsp; (Mr.Schoeller</span><span style="color: rgb(62, 62, 62); font-family: 宋体;">，</span><span style="color: rgb(62, 62, 62); font-family: ;">Cindy</span><span style="color: rgb(62, 62, 62); font-family: 宋体;">，</span><span style="color: rgb(62, 62, 62); font-family: ;">Andreas</span><span style="color: rgb(62, 62, 62); font-family: 宋体;">，</span><span style="color: rgb(62, 62, 62); font-family: ;">Nicolas</span><span style="color: rgb(62, 62, 62); font-family: 宋体;">，</span><span style="color: rgb(62, 62, 62); font-family: ;">Mike)</span></p><p style="text-align: center;"><span style="background: white; color: rgb(62, 62, 62); font-family: 宋体; font-size: 15px;"><img style="width: 796px; height: 529px;" title="forum3.jpg" alt="forum3.jpg" src="/ueditor/net/upload/image/20170510/6363002426419975004882219.jpg" width="823" height="532"/></span></p><p style="text-align: center;"><img style="width: 794px; height: 529px;" title="forum4.jpg" alt="forum4.jpg" src="/ueditor/net/upload/image/20170510/6363002428057475007451541.jpg" width="829" height="532"/></p><p style="text-align: left;">&nbsp;<img style="width: 805px; height: 551px;" title="讨论.jpg" alt="讨论.jpg" src="/ueditor/net/upload/image/20170515/6363046898244212501333586.jpg" width="980" height="681"/></p><p style="text-align: left;"><span style="color: rgb(62, 62, 62); font-family: 宋体; font-size: 13px;">（远洋海运副总裁</span><span style="color: rgb(62, 62, 62); font-family: ;">-</span><span style="color: rgb(62, 62, 62); font-family: 宋体; font-size: 13px;">叶伟龙</span><span style="color: rgb(62, 62, 62); font-family: ;">;</span><span style="color: rgb(62, 62, 62); font-family: 宋体; font-size: 13px;">中国招商能源董事总经理</span><span style="color: rgb(62, 62, 62); font-family: ;">-</span><span style="color: rgb(62, 62, 62); font-family: 宋体; font-size: 13px;">谢春林；中谷海运董事总经理</span><span style="color: rgb(62, 62, 62); font-family: ;">-</span><span style="color: rgb(62, 62, 62); font-family: 宋体; font-size: 13px;">卢宗俊；太平洋气体</span><span style="color: rgb(62, 62, 62); font-family: ;">CEO-</span><span style="color: rgb(62, 62, 62); font-family: 宋体; font-size: 13px;">粟斌；</span><span style="color: rgb(62, 62, 62); font-family: ;">Courage Marine</span><span style="color: rgb(62, 62, 62); font-family: 宋体; font-size: 13px;">集团主席</span><span style="color: rgb(62, 62, 62); font-family: ;">-Chin Chien Hsu; Erasmus</span><span style="color: rgb(62, 62, 62); font-family: 宋体; font-size: 13px;">集团总裁</span><span style="color: rgb(62, 62, 62); font-family: ;">-John Su</span><span style="color: rgb(62, 62, 62); font-family: 宋体; font-size: 13px;">）</span></p><p style="text-align: left;">&nbsp;</p>\n                        </div>\n', 'zh', 'qwe', 1495346752, 1495259312, 1),
(9, '公司2017年5月份新增3个投资项目', '地方撒放大萨芬的范德萨范德萨发达dsaf暗示法我确认而我却而温润群', 'zh', 'qwe', 1495346752, 1495259312, 0),
(10, '[NEW PRODUCT] Dolphinflex Composite Hose and Quick Coupling', ' <p><br/></p><p><strong>1. Products Range:</strong></p><p>We can provide a comprehensive range of composite hoses, specifically engineered to handle all kinds of transfer applications safely and easily. And within each you can choose personalized manufacturing according to your need.<img src="http://www.rmsmarineservice.com/ueditor/net/upload/image/20160901/6360834542001722257576990.jpg" alt="sangbong1.jpg" style="float: right;"/></p><p><strong>2. Applications：</strong></p><p>Dolphinflex® composite hoses apply a variety of fluid transportation in oil, chemical tank terminals, vapour recovery, LPG, LNG carriers and so on. &nbsp; &nbsp;</p><p><strong>3. Construction:</strong>&nbsp;<img src="http://www.rmsmarineservice.com/ueditor/net/upload/image/20160901/6360834545572080451516230.jpg" alt="sangbong2.jpg" style="white-space: normal; float: right;"/></p><p>The hoses are constructed from polypropylene fabrics and films and a outer cover of PVC coated polyester fabric which is abrasion, weather and ozone resistant.</p><p><strong>4. Features and Safety:&nbsp;</strong></p><ul class=" list-paddingleft-2" style="list-style-type: disc;"><li><p>Strong and Durable</p></li><li><p>Lightweight construction</p></li><li><p>Flexible operation</p></li><li><p>Pressure tested at 1.5 times their rated working pressure before shipment. Test certificates are provided with all hoses assemblies.</p></li><li><p>Safety factor 5:1 (Burst pressure: Working pressure)</p></li></ul><p><strong>5. Type approval and Standards：</strong></p><ul class=" list-paddingleft-2" style="list-style-type: disc;"><li><p>Type approved by international class such as ABS, BV, DNV-GL, LR, NK and KR.</p></li><li><p>Manufactured and tested under the quality control system of IMO/IBC, IGC regulations and applicable standards are EN 13765:2010, EN 13766:2010, EN 1474-2:2008</p></li><li><p>Recognized by ISO9001:2008, ISO14001 and OHSAS 18001</p></li></ul><p><strong>6. Sales Reference：</strong></p><ul class=" list-paddingleft-2" style="list-style-type: disc;"><li><p>Supplied to shipowners own LNG, LPG, Oil &amp; Chemical tankers, Drill ship and FSRU, such as ALPHA TANKERS, TEEKAY, CNOOC, HOEGH and DYNAGAS etc.</p></li><li><p>Supplied to shipyards such as HYUNDAI, SAMSUNG, DAEWOO, STX etc.</p></li><li><p>Supplied to the major tank terminals such as HORIZON TERMINALS, ODFJELL TERMINALS, STOLTHAVEN, VOPAK</p></li></ul><p><strong><br/></strong></p><p><strong>Please contact us:</strong><img src="http://www.rmsmarineservice.com/ueditor/net/upload/image/20160901/6360834546718970138954701.jpg" alt="LOGO(dolphinflex).jpg" style="float: right;"/></p><p>Tel: +86-21-20822836</p><p>Mob.: +86-13917237174</p><p>E-mail: project@rmsmarineservice.com</p>\r\n', 'en', 'dsa', 1472688000, 1472688000, 1);

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'zh' COMMENT 'zh:中文,en:英文',
  `start_time` int(11) DEFAULT NULL COMMENT '项目开始时间',
  `end_time` int(11) DEFAULT NULL COMMENT '项目结束时间，为NULL表示项目未结束'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`id`, `name`, `content`, `language`, `start_time`, `end_time`) VALUES
(1, '我司将参加中东迪拜海事展', '<div class="textbox mb30">\r\n                            <p>随着世界海事展览行业的高速发展，中东（迪拜）海事展已经跻身世界10大海事展行列，该展会是中东地区规模最大，历史最悠久的船舶海事展览会，成为中东乃至周边地区的一个举足轻重的对外交流平台，为来自世界各地的参展企业提供了一个与世界各地采购商，参观者交流，合作的机会。润通航服诚邀您的光临！</p><p>我司展位信息：</p><p><br/></p><p>2016年第八届中东（迪拜）国际海事展</p><p>时 间：2016年11月1-3日</p><p>场馆：阿联酋迪拜世界贸易中心</p><p>展位：J7<br/></p><p><br/></p><p style="text-align: center;"><img src="/ueditor/net/upload/image/20161020/6361255535080797915925704.jpg" title="RMS_SMME_exhibitor-email-signature.jpg" alt="RMS_SMME_exhibitor-email-signature.jpg"/></p>\r\n                        </div>\r\n', 'zh', 1497000000, 1497256409),
(2, '我司将参加中东迪拜海事展', '<div class="textbox mb30">\r\n                            <p>随着世界海事展览行业的高速发展，中东（迪拜）海事展已经跻身世界10大海事展行列，该展会是中东地区规模最大，历史最悠久的船舶海事展览会，成为中东乃至周边地区的一个举足轻重的对外交流平台，为来自世界各地的参展企业提供了一个与世界各地采购商，参观者交流，合作的机会。润通航服诚邀您的光临！</p><p>我司展位信息：</p><p><br/></p><p>2016年第八届中东（迪拜）国际海事展</p><p>时 间：2016年11月1-3日</p><p>场馆：阿联酋迪拜世界贸易中心</p><p>展位：J7<br/></p><p><br/></p><p style="text-align: center;"><img src="/ueditor/net/upload/image/20161020/6361255535080797915925704.jpg" title="RMS_SMME_exhibitor-email-signature.jpg" alt="RMS_SMME_exhibitor-email-signature.jpg"/></p>\r\n                        </div>\r\n', 'zh', 1497000000, 1497256409),
(3, '我司将参加中东迪拜海事展', '<div class="textbox mb30">\r\n                            <p>随着世界海事展览行业的高速发展，中东（迪拜）海事展已经跻身世界10大海事展行列，该展会是中东地区规模最大，历史最悠久的船舶海事展览会，成为中东乃至周边地区的一个举足轻重的对外交流平台，为来自世界各地的参展企业提供了一个与世界各地采购商，参观者交流，合作的机会。润通航服诚邀您的光临！</p><p>我司展位信息：</p><p><br/></p><p>2016年第八届中东（迪拜）国际海事展</p><p>时 间：2016年11月1-3日</p><p>场馆：阿联酋迪拜世界贸易中心</p><p>展位：J7<br/></p><p><br/></p><p style="text-align: center;"><img src="/ueditor/net/upload/image/20161020/6361255535080797915925704.jpg" title="RMS_SMME_exhibitor-email-signature.jpg" alt="RMS_SMME_exhibitor-email-signature.jpg"/></p>\r\n                        </div>\r\n', 'zh', 1497000000, 1497256409),
(4, '我司将参加中东迪拜海事展', '<div class="textbox mb30">\r\n                            <p>随着世界海事展览行业的高速发展，中东（迪拜）海事展已经跻身世界10大海事展行列，该展会是中东地区规模最大，历史最悠久的船舶海事展览会，成为中东乃至周边地区的一个举足轻重的对外交流平台，为来自世界各地的参展企业提供了一个与世界各地采购商，参观者交流，合作的机会。润通航服诚邀您的光临！</p><p>我司展位信息：</p><p><br/></p><p>2016年第八届中东（迪拜）国际海事展</p><p>时 间：2016年11月1-3日</p><p>场馆：阿联酋迪拜世界贸易中心</p><p>展位：J7<br/></p><p><br/></p><p style="text-align: center;"><img src="/ueditor/net/upload/image/20161020/6361255535080797915925704.jpg" title="RMS_SMME_exhibitor-email-signature.jpg" alt="RMS_SMME_exhibitor-email-signature.jpg"/></p>\r\n                        </div>\r\n', 'zh', 1497000000, 1497256409),
(5, 'English我司将参加中东迪拜海事展', '<div class="textbox mb30">\n                            <p>\nEnglish\n随着世界海事展览行业的高速发展，中东（迪拜）海事展已经跻身世界10大海事展行列，该展会是中东地区规模最大，历史最悠久的船舶海事展览会，成为中东乃至周边地区的一个举足轻重的对外交流平台，为来自世界各地的参展企业提供了一个与世界各地采购商，参观者交流，合作的机会。润通航服诚邀您的光临！</p><p>我司展位信息：</p><p><br/></p><p>2016年第八届中东（迪拜）国际海事展</p><p>时 间：2016年11月1-3日</p><p>场馆：阿联酋迪拜世界贸易中心</p><p>展位：J7<br/></p><p><br/></p><p style="text-align: center;"><img src="/ueditor/net/upload/image/20161020/6361255535080797915925704.jpg" title="RMS_SMME_exhibitor-email-signature.jpg" alt="RMS_SMME_exhibitor-email-signature.jpg"/></p>\n                        </div>\n', 'en', 1497000000, 1497256409),
(6, '我司将参加中东迪拜海事展', '<div class="textbox mb30">\r\n                            <p>随着世界海事展览行业的高速发展，中东（迪拜）海事展已经跻身世界10大海事展行列，该展会是中东地区规模最大，历史最悠久的船舶海事展览会，成为中东乃至周边地区的一个举足轻重的对外交流平台，为来自世界各地的参展企业提供了一个与世界各地采购商，参观者交流，合作的机会。润通航服诚邀您的光临！</p><p>我司展位信息：</p><p><br/></p><p>2016年第八届中东（迪拜）国际海事展</p><p>时 间：2016年11月1-3日</p><p>场馆：阿联酋迪拜世界贸易中心</p><p>展位：J7<br/></p><p><br/></p><p style="text-align: center;"><img src="/ueditor/net/upload/image/20161020/6361255535080797915925704.jpg" title="RMS_SMME_exhibitor-email-signature.jpg" alt="RMS_SMME_exhibitor-email-signature.jpg"/></p>\r\n                        </div>\r\n', 'zh', 1497000000, 1497256409),
(7, '我司将参加中东迪拜海事展', '<div class="textbox mb30">\r\n                            <p>随着世界海事展览行业的高速发展，中东（迪拜）海事展已经跻身世界10大海事展行列，该展会是中东地区规模最大，历史最悠久的船舶海事展览会，成为中东乃至周边地区的一个举足轻重的对外交流平台，为来自世界各地的参展企业提供了一个与世界各地采购商，参观者交流，合作的机会。润通航服诚邀您的光临！</p><p>我司展位信息：</p><p><br/></p><p>2016年第八届中东（迪拜）国际海事展</p><p>时 间：2016年11月1-3日</p><p>场馆：阿联酋迪拜世界贸易中心</p><p>展位：J7<br/></p><p><br/></p><p style="text-align: center;"><img src="/ueditor/net/upload/image/20161020/6361255535080797915925704.jpg" title="RMS_SMME_exhibitor-email-signature.jpg" alt="RMS_SMME_exhibitor-email-signature.jpg"/></p>\r\n                        </div>\r\n', 'zh', 1497000000, 1497256409),
(8, '我司将参加中东迪拜海事展', '<div class="textbox mb30">\r\n                            <p>随着世界海事展览行业的高速发展，中东（迪拜）海事展已经跻身世界10大海事展行列，该展会是中东地区规模最大，历史最悠久的船舶海事展览会，成为中东乃至周边地区的一个举足轻重的对外交流平台，为来自世界各地的参展企业提供了一个与世界各地采购商，参观者交流，合作的机会。润通航服诚邀您的光临！</p><p>我司展位信息：</p><p><br/></p><p>2016年第八届中东（迪拜）国际海事展</p><p>时 间：2016年11月1-3日</p><p>场馆：阿联酋迪拜世界贸易中心</p><p>展位：J7<br/></p><p><br/></p><p style="text-align: center;"><img src="/ueditor/net/upload/image/20161020/6361255535080797915925704.jpg" title="RMS_SMME_exhibitor-email-signature.jpg" alt="RMS_SMME_exhibitor-email-signature.jpg"/></p>\r\n                        </div>\r\n', 'zh', 1496937600, 1498752000),
(9, '我司将参加中东迪拜海事展', '<div class="textbox mb30">\r\n                            <p>随着世界海事展览行业的高速发展，中东（迪拜）海事展已经跻身世界10大海事展行列，该展会是中东地区规模最大，历史最悠久的船舶海事展览会，成为中东乃至周边地区的一个举足轻重的对外交流平台，为来自世界各地的参展企业提供了一个与世界各地采购商，参观者交流，合作的机会。润通航服诚邀您的光临！</p><p>我司展位信息：</p><p><br/></p><p>2016年第八届中东（迪拜）国际海事展</p><p>时 间：2016年11月1-3日</p><p>场馆：阿联酋迪拜世界贸易中心</p><p>展位：J7<br/></p><p><br/></p><p style="text-align: center;"><img src="/ueditor/net/upload/image/20161020/6361255535080797915925704.jpg" title="RMS_SMME_exhibitor-email-signature.jpg" alt="RMS_SMME_exhibitor-email-signature.jpg"/></p>\r\n                        </div>\r\n', 'zh', 1497000000, 0),
(10, 'English项目一', 'English项目一', 'en', 1497024000, 1499184000);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '0:禁用 10::正常',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` char(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '1:男  2:女',
  `birth_time` int(11) DEFAULT NULL,
  `specialty` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_experience` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resume_link` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `name`, `telphone`, `sex`, `birth_time`, `specialty`, `city`, `address`, `work_experience`, `resume_link`) VALUES
(1, 'wsl123', 'WZ2DzsHXumjv03m8GjUmAXhXYR5XeM6p', '$2y$13$K1bgOTgHy8fWgNiiozS5Ue6I8bH2eA1466ThH0srjZNrn18G9nJmm', 'm0nGgSoyRvqi_5Cj6_5PgTgtLXR0XPkW_1495118154', '297210725@qq.com', 10, 1494669293, 1497169902, '', '45678541', '1', 849456000, '', '长沙', '', '', ''),
(2, '789', 'iOStcgXW0j0ZCvvChrFenkq4eT_-Z0VS', '$2y$13$SbF0.CUowBYD5UErxgyg/ORst/BZL0oEoWoONIYiA2fTEZ.4IKDkC', NULL, '2972107@qq.c', 10, 1495096008, 1497012964, '张三', '15025847865', '', 881251200, '', '', '生生死死', '', NULL),
(4, '78988', 'xIR-FwZ-lIwYV7iv1t4JnO0Q2jLv-mNO', '$2y$13$IE4V78gUw7zFQnlpHuWKEOznk/6SBi92nGD8qDJzbd1U8ifPfvKF.', NULL, '297@q.cc', 10, 1495096283, 1496925518, NULL, '', '', NULL, '', '', '', '', NULL),
(9, 'root', '1q3mzTkMal2GPDtxUzj3gcjKB0jnHnEZ', '$2y$13$DCu4TQHv5BKeeBFhkshuvOgiWFoGbWQMADgdcE8JEiftgBzRsCSZC', NULL, '798@q.c', 10, 1497106337, 1497161413, NULL, '', '', NULL, '', '', '', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

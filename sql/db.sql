# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.18)
# Database: 2
# Generation Time: 2017-07-29 06:28:10 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- ----------------------------
-- Table structure for `ss_node`
-- ----------------------------
CREATE TABLE `ss_node` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '服务类型：1-SS、2-V2ray',
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '等级：0-无等级，全部可见',
  `speed_limit` bigint(20) NOT NULL DEFAULT '0' COMMENT '节点限速，为0表示不限速，单位Byte',
  `client_limit` int(0) NOT NULL DEFAULT 0 COMMENT '设备数限制',
  `name` VARCHAR(128) NOT NULL DEFAULT '' COMMENT '名称',
  `group_id` INT(11) NOT NULL DEFAULT '0' COMMENT '所属分组',
  `country_code` CHAR(5) NOT NULL DEFAULT 'un' COMMENT '国家代码',
  `server` VARCHAR(128) NULL DEFAULT '' COMMENT '服务器域名地址',
  `ip` CHAR(15) NULL DEFAULT '' COMMENT '服务器IPV4地址',
  `ipv6` CHAR(128) NULL DEFAULT '' COMMENT '服务器IPV6地址',
  `relay_server` varchar(128) NULL COMMENT '中转落地服务器地址',
  `desc` VARCHAR(255) NULL DEFAULT '' COMMENT '节点简单描述',
  `method` VARCHAR(32) NOT NULL DEFAULT 'aes-256-cfb' COMMENT '加密方式',
  `protocol` VARCHAR(64) NOT NULL DEFAULT 'origin' COMMENT '协议',
  `obfs` VARCHAR(64) NOT NULL DEFAULT 'plain' COMMENT '混淆',
  `obfs_param` VARCHAR(255) NULL DEFAULT '' COMMENT '混淆参数',
  `traffic_rate` FLOAT NOT NULL DEFAULT '1.00' COMMENT '流量比率',
  `bandwidth` INT(11) NOT NULL DEFAULT '100' COMMENT '出口带宽，单位M',
  `traffic` INT(20) NOT NULL DEFAULT '1000' COMMENT '每月可用流量，单位G',
  `monitor_url` VARCHAR(255) NULL DEFAULT NULL COMMENT '监控地址',
  `is_subscribe` TINYINT(4) NULL DEFAULT '1' COMMENT '是否允许用户订阅该节点：0-否、1-是',
  `is_tcp_check` TINYINT(4) NOT NULL DEFAULT '1' COMMENT '是否开启检测: 0-不开启、1-开启',
  `is_udp` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否启用UDP：0-不启用、1-启用',
  `is_nat` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '是否为NAT机：0-否、1-是',
  `is_relay` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '是否中转节点：0-否、1-是',
  `is_dynamic` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '是否动态IP：0-否、1-是',
  `is_bt` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '是否启用宝塔API：0-否、1-是',
  `bt_port` SMALLINT(6) UNSIGNED NOT NULL DEFAULT '8888' COMMENT '宝塔访问端口',
  `bt_key` VARCHAR(50) NULL DEFAULT '' COMMENT '宝塔API密钥',
  `ssh_port` SMALLINT(6) UNSIGNED NOT NULL DEFAULT '22' COMMENT 'SSH端口',
  `compatible` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '兼容SS',
  `single` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '启用单端口功能：0-否、1-是',
  `port` varchar(50) NULL COMMENT '单端口的端口号',
  `passwd` varchar(255) NULL COMMENT '单端口的连接密码',
  `push_port` INT(11) NOT NULL DEFAULT '0' COMMENT '消息推送端口',
  `sort` INT(11) NOT NULL DEFAULT '0' COMMENT '排序值，值越大越靠前显示',
  `status` TINYINT(4) NOT NULL DEFAULT '1' COMMENT '状态：0-维护、1-正常',
  `v2_alter_id` INT(11) NOT NULL DEFAULT '16' COMMENT 'V2ray额外ID',
  `v2_port` INT(11) NOT NULL DEFAULT '0' COMMENT 'V2ray端口',
  `v2_method` VARCHAR(32) NOT NULL DEFAULT 'aes-128-gcm' COMMENT 'V2ray加密方式',
  `v2_net` VARCHAR(16) NOT NULL DEFAULT 'tcp' COMMENT 'V2ray传输协议',
  `v2_type` VARCHAR(32) NOT NULL DEFAULT 'none' COMMENT 'V2ray伪装类型',
  `v2_host` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'V2ray伪装的域名',
  `v2_path` VARCHAR(255) NOT NULL DEFAULT '' COMMENT 'V2ray WS/H2路径',
  `v2_tls` TINYINT(4) NOT NULL DEFAULT '0' COMMENT 'V2ray底层传输安全 0 未开启 1 开启',
  `v2_insider_port` INT(11) NOT NULL DEFAULT '10550' COMMENT 'V2ray内部端口（内部监听），v2_port为0时有效',
  `v2_outsider_port` INT(11) NOT NULL DEFAULT '443' COMMENT 'V2ray外部端口（外部覆盖），v2_port为0时有效',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_group` (`group_id`),
	INDEX `idx_sub` (`is_subscribe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='节点信息表';


-- ----------------------------
-- Table structure for `ss_node_info`
-- ----------------------------
CREATE TABLE `ss_node_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  `uptime` int(11) NOT NULL COMMENT '后端存活时长，单位秒',
  `load` varchar(255) NOT NULL COMMENT '负载',
  `log_time` int(11) NOT NULL COMMENT '记录时间',
  PRIMARY KEY (`id`),
  INDEX `idx_node_id` (`node_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='节点心跳信息';


-- ----------------------------
-- Table structure for `ss_node_online_log`
-- ----------------------------
CREATE TABLE `ss_node_online_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL COMMENT '节点ID',
  `online_user` int(11) NOT NULL COMMENT '在线用户数',
  `log_time` int(11) NOT NULL COMMENT '记录时间',
  PRIMARY KEY (`id`),
  INDEX `idx_node_id` (`node_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='节点在线信息';


-- ----------------------------
-- Table structure for `ss_node_label`
-- ----------------------------
CREATE TABLE `ss_node_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `label_id` int(11) NOT NULL DEFAULT '0' COMMENT '标签ID',
  PRIMARY KEY (`id`),
  INDEX `idx_node_label` (`node_id`,`label_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='节点标签';


-- ----------------------------
-- Table structure for `user`
-- ----------------------------
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '密码',
  `port` int(11) NOT NULL DEFAULT '0' COMMENT '代理端口',
  `passwd` varchar(16) NOT NULL DEFAULT '' COMMENT '代理密码',
  `vmess_id` varchar(64) NOT NULL DEFAULT '' COMMENT 'V2Ray用户ID',
  `transfer_enable` bigint(20) NOT NULL DEFAULT '1099511627776' COMMENT '可用流量，单位字节，默认1TiB',
  `u` bigint(20) NOT NULL DEFAULT '0' COMMENT '已上传流量，单位字节',
  `d` bigint(20) NOT NULL DEFAULT '0' COMMENT '已下载流量，单位字节',
  `t` int(11) NOT NULL DEFAULT '0' COMMENT '最后使用时间',
  `ip` char(128) DEFAULT NULL COMMENT '最后连接IP',
  `enable` tinyint(4) NOT NULL DEFAULT '1' COMMENT '代理状态',
  `method` varchar(30) NOT NULL DEFAULT 'aes-256-cfb' COMMENT '加密方式',
  `protocol` varchar(30) NOT NULL DEFAULT 'origin' COMMENT '协议',
  `obfs` varchar(30) NOT NULL DEFAULT 'plain' COMMENT '混淆',
  `obfs_param` varchar(255) DEFAULT '' COMMENT '混淆参数',
  `speed_limit` bigint(20) NOT NULL DEFAULT '0' COMMENT '用户限速，为0表示不限速，单位Byte',
  `gender` tinyint(4) NOT NULL DEFAULT '1' COMMENT '性别：0-女、1-男',
  `phone` char(20) NULL COMMENT '联系电话',
  `address` varchar(255) NULL COMMENT '联系地址',
  `wechat` varchar(30) DEFAULT '' COMMENT '微信',
  `qq` varchar(20) DEFAULT '' COMMENT 'QQ',
  `usage` VARCHAR(10) NOT NULL DEFAULT '4' COMMENT '用途：1-手机、2-电脑、3-路由器、4-其他',
  `pay_way` tinyint(4) NOT NULL DEFAULT '0' COMMENT '付费方式：0-免费、1-季付、2-月付、3-半年付、4-年付',
  `balance` int(11) NOT NULL DEFAULT '0' COMMENT '余额，单位分',
  `enable_time` date DEFAULT NULL COMMENT '开通日期',
  `expire_time` date NOT NULL DEFAULT '2099-01-01' COMMENT '过期时间',
  `ban_time` int(11) NOT NULL DEFAULT '0' COMMENT '封禁到期时间',
  `remark` text COMMENT '备注',
  `level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '等级，默认0级，最高9级',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否管理员：0-否、1-是',
  `reg_ip` char(128) NOT NULL DEFAULT '127.0.0.1' COMMENT '注册IP',
  `last_login` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `referral_uid` int(11) NOT NULL DEFAULT '0' COMMENT '邀请人',
  `traffic_reset_day` tinyint(4) NOT NULL DEFAULT '0' COMMENT '流量自动重置日，0表示不重置',
  `invite_num` INT NOT NULL DEFAULT '0' COMMENT '可生成邀请码数',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：-1-禁用、0-未激活、1-正常',
  `remember_token` varchar(256) DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `unq_username` (`username`),
  INDEX `idx_search` (`enable`, `status`, `port`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户';


LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `password`, `port`, `passwd`, `vmess_id`, `transfer_enable`, `u`, `d`, `t`, `enable`, `method`, `protocol`, `obfs`, `obfs_param`, `speed_limit`, `wechat`, `qq`, `usage`, `pay_way`, `balance`, `enable_time`, `expire_time`, `remark`, `is_admin`, `reg_ip`, `status`, `created_at`, `updated_at`)
VALUES (1,'admin','$2y$10$ryMdx5ejvCSdjvZVZAPpOuxHrsAUY8FEINUATy6RCck6j9EeHhPfq',10000,'@123', 'c6effafd-6046-7a84-376e-b0429751c304', 1099511627776,0,0,0,1,'aes-256-cfb','origin','plain','',0,'','',1,3,0.00,'2017-01-01','2099-01-01',NULL,1,'127.0.0.1',1,now(),now());

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


-- ----------------------------
-- Table structure for `user_traffic_log`
-- ----------------------------
CREATE TABLE `user_traffic_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `u` int(11) NOT NULL DEFAULT '0' COMMENT '上传流量',
  `d` int(11) NOT NULL DEFAULT '0' COMMENT '下载流量',
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  `rate` float NOT NULL COMMENT '流量比例',
  `traffic` varchar(32) NOT NULL COMMENT '产生流量',
  `log_time` int(11) NOT NULL COMMENT '记录时间',
  PRIMARY KEY (`id`),
  INDEX `idx_user_node_time` (`user_id`, `node_id`, `log_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户流量日志';


-- ----------------------------
-- Table structure for `ss_config`
-- ----------------------------
DROP TABLE IF EXISTS `ss_config`;
CREATE TABLE `ss_config` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '配置名' COLLATE 'utf8mb4_unicode_ci',
  `type` TINYINT(4) NOT NULL DEFAULT '1' COMMENT '类型：1-加密方式、2-协议、3-混淆',
  `is_default` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '是否默认：0-不是、1-是',
  `sort` INT(11) NOT NULL DEFAULT '0' COMMENT '排序：值越大排越前',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='通用配置';

-- ----------------------------
-- Records of `ss_config`
-- ----------------------------
INSERT INTO `ss_config` VALUES ('1', 'none', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('2', 'bf-cfb', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('3', 'chacha20', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('4', 'chacha20-ietf', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('5', 'aes-128-cfb', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('6', 'aes-192-cfb', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('7', 'aes-256-cfb', '1', '1', '0');
INSERT INTO `ss_config` VALUES ('8', 'aes-128-ctr', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('9', 'aes-192-ctr', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('10', 'aes-256-ctr', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('11', 'cast5-cfb', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('12', 'des-cfb', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('13', 'rc4-md5', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('14', 'salsa20', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('15', 'aes-128-gcm', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('16', 'aes-192-gcm', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('17', 'aes-256-gcm', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('18', 'chacha20-ietf-poly1305', '1', '0', '0');
INSERT INTO `ss_config` VALUES ('19', 'origin', '2', '1', '0');
INSERT INTO `ss_config` VALUES ('20', 'auth_aes128_md5', '2', '0', '0');
INSERT INTO `ss_config` VALUES ('21', 'auth_aes128_sha1', '2', '0', '0');
INSERT INTO `ss_config` VALUES ('22', 'auth_chain_a', '2', '0', '0');
INSERT INTO `ss_config` VALUES ('23', 'plain', '3', '1', '0');
INSERT INTO `ss_config` VALUES ('24', 'http_simple', '3', '0', '0');
INSERT INTO `ss_config` VALUES ('25', 'tls1.2_ticket_auth', '3', '0', '0');


-- ----------------------------
-- Table structure for `config`
-- ----------------------------
CREATE TABLE `config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '配置名',
  `value` TEXT NULL COMMENT '配置值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='系统配置';


-- ----------------------------
-- Records of `config`
-- ----------------------------
INSERT INTO `config` VALUES ('1', 'is_rand_port', 0);
INSERT INTO `config` VALUES ('2', 'is_user_rand_port', 0);
INSERT INTO `config` VALUES ('3', 'invite_num', 3);
INSERT INTO `config` VALUES ('4', 'is_register', 1);
INSERT INTO `config` VALUES ('5', 'is_invite_register', 2);
INSERT INTO `config` VALUES ('6', 'website_name', 'SSRPanel');
INSERT INTO `config` VALUES ('7', 'is_reset_password', 1);
INSERT INTO `config` VALUES ('8', 'reset_password_times', 3);
INSERT INTO `config` VALUES ('9', 'website_url', 'https://premium.ssrpanel.com');
INSERT INTO `config` VALUES ('10', 'is_active_register', 1);
INSERT INTO `config` VALUES ('11', 'active_times', 3);
INSERT INTO `config` VALUES ('12', 'is_checkin', 1);
INSERT INTO `config` VALUES ('13', 'min_rand_traffic', 10);
INSERT INTO `config` VALUES ('14', 'max_rand_traffic', 500);
INSERT INTO `config` VALUES ('15', 'default_speed_limit', 131072);
INSERT INTO `config` VALUES ('16', 'is_show_subscribe_level', 0);
INSERT INTO `config` VALUES ('17', 'traffic_limit_time', 1440);
INSERT INTO `config` VALUES ('18', 'referral_traffic', 1024);
INSERT INTO `config` VALUES ('19', 'referral_percent', 0.2);
INSERT INTO `config` VALUES ('20', 'referral_money', 100);
INSERT INTO `config` VALUES ('21', 'referral_status', 1);
INSERT INTO `config` VALUES ('22', 'default_traffic', 1024);
INSERT INTO `config` VALUES ('23', 'traffic_warning', 0);
INSERT INTO `config` VALUES ('24', 'traffic_warning_percent', 80);
INSERT INTO `config` VALUES ('25', 'expire_warning', 0);
INSERT INTO `config` VALUES ('26', 'expire_days', 15);
INSERT INTO `config` VALUES ('27', 'reset_traffic', 1);
INSERT INTO `config` VALUES ('28', 'default_days', 7);
INSERT INTO `config` VALUES ('29', 'subscribe_max', 0);
INSERT INTO `config` VALUES ('30', 'min_port', 10000);
INSERT INTO `config` VALUES ('31', 'max_port', 20000);
INSERT INTO `config` VALUES ('32', 'is_captcha', 0);
INSERT INTO `config` VALUES ('33', 'is_traffic_ban', 1);
INSERT INTO `config` VALUES ('34', 'traffic_ban_value', 10);
INSERT INTO `config` VALUES ('35', 'traffic_ban_time', 60);
INSERT INTO `config` VALUES ('36', 'is_clear_log', 1);
INSERT INTO `config` VALUES ('37', 'is_node_crash_warning', 0);
INSERT INTO `config` VALUES ('38', 'webmaster_email', '');
INSERT INTO `config` VALUES ('39', 'is_server_chan', 0);
INSERT INTO `config` VALUES ('40', 'server_chan_key', '');
INSERT INTO `config` VALUES ('41', 'is_subscribe_ban', 1);
INSERT INTO `config` VALUES ('42', 'subscribe_ban_times', 20);
INSERT INTO `config` VALUES ('43', 'total_transfer', 0);
INSERT INTO `config` VALUES ('44', 'month_transfer', 0);
INSERT INTO `config` VALUES ('45', 'today_transfer', 0);
INSERT INTO `config` VALUES ('46', 'is_free_code', 0);
INSERT INTO `config` VALUES ('47', 'is_forbid_robot', 0);
INSERT INTO `config` VALUES ('48', 'subscribe_domain', '');
INSERT INTO `config` VALUES ('49', 'auto_release_port', 0);
INSERT INTO `config` VALUES ('50', 'payment_gateway', 0);
INSERT INTO `config` VALUES ('51', 'codepay_url', 'https://codepay.fateqq.com/creat_order');
INSERT INTO `config` VALUES ('52', 'codepay_id', '');
INSERT INTO `config` VALUES ('53', 'codepay_key', '');
INSERT INTO `config` VALUES ('54', 'is_register_type', 0);
INSERT INTO `config` VALUES ('55', 'website_analytics', '');
INSERT INTO `config` VALUES ('56', 'website_customer_service', '');
INSERT INTO `config` VALUES ('57', 'register_ip_limit', 5);
INSERT INTO `config` VALUES ('58', 'website_callback_url', '');
INSERT INTO `config` VALUES ('59', 'is_telegram', 0);
INSERT INTO `config` VALUES ('60', 'telegram_token', '');
INSERT INTO `config` VALUES ('61', 'telegram_chatid', '');
INSERT INTO `config` VALUES ('62', 'is_ban_status', 0);
INSERT INTO `config` VALUES ('63', 'is_namesilo', 0);
INSERT INTO `config` VALUES ('64', 'namesilo_key', '');
INSERT INTO `config` VALUES ('65', 'website_logo', '');
INSERT INTO `config` VALUES ('66', 'website_home_logo', '');
INSERT INTO `config` VALUES ('67', 'is_tcp_check', 0);
INSERT INTO `config` VALUES ('68', 'tcp_check_warning_times', 3);
INSERT INTO `config` VALUES ('69', 'is_forbid_china', 0);
INSERT INTO `config` VALUES ('70', 'is_forbid_oversea', 0);
INSERT INTO `config` VALUES ('71', 'is_verify_register', 0);
INSERT INTO `config` VALUES ('72', 'node_daily_report', 1);
INSERT INTO `config` VALUES ('73', 'mix_subscribe', 0);
INSERT INTO `config` VALUES ('74', 'subscribe_default_node', 0);
INSERT INTO `config` VALUES ('75', 'is_show_subscribe_expire', 0);
INSERT INTO `config` VALUES ('76', 'node_crash_warning_times', 10);
INSERT INTO `config` VALUES ('77', 'alipay_sign_type', 'MD5');
INSERT INTO `config` VALUES ('78', 'alipay_partner', '');
INSERT INTO `config` VALUES ('79', 'alipay_key', '');
INSERT INTO `config` VALUES ('80', 'alipay_private_key', '');
INSERT INTO `config` VALUES ('81', 'alipay_public_key', '');
INSERT INTO `config` VALUES ('82', 'alipay_transport', 'http');
INSERT INTO `config` VALUES ('83', 'alipay_currency', 'USD');
INSERT INTO `config` VALUES ('84', 'is_show_subscribe_traffic', 0);
INSERT INTO `config` VALUES ('85', 'f2fpay_app_id', '');
INSERT INTO `config` VALUES ('86', 'f2fpay_private_key', '');
INSERT INTO `config` VALUES ('87', 'f2fpay_public_key', '');
INSERT INTO `config` VALUES ('88', 'f2fpay_subject_name', '');
INSERT INTO `config` VALUES ('89', 'website_security_code', '');
INSERT INTO `config` VALUES ('90', 'geetest_id', '');
INSERT INTO `config` VALUES ('91', 'geetest_key', '');
INSERT INTO `config` VALUES ('92', 'google_captcha_sitekey', '');
INSERT INTO `config` VALUES ('93', 'google_captcha_secret', '');
INSERT INTO `config` VALUES ('94', 'user_invite_days', 7);
INSERT INTO `config` VALUES ('95', 'admin_invite_days', 7);
INSERT INTO `config` VALUES ('96', 'is_bark', 0);
INSERT INTO `config` VALUES ('97', 'bark_device', '');
INSERT INTO `config` VALUES ('98', 'subscribe_custom_words', '');
INSERT INTO `config` VALUES ('99', 'epay_url', '');
INSERT INTO `config` VALUES ('100', 'epay_mch_id', '');
INSERT INTO `config` VALUES ('101', 'epay_key', '');


-- ----------------------------
-- Table structure for `article`
-- ----------------------------
CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `author` varchar(50) DEFAULT '' COMMENT '作者',
  `summary` varchar(255) DEFAULT '' COMMENT '简介',
  `logo` varchar(255) DEFAULT '' COMMENT 'LOGO',
  `content` text COMMENT '内容',
  `type` tinyint(4) DEFAULT '1' COMMENT '类型：1-文章、2-公告、3-购买说明、4-使用教程',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  `deleted_at` datetime NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='文章';


-- ----------------------------
-- Records of `article`
-- ----------------------------
INSERT INTO article(title, author, content, type, sort)
VALUES('购买说明', '管理员', '<h4>购买流程：</h4><ol class=" list-paddingleft-2"><li><p>第一步：先购买基础套餐。</p></li><li><p>第二步：按需求，选择是否购买流量包。</p></li></ol><h4>基础套餐：</h4><ol class=" list-paddingleft-2"><li><p>在套餐生效的时间内，您将获得「套餐对应的网络速度」、「套餐内相应的流量」及其它特权。</p></li><li><p>基础套餐每月将会重置一次流量，重置日为购买日。</p></li><li><p>如在套餐未到期的情况下购买新套餐，则会导致旧套餐的所有配置立即失效，新套餐的配置立即生效。</p></li></ol><h4>流量包：</h4><ol class=" list-paddingleft-2"><li><p>当您在基础套餐重置日之前将流量耗尽，您可以选择购买流量包解燃眉之急。</p></li><li><p>流量包只在固定时间内增加可用流量，不会更改账户的配置，并且即时生效可以多个叠加。</p></li></ol>', '3', '0'), ('使用教程_Mac', '管理员', '<li> <a href=\"clients/ShadowsocksX-NG-R8-1.4.6.dmg\" target=\"_blank\">点击此处</a>下载客户端并启动 </li>\r\n<li> 点击状态栏纸飞机 -> 服务器 -> 编辑订阅 </li>\r\n<li> 点击窗口左下角 “+”号 新增订阅，完整复制本页上方“订阅服务”处地址，将其粘贴至“订阅地址”栏，点击右下角“OK” </li>\r\n<li> 点击纸飞机 -> 服务器 -> 手动更新订阅 </li>\r\n<li> 点击纸飞机 -> 服务器，选定合适服务器 </li>\r\n<li> 点击纸飞机 -> 打开Shadowsocks </li>\r\n<li> 点击纸飞机 -> PAC自动模式 </li>\r\n<li> 点击纸飞机 -> 代理设置->从 GFW List 更新 PAC </li>\r\n<li> 打开系统偏好设置 -> 网络，在窗口左侧选定显示为“已连接”的网络，点击右下角“高级...” </li>\r\n<li> 切换至“代理”选项卡，勾选“自动代理配置”和“不包括简单主机名”，点击右下角“好”，再次点击右下角“应用” </li>', '4', '1'), ('使用教程_Windows', '管理员', '<li> <a href=\"clients/ShadowsocksR-win.zip\" target=\"_blank\">点击此处</a>下载客户端并启动 </li>\r\n<li> 运行 ShadowsocksR 文件夹内的 ShadowsocksR.exe </li>\r\n<li> 右击桌面右下角状态栏（或系统托盘）纸飞机 -> 服务器订阅 -> SSR服务器订阅设置 </li>\r\n<li> 点击窗口左下角 “Add” 新增订阅，完整复制本页上方 “订阅服务” 处地址，将其粘贴至“网址”栏，点击“确定” </li>\r\n<li> 右击纸飞机 -> 服务器订阅 -> 更新SSR服务器订阅（不通过代理） </li>\r\n<li> 右击纸飞机 -> 服务器，选定合适服务器 </li>\r\n<li> 右击纸飞机 -> 系统代理模式 -> PAC模式 </li>\r\n<li> 右击纸飞机 -> PAC -> 更新PAC为GFWList </li>\r\n<li> 右击纸飞机 -> 代理规则 -> 绕过局域网和大陆 </li>\r\n<li> 右击纸飞机，取消勾选“服务器负载均衡” </li>', '4', '2'), ('使用教程_Linux', '管理员', '<li> <a href=\"clients/Shadowsocks-qt5-3.0.1.zip\" target=\"_blank\">点击此处</a>下载客户端并启动 </li>\r\n<li> 单击状态栏小飞机，找到服务器 -> 编辑订阅，复制黏贴订阅地址 </li>\r\n<li> 更新订阅设置即可 </li>', '4', '3'), ('使用教程_iOS', '管理员', '<li> 请从站长处获取 App Store 账号密码 </li>\r\n<li> 打开 Shadowrocket，点击右上角 “+”号 添加节点，类型选择 Subscribe </li>\r\n<li> 完整复制本页上方 “订阅服务” 处地址，将其粘贴至 “URL”栏，点击右上角 “完成” </li>\r\n<li> 左划新增的服务器订阅，点击 “更新” </li>\r\n<li> 选定合适服务器节点，点击右上角连接开关，屏幕上方状态栏出现“VPN”图标 </li>\r\n<li> 当进行海外游戏时请将 Shadowrocket “首页” 页面中的 “全局路由” 切换至 “代理”，并确保“设置”页面中的“UDP”已开启转发 </li>', '4', '4'), ('使用教程_Android', '管理员', '<li> <a href=\"clients/ShadowsocksRR-3.5.1.1.apk\" target=\"_blank\">点击此处</a>下载客户端并启动 </li>\r\n<li> 单击左上角的shadowsocksR进入配置文件页，点击右下角的“+”号，点击“添加/升级SSR订阅”，完整复制本页上方“订阅服务”处地址，填入订阅信息并保存 </li>\r\n<li> 选中任意一个节点，返回软件首页 </li>\r\n<li> 在软件首页处找到“路由”选项，并将其改为“绕过局域网及中国大陆地址” </li>\r\n<li> 点击右上角的小飞机图标进行连接，提示是否添加（或创建）VPN连接，点同意（或允许） </li>', '4', '5'), ('使用教程_Games', '管理员', '<li> <a href=\"clients/SSTap-beta-setup-1.0.9.7.zip\" target=\"_blank\">点击此处</a>下载客户端并安装 </li>\r\n<li> 打开 SSTap，选择 <i class=\"fa fa-cog\"></i> -> SSR订阅 -> SSR订阅管理，添加订阅地址 </li>\r\n<li> 添加完成后，再次选择 <i class=\"fa fa-cog\"></i> - SSR订阅 - 手动更新SSR订阅，即可同步节点列表。</li>\r\n<li> 在代理模式中选择游戏或「不代理中国IP」，点击「连接」即可加速。</li>\r\n<li> 需要注意的是，一旦连接成功，客户端会自动缩小到任务栏，可在设置中关闭。</li>', '4', '6');


-- ----------------------------
-- Table structure for `invite`
-- ----------------------------
CREATE TABLE `invite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '邀请人ID',
  `fuid` int(11) NOT NULL DEFAULT '0' COMMENT '受邀人ID',
  `code` char(32) NOT NULL COMMENT '邀请码',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '邀请码状态：0-未使用、1-已使用、2-已过期',
  `dateline` datetime DEFAULT NULL COMMENT '有效期至',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='邀请码表';


-- ----------------------------
-- Table structure for `label`
-- ----------------------------
CREATE TABLE `label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='标签';


-- ----------------------------
-- Records of `label`
-- ----------------------------
INSERT INTO `label` VALUES ('1', '电信', '0');
INSERT INTO `label` VALUES ('2', '联通', '0');
INSERT INTO `label` VALUES ('3', '移动', '0');
INSERT INTO `label` VALUES ('4', '教育网', '0');
INSERT INTO `label` VALUES ('5', 'IPv6', '0');


-- ----------------------------
-- Table structure for `verify`
-- ----------------------------
CREATE TABLE `verify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` TINYINT NOT NULL DEFAULT '1' COMMENT '激活类型：1-自行激活、2-管理员激活',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `token` varchar(32) NOT NULL COMMENT '校验token',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：0-未使用、1-已使用、2-已失效',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='账号激活邮件地址';


-- ----------------------------
-- Table structure for `verify_code`
-- ----------------------------
CREATE TABLE `verify_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL COMMENT '用户邮箱',
  `code` char(6) NOT NULL COMMENT '验证码',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：0-未使用、1-已使用、2-已失效',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='注册激活验证码';


-- ----------------------------
-- Table structure for `ss_group`
-- ----------------------------
CREATE TABLE `ss_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '分组名称',
  `level` tinyint(4) NOT NULL DEFAULT '1' COMMENT '分组级别',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='节点分组';


-- ----------------------------
-- Table structure for `ss_group_node`
-- ----------------------------
CREATE TABLE `ss_group_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL DEFAULT '0' COMMENT '分组ID',
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='分组节点关系表';


-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(15) NOT NULL DEFAULT '' COMMENT '商品服务SKU',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '商品名称',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '商品图片地址',
  `traffic` bigint(20) NOT NULL DEFAULT '0' COMMENT '商品内含多少流量，单位MiB',
  `level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '购买该商品后给用户授权的等级',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '商品类型：1-流量包、2-套餐、3-余额充值',
  `price` int(11) NOT NULL DEFAULT '0' COMMENT '售价，单位分',
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT '实际到账金额，单位分',
  `desc` varchar(255) DEFAULT '' COMMENT '商品描述',
  `days` int(11) NOT NULL DEFAULT '30' COMMENT '有效期',
  `speed` bigint(20) NOT NULL DEFAULT '-1' COMMENT '购买后限速，单位字节，默认-1不改变用户现有速率',
  `invite_num` int(11) NOT NULL DEFAULT '0' COMMENT '赠送邀请码数',
  `limit_num` int(11) NOT NULL DEFAULT '0' COMMENT '限购数量，默认为0不限购',
  `color` varchar(50) NOT NULL DEFAULT 'green' COMMENT '商品颜色',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `is_hot` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否热销：0-否、1-是',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0-下架、1-上架',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  `deleted_at` datetime NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='商品';


-- ----------------------------
-- Table structure for `coupon`
-- ----------------------------
CREATE TABLE `coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '优惠券名称',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT '优惠券LOGO',
  `sn` char(8) NOT NULL DEFAULT '' COMMENT '优惠券码',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '类型：1-现金券、2-折扣券、3-充值券',
  `usage` tinyint(4) NOT NULL DEFAULT '1' COMMENT '用途：1-仅限一次性使用、2-可重复使用',
  `amount` bigint(20) NOT NULL DEFAULT '0' COMMENT '金额，单位分',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '折扣',
  `available_start` int(11) NOT NULL DEFAULT '0' COMMENT '有效期开始',
  `available_end` int(11) NOT NULL DEFAULT '0' COMMENT '有效期结束',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0-未使用、1-已使用、2-已失效',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  `deleted_at` datetime NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='优惠券';


-- ----------------------------
-- Table structure for `coupon_log`
-- ----------------------------
CREATE TABLE `coupon_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) NOT NULL DEFAULT '0' COMMENT '优惠券ID',
  `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单ID',
  `desc` varchar(50) NOT NULL DEFAULT '' COMMENT '备注',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='优惠券使用日志';


-- ----------------------------
-- Table structure for `order`
-- ----------------------------
CREATE TABLE `order` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(20) NOT NULL DEFAULT '' COMMENT '订单编号',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '操作人',
  `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `coupon_id` int(11) NOT NULL DEFAULT '0' COMMENT '优惠券ID',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `origin_amount` int(11) NOT NULL DEFAULT '0' COMMENT '订单原始总价，单位分',
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT '订单总价，单位分',
  `expire_at` datetime DEFAULT NULL COMMENT '过期时间',
  `is_expire` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否已过期：0-未过期、1-已过期',
  `pay_way` tinyint(4) NOT NULL DEFAULT '1' COMMENT '支付方式：1-余额支付、2-码支付、3-易支付、4-支付宝国际、5-当面付',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '订单状态：-1-已关闭、0-待支付、1-已支付待确认、2-已完成',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后一次更新时间',
  PRIMARY KEY (`oid`),
  INDEX `idx_order_search` (`user_id`, `goods_id`, `is_expire`, `status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='订单';


-- ----------------------------
-- Table structure for `order_goods`
-- ----------------------------
CREATE TABLE `order_goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL DEFAULT '0' COMMENT '订单ID',
  `order_sn` varchar(20) NOT NULL DEFAULT '' COMMENT '订单编号',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `goods_id` int(11) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `num` int(11) NOT NULL DEFAULT '0' COMMENT '商品数量',
  `origin_price` int(11) NOT NULL DEFAULT '0' COMMENT '商品原价，单位分',
  `price` int(11) NOT NULL DEFAULT '0' COMMENT '商品实际价格，单位分',
  `is_expire` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否已过期：0-未过期、1-已过期',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='订单商品';


-- ----------------------------
-- Table structure for `ticket`
-- ----------------------------
CREATE TABLE `ticket` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：0-待处理、1-已处理未关闭、2-已关闭',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='工单';


-- ----------------------------
-- Table structure for `ticket_reply`
-- ----------------------------
CREATE TABLE `ticket_reply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL DEFAULT '0' COMMENT '工单ID',
  `user_id` int(11) NOT NULL COMMENT '回复人ID',
  `content` text NOT NULL COMMENT '回复内容',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='工单回复';


-- ----------------------------
-- Table structure for `user_balance_log`
-- ----------------------------
CREATE TABLE `user_balance_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '账号ID',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '订单ID',
  `before` int(11) NOT NULL DEFAULT '0' COMMENT '发生前余额，单位分',
  `after` int(11) NOT NULL DEFAULT '0' COMMENT '发生后金额，单位分',
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT '发生金额，单位分',
  `desc` varchar(255) DEFAULT '' COMMENT '操作描述',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户余额变动日志';


-- ----------------------------
-- Table structure for `user_traffic_modify_log`
-- ----------------------------
CREATE TABLE `user_traffic_modify_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '发生的订单ID',
  `before` bigint(20) NOT NULL DEFAULT '0' COMMENT '操作前流量',
  `after` bigint(20) NOT NULL DEFAULT '0' COMMENT '操作后流量',
  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户流量变动日志';


-- ----------------------------
-- Table structure for `referral_apply`
-- ----------------------------
CREATE TABLE `referral_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `before` int(11) NOT NULL DEFAULT '0' COMMENT '操作前可提现金额，单位分',
  `after` int(11) NOT NULL DEFAULT '0' COMMENT '操作后可提现金额，单位分',
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT '本次提现金额，单位分',
  `link_logs` text NOT NULL DEFAULT '' COMMENT '关联返利日志ID，例如：1,3,4',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：-1-驳回、0-待审核、1-审核通过待打款、2-已打款',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='提现申请';


-- ----------------------------
-- Table structure for `referral_log`
-- ----------------------------
CREATE TABLE `referral_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `ref_user_id` int(11) NOT NULL DEFAULT '0' COMMENT '推广人ID',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '关联订单ID',
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT '消费金额，单位分',
  `ref_amount` int(11) NOT NULL DEFAULT '0' COMMENT '返利金额',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：0-未提现、1-审核中、2-已提现',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='消费返利日志';


-- ----------------------------
-- Table structure for `email_log`
-- ----------------------------
CREATE TABLE `email_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` TINYINT(4) NOT NULL DEFAULT '1' COMMENT '类型：1-邮件、2-ServerChan、3-Bark、4-Telegram',
  `code` CHAR(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL COMMENT '消息对外可见的唯一识别码',
  `address` VARCHAR(255) NOT NULL COMMENT '收信地址',
  `title` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '标题',
  `content` TEXT NOT NULL COMMENT '内容',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：-1发送失败、0-等待发送、1-发送成功',
  `error` text COMMENT '发送失败抛出的异常信息',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='邮件投递记录';


-- ----------------------------
-- Table structure for `sensitive_words`
-- ----------------------------
CREATE TABLE `sensitive_words` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `type` TINYINT(4) NOT NULL DEFAULT '1' COMMENT '类型：1-黑名单、2-白名单',
  `words` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '敏感词',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='敏感词';


-- ----------------------------
-- Records of `sensitive_words`
-- ----------------------------
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'chacuo.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'chacuo.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', '1766258.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', '3202.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', '4057.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', '4059.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'a7996.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'bccto.me');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'bnuis.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'chaichuang.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'cr219.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'cuirushi.org');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'dawin.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'jiaxin8736.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'lakqs.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'urltc.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', '027168.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', '10minutemail.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', '11163.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', '1shivom.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'auoie.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'bareed.ws');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'bit-degree.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'cjpeg.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'cool.fr.nf');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'courriel.fr.nf');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'disbox.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'disbox.org');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'fidelium10.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'get365.pw');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'ggr.la');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'grr.la');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'guerrillamail.biz');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'guerrillamail.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'guerrillamail.de');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'guerrillamail.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'guerrillamail.org');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'guerrillamailblock.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'hubii-network.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'hurify1.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'itoup.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'jetable.fr.nf');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'jnpayy.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'juyouxi.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'mail.bccto.me');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'www.bccto.me');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'mega.zik.dj');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'moakt.co');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'moakt.ws');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'molms.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'moncourrier.fr.nf');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'monemail.fr.nf');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'monmail.fr.nf');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'nomail.xl.cx');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'nospam.ze.tc');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'pay-mon.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'poly-swarm.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'sgmh.online');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'sharklasers.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'shiftrpg.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'spam4.me');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'speed.1s.fr');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'tmail.ws');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'tmails.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'tmpmail.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'tmpmail.org');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'travala10.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'yopmail.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'yopmail.fr');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'yopmail.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'yuoia.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'zep-hyr.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'zippiex.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'lrc8.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', '1otc.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'emailna.co');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'mailinator.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'nbzmr.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'awsoo.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'zhcne.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', '0box.eu');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'contbay.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'damnthespam.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'kurzepost.de');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'objectmail.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'proxymail.eu');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'rcpt.at');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'trash-mail.at');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'trashmail.at');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'trashmail.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'trashmail.io');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'trashmail.me');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'trashmail.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'wegwerfmail.de');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'wegwerfmail.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'wegwerfmail.org');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'nwytg.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'despam.it');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'spambox.us');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'spam.la');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'mytrashmail.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'mt2014.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'mt2015.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'thankyou2010.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'trash2009.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'mt2009.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'trashymail.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'tempemail.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'slopsbox.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'mailnesia.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'ezehe.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'tempail.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'newairmail.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'temp-mail.org');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'linshiyouxiang.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'zwoho.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'mailboxy.fun');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'crypto-net.club');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'guerrillamail.info');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'pokemail.net');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'odmail.cn');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'hlooy.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'ozlaq.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', '666email.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'linshiyou.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'linshiyou.pl');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'woyao.pl');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('1', 'yaowo.pl');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('2', 'qq.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('2', '163.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('2', '126.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('2', '189.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('2', 'sohu.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('2', 'gmail.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('2', 'outlook.com');
INSERT INTO `sensitive_words` (`type`, `words`) VALUES ('2', 'icloud.com');


-- ----------------------------
-- Table structure for `user_subscribe`
-- ----------------------------
CREATE TABLE `user_subscribe` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `code` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '' COMMENT '订阅地址唯一识别码',
  `times` int(11) NOT NULL DEFAULT '0' COMMENT '地址请求次数',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态：0-禁用、1-启用',
  `ban_time` int(11) NOT NULL DEFAULT '0' COMMENT '封禁时间',
  `ban_desc` varchar(50) NOT NULL DEFAULT '' COMMENT '封禁理由',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  INDEX `user_id` (`user_id`, `status`),
  INDEX `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户订阅';


-- ----------------------------
-- Records of `user_subscribe`
-- ----------------------------
INSERT INTO `user_subscribe` (`id`, `user_id`, `code`) VALUES ('1', '1', 'SsXa1');


-- ----------------------------
-- Table structure for `user_subscribe_log`
-- ----------------------------
CREATE TABLE `user_subscribe_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sid` int(11) DEFAULT NULL COMMENT '对应user_subscribe的id',
  `request_ip` char(128) DEFAULT NULL COMMENT '请求IP',
  `request_time` datetime DEFAULT NULL COMMENT '请求时间',
  `request_header` text COMMENT '请求头部信息',
  PRIMARY KEY (`id`),
  INDEX `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户订阅访问日志';


-- ----------------------------
-- Table structure for `user_traffic_daily`
-- ----------------------------
CREATE TABLE `user_traffic_daily` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID，0表示统计全部节点',
  `u` bigint(20) NOT NULL DEFAULT '0' COMMENT '上传流量',
  `d` bigint(20) NOT NULL DEFAULT '0' COMMENT '下载流量',
  `total` bigint(20) NOT NULL DEFAULT '0' COMMENT '总流量',
  `traffic` varchar(255) DEFAULT '' COMMENT '总流量（带单位）',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  INDEX `idx_user_node` (`user_id`,`node_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户每日流量统计';


-- ----------------------------
-- Table structure for `user_traffic_hourly`
-- ----------------------------
CREATE TABLE `user_traffic_hourly` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID，0表示统计全部节点',
  `u` bigint(20) NOT NULL DEFAULT '0' COMMENT '上传流量',
  `d` bigint(20) NOT NULL DEFAULT '0' COMMENT '下载流量',
  `total` bigint(20) NOT NULL DEFAULT '0' COMMENT '总流量',
  `traffic` varchar(255) DEFAULT '' COMMENT '总流量（带单位）',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  INDEX `idx_user_node` (`user_id`,`node_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户每小时流量统计';


-- ----------------------------
-- Table structure for `node_traffic_daily`
-- ----------------------------
CREATE TABLE `ss_node_traffic_daily` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  `u` bigint(20) NOT NULL DEFAULT '0' COMMENT '上传流量',
  `d` bigint(20) NOT NULL DEFAULT '0' COMMENT '下载流量',
  `total` bigint(20) NOT NULL DEFAULT '0' COMMENT '总流量',
  `traffic` varchar(255) DEFAULT '' COMMENT '总流量（带单位）',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  INDEX `idx_node_id` (`node_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='节点每日流量统计';


-- ----------------------------
-- Table structure for `node_traffic_hourly`
-- ----------------------------
CREATE TABLE `ss_node_traffic_hourly` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  `u` bigint(20) NOT NULL DEFAULT '0' COMMENT '上传流量',
  `d` bigint(20) NOT NULL DEFAULT '0' COMMENT '下载流量',
  `total` bigint(20) NOT NULL DEFAULT '0' COMMENT '总流量',
  `traffic` varchar(255) DEFAULT '' COMMENT '总流量（带单位）',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  INDEX `idx_node_id` (`node_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='节点每小时流量统计';


-- ----------------------------
-- Table structure for `user_ban_log`
-- ----------------------------
CREATE TABLE `user_ban_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `minutes` int(11) NOT NULL DEFAULT '0' COMMENT '封禁账号时长，单位分钟',
  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '操作描述',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态：0-未处理、1-已处理',
  `created_at` datetime DEFAULT NULL COMMENT '创建时间',
  `updated_at` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户封禁日志';


-- ----------------------------
-- Table structure for `country`
-- ----------------------------
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `code` varchar(10) NOT NULL DEFAULT '' COMMENT '代码',
  `created_at` DATETIME NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` DATETIME NULL DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='国家代码';


-- ----------------------------
-- Records of `country`
-- ----------------------------
INSERT INTO `country` VALUES ('1', '澳大利亚', 'au', null, null);
INSERT INTO `country` VALUES ('2', '巴西', 'br', null, null);
INSERT INTO `country` VALUES ('3', '加拿大', 'ca', null, null);
INSERT INTO `country` VALUES ('4', '瑞士', 'ch', null, null);
INSERT INTO `country` VALUES ('5', '中国', 'cn', null, null);
INSERT INTO `country` VALUES ('6', '德国', 'de', null, null);
INSERT INTO `country` VALUES ('7', '丹麦', 'dk', null, null);
INSERT INTO `country` VALUES ('8', '埃及', 'eg', null, null);
INSERT INTO `country` VALUES ('9', '法国', 'fr', null, null);
INSERT INTO `country` VALUES ('10', '希腊', 'gr', null, null);
INSERT INTO `country` VALUES ('11', '香港', 'hk', null, null);
INSERT INTO `country` VALUES ('12', '印度尼西亚', 'id', null, null);
INSERT INTO `country` VALUES ('13', '爱尔兰', 'ie', null, null);
INSERT INTO `country` VALUES ('14', '以色列', 'il', null, null);
INSERT INTO `country` VALUES ('15', '印度', 'in', null, null);
INSERT INTO `country` VALUES ('16', '伊拉克', 'iq', null, null);
INSERT INTO `country` VALUES ('17', '伊朗', 'ir', null, null);
INSERT INTO `country` VALUES ('18', '意大利', 'it', null, null);
INSERT INTO `country` VALUES ('19', '日本', 'jp', null, null);
INSERT INTO `country` VALUES ('20', '韩国', 'kr', null, null);
INSERT INTO `country` VALUES ('21', '墨西哥', 'mx', null, null);
INSERT INTO `country` VALUES ('22', '马来西亚', 'my', null, null);
INSERT INTO `country` VALUES ('23', '荷兰', 'nl', null, null);
INSERT INTO `country` VALUES ('24', '挪威', 'no', null, null);
INSERT INTO `country` VALUES ('25', '纽西兰', 'nz', null, null);
INSERT INTO `country` VALUES ('26', '菲律宾', 'ph', null, null);
INSERT INTO `country` VALUES ('27', '俄罗斯', 'ru', null, null);
INSERT INTO `country` VALUES ('28', '瑞典', 'se', null, null);
INSERT INTO `country` VALUES ('29', '新加坡', 'sg', null, null);
INSERT INTO `country` VALUES ('30', '泰国', 'th', null, null);
INSERT INTO `country` VALUES ('31', '土耳其', 'tr', null, null);
INSERT INTO `country` VALUES ('32', '台湾', 'tw', null, null);
INSERT INTO `country` VALUES ('33', '英国', 'uk', null, null);
INSERT INTO `country` VALUES ('34', '美国', 'us', null, null);
INSERT INTO `country` VALUES ('35', '越南', 'vn', null, null);
INSERT INTO `country` VALUES ('36', '波兰', 'pl', null, null);
INSERT INTO `country` VALUES ('37', '哈萨克斯坦', 'kz', null, null);
INSERT INTO `country` VALUES ('38', '乌克兰', 'ua', null, null);
INSERT INTO `country` VALUES ('39', '罗马尼亚', 'ro', null, null);
INSERT INTO `country` VALUES ('40', '阿联酋', 'ae', null, null);
INSERT INTO `country` VALUES ('41', '南非', 'za', null, null);
INSERT INTO `country` VALUES ('42', '缅甸', 'mm', null, null);
INSERT INTO `country` VALUES ('43', '冰岛', 'is', null, null);
INSERT INTO `country` VALUES ('44', '芬兰', 'fi', null, null);
INSERT INTO `country` VALUES ('45', '卢森堡', 'lu', null, null);
INSERT INTO `country` VALUES ('46', '比利时', 'be', null, null);
INSERT INTO `country` VALUES ('47', '保加利亚', 'bg', null, null);
INSERT INTO `country` VALUES ('48', '立陶宛', 'lt', null, null);
INSERT INTO `country` VALUES ('49', '哥伦比亚', 'co', null, null);
INSERT INTO `country` VALUES ('50', '澳门', 'mo', null, null);
INSERT INTO `country` VALUES ('51', '肯尼亚', 'ke', null, null);
INSERT INTO `country` VALUES ('52', '捷克', 'cz', null, null);
INSERT INTO `country` VALUES ('53', '摩尔多瓦', 'md', null, null);
INSERT INTO `country` VALUES ('54', '西班牙', 'es', null, null);
INSERT INTO `country` VALUES ('55', '巴基斯坦', 'pk', null, null);
INSERT INTO `country` VALUES ('56', '葡萄牙', 'pt', null, null);
INSERT INTO `country` VALUES ('57', '匈牙利', 'hu', null, null);
INSERT INTO `country` VALUES ('58', '阿根廷', 'ar', null, null);


-- ----------------------------
-- Table structure for `payment`
-- ----------------------------
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `oid` int(11) DEFAULT NULL COMMENT '本地订单ID',
  `order_sn` varchar(50) DEFAULT NULL COMMENT '本地订单长ID',
  `pay_way` TINYINT(4) NOT NULL DEFAULT '1' COMMENT '支付方式：1-微信、2-支付宝、3-QQ钱包、4-财付通、5-信用卡',
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT '金额，单位分',
  `qr_id` int(11) NOT NULL DEFAULT '0' COMMENT '生成的支付单ID',
  `qr_url` varchar(255) DEFAULT NULL COMMENT '支付二维码URL',
  `qr_code` text COMMENT '生成的支付二维码图片base64',
  `qr_local_url` varchar(255) DEFAULT NULL COMMENT '支付二维码的本地存储URL',
  `jump_url` VARCHAR(255) NULL DEFAULT NULL COMMENT '跳转URL（打开跳转去别的URL支付）',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '状态：-1-支付失败、0-等待支付、1-支付成功',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='支付单';


-- ----------------------------
-- Table structure for `payment_callback`
-- ----------------------------
CREATE TABLE `payment_callback` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` TINYINT NULL COMMENT '支付方式：2-码支付、3-易支付、4-支付宝国际、5-当面付' COLLATE 'utf8mb4_unicode_ci',
  `trade_no` VARCHAR(100) NULL DEFAULT NULL COMMENT '外部订单号（支付平台）' COLLATE 'utf8mb4_unicode_ci',
  `out_trade_no` VARCHAR(100) NULL DEFAULT NULL COMMENT '本地订单号' COLLATE 'utf8mb4_unicode_ci',
  `amount` INT(0) NULL DEFAULT NULL COMMENT '交易金额，单位分' COLLATE 'utf8mb4_unicode_ci',
  `trade_status` TINYINT(1) NULL DEFAULT NULL COMMENT '交易状态：0-失败、1-成功' COLLATE 'utf8mb4_unicode_ci',
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB COLLATE='utf8mb4_unicode_ci' COMMENT='支付回调日志';


-- ----------------------------
-- Table structure for `marketing`
-- ----------------------------
CREATE TABLE `marketing` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` TINYINT(4) NOT NULL COMMENT '类型：1-邮件群发',
  `receiver` TEXT NOT NULL COMMENT '接收者' COLLATE 'utf8mb4_unicode_ci',
  `title` VARCHAR(255) NOT NULL COMMENT '标题' COLLATE 'utf8mb4_unicode_ci',
  `content` TEXT NOT NULL COMMENT '内容' COLLATE 'utf8mb4_unicode_ci',
  `status` TINYINT(4) NOT NULL COMMENT '状态：-1-失败、0-待发送、1-成功',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='营销';


-- ----------------------------
-- Table structure for `user_login_log`
-- ----------------------------
CREATE TABLE `user_login_log` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL DEFAULT '0',
  `ip` CHAR(128) NOT NULL,
  `country` CHAR(20) NOT NULL,
  `province` CHAR(20) NOT NULL,
  `city` CHAR(20) NOT NULL,
  `county` CHAR(20) NOT NULL,
  `isp` CHAR(20) NOT NULL,
  `area` CHAR(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='用户登录日志';


-- ----------------------------
-- Table structure for `ss_node_ip`
-- ----------------------------
CREATE TABLE `ss_node_ip` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  `user_id` INT(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `port` int(11) NOT NULL DEFAULT '0' COMMENT '端口',
  `type` char(10) NOT NULL DEFAULT 'tcp' COMMENT '类型：all、tcp、udp',
  `ip` text COMMENT '连接IP：每个IP用,号隔开',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '上报时间',
  PRIMARY KEY (`id`),
  INDEX `idx_node` (`node_id`, `user_id`),
  INDEX `idx_port` (`port`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='在线IP';


-- ----------------------------
-- Table structure for `rule`
-- ----------------------------
CREATE TABLE `rule` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `type` char(20) NOT NULL DEFAULT '0' COMMENT '类型：reg-正则表达式、domain-域名、ip-IP、protocol-协议',
  `name` VARCHAR(100) NOT NULL COMMENT '规则描述',
  `pattern` TEXT NOT NULL COMMENT '规则值',
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='审计规则';


-- ----------------------------
-- Records of `rule`
-- ----------------------------
INSERT INTO `rule` (`id`, `type`, `name`, `pattern`, `created_at`, `updated_at`) VALUES
  (1, 'reg', '360', '(.*\.||)(^360|0360|1360|3600|360safe|^so|qhimg|qhmsg|^yunpan|qihoo|qhcdn|qhupdate|360totalsecurity|360shouji|qihucdn|360kan|secmp)\.(cn|com|net)', '2019-07-19 15:04:11', '2019-07-19 15:04:11'),
  (2, 'reg', '腾讯管家', '(\.guanjia\.qq\.com|qqpcmgr|QQPCMGR)', '2019-07-19 15:04:11', '2019-07-19 15:04:11'),
  (3, 'reg', '金山毒霸', '(.*\.||)(rising|kingsoft|duba|xindubawukong|jinshanduba)\.(com|net|org)', '2019-07-19 15:04:11', '2019-07-19 15:04:11'),
  (4, 'reg', '暗网相关', '(.*\.||)(netvigator|torproject)\.(cn|com|net|org)', '2019-07-19 15:04:11', '2019-07-19 15:04:11'),
  (5, 'reg', '百度定位', '(api|ps|sv|offnavi|newvector|ulog\\.imap|newloc|tracknavi)(\\.map|)\\.(baidu|n\\.shifen)\\.com', '2019-07-19 15:05:06', '2019-07-19 15:05:06'),
  (6, 'reg', '法轮功类', '(.*\\.||)(dafahao|minghui|dongtaiwang|dajiyuan|falundata|shenyun|tuidang|epochweekly|epochtimes|ntdtv|falundafa|wujieliulan|zhengjian)\\.(org|com|net)', '2019-07-19 15:05:46', '2019-07-19 15:05:46'),
  (7, 'reg', 'BT扩展名', '(torrent|\\.torrent|peer_id=|info_hash|get_peers|find_node|BitTorrent|announce_peer|announce\\.php\\?passkey=)', '2019-07-19 15:06:07', '2019-07-19 15:06:07'),
  (8, 'reg', '邮件滥发', '((^.*\@)(guerrillamail|guerrillamailblock|sharklasers|grr|pokemail|spam4|bccto|chacuo|027168)\.(info|biz|com|de|net|org|me|la)|Subject|HELO|SMTP)', '2019-07-19 15:06:20', '2019-07-19 15:06:20'),
  (9, 'reg', '迅雷下载', '(.?)(xunlei|sandai|Thunder|XLLiveUD)(.)', '2019-07-19 15:06:31', '2019-07-19 15:06:31'),
  (10, 'reg', '大陆应用', '(.*\\.||)(qq|163|sohu|sogoucdn|sogou|uc|58|taobao)\\.(org|com|net|cn)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
  (11, 'reg', '大陆银行', '(.*\\.||)(icbc|ccb|boc|bankcomm|abchina|cmbchina|psbc|cebbank|cmbc|pingan|spdb|citicbank|cib|hxb|bankofbeijing|hsbank|tccb|4001961200|bosc|hkbchina|njcb|nbcb|lj-bank|bjrcb|jsbchina|gzcb|cqcbank|czbank|hzbank|srcb|cbhb|cqrcb|grcbank|qdccb|bocd|hrbcb|jlbank|bankofdl|qlbchina|dongguanbank|cscb|hebbank|drcbank|zzbank|bsb|xmccb|hljrcc|jxnxs|gsrcu|fjnx|sxnxs|gx966888|gx966888|zj96596|hnnxs|ahrcu|shanxinj|hainanbank|scrcu|gdrcu|hbxh|ynrcc|lnrcc|nmgnxs|hebnx|jlnls|js96008|hnnx|sdnxs)\\.(org|com|net|cn)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
  (12, 'reg', '台湾银行', '(.*\\.||)(firstbank|bot|cotabank|megabank|tcb-bank|landbank|hncb|bankchb|tbb|ktb|tcbbank|scsb|bop|sunnybank|kgibank|fubon|ctbcbank|cathaybk|eximbank|bok|ubot|feib|yuantabank|sinopac|esunbank|taishinbank|jihsunbank|entiebank|hwataibank|csc|skbank)\\.(org|com|net|tw)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
  (13, 'reg', '大陆第三方支付', '(.*\\.||)(alipay|baifubao|yeepay|99bill|95516|51credit|cmpay|tenpay|lakala|jdpay)\\.(org|com|net|cn)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
  (14, 'reg', '台湾特供', '(.*\.||)(visa|mycard|mastercard|gov|gash|beanfun|bank|line)\.(org|com|net|cn|tw|jp|kr)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
  (15, 'reg', '涉政治类', '(.*\\.||)(shenzhoufilm|secretchina|renminbao|aboluowang|mhradio|guangming|zhengwunet|soundofhope|yuanming|zhuichaguoji|fgmtv|xinsheng|shenyunperformingarts|epochweekly|tuidang|shenyun|falundata|bannedbook)\\.(org|com|net)', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `rule_group`
-- ----------------------------
CREATE TABLE `rule_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) DEFAULT '1' COMMENT '模式：1-阻断、2-仅放行',
  `name` varchar(255) DEFAULT NULL COMMENT '分组名称',
  `rules` text COMMENT '关联的规则ID，多个用,号分隔',
  `nodes` text COMMENT '关联的节点ID，多个用,号分隔',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='审计规则分组';


-- ----------------------------
-- Records of `rule_group`
-- ----------------------------
INSERT INTO `rule_group` (`id`, `type`, `name`, `rules`, `nodes`, `created_at`, `updated_at`) VALUES
(1, 1, '默认', '1,2,3,4,5,6,7,8,9,10,11,12,13,14', NULL, '2019-10-26 15:29:48', '2019-10-26 15:29:48');


-- ----------------------------
-- Table structure for `rule_group_node`
-- ----------------------------
CREATE TABLE `rule_group_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_group_id` int(11) DEFAULT '0' COMMENT '规则分组ID',
  `node_id` int(11) DEFAULT '0' COMMENT '节点ID',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='审计规则分组节点关联表';


-- ----------------------------
-- Table structure for `rule_log`
-- ----------------------------
CREATE TABLE `rule_log` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `node_id` INT(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  `rule_id` INT(11) NOT NULL DEFAULT '0' COMMENT '规则ID，0表示白名单模式下访问访问了非规则允许的网址',
  `reason` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '触发原因',
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx` (`user_id`, `node_id`, `rule_id`)
) ENGINE=InnoDB COMMENT='触发审计规则日志表';


-- ----------------------------
-- Table structure for `ss_node_rule`
-- ----------------------------
CREATE TABLE `ss_node_rule` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `node_id` INT(11) NOT NULL DEFAULT '0' COMMENT '节点ID',
  `rule_id` INT(11) NOT NULL DEFAULT '0' COMMENT '审计规则ID',
  `is_black` TINYINT(4) NOT NULL DEFAULT '1' COMMENT '是否黑名单模式：0-不是、1-是',
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='节点审计规则关联';


-- ----------------------------
-- Records of `failed_jobs`
-- ----------------------------
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='失败任务';


-- ----------------------------
-- Records of `jobs`
-- ----------------------------
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='任务';


-- ----------------------------
-- Records of `migrations`
-- ----------------------------
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='迁移';


-- ----------------------------
-- Records of `access`
-- ----------------------------
CREATE TABLE `access` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `node_id` INT(11) NOT NULL DEFAULT '0' COMMENT '授权节点ID',
  `key` CHAR(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '' COMMENT '认证KEY',
  `secret` CHAR(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '' COMMENT '通信密钥',
  `created_at` DATETIME NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` DATETIME NULL DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  INDEX `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='授权密钥表';


-- 权限表
CREATE TABLE `permissions` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NOT NULL,
  `guard_name` VARCHAR(191) NOT NULL,
  `description` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) COLLATE='utf8mb4_unicode_ci' ENGINE=MyISAM;


-- 角色表
CREATE TABLE `roles` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NOT NULL,
  `guard_name` VARCHAR(191) NOT NULL,
  `description` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) COLLATE='utf8mb4_unicode_ci' ENGINE=MyISAM;


-- 模型权限关联表
CREATE TABLE `model_has_permissions` (
  `permission_id` INT(10) UNSIGNED NOT NULL,
  `model_type` VARCHAR(191) NOT NULL,
  `model_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`),
  INDEX `model_has_permissions_model_id_model_type_index` (`model_id`, `model_type`)
) COLLATE='utf8mb4_unicode_ci' ENGINE=MyISAM;


-- 模型角色关联表
CREATE TABLE `model_has_roles` (
  `role_id` INT(10) UNSIGNED NOT NULL,
  `model_type` VARCHAR(191) NOT NULL,
  `model_id` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`),
  INDEX `model_has_roles_model_id_model_type_index` (`model_id`, `model_type`)
) COLLATE='utf8mb4_unicode_ci' ENGINE=MyISAM;


-- 角色权限表
CREATE TABLE `role_has_permissions` (
  `permission_id` INT(10) UNSIGNED NOT NULL,
  `role_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`),
  INDEX `role_has_permissions_role_id_foreign` (`role_id`)
) COLLATE='utf8mb4_unicode_ci' ENGINE=MyISAM;


-- 导入权限行为数据
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '管理后台首页', '2018-11-02 10:30:58', '2018-11-02 10:30:58'),
	(2, 'admin/userList', 'web', '用户管理-用户列表', '2018-11-02 10:31:19', '2018-11-02 10:31:19'),
	(3, 'admin/addUser', 'web', '用户管理-添加用户', '2018-11-02 10:31:31', '2018-11-02 10:31:31'),
	(4, 'admin/editUser', 'web', '用户管理-编辑用户', '2018-11-02 10:31:53', '2018-11-02 10:31:53'),
	(5, 'admin/delUser', 'web', '用户管理-删除用户', '2018-11-02 10:32:21', '2018-11-02 10:32:21'),
	(6, 'admin/batchAddUsers', 'web', '用户管理-批量生成用户', '2018-11-02 10:32:36', '2018-11-02 10:32:36'),
	(7, 'admin/exportSSJson', 'web', '用户管理-导出用户的SS配置', '2018-11-02 10:32:48', '2018-11-02 10:32:48'),
	(8, 'admin/nodeList', 'web', '节点管理-节点列表', '2018-11-02 10:33:11', '2018-11-02 10:33:11'),
	(9, 'admin/addNode', 'web', '节点管理-添加节点', '2018-11-02 10:33:24', '2018-11-02 10:33:24'),
	(10, 'admin/editNode', 'web', '节点管理-编辑节点', '2018-11-02 10:33:37', '2018-11-02 10:33:37'),
	(11, 'admin/delNode', 'web', '节点管理-删除节点', '2018-11-02 10:33:50', '2018-11-02 10:33:50'),
	(12, 'admin/nodeMonitor', 'web', '节点管理-节点流量监控', '2018-11-02 10:34:07', '2018-11-02 10:34:07'),
	(13, 'admin/articleList', 'web', '文章管理-文章列表', '2018-11-02 10:34:25', '2018-11-02 10:34:25'),
	(14, 'admin/addArticle', 'web', '文章管理-添加文章', '2018-11-02 10:34:37', '2018-11-02 10:34:37'),
	(15, 'admin/editArticle', 'web', '文章管理-编辑文章', '2018-11-02 10:34:51', '2018-11-02 10:34:51'),
	(16, 'admin/delArticle', 'web', '文章管理-删除文章', '2018-11-02 10:35:03', '2018-11-02 10:35:03'),
	(17, 'admin/groupList', 'web', '节点管理-节点分组列表', '2018-11-02 10:35:28', '2018-11-02 10:35:28'),
	(18, 'admin/addGroup', 'web', '节点管理-添加节点分组', '2018-11-02 10:35:43', '2018-11-02 10:35:43'),
	(19, 'admin/editGroup', 'web', '节点管理-编辑节点分组', '2018-11-02 10:35:55', '2018-11-02 10:35:55'),
	(20, 'admin/delGroup', 'web', '节点管理-删除节点分组', '2018-11-02 10:36:07', '2018-11-02 10:36:07'),
	(21, 'admin/labelList', 'web', '标签管理-标签列表', '2018-11-02 10:36:27', '2018-11-02 10:36:27'),
	(22, 'admin/addLabel', 'web', '标签管理-添加标签', '2018-11-02 10:36:40', '2018-11-02 10:36:40'),
	(23, 'admin/editLabel', 'web', '标签管理-编辑标签', '2018-11-02 10:36:51', '2018-11-02 10:36:51'),
	(24, 'admin/delLabel', 'web', '标签管理-删除标签', '2018-11-02 10:37:02', '2018-11-02 10:37:02'),
	(25, 'ticket/ticketList', 'web', '工单管理-工单列表', '2018-11-02 10:37:17', '2018-11-02 10:37:17'),
	(26, 'ticket/replyTicket', 'web', '工单管理-回复工单', '2018-11-02 10:37:28', '2018-11-02 10:37:28'),
	(27, 'ticket/closeTicket', 'web', '工单管理-关闭工单', '2018-11-02 10:37:41', '2018-11-02 10:37:41'),
	(28, 'admin/orderList', 'web', '订单管理-订单列表', '2018-11-02 10:38:48', '2018-11-02 10:38:48'),
	(29, 'admin/inviteList', 'web', '邀请管理-邀请码列表', '2018-11-02 10:39:03', '2018-11-02 10:39:03'),
	(30, 'admin/makeInvite', 'web', '邀请管理-生成邀请码', '2018-11-02 10:39:23', '2018-11-02 10:39:23'),
	(31, 'admin/exportInvite', 'web', '邀请管理-导出邀请码', '2018-11-02 10:39:41', '2018-11-02 10:39:41'),
	(32, 'admin/applyList', 'web', '提现管理-体现申请列表', '2018-11-02 10:40:36', '2018-11-02 10:40:36'),
	(33, 'admin/applyDetail', 'web', '提现管理-提现申请详情', '2018-11-02 10:41:12', '2018-11-02 10:41:12'),
	(34, 'admin/setApplyStatus', 'web', '提现管理-设置提现申请状态', '2018-11-02 10:41:34', '2018-11-02 10:41:34'),
	(35, 'coupon/couponList', 'web', '卡券管理-卡券列表', '2018-11-02 10:51:42', '2018-11-02 10:51:42'),
	(36, 'coupon/addCoupon', 'web', '卡券管理-添加卡券', '2018-11-02 10:51:57', '2018-11-02 10:51:57'),
	(37, 'coupon/delCoupon', 'web', '卡券管理-删除卡券', '2018-11-02 10:52:09', '2018-11-02 10:52:09'),
	(38, 'coupon/exportCoupon', 'web', '卡券管理-导出卡券', '2018-11-02 10:52:25', '2018-11-02 10:52:25'),
	(39, 'shop/goodsList', 'web', '商品管理-商品列表', '2018-11-02 10:54:58', '2018-11-02 10:54:58'),
	(40, 'shop/addGoods', 'web', '商品管理-添加商品', '2018-11-02 10:55:13', '2018-11-02 10:55:13'),
	(41, 'shop/editGoods', 'web', '商品管理-编辑商品', '2018-11-02 10:55:27', '2018-11-02 10:55:27'),
	(42, 'shop/delGoods', 'web', '商品管理-删除商品', '2018-11-02 10:55:37', '2018-11-02 10:55:37'),
	(43, 'admin/config', 'web', '设置-通用配置列表', '2018-11-02 11:18:20', '2018-11-02 11:18:20'),
	(44, 'admin/addConfig', 'web', '配置-添加通用配置', '2018-11-02 11:18:58', '2018-11-02 11:18:58'),
	(45, 'admin/delConfig', 'web', '配置-删除通用配置', '2018-11-02 11:19:22', '2018-11-02 11:19:22'),
	(49, 'admin/addCountry', 'web', '配置-通用配置-添加国家', '2018-11-02 11:20:52', '2018-11-02 11:20:52'),
	(50, 'admin/updateCountry', 'web', '配置-通用配置-编辑国家', '2018-11-02 11:24:44', '2018-11-02 11:24:44'),
	(51, 'admin/delCountry', 'web', '配置-通用配置-删除国家', '2018-11-02 11:24:58', '2018-11-02 11:24:58'),
	(52, 'admin/setDefaultConfig', 'web', '配置-通用配置-设置默认值', '2018-11-02 11:25:20', '2018-11-02 11:25:20'),
	(53, 'admin/system', 'web', '设置-系统配置-配置列表', '2018-11-02 15:25:56', '2018-11-02 15:25:56'),
	(54, 'admin/setExtend', 'web', '设置-系统配置-设置客服统计', '2018-11-02 15:26:19', '2018-11-02 15:26:19'),
	(55, 'admin/setConfig', 'web', '配置-系统设置-设置某个配置项', '2018-11-02 15:26:46', '2018-11-02 15:26:46'),
	(56, 'admin/subscribeLog', 'web', '用户管理-订阅管理', '2018-11-02 15:27:36', '2018-11-02 15:27:36'),
	(57, 'admin/setSubscribeStatus', 'web', '用户管理-订阅管理-启用禁用订阅', '2018-11-02 15:28:04', '2018-11-02 15:28:04'),
	(58, 'admin/userBalanceLogList', 'web', '用户管理-余额变动记录', '2018-11-02 15:28:19', '2018-11-02 15:28:19'),
	(59, 'admin/userTrafficLogList', 'web', '用户管理-流量变动记录', '2018-11-02 15:28:32', '2018-11-02 15:28:32'),
	(60, 'admin/userRebateList', 'web', '用户管理-返利流水记录', '2018-11-02 15:28:46', '2018-11-02 15:28:46'),
	(61, 'admin/userBanLogList', 'web', '用户管理-用户封禁记录', '2018-11-02 15:28:56', '2018-11-02 15:28:56'),
	(62, 'admin/export', 'web', '用户管理-用户列表-导出(查看)配置信息', '2018-11-02 15:29:20', '2018-11-02 15:29:20'),
	(63, 'admin/userMonitor', 'web', '用户管理-用户列表-用户流量监控', '2018-11-02 15:29:34', '2018-11-02 15:29:34'),
	(64, 'admin/resetUserTraffic', 'web', '用户管理-用户列表-重置用户流量', '2018-11-02 15:32:48', '2018-11-02 15:32:48'),
	(65, 'admin/handleUserBalance', 'web', '用户管理-用户列表-用户余额充值', '2018-11-02 15:46:03', '2018-11-02 15:46:03'),
	(66, 'admin/switchToUser', 'web', '用户管理-用户列表-转换成某个用户的身份', '2018-11-02 15:46:35', '2018-11-02 15:46:35'),
	(67, 'admin/decompile', 'web', '工具箱-反解析', '2018-11-02 15:47:24', '2018-11-02 15:47:24'),
	(68, 'admin/download', 'web', '工具箱-下载转换过的JSON配置', '2018-11-02 15:48:01', '2018-11-02 15:48:01'),
	(69, 'admin/convert', 'web', '工具箱-格式转换', '2018-11-02 15:48:16', '2018-11-02 15:48:16'),
	(70, 'admin/import', 'web', '工具箱-数据导入', '2018-11-02 15:48:33', '2018-11-02 15:48:33'),
	(71, 'admin/trafficLog', 'web', '工具箱-流量日志', '2018-11-02 15:48:49', '2018-11-02 15:48:49'),
	(72, 'admin/analysis', 'web', '工具箱-日志分析', '2018-11-02 15:49:07', '2018-11-02 15:49:07'),
	(73, 'emailLog/logList', 'web', '工具箱-邮件发送日志', '2018-11-02 15:49:33', '2018-11-02 15:49:33'),
	(74, 'payment/callbackList', 'web', '工具箱-支付回调日志', '2018-11-02 15:50:10', '2018-11-02 15:50:10'),
	(75, 'sensitiveWords/list', 'web', '工具箱-敏感词管理-敏感词列表', '2018-11-02 16:42:13', '2018-11-02 16:42:13'),
	(76, 'sensitiveWords/add', 'web', '工具箱-敏感词管理-添加敏感词', '2018-11-02 16:42:27', '2018-11-02 16:42:27'),
	(77, 'sensitiveWords/del', 'web', '工具箱-敏感词管理-删除敏感词', '2018-11-02 16:42:39', '2018-11-02 16:42:39'),
	(78, 'logs', 'web', '工具箱-系统运行日志', '2018-11-02 16:43:07', '2018-11-02 16:43:07'),
	(79, 'marketing/emailList', 'web', '营销管理-邮件消息列表', '2018-11-02 16:43:59', '2018-11-02 16:43:59'),
	(80, 'marketing/pushList', 'web', '营销管理-推送消息列表', '2018-11-02 16:44:16', '2018-11-02 16:44:16'),
	(81, 'marketing/addPushMarketing', 'web', '营销管理-推送消息', '2018-11-02 16:44:31', '2018-11-02 16:44:31'),
	(82, 'admin/profile', 'web', '管理后台-修改个人信息', '2018-11-02 17:11:53', '2018-11-02 17:11:53'),
	(83, 'admin/makePort', 'web', '管理后台-用户列表-生成端口', '2018-11-02 17:12:15', '2018-11-02 17:12:15'),
	(84, 'permission/permissionList', 'web', '权限管理-行为列表', '2018-11-02 17:14:45', '2018-11-02 17:14:45'),
	(85, 'permission/addPermission', 'web', '权限管理-创建行为', '2018-11-02 17:14:55', '2018-11-02 17:14:55'),
	(86, 'permission/editPermission', 'web', '权限管理-编辑行为', '2018-11-02 17:15:07', '2018-11-02 17:15:07'),
	(87, 'permission/deletePermission', 'web', '权限管理-删除行为', '2018-11-02 17:15:15', '2018-11-02 17:15:15'),
	(88, 'permission/roleList', 'web', '权限管理-角色列表', '2018-11-02 17:15:25', '2018-11-02 17:15:25'),
	(89, 'permission/addRole', 'web', '权限管理-创建角色', '2018-11-02 17:15:33', '2018-11-02 17:15:33'),
	(90, 'permission/editRole', 'web', '权限管理-编辑角色', '2018-11-02 17:15:41', '2018-11-02 17:15:41'),
	(91, 'permission/deleteRole', 'web', '权限管理-删除角色', '2018-11-02 17:15:49', '2018-11-02 17:15:49'),
	(92, 'permission/masterList', 'web', '权限管理-管理员列表', '2018-11-02 17:15:56', '2018-11-02 17:15:56'),
	(93, 'permission/deleteMaster', 'web', '权限管理-删除管理员', '2018-11-02 17:16:04', '2018-11-02 17:16:04'),
	(94, 'permission/assignPermission', 'web', '权限管理-分配行为', '2018-11-02 17:16:12', '2018-11-02 17:16:12'),
	(95, 'permission/assignRole', 'web', '权限管理-分配角色', '2018-11-02 17:16:20', '2018-11-02 17:16:20');

-- 导入角色数据
INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'superadmin', 'web', '超级管理员', '2018-11-02 17:23:45', '2018-11-02 17:23:45'),
	(2, 'admin', 'web', '普通管理员', '2018-11-02 17:23:55', '2018-11-02 17:23:55'),
	(3, 'seniortech', 'web', '高级技术员', '2018-11-02 17:25:20', '2018-11-02 17:25:20');

-- 账号admin的所有权限
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`)
VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1),
	(5,1),
	(6,1),
	(7,1),
	(8,1),
	(9,1),
	(10,1),
	(11,1),
	(12,1),
	(13,1),
	(14,1),
	(15,1),
	(16,1),
	(17,1),
	(18,1),
	(19,1),
	(20,1),
	(21,1),
	(22,1),
	(23,1),
	(24,1),
	(25,1),
	(26,1),
	(27,1),
	(28,1),
	(29,1),
	(30,1),
	(31,1),
	(32,1),
	(33,1),
	(34,1),
	(35,1),
	(36,1),
	(37,1),
	(38,1),
	(39,1),
	(40,1),
	(41,1),
	(42,1),
	(43,1),
	(44,1),
	(45,1),
	(46,1),
	(47,1),
	(48,1),
	(49,1),
	(50,1),
	(51,1),
	(52,1),
	(53,1),
	(54,1),
	(55,1),
	(56,1),
	(57,1),
	(58,1),
	(59,1),
	(60,1),
	(61,1),
	(62,1),
	(63,1),
	(64,1),
	(65,1),
	(66,1),
	(67,1),
	(68,1),
	(69,1),
	(70,1),
	(71,1),
	(72,1),
	(73,1),
	(74,1),
	(75,1),
	(76,1),
	(77,1),
	(78,1),
	(79,1),
	(80,1),
	(81,1),
	(82,1),
	(83,1),
	(84,1),
	(85,1),
	(86,1),
	(87,1),
	(88,1),
	(89,1),
	(90,1),
	(91,1),
	(92,1),
	(93,1),
	(94,1),
	(95,1);

-- admin账号默认拥有的角色
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`)
VALUES (1,'App\\Http\\Models\\User',1);



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

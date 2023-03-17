CREATE TABLE IF NOT EXISTS `$prefix$table` (
  `mid` mediumint(8) unsigned NOT NULL,
  `zan` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `skin` varchar(30) NOT NULL,
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '性别',
  `qq` varchar(11) NOT NULL COMMENT 'QQ号码',
  `birthday` int(10) NOT NULL COMMENT '生日',
  `sign` varchar(50) NOT NULL COMMENT '个性签名',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员扩展表';
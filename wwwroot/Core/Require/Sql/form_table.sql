CREATE TABLE IF NOT EXISTS `$prefix$table` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `ip` bigint(20) unsigned NOT NULL DEFAULT '0',
  `save_time` int(10) unsigned NOT NULL DEFAULT '0',
  `cid` mediumint(8) unsigned NOT NULL COMMENT '导航id',
  `aid` mediumint(8) unsigned NOT NULL COMMENT '文章内容id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=$charset AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `$prefix$table_data` (
  `aid` mediumint(8) unsigned NOT NULL,
  `keywords` varchar(60) NOT NULL COMMENT '关键字',
  `source` varchar(60) NOT NULL COMMENT '来源',
  `content` text NOT NULL COMMENT '内容',
  `page` varchar(10) NOT NULL COMMENT '分页',
  `relevant` varchar(100) NOT NULL COMMENT '相关文章',
  `images` text NOT NULL COMMENT '图集',
  `down_file` text NOT NULL COMMENT '下载',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=$charset;
<?php
/**
 * 网站核心配置，可手动修改，但不建议
 */
return array(
	/**分组模式**/
	'APP_GROUP_LIST' => 'Back,Attachment,Content,Api,Member,Modules,Paper,Deal',      // 项目分组设定,多个组之间用逗号分隔,例如'Home,Admin'
	'APP_GROUP_MODE'        =>  1,  // 分组模式 0 普通分组 1 独立分组
	'APP_GROUP_PATH'        =>  'Modules',//独立分组路径
	'DEFAULT_GROUP'=>'Content', //默认分组

	'LOAD_EXT_CONFIG'=>'core,site,mutual,attachment,email,ext',//自动加载配置

	'URL_CASE_INSENSITIVE'=>true,//URL不区分大小写
	'TMPL_L_DELIM'=>'{-',
	'TMPL_R_DELIM'=>'-}',
	/*认证方式*/
	'AUTH_CONFIG'=>array(
			'AUTH_ON' => true, //认证开关
			'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
			'AUTH_GROUP' => 'h_admin_group', //用户组数据表名
			'AUTH_GROUP_ACCESS' => 'h_admin_group_access', //用户组明细表
			'AUTH_RULE' => 'h_admin_rule', //权限规则表
			'AUTH_USER' => 'h_admin'//用户信息表
	),
	'APP_AUTOLOAD_PATH' =>'ORG,ORG.Com,ORG.Util,ORG.Net,ORG.Crypt',//自动加载类库包

	//默认皮肤
	'DEFAULT_THEME'=>'Default',
	//管理员标记
	'ADMIN_SESSION'=>'admin_session',//后台用户标记
	'SUPER_ADMIN'=>'SUPER_ADMIN',//超级管理员标记

	//首先要开启子域名，后台中有设置
	'APP_SUB_DOMAIN_DEPLOY'=>false,
	/*子域名配置     *格式如: '子域名'=>array('分组名/[模块名]','var1=a&var2=b');     */
	'APP_SUB_DOMAIN_RULES'=>array(
		
	),
	
	'TMPL_PARSE_STRING' =>array(
			'__APP_PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Tpl/Public',//app
			/*  Default  => 也请修改，它是site.php中的DEFAULT_SKIN配置*/
			//'__TEMPLATE_PUBLIC__'=>__ROOT__.'/'.APP_PATH.TEMPLATE_DIR.'/Default/Public',//这里 Default是网站默认skin
			'__TEMPLATE__'=>__ROOT__.'/'.APP_PATH.TEMPLATE_DIR,//前台模板目录
	),

	'DB_HOST'               => '127.0.0.1', // 服务器地址
//	'DB_USER'               => 'tongwei2017',      // 用户名
	'DB_USER'               => 'root',      // 用户名
//	'DB_PWD'                => 'tongweiTw6886123',          // 密码
	'DB_PWD'                => '123456',          // 密码
	'DB_PORT'               => '3306',        // 端口
	'DB_TYPE'				=> 'mysql',
	'DB_NAME'				=> 'new_tongwei_com',
	'DB_PREFIX'				=> 'h_',
);
?>
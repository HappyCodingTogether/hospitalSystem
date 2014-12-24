<?php
return array(
	//'配置项'=>'配置值'
    //数据库配置信息
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'hospital', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'hospital_', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集

    // 显示页面Trace信息
    'SHOW_PAGE_TRACE' =>true,
    'DEFAULT_CHARSET' =>'utf-8', // 默认输出编码
    // 配置邮件发送服务器
    'MAIL_HOST' =>'smtp.exmail.qq.com',
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>'609691039@qq.com',
    'MAIL_FROM' =>'609691039@qq.com',
    'MAIL_FROMNAME' =>'Orange',
    'MAIL_PASSWORD' =>'orange1029',
    'MAIL_CHARSET' =>'utf-8',
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件

    //开启SQL缓存
    'DB_SQL_BUILD_CACHE' => true,
    'DB_SQL_BUILD_QUEUE' => 'xcache',
    'DB_SQL_BUILD_LENGTH' => 50, // SQL缓存的队列长度

   /* 'HTML_CACHE_ON'     =>    true, // 开启静态缓存
    'HTML_CACHE_TIME'   =>    60,   // 全局静态缓存有效期（秒）
    'HTML_FILE_SUFFIX'  =>    '.shtml', // 设置静态缓存文件后缀
    'HTML_CACHE_RULES'  =>     array(  // 定义静态缓存规则
     //定义格式1 数组方式
        'Hospital:'=>array('Hospital/{:action}_{id}','600'),
    )*/
);
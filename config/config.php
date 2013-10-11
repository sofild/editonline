<?php
	date_default_timezone_set("PRC");
	
	define('DBHOST','localhost');
	define('DBUSER','root');
	define('DBPWD','1234');
	define('DBNAME','editonline');

	define('ROOT',dirname(__DIR__));
	define('IS_DEBUG','1');
	define('STAMPTIME',time());
	define('WHOLETIME',date('Y-m-d H:i:s',time()));
	define('YM',date('Ym',time()));
	define('YMD',date('Ymd',time()));
	define('HIS',date('His',time()));
	define('CURPAGE',"http://". $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
<?php

//系统版本
define("VERSION","1.0.0");
//系统根目录
define("ROOT",dirname(__DIR__));
//应用文件存放目录
define("APP_ROOT",ROOT."/app");
//框架目录
define("FRAME_ROOT",ROOT."/framework");
//缓存目录
define("CACHE_ROOT",FRAME_ROOT."/cache");
//配置文件目录
define("CONFIG_ROOT",FRAME_ROOT."/config");
//公共方法目录
define("FUNCTION_ROOT",FRAME_ROOT."/common");
//系统库文件目录
define("LIB_ROOT",FRAME_ROOT."/library");
//核心文件目录
define("CORE_ROOT",LIB_ROOT."/core");
//后缀
define("EXT",".php");

include CORE_ROOT."/Loader.php";

\core\Loader::register();

\core\exception\Error::register();

\core\App::getInstance()->run();
echo "<pre>";print_r($_SERVER);die;
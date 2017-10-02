<?php //--- bootstrap file
$url = $_SERVER['REQUEST_URI'];// string url wanted : root/text/class-method-id/ (localhost/affiliate/screen-LCD/c-v-56/)  -- SEO matter if text is free : be a unique slug !
define('ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);// dirname(__DIR__)
//--- BOOTSTRAP to include lib
require_once(ROOT.'/config/config.php');
require_once(ROOT.'/vendor/autoload.php');
require_once('autoloader.php');
//--- CLASS to transform url
$cls=new \Model\Url();
$url=$cls->parseUrl($url);
$test=$cls->controllUrl($url);//url size
//---- CONTROLLER to redirect to page
$ctrl=new \Controller\Controller();
$ctrl->controller($url,$test);	
?>
<?php //--- controller model 
namespace Controller;
// from the core : used in index bootstrap
class Controller{
	protected $url;
	protected $test;
	protected $cls;// other class	
	/**
	*
	*/
	function controller($url,$test){
			global $normalSize;
		if($test=="continue"){
			 $cls=new \Model\Url();
		$goto=$cls->parseUrl($url[$normalSize-1],'-');// pattern = class-method-id
		//print_r($goto);
			if($cls->redirectController($goto)==404){
				//echo redirectController($goto);//"error 404";
				//exit;
			}
			else{// normal output : view from controller with model
				//echo " page : ".redirectController($goto);
				//exit;		
			}
		}
		else if($test=="index"){
					//echo "HOMEPAGE";
					//exit;// OK
					$page=new \Controller\Home();
					$page->index();			
		}
		else{
			//header('HTTP/1.0 404 Not Found');// no input before, anormal 404 page
			//echo "error 404";
			//exit;
			$url="wrong number of params in url";// 404
			$page=new \Controller\Error;
			$url=$page->Error($url);
		}
	}
}
?>
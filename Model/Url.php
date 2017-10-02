<?php //--- url treatment
namespace Model;
// from the core : used in index bootstrap
class Url{
	protected $url;
	protected $sep;
	
/** get url params : pattern = /text/class-method-id/
 *
 */
function parseUrl($url,$sep='/'){
$url = trim($url,$sep);
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode($sep, $url);// array url wanted
//print_r($url);
return $url;
}

/** controll url params size
 *
 */
function controllUrl($url){
global $normalSize, $index;
$actualSize=count($url);
//echo $theSize;
	if ($actualSize==$index){// index : size=0 prod OR 1 dev
	$test="index";	
	}
	else if($actualSize!=$normalSize){// index : size=0 prod OR 1 dev
	$test="404";	
	}	
	else{
	$test="continue";	
	}
return $test;
}

/** redirect to existent class and method
 *
 */
function redirectController($url){
	global $myClass,$myMethod;
	//print_r($reroute[$url[0]]);// DEBUG
	if(isset($myClass[$url[0]],$myMethod[$url[1]],$url[2])){// $url 2 with regex if you want to control
		//$url="page and classe ".ROOT."Controller".DIRECTORY_SEPARATOR.$myClass[$url[0]].".php methode ".$myMethod[$url[1]]." identifier ".$url[2];// DEBUG to avoid new value of url for algorithm suite
		if (file_exists(ROOT."Controller".DIRECTORY_SEPARATOR.$myClass[$url[0]].".php")){
					$toTest='\Controller'.DIRECTORY_SEPARATOR.$myClass[$url[0]];// conflict with autoloader
			//$url="OK";print($url);
			//------------------------------  due to fatal error bug
			try{
				$class_exists = class_exists($toTest);				
			}
			catch(LogicException $e){
				$class_exists = false;// destroy because fatal error due to autoloader (bug known : https://bugs.php.net/bug.php?id=52339)
			}
			finally{// force output
				    if(!$class_exists) {						
					$url="class doesn't exist in file";// 404 (first if, method in array)
					$page=new \Controller\Error;
					$url=$page->Error($url);
					}
					else{// HERE
						$myObject=new $toTest;
						$myObject->setId($url[2]); // Controller (duplicate Model ?)			
						if(method_exists($myObject,$myMethod[$url[1]])){// object,method
							$url=$myObject->$myMethod[$url[1]]();// then to Model in Controller to verify if id exists and direct output
						}
						else{// OK
							$url="method exists but is not used here";// 404 (first if, method in array)
							$page=new \Controller\Error;
							$url=$page->Error($url);
						}
						
					}
			}
			//------------------------------	
		}
		else{// OK
			$url="file doesn't exist";//404
			$page=new \Controller\Error;
		    $url=$page->Error($url);
		}	
	}
	else{// OK
		$url="one of three params is missing or wrong in url";// 404
		$page=new \Controller\Error;
		$url=$page->Error($url);
	}
	return $url;
}
	
}
?>
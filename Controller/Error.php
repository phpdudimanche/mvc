<?php 
namespace Controller;

class Error{
	
	protected $msg;
	
	function Error($msg){
		$m = new \Mustache_Engine(array(
		'loader' => new \Mustache_Loader_FilesystemLoader(ROOT.'/view'),
		'partials_loader' => new \Mustache_Loader_FilesystemLoader(ROOT.'/view/partial/')
		));// for namespace , add \
		echo $m->render('error', array('css'=>'style.css','js'=>'script.js','title' => 'error','description' => 'error page','message' => 'There is a mistake. Sorry.','msg'=>$msg,'author' => 'Made in Julien'));// KO if content array is not in UTF-8
	}
	
}
?>
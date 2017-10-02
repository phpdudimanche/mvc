<?php 
namespace Controller;// utf8 without bom to avoid matter

class Home{

public function index(){
	$m = new \Mustache_Engine(array(
	'loader' => new \Mustache_Loader_FilesystemLoader(ROOT.'/View'),
	'partials_loader' => new \Mustache_Loader_FilesystemLoader(ROOT.'/View/partial/')
	));// for namespace , add \
	echo $m->render('index', array('css'=>'style.css','js'=>'script.js','title' => 'HomePage','description' => 'Welcome HOME','news' => 'the last news...','author' => 'Made in Julien'));// KO if content array is not in UTF-8
}

}
?>
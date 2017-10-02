<?php 
namespace Controller;
use \Model\FunctionaldModel;// forbidden to have the same className and fileName

class Functional{// easy if normal class
	#param
	protected $id;
	#getters setters
	public function setId($id){
		 $this->id= $id;
	}
	public function getId(){
		 return $this->id;
	}
	#methods
	public function view(){
		//return "visualisation de la marque N°".$this->id;// to view
	$m = new \Mustache_Engine(array(
	'loader' => new \Mustache_Loader_FilesystemLoader(ROOT.'/View'),
	'partials_loader' => new \Mustache_Loader_FilesystemLoader(ROOT.'/View/partial/')
	));// for namespace , add \
	echo $m->render('functional', array('css'=>'style.css','js'=>'script.js','title' => 'my functionnal model','description' => 'this is the functional logic','author' => 'Made in Julien','id'=>$this->id));// KO if content array is not in UTF-8
	}
}
?>
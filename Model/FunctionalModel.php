<?php 
namespace Model;

class FunctionaldModel{
	#param
	protected $id;
	#construct
	public function Functional(){
		return "your functional need !";
	}
	#getters setters
	public function setId($id){
		 $this->id= $id;
	}
	public function getId(){
		 return $this->id;
	}
	#methods
}
?>
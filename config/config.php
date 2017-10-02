<?php //--- config file
$env=0;//0,10=dev,prod
if ($env==0){
	$normalSize=3;// 3 on dev (with sub directory), 2 on prod (Class+Merthod)
	$index=1;// 1 on dev, 0 on prod
}else if ($env==10){
	$normalSize=2;// 3 on dev, 2 on prod
	$index=0;// 1 on dev, 0 on prod	
}else{
	
}
$myClass=array("c"=>"Category","b"=>"Brand","p"=>"Page","f"=>"functional");// mapping to class : only the last exists
$myMethod=array("fl"=>"frontOfficeList","bl"=>"backOfficeList","e"=>"edit","c"=>"create","u"=>"update","d"=>"delete","v"=>"view");// mapping to method : only the last exists
?>
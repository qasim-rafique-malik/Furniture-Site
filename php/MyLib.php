<?php 

class MyLib{
	
	function __construct(){
		session_start();
	}
	
	public function pr($data,$exit = false){// pr method body start
		
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		if($exit){
			exit;
		}
	}// pr method body end
	
	
}
$ml = new MyLib();
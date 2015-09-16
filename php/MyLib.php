<?php 

class MyLib{
	
	function __construct(NameClass $NC){
		session_start();
		$this->NC = $NC;
	}
	
	public function pr($data,$exit = false){// pr method body start
		
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		if($exit){
			exit;
		}
	}// pr method body end
	
	/*
		This function is use to upload file
		return nothing.
	*/
	public function fileupload($fileName, $upload_dir="", $file_types_array=array("jpg"), $max_file_size=9048576){// fileupload method body start
		$uploadPath 	= $_SERVER['DOCUMENT_ROOT']."/".$this->NC->proDir."/upload/";
		$random 		= rand(10,10000);
		if($_FILES[$fileName]["error"] == "0")
		{
			if($_FILES[$fileName]["size"] < $max_file_size)
			{
				move_uploaded_file($_FILES[$fileName]["tmp_name"],$uploadPath.$upload_dir.$random.$_FILES[$fileName]["name"]);
				return $upload_dir.$random.$_FILES[$fileName]["name"];
			}
			
		}
	}// fileupload method body end
	
	public function deleteImage($filePath){
		
		$target = $_SERVER['DOCUMENT_ROOT']."/".$this->NC->proDir."/upload/".$filePath;
		// See if it exists before attempting deletion on it
		if (file_exists($target)) {
			unlink($target); // Delete now
		} 
		// See if it exists again to be sure it was removed
		if (file_exists($target)) {
			echo "Problem deleting " . $target;
		} else {
			//echo "Successfully deleted " . $target;
		}
		
	}
	
	
}

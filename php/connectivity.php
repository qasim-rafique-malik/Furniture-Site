<?php
	
// this class is user for dataBase connectivity

class connectivity extends mysqli{ // class body start
	
	private $dbUser 			= 'root';
	private $dbPassword 		= 'root';
	private $dbHost 			= 'localhost';
	private $dbName 			= 'furniture_site';

	
	public function __construct(){
		parent:: __construct(
			$this->dbHost,
			$this->dbUser,
			$this->dbPassword,
			$this->dbName
			);
	}
	
	public function getRecords($table, $where=false){
		
		if($where){
			$where = $this->makeWhere($where);
		}
		$query = "SELECT * FROM  $table ".$where;
		return $this->exeQuery($query);
		
	}
	
	public function makeWhere($where){
		
		$count = 0;
		$returnWhere = "";
		foreach($where as $key => $val){
			
			if($count < 1){
				$returnWhere .= "WHERE $key = '$val' ";
			}
			else{
				$returnWhere .= "AND $key = '$val' ";
			}
			
			$count++;
		}
		return $returnWhere;
	}
	
	/*
		This method accept two paramiter: 
		1 the query string : to execute query
		2 returntype
			if  retruntrype is true then 
			it will return record's array
			else it will return number of records
	*/
	private function exeQuery($query, $retureType = true){ // method exeQuery body start
		$dbResult 		= $this->query($query);
		
		if($dbResult){
			if($retureType){
				// Fetching array from query result
				$result 		= $dbResult->fetch_array(MYSQLI_NUM);
				return $result;
			}
			else{
				// Fetching number of rows from query result
				$result 		= $dbResult->fetch_array(MYSQLI_NUM);
				return $result;
			}
		}
		else{
			echo "Error: query is not working";exit;
		}
		 
	}// method exeQuery body end
	
	
	
}// class body end

$db  = new connectivity();

?>
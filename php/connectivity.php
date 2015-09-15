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
	
	
	/*
		This function is use to delete record from table
	*/
	public function deleteRecord($table ,$where = false){
		if($where){
			$where = $this->makeWhere($where);
		}
		$query = "DELETE FROM $table ".$where;
		$this->query($query);
	}
	
	/*
		This function is use to get the last record from the table
	*/
	public function getLastRecord($table, $fields, $orderBy){// method getLastRecord body start
		$query 		= "SELECT $fields FROM $table ORDER BY $orderBy DESC";
		$dbResult 	= $this->query($query);
		$result 	= $dbResult->fetch_array(MYSQLI_ASSOC);
		return $result;
	}// method getLastRecord body end
	
	/*
		This function is user to insert data in table
		take two thinks
			1-table name
			2- associated array of field name and value
		return nothing
	*/
	public function insertData($table, $data){// method inserData body start
		$fields 			= array_keys( $data );
		//$values 			= array_map( "mysql_real_escape_string", array_values( $data ) );
		$values 			= array_values( $data );
		$query 				= "INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."');";
		$execute 			= $this->query($query);
		
	}// method inserData body end
	
	/*
		This function will make and execute the query
		and return the my_sql result
	*/
	public function getRecords($table, $where=false){// method getRecords body start
		
		if($where){
			$where = $this->makeWhere($where);
		}
		$query = "SELECT * FROM  $table ".$where;
		return $this->exeQuery($query);
		
	}// method getRecords body end
	
	/*
		This function will make and return a where clause for my_sql query
		it takes associated array like
		$where["fieldName"] = 'value';
	*/
	public function makeWhere($where){// method makeWhere body start
		
		$count 				= 0;
		$returnWhere 		= "";
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
	}// method makeWhere body end
	
	/*
		This method accept two parameter: 
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
				
				$allRecords			= array();
				
				// Fetching array from query result
				while($row = $dbResult->fetch_array(MYSQLI_ASSOC)){
					$allRecords[] 	= $row;
				}
				return $allRecords;
			}
			else{
				// Fetching number of rows from query result
				$result 		= $dbResult->fetch_array($dbResult);
				return $result;
			}
		}
		else{
			echo "Error: query is not working";exit;
		}
		 
	}// method exeQuery body end
	

	/*
		This is the test function for testing 
	*/	
	public function test(){
		echo "i am in test";
	}
	
}// class body end

$db  = new connectivity();

?>
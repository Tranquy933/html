<?php 
	function getData($table,$sql=""){
		GLOBAL $conn;
		$sqlQuery = 'SELECT * FROM '.$table.' '.$sql.' ';
		$result = mysqli_query($conn, $sqlQuery);
		$arrData = [];
		while($arr = mysqli_fetch_assoc($result)){
			$arrData[] = $arr;
		}
		return $arrData;
	}
	
?>
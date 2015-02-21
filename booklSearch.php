<?php
   require_once 'dbConnection/dbConnect.php';
	
	$conn = dbConnect();	

	$sql = "SELECT * from book ";
	
	$stmt = $conn->prepare($sql);
	$results = $stmt->execute();
	$rows = $stmt->fetchAll();		
	
	if(empty($rows)) {
		echo "no records found";
	}
	else {		
		
		
		foreach ($rows as $row) {
			echo $row[1].'<br>';
		}
		
	}
		
	
?>



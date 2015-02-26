<?php
    include_once 'dbConnect.php';
	$conn = dbConnect();	
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	try {
	
		$name = $_POST['category_name'];
			
		$sql = "INSERT INTO CATEGORY(Name) values ('$name')";
		$stmt = $conn->prepare($sql);
		$results = $stmt->execute();
		}
		
	catch(PDOException $e) {
		echo $e;             
		die();
	}
	header("Location: addCategory.html?result=true");
	?>
	
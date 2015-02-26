<?php
    include 'dbConnect.php';


	$conn = dbConnect();	
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	try {
	
		$name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
			
		$sql = "INSERT INTO PUBLISHER(Name,Address,Phone,Email) values ('$name','$address','$phone','$email')";
		$stmt = $conn->prepare($sql);
		$results = $stmt->execute();
		}
		
	catch(PDOException $e) {
		echo $e;             
		die();
	}
	header("Location: addPublisher.html?result=true");
	?>
	
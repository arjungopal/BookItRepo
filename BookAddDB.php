<?php
    include('dbConnect.php');

	$conn = dbConnect();	
	
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	try {
	
		$ISBN =$_POST['isbn'];
		$title = $_POST['title'];
		$edition = $_POST['edition'];
		$year = $_POST['year'];
		$price = $_POST['price'];
		$publisher = $_POST['publisher'];
		$category = $_POST['category'];
		$copies = $_POST['copies'];
		$author1= $_POST['author'];
		$author2= $_POST['author2'];
		$author3= $_POST['author3'];
		$author4= $_POST['author4'];
		
		$query = "select * from book where isbn ='".$ISBN."'";
		$statement = $conn->prepare ( $query );
		$res = $statement->execute ();
		$row = $statement->fetch ();
		$result = true;
		
		if(empty($row)){
			$insert_book = "INSERT INTO BOOK(ISBN,Title,Edition,Year,Price,PublisherId,CategoryId,Copies) values ('$ISBN','$title','$edition','$year',$price,$publisher,$category,$copies)";
			$statement = $conn->prepare($insert_book);
			$results = $statement->execute();
			
			$insert_author = "INSERT INTO AUTHOR(ISBN,AuthorName) values ('$ISBN','$author1')";
			$statement1 = $conn->prepare($insert_author );
			$results = $statement1->execute();
			if($author2!="")
			{
				$author_sql = "INSERT INTO BOOKAUTHOR(ISBN,AuthorName) values ('$ISBN','$author2')";
				$stmt = $conn->prepare($author_sql);
				$results = $stmt->execute();
			}
			
			if($author3!="")
			{
				$author_sql = "INSERT INTO BOOKAUTHOR(ISBN,AuthorName) values ('$ISBN','$author3')";
				$stmt = $conn->prepare($author_sql);
				$results = $stmt->execute();
			}
			
			if($author4!="")
			{
				$author_sql = "INSERT INTO BOOKAUTHOR(ISBN,AuthorName) values ('$ISBN','$author4')";
				$stmt = $conn->prepare($author_sql);
				$results = $stmt->execute();
			}
			
			$result = true;

		}
		else
		{
			$result = false;
		}
		
		
		}
	
	catch(PDOException $e) {
		echo $e;             
		die();
	}
	
	
	
?>





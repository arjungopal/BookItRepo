<?php
   require_once 'dbconnection/dbConnect.php';
	
	$conn = dbConnect();	
	$bookname = $_GET['bookname'];
	$author = $_GET['author'];
	$publisher = $_GET['publisher'];
	$category = $_GET['category'];
	if(isset($_GET['isbn']))
	$isbn = $_GET['isbn'];
	else
	$isbn = 'none';
	
	$sql = "SELECT book.isbn,book.copies,book.title,book.edition,GROUP_CONCAT(bookauthor.authorname SEPARATOR ',') AS author,publisher.name AS publisher FROM book,bookauthor,publisher,bookcategory where bookcategory.categoryid=book.categoryid and book.isbn=bookauthor.isbn and book.publisherid=publisher.publisherid ";
	
	if($bookname!=null)
	{
		$sql = $sql." and book.title like '%".$bookname."%'";
	}
	if($isbn!='none')
	{
		$sql = $sql." and book.isbn like '".$isbn."'";
	}
	if($author!=null)
	{
		$sql = $sql." and book.isbn in (select isbn from bookauthor where authorname like '%".$author."%')";
	}
	if($publisher!=null)
	{
		$sql = $sql." and publisher.name like '%".$publisher."%'";
	}
	if($category!='All Category')
	{
		$sql = $sql." and bookcategory.name='".$category."'";
	}
	$sql = $sql." group by book.isbn,book.copies,book.title,book.edition,publisher.name";
	
	$stmt = $conn->prepare($sql);
	$results = $stmt->execute();
	$rows = $stmt->fetchAll();		
	
	if(empty($rows)) {
		echo "no records found";
	}
	else {		
		
		$arr = array();
		foreach ($rows as $row) {
			 $arr[] = $row;
		}
		$data = array('Books' => $arr);
		echo(json_encode($data));
		
	}
		
	
?>



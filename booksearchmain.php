<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
	</script>
	<title>BookIt : BookSearch</title>
	<script src="js/bookSearch.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">	
	
</head>
<body>
<div class="wrapper">
	<?php
	    require_once 'dbconnection/dbConnect.php';
		$connection = dbConnect();
		$sql = "select name from bookcategory";
		$stmt = $connection->prepare($sql);
		$results = $stmt->execute();
		$rows = $stmt->fetchAll();
		
	?>
	<hr>

	
	
	 <form  method="get">
                    
                   <input type="text"  id="bookname" name="bookname" placeholder="Enter Book Name" >
                   <input type="text"  id="author" name="author" placeholder="Enter Author Name">
                   <input type="text"  id="publisher" name="publisher" placeholder="Enter Publisher Name">
                   <select type="text"  id="category" name="category">
				   <option value="All Category">All Category</option>
							<?php
							foreach ($rows as $row) {
									echo '<option value="'.$row[0].'">'.$row[0].'</option>';
								}	
							?>
				   </select>
                   
                  <button id="searchButton">Search</button>
      </form>
	
	
	<div id="content">
			
	</div>
	
	
	
	
</div>
</body>
	
</html>